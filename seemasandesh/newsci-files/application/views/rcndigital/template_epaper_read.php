<!doctype html>
<html>
<head>
	<?php $this->load->view($datafoldername.'view-parts/epaper-read-view-css-files'); ?>
</head>
<body tabindex="1" class="loadingInProgress">
<?php
	$header_data['datafoldername'] = $datafoldername;

	$data['datafoldername'] = $datafoldername;
	$data['epaper'] = $epaper;
	$data['datetoday'] = $datetoday;
	$this->load->view($datafoldername.'view-parts/epaper-read-view-content',$data);

	$this->load->view($datafoldername.'view-parts/epaper-read-view-js-files','');
?>
</body>
</html>