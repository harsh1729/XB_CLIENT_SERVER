<?php

class Auto_sandesh_model extends CI_Model
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
	function save_auto_sandesh($clientid,$filename,$save_auto_sandesh)
	{
		$data = array(
			"client_id" => $clientid,
			"image" => $filename,
			"text" => $save_auto_sandesh
		);
		$this->db->insert('auto_sandesh',$data);
		return $this->db->insert_id();
	}
	
	function delete_files($filepath)
	{
		unlink($filepath);
	}
	function get_auto_sandesh($clientid,$folders,$limit)
	{
		$this->db->where('client_id',$clientid);
		$this->db->limit($limit);
		$this->db->order_by('id','desc');
		$query = $this->db->get('auto_sandesh');
		$alldata = array();
		foreach($query->result() as $index => $row)
		{
			$singledata = array();
			$singledata['text'] = $row->text;
			if($row->image != "")
				$singledata['image'] = base_url($folders['featuresuploadedfiles'].$row->image);
			else
				$singledata['image'] = "";
				
			array_push($alldata,$singledata);
		}
		return $alldata;
	}
}