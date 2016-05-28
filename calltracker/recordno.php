<!DOCTYPE html>
<html>
<head>
	<title></title>
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
                label {
                cursor: default;
                 color:red;
                 padding-top:20px;
                 margin-left:7px;
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
	    	<a class="navmenu-brand visible-md visible-lg" href="index.php" style=""><i class="fa fa-home"></i> Home</a>
			<ul class="nav navmenu-nav">
	        	<li class="visible-xs visible-sm"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	        	<li><a href="agent.php"><span class="fa fa-users"></span> Agent</a></li>
	        	<li><a href="mapping.php"><span class="fa fa-building"></span> Mapping</a></li>
	        	<li class="active"><a href="recordno.php" style="color:#3ec15b"><span class="fa fa-building"></span> Record Calls No</a></li>
	        	<li><a href="setting.php"><span class="fa fa-cogs"></span> Settings</a></li>
	        	<li><a href="logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
			</ul>
	    </div>
	    <div class="alert alert-success" id="events-result" data-es="Aquí se muestra el resultado del evento">
    Select CheckBox Record call of this number.
</div>

<div style="float:left;margin-top:20px;margin-left:5px;margin-right:5px;font-weight: bolder;font-size: 18px;">
					  <?php
					  	include("db_connection.php");
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
                 
<div class="container-fluid" id="main_container" style="width:70%">	   
<table id="events-table"  data-search='true' data-toggle="table" data-url="ajaxRequests/getAllNo.php?id=<?php echo $_REQUEST['id']; ?>" data-cache="false" data-height="299" data-padding ="50" >
    <thead>
        <tr>
           <th data-field="isrecord" data-checkbox="true" data-formatter = 'stateFormatter' >Recording No.</th>
            <th data-field="id" data-align="center">S.NO</th>
            <th data-field="phone" data-align="center">Number</th>
            <th data-field="name" data-align="center">Name</th>
        </tr>
    </thead>
</table>

</div>
<!--<div class="container-fluid" id="events-result" data-es="Aquí se muestra el resultado del evento" style="width:70%">
   
</div> -->
<input type = 'checkbox' name="select" id="radiobutton" /><label for ="ml"> Select checkbox for record all incoming & outgoing call</label>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
    <script src="js/bootstrap-table.min.js" type="text/javascript"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
   <script>
   $('#radiobutton').click(function(){
     if($('#radiobutton').is(':checked')) {  
     $.ajax({
               url: "agents/update_recordAll.php?id=<?php echo $_REQUEST['id']; ?>",
   			   type:"post",
   			   data:{"ischecked":"false"},
    		   context: document.body,
    		   success: function(data){
                     alert(data);  
                        }
						});
     }else{
      $.ajax({
               url: "agents/update_recordAll.php?id=<?php echo $_REQUEST['id']; ?>",
       		   type:"post",
   			   data:{"ischecked":"true"},
    		   context: document.body,
    		   success: function(data){
                        alert(data); 
                        }
						});
     }
           
        });
  
    $(window).load(function() {
 // executes when complete page is fully loaded, including all frames, objects and images   
         $.ajax({
           		 url: "ajaxRequests/checkallRecord.php?id=<?php echo $_REQUEST['id']; ?>",
   				 type:"post",
   				 data:{},
    			 context: document.body,
    			 success: function(data){
                          if(data == 1){
                           $('#radiobutton').prop('checked', true);
                           }else{
                           $('#radiobutton').prop('checked', false);
                           }
      						
   						 }
						});
           });
   function stateFormatter(value, row, index) {
        if (value === '1') {
            return {
                checked: true
            }
        }
         return value;
    }
  $(function () {
       // $('#basic-events-table').next().click(function () {
        //    $(this).hide();

            var $result = $('#events-result');

            $('#events-table').bootstrapTable({
                /*
                onAll: function (name, args) {
                    console.log('Event: onAll, data: ', args);
                }
                onClickRow: function (row) {
                    $result.text('Event: onClickRow, data: ' + JSON.stringify(row));
                },
                onDblClickRow: function (row) {
                    $result.text('Event: onDblClickRow, data: ' + JSON.stringify(row));
                },
                onSort: function (name, order) {
                    $result.text('Event: onSort, data: ' + name + ', ' + order);
                },
                onCheck: function (row) {
                    $result.text('Event: onCheck, data: ' + JSON.stringify(row));
                },
                onUncheck: function (row) {
                    $result.text('Event: onUncheck, data: ' + JSON.stringify(row));
                },
                onCheckAll: function () {
                    $result.text('Event: onCheckAll');
                },
                onUncheckAll: function () {
                    $result.text('Event: onUncheckAll');
                },
                onLoadSuccess: function (data) {
                    $result.text('Event: onLoadSuccess, data: ' + data);
                },
                onLoadError: function (status) {
                    $result.text('Event: onLoadError, data: ' + status);
                },
                onColumnSwitch: function (field, checked) {
                    $result.text('Event: onSort, data: ' + field + ', ' + checked);
                },
                onPageChange: function (number, size) {
                    $result.text('Event: onPageChange, data: ' + number + ', ' + size);
                },
                onSearch: function (text) {
                    $result.text('Event: onSearch, data: ' + text);
                }
                */

            }).on('all.bs.table', function (e, name, args) {
                console.log('Event:', name, ', data:', args);
            }).on('click-row.bs.table', function (e, row, $element) {
               // $result.text('Event: click-row.bs.table, data: ' + JSON.stringify(row));
            }).on('dbl-click-row.bs.table', function (e, row, $element) {
               // $result.text('Event: dbl-click-row.bs.table, data: ' + JSON.stringify(row));
            }).on('sort.bs.table', function (e, name, order) {
               // $result.text('Event: sort.bs.table, data: ' + name + ', ' + order);
            }).on('check.bs.table', function (e, row) {
                //$result.text('Event: check.bs.table, data: ' + JSON.stringify(row.phone));
               // $result.text('Event: check.bs.table, data: ' + JSON.stringify(row.phone));
                $.ajax({
   							 url: "agents/update_phone.php?id=<?php echo $_REQUEST['id']; ?>",
   							 type:"post",
   							 data:{"phone":row.phone,"ischecked":"false"},
    						context: document.body,
    						success: function(data){

      						alert(data);
   						 }
						});
               // $result.text('Event: check.bs.table, data: ' + $updatequery);
            }).on('uncheck.bs.table', function (e, row) {
                //$result.text('Event: uncheck.bs.table, data: ' + JSON.stringify(row));
                $.ajax({
   							 url: "agents/update_phone.php?id=<?php echo $_REQUEST['id']; ?>",
   							 type:"post",
   							 data:{"phone":row.phone,"ischecked":"true"},
    						context: document.body,
    						success: function(data){

      						alert(data);
   						 }
						});
            }).on('check-all.bs.table', function (e) {
               // $result.text('Event: check-all.bs.table');
                $.ajax({
   							 url: "agents/update_phone.php?id=<?php echo $_REQUEST['id']; ?>",
   							 type:"post",
   							 data:{"ischecked":"All"},
    						context: document.body,
    						success: function(data){

      						alert(data);
   						 }
						});
            }).on('uncheck-all.bs.table', function (e) {
               // $result.text('Event: uncheck-all.bs.table');
                $.ajax({
   							 url: "agents/update_phone.php?id=<?php echo $_REQUEST['id']; ?>",
   							 type:"post",
   							 data:{"ischecked":" "},
    						context: document.body,
    						success: function(data){

      						alert(data);
   						 }
						});
            }).on('load-success.bs.table', function (e, data) {
               // $result.text('Event: load-success.bs.table');
            }).on('load-error.bs.table', function (e, status) {
              //  $result.text('Event: load-error.bs.table, data: ' + status);
            }).on('column-switch.bs.table', function (e, field, checked) {
              //  $result.text('Event: column-switch.bs.table, data: ' +
              //      field + ', ' + checked);
            }).on('page-change.bs.table', function (e, size, number) {
               // $result.text('Event: page-change.bs.table, data: ' + number + ', ' + size);
            }).on('search.bs.table', function (e, text) {
               // $result.text('Event: search.bs.table, data: ' + text);
            });
        });
   // });
   /*$('input[class="first"]:checked').each(function() {
   console.log(this.value);
    });*/
/*window.ischecked = {
				'change .mycheckbox' : function(e,value,row,index){
						//window.location.replace("viewDetails.php?id="+row.id);
						//console.log(this.value);
						alert("hello");
					}
				};*/


   </script>
</body>
</html>