<?php

class Doctor_model extends CI_Model
{
	public $HOSPITAL_IMAGE_UPLOAD_MAX_LIMIT = 15;

	function get_max_image_upload_limit()
	{
		return $this->HOSPITAL_IMAGE_UPLOAD_MAX_LIMIT;
		//return $HOSPITAL_IMAGE_UPLOAD_MAX_LIMIT;
	}

	function delete_image_by_name($filepath)
	{
		if(file_exists($filepath) && is_file($filepath))
			unlink($filepath);
	}
	function upload_image($upload_path)
	{
		if (!empty($_FILES))
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$replaceChars = array(" ",".");
			$timedImgName = time().(time()+rand(100,500)).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			
			$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$timedImgName;
			
			move_uploaded_file($tempFile,$targetFile);
			return $timedImgName;
		}
	}
	function updatesortorder($sortorder)
	{
		$data = array();
		foreach ($sortorder as $index => $value) {
			$temp = array('id'=>$value,'sort_order'=>$index);
			array_push($data, $temp);
		}

		$this->db->update_batch('doctor',$data,'id');
		return $this->db->last_query();
	}
	function get_sort_order_max($catid,$cityid)
	{
		$this->db->where('addrs_city_id',$cityid);
		$this->db->where('cat_id',$catid);
		$this->db->select_max('sort_order');
		$query = $this->db->get('doctor');

		return $query->result()[0]->sort_order;
	}
	function save_doctor($catid,$sortOrder,$name,$contact,$email,$qualification,$fees,$housetiming,$hospitaltiming,$holidaytiming,$doc_addrs_house_no,$doc_addrs_colony/*,$doc_addrs_state_id,$doc_addrs_city_id*/,$doc_image,$clinic_name,$clinic_facility,$clinic_addrs_house_no,$clinic_addrs_colony/*,$clinic_addrs_state_id,$clinic_addrs_city_id*/,$addrs_state_id,$addrs_city_id,$lat,$lng,$nearestmedical,$medical_contact,$userid=false,$registration_number=false)
	{
		$data = array(
			'cat_id' => $catid,
			'sort_order' => $sortOrder,
			'registration_number' => $registration_number,
			'name' => $name,
			'contact' => $contact,
			'email' => $email,
			'qualification' => $qualification,
			'fees' => $fees,
			'housetiming' => $housetiming,
			'clinictiming' => $hospitaltiming,
			'holidaytiming' => $holidaytiming,
			'doc_addrs_house_no' => $doc_addrs_house_no,
			'doc_addrs_colony' => $doc_addrs_colony,
			//'doc_addrs_state_id' => $doc_addrs_state_id,
			//'doc_addrs_city_id' => $doc_addrs_city_id,
			'doc_image' => $doc_image,
			'clinic_name' => $clinic_name,
			'clinic_facility' => $clinic_facility,
			'clinic_addrs_house_no' => $clinic_addrs_house_no,
			'clinic_addrs_colony' => $clinic_addrs_colony,
			//'clinic_addrs_state_id' => $clinic_addrs_state_id,
			//'clinic_addrs_city_id' => $clinic_addrs_city_id
			'addrs_state_id' => $addrs_state_id,
			'addrs_city_id' => $addrs_city_id,
			'lat' => $lat,
			'lng' => $lng,
			'nearestmedical' => $nearestmedical,
			'medical_contact' => $medical_contact
		);
		if($userid)
			$data['userid'] = $userid;
		else
			$data['userid'] = 0;

		$this->db->insert('doctor',$data);
		return $this->db->insert_id();
	}
	function update_doctor($docid,$catid/*,$sortOrder*/,$name,$contact,$email,$qualification,$fees,$housetiming,$hospitaltiming,$holidaytiming,$doc_addrs_house_no,$doc_addrs_colony/*,$doc_addrs_state_id,$doc_addrs_city_id*/,$doc_image,$clinic_name,$clinic_facility,$clinic_addrs_house_no,$clinic_addrs_colony/*,$clinic_addrs_state_id,$clinic_addrs_city_id*/,$addrs_state_id,$addrs_city_id,$lat,$lng,$nearestmedical,$medical_contact,$sortorder=false,$registration_number=false)
	{
		$data = array(
			'cat_id' => $catid,
			//'sort_order' => $sortOrder,
			'registration_number' => $registration_number,
			'name' => $name,
			'contact' => $contact,
			'email' => $email,
			'qualification' => $qualification,
			'fees' => $fees,
			'housetiming' => $housetiming,
			'clinictiming' => $hospitaltiming,
			'holidaytiming' => $holidaytiming,
			'doc_addrs_house_no' => $doc_addrs_house_no,
			'doc_addrs_colony' => $doc_addrs_colony,
			//'doc_addrs_state_id' => $doc_addrs_state_id,
			//'doc_addrs_city_id' => $doc_addrs_city_id,
			'doc_image' => $doc_image,
			'clinic_name' => $clinic_name,
			'clinic_facility' => $clinic_facility,
			'clinic_addrs_house_no' => $clinic_addrs_house_no,
			'clinic_addrs_colony' => $clinic_addrs_colony,
			//'clinic_addrs_state_id' => $clinic_addrs_state_id,
			//'clinic_addrs_city_id' => $clinic_addrs_city_id
			'addrs_state_id' => $addrs_state_id,
			'addrs_city_id' => $addrs_city_id,
			'lat' => $lat,
			'lng' => $lng,
			'nearestmedical' => $nearestmedical,
			'medical_contact' => $medical_contact
		);

		if($sortorder)
			$data['sort_order'] = $sortorder;

		$this->db->where('id',$docid);
		$this->db->update('doctor',$data);
		return $this->db->affected_rows();
	}

	function enabledisable($docid,$enable)
	{
		if($enable === "true")
			$val = 1;
		else
			$val = 0;
		$data = array(
				'isactive' => $val
			);

		$this->db->where('id',$docid);
		$this->db->update('doctor',$data);
		return $this->db->affected_rows();
	}

	function save_appointment_contact($doc_id,$name,$contact)
	{
		$data = array(
			'doc_id' => $doc_id,
			'name' => $name,
			'contact' => $contact
		);
		$this->db->insert('appointment_person',$data);
		return $this->db->insert_id();
	}
	function save_clinic_image($doc_id,$image)
	{
		$data = array(
			'doc_id' => $doc_id,
			'image' => $image
		);
		$this->db->insert('clinic_image',$data);
		return $this->db->insert_id();
	}
	function save_holidays($doc_id,$sunday,$monday,$tuesday,$wednesday,$thursday,$friday,$saturday)
	{
		$data = array(
			'doc_id' => $doc_id,
			'sunday' => $sunday,
			'monday' => $monday,
			'tuesday' => $tuesday,
			'wednesday' => $wednesday,
			'thursday' => $thursday,
			'friday' => $friday,
			'saturday' => $saturday
		);
		$this->db->insert('holidays',$data);
		return $this->db->insert_id();
	}
	function getAllDoctors($catid,$cityid,$active_non_active_filter = false)
	{
		$this->db->select('d.id,d.name,d.isactive,d.qualification,d.clinic_name,d.nearestmedical,d.medical_contact,d.doc_addrs_colony colony,c.name city,d.fees,d.doc_image image,d.contact,ap.contact apcontact,d.registration_number');
		$this->db->join('city c','c.id = d.addrs_city_id');
		$this->db->join('appointment_person ap','d.id = ap.doc_id','left');
		$this->db->where('d.cat_id',$catid);
		$this->db->where('d.addrs_city_id',$cityid);
		
		if($active_non_active_filter !== "all")
		{
			if($active_non_active_filter === "pending")
				$this->db->where('d.isactive',0);
			else if($active_non_active_filter === "approved")
				$this->db->where('d.isactive',1);
		}

		$this->db->order_by('sort_order','ASC');
		$this->db->group_by('d.id');
		$query = $this->db->get('doctor d');

		$allDoc = array();
		foreach ($query->result() as $index => $row) {
			$singleDoc = array();

			$singleDoc['id'] = $row->id;
			$singleDoc['name'] = $row->name;
			$singleDoc['qualification'] = $row->qualification;
			$singleDoc['clinic_name'] = $row->clinic_name;
			$singleDoc['address'] = $row->colony.", ".$row->city;
			$singleDoc['fees'] = $row->fees;
			$singleDoc['isactive'] = $row->isactive;
			$singleDoc['regno'] = $row->registration_number;
			$singleDoc['nearestmedical'] = $row->nearestmedical;
			$singleDoc['medical_contact'] = $row->medical_contact;
			if($row->image != "")
				$singleDoc['image'] = base_url('uploaded_images/'.$row->image);
			else
				$singleDoc['image'] = "";
			if(trim($row->apcontact) == "")
			{
				$singleDoc['contact'] = $row->contact;
			}
			else
			{
				$singleDoc['contact'] = $row->apcontact;
			}

			array_push($allDoc, $singleDoc);
		}
		return $allDoc;
		//return $this->db->last_query();
	}
	function getDocDetail($docId)
	{
		$this->db->select('d.*,h.id holiday_id,h.sunday,h.monday,h.tuesday,h.wednesday,h.thursday,h.friday,h.saturday');
		$this->db->join('holidays h','h.doc_id = d.id','left');
		$this->db->where('d.id',$docId);
		$query = $this->db->get('doctor d');

		$doctor = array();
		if($query->num_rows() > 0)
		{
			$row = $query->row(); 

			$doctor['id'] = $row->id;
			$doctor['cat_id'] = $row->cat_id;
			$doctor['sort_order'] = $row->sort_order;
			$doctor['regno'] = $row->registration_number;
			$doctor['name'] = $row->name;
			$doctor['contact'] = $row->contact;
			$doctor['email'] = $row->email;
			$doctor['qualification'] = $row->qualification;
			$doctor['fees'] = $row->fees;
			$doctor['housetiming'] = $row->housetiming;
			$doctor['clinictiming'] = $row->clinictiming;
			$doctor['holidaytiming'] = $row->holidaytiming;
			$doctor['doc_addrs_house_no'] = $row->doc_addrs_house_no;
			$doctor['doc_addrs_colony'] = $row->doc_addrs_colony;
			//$doctor['doc_addrs_city_id'] = $row->doc_addrs_city_id;
			//$doctor['doc_addrs_state_id'] = $row->doc_addrs_state_id;
			if($row->doc_image == "")
				$doctor['doc_image'] = array("imgname"=>$row->doc_image,"imglink"=>"");
			else
				$doctor['doc_image'] = array("imgname"=>$row->doc_image,"imglink"=>base_url("uploaded_images/".$row->doc_image));
			//$doctor['doc_image'] = array("imgname"=>"","imglink"=>base_url("uploaded_images/".$row->doc_image));
			$doctor['clinic_name'] = $row->clinic_name;
			$doctor['clinic_facility'] = $row->clinic_facility;
			$doctor['clinic_addrs_house_no'] = $row->clinic_addrs_house_no;
			$doctor['clinic_addrs_colony'] = $row->clinic_addrs_colony;
			//$doctor['clinic_addrs_city_id'] = $row->clinic_addrs_city_id;
			//$doctor['clinic_addrs_state_id'] = $row->clinic_addrs_state_id;
			$doctor['addrs_city_id'] = $row->addrs_city_id;
			$doctor['addrs_state_id'] = $row->addrs_state_id;
			$doctor['nearestmedical'] = $row->nearestmedical;
			$doctor['medical_contact'] = $row->medical_contact;

			$doctor['lat'] = $row->lat;
			$doctor['lng'] = $row->lng;

			$doctor['holiday_id'] = $row->holiday_id;
			$doctor['sunday'] = $row->sunday;
			$doctor['monday'] = $row->monday;
			$doctor['tuesday'] = $row->tuesday;
			$doctor['wednesday'] = $row->wednesday;
			$doctor['thursday'] = $row->thursday;
			$doctor['friday'] = $row->friday;
			$doctor['saturday'] = $row->saturday;
		}
		return $doctor;
	}
	function getDocDetailByUserid($userid)
	{
		$this->db->select('d.*,h.id holiday_id,h.sunday,h.monday,h.tuesday,h.wednesday,h.thursday,h.friday,h.saturday');
		$this->db->join('holidays h','h.doc_id = d.id','left');
		$this->db->where('d.userid',$userid);
		$query = $this->db->get('doctor d');

		//$doctor = array("No rows returned"=>$this->db->last_query());
		$doctor = array();
		if($query->num_rows() > 0)
		{
			$row = $query->row(); 

			$doctor['id'] = $row->id;
			$doctor['cat_id'] = $row->cat_id;
			$doctor['sort_order'] = $row->sort_order;
			$doctor['name'] = $row->name;
			$doctor['regno'] = $row->registration_number;
			$doctor['contact'] = $row->contact;
			$doctor['email'] = $row->email;
			$doctor['userid'] = $row->userid;
			$doctor['qualification'] = $row->qualification;
			$doctor['fees'] = $row->fees;
			$doctor['housetiming'] = $row->housetiming;
			$doctor['clinictiming'] = $row->clinictiming;
			$doctor['holidaytiming'] = $row->holidaytiming;
			$doctor['doc_addrs_house_no'] = $row->doc_addrs_house_no;
			$doctor['doc_addrs_colony'] = $row->doc_addrs_colony;
			//$doctor['doc_addrs_city_id'] = $row->doc_addrs_city_id;
			//$doctor['doc_addrs_state_id'] = $row->doc_addrs_state_id;
			if($row->doc_image == "")
				$doctor['doc_image'] = array("imgname"=>$row->doc_image,"imglink"=>"");
			else
				$doctor['doc_image'] = array("imgname"=>$row->doc_image,"imglink"=>base_url("uploaded_images/".$row->doc_image));
			//$doctor['doc_image'] = array("imgname"=>"","imglink"=>base_url("uploaded_images/".$row->doc_image));
			$doctor['clinic_name'] = $row->clinic_name;
			$doctor['clinic_facility'] = $row->clinic_facility;
			$doctor['clinic_addrs_house_no'] = $row->clinic_addrs_house_no;
			$doctor['clinic_addrs_colony'] = $row->clinic_addrs_colony;
			//$doctor['clinic_addrs_city_id'] = $row->clinic_addrs_city_id;
			//$doctor['clinic_addrs_state_id'] = $row->clinic_addrs_state_id;
			$doctor['addrs_city_id'] = $row->addrs_city_id;
			$doctor['addrs_state_id'] = $row->addrs_state_id;
			$doctor['nearestmedical'] = $row->nearestmedical;
			$doctor['medical_contact'] = $row->medical_contact;

			$doctor['lat'] = $row->lat;
			$doctor['lng'] = $row->lng;

			$doctor['holiday_id'] = $row->holiday_id;
			$doctor['sunday'] = $row->sunday;
			$doctor['monday'] = $row->monday;
			$doctor['tuesday'] = $row->tuesday;
			$doctor['wednesday'] = $row->wednesday;
			$doctor['thursday'] = $row->thursday;
			$doctor['friday'] = $row->friday;
			$doctor['saturday'] = $row->saturday;
		}
		return $doctor;
	}
	function getCallContact($docId)
	{
		$this->db->select('d.contact,ap.contact apcontact');
		$this->db->join('appointment_person ap','d.id = ap.doc_id','left');
		$this->db->where('d.id',$docId);
		$this->db->group_by('d.id');
		$query = $this->db->get('doctor d');

		$contact = "";
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			if(trim($row->apcontact) == "")
			{
				$contact = $row->contact;
			}
			else
			{
				$contact = $row->apcontact;
			}
		}
		return $contact;
	}
	function getDoctor($docId)
	{
		//$this->db->select('d.*,doc_c.name doc_city,doc_c.pincode doc_pincode,clnc_c.name clnc_city,clnc_c.pincode clnc_pincode,h.sunday,h.monday,h.tuesday,h.wednesday,h.thursday,h.friday,h.saturday');
		$this->db->select('d.*,c.name city,c.pincode pincode,h.sunday,h.monday,h.tuesday,h.wednesday,h.thursday,h.friday,h.saturday');
		$this->db->where('d.id',$docId);
		$this->db->join('city c','c.id = d.addrs_city_id','left');
		$this->db->join('holidays h','h.doc_id = d.id');
		$query = $this->db->get('doctor d');

		$doctor = array();
		foreach ($query->result() as $index => $row) {
			$doctor['id'] = $row->id;
			$doctor['regno'] = $row->registration_number;
			$doctor['name'] = $row->name;

			/*$doctor['address'] = $row->doc_addrs_house_no.", ".$row->doc_addrs_colony.", ".$row->doc_city.",".$row->doc_pincode."\n".
								 $row->clinic_name."\n".
								 $row->clinic_addrs_house_no.", ".$row->clinic_addrs_colony.", ".$row->clnc_city.",".$row->clnc_pincode;
			if($row->contact != "")
				$doctor['address'] .= "\n"."Mobile:".$row->contact;
			if($row->email != "")
				$doctor['address'] .= "\n"."Email:".$row->email;
*/	
			$doctor['address_residence'] = "";
			//$doctor['address_residence'] = $row->doc_addrs_house_no.", ".$row->doc_addrs_colony.", ".$row->doc_city.",".$row->doc_pincode;

			if($row->doc_addrs_house_no != "")
			{
				if($doctor['address_residence'] == "")
					$doctor['address_residence'] .= $row->doc_addrs_house_no;
				else
					$doctor['address_residence'] .= ", ".$row->doc_addrs_house_no;
			}
			if($row->doc_addrs_colony != "")
			{
				if($doctor['address_residence'] == "")
					$doctor['address_residence'] .= $row->doc_addrs_colony;
				else
					$doctor['address_residence'] .= ", ".$row->doc_addrs_colony;
			}
			if($row->city != "")
			{
				if($doctor['address_residence'] == "")
					$doctor['address_residence'] .= $row->city;
				else
					$doctor['address_residence'] .= ", ".$row->city;
			}
			if($row->pincode != "")
			{
				if($doctor['address_residence'] == "")
					$doctor['address_residence'] .= $row->pincode;
				else
					$doctor['address_residence'] .= ", ".$row->pincode;
			}

			$doctor['address_clinic'] = "";

			//$doctor['address_clinic'] = $row->clinic_name."\n".
			//							$row->clinic_addrs_house_no.", ".$row->clinic_addrs_colony.", ".$row->clnc_city.",".$row->clnc_pincode;

			if($row->clinic_name != "")
				$doctor['address_clinic'] = $row->clinic_name."\n";

			if($row->clinic_addrs_house_no != "")
			{
				if($doctor['address_clinic'] == "")
					$doctor['address_clinic'] .= $row->clinic_addrs_house_no;
				else
					$doctor['address_clinic'] .= $row->clinic_addrs_house_no;
			}
			if($row->clinic_addrs_colony != "")
			{
				if($doctor['address_clinic'] == "")
					$doctor['address_clinic'] .= $row->clinic_addrs_colony;
				else
					$doctor['address_clinic'] .= ", ".$row->clinic_addrs_colony;
			}
			if($row->city != "")
			{
				if($doctor['address_clinic'] == "")
				{
					//$doctor['address_clinic'] .= $row->city;
				}
				else
					$doctor['address_clinic'] .= ", ".$row->city;
			}
			if($row->pincode != "")
			{
				if($doctor['address_clinic'] == "")
				{
					//$doctor['address_clinic'] .= $row->pincode;
				}
				else
					$doctor['address_clinic'] .= ", ".$row->pincode;
			}

			if($row->contact != "")
			{
				if($doctor['address_clinic'] != "")
				{
					$doctor['address_clinic'] .= "\n"."Mobile:".$row->contact;
				}
			}
			if($row->email != "")
			{
				if($doctor['address_clinic'] != "")
				{
					$doctor['address_clinic'] .= "\n"."Email:".$row->email;
				}
			}


			$doctor['timing'] = "";

			/*if($row->clinictime_start != "00:00:00" && $row->clinictime_end != "00:00:00")
			{
				if($doctor['timing'] != "")
					$doctor['timing'] .= "\n";
				$doctor['timing'] .= "At Hospital: ".$row->clinictime_start." to ".$row->clinictime_end;
			}
			if($row->housetime_start != "00:00:00" && $row->housetime_end != "00:00:00")
			{
				if($doctor['timing'] != "")
					$doctor['timing'] .= "\n";
				$doctor['timing'] .= "At Home: ".$row->housetime_start." to ". $row->housetime_end;
			}*/

			if($row->housetiming != "")
			{
				if($doctor['timing'] != "")
					$doctor['timing'] .= "\n";
				$doctor['timing'] .= "At Residence: ".$row->housetiming;
			}
			if($row->clinictiming != "")
			{
				if($doctor['timing'] != "")
					$doctor['timing'] .= "\n";
				$doctor['timing'] .= "At Hospital: ".$row->clinictiming;
			}
			
			$doctor['nearestmedical'] = $row->nearestmedical;
			$doctor['medical_contact'] = $row->medical_contact;

			$daysArray = array();
			if($row->sunday == 1)
				array_push($daysArray,"Sunday");
			if($row->monday == 1)
				array_push($daysArray,"Monday");
			if($row->tuesday == 1)
				array_push($daysArray,"Tuesday");
			if($row->wednesday == 1)
				array_push($daysArray,"Wednesday");
			if($row->thursday == 1)
				array_push($daysArray,"Thursday");
			if($row->friday == 1)
				array_push($daysArray,"Friday");
			if($row->saturday == 1)
				array_push($daysArray,"Saturday");

			$tempHolidayString = "";
			$tempHolidayString = implode(",",$daysArray);

			if($tempHolidayString != "" && $row->holidaytiming != "")
			{
				if($doctor['timing'] != "")
					$doctor['timing'] .= "\n";
				$doctor['timing'] .= $tempHolidayString.": ".$row->holidaytiming;
			}

			/*if($tempHolidayString != "" && $row->holidaytime_start != "00:00:00" && $row->holidaytime_end != "00:00:00")
			{
				if($doctor['timing'] != "")
					$doctor['timing'] .= "\n";
				$doctor['timing'] .= $tempHolidayString.": ".$row->holidaytime_start." to ".$row->holidaytime_end;
			}*/

			$doctor['fees'] = $row->fees;
			$doctor['facility'] = $row->clinic_facility;
			$doctor['qualification'] = $row->qualification;

			if($row->doc_image != "")
				$doctor['image'] = base_url('uploaded_images/'.$row->doc_image);
			else
				$doctor['image'] = "";

			$doctor['lat'] = $row->lat;
			$doctor['lng'] = $row->lng;



			//$doctor['contact'] = $row->contact;
			//$doctor['email'] = $row->email;
			//$doctor['qualification'] = $row->qualification;
			//$doctor['fees'] = $row->fees;
			//$doctor['housetime_start'] = $row->housetime_start;
			//$doctor['housetime_end'] = $row->housetime_end;
			//$doctor['clinictime_start'] = $row->clinictime_start;
			//$doctor['clinictime_end'] = $row->clinictime_end;
			//$doctor['holidaytime_start'] = $row->holidaytime_start;
			//$doctor['holidaytime_end'] = $row->holidaytime_end;
			//$doctor['address'] = $row->doc_addrs_house_no.", ".$row->doc_addrs_colony.", ".$row->doc_city.",".$row->doc_pincode;
			//if($row->image != "")
			//	$singleDoc['image'] = base_url('uploaded_images/'.$row->image);
			//else
			//	$singleDoc['image'] = "";
			//$doctor['clinicname'] = $row->clinic_name;
			//$doctor['clinic_address'] = $row->clinic_addrs_house_no.", ".$row->clinic_addrs_colony.", ".$row->clnc_city.",".$row->clnc_pincode;
		}
		return $doctor;
	}
	function getClinicImageById($imgid)
	{
		$this->db->where('id',$imgid);
		$query = $this->db->get('clinic_image');

		$image = array();
		if($query->num_rows() > 0)
		{
			$row = $query->row(); 

			$image['id'] = $row->id;
			$image['name'] = $row->image;
		}
		return $image;
	}
	function removedoctor($docid)
	{
		$this->db->where('id',$docid);
		$this->db->delete('doctor');
		return $this->db->affected_rows();
	}
	function removeHolidays($docid)
	{
		$this->db->where('doc_id',$docid);
		$this->db->delete('holidays');
		return $this->db->affected_rows();	
	}
	function removeAppointmentcontacts($docid)
	{
		$this->db->where('doc_id',$docid);
		$this->db->delete('appointment_person');
		return $this->db->affected_rows();
	}
	function removeClinicImageById($imgid)
	{
		$this->db->where('id',$imgid);
		$this->db->delete('clinic_image'); 
		return $this->db->affected_rows();
	}
	function removeClinicImageByDocId($docid)
	{
		$this->db->where('doc_id',$docid);
		$this->db->delete('clinic_image'); 
		return $this->db->affected_rows();
	}
	function getDocClinicDetailedImages($docId)
	{
		$this->db->where('doc_id',$docId);
		$query = $this->db->get('clinic_image');

		$allimg = array();
		foreach ($query->result() as $index => $row) {
			$img = array();
			$img['id'] = $row->id;
			$img['name'] = $row->image;
			$img['image'] = base_url('uploaded_images/'.$row->image);
			array_push($allimg,$img);
		}
		return $allimg;
	}
	function getClinicImagesNotIn($docid,$image_hospital)
	{
		$allimg = array();
		if(count($image_hospital)>0)
		{
			$this->db->where('doc_id',$docid);
			$this->db->where_not_in('image',$image_hospital);
			$query = $this->db->get('clinic_image');

			foreach ($query->result() as $index => $row) {
				$img = array();
				$img['id'] = $row->id;
				$img['name'] = $row->image;
				$img['image'] = base_url('uploaded_images/'.$row->image);
				array_push($allimg,$img);
			}
		}
		return $allimg;
	}
	function getDocClinicImages($docId,$onlyNames = false)
	{
		$this->db->where('doc_id',$docId);
		$query = $this->db->get('clinic_image');

		$allimg = array();
		foreach ($query->result() as $index => $row) {
			if($onlyNames)
				array_push($allimg,$row->image);
			else
				array_push($allimg,base_url('uploaded_images/'.$row->image));
		}
		return $allimg;
	}
	function getDocImage($docId)
	{
		$this->db->select('id,doc_image');
		$this->db->where('id',$docId);
		$query = $this->db->get('doctor');

		if($query->num_rows() > 0)
		{
			$row = $query->row(); 

			if($row->doc_image != "")
				$image=$row->doc_image;
			else
				$image = false;
		}
		return $image;
	}
	function getDocContactPersons($docId)
	{
		$this->db->where('doc_id',$docId);
		$query = $this->db->get('appointment_person');

		$allperson = array();
		foreach ($query->result() as $index => $row) {

			$person = array();
			$person['id'] = $row->id;
			$person['name'] = $row->name;
			$person['contact'] = $row->contact;

			array_push($allperson, $person);
		}
		return $allperson;	
	}
	function getAppointmentPersons($docId)
	{
		$this->db->where('doc_id',$docId);
		$query = $this->db->get('appointment_person');

		$allperson = "";
		foreach ($query->result() as $index => $row) {

			if($index>0)
				$allperson .= "\n".$row->name.": ".$row->contact;
			else if($index==0)
				$allperson .= $row->name.": ".$row->contact;
		}
		return $allperson;
	}
	function update_doc_img_name($docid,$image)
	{
		$data = array(
					"doc_image"=>$image
				);
		$this->db->where('id',$docid);
		$this->db->update('doctor', $data);

		return $this->db->affected_rows();
	}	

	function upload_image_mob($upload_path,$keys)
    {
       
		if (!empty($_FILES))
		{
			$imagename = array();
			$arrayKeys =  explode(",", $keys);
           
			foreach ($arrayKeys as $key)
			{
				//$tempFile = $_FILES[$key]['tmp_name'];
				//$replaceChars = array(" ",".");
				//$timedImgName = time().str_replace($replaceChars,"_",$_FILES[$key]['name']);

				//$targetFile =  $upload_path."/".$this->str_lreplace("_",".",$timedImgName);

				//$CI =& get_instance();
				//$CI->load->library('xerces_globals');
				//$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$timedImgName);

				//move_uploaded_file($tempFile,$targetFile);
				//return $this->str_lreplace("_",".",$timedImgName);
				// $imagenamearray = array("$i" => $timedImgName);
				//array_push($imagename,$timedImgName);
				//$fullname = $i."_".$timedImgName;

				$tempFile = $_FILES[$key]['tmp_name'];
				$replaceChars = array(" ",".");
				$timedImgName = time().(time()+rand(100,500)).".".pathinfo($_FILES[$key]['name'],PATHINFO_EXTENSION);
				
				$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$timedImgName;
				
				move_uploaded_file($tempFile,$targetFile);
				//return $timedImgName;

				$imagename[$key.""] = $timedImgName;
			} 
			return $imagename;
			
		}
		else
			return "";
	} 

	function does_exists($email,$contact,$username)
	{
		$query = $this->db->query("select * from (
										SELECT doctor.*,user.username,user.password,user.isadmin FROM `doctor` 
										LEFT JOIN user ON user.id = doctor.userid
										UNION
										SELECT doctor.*,user.username,user.password,user.isadmin FROM `doctor` 
										RIGHT JOIN user ON user.id = doctor.userid) as t1 
										where t1.contact = '".$contact."' or 
										t1.email = '".$email."' or 
										t1.username = '".$username."'
								");
		$email_exists = 0;
		$contact_exists = 0;
		$username_exists = 0;
		$duplicate_exists = 0;
		if($query->num_rows() > 0 )
		{
			$duplicate_exists = 1;
			foreach ($query->result() as $row) {
				if($row->email == $email)
					$email_exists = 1;
				if($row->contact == $contact)
					$contact_exists = 1;
				if($row->username == $username)
					$username_exists = 1;
			}
		}
		return array(
						"duplicate_exists"=>$duplicate_exists,
						"email_exists"=>$email_exists,
						"username_exists"=>$username_exists,
						"contact_exists"=>$contact_exists
					);
	} 
	function register_doctor($name,$contact,$email,$userid)
	{
		$data = array(
					'name'	=>	$name,
					'contact'	=>	$contact,
					'email'	=>	$email,
					'userid'	=>	$userid
				);
		$this->db->insert('doctor',$data);
		return $this->db->insert_id();
	}
}