<?php

class Public_message_model extends CI_Model
{

	function upload_image($upload_path)
	{
		if (!empty($_FILES))
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$replaceChars = array(" ",".");
			$timedImgName = time().(time()+rand(100,500)).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			
			//$targetFile =  $upload_path."/".$this->str_lreplace("_",".",$timedImgName);

			$CI =& get_instance();
			$CI->load->library('xerces_globals');
			$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$timedImgName);
			
			move_uploaded_file($tempFile,$targetFile);
			//return $this->str_lreplace("_",".",$timedImgName);
			return $timedImgName;
		}
	}
	function save_public_message($clientid,$filename,$save_auto_sandesh,$datetime,$type)
	{
		$data = array(
			"clientid" => $clientid,
			"image" => $filename,
			"text" => $save_auto_sandesh,
			"date" => $datetime,
			"type" => $type
		);
		$this->db->insert('publicmessage',$data);
		return $this->db->insert_id();
	}
	
	function delete_files($filepath)
	{
		unlink($filepath);
	}
	function get_public_message($clientid,$folders,$date)
	{
		$this->db->where('clientid',$clientid);
		$this->db->where('date >= ',$date);
		$query = $this->db->get('publicmessage');
		$allmessages = array();
		foreach($query->result() as $index => $row)
		{
			$singlemessage = array();
			$singlemessage['id'] = $row->id;
			if($row->image != "")
				$singlemessage['image'] = base_url($folders['featuresuploadedfiles'].$row->image);
			else
				$singlemessage['image'] = '';
			$singlemessage['text'] = $row->text;
			$singlemessage['type'] = $row->type;
			array_push($allmessages,$singlemessage);
		}
		return $allmessages;
		//return $this->db->last_query();
	}
	
}