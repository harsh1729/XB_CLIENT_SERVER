<?php
class Epaper extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		$this->load->model('epaper_model');
		$this->load->model('client_model');
		$this->load->model('addons_model');
	}
	
	function index()
	{
		if( $this->addons_model->client_have_addon($this->session->userdata('client_id'),"Epaper",1) )
		{
			$this->load->model('user_model');
			$this->load->model('area_model');
	
			$dataToNav['page'] = "epaper";
			$dataToNav['userName'] = $this->userinfo_model->get_user_name($this->session->userdata('user_id'));
			$dataToNav['usertype'] = $this->user_model->get_user_type($this->session->userdata('user_id'));
			
			$dataToNav['addons'] = $this->addons_model->get_addons($this->session->userdata('client_id'),1);	
			$navigationData['navigation'] = $this->load->view('administrator/view-parts/navigation-view',$dataToNav,TRUE);
			$navigationData['css'] = $this->load->view('administrator/view-parts/epaper-view-css-files','',TRUE);
			$headerData['header'] = $this->load->view('administrator/view-parts/header-view',$navigationData,TRUE);
	
	
			$clientid = $this->user_model->get_client_id($this->session->userdata('user_id'));
			$folders = $this->client_model->get_folder_name_by_id($clientid);
	
	
			$headerData['areas'] = $this->area_model->get_areas($clientid);
			//print_r($headerData['areas']);
	
			$dtObj = new DateTime("now",new DateTimeZone("Asia/Kolkata"));
			$dtObj->setTimeZone(new DateTimeZone("GMT"));
			$currentDate = $dtObj->format("Y-m-d");
	
			$headerData['allepapers'] = $this->epaper_model->get_epaper_short($folders,$clientid,$currentDate);
			
			$data['data'] = $this->load->view('administrator/epaper-view',$headerData);
			
			$data['js'] = $this->load->view('administrator/view-parts/epaper-view-js-files','',TRUE);
			$this->load->view('administrator/view-parts/footer-view',$data);
		}else
			redirect('404');
	}

}
?>