<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$dataToNav['page'] = "home";
		$dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
		$navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
		
		$navigationData['css'] = $this->load->view('view-parts/home-view-css-files','',TRUE);
		$headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
		
		$data['data'] = $this->load->view('home',$headerData,TRUE);
		
		$data['js'] = $this->load->view('view-parts/home-view-js-files','',TRUE);
		$this->load->view('view-parts/footer',$data);
	}
}