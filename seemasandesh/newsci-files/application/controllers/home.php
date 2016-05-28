<?php

class Home extends CI_Controller
{
	function index()
	{
		$this->load->model('client_model');
		$this->load->model('category_model');
		$this->load->model('news_model');

		$domainname = rtrim(domain_name(),'/');
		$clientid = $this->client_model->get_client_id($domainname);
		
		if($clientid > 0)
		{
			$datafoldername = $this->client_model->get_data_folder($clientid);
			$folders = $this->client_model->get_folder_name_by_id($clientid);

			$dtObj = new DateTime("now",new DateTimeZone('Asia/Kolkata'));
			//$dtObj->setTimeZone(new DateTimeZone("GMT"));
			$enddate = $dtObj->format("d-m-Y");
			$sqlenddate = $dtObj->format("Y-m-d");

			$data['datafoldername'] = $datafoldername;
			$limit = 12;
			
			$rootcatdata = $this->category_model->get_root_category($clientid,true);
			$rootcatid = $rootcatdata['id'];
			//$data['rootcategoryid'] = $rootcatdata['id'];
			$data['rootcategoryheading'] = $rootcatdata['name'];

                        $data['categories'] = $this->category_model->get_all_categories_format_tree($clientid,$folders);

                        $allnewscontent = $this->web_get_all_cat_n_news($clientid,$folders,$enddate,8,$data['categories'],$rootcatid);
			$data['content'] = $allnewscontent['categorynews'];
			$data['rootcontent'] = $allnewscontent['rootcatdata'];
			$this->load->view($datafoldername."template_home",$data);
		}
		else
		{
			redirect('404');
		}
	}	
	function web_get_all_cat_n_news($clientid,$folders,$enddate,$limit,$allcategories,$rootcatid)
	{
		$allnews = array();
		$rootcatnews = array();
		$catnews = $this->news_model->get_news_list_web($folders,$clientid);
		//echo "<pre>";
			//print_r($catnews);
		//	echo "</pre>";
		$newscatmap = array();
		foreach ($catnews as $row)
		{
			$singlenews = array();
			$singlenews['heading'] = $row['heading'];
			$singlenews['content'] = $row['content'];
			$singlenews['daytime'] = $row['datetime'];
			$singlenews['newsId'] = $row['id'];
			
			$images = array();
				
			if($row['image'] != "")
			{
				$singleimage = array();
				$singleimage['link'] = $row['image'];
				$singleimage['tagline'] = $row['imgtagline'];

				array_push($images, $singleimage);
			}
			if($row['containsSubNews'])
			{
				foreach ($this->news_model->get_complete_news($row['id'],$folders,0) as $subnewsrow)
				{
				
					if($subnewsrow['image'] != "")
					{
						$singleimage = array();
						$singleimage['link'] = $subnewsrow['image'];
						$singleimage['tagline'] = $subnewsrow['imgtagline'];
	
						array_push($images, $singleimage);
					}
				}
			}
			$singlenews['images'] = $images;
			
			if(isset($newscatmap[ $row['catid'] ]))
			{
				array_push($newscatmap[ $row['catid'] ],$singlenews);
			}
			else
			{
				$newscatmap[ $row['catid'] ] = array($singlenews);
			}
		}
		foreach ($allcategories as $value)
		{
			
			if(isset($newscatmap[$value['id']]))
			{
				if($value['id'] == $rootcatid)
				{
					$rootcatnews ['category'] = $value['name'];
					$rootcatnews ['categoryId'] = $value['id'];
					
					$rootcatnews ['detail'] = $newscatmap[$value['id']];
					
				}
				else
				{
					$singlecatnews = array();
					$singlecatnews['category'] = $value['name'];
					$singlecatnews['categoryId'] = $value['id'];
					
					$singlecatnews['detail'] = $newscatmap[$value['id']];
					array_push($allnews, $singlecatnews);
				}
			}
		}
		return array("categorynews"=>$allnews,"rootcatdata"=>$rootcatnews);
	}
}