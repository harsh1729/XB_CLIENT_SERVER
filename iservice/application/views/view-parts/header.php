<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?=base_url('docs/css/style.css');?>">
		
		<?=$css;?>
	</head>
	<body>
		<?=$navigation;?>
		
		<div class="navbar navbar-fixed-top navbar-inverse" id="topNavigationBar" style="margin-left:15vw;">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle pull-left" style="margin-left:15px;margin-right:0px;" data-toggle="offcanvas" data-target="#leftSideMenu" data-canvas="">
				<span class="glyphicon glyphicon-th-large" style="color;font-size:17px;"></span>
			  </button>
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#rightSideMenu" data-canvas="">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div> 
			<div class="collapse navbar-collapse" id="rightSideMenu">
				<div class="container-fluid" style="background-color:#fff;solid;">
					<ul class="nav navbar-nav pull-left">
						<li style="display:none;"><a href="<?=base_url();?>" target="_blank"><span class="glyphicon glyphicon-globe"></span> Visit Website</a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown keep-open">
							<a class="dropdown-toggle dropdown-toggle-keep-open"  href="#">
								<span class="glyphicon glyphicon-sort-by-alphabet"></span>
								 Language
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><select name="language" id="language" class="dropdown-select form-control"></select></a></li>
								<li><a href="#"><select id="imeSelector" class="dropdown-select form-control"></select></a></li>
							</ul>
						</li>
						<li><a href="<?=base_url('login/logout');?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
					</ul>
				</div>
				<!-- below this is the more content --->