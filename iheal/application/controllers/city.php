<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
	}
	public function index()
	{
		$this->load->model('state_model');

		$dataToNav['page'] = "city";
		$navigationData['navigation'] = $this->load->view('view-parts/navigation-view',$dataToNav,TRUE);
		$navigationData['css'] = $this->load->view('view-parts/city-view-css-files','',TRUE);
		$this->load->view('view-parts/header-view',$navigationData);

		$data2View['states'] = $this->state_model->getAllStates();
		$data['data'] = $this->load->view('city-view',$data2View);

		$data['js'] = $this->load->view('view-parts/city-view-js-files','',TRUE);
		$this->load->view('view-parts/footer-view',$data);
	}
}