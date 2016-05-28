<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model{
	private $TABLE_NAME_GALLERY = "gallery";
	private $KEY_ITEM_ID = "id";
	private $KEY_ITEM_NAME = "name";
	private $KEY_ITEM_DATETIME = "datetime";
	private $KEY_ITEM_SIZE = "size";
	private $KEY_ITEM_WIDTH = "width";
	private $KEY_ITEM_HEIGHT = "height";
	private $KEY_ITEM_USERID = "userid";

	function __construct()
	{
		parent::__construct();
		$this->load->model('datetime_model');
	}

	public function getGalleryData($lastimageid=false)
	{
		$this->db->order_by($this->KEY_ITEM_ID,'desc');
		$this->db->limit(40);
		if($lastimageid != false)
			$this->db->where($this->KEY_ITEM_ID." <",$lastimageid);
		$query = $this->db->get($this->TABLE_NAME_GALLERY);
		$gallery = array();
		foreach ($query->result() as $row) {
			//$item = array();

			$item = $this->parseImageData($row->id,$row->name,$row->datetime,$row->size,$row->width,$row->height);
			/*$item['id'] = $row->id;
			$item['imagename'] = $row->name;

			$dt = DateTime::createFromFormat('Y-m-d H:i:s',$row->datetime,new DateTimeZone("GMT"));
			$YEAR = $dt->format('Y');
			$MONTH = $dt->format('m');
			$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
			$datetime = $dt->format('H:i:s d-m-Y');


			$item['imageurl'] = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$row->name);
			$item['thumburl'] = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR."thumb_".$row->name);
			$item['datetime'] = $datetime;
			$item['size'] = $row->size;
			$item['width'] = $row->width;
			$item['height'] = $row->height;*/

			array_push($gallery,$item);
		}
		return $gallery;
	}
	public function parseImageData($id,$name,$timestamp,$size,$width,$height)
	{
		$item = array();
			
		$item['id'] = $id;
		$item['imagename'] = $name;

		/*$dt = DateTime::createFromFormat('Y-m-d H:i:s',$timestamp,new DateTimeZone("GMT"));
		$YEAR = $dt->format('Y');
		$MONTH = $dt->format('m');
		$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
		$datetime = $dt->format('H:i:s d-m-Y');*/

		$YEAR = $this->datetime_model->getISTFromGMT($timestamp,'Y');
		$MONTH = $this->datetime_model->getISTFromGMT($timestamp,"m");
		$datetime = $this->datetime_model->getISTFromGMT($timestamp);

		$item['yeardir'] = $YEAR;
		$item['monthdir'] = $MONTH;
		$item['imageurl'] = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$name);
		$item['thumburl'] = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR."thumb_".$name);
		$item['datetime'] = $datetime;
		$item['size'] = $size;
		$item['width'] = $width;
		$item['height'] = $height;

		return $item;
	}
	public function getimagedata($imageid)
	{
		$this->db->where($this->KEY_ITEM_ID,$imageid);
		$query = $this->db->get($this->TABLE_NAME_GALLERY);
		$item = array();
		foreach ($query->result() as $row) {

			$item = $this->parseImageData($row->id,$row->name,$row->datetime,$row->size,$row->width,$row->height);
			
			/*$item['id'] = $row->id;
			$item['imagename'] = $row->name;

			$dt = DateTime::createFromFormat('Y-m-d H:i:s',$row->datetime,new DateTimeZone("GMT"));
			$YEAR = $dt->format('Y');
			$MONTH = $dt->format('m');
			$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
			$datetime = $dt->format('H:i:s d-m-Y');

			$item['yeardir'] = $YEAR;
			$item['monthdir'] = $MONTH;
			$item['imageurl'] = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$row->name);
			$item['thumburl'] = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR."thumb_".$row->name);
			$item['datetime'] = $datetime;
			$item['size'] = $row->size;
			$item['width'] = $row->width;
			$item['height'] = $row->height;*/

			//array_push($gallery,$item);
		}
		return $item;
	}
	public function removeimage($imageid)
	{
		$this->db->where($this->KEY_ITEM_ID,$imageid);
		$this->db->delete($this->TABLE_NAME_GALLERY);
	}
	public function delete_image_by_name($filelocation)
	{
		if($filelocation)
			unlink($filelocation);
	}
	public function upload_image($upload_path,$datetime,$relativepath,$userid)
	{
		if (!empty($_FILES))
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$size = $_FILES['file']['size'];
			$imgdim = getimagesize($_FILES["file"]['tmp_name']);
			$wdt = $imgdim[0];
			$hgt = $imgdim[1];

			$timedImgName = time().(time()+rand(100,500)).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$timedImgName;

			/******		Creating thumb for image START	**********/

				$extension = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
				$extension = strtolower($extension);

				if($extension=="jpg" || $extension=="jpeg" )
				{
					$src = imagecreatefromjpeg($_FILES['file']['tmp_name']);
				}
				else if($extension=="png")
				{
					$src = imagecreatefrompng($_FILES['file']['tmp_name']);
				}
				else 
				{
					$src = imagecreatefromgif($_FILES['file']['tmp_name']);
				}

				//list($width,$height)=getimagesize($uploadedfile);

				$newwidth=150;
				$newheight=($hgt/$wdt)*$newwidth;
				$tmp=imagecreatetruecolor($newwidth,$newheight);		// create an image of black color with specified width and height 

				imagealphablending($tmp, false);
				imagesavealpha($tmp, true);


				imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$wdt,$hgt);		//bool imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )


				//$filename = $uploadPath.$timeStamp.$image;
				$target_thumb = $upload_path.DIRECTORY_SEPARATOR."thumb_".$timedImgName;

				imagealphablending($src, true);

				if($extension=="jpg" || $extension=="jpeg" )
					imagejpeg($tmp,$target_thumb,100);
				else if($extension=="png")
					imagepng($tmp,$target_thumb);
				else
					imagepng($tmp,$target_thumb);

				imagedestroy($src);
				imagedestroy($tmp);

			/******		Creating thumb for image END  	**********/

			move_uploaded_file($tempFile,$targetFile);

			$data = array(
				$this->KEY_ITEM_NAME => $timedImgName,
				$this->KEY_ITEM_DATETIME => $datetime,
				$this->KEY_ITEM_SIZE => $size,
				$this->KEY_ITEM_WIDTH => $wdt,
				$this->KEY_ITEM_HEIGHT => $hgt,
				$this->KEY_ITEM_USERID => $userid
			);
			
			$this->db->insert($this->TABLE_NAME_GALLERY,$data);
			$insertid = $this->db->insert_id();
			//return $this->db->insert_id();

			/*$dt = DateTime::createFromFormat('Y-m-d H:i:s',$datetime,new DateTimeZone("GMT"));
			$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
			$date = $dt->format('H:i:s d-m-Y');*/

			$date = $this->datetime_model->getISTFromGMT($datetime);

			return array(
					"id" => $insertid,
					"imagename" => $timedImgName,
					"imageurl" => base_url($relativepath.DIRECTORY_SEPARATOR.$timedImgName),
					"thumburl" => base_url($relativepath.DIRECTORY_SEPARATOR."thumb_".$timedImgName),
					"datetime" => $date,
					"size" => $size,
					"width" => $wdt,
					"height" => $hgt
				);
		}
	}

	function upload_image_mob($upload_path,$datetime,$relativepath,$userid,$keys)
    {//$upload_path,$keys
       
		if (!empty($_FILES))
		{
			$imagename = array();
			$arrayKeys =  explode(",", $keys);
           
			foreach ($arrayKeys as $key)
			{
				/*$tempFile = $_FILES[$key]['tmp_name'];
				$replaceChars = array(" ",".");
				$timedImgName = time().(time()+rand(100,500)).".".pathinfo($_FILES[$key]['name'],PATHINFO_EXTENSION);
				$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$timedImgName;
				move_uploaded_file($tempFile,$targetFile);
				$imagename[$key.""] = $timedImgName;*/

				$tempFile = $_FILES[$key]['tmp_name'];
				$size = $_FILES[$key]['size'];
				$imgdim = getimagesize($_FILES[$key]['tmp_name']);
				$wdt = $imgdim[0];
				$hgt = $imgdim[1];

				$timedImgName = time().(time()+rand(100,500)).".".pathinfo($_FILES[$key]['name'],PATHINFO_EXTENSION);
				$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$timedImgName;

				/******		Creating thumb for image START	**********/

					/*$extension = pathinfo($_FILES[$key]['name'],PATHINFO_EXTENSION);
					$extension = strtolower($extension);

					if($extension=="jpg" || $extension=="jpeg" )
					{
						$src = imagecreatefromjpeg($_FILES[$key]['tmp_name']);
					}
					else if($extension=="png")
					{
						$src = imagecreatefrompng($_FILES[$key]['tmp_name']);
					}
					else 
					{
						$src = imagecreatefromgif($_FILES[$key]['tmp_name']);
					}

					//list($width,$height)=getimagesize($uploadedfile);

					$newwidth=150;
					$newheight=($hgt/$wdt)*$newwidth;
					$tmp=imagecreatetruecolor($newwidth,$newheight);		// create an image of black color with specified width and height 

					imagealphablending($tmp, false);
					imagesavealpha($tmp, true);


					imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$wdt,$hgt);		//bool imagecopyresampled ( resource $dst_image , resource $src_image , int $dst_x , int $dst_y , int $src_x , int $src_y , int $dst_w , int $dst_h , int $src_w , int $src_h )


					//$filename = $uploadPath.$timeStamp.$image;
					$target_thumb = $upload_path.DIRECTORY_SEPARATOR."thumb_".$timedImgName;

					imagealphablending($src, true);

					if($extension=="jpg" || $extension=="jpeg" )
						imagejpeg($tmp,$target_thumb,100);
					else if($extension=="png")
						imagepng($tmp,$target_thumb);
					else
						imagepng($tmp,$target_thumb);

					imagedestroy($src);
					imagedestroy($tmp);*/

				/******		Creating thumb for image END  	**********/

				move_uploaded_file($tempFile,$targetFile);

				$data = array(
					$this->KEY_ITEM_NAME => $timedImgName,
					$this->KEY_ITEM_DATETIME => $datetime,
					$this->KEY_ITEM_SIZE => $size,
					$this->KEY_ITEM_WIDTH => $wdt,
					$this->KEY_ITEM_HEIGHT => $hgt,
					$this->KEY_ITEM_USERID => $userid
				);
				
				$this->db->insert($this->TABLE_NAME_GALLERY,$data);
				$insertid = $this->db->insert_id();
				//return $this->db->insert_id();

				/*$dt = DateTime::createFromFormat('Y-m-d H:i:s',$datetime,new DateTimeZone("GMT"));
				$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
				$date = $dt->format('H:i:s d-m-Y');*/

				$date = $this->datetime_model->getISTFromGMT($datetime);

				$temp = array(
						"id" => $insertid,
						"imagename" => $timedImgName,
						"imageurl" => base_url($relativepath.DIRECTORY_SEPARATOR.$timedImgName),
						"thumburl" => base_url($relativepath.DIRECTORY_SEPARATOR."thumb_".$timedImgName),
						"datetime" => $date,
						"size" => $size,
						"width" => $wdt,
						"height" => $hgt
					);
				$imagename[$key] = $temp;
				//array_push($imagename,$temp);
			} 
			return $imagename;
		}
		else
			return "";
	}



}