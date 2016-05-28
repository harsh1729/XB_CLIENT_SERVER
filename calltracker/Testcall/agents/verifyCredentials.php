<?php
include("../db_connection.php");
session_start();

$uname = $_REQUEST['username'];
$pwd = md5($_REQUEST['password']);

$selectQuery = "SELECT * FROM `admin` WHERE username = '".$uname."' and password = '".$pwd."'";
$selectResult = mysql_query( $selectQuery );
$rowCount = mysql_num_rows($selectResult);

//$jsonArray['rowCount'] = $rowCount;
if($rowCount > 0)
{
    while($selectRow = mysql_fetch_array($selectResult) )
	{
		$jsonArray['userId'] = $selectRow['id'];
        $jsonArray['isActive'] = $selectRow['isActive'];
		$_SESSION['userId'] = $selectRow['id'];
         $jsonArray['errorCode'] = 0;
	}
}else if($rowCount === 0)
{
   $jsonArray['errorCode'] = 1;
}

echo json_encode($jsonArray);

?>