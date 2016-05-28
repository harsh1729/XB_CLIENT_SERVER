<?php
include('../db_connection.php');

$fromid= $_REQUEST['firstid'];
$toid= $_REQUEST['secondid'];

$selectQuery = "select songrecord from calllog where id between '".$fromid."' and '".$toid."'";
$selectResult = mysqli_query($db, $selectQuery );

while( $selectRow = mysqli_fetch_array( $selectResult ) )
{
	
	if($selectRow['songrecord']!='' && $selectRow['songrecord']!=NULL){
	    //echo 'r3narang.in/recording/'.$selectRow['songrecord'];
	                           $delete=$selectRow['songrecord'];
                                    unlink("../recording/$delete");
	   
	   // unlink('../recording/'.$selectRow['songrecord']);
	     
	}
	
}
$deleteQuery = "Delete FROM calllog where id between '".$fromid."' and '".$toid."'";
$deleteResult = mysqli_query($db, $deleteQuery);
echo json_encode($deleteQuery);
?>