<?php

class News extends CI_Controller
{

	function index($catid = false)
	{
		$this->load->model('client_model');
		$domainname = rtrim(domain_name(),'/');
		$clientid = $this->client_model->get_client_id($domainname);
		if($clientid > 0)
		{
			$this->load->model('category_model');
			$this->load->model('news_model');

			$datafoldername = $this->client_model->get_data_folder($clientid);
			$folders = $this->client_model->get_folder_name_by_id($clientid);

			if(!$catid)
			{
				// no catid is received, show data from root category....

				$catid = $this->category_model->get_root_category($clientid);
				$breakingnews = $this->web_get_breaking_news($catid,$folders);
			}
			else
			{
				// show data of received catid...
				//check if catid belongs to clientid...
				if($this->category_model->check_cat_client($clientid,$catid))
				{
					$breakingnews = $this->web_get_breaking_news($catid,$folders);
					
				}
				else
					redirect('404');
			}
			$data['datafoldername'] = $datafoldername;
			$data['breakingnews'] = $breakingnews;
			
			$data['categories'] = $this->category_model->get_all_categories_format_tree($clientid,$folders);
			$this->load->view($datafoldername."template_news",$data);
		}
		else
		{
			redirect('404');
		}
	}
	function web_get_breaking_news($catid,$folders)
	{
		$breakingnewsdata = $this->news_model->get_cat_top_news($catid,$folders);
		//print_r($breakingnewsdata);
		if(count($breakingnewsdata) > 0)
		{
			$breakingnews['id'] = $breakingnewsdata['id'];
			$breakingnews['heading'] = $breakingnewsdata['heading'];
			$breakingnews['mainimage'] = $breakingnewsdata['image'];
			$breakingnews['daytime'] = $breakingnewsdata['datetime'];
			$breakingnews['reportername'] = $breakingnewsdata['reportername'];
			return $breakingnews;
		}
		else
			return false;
	}

}

?>