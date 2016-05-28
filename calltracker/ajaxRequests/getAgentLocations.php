<?php
include('../db_connection.php');
$agentId = $_REQUEST['agentId'];
$startDate = $_REQUEST['startDate'];
$endDate = $_REQUEST['endDate'];

/*

SELECT MIN(lattitude) AS lattitude, MIN(longitude) AS longitude, MIN(place) AS place, MIN(agentId) AS agentId, MIN(daytime) AS mindaytime, MAX(daytime) AS maxdaytime, COUNT(*) cnt FROM ( 
	SELECT @r := @r + (
						@lat != lattitude OR @lon != longitude OR @lat IS NULL OR @lon IS NULL
					  ) AS con,
					@lat := lattitude AS lt, 
					@lon := longitude AS lg, 
					s.lattitude, 
					s.longitude, 
					s.place, 
					s.agentId,
					s.daytime FROM ( SELECT @r := 0, @lat := NULL, @lon := NULL ) vars, 
					location s ORDER BY daytime DESC 
				) tempTable where agentId = 2 and daytime BETWEEN STR_TO_DATE('21-01-2015','%d-%m-%Y') and DATE_ADD(STR_TO_DATE('21-01-2015','%d-%m-%Y'),INTERVAL 1 DAY) GROUP BY con
*/

$finalArray = array();
//$selectLocationQuery = "select * from location where agentId = ".$agentId." and daytime BETWEEN STR_TO_DATE('".$startDate."','%d-%m-%Y') and DATE_ADD(STR_TO_DATE('".$endDate."','%d-%m-%Y'),INTERVAL 1 DAY) order by daytime asc";
$selectLocationQuery = "SELECT MIN(lattitude) AS lattitude, MIN(longitude) AS longitude, MIN(place) AS place, MIN(agentId) AS agentId, MIN(daytime) AS mindaytime, MAX(daytime) AS maxdaytime, COUNT(*) cnt FROM ( 
	SELECT @r := @r + (
						@lat != lattitude OR @lon != longitude OR @lat IS NULL OR @lon IS NULL
					  ) AS con,
					@lat := lattitude AS lt, 
					@lon := longitude AS lg, 
					s.lattitude, 
					s.longitude, 
					s.place, 
					s.agentId,
					s.daytime FROM ( SELECT @r := 0, @lat := NULL, @lon := NULL ) vars, 
					location s ORDER BY daytime DESC 
				) tempTable where agentId = ".$agentId." and 
					daytime BETWEEN STR_TO_DATE('".$startDate."','%d-%m-%Y') and 
					DATE_ADD(STR_TO_DATE('".$endDate."','%d-%m-%Y'),INTERVAL 1 DAY) 
					GROUP BY con";
$selectLocationResult = mysqli_query($db,$selectLocationQuery);
while($selectLocationRow = mysqli_fetch_array($selectLocationResult))
{
	$singleLocationArray = array();
	array_push($singleLocationArray,$selectLocationRow['lattitude']);
	array_push($singleLocationArray,$selectLocationRow['longitude']);
	array_push($singleLocationArray,date('h:i:s A d-m-Y',strtotime($selectLocationRow['mindaytime'])));
	array_push($singleLocationArray,date('h:i:s A d-m-Y',strtotime($selectLocationRow['maxdaytime'])));
	
	array_push($finalArray,$singleLocationArray);
}

echo json_encode($finalArray);
?>