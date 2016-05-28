<?php

class Advt_model extends CI_Model
{
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
			$timedImgName = "advt_".time().(time()+rand(100,500)).".".pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			
			$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$timedImgName;
			
			move_uploaded_file($tempFile,$targetFile);
			return $timedImgName;
		}
	}
	function save_advt($advttxt,$advtimg,$weburl)
	{
		$data = array(
			'txt' => $advttxt,
			'image' => $advtimg,
			'url' => $weburl

		);
		$this->db->insert('advt',$data);
		return $this->db->insert_id();
	}
	function getAdvt()
	{
		$this->db->order_by('id','DESC');
		$query = $this->db->get('advt');

		$advtall = array();
		foreach ($query->result() as $index => $row) {
			$advt = array();
			$advt['id'] = $row->id;
			$advt['txt'] = $row->txt;
			if($row->image != "")
				$advt['image'] = base_url('uploaded_images/'.$row->image);
			else
				$advt['image'] = "";
			$advt['url'] = $row->url;
			
			array_push($advtall,$advt);
		}
		$randNum = rand(0,count($advtall)-1);
		return $advtall[$randNum];
	}
	function getAdvtAll()
	{
		$this->db->order_by('id','DESC');
		$query = $this->db->get('advt');

		$advtall = array();
		foreach ($query->result() as $index => $row) {
			$advt = array();
			$advt['id'] = $row->id;
			$advt['txt'] = $row->txt;
			if($row->image != "")
				$advt['image'] = base_url('uploaded_images/'.$row->image);
			else
				$advt['image'] = "";
			$advt['url'] = $row->url;
			
			array_push($advtall,$advt);
		}

		return $advtall;
	}
	function getAdvtImgById($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('advt');
		
		//$advt = array();
		$img = "";
		foreach ($query->result() as $index => $row) {
			$img = $row->image;
		}

		return $img;
	}
	function removeAdvt($advtid)
	{
		$this->db->delete('advt','id = '.$advtid);
	}
}