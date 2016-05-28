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
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="css/datepicker.css" rel="stylesheet" >
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
			}
		</style>
	</head>
	<body>
        <div style="height:100%;width:100%;position:fixed;background-color:rgba(102,102,102,0.6);z-index:1000;margin-top:-10px;" id="loadingDiv" class="hidden">
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
	    	<a class="navmenu-brand visible-md visible-lg" href="index.php"><i class="fa fa-home"></i> Home</a>
			<ul class="nav navmenu-nav">
	        	<li class="visible-xs visible-sm"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	        	<?php
                /* hiding for sometime !!!!
	        		if($isSuperAdmin == 1)
	        			echo "<li><a href='admin.php'><span class='fa fa-user'></span> Admin</a></li>";
	        	*/
                ?>
	        	<li class="active"><a href="agent.php" style="color:#3ec15b"><span class="fa fa-users"></span> Agent</a></li>
	        	<li><a href="mapping.php"><span class="fa fa-building"></span> Mapping</a></li>
	        	<li><a href="setting.php"><span class="fa fa-cogs"></span> Settings</a></li>
	        	<li><a href="logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
			</ul>
	    </div>
	<div class="container-fluid" id="main_container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="panel panel-info">
                	<div class="panel-heading" id="allAdminHeading">
                    	<i class="fa fa-paw"></i> All Agents
                    </div>
                    <div class="panel-body" id="allAdminContainer" style="display:none;">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
	            <div class="panel panel-info">
                	<div class="panel-heading">
                    	<i class="fa fa-user"></i> New Agent
                    </div>
                    <div class="panel-body">
						<form id="newAgent" action="ajaxRequests/addNewAgent.php" method="POST">
                            <div class="input-group" style="margin-bottom:10px;">
                                <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-user"></span></span>
                                <input  class="form-control lang_class"  name="name" placeholder="Name" required type="text" maxlength="20" pattern=".{3,20}" title="3 characters minimum" pattern="[A-Za-z-0-9]+" />
                            </div>
                            <div class="input-group" style="margin-bottom:10px;">
                                <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-envelope"></span></span>
                                <input required name="email" placeholder="Email Id" class="form-control lang_class" type="email"  />
                            </div> 
                            <div class="input-group" style="margin-bottom:10px;">
                                <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-phone"></span></span>
                                <input required name="contact" placeholder="Contact Number" class="form-control" maxlength="12" pattern=".{10,}" pattern="[0-9]+" type="text" />	
                            </div>
                            <div class="input-group" style="margin-bottom:10px;">
                                <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-calendar"></span></span>
                                <input type="text" name="dob" class="form-control" id="datepicker" placeholder="Date of Birth" data-date-format="dd-mm-yyyy" required="required">
                            </div> 
                            <div class="input-group" style="margin-bottom:10px;">
                                <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-map-marker"></span></span>
                                <input required name="address" placeholder="Address" type="text" class="form-control lang_class" maxlength="80" pattern=".{5,80}" title="5 characters minimum" pattern="[A-Za-z-0-9]+"/>
                            </div> 
                            <div class="row">
                            	<div class="col-md-4">
                                </div>
                            	<div class="col-md-4">
                                	<button type="submit" class="btn btn-success btn-block btn-lg">
                                    	<span class="glyphicon glyphicon-save"></span> Create Agent
                                    </button>
                                </div>
                            	<div class="col-md-4">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
      	<form id="formUpdateAgent" method="POST" action="ajaxRequests/updateAgent.php">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="editModalLabel">
               <span class='glyphicon glyphicon-edit'></span> Edit Admin Details
            </h4>
         </div>
         <div class="modal-body">
         	<div class="input-group" style="margin-bottom:10px;">
            	<span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-user"></span></span>
                <input  class="form-control lang_class"  name="name" placeholder="Name" required type="text" maxlength="20" pattern=".{3,20}" title="3 characters minimum" pattern="[A-Za-z-0-9]+" />
            </div>
            <div class="input-group" style="margin-bottom:10px;">
            	<span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-envelope"></span></span>
                <input required name="email" placeholder="Email Id" class="form-control lang_class" type="email"  />
            </div> 
            <div class="input-group" style="margin-bottom:10px;">
            	<span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-phone"></span></span>
                <input required name="contact" placeholder="Contact Number" class="form-control" maxlength="12" pattern=".{10,}" pattern="[0-9]+" type="text" />	
            </div>
            <div class="input-group" style="margin-bottom:10px;">
            	<span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-map-marker"></span></span>
                <input required name="address" placeholder="Address" type="text" class="form-control lang_class" maxlength="80" pattern=".{5,80}" title="5 characters minimum" pattern="[A-Za-z-0-9]+"/>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
            	Close
            </button>
            <button type="submit" class="btn btn-success" id="updateAgent" data-id="-1" >
              <span class="glyphicon glyphicon-floppy-disk"></span> Update
            </button>
         </div>
        </form>
      </div>
   </div>
</div>
<div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="customModalLabel">
               Are you Sure ?
            </h4>
         </div>
         <div class="modal-body">
            This will delete the Admin !
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
            	Close
            </button>
            <button type="button" class="btn btn-danger" id="DeleteAgent" data-id="-1" >
               Delete
            </button>
         </div>
      </div>
   </div>
</div>   
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
    <script>
		function updateAllAgents()
		{
			$('#loadingDiv').removeClass('hidden');
			$.ajax({
					url:"ajaxRequests/getAllAgents.php",
					data:{},
					type:"POST",
					async:true,
					dataType:"json",
					success: function(data, textStatus, jqXHR)
					{
						$('#allAdminContainer').empty();
						$('#loadingDiv').addClass('hidden');
						//console.log(data);
						$.each(data,function(arrayIndex,arrayVal){
								var row = 	"<div class='row'>"+
												"<div class='col-md-8'>"+
													"<p style='border:1px solid #ccc;padding:6px; 12px;border-radius:3px;'>"+arrayVal.name+"</p>"+
												"</div>"+
												"<div class='col-md-2'>"+
													"<div class='btn btn-danger btn-block' data-target='#customModal' data-toggle='modal' data-id='"+arrayVal.id+"'><span class='glyphicon glyphicon-trash'></span> Delete</div>"+
												"</div>"+
												"<div class='col-md-2'>"+
													"<div class='btn btn-success btn-block' data-target='#editModal' data-toggle='modal' data-id='"+arrayVal.id+"' data-name='"+arrayVal.name+"' data-email='"+arrayVal.email+"' data-contact='"+arrayVal.contact+"' data-dob='"+arrayVal.dob+"' data-address='"+arrayVal.address+"'><span class='glyphicon glyphicon-edit'></span> Edit</div>"+
												"</div>"+
											"</div>";
								$('#allAdminContainer').append(row);
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
		
		$(document).ready(function(e) {
			updateAllAgents();
			
			$('#allAdminHeading').on('click',function(){
				$('#allAdminContainer').slideToggle('slow');
			});
			$('#datepicker').datepicker({
	            autoclose: true,
	            todayBtn: "linked",
	            todayHighlight: true
    		});
    		
    		$('#newAgent').on('submit',function(e){
    			var postData = $(this).serializeArray();
				var formUrl = $(this).attr("action");
				//console.log(postData);
				$('#loadingDiv').removeClass('hidden');
				$.ajax({
						async: true,
						type: 'POST',
						url:formUrl,
						dataType:'json',
						data: postData,
						success: function(data, textStatus, jqXHR)
						{
							if(data == true)
							{
								$(':input','#newAdmin')
								.not(':button,:submit')
								.val('');
							}
							updateAllAgents();
							$('#loadingDiv').addClass('hidden');
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$('#loadingDiv').addClass('hidden');
							console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
							alert(textStatus);
						}  
					});
    			e.preventDefault();
    		});
    		
			$('#editModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
						var button = $(event.relatedTarget);
						var agentId = button.data('id');
						var name = button.data('name');
						var email = button.data('email');
						var contact = button.data('contact');
						var dob = button.data('dob');
						var address = button.data('address');
					
				var modal = $(this);
				modal.find('#updateAgent').data('id',agentId);
				modal.find("input[name='name']").val(name);
				modal.find("input[name='email']").val(email);
				modal.find("input[name='contact']").val(contact);
				modal.find("input[name='address']").val(address);
				
			});
			
    		$('#formUpdateAgent').on('submit',function(e){
				var postData = $(this).serializeArray();
				var formUrl = $(this).attr("action");
				var agentId = $("#updateAgent").data('id');
				var tempArray = {"name":"agentId","value":agentId};
				postData.push(tempArray);
				$('#editModal').modal('hide');
				$('#loadingDiv').removeClass('hidden');
				//console.log(postData);
				$.ajax({
						async: true,
						type: 'POST',
						url:formUrl,
						dataType:'json',
						data: postData,
						success: function(data, textStatus, jqXHR)
						{
							if(data == true)
							{
							}
							updateAllAgents();
							$('#loadingDiv').addClass('hidden');
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$('#loadingDiv').addClass('hidden');
							console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
							alert(textStatus);
						}  
					});
    			e.preventDefault();
    		});
    		
			$('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
						var button = $(event.relatedTarget);
						var agentId = button.data('id');
						
						var modal = $(this);
						modal.find('#DeleteAgent').data('id',agentId);
				});
				
			
			$('#DeleteAgent').on('click',function(){
				$('#customModal').modal('hide');
				var agentId = $('#DeleteAgent').data('id');
				$('#loadingDiv').removeClass('hidden');
				$.ajax({
						async: true,
						type: 'POST',
						url:"ajaxRequests/deleteAgent.php",
						dataType:'json',
						data: {"agentId":agentId},
						success: function(data, textStatus, jqXHR)
						{
							if(data == true)
							{
								alert("Deleted!");
							}
							else
								alert("Not Deleted!");
							updateAllAgents();
							$('#loadingDiv').addClass('hidden');
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$('#loadingDiv').addClass('hidden');
							console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
							alert(textStatus);
						}  
					});
			});
        });
	</script>
	</body>
</html>