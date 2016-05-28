<?php
class Advt extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		$this->load->model('client_model');
		$this->load->model('advt_model');
		$this->load->model('user_model');
		$this->load->model('addons_model');
	}
	
	function index()
	{
		if( $this->addons_model->client_have_addon($this->session->userdata('client_id'),"Advt",1) )
		{
			$dataToNav['page'] = "advt";
			$dataToNav['userName'] = $this->userinfo_model->get_user_name($this->session->userdata('user_id'));
			$dataToNav['usertype'] = $this->user_model->get_user_type($this->session->userdata('user_id'));
			$dataToNav['addons'] = $this->addons_model->get_addons($this->session->userdata('client_id'),1);	
			$navigationData['navigation'] = $this->load->view('administrator/view-parts/navigation-view',$dataToNav,TRUE);
			$navigationData['css'] = $this->load->view('administrator/view-parts/advt-view-css-files','',TRUE);
			$headerData['header'] = $this->load->view('administrator/view-parts/header-view',$navigationData,TRUE);
			
			$clientid = $this->user_model->get_client_id($this->session->userdata('user_id'));
			$folders = $this->client_model->get_folder_name_by_id($clientid);
	
			$headerData['advttypes'] = $this->advt_model->get_advt_types($clientid,1);
			$headerData['advts'] = $this->_get_advt_by_advt_types($folders,$this->advt_model->get_advt_types($clientid));
			$data['data'] = $this->load->view('administrator/advt-view',$headerData);
			
			$data['js'] = $this->load->view('administrator/view-parts/advt-view-js-files','',TRUE);
			$this->load->view('administrator/view-parts/footer-view',$data);
		}else
			redirect('404');
	}
	function _get_advt_by_advt_types($folders,$advttypes)
	{
		$alladvts = array();
		foreach ($advttypes as $index => $value)
		{
			$singleadvttype = array();
			$singleadvttype['id'] = $value['id'];
			$singleadvttype['typename'] = $value['typename'];
			$singleadvttype['detail'] = $value['detail'];
			$singleadvttype['status'] = $value['status'];
			$singleadvttype['intervalvalue'] = $value['intervalvalue'];
			$singleadvttype['intervalfield'] = $value['intervalfield'];
			
			$singleadvttype['advts'] = $this->advt_model->get_advt($folders['advtimagespath'],$value['id']);

			array_push($alladvts, $singleadvttype);
		}
		return $alladvts;
	}
}
?>