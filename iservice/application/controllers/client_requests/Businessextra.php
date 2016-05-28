<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Businessextra extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('businessextra_model');
	}

   function add()
    {
          $this->load->model('user_model');
        $b_extra_master_id = $this->input->get_post('bextraid');
		
		$userid = $this->input->get_post('userid');
		$catid = $this->user_model->getcatid($userid);
		$heading = $this->input->get_post('heading');
		$content = $this->input->get_post('content');
		$cityid = $this->input->get_post('cityid');
         $isbusiness = 0;
		

		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$datetime = $dt->format('Y-m-d H:i:s');
		$dt->add(new DateInterval('P180D'));
		$expdatetime = $dt->format('Y-m-d H:i:s');

		

		$busextraid = $this->businessextra_model->add($userid,$heading,$content,$datetime,$expdatetime,$catid,$b_extra_master_id,$cityid,$isbusiness);

		
         $imageids = json_decode($this->input->get_post('images'));
		foreach($imageids as $index=>$imageid)
		{
			$this->businessextra_model->mapimage($busextraid,$imageid,(int)$index+1);
		}
       
		echo json_encode( array("success"=>1) );

	}

	function getrandomAdvercat()
	{
		$this->load->model('city_model');

		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$expdatetime = $dt->format('Y-m-d H:i:s');

 		$catid = $this->input->get_post('catid');
 		$imei = $this->input->get_post('imei');
 		$isbusiness = $this->input->get_post('isbusiness');
 		//$cities = $this->input->get_post('cities');
 		$cities = $this->city_model->getcityidsby_imei($imei);
 		
		$data= $this->businessextra_model->getrandomAdvercat($expdatetime,$catid,$cities,$isbusiness);
		echo json_encode( array(
									"success"=>1,
									"advertisement"=>$data
								) );
	}

	function getrandomAdver()
	{
		$this->load->model('city_model');

		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$expdatetime = $dt->format('Y-m-d H:i:s');

 		//$catid = $this->input->get_post('catid');
 		$imei = $this->input->get_post('imei');
 		$isbusiness = $this->input->get_post('isbusiness');
 		//$cities = $this->input->get_post('cities');
 		$cities = $this->city_model->getcityidsby_imei($imei);
 		
		$data= $this->businessextra_model->getrandomAdver($expdatetime,$cities,$isbusiness);
		echo json_encode( array(
									"success"=>1,
									"advertisement"=>$data
								) );
	}

/*
	function getrandomcate()
	{
		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$expdatetime = $dt->format('Y-m-d H:i:s');
        $catid = $this->input->get_post('catid');
		$data= $this->businessextra_model->getrandomAdver($expdatetime,$catid);
		echo json_encode( array(
									"success"=>1,
									"advertisement"=>$data
								) );
	}

	*/
    function getbusinessextra()
	{
		$this->load->model('city_model');
		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$expdatetime = $dt->format('Y-m-d H:i:s');
        $bmasterid = $this->input->get_post('bmasterid');
        $imei = $this->input->get_post('deviceid');
		//$gcmid = $this->gcmuser_model->getgcmuserid($imei);
		$cities = $this->city_model->getcityidsby_imei($imei);
		$data= $this->businessextra_model->getbusinessextra($expdatetime,$bmasterid,false,false,$cities);
		echo json_encode( array(
									"success"=>1,
									"data"=>$data
								) );
	}

	function getbusinessextrabyid()
	{
		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$expdatetime = $dt->format('Y-m-d H:i:s');
        $bmasterid = $this->input->get_post('bmasterid');
        $id = $this->input->get_post('id');
		$data= $this->businessextra_model->getbusinessextra($expdatetime,$bmasterid,$id);
		echo json_encode( array(
									"success"=>1,
									"data"=>$data
								) );
	}
	function getbusinessextrabyuserid()
	{
		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$expdatetime = $dt->format('Y-m-d H:i:s');
        $bmasterid = $this->input->get_post('bmasterid');
        $id = $this->input->get_post('userid');
		$data= $this->businessextra_model->getbusinessextra($expdatetime,$bmasterid,false,$id);
		echo json_encode( array(
									"success"=>1,
									"data"=>$data
								) );
	}

	
	function getbusinessmaster()
	{
		
        $this->load->model('user_model');
        $userid = $this->input->get_post('userid');
        $catid = $this->user_model->getcatid($userid);
        $this->load->model('city_model');
		$city = $this->city_model->get();
		$data= $this->businessextra_model->getbusinessmaster($catid,$userid);
		$maxlimit =$this->user_model->getmaxlimit($userid);
		$userpost = $this->businessextra_model->getuserpost($userid);
		echo json_encode( array(
									"success"=>1,
									"data"=>$data,
									"city"=>$city,
									"maxlimit"=>$maxlimit,
									"userpost"=>$userpost
								) );
	}

	function delete(){
		$id = $this->input->get_post('id');
		$data= $this->businessextra_model->delete($id);
		echo json_encode( array(
									"success"=>1
									
								) );
	}

}

?>