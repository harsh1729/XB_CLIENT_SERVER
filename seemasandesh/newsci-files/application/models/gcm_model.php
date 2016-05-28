<?php

class Gcm_model extends CI_Model{

    function gcm_user_register($gcm_id,$app_version,$client_id,$name,$contact,$device_id)
   {
               
         $this->db->where('device_id',$device_id);
         $this->db->where('client_id',$client_id);
         $query = $this->db->get('gcm_user');
         $queryresult = $query->num_rows( );
         if($queryresult < 1)
         { 
			$data = array(
				'gcm_id'=>$gcm_id,
				'app_version'=>$app_version,
				'client_id'=>$client_id,
				'device_id'=>$device_id,
				'name'=>"",
				'contact'=>""
			);
	        $this->db->insert('gcm_user',$data);
    	}
		else
		{
			$data = array(
				'gcm_id'=>$gcm_id,
				'app_version'=>$app_version,
				'client_id'=>$client_id,
				'name'=>$name,
				'contact'=>$contact
			);
			$this->db->where('device_id',$device_id);
			$this->db->where('client_id',$client_id);
			$this->db->update('gcm_user',$data);
		}
	return json_encode("success");
                
   }

    function gcm_send_notification($client_id,$heading,$content,$news_id)
   {
   
        $url = 'https://android.googleapis.com/gcm/send';
		$consoleAPIKey ="AIzaSyBzPwDXGbHOKj6KqhjnIIpKOC0JvhYqHqU";
		if($news_id === false)
		{
			$msgToSend = array("heading" => $heading,"content" => $content); 	
		}
		else
		{
			$msgToSend = array("heading" => $heading,"content" => $content,"news_id" => $news_id); 	
		}
       	

       $this->db->where('client_id',$client_id);
       $query = $this->db->get('gcm_user');
       $gcm_list = array();
       foreach ($query->result() as $row) 
		{
            array_push($gcm_list,$row->gcm_id);
		}

        $gcmIdChunk950 = array_chunk($gcm_list ,950);
		$resultArray = array();
       	foreach( $gcmIdChunk950 as $gcmIds)
		{
			$fields = array(
								'registration_ids'  => $gcmIds,
								'data'           => $msgToSend,
							);
			 
			$headers = array(
								'Authorization: key='.$consoleAPIKey,
								'Content-Type: application/json'
							);
			 
			// Open connection
			$ch = curl_init();
			 
			// Set the url, number of POST vars, POST data
			curl_setopt( $ch, CURLOPT_URL, $url );
			 
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			 
			curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ));
			 
			// Execute post
			$result = curl_exec($ch);
		    $resultDecode = json_decode( $result ,true );
			 
			// Close connection
			curl_close($ch);
			array_push($resultArray,$resultDecode );
		}
		 return json_encode(array('status'=>'login'));;
   }

}