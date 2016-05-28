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
	        	<li><a href="setting.php"><span class="fa fa-cogs"></span> Settings</a></li>
	        	<li><a href="logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
			</ul>
	    </div>
	<div class="container-fluid" id="main_container">
		<div class="row" style="margin-bottom:10px;">
			<div class="col-md-2">
				<a href="viewDetails.php?id=<?php echo $_REQUEST['id']; ?>" class="btn btn-default btn-block"><span class="glyphicon glyphicon-arrow-left"></span> back</a>
			</div>
			<div class="col-md-10">
				<div class="input-daterange input-group" id="datepicker" style="max-width:320px;float:left;">
                    	<?php
                    		$dtObj = new DateTime("now");
                    		$dtObj->setTimeZone(new DateTimeZone("Asia/Kolkata"));
                    		$currentDate = $dtObj->format("d-m-Y");
                    		
                    		$dtObj7 = new DateTime("now");
                    		$dtObj7->sub(new DateInterval('P1D'));
                    		$dtObj7->setTimeZone(new DateTimeZone("Asia/Kolkata"));
                    		$before7Date = $dtObj7->format("d-m-Y");
                    	?>
					    <input type="text" class="form-control"  placeholder="Start Date" id="fromDate" value="<?php echo $before7Date; ?>"/>
					    <span class="input-group-addon">to</span>
					    <input type="text" class="form-control"  placeholder="End Date" id="toDate" value="<?php echo $currentDate; ?>"/>
				</div>
				<div class="btn btn-default" style="height:34px;" id='updateDateWise' data-agentid='<?php echo $_REQUEST['id']; ?>'><span class="glyphicon glyphicon-ok"></span></div>
			</div>
		</div>
        <div class="panel panel-info">
        	<div class="panel-heading" id="panelHeading"><span class="glyphicon glyphicon-list-alt"></span> Tabular Data</div>
        	<div class="panel-body" id="tabularbody" style="display: none;max-height:70vh;overflow-y:auto;">
            	<div class="row" style="margin-bottom:10px;">
                	<div class="col-md-6">
                    	<div class="text-center" style="width:100%;border:1px solid;background-color:#CCC;"><B><span class="glyphicon glyphicon-calendar"></span> Date Time</B></div>
                    </div>
                	<div class="col-md-6">
                    	<div class="text-center" style="width:100%;border:1px solid;background-color:#CCC;"><b><span class="glyphicon glyphicon-globe"></span> Location</b></div>
                    </div>
                </div>
            </div>
        </div>
		<div class="row" style="margin-bottom: 10px;">
			<div class="col-md-12">
				<div id="mapCanvas" style="min-height:90vh;background-color:#bcbcad;border-radius:3px;border:2px solid #69615a;"></div>
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
	            		<div style="height:300px;width:100%;background-color: rgb(229, 227, 223);" id="modal-map-canvas">Loading Map...</div>
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
    	function updateGoogleMap()
    	{
			$('#loadingDiv').removeClass('hidden');
			var agentId = $('#updateDateWise').data('agentid');
			var startDate = $('#fromDate').val();
			var endDate = $('#toDate').val();
			//console.log("agentId",agentId);
			$.ajax({
					url:"ajaxRequests/getAgentLocations.php",
					data:{"agentId":agentId,"startDate":startDate,"endDate":endDate},
					type:"POST",
					async:true,
					dataType:"json",
					success: function(data, textStatus, jqXHR)
					{
						$('#loadingDiv').addClass('hidden');
						$('#mapCanvas').empty();
						console.log(data);
						//console.log(parseFloat(data[0][0]),parseFloat(data[0][1]));
						if(data.length > 0)
						{
							///$('#tabularbody .row:not(:first-child)').empty();
							$('#tabularbody div.row').slice(1).remove();
							var mapOptions = {
											    zoom: 7,
											    center: new google.maps.LatLng(parseFloat(data[0][0]),parseFloat(data[0][1])),
											    mapTypeId: google.maps.MapTypeId.ROADMAP
											  };
							var map = new google.maps.Map(document.getElementById('mapCanvas'),mapOptions);
							var latLngArray = [];
							var latlngbounds = new google.maps.LatLngBounds();
							$.each(data,function(arrayIndex,arrayVal){
								if(arrayVal[0] != "333" && arrayVal[1] != "333" )
								{
									var tempLtlng = new google.maps.LatLng(arrayVal[0],arrayVal[1]);
									latlngbounds.extend(tempLtlng);
									latLngArray.push(tempLtlng);
									var timeString = "";
									
									if(arrayVal[2] == arrayVal[3])
										timeString = arrayVal[2];
									else
										timeString = arrayVal[2]+" - "+arrayVal[3];
									//console.log(arrayIndex,arrayVal);
									if(arrayIndex == (data.length-1))
									{
										//This is Current Position.
										var tempMarkerVar = new google.maps.Marker({
															  position:tempLtlng, 
															  map:map,
															  title:timeString,
															  icon:'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
															  animation:google.maps.Animation.BOUNCE
															});
										var infowindow = new google.maps.InfoWindow();
										google.maps.event.addListener(tempMarkerVar, 'click', function() {
											
																							geocoder = new google.maps.Geocoder();
																							geocoder.geocode({'latLng': tempLtlng}, function(results, status)
																							{
																								if (status == google.maps.GeocoderStatus.OK)
																								{
																									if (results[1])
																									{
																										//results found
																										//results[1].formatted_address
																										infowindow.setContent(results[1].formatted_address);
																										infowindow.open(map, tempMarkerVar);
																									}
																									else
																									{
																										//no results found
																										infowindow.setContent("No Results found for Location.");
																										infowindow.open(map, tempMarkerVar);
																									}
																								}
																								else
																								{
																									// geocoder failed.
																										infowindow.setContent("There is some Problem!");
																										infowindow.open(map, tempMarkerVar);
																								}
																							});
																						  });															
									}
									else
									{
										var tempMarkerVar = new google.maps.Marker({
															  position:tempLtlng, 
															  map:map,
															  title:timeString,
															  icon:'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
															});
										var infowindow = new google.maps.InfoWindow();
										google.maps.event.addListener(tempMarkerVar, 'click', function() {
											
																							geocoder = new google.maps.Geocoder();
																							geocoder.geocode({'latLng': tempLtlng}, function(results, status)
																							{
																								if (status == google.maps.GeocoderStatus.OK)
																								{
																									if (results[1])
																									{
																										//results found
																										//results[1].formatted_address
																										infowindow.setContent(results[1].formatted_address);
																										infowindow.open(map, tempMarkerVar);
																									}
																									else
																									{
																										//no results found
																										infowindow.setContent("No Results found for Location.");
																										infowindow.open(map, tempMarkerVar);
																									}
																								}
																								else
																								{
																									// geocoder failed.
																										infowindow.setContent("There is some Problem!");
																										infowindow.open(map, tempMarkerVar);
																								}
																							});
																						  });
									}
									var tableRow = "<div class=\"row\" style=\"margin-bottom:1px;\">"+
									                	"<div class=\"col-md-6\">"+
									                    	"<div class=\"text-center\" style=\"width:100%;border:1px solid;\">"+timeString+"</div>"+
									                    "</div>"+
									                	"<div class=\"col-md-6\">"+
									                    	"<div class=\"text-center\" style=\"width:100%;border:1px solid;\"><span class=\"glyphicon glyphicon-eye-open\" style='color:#12c;font-size:16px;' data-lattitude='"+arrayVal[0]+"' data-longitude='"+arrayVal[1]+"'  data-target='#customModal' data-toggle='modal'></span></div>"+
									                 	"</div>"+
									                "</div>";
									$(tableRow).appendTo('#tabularbody');
								}
								else
								{
									
									var timeString = "";
									
									if(arrayVal[2] == arrayVal[3])
										timeString = arrayVal[2];
									else
										timeString = arrayVal[2]+" - "+arrayVal[3];
									//tabularbody
									var tableRow = "<div class=\"row\" style=\"margin-bottom:1px;\">"+
									                	"<div class=\"col-md-6\">"+
									                    	"<div class=\"text-center\" style=\"width:100%;border:1px solid;\">"+timeString+"</div>"+
									                    "</div>"+
									                	"<div class=\"col-md-6\">"+
									                    	"<div class=\"text-center\" style=\"width:100%;border:1px solid;\">GPS Offline</div>"+
									                    "</div>"+
									                "</div>";
									$(tableRow).appendTo('#tabularbody');
								}
							});
							
							var lineSymbol = {path: google.maps.SymbolPath.FORWARD_OPEN_ARROW}; 
							var trackRoute = new google.maps.Polyline({
								path:latLngArray,
								geodesic: true,
								strokeColor: '#00B3FD',
								strokeOpacity: 1.0,
								strokeWeight: 2.5,
								icons:[{
										icon: lineSymbol,
								        offset: '100%',
								        repeat:'90px'
									}]	
							});
							trackRoute.setMap(map);
							map.setCenter(latlngbounds.getCenter());
							map.fitBounds(latlngbounds);
						}
						else
						{
							var mapRow = "<p class='text-center'><b>No Records Found!</b></p>"
							$(mapRow).appendTo('#mapCanvas');
						}
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						$('#loadingDiv').addClass('hidden');
						console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
						alert(textStatus);
					}
				});
		}
    	$(document).ready(function(e){
    		updateGoogleMap();
    		$('#datepicker').datepicker({
    				autoclose: true,
		            todayBtn: "linked",
		            todayHighlight: true,
					format : "dd-mm-yyyy",
					endDate:'+0d'
				});
			$('#panelHeading').on('click',function(){
				$('#tabularbody').slideToggle('slow');
			});	
			$('#updateDateWise').on('click',function(){
				updateGoogleMap();
			});
			
			
			$('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
				}).on('shown.bs.modal',function(event){
				
						$('#modal-map-canvas').empty();
						var button = $(event.relatedTarget);
						var lattitude = parseFloat(button.data('lattitude'));
						var longitude = parseFloat(button.data('longitude'));
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
							  map = new google.maps.Map(document.getElementById('modal-map-canvas'), mapOptions);
							  
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
											$('#modal-map-canvas').empty();
											$('#modal-map-canvas').append("No results found!");
										}
									}
									else
									{
										//alert('Geocoder failed due to: ' + status);
										$('#modal-map-canvas').empty();
										$('#modal-map-canvas').append("Problem Fetching Map!");
									}
								});
						}
						else
						{
							$('#modal-map-canvas').empty();
							$('#modal-map-canvas').append("GPS Offline");
						}
			});
			
		});
    </script>
	</body>
</html>