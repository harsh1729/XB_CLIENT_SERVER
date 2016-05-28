<?php

class City extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('city_model');
	}

	function getCityByStateId()
	{
		/*if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{*/
			$this->load->model('user_model');
			$is_logged_in = $this->user_model->is_logged_in();
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$stateid = $this->input->get_post('stateid');
				echo json_encode(array("status"=>'login',"cities"=>$this->city_model->getCityByStateId($stateid)));
			}
		//}
	}

	function insertCity()
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
				$userid = $this->session->userdata('user_id');

				$cityname = $this->input->post('cityname');
				$pincode = $this->input->post('pincode');
				$stateid = $this->input->post('state');

				$this->city_model->save_city($cityname,$pincode,$stateid);
				
				echo json_encode(array("status"=>'login'));
			}
		}
	}

}