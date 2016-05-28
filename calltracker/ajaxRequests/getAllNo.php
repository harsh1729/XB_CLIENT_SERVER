<?php
include("../db_connection.php");

$id = $_REQUEST['id'];
$callLogArray = array();
$selectQuery = "SELECT * FROM recordno WHERE agentId = ".$id."";
$selectResult = mysqli_query($db,$selectQuery);

while( $selectRow = mysqli_fetch_array( $selectResult ))
{
	$singleAgent = array();
	$singleAgent['id'] = $selectRow['id'];
	$singleAgent['name'] = $selectRow['name'];
    $singleAgent['phone'] = $selectRow['number'];
    $singleAgent['isrecord'] = $selectRow['isrecord'];
	array_push($callLogArray,$singleAgent);
	}
 echo json_encode($callLogArray);
?>