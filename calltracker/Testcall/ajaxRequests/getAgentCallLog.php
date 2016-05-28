<?php
include("../db_connection.php");
/*
select id,name,dob,status,
  max(case when callTypeId = 1 then cnt else 0 end) Incoming,
  max(case when callTypeId = 2 then cnt else 0 end) Outgoing,
  max(case when callTypeId = 3 then cnt else 0 end) Missed,
  max(case when callTypeId = 4 then cnt else 0 end) Cut
from (select agents.id,agents.name,agents.status,agents.dob,calllog.callTypeId,count(calllog.callTypeId) as cnt from calllog inner join agents on agents.id = calllog.agentId where agents.adminId = 1 and agents.isActive = 1 group by calllog.callTypeId,calllog.agentId order by agents.id asc) as tbl group by id

*/
session_start();
$uId = $_SESSION['userId'];

$agentArray= array();
$selectQuery = "select id,name,dob,status,
  max(case when callTypeId = 1 then cnt else 0 end) Incoming,
  max(case when callTypeId = 2 then cnt else 0 end) Outgoing,
  max(case when callTypeId = 3 then cnt else 0 end) Missed,
  max(case when callTypeId = 4 then cnt else 0 end) Cut
from (select agents.id,agents.name,agents.status,agents.dob,calllog.callTypeId,count(calllog.callTypeId) as cnt from calllog inner join agents on agents.id = calllog.agentId where agents.adminId = ".$uId." and agents.isActive = 1 group by calllog.callTypeId,calllog.agentId order by agents.id asc) as tbl group by id";
$selectResult = mysql_query( $selectQuery );
while( $selectRow = mysql_fetch_array( $selectResult ) )
{
	$singleAgent = array();
	$singleAgent['id'] = $selectRow['id'];
	$singleAgent['name'] = $selectRow['name'];
	$singleAgent['status'] = $selectRow['status'];
	$singleAgent['dob'] = $selectRow['dob'];
	$singleAgent['Incoming'] = $selectRow['Incoming'];
	$singleAgent['Outgoing'] = $selectRow['Outgoing'];
	$singleAgent['Missed'] = $selectRow['Missed'];
	$singleAgent['Cut'] = $selectRow['Cut'];
	
	array_push($agentArray,$singleAgent);
}

echo json_encode($agentArray);
?>