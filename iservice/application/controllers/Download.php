<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends MY_Controller {
		function __construct()
			{

			    parent::__construct();
			    $this->is_LoggedIn();
			    $this->load->model('gcmuser_model');

			}

		public function index(){
			
			
		    $dataToNav['page'] = "download";
		    $dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
		    $navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
		    $navigationData['css'] = $this->load->view('view-parts/users-view-css-files','',TRUE);
		    $headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
		    /*$headerData['user'] = $this->user_model->getalluser();
		    $headerData['category'] = $this->category_model->get(0,1);*/
		    //$headerData['users'] = $this->gcmuser_model->getAllUser();
		    $data['data'] = $this->load->view('download',$headerData,TRUE);
		    $data['js'] = $this->load->view('view-parts/download-view-js-files','',TRUE);
		    $this->load->view('view-parts/footer',$data);
		}

}


?>