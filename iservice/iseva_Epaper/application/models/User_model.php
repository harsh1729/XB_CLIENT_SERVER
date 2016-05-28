<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	private $TABLE_NAME_USER = "epaper_user";
	private $KEY_ID = "id";
	private $KEY_NAME = "name";
	private $KEY_PHONE = "phone";
	private $KEY_EMAIL = "email";
	private $KEY_IMAGE = "imageid";
	private $KEY_USERNAME = "username";
	private $KEY_PASSWORD = "password";
	private $KEY_ADDRESS = "address";
	private $KEY_ISADMIN = "isadmin";

	private $KEY_GCMID = "gcmid";
	private $KEY_DATETIME = "datetime";
	private $KEY_CATID = "catid";
	private $KEY_CITYID = "cityid";
	private $KEY_ISACTIVE = "isactive";
	private $KEY_ISPUBLISHED = "ispublished";
	private $KEY_ISMERCHANT = "ismerchant";

	function __construct()
	{
		parent::__construct();
		$this->load->model('datetime_model');
	}

/*
	public function verify_credentials($usr,$pwd,$isadmin)
	{
		$this->db->where($this->KEY_USERNAME,$usr);
		$this->db->where($this->KEY_PASSWORD,$pwd);
		$this->db->where($this->KEY_ISADMIN,$isadmin);

		$queryResult = $this->db->get($this->TABLE_NAME_USER);
		
			//return $this->db->last_query();
		if($queryResult->num_rows() == 1)
		{
			$result = $queryResult->result();
			//return $result;
			return array(	"isValidated" => 1,
							"userid" => $result[0]->id,
							"name" => $result[0]->name,
							"username" => $result[0]->username
						);
		}
		else
		{
			return array("isValidated"=>0
						);
		}
	}
	*/

    public function getmaxlimit($userid){
    	$this->db->select('max_limit');
        $this->db->where('id',$userid);
        $queryuser = $this->db->get('user');
        $usermaxlimit;
        foreach ($queryuser->result() as $row){
           $usermaxlimit = $row->max_limit;
        }
        return $usermaxlimit;
    }

    public function checkusername($username){
    	$this->db->where('username',$username);
        $queryuser = $this->db->get('user');
        $cnt = $queryuser->num_rows();
        return $cnt;
    }

	public function verify_credentials($usr,$pwd,$isadmin)
	{
		$this->load->model('gallery_model'); 
		$this->db->where($this->KEY_USERNAME,$usr);
		$this->db->where($this->KEY_PASSWORD,$pwd);
		//$this->db->where($this->KEY_ISADMIN,$isadmin);
		
		$queryResult = $this->db->get($this->TABLE_NAME_USER);
		
			//return $this->db->last_query();
		//return $queryResult->result();
		if($queryResult->num_rows() == 1)
		{

			$result = $queryResult->result();
			//return $result;
			if($result[0]->isactive == 0){
				return array("isValidated"=>0,
						 "error_message"=>'Your approval is pending!'

						);
			}
			else{
				return array(	"isValidated" => 1,
							"userid" => $result[0]->id,
							"name" => $result[0]->name,
							"catid" => $result[0]->catid,
							"cityid"=> $result[0]->cityid,
							"username" => $result[0]->username,
							"firmname" => $result[0]->firmname,
							"firmcontact" => $result[0]->firmcontact,
							"image" => $this->gallery_model->getimagedata($result[0]->imageid)
							
						);
		}
		}
		else
		{
			return array("isValidated"=>0,
						 "error_message"=>'Username and Password doesnot match!'

						);
		}
	}
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function get($catid,$cityid)
	{
		/*
			SELECT 
			group_concat( DISTINCT concat( payment.id,',',payment.assetid,',',payment.txntypeid,',',payment.amount ) SEPARATOR '|' ) as payments,
			group_concat( DISTINCT concat(transaction.id,',',transaction.date ) ORDER BY transaction.date DESC SEPARATOR '|' ) as transactions,
			group_concat( concat( gcmusercitymapping.cityid,",",city.name,",",city.pincode ) SEPARATOR '|' ) as cities,
			gcmuser.*,
			user.* 
			FROM user 
			JOIN gcmuser On user.id = gcmuser.userid
			JOIN gcmusercitymapping ON gcmusercitymapping.gcmid = gcmuser.id
			LEFT JOIN city ON city.id = gcmusercitymapping.cityid
			LEFT JOIN transaction ON transaction.userid = user.id
			JOIN payment ON payment.txnid = transaction.id
			WHERE payment.assetid = 2
			GROUP BY user.id
		*/
		
		$this->db->select("
				group_concat( DISTINCT concat( p.id,',',p.assetid,',',p.txntypeid,',',p.txnid,',',p.amount,',',mtxntyp.shortname,',',mast.name ) ORDER BY p.txnid DESC,p.id SEPARATOR '|' ) as payments
			");
		$this->db->select("
				group_concat( DISTINCT concat(t.id,',',t.date,',',t.description ) ORDER BY t.date DESC SEPARATOR '|' ) as transactions
			");
		$this->db->select("
				group_concat( DISTINCT concat( gm.cityid,',',c.name,',',c.pincode ) SEPARATOR '|' ) as cities
			");
		$this->db->select("
				group_concat( DISTINCT concat( cu.id,',',cu.name,',',cu.pincode ) SEPARATOR '|' ) as usercity
			");
		$this->db->select("
				group_concat( DISTINCT concat( g.id,',',g.name,',',g.datetime,',',g.size,',',g.width,',',g.height ) SEPARATOR '|' ) as imagedata
			");
		$this->db->select("gu.gcmtextid gcmtextid,gu.imei");
		$this->db->select("
				u.id userid,u.name,u.contact,u.email,u.username,u.address,u.datetime,u.catid,
				u.cityid,u.isactive,u.ispublished,u.ismerchant,u.firmname,u.firmcontact
			");
		$this->db->select('round(avg(r.rating),1) rating');

		$this->db->join('gcmuser gu','u.id = gu.userid');
		$this->db->join('gcmusercitymapping gm','gm.gcmid = gu.id','left');
		$this->db->join('city c','c.id = gm.cityid','left');
		$this->db->join('city cu','cu.id = u.cityid','left');
		$this->db->join('transaction t','t.userid = u.id');
		$this->db->join('payment p','p.txnid = t.id');
		$this->db->join('master_txntype mtxntyp','mtxntyp.id = p.txntypeid');
		$this->db->join('master_asset mast','mast.id = p.assetid');
		$this->db->join('gallery g','g.id = u.imageid','left');
		$this->db->join('userrating r','r.userid = u.id');
		$this->db->where('p.assetid',2);
		$this->db->where('u.catid',$catid);
		if(is_array($cityid))
			$this->db->where_in('u.cityid',$cityid);
		else
			$this->db->where('u.cityid',$cityid);
		$this->db->group_by('u.id');
		$query = $this->db->get('user u');

		$users = array();

		$this->load->model('gallery_model');
		foreach ($query->result() as $row)
		{
			$user = array();

			$user['id'] = (int)$row->userid;
			$user['name'] = $row->name;
			$user['contact'] = $row->contact;
			$user['email'] = $row->email;
			$user['username'] = $row->username;
			$user['address'] = $row->address;
			$user['datetime'] = $this->datetime_model->getISTFromGMT($row->datetime);
			$user['catid'] = (int)$row->catid;
			$user['cityid'] = (int)$row->cityid;
			$user['isactive'] = (int)$row->isactive;
			$user['ispublished'] = (int)$row->ispublished;
			$user['ismerchant'] = (int)$row->ismerchant;
			$user['rating'] = $row->rating;
			$user['firmname'] = $row->firmname;
			$user['firmcontact'] = $row->firmcontact;

			$imagerow = explode(",",$row->imagedata);
			$user['image'] = $this->gallery_model->parseImageData($imagerow[0],trim($imagerow[1]),trim($imagerow[2]),trim($imagerow[3]),trim($imagerow[4]),trim($imagerow[5]));
			$usercityrow = explode(",",$row->usercity);
			$user['businesscity'] = array(
											"id"=>(int)trim($usercityrow[0]),
											"name"=>trim($usercityrow[1]),
											"pincode"=>trim($usercityrow[2])
										);
			$choosedcityarray = array();
			foreach (explode( "|",$row->cities ) as $index => $value) {
				$city = array();
				$cityarray = explode(",",$value);
				$city['id'] = (int)$cityarray[0];
				$city['name'] = trim($cityarray[1]);
				$city['pincode'] = trim($cityarray[2]);

				array_push($choosedcityarray,$city);
			}
			$user['choosedcities'] = $choosedcityarray;

			$transactions = array();
			$transactionarray = explode("|",$row->transactions);
			foreach ($transactionarray as $key => $value) {
				$t = explode(",",$value);
				$transactions[$t[0]] = array(
												"id"=>(int)$t[0],
												"datetime"=>$this->datetime_model->getISTFromGMT( trim($t[1]) ),
												"description"=>trim($t[2]),
												"payments"=>array()
											);
			}

			
			foreach (explode("|",$row->payments) as $key => $value) {
				$p = explode(",",$value);
				$payment = array(
									"id"=>(int)$p[0],
									"assetid"=>(int)$p[1],
									"txntypeid"=>(int)$p[2],
									"txnid"=>(int)$p[3],
									"amount"=>$p[4]
								);
				$txnid = (int)$p[3];
				array_push($transactions[$txnid]["payments"],$payment);
			}


			$user['transactions'] = $transactions;



			array_push($users,$user);
		}
		return $users;
		//return $query->result();
	}

   function setactive($userid,$isactive)
     {
         $data=array('isactive'=>$isactive);
         $this->db->where('id',$userid);
         $this->db->update('user',$data);
         //$updateid = $this->db->update_id();

  return array(
      "userid"=>$userid
      
      );
    }

   function setlimit($id,$limit)
     {
         $data=array('max_limit'=>$limit);
         $this->db->where('id',$id);
         $this->db->update('user',$data);
         //$updateid = $this->db->update_id();

   return array(
      "userid"=>$id
      );
     }




    function getdata($catid=false,$cityid=false,$filter=false/*,$imei*/)
           {

			  $this->db->select('u.*');

			  if($catid !== "" && $catid !== false)
			  	$this->db->where('u.catid',$catid);

			  if($cityid !== "" && $cityid !== false ){

			  	if(is_array($cityid)){
			  		if(count($cityid)>0)
			        $this->db->where_in('u.cityid',$cityid);
			  	}
		        else
			      $this->db->where('u.cityid',$cityid);
			  }

           
			  $this->db->where('u.ismerchant','1');
			  $this->db->where('u.isadmin','0');
			  if($filter !== false && $filter !== NULL)
			  {
			   if($filter == "pending") 
			   {
			          $this->db->where('u.isactive','0');    
			   }else if($filter == "active")
			   {
			               $this->db->where('u.isactive','1'); 
			   }
			  }

			// $this->db->where('gcmuser.imei',$imei); 
			  //$this->db->join('userrating r','r.ratergcmid = gcmuser.id');

			  $query = $this->db->get('user u');

			  

			  $users = array();

			  $this->load->model('gallery_model');
			  foreach ($query->result() as $row)
			  {
			   $user = array();
			   $user['id'] = (int)$row->id;
			   $user['name'] = $row->name;
			   $user['contact'] = $row->contact;
			   $user['email'] = $row->email;
			   $user['username'] = $row->username;
			   $user['address'] = $row->address;
			   $user['limit'] = $row->max_limit;
			   $this->db->where('u.referredbyuserid',(int)$row->id);
			   $this->db->where('u.isactive','1');
		      $querycnt = $this->db->get('user u');
		      $wallet = $querycnt->num_rows();
		      $wallet = $wallet*200;
			   //$user['datetime'] = $this->datetime_model->getISTFromGMT($row->datetime);
			   $user['catid'] = (int)$row->catid;
			   $user['cityid'] = (int)$row->cityid;
			   $user['isactive'] = (int)$row->isactive;
			   $user['ispublished'] = (int)$row->ispublished;
			   $user['ismerchant'] = (int)$row->ismerchant;
			   $user['wallet'] = $wallet;
			    //$user['userrating'] = (int)$row->userrating;
			   //$user['rating'] = $row->rating;
			   $user['firmname'] = $row->firmname;
			   $user['firmcontact'] = $row->firmcontact;
			   $user['image'] = $this->gallery_model->getimagedata($row->imageid);

			   array_push($users,$user);
			  }
			  return $users;
 }

      /*function upload_pdf($upload_path)
	{
		if (!empty($_FILES))
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$replaceChars = array(" ",".");
			$timedImgName = time().(time()+rand(100,500)).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			
			
            //$this->load->library('pdf_merger');
            return $timedImgName;
			$CI =& get_instance();
			$CI->load->library('xerces_globals');
			//$this->load->library('../libraries/xerces_globals.php');
			
			$filecountvar = 1;
			while(file_exists($upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$timedImgName))) {
				$timedImgName = ($filecountvar++).$timedImgName;
			}
			$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$timedImgName);

			move_uploaded_file($tempFile,$targetFile);

			//return $this->str_lreplace("_",".",$timedImgName);
			return $timedImgName;
		}
	}
	function get_total_pages($upload_path,$uploadedfilename)
	{
		
		//return 3;
		//$CI =& get_instance();
		//$CI->load->library('xerces_globals');
		//$this->load->library('../libraries/xerces_globals.php');
		$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$uploadedfilename);
		
	       // $img = new Imagick($targetFile);
               // return $img->getNumberImages();
               $pdftext = file_get_contents($targetFile);
               $num_pag = (int)preg_match_all("/\/Page\W/", $pdftext,$dummy);
               return $num_pag ;
               
                
	}*/





	public function does_exists($username,$contact,$email=false,$promocode=false)
	{
		$this->db->where('username',$username);
		$this->db->or_where('contact',$contact);
		$this->db->or_where('firmcontact',$contact);
		//$this->db->or_where('email',$email);
		if($promocode!=NULL && $promocode!=false)
		  $this->db->or_where('promocode',$promocode);

		$query = $this->db->get('user');

		//$email_exists = 0;
		$contact_exists = 0;
		$username_exists = 0;
		$duplicate_exists = 0;
		$promocode_exists = 0;
		if($query->num_rows() > 0 )
		{
			
			foreach ($query->result() as $row) {
				/*if($row->email == $email){
					$duplicate_exists = 1;
					$email_exists = 1;
				}*/
				if($row->contact == $contact || $row->firmcontact == $contact){
					$duplicate_exists = 1;
					$contact_exists = 1;
				}
				if($row->username == $username){
					$duplicate_exists = 1;
					$username_exists = 1;
				}
				if($promocode!=NULL && $promocode!=false)
				{
				if($row->promocode==$promocode)
					$promocode_exists = 1;
			   }
			}
		}
		return array(
						"duplicate_exists"=>$duplicate_exists,
						//"email_exists"=>$email_exists,
						"username_exists"=>$username_exists,
						"contact_exists"=>$contact_exists,
						"promocode_exists"=>$promocode_exists
					);

	}
	public function getuserid($promocode)
	{
		$this->db->where('promocode',$promocode);
		$query = $this->db->get('user');
		$row = $query->row();
		$userid = 0;
		if(isset($row))
		{
			$userid = $row->id;
		}
		return $userid;
	}

    public function reset($username,$password){
    	$data = array("password"=>md5($password));
    	$this->db->where('username',$username);
    	$this->db->update("user",$data);
    	return array(
						"username"=>$username
					);
    }

	public function add($name,$username,$email=false,$contact,$password,$referredby)
	{
		//GENERATE PROMOCODE HERE.
		$promocode = $username.substr(md5($username),0,5);
		$data = array(
						"name"=>$name,
						"contact"=>$contact,
						//"email"=>$email,
						"username"=>$username,
						"password"=>md5($password),
						"referredbyuserid"=>$referredby,
						"promocode"=>$promocode
					);
		$this->db->insert("user",$data);
		$insertid = $this->db->insert_id();

		return array(
						"userid"=>$insertid,
						"promocode"=>$promocode
					);
	}

     public function mapimage($userid,$imageid,$sortorder)
     {
        $data = array(
						"userid"=>$userid,
						"imageid"=>$imageid,
						"sort_order"=>$sortorder
					);
		$this->db->insert('user_image',$data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}

	public function deleteimage($userid){
		$this->db->where('userid',$userid);
        $this->db->delete('user_image');
	}

	public function mapcategory($userid,$catid,$firmname,$firmcontact,$profileimageid,$address,$cityid,$ismerchant,$services,$email)
	{
		$data = array(
						"catid"=>$catid,
						"firmname"=>$firmname,
						"firmcontact"=>$firmcontact,
						"imageid"=>$profileimageid,
						"address"=>$address,
						"cityid"=>$cityid,
						"ismerchant"=>$ismerchant,
						"services"=>$services,
						"email"=>$email
					);
		$this->db->where('id',$userid);
		$this->db->update('user',$data);
		return $this->db->affected_rows();
	}
	public function does_exists_uservalue($userid,$catcontrolmappingid,$value=false)
	{
		$this->db->where('userid',$userid);
		$this->db->where('catcontrolmapid',$catcontrolmappingid);
		if($value !== false && $value !== NULL)
			$this->db->where('value',$value);

		$query = $this->db->get('catcontroluservalue');
		
		$row = $query->row();
		$id = 0;
		if(isset($row))
		{
			$id = $row->id;
		}
		return $id;
	}
	public function updateuservalue($id,$catcontrolmappingid,$userid,$value)
	{
		$data = array(
						"catcontrolmapid"=>$catcontrolmappingid,
						"userid"=>$userid,
						"value"=>$value
					);
		$this->db->where('id',$id);
		$this->db->update('catcontroluservalue',$data);
	}
	public function adduservalue($catcontrolmappingid,$userid,$value)
	{
		$data = array(
						"catcontrolmapid"=>$catcontrolmappingid,
						"userid"=>$userid,
						"value"=>$value
					);
		$this->db->insert("catcontroluservalue",$data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}
	public function getbasicdetails($userid)

	{   
		$this->load->model('gallery_model');
		$this->db->select('u.*,c.name as city,c.pincode');
		$this->db->select("GROUP_CONCAT( uimg.imageid SEPARATOR  '|' ) images");
		$this->db->where('u.id',$userid);

		$this->db->join('user_image uimg','uimg.userid=u.id','left');
		$this->db->join('city c','c.id = u.cityid','left');
		$query = $this->db->get('user u');

		$row = $query->row();

		$this->db->where('u.isactive','1');
		$this->db->where('u.referredbyuserid',$userid);
		$querycnt = $this->db->get('user u');
		 $wallet = $querycnt->num_rows();
		 $wallet = $wallet*200;
		$userdata = array();
		if(isset($row))
		{
			$userdata['contactdetails'] = "";
			$userdata['id'] = $row->id;
			$userdata['firmname'] = $row->firmname;
			$userdata['name'] = $row->name;
			$userdata['cityid'] = $row->cityid;
			$userdata['catid'] = $row->catid;
			$userdata['username'] = $row->username;
			$userdata['firmcontact'] = $row->firmcontact;
			$userdata['address'] = $row->address;
			$userdata['services'] = $row->services;
			$userdata['email'] = $row->email;
			$userdata['promocode'] = $row->promocode;
            $userdata['wallet'] = $wallet;
            if($row->address != "")
			{
				if($userdata['contactdetails'] == "")
					$userdata['contactdetails'] .= $row->address;
				else
					$userdata['contactdetails'] .= ", ".$row->address;
			}
			if($row->city != "")
			{
				if($userdata['contactdetails'] == "")
				{
					//$doctor['address_clinic'] .= $row->city;
				}
				else
					$userdata['contactdetails'] .= ", ".$row->city;
			}
			if($row->pincode != "")
			{
				if($userdata['contactdetails'] == "")
				{
					//$doctor['address_clinic'] .= $row->pincode;
				}
				else
					$userdata['contactdetails'] .= ", ".$row->pincode;
			}

			if($row->firmcontact != "")
			{
				if($userdata['contactdetails'] != "")
				{
					$userdata['contactdetails'] .= "\n"."Contact:".$row->firmcontact;
				}
			}
			if($row->email != "")
			{
				if($userdata['contactdetails'] != "")
				{
					$userdata['contactdetails'] .= "\n"."Email:".$row->email;
				}
			}


			$userdata['image'] = $this->gallery_model->getimagedata($row->imageid);

			$imgArray = explode("|",$row->images);
			$images = array();
			foreach ($imgArray as $index => $value)
			{
				if($value!=NULL && $value!=""){
				$image = $this->gallery_model->getimagedata($value);
				array_push($images,$image);
			}
			}
			$userdata['images'] = $images;	
			
			

		}
		return $userdata;

	}

	public function getdetails($userid)
	{
		$this->db->select("ccm.id,ccm.catid,cs.mastercontrolid,cs.label,cs.sortorder,ccm.screenid");
		$this->db->select("group_concat( ccuv.value separator '|' ) controlvalues");

		$this->db->join('catcontroluservalue ccuv','ccuv.catcontrolmapid = ccm.id');
		$this->db->join('controls cs','cs.id = ccm.controlsid');
		$this->db->where('ccuv.userid',$userid);
		$this->db->group_by('ccm.id');
		$query = $this->db->get('catcontrolmapping ccm');
		
		$details = array();
		$this->load->model('gallery_model');
		foreach ($query->result() as $row)
		{
			$detail = array();

			$detail['id'] = $row->id;
			$detail['catid'] = $row->catid;
			$detail['controlid'] = $row->mastercontrolid;
			$detail['label'] = $row->label;
			$detail['screenid'] = $row->screenid;
			if($row->mastercontrolid == 2)
			{
				$images = array();
				array_push($images,$this->gallery_model->getimagedata($row->controlvalues));
				$detail['value'] = $images;
			}
			else if($row->mastercontrolid == 3)
			{
				$images = array();
				foreach (explode("|",$row->controlvalues) as $index => $value)
				{
					$temp = $this->gallery_model->getimagedata($value);
					array_push($images,$temp);
				}
				$detail['value'] = $images;
			}
			else
			{
				$detail['value'] = $row->controlvalues;
			}

			array_push($details,$detail);
		}
		return $details;

	}

	public function getcatid($userid)
 	{
		$this->db->where('id',$userid);
		$query = $this->db->get('user');
  		$row = $query->row();
  		$catid = 0;
  		if(isset($row))
  		{
   			$catid = $row->catid;
  		}
  		return $catid;
 	}

public function getalluser(){
     $this->db->select('*');
     $query = $this->db->get('user');
     $all = array();
  foreach ($query->result() as $index => $row) {
   $single = array();

   $single['id'] = $row->id;
   $single['name'] = $row->firmname;
   $single['catid'] = $row->catid;


   array_push($all, $single);
  }
  return $all;
    }
}