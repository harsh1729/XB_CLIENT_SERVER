<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {


    function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		
	}
	public function index()
	{
		$this->load->model('doctorcategory_model');
		$this->load->model('state_model');

		$dataToNav['page'] = "home";
		$navigationData['navigation'] = $this->load->view('view-parts/navigation-view',$dataToNav,TRUE);
		$navigationData['css'] = $this->load->view('view-parts/home-view-css-files','',TRUE);
		$this->load->view('view-parts/header-view',$navigationData);

		$data2View['categories'] = $this->doctorcategory_model->getAllCategories();
		$data2View['states'] = $this->state_model->getAllStates();
		$data['data'] = $this->load->view('home-view',$data2View);

		$data['js'] = $this->load->view('view-parts/home-view-js-files','',TRUE);
		$this->load->view('view-parts/footer-view',$data);
	}
}
