<?php
class News extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}
	function mob_get_cat_news()
	{
		$finalArray = array();
		$this->load->model('appconfig_model');
		$this->load->model('category_model');
		$this->load->model('client_model');
		//receive either client-id
		//receive version number and then check if version mismatch, then send categories and news else send news only.
		
		$clientid = $this->input->get_post('clientid');
		$limit =  $this->input->get_post('limit');
		$appconfigversion = 0;
        $catversion = 0;
        $omit_news_id = 0;
		
		if($clientid)
		{
			if($this->client_model->does_exists($clientid))
			{
				$server_catversion = -1;//$this->category_model->get_version($clientid);
				$server_appconfigversion = $this->appconfig_model->get_version($clientid);

				$folders = $this->client_model->get_folder_name_by_id($clientid);
				if($server_appconfigversion != $appconfigversion)
				{
					$finalArray['appconfig_need_update'] = 1;
					$finalArray['appconfig_version'] = $server_appconfigversion;
					$finalArray['appconfig'] = $this->appconfig_model->get_appconfig($clientid);
				}
				else
				{
					$finalArray['appconfig_need_update'] = 0;
				}
				if($server_catversion != $catversion)
				{
					$finalArray['categories_need_update'] = 1;
					$finalArray['category_version'] = $server_catversion;
					$finalArray['categories'] = $this->category_model->get_all_categories($clientid,$folders);
				}
				else
				{
					$finalArray['categories_need_update'] = 0;
				}
				$catid =0;//$this->category_model->get_root_category($clientid);
				
				$dtObj = new DateTime("now");
				$dtObj->setTimeZone(new DateTimeZone("GMT"));
				$enddate = $dtObj->format("d-m-Y");
                
				$newsArray = array();
                                

				$userid = false;
				$domainname = $this->client_model->get_domainname($clientid);
				$lastnewsdate = $this->news_model->get_news_date_by_id(0);
				//if($lastnewsdate === false)
				//{
				//	$lastnewsdate
				//}
				
				$newsArray = $this->news_model->get_news_list($catid,$folders,'',$enddate,$limit,0,'fresh',$userid,$omit_news_id,$clientid,$domainname,$lastnewsdate);

				$finalArray['news'] = $newsArray;  
				echo json_encode($finalArray);
				//echo "<pre>";
				//print_r($finalArray);
				//echo "</pre>";
			}
		}
	}
	
	function mob_get_news_by_category()
	{
		$this->load->model('category_model');
		$this->load->model('client_model');

               
		$calltype = $this->input->get_post('calltype');
		$lastnewsid = $this->input->get_post('lastnewsid');
		$catid = $this->input->get_post('catid');
		$limit = $this->input->get_post('limit');

		$startdate = $this->input->get_post('startdate');
		$enddate = $this->input->get_post('enddate');
		$isneedtopnews =  $this->input->get_post('isneedtopnews');
		$clientid = $this->input->get_post('clientid');
		
                 
		/*$calltype = 'fresh';
		$lastnewsid = 0; //This must be greater than zero !
		$catid = 19;
		$limit = 10;
                $startdate = false;//"25-03-2015";
		$enddate = false;//"06-05-2015";
		$isneedtopnews = false;
        	$clientid = 2;
*/
                //Commented by harsh because below line fails when catid = -353 for all categories
		//$clientid = $this->category_model->get_client_id($catid); 
                
		if($clientid)
		{
			if($enddate === false)
			{
				$dtObj = new DateTime("now");
				$dtObj->setTimeZone(new DateTimeZone("GMT"));
				$enddate = $dtObj->format("d-m-Y");
			}
			else
			{
				//enddate of post variable i.e. same
			}

			if($startdate === false)
			{
				$startdate = '';
			}
			else
			{
				//startdate of post variable i.e. same
			}
			$folders = $this->client_model->get_folder_name_by_id($clientid);
			$omit_top_news = true;
			$userid = false;

			$finalArray = array();
			
			$omit_news_id = 0;
				
				if($isneedtopnews){
					$topNewsArray = $this->news_model->get_cat_top_news($catid,$folders);
					if(count($topNewsArray) > 0){
						$omit_news_id = $topNewsArray['id'];
						$finalArray['topnewsid'] = $topNewsArray['id'];
						//array_push($newsArray, $topNewsArray);
				}else{ 	 	
						$finalArray['topnewsid'] = 0 ; 	 	
					}
				}
			$domainname = $this->client_model->get_domainname($clientid);

			$lastnewsdate = $this->news_model->get_news_date_by_id($lastnewsid);

			$newsArray =  $this->news_model->get_news_list($catid,$folders,$startdate,$enddate,$limit,$lastnewsid,$calltype,$userid,$omit_news_id,$clientid,$domainname,$lastnewsdate);

                        if($isneedtopnews){
					if(count($topNewsArray) > 0){
                                                array_push($newsArray, $topNewsArray);
                                        }
                                 }
			$finalArray['news'] = $newsArray;

			echo json_encode($finalArray);

		}
	}
	function mob_get_news_detail()
	{
		$newsid = $this->input->get_post('newsid');
		//$newsid = 1;

		$clientid = $this->news_model->get_client_id($newsid);
		
    //    $clientid =4;
		// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
		$this->load->model('client_model');
		$folders = $this->client_model->get_folder_name_by_id($clientid);
		$domainname = $this->client_model->get_domainname($clientid);
		echo json_encode($this->news_model->get_complete_news($newsid,$folders,0,$domainname));
	}


	function web_get_cat_news()
	{

		$this->load->model('category_model');
		$this->load->model('client_model');
		$this->load->library('xerces_globals');

		$calltype = $this->input->post('calltype');
		$lastnewsid = $this->input->post('lastnewsid');
		$catid = $this->input->post('catid');
		$limit = $this->input->post('limit');
		$domainname = $this->input->post('domainname');

		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		/*$calltype = 'fresh';
		$lastnewsid = 0; //This must be greater than zero !
		$catid = 3;
		$limit = 10;
*/
		$clientid = $this->client_model->get_client_id($domainname);

		if(!$catid)
		{
			$catid = $this->category_model->get_root_category($clientid);
		}

		if($clientid)
		{
			if($enddate === false)
			{
				$dtObj = new DateTime("now");
				$dtObj->setTimeZone(new DateTimeZone("GMT"));
				$enddate = $dtObj->format("d-m-Y");
			}
			else
			{
				//enddate of post variable i.e. same
			}

			if($startdate === false)
			{
				$startdate = '';
			}
			else
			{
				//startdate of post variable i.e. same
			}
			$folders = $this->client_model->get_folder_name_by_id($clientid);

			$omit_news_id = 0;
			$finalArray = array();

			$topNewsArray = $this->news_model->get_cat_top_news($catid,$folders);
			
			if(count($topNewsArray) > 0){
				$omit_news_id = $topNewsArray['id'];
			}

			$userid = false;

			$lastnewsdate = $this->news_model->get_news_date_by_id($lastnewsid);
			
			//$finalArray['news'] =  $this->news_model->get_news_list($catid,$folders,$startdate,$enddate,$limit,$lastnewsid,$calltype,$userid,$omit_top_news);
			foreach ($this->news_model->get_news_list($catid,$folders,$startdate,$enddate,$limit,$lastnewsid,$calltype,$userid,$omit_news_id,false,false,$lastnewsdate) as $row)
			{
				$singlenews = array();

				$singlenews['newsid'] = $row['id'];
				$singlenews['heading'] = $row['heading'];
				//$singlenews['content'] = nl2br($this->xerces_globals->extract_paragraph($row['content'],2));
				$singlenews['content'] = $row['content'];
				$singlenews['datetime'] = $row['datetime'];
				$singlenews['reportername'] = $row['reportername'];
				$images = array();

				if($row['image'] != "")
				{
					$singleimage = array();
					$singleimage['link'] = $row['image'];
					$singleimage['tagline'] = $row['imgtagline'];
					array_push($images, $singleimage);
				}
					foreach ($this->news_model->get_complete_news($row['id'],$folders,0) as $subnewsrow)
					{
						$singleimage = array();
						$singleimage['link'] = $subnewsrow['image'];
						$singleimage['tagline'] = $subnewsrow['imgtagline'];
						array_push($images, $singleimage);
					}

				$singlenews['images'] = $images;

				array_push($finalArray, $singlenews);
			}
			/*echo "<pre>";
			print_r($finalArray);
			echo "</pre>";*/
			echo json_encode($finalArray);
		}
	}
}