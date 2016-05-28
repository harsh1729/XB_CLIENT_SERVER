<?php

class Contactus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('contact_us_model');
	}
	//HARSH: A function to register contact us detail by app user
	function mob_contact_us()
	{

		$clientid = $this->input->post('clientid');
		$device_uid = $this->input->post('device_uid');
		$message = $this->input->post('message');
		$contact_detail = $this->input->post('contact_detail');
		$name = $this->input->post('name');

		echo json_encode(array($this->contact_us_model->save_message($clientid,$device_uid,$message,$contact_detail,$name)));
	}
	function contact_us()
	{
		$this->load->model('client_model');

		$domainname = $this->input->post('domainname');

		$clientid = $this->client_model->get_client_id($domainname);
		
		//$device_uid = $this->input->post('device_uid');
		$device_uid = $this->input->ip_address();
		$message = $this->input->post('message');
		$contact_detail = $this->input->post('phoneno')." , ".$this->input->post('email');
		$name = $this->input->post('name');

		echo json_encode(array("id"=>$this->contact_us_model->save_message($clientid,$device_uid,$message,$contact_detail,$name)));
	}
}