<?php

class News_model extends CI_Model
{
	function get_main_news($newsid,$folders)
	{
		$this->db->where('news.id',$newsid);
		$this->db->join('newsdetail','newsdetail.newsid = news.id');
		$this->db->join('user','user.id = newsdetail.reporterid');
		$this->db->join('userinfo','userinfo.id = user.userinfo');
		$this->db->select('news.id as id,news.heading,news.content,news.image,newsdetail.datetime,news.imgtagline,userinfo.name as reportername');
		$query = $this->db->get('news');
		$row = $query->result()[0];
		$singlenews = array();

		$singlenews['id'] = $row->id;
		$singlenews['heading'] = $row->heading;
		$singlenews['content'] = $row->content;
		if($row->image !== "")
			$singlenews['image'] = base_url($folders['newsimagespath'].$row->image);
		else
			$singlenews['image'] = $row->image;
		$dt = new DateTime($row->datetime,new DateTimeZone('GMT'));
		$dt->setTimeZone( new DateTimeZone("Asia/Kolkata") );
		$singlenews['datetime'] = $dt->format("H:i:s d-m-Y");
		
		$singlenews['imgtagline'] = $row->imgtagline;
		$singlenews['reportername'] = $row->reportername;

		//TO DO Dynamic Share Link Added by Harsh

		return json_encode(array('status'=>'login','data'=>$singlenews));
	}
	function get_news_list_web($folders,$clientid)
	{
		/*$query = $this->db->query("SELECT x.*
		  			FROM ( SELECT `news`.`id` as id, `news`.`heading`, `news`.`content`, `news`.`image`, `t`.`datetime`, `news`.`imgtagline`, `t`.`catid`, (CASE WHEN (select count(*) from news n2 where n2.parentnewsid = news.id) > 0 THEN '1'
		 ELSE '0' END ) AS containsSubNews, `category`.`name` as categoryname, `news`.`parentnewsid`,`userinfo`.`name` as reportername,
		               CASE 
		                 WHEN @category != t.catid THEN @rownum := 1 
		                 ELSE @rownum := @rownum + 1 
		               END AS rank,
		               @category := t.catid AS var_category
		          FROM newsdetail t
		          JOIN (SELECT @rownum := NULL, @category := '') r
		        JOIN `category` ON `category`.`id` = `t`.`catid`
		        JOIN `news` ON `news`.`id` = `t`.`newsid`
		        JOIN `user` ON `user`.`id` = `t`.`reporterid`
				JOIN `userinfo` ON `userinfo`.`id` = `user`.`userinfo`
		        WHERE `t`.`isactive` =  1
				AND news.parentnewsid =  0
		        AND category.parentid =  0
		        AND `user`.`clientid` = ".$clientid."
		      ORDER BY t.catid ,t.newsid desc) x
		 WHERE x.rank <= 8  ");*/
		 $query = $this->db->query(" SELECT `news`.`id` as id, `news`.`heading`, `news`.`content`, `news`.`image`, `t`.`datetime`, `news`.`imgtagline`, `t`.`catid`, (CASE WHEN (select count(*) from news n2 where n2.parentnewsid = news.id) > 0 THEN '1'
		 ELSE '0' END ) AS containsSubNews, `category`.`name` as categoryname, `news`.`parentnewsid`,`userinfo`.`name` as reportername,
		               CASE 
		                 WHEN @category != t.catid THEN @rownum := 1 
		                 ELSE @rownum := @rownum + 1 
		               END AS rank,
		               @category := t.catid AS var_category
		          FROM newsdetail t
		          JOIN (SELECT @rownum := NULL, @category := '') r
		        JOIN `category` ON `category`.`id` = `t`.`catid`
		        JOIN `news` ON `news`.`id` = `t`.`newsid`
		        JOIN `user` ON `user`.`id` = `t`.`reporterid`
				JOIN `userinfo` ON `userinfo`.`id` = `user`.`userinfo`
		        WHERE `t`.`isactive` =  1
				AND news.parentnewsid =  0
		        AND category.parentid =  0
		        AND `user`.`clientid` = ".$clientid."
		      ORDER BY t.catid ,t.newsid desc limit 3000 ");
		 $allnews = array();
 		foreach ($query->result() as $row)
		if($row->rank<=8){
			$singlenews = array();
			$singlenews['id'] = $row->id;
			$singlenews['heading'] = $row->heading;
			$singlenews['content'] = $row->content;
			if($row->image !== "")
				$singlenews['image'] = base_url($folders['newsimagespath'].$row->image);
			else
				$singlenews['image'] = $row->image;
			$dt = new DateTime($row->datetime,new DateTimeZone('GMT'));
			$dt->setTimeZone( new DateTimeZone("Asia/Kolkata") );
			$singlenews['datetime'] = $dt->format("H:i:s d-m-Y");
			
			$singlenews['imgtagline'] = $row->imgtagline;
			$singlenews['reportername'] = $row->reportername;
			
			$singlenews['catid'] = $row->catid;
			$singlenews['categoryname'] = $row->categoryname;
			$singlenews['parentnewsid'] = $row->parentnewsid;
			$singlenews['containsSubNews'] = $row->containsSubNews;
			
			array_push($allnews, $singlenews);
		}
		//return $this->db->last_query();
		return $allnews;
		//return $query->result();
	}
	function get_news_list($catid,$folders,$startdate,$enddate,$limit,$lastnewsid,$newstype,$userid=false,$omit_news_ids = false ,$clientid = false,$domainname = false)
	{
		$allnews = array();
		
		//$this->db->where("newsdetail.approvedbyadminid != 0");
		
		if($newstype == 'pending')
			$this->db->where('newsdetail.isactive',0);
		else
			$this->db->where('newsdetail.isactive',1);
		$this->db->where('parentnewsid',0);
		//$this->db->where('news.reporterid',$userid);
		/** * ** ** ** ** ** ** ** ** ** 	UPDATE below query for infinite children hierarchy. Now it is just for single level heirarchy . ** ** ** ** ** ** ** ** ** ** ** ** */
		if($userid)
			$this->db->where('newsdetail.reporterid in (SELECT u1.id FROM `user` as u1 where u1.id= '.$userid.' or u1.parentid = '.$userid.' or (select u2.parentid from user u2 where u2.id = u1.parentid) = '.$userid.' ) ',NULL,FALSE);
		
		if($newstype == 'old')
			$this->db->where('news.id <',$lastnewsid);
			//$this->db->where('news.id >',$lastnewsid);
		else if($newstype == 'new')
			$this->db->where('news.id >',$lastnewsid);
	        else if($newstype == 'pending')
	        {
			if($lastnewsid > 0)
			{
				$this->db->where('news.id <',$lastnewsid);
				//$this->db->where('news.id >',$lastnewsid);
			}
	        }



		$this->db->order_by('id','desc');
		$this->db->limit($limit);

		//Put condition for category if category  id > 0 
		if ($catid > 0)
		{
			//$this->db->where('newsdetail.catid',$catid);
			//****************  WRITING SUBQUERY FOR FINDING NEWS IN CHILD CATEGORIES !!! *******************************////
			//$this->db->or_where('news.id in (select childnewsid from parentcatnewsmapping where parentcatid = '.$catid.')',NULL,FALSE);
			
			//$this->db->where('(newsdetail.catid = '.$catid.' or news.id in (select childnewsid from parentcatnewsmapping where parentcatid = '.$catid.'))',NULL,FALSE);
			//$this->db->where('newsdetail.catid = '.$catid.' or newsdetail.catid in (select id from category where parentid = '.$catid.')');
			//$this->db->where('newsdetail.catid = '.$catid);

			if($newstype == 'old')
				$this->db->where('(newsdetail.catid = '.$catid.' or news.id in (select newsid from newscatmapping where newscatmapping.catid = '.$catid.' and newscatmapping.newsid < '.$lastnewsid.' ))',NULL,FALSE);
			else if($newstype == 'new')
				$this->db->where('(newsdetail.catid = '.$catid.' or news.id in (select newsid from newscatmapping where newscatmapping.catid = '.$catid.' and newscatmapping.newsid > '.$lastnewsid.' ))',NULL,FALSE);
		        else if($newstype == 'pending')
		        {
				if($lastnewsid > 0)
				{
					$this->db->where('(newsdetail.catid = '.$catid.' or news.id in (select newsid from newscatmapping where newscatmapping.catid = '.$catid.' and newscatmapping.newsid < '.$lastnewsid.' ))',NULL,FALSE);
				}
		        }
		        else
				$this->db->where('(newsdetail.catid = '.$catid.' or news.id in (select newsid from newscatmapping where newscatmapping.catid = '.$catid.'))',NULL,FALSE);
		}
		
		$this->db->where("newsdetail.datetime between str_to_date('".$startdate."','%d-%m-%Y %H:%i:%s') and str_to_date('".$enddate." 23:59:59','%d-%m-%Y %H:%i:%s')");

		//Omit news condition if array contains omit news 
		if(!$omit_news_ids)
		{}
		else
		{
			
			if( is_array($omit_news_ids) )
			{
				//print_r( implode( ',', $test ) );
				$omit_ids = implode(',',$omit_news_ids);
			}
			else
			{
				$omit_ids = $omit_news_ids;
			}
			$this->db->where('news.id NOT IN ('.$omit_ids.')',NULL,FALSE);
		}

		// Put client id condition if it exists 	 	
	        if($clientid){
	             $this->db->where('user.clientid = '.$clientid);
	        }

		$this->db->join('newsdetail','newsdetail.newsid = news.id');
		$this->db->join('user','user.id = newsdetail.reporterid');
		$this->db->join('userinfo','userinfo.id = user.userinfo');
		$this->db->select('news.id as id,news.heading,news.content,news.image,newsdetail.datetime,news.imgtagline,userinfo.name as reportername');
		$query = $this->db->get('news');
		foreach ($query->result() as $row)
		{
			$singlenews = array();
			$singlenews['id'] = $row->id;
			$singlenews['heading'] = $row->heading;
			$singlenews['content'] = $row->content;
			if($row->image !== "")
				$singlenews['image'] = base_url($folders['newsimagespath'].$row->image);
			else
				$singlenews['image'] = $row->image;
			$dt = new DateTime($row->datetime,new DateTimeZone('GMT'));
			$dt->setTimeZone( new DateTimeZone("Asia/Kolkata") );
			$singlenews['datetime'] = $dt->format("H:i:s d-m-Y");
			
			$singlenews['imgtagline'] = $row->imgtagline;
			$singlenews['reportername'] = $row->reportername;

			//TO DO Dynamic Share Link Added by Harsh
			$singlenews['sharelink'] = rtrim($domainname).DIRECTORY_SEPARATOR."detail".DIRECTORY_SEPARATOR.$row->id;

				array_push($allnews, $singlenews);
		}
		//return $this->db->last_query();
		return $allnews;
	}
	
	function get_cat_top_news($catid ,$folders){

		$this->db->select('news.id as id,news.heading,news.content,news.image,newsdetail.datetime,news.imgtagline,userinfo.name as reportername');
		$this->db->join('newsdetail','newsdetail.newsid = news.id','left');
		$this->db->join('userinfo','userinfo.id = newsdetail.reporterid');
		$this->db->where('news.id = (SELECT category.topnewsid FROM category where category.id ='.$catid.')');
		$this->db->where('newsdetail.isactive',1);
		
		$query = $this->db->get('news');

		$singlenews = array();

		foreach ($query->result() as $row)
		{
			$singlenews['id'] = $row->id;
			$singlenews['heading'] = $row->heading;
			$singlenews['content'] = $row->content;
			if($row->image !== "")
				$singlenews['image'] = base_url($folders['newsimagespath'].$row->image);
			else
				$singlenews['image'] = $row->image;
			$dt = new DateTime($row->datetime,new DateTimeZone('GMT'));
			$dt->setTimeZone( new DateTimeZone("Asia/Kolkata") );
			$singlenews['datetime'] = $dt->format("H:i:s d-m-Y");
			
			$singlenews['imgtagline'] = $row->imgtagline;
			$singlenews['reportername'] = $row->reportername;
		}
		///return $this->db->last_query();
		return $singlenews;
	}

	//******* here $needmainnews tells that want mainnews with the output or not ******//////
	function get_complete_news($newsid,$folders,$needmainnews,$domainname=false)
	{
		$singlenews = array();

		$this->db->where('news.id',$newsid);
		$this->db->or_where('parentnewsid',$newsid);

		$this->db->join('newsdetail','newsdetail.newsid = news.id','left');
		
		$this->db->join('user','user.id = newsdetail.reporterid','left');
		$this->db->join('userinfo','userinfo.id = user.userinfo','left');

		$this->db->select('news.id as id,news.heading,news.content,news.image,newsdetail.datetime,newsdetail.isimportant,news.imgtagline,userinfo.name as reportername,news.parentnewsid');
		$query = $this->db->get('news');
		$subnews = array();
		foreach ($query->result() as $row)
		{
			if($row->parentnewsid == 0)
			{
				//This means news is main news.
				$singlenews['id'] = $row->id;
				$singlenews['heading'] = $row->heading;
				$singlenews['content'] = $row->content;
				if($row->image != "")
					$singlenews['image'] = base_url($folders['newsimagespath'].$row->image);
				else
					$singlenews['image'] = $row->image;
				$dt = new DateTime($row->datetime,new DateTimeZone('GMT'));
				$dt->setTimeZone( new DateTimeZone("Asia/Kolkata") );
				$singlenews['datetime'] = $dt->format("H:i:s d-m-Y");
				
				$singlenews['imgtagline'] = $row->imgtagline;
				$singlenews['reportername'] = $row->reportername;
				$singlenews['isimportant']=$row->isimportant;
				//TO DO Dynamic Share Link Added by Harsh
				$singlenews['sharelink'] = rtrim($domainname).DIRECTORY_SEPARATOR."detail".DIRECTORY_SEPARATOR.$row->id;
			}
			else
			{
				//this is sub-news.
				$singlesubnews = array();

				$singlesubnews['id'] = $row->id;
				$singlesubnews['heading'] = $row->heading;
				$singlesubnews['content'] = $row->content;
				if($row->image != "")
					$singlesubnews['image'] = base_url($folders['newsimagespath'].$row->image);
				else
					$singlesubnews['image'] = $row->image;
				
				$singlesubnews['imgtagline'] = $row->imgtagline;
				array_push($subnews, $singlesubnews);
			}
		}
		$singlenews['subnews'] = $subnews;
		if($needmainnews == 1)
		{
			//return json_encode(array('status'=>'login','data'=>$singlenews));
			return $singlenews;
		}
		else if($needmainnews == 0)
			return $subnews;
	}
	
    function get_pending_news_count($userid)
	{
		$this->db->select('count(*) as pendingnews');
		$this->db->where('newsdetail.isactive = 0');
		$this->db->where('newsdetail.reporterid in (SELECT u1.id FROM `user` as u1 where u1.id= '.$userid.' or u1.parentid = '.$userid.' or (select u2.parentid from user u2 where u2.id = u1.parentid) = '.$userid.' ) ',NULL,FALSE);
		$this->db->join('newsdetail','news.id = newsdetail.newsid');
		$query = $this->db->get('news');
		$countpending = $query->result()[0]->pendingnews;
		if($countpending > 0)
			return $countpending;
		else
			return "";
	}
       
        function approve_pending_news($newsid , $userid){
	
		$data = array(
					'approvedbyadminid' => $userid,
					'isactive' => 1
				);

		$this->db->where('newsid',$newsid);
		return  $this->db->update('newsdetail',$data);
	}
	//function update_news($postdata)
	function update_news($heading,$content,$imgtagline,$newsid)
	{
		$data = array(
					'heading' => $heading,
					'content' => $content,
					'imgtagline' => $imgtagline
				);
		$this->db->where('id',$newsid);
		$this->db->update('news',$data);
		return $newsid;
	}
	function update_subnews($newsid,$heading,$content,$imgtagline)
	{
		$data = array(
					'heading' => $heading,
					'content' => $content,
					'imgtagline' => $imgtagline
				);
		$this->db->where('id',$newsid);
		$this->db->update('news',$data);
	}
	function delete_image($newsid,$folders)
	{
		$this->db->where('id',$newsid);
		$this->db->or_where('parentnewsid',$newsid);
		$this->db->select('id,image');
		$query = $this->db->get('news');

		$outputArray = array();
		foreach ($query->result() as $row)
		{
			//return unlink($folders['newsimagespath'].$row->image);
			if(trim($row->image) != "")
			{
				unlink($folders['newsimagespath'].$row->image);
			}
		}
	}
	function delete_image_by_name($filepath)
	{
		unlink($filepath);
	}
	function upload_image($upload_path)
	{
		if (!empty($_FILES))
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$replaceChars = array(" ",".");
			//$timedImgName = time().str_replace($replaceChars,"_",$_FILES['file']['name']);
			$timedImgName = time().(time()+rand(100,500)).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			
			//$targetFile =  $upload_path."/".$this->str_lreplace("_",".",$timedImgName);

			$CI =& get_instance();
			$CI->load->library('xerces_globals');
			//$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$timedImgName);
			$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$timedImgName;
			
			move_uploaded_file($tempFile,$targetFile);
			//return $this->str_lreplace("_",".",$timedImgName);
			return $timedImgName;
		}
	}
	function delete_news($newsid)
	{
		//firstly remove the images from server and then remove from news,newsdetail and parentcatnewsmapping tables.
		
		// select news.id as newsid,image from news where news.id = 1 or news.parentnewsid = 1

		$this->db->delete('news','news.id = '.$newsid.' or news.parentnewsid = '.$newsid);
		$this->db->delete('newsdetail','newsid = '.$newsid);
		//$this->db->delete('parentcatnewsmapping','childnewsid = '.$newsid);
		return json_encode(array('status'=>'login','newsid'=>$newsid));
	}
	function get_main_newsid($newsid_array)
	{
		$this->db->where_in('id',$newsid_array);
		$this->db->where('parentnewsid',0);
		$this->db->select('id');
		$query = $this->db->get('news');
		return $query->result()[0]->id;
	}
	function save_news($heading,$content,$image,$imgtagline,$parentnewsid)
	{	
		$heading = preg_replace("/<div[^>]*\>/i", "", $heading);
		$heading = preg_replace("/<\/div[^>]*\>/i", "<br>", $heading);
		
		$heading = preg_replace("/<\/?h1[^>]*\>/i", "", $heading);
		$heading = preg_replace("/<\/?h2[^>]*\>/i", "", $heading);
		$heading = preg_replace("/<\/?h3[^>]*\>/i", "", $heading);
		$heading = preg_replace("/<\/?h4[^>]*\>/i", "", $heading);
		$heading = preg_replace("/<\/?h5[^>]*\>/i", "", $heading);
		$heading = preg_replace("/<\/?h6[^>]*\>/i", "", $heading);
		
		$content = preg_replace("/<div[^>]*\>/i", "", $content);
		$content = preg_replace("/<\/?div[^>]*\>/i", "<br>", $content);
		
		$imgtagline = preg_replace("/<div[^>]*\>/i", "", $imgtagline);
		$imgtagline = preg_replace("/<\/?div[^>]*\>/i", "<br>", $imgtagline);
		$data = array(
			'heading' => $heading,
			'content' => $content,
			'image' => $image,
			'imgtagline' => $imgtagline,
			'parentnewsid' => $parentnewsid
		);
		$this->db->insert('news',$data);
		return $this->db->insert_id();
	}
	function save_newsdetail($catid,$newsid,$datetime,$reporterid,$approvedbyadminid,$isactive,$isimportant)
	{
		$data = array(
			'catid' => $catid,
			'newsid' => $newsid,
			'datetime' => $datetime,
			'reporterid' => $reporterid,
			'approvedbyadminid' => $approvedbyadminid,
			'isactive' => $isactive,
			'isimportant' => $isimportant
		);
		$this->db->insert('newsdetail',$data);
		return $this->db->insert_id();
	}
	function get_client_id($newsid)
	{
		$this->db->where('news.id',$newsid);
		$this->db->join('newsdetail','news.id = newsdetail.newsid');
		$this->db->join('user','newsdetail.reporterid = user.id');
		$this->db->select('user.clientid');
		$query = $this->db->get('news');
		if($query->result())
			return $query->result()[0]->clientid;
		else
			return 0;
	}

      function save_cat_top_news($news_id , $catid)
	{
		$data = array(
			'topnewsid' => $news_id,
		);
		$this->db->where('id',$catid);
		
		$status = $this->db->update('category',$data);
		return array($status);
	}

	function remove_cat_top_news($catid)
	{
		$data = array(
			'topnewsid' => 0,
		);
		$this->db->where('id',$catid);
		
		$status = $this->db->update('category',$data);
		return array($status);
	}
	function get_cat_id($newsid)
	{
		$this->db->where('news.id',$newsid);
		$this->db->join('newsdetail','news.id = newsdetail.newsid');
		$this->db->select('newsdetail.catid');
		$query = $this->db->get('news');
		if($query->result())
			return $query->result()[0]->catid;
		else
			return 0;
	}

	function upload_image_mob($upload_path,$keys)
    	{
       
		if (!empty($_FILES))
		{
			$imagename = array();
			$arrayKeys =  explode(",", $keys);
           
			foreach ($arrayKeys as $key)
			{
				$tempFile = $_FILES[$key]['tmp_name'];
				$replaceChars = array(" ",".");
				$timedImgName = time().str_replace($replaceChars,"_",$_FILES[$key]['name']);

				//$targetFile =  $upload_path."/".$this->str_lreplace("_",".",$timedImgName);

				$CI =& get_instance();
				$CI->load->library('xerces_globals');
				$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$timedImgName);

				move_uploaded_file($tempFile,$targetFile);
				//return $this->str_lreplace("_",".",$timedImgName);
				// $imagenamearray = array("$i" => $timedImgName);
				//array_push($imagename,$timedImgName);
				//$fullname = $i."_".$timedImgName;

				$imagename[$key] = $timedImgName;
			} 
			return $imagename;
			
		}
		else
			return "";
	}  
	function mapnewscategory($newsid,$catid,$clientid)
	{
		$data = array(
			"newsid" => $newsid,
			"catid" => $catid,
			"clientid" => $clientid
		);
		$this->db->insert('newscatmapping',$data);
		return $this->db->insert_id();
	}
	function deletecategorynewsmaping($clientid,$newsid)
	{
		$this->db->where('clientid',$clientid);
		$this->db->where('newsid',$newsid);
		$this->db->delete('newscatmapping');
	}

}