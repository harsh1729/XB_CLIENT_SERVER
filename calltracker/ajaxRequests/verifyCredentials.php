<?php
include("../db_connection.php");
session_start();

$uname = $_REQUEST['username'];
$pwd = md5($_REQUEST['password']);

$selectQuery = "SELECT * FROM `admin` WHERE username = '".$uname."' and password = '".$pwd."'";
$selectResult = mysqli_query($db,$selectQuery);
$rowCount = mysqli_num_rows($selectResult);

$jsonArray['rowCount'] = $rowCount;
if($rowCount === 1)
{
	while($selectRow = mysqli_fetch_array($selectResult) )
	{
		$jsonArray['userId'] = $selectRow['id'];
		$_SESSION['userId'] = $selectRow['id'];
	}
}

echo json_encode($jsonArray);

?>