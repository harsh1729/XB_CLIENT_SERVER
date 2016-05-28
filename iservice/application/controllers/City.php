<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		$this->load->model('city_model');
	}
	public function index()
	{
		$dataToNav['page'] = "city";
		$dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
		$navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
		
		$navigationData['css'] = $this->load->view('view-parts/city-view-css-files','',TRUE);
		$headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
		
		$data['data'] = $this->load->view('city',$headerData,TRUE);
		
		$data['js'] = $this->load->view('view-parts/city-view-js-files','',TRUE);
		$this->load->view('view-parts/footer',$data);
	}
}