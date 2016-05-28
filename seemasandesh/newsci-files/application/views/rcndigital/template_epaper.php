<?php
	$header_data['datafoldername'] = $datafoldername;
	
	$header_data['css'] = $this->load->view($datafoldername.'view-parts/epaper-view-css-files','',TRUE);
	$header_data['navigation'] = $this->load->view($datafoldername.'view-parts/navigation-view',$datafoldername,TRUE);
	
	$this->load->view($datafoldername.'view-parts/header-view',$header_data);

	$data['datafoldername'] = $datafoldername;
	$data['states_n_areas'] = $states_n_areas;
	$data['datetoday'] = $datetoday;
	$this->load->view($datafoldername.'view-parts/epaper-view-content',$data);

	$footer_view['js'] = $this->load->view($datafoldername.'view-parts/epaper-view-js-files','',TRUE);
	$this->load->view($datafoldername.'view-parts/footer-view',$footer_view);