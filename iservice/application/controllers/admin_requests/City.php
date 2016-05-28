<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('city_model');
		$this->load->model('version_model');
	}

	function get()
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
				//$cityname = $this->input->post('cityname');
				//$pincode = $this->input->post('pincode');
				$citydata = $this->city_model->get();
				echo json_encode(array(
										"status"=>"login",
										"data"=>$citydata
									) );
			}
		}
	}
	function add()
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
				$cityname = $this->input->post('cityname');
				$pincode = $this->input->post('pincode');
				$cityid = $this->city_model->add($cityname,$pincode);
				$data = $this->city_model->get($cityid);
				$this->version_model->set('city');
				echo json_encode(array(
										"status"=>"login",
										"cityid"=>$cityid,
										"data"=>$data
									) );
			}
		}
	}
}