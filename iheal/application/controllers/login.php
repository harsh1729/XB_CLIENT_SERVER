<?php
class Login extends CI_Controller
{
	public function __construct() {        
		parent::__construct();
	}
	function is_LoggedIn()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(isset($is_logged_in) && $is_logged_in == true)
		{
			redirect('home');
			die();
		}
	}
	function index()
	{
		$this->is_LoggedIn();
		$this->load->view('login-view');
	}
	function loginAuth()
	{
		$this->load->model('user_model');

		$queryRow = $this->user_model->verify_credentials($this->input->post('username'),md5($this->input->post('password')));

		//print_r($queryRow);
		if($queryRow['isValidated'])
		{
			$data = array(
				'name' => $queryRow['name'],
				'username' => $queryRow['username'],
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('home');
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