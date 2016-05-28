<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
	}
	function get_all_categories()
	{
		$this->load->model('client_model');

		$domainname = $this->input->post('domainname');

		$clientid = $this->client_model->get_client_id($domainname);
		$folders = $this->client_model->get_folder_name($domainname);

		$categories = $this->category_model->get_all_categories_format_tree($clientid,$folders);

		echo json_encode($categories);
	}
}

/* End of file category.php */
/* Location: ./application/controllers/client_requests/category.php */