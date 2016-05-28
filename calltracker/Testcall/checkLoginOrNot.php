<?php
// This page is intended to check out the session variable and if it is not set then navigate it to login.php page.
include('db_connection.php');
session_start();
//echo $_SESSION['userId'];
if( !isset( $_SESSION['userId']) )
{
	
	/*$selectQuery = "select * from appconfig ";
	$selectResult = mysql_query( $selectQuery );
	$serverPath = "";
	while( $selectRow = mysql_fetch_array( $selectResult ) )
	{
		if( strcmp($selectRow['name'],"serverPath") === 0)
			$serverPath = $selectRow['value'];
	}*/
	
	header("location:login.php") or die();
}
else
{
	$selectQuery = "select isActive from client where id = (select clientId from admin where id = ".$_SESSION['userId'].")";
	$selectResult = mysql_query($selectQuery);
	$selectRow = mysql_fetch_assoc($selectResult);
	$clientStatus = $selectRow['isActive'];
	if($clientStatus == 0)
	{
		session_destroy();
		header("location:login.php?msg=Your Access is Blocked!") or die();
	}
}
?>