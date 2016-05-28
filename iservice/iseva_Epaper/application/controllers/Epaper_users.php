<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epaper_users extends MY_Controller {
	function __construct()
			{

				parent::__construct();
			    $this->is_LoggedIn();

			}

		public function index(){
			
			$this->load->model('user_model');
			$this->load->model('city_model');
		    
            //$this->load->model('category_model');
			$dataToNav['page'] = "add_epaper";
		    $dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
		    $navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
		    $navigationData['css'] = $this->load->view('view-parts/users-view-css-files','',TRUE);
		    $headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
		    //$headerData['user'] = $this->user_model->getalluser();
		    //$headerData['category'] = $this->category_model->get(0,1);
		    $headerData['city'] = $this->city_model->get();
		    $data['data'] = $this->load->view('epaper_users',$headerData,TRUE);
		    $data['js'] = $this->load->view('view-parts/epaper_users-view-js-files','',TRUE);
		    $this->load->view('view-parts/footer',$data);
		}
}