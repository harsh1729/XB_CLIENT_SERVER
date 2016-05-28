<?php
class Publicmessage extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		$this->load->model('client_model');
		$this->load->model('user_model');
		$this->load->model('addons_model');
		
	}
	
	function index()
	{
		if( $this->addons_model->client_have_addon($this->session->userdata('client_id'),"Publicmessage",1) )
		{
			$dataToNav['page'] = "publicmessage";
			$dataToNav['userName'] = $this->userinfo_model->get_user_name($this->session->userdata('user_id'));
			$dataToNav['usertype'] = $this->user_model->get_user_type($this->session->userdata('user_id'));
			$dataToNav['addons'] = $this->addons_model->get_addons($this->session->userdata('client_id'),1);	
			$navigationData['navigation'] = $this->load->view('administrator/view-parts/navigation-view',$dataToNav,TRUE);
			$navigationData['css'] = $this->load->view('administrator/view-parts/public-message-view-css-files','',TRUE);
			$headerData['header'] = $this->load->view('administrator/view-parts/header-view',$navigationData,TRUE);
			
			$data['data'] = $this->load->view('administrator/public-message-view',$headerData);
			
			$data['js'] = $this->load->view('administrator/view-parts/public-message-view-js-files','',TRUE);
			$this->load->view('administrator/view-parts/footer-view',$data);
		}else
			redirect('404');
	}

}
?>