<?php

class Gcm extends CI_Controller
{

        function __construct()
	{
		parent::__construct();
		$this->load->model('gcm_model');
	}
        function mob_gcm_register()
	{
                $gcm_id = $this->input->post('gcm_id');
		$app_version = $this->input->post('app_version');
		$client_id = $this->input->post('client_id');
		$name = $this->input->post('name');
                $contact = $this->input->post('contact'); 
                $device_id = $this->input->post('device_id');
              if($gcm_id !== "")
              {
		$this->gcm_model->gcm_user_register($gcm_id,$app_version,$client_id,$name,$contact,$device_id);
	      }
		

        }

}