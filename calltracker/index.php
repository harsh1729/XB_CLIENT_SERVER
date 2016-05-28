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
		<meta charset="utf-8" />
		
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/jasny-bootstrap.min.css" rel="stylesheet" />
		<link href="css/bootstrap-table.min.css" rel="stylesheet"/>
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
	    	<a class="navmenu-brand visible-md visible-lg" href="index.php" style="color:#3ec15b"><i class="fa fa-home"></i> Home</a>
			<ul class="nav navmenu-nav">
	        	<li class="active visible-xs visible-sm"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	        	<?php
                /* hiding for sometime !!!!
	        		if($isSuperAdmin == 1)
	        			echo "<li><a href='admin.php'><span class='fa fa-user'></span> Admin</a></li>";
	        	*/
                ?>
	        	<li><a href="agent.php"><span class="fa fa-users"></span> Agent</a></li>
	        	<li><a href="mapping.php"><span class="fa fa-building"></span> Mapping</a></li>
	        	<li><a href="setting.php"><span class="fa fa-cogs"></span> Settings</a></li>
	        	<li><a href="logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
			</ul>
	    </div>
	<div class="container-fluid" id="main_container">
		<div class="row">
			<div class="col-md-12">
				<div id="custom-toolbar">
				  <div style="float:left;margin-top:20px;margin-left:5px;font-weight: bolder;font-size: 18px;"><u>Agent Details</u></div>
				</div>
				<table id="clientReportTable" data-toolbar='custom-toolbar' data-height='500' data-toggle='table' data-url='ajaxRequests/getAgentCallLog.php' data-cache='false' data-sort-name='missed' data-sort-order='desc' data-show-refresh='true' data-show-columns='true' data-search='true'>
					<thead>
						<tr>
							<th data-field='id'>Sno.</th>
							<th data-field='status' data-halign='center' data-align='center' data-valign='center' data-sortable='true' data-formatter='statusFormatter'>Status</th>
							<th data-field='name' data-sortable='true' data-formatter='nameFormatter'>Name</th>
							<th data-field='Incoming' data-sortable='true'>Incoming calls</th>
							<th data-field='Outgoing' data-sortable='true'>Outgoing calls</th>
							<th data-field='Missed' data-sortable='true'>Missed calls</th>
							<th data-field='Cut' data-sortable='true'>Dismmissed calls</th>
							<th data-field='viewBtn' data-formatter='viewBtnFormatter' data-events='viewBtnEvents'>View Details</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
    <script src="js/bootstrap-table.min.js" type="text/javascript"></script>
    <script>
    	function statusFormatter(value,row,index)
    	{
			var online = "<span class='glyphicon glyphicon-user' style='color:#0f0;'></span>";
			var offline = "<span class='glyphicon glyphicon-user' style='color:#f00;'></span>";	
			var onOff;
			if(value == 0)
				onOff = offline;
			else
				onOff = online;
			return onOff;
		}
    	function nameFormatter(value,row,index)
    	{
    		return value;
		}
    	function viewBtnFormatter(value,row,index)
    	{
			var btnRow = "<div class='btn btn-info btn-block viewDetailsBtn'>"+
							"<span class='glyphicon glyphicon-eye-open'></span>"+
						" Details</div>";
			return btnRow;
		}
    	$(document).ready(function(e){
    		$("button[name='refresh']").css('height','34px');
    		
    		
    		window.viewBtnEvents = {
				'click .viewDetailsBtn' : function(e,value,row,index){
						//console.log(value,":",row,":",index);
						window.location.replace("viewDetails.php?id="+row.id);
						//$('#clientReportTable').bootstrapTable('showLoading');
						//$('#clientReportTable').bootstrapTable('hideLoading');
					}
				};
    	});
    </script>
	</body>
</html>