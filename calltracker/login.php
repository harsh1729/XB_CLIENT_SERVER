<?php
session_start();
if( isset( $_SESSION['userId'] ) )
	header("location:index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<style>
.background-check
{
	background-color:#ecf0f1;
	text-align:center;
	border-radius:10px;
    border:1px solid #1abc9c;
}
html, body{height:100%; margin:0;padding:0}
 
.container-fluid{
  height:100%;
  display:table;
  width: 100%;
  padding: 0;
}
.textalign
{
	text-align:center;
}
.textfield
{


	margin-bottom:8%;
	
}
.loginbottom
{
	margin-top:13%;
	margin-bottom:6%;	
	background: #1abc9c;
	color:#FFF;
}
.loginbottom:hover
{
	margin-top:13%;
	margin-bottom:6%;	
	background:  #1bc6a4;
	color:#FFF;
}
.loginbottom:focus
{
	margin-top:13%;
	margin-bottom:6%;	
	background:  #1abc9c;
	color:#FFF;
}
.row-fluid {height: 100%; display:table-cell; vertical-align: middle;}
.centering {
 /* float:none;
  margin:0 auto;*/
}
.loginheader
{
	background-color:#1abc9c;
	padding-top:3%;
	padding-bottom:3%;
	color:#FFF;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	
}
.classBoxShadow
{
-webkit-box-shadow: 10px 10px 76px -9px rgba(26,188,156,0.3);
-moz-box-shadow: 10px 10px 76px -9px rgba(26,188,156,0.3);
box-shadow: 10px 10px 76px -9px rgba(26,188,156,0.3);
}

</style>
<script>
	$(document).ready(function(e) {
        $('#loginForm').submit(function(e) {
			var postData = $(this).serializeArray();
			var formUrl = $(this).attr("action");
			$.ajax({				
					async: true,
					type: 'POST',
					url:formUrl,
					//data: encodeURIComponent(postData),
					data: postData,
					success: function(data, textStatus, jqXHR){
						//alert(data);
						var dataObj = $.parseJSON(data);
						if(dataObj.rowCount == 1 )
						{
							$('#wrongCredentials').html("");
							$('#formGroupContainer').removeClass('has-error');
							$('#formGroupContainer').addClass('has-success');
							window.location.replace("index.php");
							//also send userdId to the next page and save in session variable
						}
						else
						{
							$('#wrongCredentials').html("Your username/password doesn't match!");
							$('#formGroupContainer').addClass('has-error');
							$('#password').val("");
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
    });
</script>
</head>

<body>
<div class="container-fluid">
	<div class="row-fluid fullheight" style=" background-image:url(images/mainBackground.jpg)">
		<div class="col-md-4 col-sm-4 col-xs-2"></div>
		<div class="col-md-4 col-sm-4 col-xs-8">
        		<?php 
        			if(isset($_REQUEST['msg']))
        			{
		            	echo "<div class='row'>";
		            		echo "<div class='col-md-12'><div class='alert alert-danger text-center'>".$_GET['msg']."</p></div>";
		            	echo "</div>";
					}
            	?>
                <div class="row">
                       <div class="col-md-1">
                       </div>
                       <div class="col-md-10 textalign">
                       			<div class="row">
                                		<div class="col-md-1 col-sm-1 col-xs-1"></div>
                                		<div class="col-md-10 col-sm-10 col-xs-10 background-check classBoxShadow">
                                        		<div class="row">
                                 						<div class="col-lg-12 loginheader lead">LogIn</div>
                                				</div>
                                                <div class="row" style="margin-bottom:15px;">
                                                		<div class="col-lg-12 text-center">
                                                        <span class="text-danger" id="wrongCredentials"></span>
                                                		</div>
                                                </div>
                                		        <form role="form" id="loginForm" action="ajaxRequests/verifyCredentials.php">
                                                	<div class="form-group" id="formGroupContainer">
                                                		<input type="text" class="form-control textfield" required placeholder="username" name="username" id="username"/>
		            									<input type="password" class="form-control " required placeholder="password" name="password" id="password"/>
                                                    </div>
				                        		<button type="submit" class="btn btn-lg loginbottom" ><span class="glyphicon glyphicon-log-in"></span> LogIn</button>
                                        		</form>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-1"></div>
                       	
                                </div>
                                
                        </div>
                       <div class="col-md-1">
                       </div>
                </div>
            
		</div>
		<div class="col-md-4 col-sm-4 col-xs-2"></div>
	</div>
</div>
</body>
</html>