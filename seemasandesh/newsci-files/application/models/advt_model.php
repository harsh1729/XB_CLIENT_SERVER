<?php

class Advt_model extends CI_Model
{
	function get_advt_types($clientid,$status = false)
	{
		$this->db->where('clientid',$clientid);
		if($status !== false)
			$this->db->where('status',$status);
		$query = $this->db->get('advttypes');
		$alladvttypes = array();
		foreach ($query->result() as $row)
		{
			$singleadvttype = array();

			$singleadvttype['id'] = $row->id;
			$singleadvttype['typename'] = $row->typename;
			$singleadvttype['detail'] = $row->detail;
			$singleadvttype['status'] = $row->status;
			$singleadvttype['intervalvalue'] = $row->intervalvalue;
			$singleadvttype['intervalfield'] = $row->intervalfield;

			array_push($alladvttypes, $singleadvttype);
		}
		return $alladvttypes;
	}
	function get_advt($folder,$advttypeid,$status = false)
	{
		$this->db->where('advttype',$advttypeid);
		if($status !== false)
			$this->db->where('isactive',$status);
		$query = $this->db->get('advt');
		$alladvt = array();
		foreach ($query->result() as $row)
		{
			$singleadvt = array();

			$singleadvt['id'] = $row->id;
			$singleadvt['content'] = $row->content;
			$singleadvt['weburl'] = $row->weburl;
			if($row->image != "")
				$singleadvt['image'] = base_url($folder.$row->image);
			else
				$singleadvt['image'] = "";
			$singleadvt['status'] = $row->isactive;

			array_push($alladvt, $singleadvt);
		}
		return $alladvt;
	}
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
	function delete_image_by_name($filepath)
	{
		unlink($filepath);
	}
	function save_advt($advttxt,$image,$advttype,$weburl)
	{
		$data = array(
			"content" => $advttxt,
			"image" => $image,
			"weburl" => $weburl,
			"advttype" => $advttype,
			"isactive" => 1
		);
		$this->db->insert('advt',$data);
		return $this->db->insert_id();
	}
	function update_advttype_timing($intervalvalue,$intervalfield,$id)
	{
		$data = array(
			"intervalvalue" => $intervalvalue,
			"intervalfield" => $intervalfield,
		);
		$this->db->where('id',$id);
		$this->db->update('advttypes',$data);
	}
	function update_advttype_status($status,$id)
	{
		$data = array(
			"status" => $status
		);
		$this->db->where('id',$id);
		$this->db->update('advttypes',$data);
	}
	function update_advt_status($status,$id)
	{
		$data = array(
			"isactive" => $status
		);
		$this->db->where('id',$id);
		$this->db->update('advt',$data);
	}
	function get_advt_image_name($advtid)
	{
		$this->db->select('image');
		$this->db->where('id',$advtid);
		$query = $this->db->get('advt');
		if($query->result())
			return $query->result()[0]->image;
		else
			return "";
	}
	function delete_advt($advtid)
	{
		$this->db->where('id',$advtid);
		$this->db->delete('advt');
	}
	function update_advt($advttxt,$image,$advtid,$weburl)
	{
		$data = array(
			"content" => $advttxt,
			"image" => $image,
			"weburl" => $weburl
		);
		$this->db->where('id',$advtid);
		$this->db->update('advt',$data);
	}
	function get_intervalfield($advttypeid)
	{
		$this->db->where('id',$advttypeid);
		$this->db->select('intervalfield');
		$query = $this->db->get('advttypes');
		if($query->result())
			return $query->result()[0]->intervalfield;
		else
			return "";
	}
	function get_intervalvalue($advttypeid)
	{
		$this->db->where('id',$advttypeid);
		$this->db->select('intervalvalue');
		$query = $this->db->get('advttypes');
		if($query->result())
			return $query->result()[0]->intervalvalue;
		else
			return "";
	}
	function get_advttype_id($clientid,$pagename)
	{
		$this->db->select('id');
		$this->db->where('clientid',$clientid);
		$this->db->where('pagename',$pagename);
		$query = $this->db->get('advttypes');
		if($query->result())
			return $query->result()[0]->id;
		else
			return false;
	}
}