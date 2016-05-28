<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?=base_url('css/style.css');?>">
		<style>
		</style>



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
			</div>
		</div>
    	<div id="loading_bar" style="height:700px;width:100%; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed;margin-top:-10px; display:;">
			<img src="<?=base_url('images/ajax-loader.gif');?>" style="margin-top:18%; margin-left:45%;">
		</div>
		<div class="container-fluid" style="min-height:89vh;">