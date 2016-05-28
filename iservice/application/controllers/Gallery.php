<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();	
		$this->load->model('gallery_model');
	}
	public function index()
	{
		$dataToNav['page'] = "gallery";
		$dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
		$navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
		
		$navigationData['css'] = $this->load->view('view-parts/gallery-view-css-files','',TRUE);
		$headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
		$headerData['gallerydata'] = $this->gallery_model->getGalleryData();
		$data['data'] = $this->load->view('gallery',$headerData,TRUE);
		
		$data['js'] = $this->load->view('view-parts/gallery-view-js-files','',TRUE);
		$this->load->view('view-parts/footer',$data);
	}
}