<?php
	$header_data['datafoldername'] = $datafoldername;
	$header_data['css'] = $this->load->view($datafoldername.'view-parts/editorial-view-css-files','',TRUE);
	$header_data['navigation'] = $this->load->view($datafoldername.'view-parts/navigation-view',$datafoldername,TRUE);

	$this->load->view($datafoldername.'view-parts/header-view',$header_data);
	
	$data['maincontent'] = $maincontent;
	$data['moreeditorialcontent'] = $moreeditorialcontent;
	
	$this->load->view($datafoldername.'view-parts/editorial-view-content',$data);

	$footer_view['js'] = $this->load->view($datafoldername.'view-parts/editorial-view-js-files','',TRUE);
	$this->load->view($datafoldername.'view-parts/footer-view',$footer_view);