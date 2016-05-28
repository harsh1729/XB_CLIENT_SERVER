<?php
include("db_connection.php");
include("checkLoginOrNot.php");
$checkSuperAdminQuery = "select isSuperAdmin from admin where id = ".$_SESSION['userId']." limit 1";
$checkSuperAdminResult = mysql_query($checkSuperAdminQuery);
$checkSuperAdminRow = mysql_fetch_assoc($checkSuperAdminResult);
$isSuperAdmin = $checkSuperAdminRow['isSuperAdmin'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/jasny-bootstrap.min.css" rel="stylesheet" />
		<style>
		/*  	STYLE FOR NAVIGATIONAL MENUS		*/
			body 
			{
				padding-top: 60px;
				padding-bottom: 20px;
			}
			#leftSideMenu
			{
				padding-top: 50px;
			}
			.navmenu
			{
				width:45%;
			}
			.navbar-offcanvas
			{
				width:45%;
			}
			@media (min-width: 768px) 
			{
				body 
				{
					padding: 10px 0 0 15%;
				}
				#leftSideMenu
				{
					padding-top: 0px;
				}
				.navmenu
				{
					width:15%;
				}
				.navbar-offcanvas
				{
					width:15%;
				}
				#topNavigationBar
				{
					margin-left:15%;
				}
			}
		</style>
	</head>
	<body>
	<div style="height:100%;width:100%;position:fixed;background-color:rgba(102,102,102,0.6);z-index:1002;margin-top:-10px;" id="loadingDiv" class="hidden">
		<img src="images/blueLoading.gif" class="img-responsive" style="margin-left:42%;margin-top:40vh;" />
	</div>
	<div style="height:100%;width:100%;position:fixed;background-color:rgba(102,102,102,0.8);z-index:1002;margin-top:-10px;" id="locationDiv" class="hidden">
		
	</div>
		<div class="navbar navbar-fixed-top navbar-inverse visible-xs" id="topNavigationBar">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle pull-left" style="margin-left:15px;margin-right:0px;" data-toggle="offcanvas" data-target="#leftSideMenu" data-canvas="">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div>
	    </div>
	    <div class="navmenu navmenu-inverse navmenu-fixed-left offcanvas-xs" id="leftSideMenu">
	    	<a class="navmenu-brand visible-md visible-lg" href="index.php" style=""><i class="fa fa-home"></i> Home</a>
			<ul class="nav navmenu-nav">
	        	<li class="visible-xs visible-sm"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	        	<?php
	        		if($isSuperAdmin == 1)
	        			echo "<li><a href='admin.php'><span class='fa fa-user'></span> Admin</a></li>";
	        	?>
	        	<li><a href="agent.php"><span class="fa fa-users"></span> Agent</a></li>
	        	<li><a href="mapping.php"><span class="fa fa-building"></span> Mapping</a></li>
	        	<li class="active"><a href="setting.php" style="color:#3ec15b"><span class="fa fa-cogs"></span> Settings</a></li>
	        	<li><a href="logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
			</ul>
	    </div>
	<div class="container-fluid" id="main_container">
		<div class="panel panel-info">
			<div class="panel-heading">Change Password</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12" id="msgRow"></div>
				</div>
				<form id="pwdForm" action="ajaxRequests/changePwd.php" method="POST">
				<div class="row">
					<div class="col-md-4">
						<input type="text" class="form-control" placeholder="Old Password" name="oldpwd" required="required"/>
					</div>
					<div class="col-md-4">
						<input type="text" class="form-control" placeholder="New Password" name="pwd1" required="required" pattern=".{6,}" onchange="form.pwd2.pattern = this.value;"/>
					</div>
					<div class="col-md-4">
						<input type="text" class="form-control" placeholder="New Password again" name="pwd2" required="required" pattern=".{6,}"/>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-md-5"></div>
					<div class="col-md-2">
						<button class="btn btn-success btn-block btn-lg"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
					</div>
					<div class="col-md-5"></div>
				</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
    <script>
    	$(document).ready(function(e){
			$('#pwdForm').on('submit',function(e){
				var postData = $(this).serializeArray();
				var formUrl = $(this).attr("action");
				//console.log(postData);
				$.ajax({				
					async: true,
					type: 'POST',
					url:formUrl,
					data: postData,
					dataType:'json',
					success: function(data, textStatus, jqXHR){
						//console.log(data);
						if(data.pwdStatus == true && data.updateStatus > 0)
						{
							var row = "<div class='alert alert-success'>Successfully changed your password!</div>";
							$('#msgRow').empty();
							$(row).appendTo('#msgRow');
						}
						else if(data.pwdStatus == false)
						{
							var row = "<div class='alert alert-danger'>Password mismatched!</div>";
							$('#msgRow').empty();
							$(row).appendTo('#msgRow');							
						}
						else if(data.updateStatus <= 0)
						{
							var row = "<div class='alert alert-danger'>Wrong Credentials!</div>";
							$('#msgRow').empty();
							$(row).appendTo('#msgRow');							
						}
						$(':input','#pwdForm')
						.not(':button,:submit')
						.val('');
						
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
						alert(textStatus);
					}  
				});
				e.preventDefault();
			});
		});
    </script>
	</body>
</html>