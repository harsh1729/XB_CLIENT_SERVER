<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Joke extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('joke_model');
	}
	
	function get_joke()
	{
		
				
				$this->load->model('client_model');
				$domainname = $this->input->post('domainname');

				$clientid = $this->client_model->get_client_id($domainname);
				$folders = $this->client_model->get_folder_name($domainname);

				
				
				
				/*$preview = $this->epaper_model->create_pdf_preview_image($foldername,$filename,0);
				$this->load->database();
				$this->db->reconnect();*/
				
				
				
				echo json_encode($this->joke_model->get_joke($folders,$clientid));
			
			
		
	}
	
}