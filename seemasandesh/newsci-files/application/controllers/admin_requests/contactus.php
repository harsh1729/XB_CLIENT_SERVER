<?php

class Contactus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_us_model');
	}
	function get_suggestions()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->model('client_model');
				
				$domainname = $this->input->post('domainname');
				$clientid = $this->client_model->get_client_id($domainname);
				$lastmessageid = $this->input->post('lastmessageid');
				if($lastmessageid == 0)
					$lastmessageid = false;
				$needBRtag = true;
				echo json_encode(array("status"=>"login","data"=>$this->contact_us_model->get_message($clientid,5,$lastmessageid,$needBRtag)));
			}
		}
	}
}