<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('gcmuser_model');
	}
	function register()
	{
		$name = $this->input->get_post('name');
		$email = $this->input->get_post('email');
		$contact = $this->input->get_post('contact');
		$username = $this->input->get_post('username');
		$password = $this->input->get_post('password');
		$imei = $this->input->get_post('imei');
		$promocode = $this->input->get_post('promocode');

		$does_exists = $this->user_model->does_exists($username,$contact,$email,$promocode);

		if($does_exists['duplicate_exists'] == 1)
		{
			$error_message = "";
			if($does_exists['contact_exists'] == 1)
			{
				$error_message .= "Contact";
			}
			/*if($does_exists['email_exists'] == 1)
			{
				if($does_exists['contact_exists'] == 1)
					$error_message .= ", Email";
				else
					$error_message .= "Email";
			}*/
			if($does_exists['username_exists'] == 1)
			{
				if( $does_exists['contact_exists'] ==1 )
					$error_message .= " and Username";
				else
					$error_message .= "Username";
			}

			$error_message .= " already exists!";
			echo json_encode( array("success"=>0,"error_message"=>$error_message) );
		}
		else
		{
			if($promocode!=""){
			if($does_exists['promocode_exists']==0)
			{
				$error_message = "add valid promocode!";
				echo json_encode( array("success"=>0,"error_message"=>$error_message) );
			}else{
			
			//write insert query

			$this->load->model('city_model');
			$city = $this->city_model->get();
			$referredby = 0;
			if($promocode !== false && $promocode !== NULL)
				$referredby = $this->user_model->getuserid($promocode);
			$userdata = $this->user_model->add($name,$username,$email,$contact,$password,$referredby);
			$this->gcmuser_model->updateuserid($imei,$userdata['userid']);
			echo json_encode( array("success"=>1,"userdata"=>$userdata,"city"=>$city) );
		  }
		 }else{
		 	$this->load->model('city_model');
			$city = $this->city_model->get();
			$referredby = 0;
			if($promocode !== false && $promocode !== NULL)
				$referredby = $this->user_model->getuserid($promocode);
			$userdata = $this->user_model->add($name,$username,$email,$contact,$password,$referredby);
			$this->gcmuser_model->updateuserid($imei,$userdata['userid']);
			echo json_encode( array("success"=>1,"userdata"=>$userdata,"city"=>$city) );
		 }
		}
	}
	function registergcm()
	{
		$gcmtextid = $this->input->post('gcmid');
		$imei = $this->input->post('imei');

		$doesgcmexists = $this->gcmuser_model->doesgcmexists($imei,$gcmtextid);
		if(!$doesgcmexists)
		{
			$dt = new DateTime("now",new DateTimeZone("GMT"));
			$datetime = $dt->format('Y-m-d H:i:s');

			$this->gcmuser_model->addgcmuser($imei,$gcmtextid,$datetime);

			$this->load->model('city_model');
			$cities = $this->city_model->get();
			echo json_encode( array("success"=>1,"cities"=>$cities) );
		}else{
			$dt = new DateTime("now",new DateTimeZone("GMT"));
			$datetime = $dt->format('Y-m-d H:i:s');
            $gcmid = $this->gcmuser_model->getgcmuserid($imei);
            $this->gcmuser_model->updategcmuser($gcmid,$gcmtextid,$datetime);
			$this->load->model('city_model');
			$cities = $this->city_model->get();
			echo json_encode( array("success"=>1,"cities"=>$cities) );
		}
	}
	function login()
	{
		$username = $this->input->get_post('username');
		$password = $this->input->get_post('password');
	        $this->load->model('city_model');
		$city = $this->city_model->get();
		$loginresponse = $this->user_model->verify_credentials($username,md5($password),0);
		echo json_encode(array("login"=>$loginresponse,"city"=>$city));
	}

	function update()
	{
		$userid = $this->input->get_post('userid');
		$deviceid = $this->input->get_post('device_id');
		$data = json_decode($this->input->get_post('data'));
		
		foreach ($data as $catcontrolmappingid => $value)
		{
			$temp = json_decode($value);
			if(is_array($temp))
			{
				foreach ($temp as $ind => $val)
				{
					$catcontroluservalueid = $this->user_model->does_exists_uservalue($userid,$catcontrolmappingid,$val);
					if($catcontroluservalueid > 0)
					{
						//means already exists, hence generate update query
						$this->user_model->updateuservalue($catcontroluservalueid,(int)$catcontrolmappingid,$userid,$val);
					}
					else
					{
						//means do not exists, hence generate insert query
						$this->user_model->adduservalue((int)$catcontrolmappingid,$userid,$val);
					}
				}
			}
			else
			{
				if($temp == null)
					$temp = $value;
				$catcontroluservalueid = $this->user_model->does_exists_uservalue($userid,$catcontrolmappingid);
				if($catcontroluservalueid > 0)
				{
					//means already exists, hence generate update query
					$this->user_model->updateuservalue($catcontroluservalueid,(int)$catcontrolmappingid,$userid,$value);
				}
				else
				{
					//means do not exists, hence generate insert query
					$this->user_model->adduservalue((int)$catcontrolmappingid,$userid,$temp);
				}
			}
		}
		echo json_encode( array(
								"success"=>1
								) );
		//echo json_encode($this->input->post());
	}
	function get()
	{
		$this->load->model('city_model');
		$this->load->model('gcmuser_model');

		$catid = $this->input->get_post('catid');
		$imei = $this->input->get_post('deviceid');
		//$gcmid = $this->gcmuser_model->getgcmuserid($imei);
		//$cities = $this->city_model->getcityids($gcmid);
		$cities = $this->city_model->getcityidsby_imei($imei);
		$merchants = $this->user_model->getdata($catid,$cities,'active',$imei);
		
		echo json_encode( array(
								"success"=>1,
								"data"=>$merchants
							));
	}
	function getdetail()
	{
		$userid = $this->input->get_post('userid');

		$data = $this->user_model->getdetails($userid);

		$outp = $this->user_model->getbasicdetails($userid);
		$this->load->model('city_model');
		$city = $this->city_model->get();
		$outp['success'] = 1;
		$outp['city'] = $city;
		$outp['data'] = $data;

		echo json_encode($outp);
	}

    function getepaper_user(){
    	$this->load->model('city_model');
		$this->load->model('epaper_users_model');
        $imei = $this->input->get_post('deviceid');
		
		$cities = $this->city_model->getcityidsby_imei($imei);
		
		$userepaper = $this->epaper_users_model->getdata($cities);
		
		echo json_encode( array(
								"success"=>1,
								"data"=>$userepaper
							));
    }

	function registerusernumber()
	{
		$deviceid = $this->input->get_post('deviceid');
		$number = $this->input->get_post('number');
		$name = $this->input->get_post('name');

		$response = $this->gcmuser_model->addusernumber($deviceid,$number,$name);
		
		echo json_encode( array(
								"success"=>1,
								"data"=>$response
							));

	}


	function getepaper(){
		//$deviceid = $this->input->get_post('deviceid');
		$this->load->model('epaper_model');
		$userid = $this->input->get_post('userid');
		$date = $this->input->get_post('date');
		if($date==NULL && $date==false){
			$date = $this->epaper_model->get_last_epaper_date($userid);
		}
		//$date = '2016-05-19';
		$basefilepath = "/home/xercextx/public_html/isevaepaper/pdf";
		$response = $this->epaper_model->getuserepaper($userid,$date,$basefilepath);
		echo json_encode( array(
								"success"=>1,
								"data"=>$response
							));
	}
	
}