<?php
class Notification extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		$this->load->model('city_model');
		
	}
	
	function index()
	{
		
			$dataToNav['page'] = "notification";
			$dataToNav['userName'] = "sushil";
			$navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
			$navigationData['css'] = $this->load->view('view-parts/notification-view-css-files','',TRUE);
			$headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
			$headerData['city'] = $this->city_model->get();
			$data['data'] = $this->load->view('notification-view',$headerData,TRUE);
			$data['js'] = $this->load->view('view-parts/notification-view-js-files','',TRUE);

			$this->load->view('view-parts/footer',$data);


	}
}
?>