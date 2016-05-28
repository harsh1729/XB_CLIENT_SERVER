<?php 
  include("../db_connection.php");
 $ischecked = $_REQUEST['ischecked'];
 $id = $_REQUEST['id'];
   $updatecheckedQuery = "UPDATE agents SET recordAll = '1' WHERE id = ".$id."";
   $updateuncheckedQuery = "UPDATE agents SET recordAll = '0' WHERE id = ".$id."";
 if($ischecked=="false")
$selectResult = mysqli_query($db,$updatecheckedQuery);
 else if($ischecked=="true")
 $selectResult = mysqli_query($db,$updateuncheckedQuery);

echo "success"
 ?>