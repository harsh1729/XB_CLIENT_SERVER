<?php
include('../db_connection.php');


$upload_path = "../recording/";
$keys = $_REQUEST['keys'];
$deviceId = $_REQUEST['deviceId'];
$audioname = array();
$isDeviceRegisteredQuery = "SELECT * FROM device where uid = '".$deviceId."' limit 1";
$isDeviceRegisteredResult = mysqli_query($db,$isDeviceRegisteredQuery);
$isDeviceResiteredRowCount = mysqli_num_rows($isDeviceRegisteredResult);
if($isDeviceResiteredRowCount === 1)
{
	$deviceRegistered = true;
	
	// Check if Device is mapped with Agent
	$isDeviceMappedQuery = "SELECT * FROM agentdevicemapping WHERE deviceId = (select id from device where uid = '".$deviceId."') limit 1";
	$isDeviceMappedResult = mysqli_query($db,$isDeviceMappedQuery);
	$isDeviceMappedRowCount = mysqli_num_rows($isDeviceMappedResult);
	if($isDeviceMappedRowCount === 1)
	{
		$mappedStatus = true;
		$deviceMappedRow = mysqli_fetch_assoc($isDeviceMappedResult);
		$agentId = $deviceMappedRow['agentId'];
     if (!empty($_FILES))
		{
			
			$arrayKeys =  explode(",", $keys);
           
			foreach ($arrayKeys as $key)
			{
				$tempFile = $_FILES[$key]['tmp_name'];
			//	$replaceChars = array(" ",".");
				$timedImgName = time().str_replace($replaceChars,"_",$_FILES[$key]['name']);

				//$targetFile =  $upload_path."/".$this->str_lreplace("_",".",$timedImgName);
                //$targetFile =  $upload_path.str_last_replace("_",".",$timedImgName);
                  //  ffmpeg -i $tempFile -acodec libmp3lame -ac 2 -ab 160k outputfile.mp3
				$movedfile = move_uploaded_file($tempFile,$upload_path.$timedImgName);
				//return $this->str_lreplace("_",".",$timedImgName);
				// $imagenamearray = array("$i" => $timedImgName);
				//array_push($imagename,$timedImgName);
				//$fullname = $i."_".$timedImgName;

				$audioname[$key] = $timedImgName;
                //$audioname[$key] = $movedfile;
			} 
		}
	}
}
//echo json_encode(array("SUSHIL"=>"sushil"));
echo json_encode(array("audioName"=>$audioname,"status"=>"succes"));
//echo "{'status':'sushil'}";
		
	 
?>