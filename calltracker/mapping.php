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
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
		
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
			.panel-body
			{
				min-height:89vh;
				max-height:89vh;
				overflow-y:auto;
				overflow-x:none;
			}
			.agents>.well:hover
			{
				cursor: move;
			}
			.placeholder-well
			{
				min-height: 20px;
				padding: 19px;
				margin-bottom: 20px;
				background-color: #feffee;
				border: 1px dotted #f2e70d;
				border-radius: 4px;
				-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
				box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
			}
			.agentDropActiveClass
			{
				background-color:#feffee;
				border:1px dotted #ffc251;
				/*background-color: #ffc251*/
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
	    	<a class="navmenu-brand visible-md visible-lg" href="index.php" style=""><i class="fa fa-home"></i> Home</a>
			<ul class="nav navmenu-nav">
	        	<li class="visible-xs visible-sm"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	        	<?php
                /* hiding for sometime !!!!
	        		if($isSuperAdmin == 1)
	        			echo "<li><a href='admin.php'><span class='fa fa-user'></span> Admin</a></li>";
	        	*/
                ?>
	        	<li><a href="agent.php"><span class="fa fa-users"></span> Agent</a></li>
	        	<li class="active"><a href="mapping.php" style="color:#3ec15b"><span class="fa fa-building"></span> Mapping</a></li>
	        	<li><a href="setting.php"><span class="fa fa-cogs"></span> Settings</a></li>
	        	<li><a href="logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
			</ul>
	    </div>
	<div class="container-fluid" id="main_container">
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading text-center">
						<b>Agents</b>
					</div>
					<div class="panel-body agents"></div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">
						<b>All Details</b>
					</div>
					<div class="panel-body testClass">
						<div class="well">
							<div class="row" style="height:40px;">
								<div class="col-md-5">
									<div class="well well-sm" id="AgentWell" style="min-height:38px;"></div>
								</div>
								<div class="col-md-2">
									<div class="btn btn-success btn-block disabled" style="min-height:34px;padding-top:8px;" id="mapNow"><span class="glyphicon glyphicon-ok"></span></div>
								</div>
								<div class="col-md-5">
									<div class="well well-sm" id="DeviceWell" style="min-height:38px;"></div>
								</div>
							</div>
						</div>
						<div class="well" id='mappedDevicesAgents'></div>
					</div>
				</div>				
			</div>
			<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading text-center">
						<b>Devices</b>
					</div>
					<div class="panel-body devices">
					</div>
				</div>				
			</div>
		</div>
	</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script>
	function loadNotMappedAgentsDevices()
	{
		$('#loadingDiv').removeClass('hidden');
			$.ajax({
					url:"ajaxRequests/getAllAgentsAndDevicesNotMapped.php",
					data:{},
					type:"POST",
					async:true,
					dataType:"json",
					success: function(data, textStatus, jqXHR)
					{
						$('#loadingDiv').addClass('hidden');
						//console.log(data);
						$('div.agents').empty();
						$('div.devices').empty();
						$.each(data.agentList,function(arrayIndex,arrayVal){
								var row = 	"<div class='well well-sm' data-agentid='"+arrayVal.id+"'>"+arrayVal.name+"</div>";
								$('div.agents').append(row);
							});
						$.each(data.deviceList,function(arrayIndex,arrayVal){
								var row = 	"<div class='well well-sm' data-deviceid='"+arrayVal.id+"'>"+arrayVal.deviceName+" ["+arrayVal.uid+"]</div>";
								$('div.devices').append(row);
							});
						InitDragDrop();
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						$('#loadingDiv').addClass('hidden');
						console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
						alert(textStatus);
					},
				});
	}
	function loadMapped()
	{
			$.ajax({
					url:"ajaxRequests/getAllAgentsAndDevicesMapped.php",
					data:{},
					type:"POST",
					async:true,
					dataType:"json",
					success: function(data, textStatus, jqXHR)
					{
						$('#loadingDiv').addClass('hidden');
						//console.log(data);
						$('#mappedDevicesAgents').empty();
						$.each(data,function(arrayIndex,arrayVal){
								var row = 	"<div class='row'>"+
												"<div class='col-md-5'>"+
													"<div class='well well-sm' style='min-height:38px;'>"+arrayVal.name+"</div>"+
												"</div>"+
												"<div class='col-md-2'>"+
													"<div class='btn btn-danger btn-block removeMapping' style='min-height:34px;padding-top:8px;' data-agentid='"+arrayVal.agentId+"' data-deviceid='"+arrayVal.deviceId+"'><span class='glyphicon glyphicon-remove'></span></div>"+
												"</div>"+
												"<div class='col-md-5'>"+
													"<div class='well well-sm' style='min-height:38px;'>"+arrayVal.deviceName+" ["+arrayVal.uid+"]</div>"+
												"</div>"+
											"</div>";
								$('#mappedDevicesAgents').append(row);
						});
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						$('#loadingDiv').addClass('hidden');
						console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
						alert(textStatus);
					},
				});
	}
		$(document).ready(function(){
			loadNotMappedAgentsDevices();
			loadMapped();
			
			$('#mapNow').on('click',function(){
				var AgentId = $(this).parent().parent().find('#AgentWell>div').data('agentid');
				var DeviceId = $(this).parent().parent().find('#DeviceWell>div').data('deviceid');
                 //alert(DeviceId);
				$('#loadingDiv').removeClass('hidden');
				$.ajax({
					url:"ajaxRequests/mapAgentDevice.php",
					data:{agentid:AgentId,deviceid:DeviceId},
					type:"POST",
					async:true,
					dataType:"json",
					success: function(datareceived, textStatus, jqXHR)
					{
						//console.log(datareceived);
						
						$('#loadingDiv').addClass('hidden');

						if(datareceived.status == false)
						{
							alert(datareceived.msg);
							$('#mapNow').addClass('disabled');
							$('#AgentWell').empty();
							$('#AgentWell').css('background-color',"#f5f5f5");
							$('#DeviceWell').empty();
							$('#DeviceWell').css('background-color',"#f5f5f5");
							loadNotMappedAgentsDevices();
							loadMapped();
							$('#AgentWell').droppable('enable');
							$('#DeviceWell').droppable('enable');
						}
						else
						{
							data = datareceived.mapped;
							if(data == false)
							{
								alert("Mapping Failed! try again.");
							}
							$('#mapNow').addClass('disabled');
							$('#AgentWell').empty();
							$('#AgentWell').css('background-color',"#f5f5f5");
							$('#DeviceWell').empty();
							$('#DeviceWell').css('background-color',"#f5f5f5");
							loadNotMappedAgentsDevices();
							loadMapped();
							$('#AgentWell').droppable('enable');
							$('#DeviceWell').droppable('enable');
						}
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						$('#loadingDiv').addClass('hidden');
						console.log(jqXHR ,textStatus , errorThrown);
						alert(textStatus);
					},
				});
			});
			
			$(document).on('click','.removeMapping',function(e){
				var confirmDelete = confirm("Sure to Remove Mapping !");
				if(confirmDelete == true)
				{
					var AgentId = $(this).data('agentid');
					var DeviceId = $(this).data('deviceid');
					$('#loadingDiv').removeClass('hidden');
					$.ajax({
						url:"ajaxRequests/RemoveMappingAgentDevice.php",
						data:{agentid:AgentId,deviceid:DeviceId},
						type:"POST",
						async:true,
						dataType:"json",
						success: function(data, textStatus, jqXHR)
						{
							$('#loadingDiv').addClass('hidden');
							if(data == false)
							{
								alert("Failed! try again.");
							}
							$('#mapNow').addClass('disabled');
							$('#AgentWell').empty();
							$('#AgentWell').css('background-color',"#f5f5f5");
							$('#DeviceWell').empty();
							$('#DeviceWell').css('background-color',"#f5f5f5");
							loadNotMappedAgentsDevices();
							loadMapped();
							$('#AgentWell').droppable('enable');
							$('#DeviceWell').droppable('enable');
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$('#loadingDiv').addClass('hidden');
							console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
							alert(textStatus);
						},
					});
				}
			});
			
		});
		
		function InitDragDrop()
		{
			$('.agents>.well').draggable({
				containment:"body",
				cursor:'move',
				revert:'invalid',
				refreshPositions:true,
				scroll:false,
				stack:'.panel div',
				//helper:'clone',
				snap:'#AgentWell',
			    snapMode:'inner',
			    snapTolerance:20,
			    zIndex:100,
				helper:function(event){
					//console.log($(this).text());
					return "<div class='well well-sm' style='background-color:#ffc251;padding-left:25px;padding-right:25px;'><b><span class='glyphicon glyphicon-user'></span> "+$(this).text()+"</b></div>";
				}
			});
			$('#AgentWell').droppable({
				accept:'.agents>div',
				tolerance: 'touch',
				activeClass:"agentDropActiveClass",
				drop: function( event, ui ) {
		        	//console.log("drop",$(ui.draggable[0]).text());
		        	ui.draggable.remove();
		        	var agentId = $(ui.draggable[0]).data('agentid');
		        	$("<div data-agentid='"+agentId+"'>"+$(ui.draggable[0]).text()+"</div>").appendTo('#AgentWell');
		        	$('#AgentWell').css('background-color','#dff0d8');
		        	//$('.agents>.well').draggable('disable');
		        	$(this).droppable('disable');
		        	if($('#DeviceWell').html() != "")
		        	{
						$('#mapNow').removeClass('disabled');
					}
				},
			});
			$('.devices>.well').draggable({
				containment:"body",
				cursor:'move',
				revert:'invalid',
				refreshPositions:true,
				scroll:false,
				stack:'.panel div',
				//helper:'clone',
				snap:'#DeviceWell',
			    snapMode:'inner',
			    snapTolerance:20,
			    zIndex:100,
				helper:function(event){
					//console.log($(this).text());
					return "<div class='well well-sm' style='background-color:#ffc251;padding-left:25px;padding-right:25px;'><b><span class='glyphicon glyphicon-phone'></span> "+$(this).text()+"</b></div>";
				}
			});
			$('#DeviceWell').droppable({
				accept:'.devices>div',
				tolerance: 'touch',
				activeClass:"agentDropActiveClass",
				drop: function( event, ui ) {
		        	//console.log("drop",$(ui.draggable[0]).text());
		        	ui.draggable.remove();
		        	var deviceId = $(ui.draggable[0]).data('deviceid');
		        	$("<div data-deviceid='"+deviceId+"'>"+$(ui.draggable[0]).text()+"</div>").appendTo('#DeviceWell');
		        	$('#DeviceWell').css('background-color','#dff0d8');
		        	//$('.agents>.well').draggable('disable');
		        	$(this).droppable('disable');
		        	if($('#AgentWell').html() != "")
		        	{
						$('#mapNow').removeClass('disabled');
					}
				},
			});
		}
	</script>
	<script>
		$(document).ready(function(){
			
		});
	</script>
	</body>
</html>