<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct() {        
		parent::__construct();
		$this->load->model('user_model');
	}
	function is_LoggedIn()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(isset($is_logged_in) && $is_logged_in == true)
		{
			redirect('category');
			die();
		}
	}
	function index()
	{
		$this->is_LoggedIn();
		$this->load->view('login');
	}
	function loginAuth()
	{
		//$this->load->model('client_model');
		//$domainname = rtrim(domain_name(),"/");
		//$clientid = $this->client_model->get_client_id($domainname);

		$queryRow = $this->user_model->verify_credentials($this->input->post('username'),md5($this->input->post('password') ),1 );

		//print_r($queryRow);
		if($queryRow['isValidated'])
		{
			//means client and user both are active	
			$data = array(
				'user_id' => $queryRow['userid'],
				'name' => $queryRow['name'],
				'username' => $queryRow['username'],
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('category');
		}
		else
		{
			//username/password wrong!!!
			$this->session->set_flashdata('login_error','Username/Password do not Match!');
			redirect('login');
		}
	}
	function logout()
	{
		$this->session->set_userdata('is_logged_in',FALSE);
		redirect('login');
	}
}
?>