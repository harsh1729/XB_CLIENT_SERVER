<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Epaper_users_model extends CI_Model{

public function add($name,$address,$contact,$username,$password,$imageid,$cityid)
	{
		$data = array(
						"name"=>$name,
						"address"=>$address,
						"contact"=>$contact,
						"username"=>$username,
						"password"=>$password,
						"imageid"=>$imageid,
						"cityid"=>$cityid
					);
		$this->db->insert('epaper_user',$data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}
	
    public function getuser($cityid=false)
	      {
	      	//if($userid==0 ){
	      	$this->load->model('gallery_model');
	     $this->db->select('*'); 	
	    if($cityid!=0 && $cityid!=null)
		  $this->db->where('cityid',$cityid);
         $query = $this->db->get('epaper_user');
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
		$epaper_users = array();
		foreach ($query->result() as $row)
		{
			$epaper_user = array();

			$epaper_user['id'] = $row->id;
			$epaper_user['name'] = $row->name;
			$epaper_user['address'] = $row->address;
			$epaper_user['isenable'] = $row->isactive;
			//$category['imageid'] = $row->imageid;
			$epaper_user['contact'] = $row->contact;
			$epaper_user['username'] = $row->username;
			$epaper_user['password'] = $row->password;

			//*************imagedata ******************
			/*$imgurl = "";
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
			$epaper_user['image'] = array(
										"name" => $row->name,
										"url" => $imgurl,
										"thumburl" => $imgthumburl,
										"size" => $row->size,
										"width" => $row->width,
										"height" => $row->height
									);*/
			$epaper_user['image'] = $this->gallery_model->getimagedata($row->imageid);
			///*************imagedata ******************

			array_push($epaper_users,$epaper_user);
		}
		return $epaper_users;
		//return $this->db->last_query();
	}

    function getdata($cityid=false)
           {

			  $this->db->select('*');
               if($cityid !== "" && $cityid !== false ){

			  	if(is_array($cityid)){
			  		if(count($cityid)>0)
			        $this->db->where_in('cityid',$cityid);
			  	}
		        else
			      $this->db->where('cityid',$cityid);
			  }
             $this->db->where('isactive','1');
			 $query = $this->db->get('epaper_user');
              $users = array();

			  $this->load->model('gallery_model');
			  foreach ($query->result() as $row)
			  {
			   $user = array();
			   $user['id'] = (int)$row->id;
			   $user['name'] = $row->name;
			   $user['contact'] = $row->contact;
			   $user['username'] = $row->username;
			   $user['address'] = $row->address;
			   $user['cityid'] = (int)$row->cityid;
			   $user['isactive'] = (int)$row->isactive;
			   $user['firmname'] = $row->name;
			   $user['firmcontact'] = $row->contact;
			   $user['image'] = $this->gallery_model->getimagedata($row->imageid);

			   array_push($users,$user);
			  }
			  return $users;
 }



     function setactive($id,$isenable)
     {
         $data=array('isactive'=>$isenable);
         $this->db->where('id',$id);
         $this->db->update('epaper_user',$data);
         //$updateid = $this->db->update_id();

		return array(
						"id"=>$id
						
					);
     }

}
?>