<?php 
  include("../db_connection.php");
  $phone = $_REQUEST['phone'];
  $id = $_REQUEST['id'];
  $ischecked = $_REQUEST['ischecked'];
   $updatecheckedQuery = "UPDATE recordno SET isrecord = '1' WHERE number = ".$phone." AND agentId =".$id."";
   $updateuncheckedQuery = "UPDATE recordno SET isrecord = '0' WHERE number = ".$phone." AND agentId =".$id."";
   $updateallchecked = "UPDATE recordno SET isrecord = '1' AND agentId =".$id."";
    $updatealldeselect = "UPDATE recordno SET isrecord = '0' AND agentId =".$id."";
 if($ischecked=="false")
$selectResult = mysqli_query($db,$updatecheckedQuery);
 else if($ischecked=="true")
 $selectResult = mysqli_query($db,$updateuncheckedQuery);
else if($ischecked=="All")
	$selectResult = mysqli_query($db,$updateallchecked);
else
	$selectResult = mysqli_query($db,$updatealldeselect);
echo "success"
 ?>