<?php
include("../db_connection.php");

$id = $_REQUEST['id'];
$selectQuery = "SELECT * FROM agents WHERE id = ".$id."";
$selectResult = mysqli_query($db,$selectQuery);
$checkrecord = 0;
while( $selectRow = mysqli_fetch_array( $selectResult ))
{
  $checkrecord = $selectRow['recordAll'];
}
 echo $checkrecord; 
?>
   