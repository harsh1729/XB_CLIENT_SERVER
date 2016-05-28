<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advt extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
	}
	public function index()
	{
		$this->load->model('advt_model');

		$dataToNav['page'] = "advt";
		$navigationData['navigation'] = $this->load->view('view-parts/navigation-view',$dataToNav,TRUE);
		$navigationData['css'] = $this->load->view('view-parts/advt-view-css-files','',TRUE);
		$this->load->view('view-parts/header-view',$navigationData);

		$data2View = '';
		$data['data'] = $this->load->view('advt-view',$data2View);

		$data['js'] = $this->load->view('view-parts/advt-view-js-files','',TRUE);
		$this->load->view('view-parts/footer-view',$data);
	}
}