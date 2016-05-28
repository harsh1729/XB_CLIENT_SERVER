<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Epaper_users extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('epaper_users_model');
	}

   function add()
    {

         //$this->load->model('user_model');
         
        $name = $this->input->get_post('name');
		$address = $this->input->get_post('address');
		$contact = $this->input->get_post('contact');
		//$catid = $this->user_model->getcatid($userid);
		$username = $this->input->get_post('username');
		$password = $this->input->get_post('password');
		$imageid = $this->input->get_post('image');
		$cityid = $this->input->get_post('cityid');
        $insertedid = $this->epaper_users_model->add($name,$address,$contact,$username,$password,$imageid,$cityid);
       echo json_encode( array("success"=>1) );

	}

	public function get()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');
			
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$cityid = $this->input->get_post('cityid');
				echo json_encode(array("status"=>"login","data"=>$this->epaper_users_model->getuser($cityid)) );
			}
		}
	}
   
   function setactive()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$id = $this->input->get_post('id');
				$isenable = $this->input->get_post('isenable');
				echo json_encode(array("status"=>"login","data"=>$this->epaper_users_model->setactive($id,$isenable) ) );
			}
		}
	}

}

?>