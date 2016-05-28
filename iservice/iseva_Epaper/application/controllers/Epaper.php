<?php
class Epaper extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		$this->load->model('epaper_model');
		//$this->load->model('client_model');
		//$this->load->model('addons_model');
	}
	
	function index()
	{
		    /*//$this->load->model('user_model');
			//$this->load->model('area_model');
	
			$dataToNav['page'] = "add_epaper";
		    $dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
		    $navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
			$navigationData['css'] = $this->load->view('view-parts/epaper-view-css-files','',TRUE);
			$headerData['header'] = $this->load->view('view-parts/header-view',$navigationData,TRUE);
	
	
			//$clientid = $this->user_model->get_client_id($this->session->userdata('user_id'));
			//$folders = $this->client_model->get_folder_name_by_id($clientid);
	
	
			//$headerData['areas'] = $this->area_model->get_areas($clientid);
			//print_r($headerData['areas']);
	
			$dtObj = new DateTime("now",new DateTimeZone("Asia/Kolkata"));
			$dtObj->setTimeZone(new DateTimeZone("GMT"));
			$currentDate = $dtObj->format("Y-m-d");
	
			//$headerData['allepapers'] = $this->epaper_model->get_epaper_short($folders,$clientid,$currentDate);
			
			$data['data'] = $this->load->view('epaper-view',$headerData);
			
			$data['js'] = $this->load->view('view-parts/epaper-view-js-files','',TRUE);
			$this->load->view('view-parts/footer',$data);*/
            $dataToNav['page'] = "add_epaper";
		    $dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
		    $navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
		    $navigationData['css'] = $this->load->view('view-parts/epaper-view-css-files','',TRUE);
		    $headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
		    //$headerData['user'] = $this->user_model->getalluser();
		    //$headerData['category'] = $this->category_model->get(0,1);
		    //$headerData['city'] = $this->city_model->get();
		    $data['data'] = $this->load->view('epaper-view',$headerData,TRUE);
		    $data['js'] = $this->load->view('view-parts/epaper-view-js-files','',TRUE);
		    $this->load->view('view-parts/footer',$data);

		

  }
}
?>