<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
<link href="<?=base_url();?>plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
<style>
	.epaper_container
	{
		padding-bottom:20px;
		min-height:400px;
	}
	#states_container
	{
		border:none;
	}
	#states_container>ul
	{
		background-color:transparent;
		border:none;
		background:transparent;
	}
	.datetimepicker
	{
		margin-top:0px;
	}
	.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active
	{
		background:url(<?=base_url($datafoldername.'images/epaper_container_bg.jpg');?>);
	}
	.ui-state-active>a, .ui-widget-content .ui-state-active>a, .ui-widget-header .ui-state-active>a
	{
		outline:none;
		color:#fff;
	}
</style>