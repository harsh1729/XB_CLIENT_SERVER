<?php

class Detail extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index($newsid = false)
	{
		if(!$newsid)
		{
			redirect('404');
		}
		else
		{
			$this->load->model('client_model');
			$this->load->model('category_model');
			$this->load->model('news_model');

			$domainname = rtrim(domain_name(),'/');
			$clientid = $this->client_model->get_client_id($domainname);
			if($clientid > 0)
			{
				$newsclientid = $this->news_model->get_client_id($newsid);
				if($newsclientid > 0)
				{
					$datafoldername = $this->client_model->get_data_folder($clientid);

					$data['datafoldername'] = $datafoldername;
					
					$folders = $this->client_model->get_folder_name_by_id($clientid);
					$data['categories'] = $this->category_model->get_all_categories_format_tree($clientid,$folders);

					/********************* NEWS DETAIL CODE START ****************//////////
					$news = $this->news_model->get_complete_news($newsid,$folders,1);

					$finalnewsarray = array();
					$finalnewsarray['datetime'] = $news['datetime'];
					$finalnewsarray['reportername'] = $news['reportername'];

					$allnews = array();

					$singlenews = array();

					$singlenews['id'] = $news['id'];
					$singlenews['heading'] = $news['heading'];
					$singlenews['content'] = $news['content'];
					$singlenews['image'] = $news['image'];
					$singlenews['imgtagline'] = $news['imgtagline'];

					array_push($allnews, $singlenews);

					foreach ($news['subnews'] as $index => $row)
					{
						$singlenews = array();

						$singlenews['id'] = $row['id'];
						$singlenews['heading'] = $row['heading'];
						$singlenews['content'] = $row['content'];
						$singlenews['image'] = $row['image'];
						$singlenews['imgtagline'] = $row['imgtagline'];

						array_push($allnews, $singlenews);
					}
					$finalnewsarray['news'] = $allnews;

					$data['datanewsdetail'] = $finalnewsarray;
					/********************** NEWS DETAIL CODE END  ***********/

					/********************** MORE NEWS FROM SAME CATEGORY START *****/

					$dtObj = new DateTime("now");
					$dtObj->setTimeZone(new DateTimeZone("GMT"));
					$enddate = $dtObj->format("d-m-Y");

					$catid = $this->news_model->get_cat_id($newsid);

					$omit_news_id = $newsid;
				
					$morenews = $this->news_model->get_news_list($catid,$folders,'',$enddate,14,0,'fresh',false,$omit_news_id);
					
					$data['categorymorenews'] = $morenews;
					/********************** MORE NEWS FROM SAME CATEGORY END *****/

					$this->load->view($datafoldername."template_detail",$data);
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

?>