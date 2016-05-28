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
			redirect('administrator');
			die();
		}
	}
	function index()
	{
		$this->is_LoggedIn();
		$this->load->view('administrator/login-view');
	}
	function loginAuth()
	{
		$this->load->model('userinfo_model');
		$this->load->model('client_model');
		$domainname = rtrim(domain_name(),"/");
		$clientid = $this->client_model->get_client_id($domainname);

		$queryRow = $this->userinfo_model->verify_credentials($this->input->post('username'),md5($this->input->post('password')),$clientid);

		if($queryRow['isValidated'])
		{
			if($queryRow['clientisactive'] && $queryRow['userisactive'])
			{
				//means client and user both are active	
				$data = array(
					'user_id' => $queryRow['userid'],
					'client_id' => $queryRow['clientid'],
					'usertype' => $queryRow['usertype'],
					'name' => $queryRow['name'],
					'username' => $queryRow['username'],
					'is_logged_in' => true
				);
				$this->session->set_userdata($data);
				redirect('administrator');
			}
			else if($queryRow['clientisactive'] == 0)
			{
				//username/password wrong!!!
				$this->session->set_flashdata('login_error','<span class="glyphicon glyphicon-warning-sign"></span> Your Newspaper is Blocked !!!');
				redirect('administrator/login');
			}
			else if($queryRow['userisactive'] == 0)
			{
				//user access is blocked!!!
				$this->session->set_flashdata('login_error','<span class="glyphicon glyphicon-warning-sign"></span> Your Access is Blocked !!!');
				redirect('administrator/login');				
			}
		}
		else
		{
			//username/password wrong!!!
			$this->session->set_flashdata('login_error','Username/Password do not Match!');
			redirect('administrator/login');
		}
	}
	function logout()
	{
		$this->session->set_userdata('is_logged_in',FALSE);
		redirect('administrator/login');
	}
}
?>