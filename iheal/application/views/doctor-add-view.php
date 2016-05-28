<div class="row">
	<div class="col-md-12">
		<form action="<?=base_url();?>admin_requests/doctor/insertDoctor" method="POST" id="doctor_entry_form">
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Choose Category:
				</div>
				<div class="col-md-5">
					<select style="" name="category" class="form-control" required="required">
						<option value="">Select Doctor Category</option>
						<?php foreach ($categories as $index => $row):?>
							<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Doctor Image:
				</div>
				<div class="col-md-3">
					<div id="Ddropzone" class="dropzone text-center" action="<?=base_url()?>admin_requests/doctor/upload_image" style="min-height:200px; background-color:#aaaaaa;border:1px solid #666666;border-radius:10px;">
					</div>
					<input type="hidden" id="image_doctor" name="image_doctor">
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Registration Number:
				</div>
				<div class="col-md-5">
					<input type="text" name="regno" id="registration_number" placeholder="Registration Number" class="form-control lang_class" required="required">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Doctor Name:
				</div>
				<div class="col-md-5">
					<input type="text" name="doctor_name" id="doctor_name" placeholder="Doctor Name" class="form-control lang_class" required="required">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Doctor Mobile No:
				</div>
				<div class="col-md-5">
					<input type="text" name="doctor_mobile_no" id="doctor_mobile_no" placeholder="Mobile No" class="form-control">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Doctor Email:
				</div>
				<div class="col-md-5">
					<input type="email" name="email" id="email" placeholder="Doctor Email" class="form-control">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Doctor Qualification:
				</div>
				<div class="col-md-5">
					<textarea placeholder="Qualification" name="qualification" id="qualification" rows="4" class="form-control lang_class"></textarea>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-2">
					Appointment Contacts:
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-5">
							<input type="text" placeholder="contact person's name" name="appointment_contact_name_1" id="appointment_contact_name_1" class="form-control">
						</div>
						<div class="col-md-7">
							<input type="text" placeholder="Contact Number" name="appointment_contact_1" id="appointment_contact_1" class="lang_class form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<input type="text" placeholder="contact person's name" name="appointment_contact_name_2" id="appointment_contact_name_2" class="form-control">
						</div>
						<div class="col-md-7">
							<input type="text" placeholder="Contact Number" name="appointment_contact_2" id="appointment_contact_2" class="lang_class form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
							<input type="text" placeholder="contact person's name" name="appointment_contact_name_3" id="appointment_contact_name_3" class="form-control">
						</div>
						<div class="col-md-7">
							<input type="text" placeholder="Contact Number" name="appointment_contact_3" id="appointment_contact_3" class="lang_class form-control">
						</div>
					</div>				
				</div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Doctor Fees:
				</div>
				<div class="col-md-5">
					<input type="number" placeholder="Fees" name="fees" id="fees" min="0" class="form-control" required="required">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Holidays:
				</div>
				<div class="col-md-5">
					<span style=""><input type="checkbox" name="holiday_sunday" id="holiday_sunday" class="" style="height:15px;width:15px;">SunDay </span>
					<span style="margin-left:10px;"><input name="holiday_monday" id="holiday_monday" type="checkbox" class="" style="height:15px;width:15px;">MonDay </span>
					<span style="margin-left:10px;"><input name="holiday_tuesday" id="holiday_tuesday" type="checkbox" class="" style="height:15px;width:15px;">TuesDay </span>
					<span style="margin-left:10px;"><input name="holiday_wednesday" id="holiday_wednesday" type="checkbox" class="" style="height:15px;width:15px;">WednesDay </span><br>
					<span style=""><input type="checkbox" name="holiday_thursday" id="holiday_thursday" class="" style="height:15px;width:15px;">ThursDay </span>
					<span style="margin-left:10px;"><input name="holiday_friday" id="holiday_friday" type="checkbox" class="" style="height:15px;width:15px;">FriDay </span>
					<span style="margin-left:10px;"><input name="holiday_saturday" id="holiday_saturday" type="checkbox" class="" style="height:15px;width:15px;">SaturDay</span>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Doctor Timing:
					<div style="float:right;">House Timing:</div>
				</div>
				<div class="col-md-5">
					<!--<input type="text" placeholder="House Timing" name="house_timing" id="house_timing" class="form-control lang_class">-->
					<textarea rows="2" placeholder="Morningː 00ː00 AM to 00ː00 PM
Eveningː 00ː00 AM to 00ː00 PM" name="house_timing" id="house_timing" class="form-control lang_class"></textarea>
					<!--From : <input type="time" style="line-height:inherit;" name="housetime_start" id="housetime_start"/> To : <input type="time" style="line-height:inherit;" name="housetime_end" id="housetime_end"/>-->
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3 text-right">
					Hospital Timing:
				</div>
				<div class="col-md-5">
					<!--<input type="text" placeholder="Hospital Timing" name="hospital_timing" id="hospital_timing" class="form-control lang_class">-->
					<textarea rows="2" placeholder="Morningː 00ː00 AM to 00ː00 PM
Eveningː 00ː00 AM to 00ː00 PM" name="hospital_timing" id="hospital_timing" class="form-control lang_class"></textarea>
					<!--From : <input type="time" style="line-height:inherit;" name="hospitaltime_start" id="hospitaltime_start"/> To : <input type="time" style="line-height:inherit;" name="hospitaltime_end" id="hospitaltime_end"/>-->
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3 text-right">
					Holiday Timing:
				</div>
				<div class="col-md-5">
					<!--<input type="text" placeholder="Holiday Timing" name="holiday_timing" id="holiday_timing" class="form-control lang_class">-->
					<textarea rows="2" placeholder="Morningː 00ː00 AM to 00ː00 PM
Eveningː 00ː00 AM to 00ː00 PM" name="holiday_timing" id="holiday_timing" class="form-control lang_class"></textarea>
					<!--From : <input type="time" style="line-height:inherit;" name="holidaytime_start" id="holidaytime_start"/> To : <input type="time" style="line-height:inherit;" name="holidaytime_end" id="holidaytime_end"/>-->
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Address:
					<div style="float:right;">Residential Line 1:</div>
				</div>
				<div class="col-md-5">
					<input type="text" placeholder="House No." name="doctor_address_house_no" id="doctor_address_house_no" class="form-control" >
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3 text-right">
					Residential Line 2:
				</div>
				<div class="col-md-5">
					<input type="text" placeholder="colony" name="doctor_address_colony" id="doctor_address_colony" class="form-control lang_class">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-4"></div>
				<div class="col-md-6">
					<div style="border:1px dashed #666;"></div>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3 text-right">
					Hospital Name:
				</div>
				<div class="col-md-5">
					<input type="text" placeholder="Hospital Name" id="hospital_name" name="hospital_name" class="form-control lang_class">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3 text-right">
					Clinic Line 1:
				</div>
				<div class="col-md-5">
					<input type="text" placeholder="House No." name="hospital_address_house_no" id="hospital_address_house_no" class="form-control">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3 text-right">
					Clinic Line 2:
				</div>
				<div class="col-md-5">
					<input type="text" placeholder="colony" name="hospital_address_colony" id="hospital_address_colony" class="form-control lang_class">
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-4"></div>
				<div class="col-md-6">
					<div style="border:1px dashed #666;"></div>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3 text-right">
					<label>Choose location on Map <input name="mapenable" id="mapenable" type="checkbox" /></label> :
				</div>
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-6">
							<span id="lat" data-lat="0" class="label label-info">Lat:0</span>
						</div>
						<div class="col-md-6">
							<span id="lng" data-lng="0" class="label label-info">Long:0</span>
						</div>
						<div class="col-md-12">
							<input id="pac-input" class="controls" type="text" placeholder="Search Box" style="display:none;">
							<div style="height:300px;width:100%;background-color:#aaa;border:1px solid #555;border-radius:3px;" id="map-canvas"></div>
						</div>
						<div id="mapblock" style="height:100%;width:100%;z-index:1000;position:absolute;background-color:rgba(0,0,0,.9);border:1px solid #000;border-radius:3px;color:#fff;padding-top:150px;font-size:1.5em;" class="text-center">
							<u>Map Disabled</u>
						</div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3 text-right">
					Choose State:
				</div>
				<div class="col-md-5">
					<!--<input type="text" placeholder="state" name="state" id="state" class="form-control lang_class">-->
					<select name="address_state" id="address_state" class="form-control" required="required">
						<option value="">choose State</option>
						<?php foreach ($states as $index => $row):?>
							<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3 text-right">
					Choose City:
				</div>
				<div class="col-md-5">
					<!--<input type="text" placeholder="city" name="city" id="city" class="form-control lang_class">-->
					<select name="address_city" id="address_city" class="form-control" required="required">
					</select>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Hospital Facility:
				</div>
				<div class="col-md-5">
					<textarea rows="4" class="form-control lang_class" name="hospital_facility" id="hospital_facility" placeholder="Hospital Facility"></textarea>
				</div>
				<div class="col-md-2"></div>
			</div>
			
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Nearest Medical Stores:
				</div>
				<div class="col-md-5">
					<textarea rows="4" class="form-control lang_class" name="nearestmedical" id="nearestmedical" placeholder="Nearest Medical Store"></textarea>
				</div>
				<div class="col-md-2"></div>
			</div>

			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Medical Store Contact Number:
				</div>
				<div class="col-md-5">
					<textarea rows="1" class="form-control lang_class" name="medical_contact" id="medical_contact" placeholder="Nearest Medical Store Contact Number" style="resize:none;"></textarea>
				</div>
				<div class="col-md-2"></div>
			</div>
			
			<div class="row" style="margin-top:20px;">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					Hospital Images:
				</div>
				<div class="col-md-6" id="container_hospital">
					<div id="Hdropzone" id="" class="dropzone text-center" action="<?= base_url()?>admin_requests/doctor/upload_image" style="min-height:200px; background-color:#aaaaaa;border:1px solid #666666;border-radius:10px;">
					</div>
					<input type="hidden" name="no_of_H_img" id="no_of_H_img">
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="row" style="margin-top:40px;margin-bottom:20px;">
				<div class="col-md-5"></div>
				<div class="col-md-2">
					<input type="submit" class="btn btn-success btn-lg btn-block" value="submit">
				</div>
				<div class="col-md-5"></div>
			</div>
		</form>
	</div>
</div>