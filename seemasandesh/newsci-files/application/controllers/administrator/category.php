<?php
class Category extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		$this->load->model('category_model');
		$this->load->model('user_model');
		$this->load->model('client_model');
		$this->load->model('addons_model');
	}
	
	function index()
	{
		$dataToNav['page'] = "category";
		$this->load->model('client_model');
		$this->load->model('user_model');

		$dataToNav['userName'] = $this->userinfo_model->get_user_name($this->session->userdata('user_id'));
		$dataToNav['usertype'] = $this->user_model->get_user_type($this->session->userdata('user_id'));
		$dataToNav['addons'] = $this->addons_model->get_addons($this->session->userdata('client_id'),1);	
		$navigationData['navigation'] = $this->load->view('administrator/view-parts/navigation-view',$dataToNav,TRUE);
		$navigationData['css'] = $this->load->view('administrator/view-parts/category-view-css-files','',TRUE);
		$headerData['header'] = $this->load->view('administrator/view-parts/header-view',$navigationData,TRUE);
		
		$clientid = $this->user_model->get_client_id($this->session->userdata('user_id'));

		$folders = $this->client_model->get_folder_name_by_id($clientid);
		$headerData['categories'] = $this->category_model->get_all_categories($this->session->userdata('client_id'),$folders,true);
		$data['data'] = $this->load->view('administrator/category-view',$headerData);
		
		$data['js'] = $this->load->view('administrator/view-parts/category-view-js-files','',TRUE);
		$this->load->view('administrator/view-parts/footer-view',$data);
	}
}
?>