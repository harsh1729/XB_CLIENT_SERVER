<?php
// This page is intended to check out the session variable and if it is not set then navigate it to login.php page.
include('db_connection.php');
session_start();
//echo $_SESSION['userId'];
if( !isset( $_SESSION['userId']) )
{
	
	/*$selectQuery = "select * from appconfig ";
	$selectResult = mysqli_query($db, $selectQuery );
	$serverPath = "";
	while( $selectRow = mysqli_fetch_array( $selectResult ) )
	{
		if( strcmp($selectRow['name'],"serverPath") === 0)
			$serverPath = $selectRow['value'];
	}*/
	
	header("location:login.php") or die();
}
else
{
	$selectQuery = "select isActive from client where id = (select clientId from admin where id = ".$_SESSION['userId'].")";
	$selectResult = mysqli_query($db,$selectQuery);
	$selectRow = mysqli_fetch_assoc($selectResult);
	$clientStatus = $selectRow['isActive'];
	if($clientStatus == 0)
	{
		session_destroy();
		header("location:login.php?msg=Your account has been expired!") or die();
	}
}
?>