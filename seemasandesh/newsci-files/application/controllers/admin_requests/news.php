<?php

class News extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}
	/*function test($catid)
	{
			$startdate = '04-03-2015';
			$enddate = '11-03-2015';
			$calltype = 'fresh';
			$lastnewsid = 0;
			$limit = 2;
			$offset = 0;

			// EXTRACT CLIENT ID WITH THE HELP OF DOMAIN NAME !!!
			$this->load->model('client_model');
			$clientid = $this->client_model->get_client_id($this->input->post('domainname'));
			$folders = $this->client_model->get_folder_name($this->input->post('domainname'));

			$userid = $this->session->userdata('user_id');


			echo "<pre>";
			//echo $this->News_model->get_more_news($catid,$folders,$startdate,$enddate,$limit,$offset,$lastnewsid,$userid);
			echo $this->News_model->get_top_news($catid,$folders,$startdate,$enddate,$limit,$userid);
			echo "</pre>";
	}
	function test2()
	{
		$this->load->model('client_model');
		echo $this->client_model->get_folder_name('http://localhost')['newsimagespath'];
	}*/
	function delete_news()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$newsid = $this->input->post('newsid');
				
				$domainname = $this->input->post('domainname');
				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				$clientid = $this->client_model->get_client_id($domainname);
				$folders = $this->client_model->get_folder_name($domainname);

				$this->News_model->delete_image($newsid,$folders);
				$this->News_model->deletecategorynewsmaping($clientid,$newsid);
				echo $this->News_model->delete_news($newsid);
			}
		}
	}
	function update_news()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$postdata = $this->input->post('news');
				//echo json_encode($postdata);
				$newsidArray = array();
				foreach ($postdata as $key => $value)
				{
					$heading = $value['heading'];
					$content = $value['content'];
					$imgtagline = $value['tagline'];
					$newsid = $value['newsid'];
					$newsid = $this->News_model->update_news($heading,$content,$imgtagline,$newsid);
					array_push($newsidArray, $newsid);
				}
				$domainname = $this->input->post('domainname');
				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				//$clientid = $this->client_model->get_client_id($domainname);
				$folders = $this->client_model->get_folder_name($domainname);

				$newsid = $this->News_model->get_main_newsid($newsidArray);
				echo $this->News_model->get_main_news($newsid,$folders);
			}
		}
	}
	function update_subnews()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$newsid = $this->input->post('newsid');
				$heading = $this->input->post('heading');
				$content = $this->input->post('content');
				$imgtagline = $this->input->post('imgtagline');
				$this->News_model->update_subnews($newsid,$heading,$content,$imgtagline);
			}
		}
	}
	function get_main_news()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$newsid = $this->input->post('newsid');
			$domainname = $this->input->post('domainname');

			// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
			$this->load->model('client_model');
			//$clientid = $this->client_model->get_client_id($domainname);
			$folders = $this->client_model->get_folder_name($domainname);

			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->session->userdata('user_id');

				echo $this->News_model->get_main_news($newsid,$folders);
			}
		}
	}
	function get_news()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$catid = $this->input->post('catid');
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');

			if($startdate === false)
				$startdate = '';
			if($enddate === false)
				$enddate = '';

			$calltype = $this->input->post('calltype');
			$lastnewsid = $this->input->post('lastnewsid');
			$limit = $this->input->post('limit');
			$offset = $this->input->post('offset');
			$domainname = $this->input->post('domainname');

			// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
			$this->load->model('client_model');
			$this->load->model('user_model');
			//$clientid = $this->client_model->get_client_id($domainname);
			$folders = $this->client_model->get_folder_name($domainname);

			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->session->userdata('user_id');

				$usertype = $this->user_model->get_user_type($userid);
				echo json_encode(array('status'=>'login','data'=>$this->News_model->get_news_list($catid,$folders,$startdate,$enddate,$limit,$lastnewsid,$calltype,$userid),'usertype'=>$usertype));
			}
		}
	}
	function get_complete_news()
	{
		if(!$this->input->is_ajax_request())
		{
			redirect('404');
		}
		else
		{
			$newsid = $this->input->post('newsid');
			$domainname = $this->input->post('domainname');

			// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
			$this->load->model('client_model');
			//$clientid = $this->client_model->get_client_id($domainname);
			$folders = $this->client_model->get_folder_name($domainname);

			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				//echo json_encode(array("status"=>'login',"data"=>array()));
				//echo $this->News_model->get_complete_news($newsid,$folders,1);
				echo json_encode(array('status'=>'login','data'=>$this->News_model->get_complete_news($newsid,$folders,1)));
			}
		}
	}
	
function get_pending_news_count()
	{
		
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->session->userdata('user_id');
				echo $this->News_model->get_pending_news_count($userid);
			}
		}
	}
	
	function approve_pending_news(){
	
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$newsid = $this->input->post('newsid');
				$userid = $this->session->userdata('user_id');

				echo $this->News_model->approve_pending_news($newsid,$userid);
			}
		}
	}

	function upload_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->helper('path');
				$this->load->model('user_model');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);


				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				$folders = $this->client_model->get_folder_name_by_id($clientid);

				$upload_path = realpath($folders['newsimagespath']);
				if($upload_path)
				{
					echo $this->News_model->upload_image($upload_path);
				}
				else
				{
					echo json_encode(array('status'=>'login','error'=>'uploadpatherror'));
				}
			}
		}
	}
	function remove_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->model('user_model');
				$this->load->helper('path');
				$this->load->library('xerces_globals');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);


				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				$folders = $this->client_model->get_folder_name_by_id($clientid);
				$foldername = $folders['newsimagespath'];
				$filename = $this->xerces_globals->str_last_replace("_",".",$this->input->post('filename'));
				$filepath = realpath($foldername.$filename);
				$this->News_model->delete_image_by_name($filepath);
				echo json_encode(array("status"=>'login'));
			}
		}
	}
	function save_news()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->library('xerces_globals');
				$this->load->model('user_model');

				$userid = $this->session->userdata('user_id');

				$catidArray = $this->input->post('catidmore');
				//$catid = array_shift($catidArray);
				$catid = $this->input->post('catid');

				//echo json_encode(array("status"=>"login","catid"=>$catid,"catidarray"=>$catidArray));

				/*$dt_time = new DateTime("now");
				$dt_date = new DateTime($this->input->post('date'));
				$dt = new DateTime($dt_time->format("H:i:s")." ".$dt_date->format("d-m-Y"));
				$dt->setTimeZone(new DateTimeZone("GMT"));
				$datetime = $dt->format('Y-m-d H:i:s');
				*/
				$dt = new DateTime("now");
				$dt->setTimeZone(new DateTimeZone("GMT"));
				$datetime = $dt->format('Y-m-d H:i:s');

				$heading = $this->input->post('heading');
				$content = $this->input->post('content');
				$imgtagline = $this->input->post('tagline');
				$image = $this->xerces_globals->str_last_replace("_",".",$this->input->post('image'));

				$mainnewsid = $this->News_model->save_news($heading,$content,$image,$imgtagline,0);
				//mapnewscategory($newsid,$catid,$clientid);
				$clientid = $this->user_model->get_client_id($userid);
				if($catidArray)
				{
					foreach($catidArray as $ind => $val)
					{
						$this->News_model->mapnewscategory($mainnewsid,$val,$clientid);
					}
				}
				
				$usertype = $this->user_model->get_user_type($userid);
				$approvedadminid = 0;
				$isactive = 0;

				$isimportant = 0;
				if($this->input->post('is_important'))
					$isimportant = 1;
                                

				$is_cat_top_news = 0;
				if($this->input->post('is_cat_top_news'))
					$is_cat_top_news = 1;

				if($this->input->post('send_notification'))
				{
					$this->load->model('gcm_model');

					$clientid = $this->user_model->get_client_id($userid);

					$notificationcontent = $this->xerces_globals->extract_paragraph($content,1);
					$this->gcm_model->gcm_send_notification($clientid,$heading,$notificationcontent,$mainnewsid);
				}

				if($usertype == "superAdmin" || $usertype == "admin")
				{
					$approvedadminid = $userid;
					$isactive = 1;
				}
				else
				{
					$approvedadminid = 0;
					$isactive = 0;
				}
				$this->News_model->save_newsdetail($catid,$mainnewsid,$datetime,$userid,$approvedadminid,$isactive,$isimportant);

		                // HARSH ADDED FOR CATEGORY TOP NEWS
		                if($is_cat_top_news > 0){
		
		                	$this->News_model->save_cat_top_news($mainnewsid,$catid);
		            	}


				$subnews = $this->input->post('subnews');
				if($subnews)
				{
					foreach ($subnews as $key => $value)
					{
						$heading = $value['heading'];
						$content = $value['content'];
						$image = $this->xerces_globals->str_last_replace("_",".",$value['image']);
						$tagline = $value['tagline'];
						$this->News_model->save_news($heading,$content,$image,$tagline,$mainnewsid);
					}
				}
				echo json_encode(array("status"=>'login',"data"=>array("newsid"=>$mainnewsid,"msg"=>"successfully saved news !")));
				
			}
		}
	}

	function mob_upload_image()
    {
		$this->load->helper('path');
		$this->load->model('user_model');

		$userid = $this->input->post('userid');
        $keys = $this->input->post('keys');
        
		$clientid = $this->user_model->get_client_id($userid);
       //echo json_encode(array("status"=>"success","userid"=>$userid));

		// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
		$this->load->model('client_model');
		$folders = $this->client_model->get_folder_name_by_id($clientid);

		$upload_path = realpath($folders['newsimagespath']);
		if($upload_path)
		{
            if($keys != "")
		 	    echo json_encode(array("status"=>"success","image"=>$this->News_model->upload_image_mob($upload_path,$keys)));
            else
            	echo json_encode(array("status"=>"failed","error"=>"no image sent"));
		}
		else
		{
			echo json_encode(array("status"=>"failed","error"=>"uploadpatherror"));
		}
	}

	function mob_save_news()
	{
		$this->load->library('xerces_globals');
		$this->load->model('user_model');
        
		$newsdata = $this->input->post('newsdata');
		$news = json_decode($newsdata);
                $clientid = $news->clientid;
		$userid = $news->userid;
		$heading = $news->heading;
		$catid = $news->catid;
		$tagline = $news->tagline;
		$content = $news->content;
		//echo json_encode(array("heading"=>$tagline));
		$date = $news->date;
		$subnews = $news->subnews;

		$dt_time = new DateTime("now");
		$dt_date = new DateTime($date);
		$dt = new DateTime($dt_time->format("H:i:s")." ".$dt_date->format("d-m-Y"));
		$dt->setTimeZone(new DateTimeZone("GMT"));
		$datetime = $dt->format('Y-m-d H:i:s');
         
		$image = $news->image;
		$image = $this->xerces_globals->str_last_replace("_",".",$image);
     
		$mainnewsid = $this->News_model->save_news($heading,$content,$image,$tagline,0);

		$usertype = $this->user_model->get_user_type($userid);
		$approvedadminid = 0;
		$isactive = 0;

		$isimportant = $news->is_important;
		$is_cat_top_news = $news->is_cat_top_news;
		$send_notofication = $news->send_notification;
	    if($send_notofication==1)
		{
			$this->load->model('gcm_model');

			//$clientid = $this->user_model->get_client_id($userid);
			
                        $notificationcontent = $this->xerces_globals->extract_paragraph($content,1);
			$this->gcm_model->gcm_send_notification($clientid,$heading,$notificationcontent,$mainnewsid);
		}

		if($usertype == "superAdmin" || $usertype == "admin")
		{
			$approvedadminid = $userid;
			$isactive = 1;
		}
		else
		{
			$approvedadminid = 0;
			$isactive = 0;
		}
		$this->News_model->save_newsdetail($catid,$mainnewsid,$datetime,$userid,$approvedadminid,$isactive,$isimportant);

        // HARSH ADDED FOR CATEGORY TOP NEWS
        if($is_cat_top_news > 0){

        	$this->News_model->save_cat_top_news($mainnewsid,$catid);
    	}

		//echo json_encode(array("subnews"=>$subnews));
		if($subnews)
		{
			foreach ($subnews as $key => $value)
			{
				$heading = $value->heading;
				$content = $value->content; //$value['content'];
				$image = $this->xerces_globals->str_last_replace("_",".",$value->image);
				$tagline = $value->tagline; //$value['tagline'];
				$this->News_model->save_news($heading,$content,$image,$tagline,$mainnewsid);
			}
		}
		echo json_encode(array("status"=>'login',"data"=>array("newsid"=>$mainnewsid,"msg"=>"successfully saved news !")));
	}
}