<?php

class Joke_model extends CI_Model
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
	function save_joke($clientid,$filename,$joke_text)
	{
		$data = array(
			"client_id" => $clientid,
			"image" => $filename,
			"text" => $joke_text
		);
		$this->db->insert('joke',$data);
		return $this->db->insert_id();
	}
	function delete_files($filepath)
	{
		unlink($filepath);
	}
	function get_joke($folders,$clientid)
	{
    		$this->db->where('client_id',$clientid);
    		$this->db->order_by('id','desc');
    		$this->db->limit(1);
		$query = $this->db->get('joke');
		if($query->result())
		{
			//return $query->result()[0];
//			featuresuploadedfiles
			$output = array();
			$output['id'] = $query->result()[0]->id;
			if($query->result()[0]->image !== "")
				$output['image'] = base_url($folders['featuresuploadedfiles'].$query->result()[0]->image);
			else
				$output['image'] = $query->result()[0]->image;
			
			$output['text'] = $query->result()[0]->text;
			return $output;
		}
		else
			return false;
	}
}