<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Businessextra_model extends CI_Model{

public function add($userid,$heading=false,$content=false,$publishdatetime,$expirydatetime,$catid,$b_extra_master_id,$advtcityselectid=false,$isbusiness)
	{
		$data = array(
						"userid"=>$userid,
						"b_extra_master_id"=>$b_extra_master_id,
						"heading"=>$heading,
						"content"=>$content,
						"catid"=>$catid,
						"publishdatetime"=>$publishdatetime,
						"expirydatetime"=>$expirydatetime,
						"cityid"=>$advtcityselectid,
						"isbusiness"=>$isbusiness
					);
		$this->db->insert('business_extra',$data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}
	public function mapimage($bextraid,$imageid,$sortorder)
	{
		$data = array(
						"business_extra_id"=>$bextraid,
						"imageid"=>$imageid,
						"sort_order"=>$sortorder
					);
		$this->db->insert('business_extra_images',$data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}

   
		public function getaddver($userid=false,$catid=false,$cityid=false,$isbusiness=false)
	      {
	      	//if($userid==0 ){
	     $this->db->select("*,bex.id as mainid");
	       if($catid!=false && $catid!=null)
		   $this->db->where('bex.catid',$catid);
         if($isbusiness!=-1 && $isbusiness!=NULL)
         	$this->db->where('bex.isbusiness',$isbusiness);
	     if($userid!=0 && $userid!=null)
		  $this->db->where('bex.userid',$userid);
		if($cityid!=0 && $cityid!=null)
		  $this->db->where('bex.cityid',$cityid);

		$this->db->where('bex.b_extra_master_id','1');
		$this->db->join('business_extra_images beximg','bex.id = beximg.business_extra_id');
		$this->db->join('gallery g','beximg.imageid = g.id');
		$query = $this->db->get('business_extra bex');
	      	//}
	      	/*else{
		$this->db->select("*,bex.id as mainid");
		$this->db->where('bex.userid',$userid);
		$this->db->where('bex.catid',$catid);
		$this->db->where('bex.cityid',$cityid);
		$this->db->where('bex.b_extra_master_id','1');
		$this->db->join('business_extra_images beximg','bex.id = beximg.business_extra_id');
		$this->db->join('gallery g','beximg.imageid = g.id');
		$query = $this->db->get('business_extra bex');
			}*/
		$Advertisement = array();
		foreach ($query->result() as $row)
		{
			$advertisement = array();

			$advertisement['id'] = $row->mainid;
			$advertisement['des'] = $row->content;
			$advertisement['isnable'] = $row->isenable;
			$advertisement['publishdatetime'] = $row->publishdatetime;
			//$category['imageid'] = $row->imageid;
			$advertisement['expirydatetime'] = $row->expirydatetime;

			//*************imagedata ******************
			$imgurl = "";
			$imgthumburl = "";

			$dt = DateTime::createFromFormat('Y-m-d H:i:s',$row->datetime,new DateTimeZone("GMT"));
			$YEAR = $dt->format('Y');
			$MONTH = $dt->format('m');
			$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
			$imgdatetime = $dt->format('H:i:s d-m-Y');

			if($row->name !== "")
			{
				$imgurl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$row->name);
				$imgthumburl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR."thumb_".$row->name);
			}
			$advertisement['image'] = array(
										"name" => $row->name,
										"url" => $imgurl,
										"thumburl" => $imgthumburl,
										"size" => $row->size,
										"width" => $row->width,
										"height" => $row->height
									);
			///*************imagedata ******************

			array_push($Advertisement,$advertisement);
		}
		return $Advertisement;
		//return $this->db->last_query();
	}


     function setactive($id,$isenable)
     {
         $data=array('isenable'=>$isenable);
         $this->db->where('id',$id);
         $this->db->update('business_extra',$data);
         //$updateid = $this->db->update_id();

		return array(
						"id"=>$id
						
					);
     }

    public function delete($id){
    	//delete image
    	/*$this->db->where('business_extra_id', $id);
        $this->db->delete('business_extra_images');*/ 
        //delete data
        $data=array('isenable'=>'1');
        $this->db->where('id', $id);
        //$this->db->delete('business_extra');
        $this->db->update('business_extra',$data); 

        return "success";

    }
    
	public function getrandomAdvercat($expdatetime,$catid = false,$cities = false,$isbusiness=false)
	{
		
		$this->load->model('gallery_model');
		$this->db->select('*');
		//$this->db->where('expirydatetime>=',$expdatetime);
		$this->db->where('o.b_extra_master_id','1');
		$this->db->where('isenable',1);
		if($isbusiness!=false && $isbusiness!=NULL)
		   $this->db->where('isbusiness',$isbusiness);
		if($catid !== false && $catid !== NULL)
			$this->db->where('o.catid',$catid);
		if($cities !== false && $cities !== NULL){
		if(is_array($cities))
			$this->db->where_in('o.cityid',$cities);
		else
			$this->db->where('o.cityid',$cities);
	     }
		$this->db->join('business_extra_images','o.id=business_extra_images.business_extra_id');
		$this->db->group_by('o.id');
		$this->db->order_by('o.id','RANDOM');
		$this->db->limit(10);
		$query = $this->db->get('business_extra o');
		$advertisements = array();
		foreach ($query->result() as $row)
		{
			$advertisement = array();
			$advertisement['id'] = $row->id;
			$advertisement['content'] = $row->content;
			$advertisement['image'] = $this->gallery_model->getimagedata($row->imageid);
			$advertisement['userid'] = $row->userid;
			array_push($advertisements, $advertisement);
		}
		return $advertisements;
		//return $this->db->last_query();
	}


   public function getrandomAdver($expdatetime,$cities = false,$isbusiness=false)
	{
		
		$this->load->model('gallery_model');
		$this->db->select('*');
		//$this->db->where('expirydatetime>=',$expdatetime);
		$this->db->where('o.b_extra_master_id','1');
		$this->db->where('isenable',1);
		$this->db->where('catid','0');
		if($isbusiness!=false && $isbusiness!=NULL)
		   $this->db->where('isbusiness',$isbusiness);
		if($cities !== false && $cities !== NULL){
		if(is_array($cities))
			$this->db->where_in('o.cityid',$cities);
		else
			$this->db->where('o.cityid',$cities);
	     }
		$this->db->join('business_extra_images','o.id=business_extra_images.business_extra_id');
		$this->db->group_by('o.id');
		$this->db->order_by('o.id','RANDOM');
		$this->db->limit(10);
		$query = $this->db->get('business_extra o');
		$advertisements = array();
		foreach ($query->result() as $row)
		{
			$advertisement = array();
			$advertisement['id'] = $row->id;
			$advertisement['content'] = $row->content;
			$advertisement['image'] = $this->gallery_model->getimagedata($row->imageid);
			$advertisement['userid'] = $row->userid;
			array_push($advertisements, $advertisement);
		}
		return $advertisements;
		//return $this->db->last_query();
	}
/*
	public function getrandomCateAdver($expdatetime,$catid)
	{
		$this->load->model('gallery_model');
		$this->db->select('o.*,u.catid');
		$this->db->where('expirydatetime>=',$expdatetime);
        $this->db->where('isnable',1);
        $this->db->where('catid',$catid);
        $this->db->join('user u','o.userid=u.id');
		$this->db->group_by('id');
		$this->db->order_by('id','RANDOM');
		$this->db->limit(8);
		$query = $this->db->get('advertisement o');
		$advertisements = array();
		foreach ($query->result() as $row)
		{
			$advertisement = array();
			$advertisement['id'] = $row->id;
			$advertisement['description'] = $row->description;
			$advertisement['image'] = $this->gallery_model->getimagedata($row->imageid);
			$advertisement['userid'] = $row->userid;
			array_push($advertisements, $advertisement);
		}
		return $advertisements;
		//return $this->db->last_query();
	}

*/
	/*public function getbusinessextra($expdatetime,$businessextramasterid,$business_extraid=false,$userid=false,$cities=false){

		
        $this->load->model('gallery_model');
		$this->db->select('o.id, o.heading, o.expirydatetime, o.userid, o.content,o.publishdatetime,o.b_extra_master_id');
		$this->db->select("GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images");

		$this->db->where('o.expirydatetime>=',$expdatetime);
		$this->db->where('o.b_extra_master_id',$businessextramasterid);
		
		if($business_extraid !== false && $business_extraid !== NULL)
			$this->db->where('o.id',$business_extraid);
		if($userid !== false && $userid !== NULL)
			$this->db->where('o.userid',$userid);
      if($cities !== false && $cities !== NULL){
		if(is_array($cities))
			$this->db->where_in('o.cityid',$cities);
		else
			$this->db->where('o.cityid',$cities);
	     }

		$this->db->join('business_extra_images oi','oi.business_extra_id = o.id');
		$this->db->group_by('o.id');
		$this->db->order_by('o.id','RANDOM');
		//$this->db->limit(5);
		$query = $this->db->get('business_extra o');
		$offers = array();
		foreach ($query->result() as $row)
		{   
			$offer = array();
			$offer['id'] = $row->id;
			$offer['heading'] = $row->heading;
			$offer['content'] = $row->content;
			$offer['userid'] = $row->userid;
			$offer['bmasterid'] = $row->b_extra_master_id;
			$offer['publishdatetime'] = $row->publishdatetime;
			$offer['expirydatetime'] = $row->expirydatetime;
			$imgArray = explode("|",$row->images);
			$images = array();
			foreach ($imgArray as $index => $value)
			{
				$image = $this->gallery_model->getimagedata($value);
				array_push($images,$image);
			}
			$offer['images'] = $images;

			array_push($offers, $offer);
		}
		return $offers;



	}*/
	public function getbusinessextra($expdatetime,$businessextramasterid,$business_extraid=false,$userid=false,$cities=false){

		
        $this->load->model('gallery_model');
		$this->db->select('o.id, o.heading, o.expirydatetime, o.userid, o.content,o.publishdatetime,o.b_extra_master_id,u.isactive,u.firmname,u.firmcontact,u.email,u.address');
		$this->db->select("GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images");

		//$this->db->where('o.expirydatetime>=',$expdatetime);
		$this->db->where('o.b_extra_master_id',$businessextramasterid);
		$this->db->where('o.isenable','1');
		if($business_extraid !== false && $business_extraid !== NULL)
			$this->db->where('o.id',$business_extraid);
		if($userid !== false && $userid !== NULL)
			$this->db->where('o.userid',$userid);
      if($cities !== false && $cities !== NULL){
		if(is_array($cities))
			$this->db->where_in('o.cityid',$cities);
		else
			$this->db->where('o.cityid',$cities);
	     }

		$this->db->join('business_extra_images oi','oi.business_extra_id = o.id');
		$this->db->join('user u','u.id = o.userid');
		
		$this->db->group_by('o.id');
		$this->db->order_by('o.id','DESC');
		//$this->db->limit(5);
		$query = $this->db->get('business_extra o');
		$offers = array();
		foreach ($query->result() as $row)
		{   
			if($row->isactive==1){
			$offer = array();
			$offer['contactdetails'] = "";
			$offer['id'] = $row->id;
			$offer['heading'] = $row->heading;
			$offer['content'] = $row->content;
			$offer['userid'] = $row->userid;
			$offer['contact'] = $row->firmcontact;
			$offer['bmasterid'] = $row->b_extra_master_id;
			$offer['publishdatetime'] = $row->publishdatetime;
			$offer['expirydatetime'] = $row->expirydatetime;
          if($business_extraid!=false){
			if($row->firmname != "")
			{
				if($offer['contactdetails'] == "")
					$offer['contactdetails'] .= $row->firmname;
				else
					$offer['contactdetails'] .= ", ".$row->firmname;
			}

            if($row->address != "")
			{
				if($offer['contactdetails'] == "")
					$offer['contactdetails'] .= $row->address;
				else
					$offer['contactdetails'] .= ", ".$row->address;
			}
			/*if($row->cityname != "")
			{
				if($offer['contactdetails'] == "")
				{
					//$doctor['address_clinic'] .= $row->city;
				}
				else
					$offer['contactdetails'] .= ", ".$row->cityname;
			}
			if($row->pincode != "")
			{
				if($offer['contactdetails'] == "")
				{
					//$doctor['address_clinic'] .= $row->pincode;
				}
				else
					$offer['contactdetails'] .= ", ".$row->pincode;
			}*/

			if($row->firmcontact != "")
			{
				if($offer['contactdetails'] != "")
				{
					$offer['contactdetails'] .= "\n"."Contact:".$row->firmcontact;
				}
			}
			if($row->email != "")
			{
				if($offer['contactdetails'] != "")
				{
					$offer['contactdetails'] .= "\n"."Email:".$row->email;
				}
			}

           }


			$imgArray = explode("|",$row->images);
			$images = array();
			foreach ($imgArray as $index => $value)
			{
				$image = $this->gallery_model->getimagedata($value);
				array_push($images,$image);
			}
			$offer['images'] = $images;

			array_push($offers, $offer);
		 }
		}
		return $offers;



	}


	public function getuserpost($userid){

		  $this->db->where('userid',$userid);
          $query = $this->db->get('business_extra');
          $rowcount = $query->num_rows();

          return $rowcount;
	}

    public function getbusinessmaster($catid,$userid){
        $this->db->select('parentid');
        $this->db->where('id',$catid);
        $querycate = $this->db->get('category');
        $cateiddb;
        foreach ($querycate->result() as $row){
           $cateiddb = $row->parentid;
        }
        
    	$this->db->select('*');
        $this->db->where('b.id not in(1)');
        if($cateiddb!=4)
            $this->db->where('catid','0');
           
    	$query = $this->db->get('business_extra_master b');

    	$masters = array();
    	foreach ($query->result() as $row)
		{ 
			$item = array();
			$item['id'] = $row->id;
			$item['name'] = $row->name;
			$item['catid'] = $row->catid;
			array_push($masters, $item);
		}

		return $masters;

    }



	/*public function getbusinessextra($expdatetime,$businessextramasterid,$business_extraid=false){

		
        $this->load->model('gallery_model');
		$this->db->select('o.id, o.heading, o.expirydatetime, o.userid, o.content,o.publishdatetime');
		$this->db->select("GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images");

		$this->db->where('o.expirydatetime>=',$expdatetime);
		$this->db->where('o.b_extra_master_id',$businessextramasterid);
		
		if($business_extraid !== false && $business_extraid !== NULL)
			$this->db->where('o.id',$business_extraid);
		$this->db->join('business_extra_images oi','oi.business_extra_id = o.id');
		$this->db->group_by('o.id');
		$this->db->order_by('o.id','RANDOM');
		//$this->db->limit(5);
		$query = $this->db->get('business_extra o');
		$offers = array();
		foreach ($query->result() as $row)
		{   
			$offer = array();
			$offer['id'] = $row->id;
			$offer['heading'] = $row->heading;
			$offer['content'] = $row->content;
			$offer['userid'] = $row->userid;
			$offer['publishdatetime'] = $row->publishdatetime;
			$offer['expirydatetime'] = $row->expirydatetime;
			$imgArray = explode("|",$row->images);
			$images = array();
			foreach ($imgArray as $index => $value)
			{
				$image = $this->gallery_model->getimagedata($value);
				array_push($images,$image);
			}
			$offer['images'] = $images;

			array_push($offers, $offer);
		}
		return $offers;



	}*/



}
?>