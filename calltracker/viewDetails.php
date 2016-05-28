<?php
include("db_connection.php");
include("checkLoginOrNot.php");
if(!isset($_REQUEST['id']))
	header("location:index.php") or die();
else
{
	//check this id i.e. agent id is related to the admin or not.
	$checkAgentIdQuery = "select * from agents where adminId = ".$_SESSION['userId']." and id = ".$_REQUEST['id'];
	$checkAgentIdResult = mysqli_query($db,$checkAgentIdQuery);
	$checkAgentIdRowCount = mysqli_num_rows($checkAgentIdResult);
	if($checkAgentIdRowCount == 0)
		header("location:index.php") or die();
}
$checkSuperAdminQuery = "select isSuperAdmin from admin where id = ".$_SESSION['userId']." limit 1";
$checkSuperAdminResult = mysqli_query($db,$checkSuperAdminQuery);
$checkSuperAdminRow = mysqli_fetch_assoc($checkSuperAdminResult);
$isSuperAdmin = $checkSuperAdminRow['isSuperAdmin'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/jasny-bootstrap.min.css" rel="stylesheet" />
		<link href="css/bootstrap-table.min.css" rel="stylesheet"/>
		<link href="css/datepicker.css" rel="stylesheet"  />
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
	        	<li><a href="recordno.php?id=<?php echo $_REQUEST['id']; ?>"><span class="fa fa-building"></span> Record Calls No</a></li>
	        	<li><a href="setting.php"><span class="fa fa-cogs"></span> Settings</a></li>
	        	<li><a href="logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
			</ul>
	    </div>
	<div class="container-fluid" id="main_container">
		<div class="row">
			<div class="col-md-12">
				<div id="custom-toolbar">
				  <div style="float:left;margin-top:20px;margin-left:5px;margin-right:5px;font-weight: bolder;font-size: 18px;">
					  <?php
					  	
					  	$selectQuery = "select * from agents where id = ".$_REQUEST['id'];
					  	$selectResult = mysqli_query($db,$selectQuery);
					  	$selectRow = mysqli_fetch_assoc($selectResult);
					  	if($selectRow['status'] == 0)
					  	{
							echo "<span class='glyphicon glyphicon-user' style='color:#F00'></span> ";
						}
						else
						{
							echo "<span class='glyphicon glyphicon-user' style='color:#0F0'></span> ";						
						}
						echo "<u>";
					  	echo $selectRow['name'];
						echo "</u>";
					  ?>
				  </div>
				  <div style="float:left;margin-top:10px;margin-left:5px;" class="">
                    <div class="input-daterange input-group" id="datepicker" style="max-width:320px;float:left;">
                    	<?php
                    		$dtObj = new DateTime("now");
                    		$dtObj->setTimeZone(new DateTimeZone("Asia/Kolkata"));
                    		$currentDate = $dtObj->format("d-m-Y");
                    		
                    		$dtObj7 = new DateTime("now");
                    		//$dtObj7->sub(new DateInterval('P7D'));
                    		$dtObj7->setTimeZone(new DateTimeZone("Asia/Kolkata"));
                    		$before7Date = $dtObj7->format("d-m-Y");
                    	?>
					    <input type="text" class="form-control"  placeholder="Start Date" id="fromDate" value="<?php echo $before7Date; ?>"/>
					    <span class="input-group-addon">to</span>
					    <input type="text" class="form-control"  placeholder="End Date" id="toDate" value="<?php echo $currentDate; ?>"/>
					</div>
					<div class="btn btn-default" style="height:34px;" id='updateDateWise'><span class="glyphicon glyphicon-ok"></span></div>
				  </div>
				  
				  <div style="float:left;margin-top:10px;margin-left:5px;" class="">
					<a class="btn btn-default" style="height:34px;" href="locationstrace.php?id=<?php echo $_REQUEST['id']; ?>"><span class="glyphicon glyphicon-globe"></span> Trace Locations</a>
				  </div>
				  
				</div>
				<!--data-side-pagination="" --->
				<!--<table id="clientReportTable" data-pagination='true'  data-page-list='[ 5, 10, 20, 50, 100, 200]' data-toolbar='custom-toolbar' data-height='500' data-toggle='table' data-url="ajaxRequests/getAgentCallDetails.php?id=<?php echo $_REQUEST['id']; ?>" data-cache='false' data-sort-name='daytime' data-sort-order='desc' data-show-refresh='true' data-show-columns='true' data-search='true'>-->
				<table id="clientReportTable" data-click-to-select="true" data-url="ajaxRequests/getAgentCallDetails.php?id=<?php echo $_REQUEST['id']; ?>" >
					<thead> 
						<tr>
						    <th data-checkbox="true" data-fomatter = 'saveNo'>Recording No.</th>
						    <th data-field='id'>Sno.</th>
							<th data-field='callTypeId' data-sortable='true' data-formatter='callTypeFormatter'>Call Type</th>
							<th data-field='phone' data-sortable='true'>Phone No.</th>
							<th data-field='duration' data-sortable='true'>Duration</th>
							<th data-field='name' data-sortable='true'>Name</th>
							<th data-field='daytime' data-sortable='true'>Time Date</th>
							<th data-field='songrecord' data-formatter = 'recordingFormatter'>Recording Calls</th>
							<th data-formatter='locationFormatter' data-halign='center' data-align='center'>Location</th>
							</tr>
						
					</thead>
				</table>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
	   <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	                  &times;
	            </button>
	            <h4 class="modal-title" id="customModalLabel">
	               Location
	            </h4>
	         </div>
	         <div class="modal-body">
	            <div class="row">
	            	<div class="col-md-12">
	            		<div style="height:300px;width:100%;background-color: rgb(229, 227, 223);" id="map-canvas">Loading Map...</div>
	            	</div>
	            </div>
	         </div>
	         <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">
	            	Close
	            </button>
	         </div>
	      </div>
	   </div>
	</div>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
    <script src="js/bootstrap-table.min.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
    function saveNo(value,row,index){
    	var SaveNoArray = value;

    	//mysqli_query('fieldworker',"INSERT INTO recordno (number,adminid) VALUES ('"+value+"','1'))";
    }

    function recordingFormatter(value,row,index){
    	//var locationArray = value;

			if(value != 0){
			 var name = value;
			// var eyeRow = "<video width="20" height="40" controls><source src='recording/"+name+"' type="video/mp4"></video>";
                var eyeRow = "<audio controls><source src='recording/"+name+"' type='audio/x-m4a'></audio><br/><a target = '_blank' href='recording/"+name+"'>Download Audio </a>";
			}
			else{
				var eyeRow = "Not Available";
			}
			return eyeRow;
    }

    function callTypeFormatter(value,row,index)
    	{
    		var finalString = "";
			var icnIncoming = "<i class='fa fa-reply' style='color:#0F0;'></i>";
			var icnOutgoing = "<i class='fa fa-share' style='color:#FF6600;'></i>";
			var icnMissed = "<i class='fa fa-exclamation' style='color:996600;'></i>";
			var icnCut = "<i class='fa fa-close' style='color:#F00;'></i>";
			if(value  == "Incoming")
				finalString = icnIncoming+" "+value;
			else if(value == "Outgoing")
				finalString = icnOutgoing+" "+value;
			else if(value == "Missed")
				finalString = icnMissed+" "+value;
			else if(value == "Cut")
				finalString = icnCut+" "+value;
			return finalString;
		}
		
		function locationFormatter(value,row,index)
		{
			var locationArray = value;
			//console.log(value);
			if(value != 0)
				var eyeRow = "<span class='glyphicon glyphicon-eye-open locationBtn'  style='color:#12c;font-size:16px;'></span>";
			else
				var eyeRow = "Not Available";
			return eyeRow;
		}
    	$(document).ready(function(e){
    		$('#datepicker').datepicker({
    				autoclose: true,
		            todayBtn: "linked",
		            todayHighlight: true,
					format : "dd-mm-yyyy",
				}).on('changeDate',function(e){
					//console.log($('#fromDate').val());
					//console.log($('#toDate').val());
				});
			
			$('#updateDateWise').on('click',function(e){
				$('#clientReportTable').bootstrapTable('refresh');
			});
			
			/*$(document).on('click','span.locationBtn',function(){
				var _this = $(this);
				console.log("lattitude",_this.data('lattitude'));
				console.log("longitude",_this.data('longitude'));
				
				// CREATE A DYNAMIC GOOGLE MAPS....
				$('#locationDiv').removeClass('hidden');
			});*/
			
			$('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
				}).on('shown.bs.modal',function(event){
				
						$('#map-canvas').empty();
						var button = $(event.relatedTarget);
						var lattitude = parseFloat(button.data('lattitude'));
						var longitude = parseFloat(button.data('longitude'));
						//console.log("lattitude:"+lattitude);
						//console.log("longitude:"+longitude);
						if(lattitude != "333" && longitude != "333" )
						{
							var geocoder;
							var map;
							var infowindow = new google.maps.InfoWindow();
							var marker;
							geocoder = new google.maps.Geocoder();
							var latlng = new google.maps.LatLng(lattitude,longitude);
							var mapOptions = {
							    zoom: 15,
							    center: latlng,
							    mapTypeId: 'roadmap'
							  }
							  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
							  
							  geocoder.geocode({'latLng': latlng}, function(results, status) 
								{
									if (status == google.maps.GeocoderStatus.OK) 
									{
										if (results[1]) 
										{
											map.setZoom(15);
											marker = new google.maps.Marker({
												position: latlng,
												map: map
											});
											infowindow.setContent(results[1].formatted_address);
											infowindow.open(map, marker);
										} 
										else 
										{
											//alert('No results found');
											$('#map-canvas').empty();
											$('#map-canvas').append("No results found!");
										}
									}
									else
									{
										//alert('Geocoder failed due to: ' + status);
										$('#map-canvas').empty();
										$('#map-canvas').append("Problem Fetching Map!");
									}
								});
						}
						else
						{
							$('#map-canvas').empty();
							$('#map-canvas').append("GPS Offline");
						}
			});
    		
    		$('#clientReportTable').bootstrapTable({
                //method:'get',
    			//url:"ajaxRequests/getAgentCallDetails.php?id=4",
    			cache:false,
    			height:500,
    			pagination:true,
    			sidePagination:'server',
    			pageSize:10,
    			pageList:[10,25,50,100,200],
    			search:true,
    			showColumns:true,
    			showRefresh:true,
    			minimumCountColumns:3,
    			sortName:'daytime',
    			sortOrder:'desc',
    			queryParams:function(params){
    				params.startDate = $('#fromDate').val();
    				params.endDate = $('#toDate').val();
    				//params.id = 1;
					console.log(params);
					return params;	
				},
				responseHandler:function(res){
					console.log(res);
					return res;	
				},
    			
    		}).on('load-success.bs.table', function (e, data) {
    			$("button[name='refresh']").css('height','34px');
    		});
    	});
    </script>
	</body>
</html>