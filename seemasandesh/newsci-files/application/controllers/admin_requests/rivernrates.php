<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rivernrates extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('rivernrates_model');
	}
	
	function save_rivernrates()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->model('user_model');
				$this->load->helper('path');
				$this->load->model('client_model');


				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);
				
				

				$rivernrates_heading= $this->input->post('rivernrates_heading');
				$rivernrates_content= $this->input->post('rivernrates_content');
				$type= $this->input->post('type');
				
				$dt = new DateTime($this->input->post('datetime'),new DateTimeZone("Asia/Kolkata"));
				//$dt->setTimeZone(new DateTimeZone("GMT"));
				$date = $dt->format('Y-m-d');
				
				
				
				 $this->rivernrates_model->save_rivernrates($clientid,$rivernrates_heading,$rivernrates_content,$date,$type);
				
			echo json_encode(array("status"=>'login'));
			}
		}
	}
	
	
}