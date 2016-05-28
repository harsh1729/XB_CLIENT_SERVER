<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		$this->load->model('category_model');
	}
	public function index($catid=false)
	{
		/*if(!$catid)
			$this->load->view('category');
		else
			$this->load->view('category');*/

		
		if(!$catid)
		{
			$dataToNav['page'] = "category";
			$dataToNav['userName'] = "sushil";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
			$navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
		
			$navigationData['css'] = $this->load->view('view-parts/category-view-css-files','',TRUE);
			$headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
			
			$data['data'] = $this->load->view('category',$headerData,TRUE);
			
			$data['js'] = $this->load->view('view-parts/category-view-js-files','',TRUE);
			$this->load->view('view-parts/footer',$data);
		}
		else
		{
			if($this->category_model->is_exists($catid))
			{
				$dataToNav['page'] = "category";
				$dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
				$navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
			
				$navigationData['css'] = $this->load->view('view-parts/subcategory-view-css-files','',TRUE);
				$headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
				
				$data['data'] = $this->load->view('subcategory',$headerData,TRUE);
				
				$data['js'] = $this->load->view('view-parts/subcategory-view-js-files','',TRUE);
				$this->load->view('view-parts/footer',$data);
			}
			else
				redirect('404');
		}
	}

	public function manage($catid = false,$screen=false)
	{
		if ($catid)
		{
			if($screen == "screens")
			{
				$this->load->model('screens_model');
				$dataToNav['page'] = "category";
				$dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
				$navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
			
				$navigationData['css'] = $this->load->view('view-parts/managescreens-view-css-files','',TRUE);
				$headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
				
				$headerData['catid'] = $catid;
				$headerData['screens'] = $this->screens_model->get($catid);
				$data['data'] = $this->load->view('managescreens',$headerData,TRUE);
				
				$data['js'] = $this->load->view('view-parts/managescreens-view-js-files','',TRUE);
				$this->load->view('view-parts/footer',$data);
			}
			else if($this->category_model->is_exists($catid))
			{
				$this->load->model('screens_model');
				$this->load->model('controls_model');
				$dataToNav['page'] = "category";
				$dataToNav['userName'] = "jaspal";//$this->userinfo_model->get_user_name($this->session->userdata('user_id'));
				$navigationData['navigation'] = $this->load->view('view-parts/navigation',$dataToNav,TRUE);
			
				$navigationData['css'] = $this->load->view('view-parts/managecategory-view-css-files','',TRUE);
				$headerData['header'] = $this->load->view('view-parts/header',$navigationData,TRUE);
				
				$headerData['controls'] = $this->controls_model->get();
				$headerData['screens'] = $this->screens_model->get($catid);
				$headerData['catid'] = $catid;
				$data['data'] = $this->load->view('managecategory',$headerData,TRUE);
				
				$data['js'] = $this->load->view('view-parts/managecategory-view-js-files','',TRUE);
				$this->load->view('view-parts/footer',$data);
			}
			else
				redirect('404');
		}
		else
		{
			redirect('404');
		}
	}
}