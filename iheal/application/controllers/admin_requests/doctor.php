<?php

class Doctor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('doctor_model');
	}
	public function upload_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->helper('path');

				$userid = $this->session->userdata('user_id');

				$upload_path = realpath(APPPATH.'../uploaded_images');
				if($upload_path)
				{
					echo $this->doctor_model->upload_image($upload_path);
				}
				else
				{
					echo json_encode(array('status'=>'login','error'=>'uploadpatherror'));
				}
			}
		}
	}
	function remove_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->helper('path');
				//$this->load->library('xerces_globals');

				//$filename = $this->xerces_globals->str_last_replace("_",".",$this->input->post('filename'));
				//$filepath = realpath($foldername.$filename);
				$filepath = realpath(APPPATH.'../uploaded_images/'.$this->input->post('filename'));
				$this->doctor_model->delete_image_by_name($filepath);
				echo json_encode(array("status"=>'login'));
			}
		}
	}

	function insertDoctor()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->session->userdata('user_id');

				$categoryId = $this->input->post('category');
				$doctorName = $this->input->post('doctor_name');
				$doctorMobile = $this->input->post('doctor_mobile_no');
				$email = $this->input->post('email');
				$qualification = $this->input->post('qualification');
				
				$appointmentContactname1 = $this->input->post('appointment_contact_name_1');
				$appointmentContact1 = $this->input->post('appointment_contact_1');
				$appointmentContactname2 = $this->input->post('appointment_contact_name_2');
				$appointmentContact2 = $this->input->post('appointment_contact_2');
				$appointmentContactname3 = $this->input->post('appointment_contact_name_3');
				$appointmentContact3 = $this->input->post('appointment_contact_3');

				$fees = $this->input->post('fees');

				$holiday_sunday = $this->input->post('holiday_sunday');
				if($holiday_sunday !== false)
					$holiday_sunday = 1;
				else
					$holiday_sunday = 0;
				$holiday_monday = $this->input->post('holiday_monday');
				if($holiday_monday !== false)
					$holiday_monday = 1;
				else
					$holiday_monday = 0;
				$holiday_tuesday = $this->input->post('holiday_tuesday');
				if($holiday_tuesday !== false)
					$holiday_tuesday = 1;
				else
					$holiday_tuesday = 0;
				$holiday_wednesday = $this->input->post('holiday_wednesday');
				if($holiday_wednesday !== false)
					$holiday_wednesday = 1;
				else
					$holiday_wednesday = 0;
				$holiday_thursday = $this->input->post('holiday_thursday');
				if($holiday_thursday !== false)
					$holiday_thursday = 1;
				else
					$holiday_thursday = 0;
				$holiday_friday = $this->input->post('holiday_friday');
				if($holiday_friday !== false)
					$holiday_friday = 1;
				else
					$holiday_friday = 0;
				$holiday_saturday = $this->input->post('holiday_saturday');
				if($holiday_saturday !== false)
					$holiday_saturday = 1;
				else
					$holiday_saturday = 0;

				/*$housetime_start = $this->input->post('housetime_start');
				$housetime_end = $this->input->post('housetime_end');
				$hospitaltime_start = $this->input->post('hospitaltime_start');
				$hospitaltime_end = $this->input->post('hospitaltime_end');
				$holidaytime_start = $this->input->post('holidaytime_start');
				$holidaytime_end = $this->input->post('holidaytime_end');*/

				$housetiming = $this->input->post('house_timing');
				$hospitaltiming = $this->input->post('hospital_timing');
				$holidaytiming = $this->input->post('holiday_timing');

				$docAddr_house_no = $this->input->post('doctor_address_house_no');
				$docAddr_colony = $this->input->post('doctor_address_colony');
				//$docAddr_stateId = $this->input->post('doctor_address_state');
				//$docAddr_cityId = $this->input->post('doctor_address_city');

				$doctor_image = $this->input->post('image_doctor');

				$hopital_name = $this->input->post('hospital_name');
				$hospital_facility = $this->input->post('hospital_facility');
				$hospitalAddr_house_no = $this->input->post('hospital_address_house_no');
				$hospitalAddr_colony = $this->input->post('hospital_address_colony');
				//$hospitalAddr_stateId = $this->input->post('hospital_address_state');
				//$hospitalAddr_cityId = $this->input->post('hospital_address_city');
				
				//nearestmedical
				$nearestmedical = $this->input->post('nearestmedical');

				$Addr_stateId = $this->input->post('address_state');
				$Addr_cityId = $this->input->post('address_city');

				$noOfHopitalImages = $this->input->post('no_of_H_img');

				$lat = $this->input->post('lat');
				$lng = $this->input->post('lng');

				$sortOrder = $this->doctor_model->get_sort_order_max($categoryId,$Addr_cityId);
				if($sortOrder === NULL)
					$sortOrder = 0;

				$sortOrder = $sortOrder+1;

				$registration_number = $this->input->post('regno');
				$medical_contact = $this->input->post('medical_contact');
				
				//$docInsertId = $this->doctor_model->save_doctor($categoryId,$sortOrder,$doctorName,$doctorMobile,$email,$qualification,$fees,$housetime_start,$housetime_end,$hospitaltime_start,$hospitaltime_end,$holidaytime_start,$holidaytime_end,$docAddr_house_no,$docAddr_colony,$docAddr_stateId,$docAddr_cityId,$doctor_image,$hopital_name,$hospital_facility,$hospitalAddr_house_no,$hospitalAddr_colony,$hospitalAddr_stateId,$hospitalAddr_cityId);
				$docInsertId = $this->doctor_model->save_doctor($categoryId,$sortOrder,$doctorName,$doctorMobile,$email,$qualification,$fees,$housetiming,$hospitaltiming,$holidaytiming,$docAddr_house_no,$docAddr_colony/*,$docAddr_stateId,$docAddr_cityId*/,$doctor_image,$hopital_name,$hospital_facility,$hospitalAddr_house_no,$hospitalAddr_colony/*,$hospitalAddr_stateId,$hospitalAddr_cityId*/,$Addr_stateId,$Addr_cityId,$lat,$lng,$nearestmedical,$medical_contact,false,$registration_number);
				
				if(trim($appointmentContactname1) != "" && trim($appointmentContact1) != "")
					$this->doctor_model->save_appointment_contact($docInsertId,$appointmentContactname1,$appointmentContact1);
				if(trim($appointmentContactname2) != "" && trim($appointmentContact2) != "")
					$this->doctor_model->save_appointment_contact($docInsertId,$appointmentContactname2,$appointmentContact2);
				if(trim($appointmentContactname3) != "" && trim($appointmentContact3) != "")
					$this->doctor_model->save_appointment_contact($docInsertId,$appointmentContactname3,$appointmentContact3);

				$this->doctor_model->save_holidays($docInsertId,$holiday_sunday,$holiday_monday,$holiday_tuesday,$holiday_wednesday,$holiday_thursday,$holiday_friday,$holiday_saturday);

				for($i=0;$i<$noOfHopitalImages;$i++)
				{
					$imgname = 'hospital_image'.($i+1);
					$imgname = $this->input->post($imgname);
					$this->doctor_model->save_clinic_image($docInsertId,$imgname );
				}

				echo json_encode(array("status"=>'login'));
			}
		}
	}

	function get_doctors()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$catid = $this->input->get_post('catid');
				$cityid = $this->input->get_post('cityid');
				$filter = $this->input->get_post('filter');
				echo json_encode(array("status"=>"login","data"=>$this->doctor_model->getAllDoctors($catid,$cityid,$filter)) );
			}
		}
	}
	function updatesortorder()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$sortorder_raw = $this->input->post('sortorder');
				$catid = $this->input->get_post('catid');
				$cityid = $this->input->get_post('cityid');

				$sortorder = array();

				foreach ($sortorder_raw as $index => $value) {
					$sortorder[$index+1] = intval(substr($value,6));
				}

				$this->doctor_model->updatesortorder($sortorder);

				echo json_encode(array("status"=>'login',"data"=>$this->doctor_model->getAllDoctors($catid,$cityid)) );
			}
		}
	}
	function enabledisable()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$docid = $this->input->post('docid');
				$enable = $this->input->get_post('enable');

				echo json_encode(array("status"=>'login',"data"=>$this->doctor_model->enabledisable($docid,$enable),"enablevalue"=>$enable) );
			}
		}
	}
	function remove_doc_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->helper('path');

				$docid = $this->input->post('docid');
				$imgname = $this->input->post('imgname');

				$filepath = realpath(APPPATH.'../uploaded_images/'.$imgname);
				$this->doctor_model->delete_image_by_name($filepath);

				$affected_rows = $this->doctor_model->update_doc_img_name($docid,"");

				echo json_encode(array("status"=>'login',"rows"=>$affected_rows) );
			}
		}
	}
	function remove_clinic_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->helper('path');

				$imgid = $this->input->post('image_id');
				$clinic_image = $this->doctor_model->getClinicImageById($imgid);

				$filepath = realpath(APPPATH.'../uploaded_images/'.$clinic_image['name']);
				$this->doctor_model->delete_image_by_name($filepath);

				$affected_rows = $this->doctor_model->removeClinicImageById($imgid);

				echo json_encode(array("status"=>'login',"rows"=>$affected_rows) );
			}
		}
	}
	function updateDoctor()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->session->userdata('user_id');

				$docid = $this->input->post('docid');

				$categoryId = $this->input->post('category');
				$doctorName = $this->input->post('doctor_name');
				$doctorMobile = $this->input->post('doctor_mobile_no');
				$email = $this->input->post('email');
				$qualification = $this->input->post('qualification');
				
				$appointmentContactname1 = $this->input->post('appointment_contact_name_1');
				$appointmentContact1 = $this->input->post('appointment_contact_1');
				$appointmentContactname2 = $this->input->post('appointment_contact_name_2');
				$appointmentContact2 = $this->input->post('appointment_contact_2');
				$appointmentContactname3 = $this->input->post('appointment_contact_name_3');
				$appointmentContact3 = $this->input->post('appointment_contact_3');

				$fees = $this->input->post('fees');

				$holiday_sunday = $this->input->post('holiday_sunday');
				if($holiday_sunday !== false)
					$holiday_sunday = 1;
				else
					$holiday_sunday = 0;
				$holiday_monday = $this->input->post('holiday_monday');
				if($holiday_monday !== false)
					$holiday_monday = 1;
				else
					$holiday_monday = 0;
				$holiday_tuesday = $this->input->post('holiday_tuesday');
				if($holiday_tuesday !== false)
					$holiday_tuesday = 1;
				else
					$holiday_tuesday = 0;
				$holiday_wednesday = $this->input->post('holiday_wednesday');
				if($holiday_wednesday !== false)
					$holiday_wednesday = 1;
				else
					$holiday_wednesday = 0;
				$holiday_thursday = $this->input->post('holiday_thursday');
				if($holiday_thursday !== false)
					$holiday_thursday = 1;
				else
					$holiday_thursday = 0;
				$holiday_friday = $this->input->post('holiday_friday');
				if($holiday_friday !== false)
					$holiday_friday = 1;
				else
					$holiday_friday = 0;
				$holiday_saturday = $this->input->post('holiday_saturday');
				if($holiday_saturday !== false)
					$holiday_saturday = 1;
				else
					$holiday_saturday = 0;

				$housetiming = $this->input->post('house_timing');
				$hospitaltiming = $this->input->post('hospital_timing');
				$holidaytiming = $this->input->post('holiday_timing');

				$docAddr_house_no = $this->input->post('doctor_address_house_no');
				$docAddr_colony = $this->input->post('doctor_address_colony');
				//$docAddr_stateId = $this->input->post('doctor_address_state');
				//$docAddr_cityId = $this->input->post('doctor_address_city');

				$doctor_image = $this->input->post('image_doctor');

				$hopital_name = $this->input->post('hospital_name');
				$hospital_facility = $this->input->post('hospital_facility');
				$hospitalAddr_house_no = $this->input->post('hospital_address_house_no');
				$hospitalAddr_colony = $this->input->post('hospital_address_colony');
				//$hospitalAddr_stateId = $this->input->post('hospital_address_state');
				//$hospitalAddr_cityId = $this->input->post('hospital_address_city');
				
				$nearestmedical = $this->input->post('nearestmedical');
				$medical_contact = $this->input->post('medical_contact');


				$Addr_stateId = $this->input->post('address_state');
				$Addr_cityId = $this->input->post('address_city');

				$noOfHopitalImages = $this->input->post('no_of_H_img');

				$lat = $this->input->post('lat');
				$lng = $this->input->post('lng');				

				/*$sortOrder = $this->doctor_model->get_sort_order_max($categoryId,$docAddr_cityId);
				if($sortOrder === NULL)
					$sortOrder = 0;

				$sortOrder = $sortOrder+1;
				*/

				$registration_number = $this->input->post('regno');

				$this->doctor_model->update_doctor($docid,$categoryId/*,$sortOrder*/,$doctorName,$doctorMobile,$email,$qualification,$fees,$housetiming,$hospitaltiming,$holidaytiming,$docAddr_house_no,$docAddr_colony/*,$docAddr_stateId,$docAddr_cityId*/,$doctor_image,$hopital_name,$hospital_facility,$hospitalAddr_house_no,$hospitalAddr_colony,$Addr_stateId,$Addr_cityId,$lat,$lng,$nearestmedical,$medical_contact,false,$registration_number);
				
				$docInsertId = $docid;

				$this->doctor_model->removeAppointmentcontacts($docid);

				if(trim($appointmentContactname1) != "" && trim($appointmentContact1) != "")
					$this->doctor_model->save_appointment_contact($docInsertId,$appointmentContactname1,$appointmentContact1);
				if(trim($appointmentContactname2) != "" && trim($appointmentContact2) != "")
					$this->doctor_model->save_appointment_contact($docInsertId,$appointmentContactname2,$appointmentContact2);
				if(trim($appointmentContactname3) != "" && trim($appointmentContact3) != "")
					$this->doctor_model->save_appointment_contact($docInsertId,$appointmentContactname3,$appointmentContact3);

				$this->doctor_model->removeHolidays($docid);

				$this->doctor_model->save_holidays($docInsertId,$holiday_sunday,$holiday_monday,$holiday_tuesday,$holiday_wednesday,$holiday_thursday,$holiday_friday,$holiday_saturday);

				for($i=0;$i<$noOfHopitalImages;$i++)
				{
					$imgname = 'hospital_image'.($i+1);
					$imgname = $this->input->post($imgname);
					$this->doctor_model->save_clinic_image($docInsertId,$imgname );
				}

				echo json_encode(array("status"=>'login'));
			}
		}
	}

	function remove_doctor()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->helper('path');

				$docid = $this->input->post('docid');
				$clinicImgs = $this->doctor_model->getDocClinicImages($docid,true);

				foreach ($clinicImgs as $index => $value) {
					
					$filepath = realpath(APPPATH.'../uploaded_images/'.$value);
					$this->doctor_model->delete_image_by_name($filepath);	

				}
				$docimg = $this->doctor_model->getDocImage($docid);
				if($docimg)
				{
					$filepath = realpath(APPPATH.'../uploaded_images/'.$docimg);
					$this->doctor_model->delete_image_by_name($filepath);
				}

				$affected_rows = $this->doctor_model->removeClinicImageByDocId($docid);

				$affected_rows = $this->doctor_model->removeHolidays($docid);

				$affected_rows = $this->doctor_model->removeAppointmentcontacts($docid);

				$affected_rows = $this->doctor_model->removedoctor($docid);

				echo json_encode(array("status"=>'login',"rows"=>$affected_rows) );
			}
		}
	}

	
	
}