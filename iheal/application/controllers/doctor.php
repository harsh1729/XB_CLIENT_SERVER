<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends MY_Controller {

    function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();
		$this->load->model('doctor_model');		
	}
	/*public function index2()
	{
		$dataToNav['page'] = "doctor";
		$navigationData['navigation'] = $this->load->view('view-parts/navigation-view',$dataToNav,TRUE);
		$navigationData['css'] = $this->load->view('view-parts/doctor-view-css-files','',TRUE);
		$this->load->view('view-parts/header-view',$navigationData);

		$data['data'] = $this->load->view('doctor-view','');

		$data['js'] = $this->load->view('view-parts/doctor-view-js-files','',TRUE);
		$this->load->view('view-parts/footer-view',$data);
	}*/
	public function index()
	{
		$this->load->model('doctorcategory_model');
		$this->load->model('state_model');

		$dataToNav['page'] = "doctor";
		$navigationData['navigation'] = $this->load->view('view-parts/navigation-view',$dataToNav,TRUE);
		$navigationData['css'] = $this->load->view('view-parts/doctor-add-view-css-files','',TRUE);
		$this->load->view('view-parts/header-view',$navigationData);

		$data2View['categories'] = $this->doctorcategory_model->getAllCategories();
		$data2View['states'] = $this->state_model->getAllStates();
		$data['data'] = $this->load->view('doctor-add-view',$data2View);

		$data['js'] = $this->load->view('view-parts/doctor-add-view-js-files','',TRUE);
		$this->load->view('view-parts/footer-view',$data);
	}
	public function edit($docid=false)
	{
		if($docid===false)
		{
			redirect('404');
		}
		else
		{
			$this->load->model('doctorcategory_model');
			$this->load->model('city_model');
			$this->load->model('state_model');

			$dataToNav['page'] = "doctor";
			$navigationData['navigation'] = $this->load->view('view-parts/navigation-view',$dataToNav,TRUE);
			$navigationData['css'] = $this->load->view('view-parts/doctor-edit-view-css-files','',TRUE);
			$this->load->view('view-parts/header-view',$navigationData);

			$data2View['docid'] = $this->doctor_model->getDocDetail($docid);

			$doctor = $this->doctor_model->getDocDetail($docid);

			$doctor['addrs_cities'] = $this->city_model->getCityByStateId($doctor['addrs_state_id']);
			//$doctor['clinic_addrs_cities'] = $this->city_model->getCityByStateId($doctor['clinic_addrs_state_id']);
			$doctor['clinic_images'] = $this->doctor_model->getDocClinicDetailedImages($docid);
			$doctor['appointment_contacts'] = $this->doctor_model->getDocContactPersons($docid);
			$doctor['categories'] = $this->doctorcategory_model->getAllCategories();
			$doctor['states'] = $this->state_model->getAllStates();

			$data2View['doctor'] = $doctor;

			$data['data'] = $this->load->view('doctor-edit-view',$data2View);

			$data['js'] = $this->load->view('view-parts/doctor-edit-view-js-files','',TRUE);
			$this->load->view('view-parts/footer-view',$data);			
		}
	}
}
