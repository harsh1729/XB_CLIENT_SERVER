<?php
include("db_connection.php");
include("checkLoginOrNot.php");
$checkSuperAdminQuery = "select isSuperAdmin from admin where id = ".$_SESSION['userId']." limit 1";
$checkSuperAdminResult = mysqli_query($db,$checkSuperAdminQuery);
$checkSuperAdminRow = mysqli_fetch_assoc($checkSuperAdminResult);
$isSuperAdmin = $checkSuperAdminRow['isSuperAdmin'];
?>
<html>
	<head>
		/*<meta charset="utf-8" />
		
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/jasny-bootstrap.min.css" rel="stylesheet" />
		<link href="css/bootstrap-table.min.css" rel="stylesheet"/>
		<style>
		  	STYLE FOR NAVIGATIONAL MENUS		
			
			
		</style>
<script>
	//$(document).ready(function(e) {
        $('#deleteform').submit(function(e) {
			var postData = $(this).serializeArray();
			console.log(postData);
			var formUrl = "r3narang.in/ajaxRequests/delete_calllog.php";
			$.ajax({				
					async: true,
					type: 'POST',
					url:formUrl,
					//data: encodeURIComponent(postData),
					data: postData,
					success: function(data, textStatus, jqXHR){
						console.log(data);
						var dataObj = $.parseJSON(data);
						if(dataObj.rowCount == 1 )
						{
						alert("Success");	
						}
						else
						{
							
						}
						
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
						alert(textStatus);
					}  
				});
            e.preventDefault();
        });
  //  });
</script>
	*/	
		
		
	</head>
	<body>
	
 <form role="form" id="deleteform" action="../ajaxRequests/delete_calllog.php">
	<div style="height:100%;width:100%;position:fixed;margin:50px;">
	
	<input type = "text" style="width:20%;" name = "firstid" id = "fromid" class="form-control " required placeholder = "insert from id"/>
	<br/>
	<br/>
	<input type = "text" style="width:20%;" name = "secondid" id = "toid" class="form-control " required placeholder = "to from id"/>
	<br/>
	<br/>
	<button type="submit" class="btn btn-success">Run</button>
	</div>
</form>	
	</body>
</html>