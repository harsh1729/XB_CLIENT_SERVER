<?php
include('../db_connection.php');
session_start();

$oldPwd = md5($_REQUEST['oldpwd']);
$pwd1 = md5($_REQUEST['pwd1']);
$pwd2 = md5($_REQUEST['pwd2']);
$adminId = $_SESSION['userId'];
$resultArray = array();
if($pwd1 == $pwd2)
{
	$updateQuery = "update admin set password = '".$pwd1."' where id = ".$adminId." and password = '".$oldPwd."'";
	$resultArray['query'] = $updateQuery;
	mysqli_query($db,$updateQuery);
	$updateResult = mysqli_affected_rows($db);
	$pwdStatus = true;
	$resultArray['updateStatus'] = $updateResult;
	$resultArray['pwdStatus'] = $pwdStatus;
}
else
{
	$pwdStatus = false;
	$resultArray['pwdStatus'] = $pwdStatus;
}
echo json_encode($resultArray);
?>