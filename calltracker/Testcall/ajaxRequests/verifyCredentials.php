<?php
include("../db_connection.php");
session_start();

$uname = $_REQUEST['username'];
$pwd = md5($_REQUEST['password']);

$selectQuery = "SELECT * FROM `admin` WHERE username = '".$uname."' and password = '".$pwd."'";
$selectResult = mysql_query( $selectQuery );
$rowCount = mysql_num_rows($selectResult);

$jsonArray['rowCount'] = $rowCount;
if($rowCount === 1)
{
	while($selectRow = mysql_fetch_array($selectResult) )
	{
		$jsonArray['userId'] = $selectRow['id'];
		$_SESSION['userId'] = $selectRow['id'];
	}
}

echo json_encode($jsonArray);

?>