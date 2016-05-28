<?php 
class Editorial extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('manthan_model');
	}
	function index($editorialid = false)
	{
		if(!$editorialid)
		{
			redirect('404');
		}
		else 
		{
			$this->load->model('client_model');
			$this->load->model('category_model');
			$domainname = rtrim(domain_name(),'/');
			$clientid = $this->client_model->get_client_id($domainname);
			if($clientid > 0)
			{
				$editorialclientid = $this->manthan_model->check_client($editorialid);
				if($editorialclientid > 0)
				{
					$datafoldername = $this->client_model->get_data_folder($clientid);
					$folders = $this->client_model->get_folder_name_by_id($clientid);

					$data['datafoldername'] = $datafoldername;
					$data['categories'] = $this->category_model->get_all_categories_format_tree($clientid,$folders);
					$data['maincontent'] = $this->manthan_model->get_detailed_top_editorial($clientid,1,false,$editorialid);
					if(count($data['maincontent']))
					{
						$omit_ids = $data['maincontent'][0]['id'];
					}
					$data['moreeditorialcontent'] = $this->manthan_model->get_detailed_top_editorial($clientid,1,$omit_ids);
					
					$this->load->view($datafoldername."template_editorial",$data);
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
}