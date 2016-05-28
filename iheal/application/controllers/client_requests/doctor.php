<?php

class Doctor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('doctor_model');
	}
	function get_doctors()
	{
		$catid = $this->input->get_post('catid');
		$cityid = $this->input->get_post('cityid');
		echo json_encode($this->doctor_model->getAllDoctors($catid,$cityid,"approved"));
        //echo json_encode(array($catid,$cityid));
	}
	function getDocDetail()
	{
		$docid = $this->input->get_post('docid');
		$doctor = $this->doctor_model->getDoctor($docid);
		$doctor['clinic_images'] = $this->doctor_model->getDocClinicImages($docid);
		$doctor['appointment_contacts'] = $this->doctor_model->getAppointmentPersons($docid);
        $doctor['call_contact'] = $this->doctor_model->getCallContact($docid);

		echo json_encode($doctor);
	}
	function mob_upload_image()
    {
		$this->load->helper('path');
		$this->load->model('user_model');

		$userid = $this->input->post('userid');
        $keys = $this->input->post('keys');
        
		//$clientid = $this->user_model->get_client_id($userid);
       //echo json_encode(array("status"=>"success","userid"=>$userid));

		// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
		//$this->load->model('client_model');
		//$folders = $this->client_model->get_folder_name_by_id($clientid);

		$upload_path = realpath(APPPATH.'../uploaded_images');
		if($upload_path)
		{
            if($keys != "")
		 	    echo json_encode(array("status"=>"success","image"=>$this->doctor_model->upload_image_mob($upload_path,$keys)));
            else
            	echo json_encode(array("status"=>"failed","error"=>"no image sent"));
		}
		else
		{
			echo json_encode(array("status"=>"failed","error"=>"uploadpatherror"));
		}
	}
	function add()
	{
		$this->load->model('user_model');
		$name = $this->input->post('name');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$does_exists = $this->doctor_model->does_exists($email,$contact,$username);
		if($does_exists['duplicate_exists'] == 1)
		{
			$error_message = "";
			if($does_exists['contact_exists'] == 1)
			{
				$error_message .= "Contact";
			}
			if($does_exists['email_exists'] == 1)
			{
				if($does_exists['contact_exists'] == 1)
					$error_message .= ", Email";
				else
					$error_message .= "Email";
			}
			if($does_exists['username_exists'] == 1)
			{
				if( $does_exists['email_exists'] ==1 || $does_exists['contact_exists'] ==1 )
					$error_message .= " and Username";
				else
					$error_message .= "Username";
			}
			$error_message .= " already exists!";
			echo json_encode( array("success"=>0,"error_message"=>$error_message) );
		}
		else
		{
			$this->load->model('state_model');
			$this->load->model('city_model');
			$userid = $this->user_model->add($name,$username,$password,0);
			$docid = $this->doctor_model->register_doctor($name,$contact,$email,$userid);
			echo json_encode( array(
									"success"=>1,
									"userdata"=>array(
													"userid"=>$userid,
													"docid"=>$docid,
													"name"=>$name,
													"username"=>$username,
													"contact"=>$contact,
													"email"=>$email
												),
									"maximagelimit"=>$this->doctor_model->get_max_image_upload_limit(),
									"state"=>$this->state_model->getAllStates(),
									"city"=>$this->city_model->getAllcities()
									) );
		}
	}
	function login()
	{
		$this->load->model('user_model');

		$username = $this->input->get_post('username');
		$password = $this->input->get_post('password');

		$userdata = $this->user_model->verify_credentials($username,md5($password));
		if($userdata['isValidated'] == 1)
		{
			if($userdata['isactive'] == "null")
				$userdata['userdata'] = $this->user_model->getUserDetail($userdata['userid']);
			else
			{
				$tempdata = $this->doctor_model->getDocDetail($userdata['docid']);
				$tempdata['clinic_images'] = $this->doctor_model->getDocClinicDetailedImages($userdata['docid']);
				$tempdata['appointment_contacts'] = $this->doctor_model->getDocContactPersons($userdata['docid']);

				$userdata['userdata'] = $tempdata;
			}
			$this->load->model('state_model');
			$this->load->model('city_model');
			$userdata['maximagelimit'] = $this->doctor_model->get_max_image_upload_limit();
			$userdata['state'] = $this->state_model->getAllStates();
			$userdata['city'] = $this->city_model->getAllcities();
		}
		echo json_encode($userdata);
	}
	function register()
	{
		$userdata = json_decode($this->input->get_post('userdata'));
		//$userdata = $this->input->post('userdata');

		$userid = $userdata->user_id;

		//$doctorDB = $this->doctor_model->getDocDetailByUserid($userid);

		$catid = $userdata->category;
		$doctor_name = $userdata->doctor_name;
		$email = $userdata->email;
		$contact = $userdata->doctor_mobile_no;
		$qualification = $userdata->qualification;
		$fees = $userdata->fees;

		$image_doctor = $userdata->image_doctor;
		/*
		if($doctorDB['doc_image']['imgname'] != $image_doctor)
		{
			//now first remove old image from server.
			$this->load->helper('path');
			$filepath = realpath(APPPATH.'../uploaded_images/'.$doctorDB['doc_image']['imgname']);
			$this->doctor_model->delete_image_by_name($filepath);
		}*/

		$nearestmedical = $userdata->nearestmedical;

		$clinic_name = $userdata->hospital_name;
		$clinic_addrs_house_no = $userdata->hospital_address_house_no;
		$clinic_addrs_colony = $userdata->hospital_address_colony;

		$doctor_address_house_no = $userdata->doctor_address_house_no;
		$doctor_address_colony = $userdata->doctor_address_colony;

		$addrs_city_id = $userdata->address_city;
		$addrs_state_id = $userdata->address_state;

		$house_timing = $userdata->house_timing;
		$hospital_timing = $userdata->hospital_timing;

		$clinic_facility = $userdata->hospital_facility;

		$holidaytiming = $userdata->holiday_timing;

		$lat = $userdata->lat;
		$lng = $userdata->lng;

		$registration_number = $userdata->regno;
		$medical_contact = $userdata->medical_contact;

		$sortOrder = $this->doctor_model->get_sort_order_max($catid,$addrs_city_id);
				if($sortOrder === NULL)
					$sortOrder = 0;

		$sortOrder = $sortOrder+1;

		$docid = $this->doctor_model->save_doctor(
			$catid,$sortOrder,$doctor_name,$contact,$email,$qualification,
			$fees,$house_timing,$hospital_timing,$holidaytiming,
			$doctor_address_house_no,$doctor_address_colony,
			$image_doctor,$clinic_name,$clinic_facility,
			$clinic_addrs_house_no,$clinic_addrs_colony,$addrs_state_id,$addrs_city_id
			,$lat,$lng,$nearestmedical,$medical_contact,$userid,$registration_number);


		$appointmentContactname1 = $userdata->appointment_contact_name_1;
		$appointmentContact1 = $userdata->appointment_contact_1;
		$appointmentContactname2 = $userdata->appointment_contact_name_2;
		$appointmentContact2 = $userdata->appointment_contact_2;
		$appointmentContactname3 = $userdata->appointment_contact_name_3;
		$appointmentContact3 = $userdata->appointment_contact_3;

		if(trim($appointmentContactname1) != "" && trim($appointmentContact1) != "")
			$this->doctor_model->save_appointment_contact($docid,$appointmentContactname1,$appointmentContact1);
		if(trim($appointmentContactname2) != "" && trim($appointmentContact2) != "")
			$this->doctor_model->save_appointment_contact($docid,$appointmentContactname2,$appointmentContact2);
		if(trim($appointmentContactname3) != "" && trim($appointmentContact3) != "")
			$this->doctor_model->save_appointment_contact($docid,$appointmentContactname3,$appointmentContact3);


		$holiday_sunday = $userdata->sunday;
		$holiday_monday = $userdata->monday;
		$holiday_tuesday = $userdata->tuesday;
		$holiday_wednesday = $userdata->wednesday;
		$holiday_thursday = $userdata->thursday;
		$holiday_friday = $userdata->friday;
		$holiday_saturday = $userdata->saturday;


		$this->doctor_model->save_holidays($docid,$holiday_sunday,$holiday_monday,$holiday_tuesday,$holiday_wednesday,$holiday_thursday,$holiday_friday,$holiday_saturday);


		//$image_hospital = explode(",",trim(trim($userdata->image_hospital,"["),"]") );
		$image_hospital = json_decode($userdata->image_hospital);

		foreach ($image_hospital as $index => $imgname) {
			$this->doctor_model->save_clinic_image($docid,$imgname );
		}

		echo json_encode(array("success"=>1,"message"=>"Successfully registered with iHeal. Please wait for approval.","docid"=>$docid));

	}
	function update()
	{
		//echo json_encode(array("received data : "=>$this->input->get_post()));
		$userdata = json_decode($this->input->get_post('userdata'));
		
		
		$userid = $userdata->user_id;

		$doctorDB = $this->doctor_model->getDocDetailByUserid($userid);
		//print_r($doctorDB);

		$catid = $userdata->category;
		$doctor_name = $userdata->doctor_name;
		$email = $userdata->email;
		$contact = $userdata->doctor_mobile_no;
		$qualification = $userdata->qualification;
		$fees = $userdata->fees;

		$image_doctor = $userdata->image_doctor;
		
		if($doctorDB['doc_image']['imgname'] != $image_doctor)
		{
			//now first remove old image from server.
			if($doctorDB['doc_image']['imgname'] !== "")
			{
				$this->load->helper('path');
				$filepath = realpath(APPPATH.'../uploaded_images/'.$doctorDB['doc_image']['imgname']);
				$this->doctor_model->delete_image_by_name($filepath);
			}
		}

		$nearestmedical = $userdata->nearestmedical;

		$clinic_name = $userdata->hospital_name;
		$clinic_addrs_house_no = $userdata->hospital_address_house_no;
		$clinic_addrs_colony = $userdata->hospital_address_colony;

		$doctor_address_house_no = $userdata->doctor_address_house_no;
		$doctor_address_colony = $userdata->doctor_address_colony;

		$addrs_city_id = $userdata->address_city;
		$addrs_state_id = $userdata->address_state;

		$house_timing = $userdata->house_timing;
		$hospital_timing = $userdata->hospital_timing;

		$clinic_facility = $userdata->hospital_facility;

		$holidaytiming = $userdata->holiday_timing;

		$lat = $userdata->lat;
		$lng = $userdata->lng;

		$registration_number = $userdata->regno;
		$medical_contact = $userdata->medical_contact;

		$sortOrder = $this->doctor_model->get_sort_order_max($catid,$addrs_city_id);
				if($sortOrder === NULL)
					$sortOrder = 0;

		$sortOrder = $sortOrder+1;

		$docid = $doctorDB['id'];

		$this->doctor_model->update_doctor($docid,$catid,$doctor_name,$contact,$email,$qualification,$fees,
				$house_timing,$hospital_timing,$holidaytiming,$doctor_address_house_no,$doctor_address_colony,
				$image_doctor,$clinic_name,$clinic_facility,$clinic_addrs_house_no,$clinic_addrs_colony,
				$addrs_state_id,$addrs_city_id,$lat,$lng,$nearestmedical,$medical_contact,$sortOrder,$registration_number);

		$this->doctor_model->removeAppointmentcontacts($docid);

		$appointmentContactname1 = $userdata->appointment_contact_name_1;
		$appointmentContact1 = $userdata->appointment_contact_1;
		$appointmentContactname2 = $userdata->appointment_contact_name_2;
		$appointmentContact2 = $userdata->appointment_contact_2;
		$appointmentContactname3 = $userdata->appointment_contact_name_3;
		$appointmentContact3 = $userdata->appointment_contact_3;

		if(trim($appointmentContactname1) != "" && trim($appointmentContact1) != "")
			$this->doctor_model->save_appointment_contact($docid,$appointmentContactname1,$appointmentContact1);
		if(trim($appointmentContactname2) != "" && trim($appointmentContact2) != "")
			$this->doctor_model->save_appointment_contact($docid,$appointmentContactname2,$appointmentContact2);
		if(trim($appointmentContactname3) != "" && trim($appointmentContact3) != "")
			$this->doctor_model->save_appointment_contact($docid,$appointmentContactname3,$appointmentContact3);

		$this->doctor_model->removeHolidays($docid);

		$holiday_sunday = $userdata->sunday;
		$holiday_monday = $userdata->monday;
		$holiday_tuesday = $userdata->tuesday;
		$holiday_wednesday = $userdata->wednesday;
		$holiday_thursday = $userdata->thursday;
		$holiday_friday = $userdata->friday;
		$holiday_saturday = $userdata->saturday;


		$this->doctor_model->save_holidays($docid,$holiday_sunday,$holiday_monday,$holiday_tuesday,$holiday_wednesday,$holiday_thursday,$holiday_friday,$holiday_saturday);


		//$image_hospital = explode(",", trim(trim(trim($userdata->image_hospital,"["),"]"),"\"")  );
		$image_hospital = json_decode($userdata->image_hospital);

		$removeClinicImages = $this->doctor_model->getClinicImagesNotIn($docid,$image_hospital);

		$this->load->helper('path');
		foreach ($removeClinicImages as $index => $img) {
			$filepath = realpath(APPPATH.'../uploaded_images/'.$img['name']);
			$this->doctor_model->delete_image_by_name($filepath);

			$this->doctor_model->removeClinicImageById($img['id']);
		}
		$this->doctor_model->removeClinicImageByDocId($docid);

		foreach ($image_hospital as $imgname) {
			$this->doctor_model->save_clinic_image($docid,$imgname );
		}

		echo json_encode(array("success"=>1,"message"=>"Successfully updated your details.","docid"=>$docid));


	}
}