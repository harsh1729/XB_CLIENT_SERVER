<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	/*function gettest()
	{
		$catid = 2;
		$cityid = 1;
		echo "<pre>";
		print_r($this->user_model->get($catid,$cityid) );
	}*/
	function get()
	{
		/*if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{*/
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$catid = $this->input->post('catid');
				$cityid = $this->input->post('cityid');
				$filter = $this->input->post('filter');
				echo json_encode(array("status"=>"login","data"=>$this->user_model->get($catid,$cityid,$filter) ) );
			}
		//}
	}

	function getdata()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$catid = $this->input->get_post('catid');
				$cityid = $this->input->get_post('cityid');
				$filter = $this->input->get_post('filter');
				echo json_encode(array("status"=>"login","data"=>$this->user_model->getdata($catid,$cityid,$filter) ) );
			}
		}
	}

	function reset()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$username = $this->input->get_post('username');
				$cnt = $this->user_model->checkusername($username);
				if($cnt!=0){
				    $password = $this->input->get_post('password');
				    $this->user_model->reset($username,$password);
				    echo json_encode(array("status"=>"login","success"=>'1' ));
			    }else{
			    	echo json_encode(array("status"=>"login","success"=>'0' ));
			    }
			    //echo json_encode(array("status"=>"login","success"=>$username ));
				
				
			}
		}
	}

	function setactive()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->input->get_post('userid');
				$isactive = $this->input->get_post('isactive');
				echo json_encode(array("status"=>"login","data"=>$this->user_model->setactive($userid,$isactive) ) );
			}
		}
	}
	function setlimit()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->input->get_post('userid');
				$limit = $this->input->get_post('limit');
				echo json_encode(array("status"=>"login","data"=>$this->user_model->setlimit($userid,$limit) ) );
			}
		}
	}
}