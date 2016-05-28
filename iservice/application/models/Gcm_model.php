<?php

class Gcm_model extends CI_Model{

   /* function gcm_user_register($gcm_id,$app_version,$client_id,$name,$contact,$device_id)
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
                
   }*/
//jasvinder
   //APA91bH__rurnaL1bMXk5Wk3cRqtpN2ohyj18eyumk2e6Vk_91xtLqOXq3NtzY_hkmBv3VJllHDfUOPkQ3RCNa9lBezJE67DCvt_Lq5JyoiTWG98mbB2KwdIbY8eEfyZdYf2f0eXN-mJ
//harsh
   //APA91bEpRgwYVMuePWT_mr8PM8HnPKCpoo7Q-l_xpSfAm58V03orbtKbDu7rS2PB84Ly8xy2KN7K34AsrmDRQ9xm5SReC2pr1a2suvL-us3Wm_GZHkvcaeZjpMDDSq72Lqkn8ilUlkga

/*function gcm_send_notification($client_id,$heading,$content,$news_id)
   {
   
        $url = 'https://android.googleapis.com/gcm/send';
		$consoleAPIKey ="AIzaSyDVmCaR_Y7vyJPdPIvaZUHPJfS6aBVj-wk";
		if($news_id === false)
		{
			$msgToSend = array("heading" => $heading,"content" => $content); 	
		}
		else
		{
			$msgToSend = array("heading" => $heading,"content" => $content,"news_id" => $news_id); 	
		}
       	

       $gcm_list = array(
       						"APA91bH__rurnaL1bMXk5Wk3cRqtpN2ohyj18eyumk2e6Vk_91xtLqOXq3NtzY_hkmBv3VJllHDfUOPkQ3RCNa9lBezJE67DCvt_Lq5JyoiTWG98mbB2KwdIbY8eEfyZdYf2f0eXN-mJ",
       						"APA91bEpRgwYVMuePWT_mr8PM8HnPKCpoo7Q-l_xpSfAm58V03orbtKbDu7rS2PB84Ly8xy2KN7K34AsrmDRQ9xm5SReC2pr1a2suvL-us3Wm_GZHkvcaeZjpMDDSq72Lqkn8ilUlkga"
       					);
       
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
		 return json_encode(array('status'=>'login'));
//		 return json_encode(array('status'=>'login','data'=>$gcm_list));
   }*/

    function gcm_send_notification($heading,$content,$cityid)
   {
   
        $url = 'https://android.googleapis.com/gcm/send';
		$consoleAPIKey ="AIzaSyCDHV7tcX1lpy_mW6zUFexsmJp1unWPXlQ";
		
			$msgToSend = array("heading" => $heading,"content" => $content); 	
		$this->db->select('gc.gcmtextid as gcm_id');
        $this->db->where('gm.cityid',$cityid);
        $this->db->join('gcmusercitymapping gm','gc.id=gm.gcmid');
       $query = $this->db->get('gcmuser gc');
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
		 return json_encode(array('status'=>'login'));
//		 return json_encode(array('status'=>'login','data'=>$gcm_list));
   }

}