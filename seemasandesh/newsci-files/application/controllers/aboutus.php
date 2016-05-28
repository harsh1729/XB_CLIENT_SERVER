<?php
class Aboutus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index($newsid = false)
	{
		$this->load->model('client_model');
		$this->load->model('category_model');

		$domainname = rtrim(domain_name(),'/');
		$clientid = $this->client_model->get_client_id($domainname);
		if($clientid > 0)
		{
			$datafoldername = $this->client_model->get_data_folder($clientid);
			$folders = $this->client_model->get_folder_name_by_id($clientid);

			$data['datafoldername'] = $datafoldername;
			
			$data['categories'] = $this->category_model->get_all_categories_format_tree($clientid,$folders);
			$this->load->view($datafoldername."template_aboutus",$data);
		}
		else
		{
			redirect('404');
		}
	}
}