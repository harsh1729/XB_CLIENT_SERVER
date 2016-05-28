<?php

class Contact_us_model extends CI_Model
{
	function save_message($clientid,$device_uid,$message,$contact_detail,$name)
	{
		$dt = new DateTime($row->datetime,new DateTimeZone('GMT'));
		$datetime = $dt->format("Y-m-d H:i:s");
		
		$data = array(
			'clientid'=>$clientid,
			'device_uid' => $device_uid,
			'contact_detail' => $contact_detail,
			'content' => $message,
			'name' => $name,
			'datetime' => $datetime
		);
		$this->db->insert('suggestions',$data);
		
		//return $this->db->insert_id();
		$status = $this->db->insert_id();
		return $status;
	}
	function get_message($clientid,$limit,$lastmessageid = false,$needBRtag=false)
	{
		$this->db->where('clientid',$clientid);
		$this->db->limit($limit);
		$this->db->order_by("id",'desc');
		if($lastmessageid)
			$this->db->where('id <',$lastmessageid);
		$query = $this->db->get('suggestions');
		$allmessages = array();
		foreach($query->result() as $index => $row)
		{
			$singlemessage = array();
			
			$singlemessage['id'] = $row->id;
			if($needBRtag)
				$singlemessage['message'] = nl2br($row->content);
			else
				$singlemessage['message'] = $row->content;
			$singlemessage['name'] = $row->name;
			$singlemessage['contact'] = $row->contact_detail;
			
			$dt = new DateTime($row->datetime,new DateTimeZone('GMT'));
			$dt->setTimeZone( new DateTimeZone("Asia/Kolkata") );
			$singlemessage['datetime'] = $dt->format("H:i:s d-m-Y");
			
			array_push($allmessages,$singlemessage);
		}
		return $allmessages;
		//return $this->db->last_query();
	}
}