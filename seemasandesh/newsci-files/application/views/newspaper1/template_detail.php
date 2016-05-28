<?php
	$header_data['datafoldername'] = $datafoldername;

	$header_data['css'] = $this->load->view($datafoldername.'view-parts/detail-view-css-files','',TRUE);
	$header_data['navigation'] = $this->load->view($datafoldername.'view-parts/navigation-view',$datafoldername,TRUE);

	$this->load->view($datafoldername.'view-parts/header-view',$header_data);


	$data['newsdetail'] = $this->load->view($datafoldername.'view-parts/news-detail-view',$datanewsdetail,TRUE);

	$this->load->view($datafoldername.'view-parts/detail-view-content',$data);

	echo "<hr>";

	$categorynewsdata['datafoldername'] = $datafoldername;
	$categorynewsdata['news_in_rows'] = 4;

	$categorynewsdata['categorynews'] = $categorymorenews;

	$this->load->view($datafoldername.'view-parts/detail-view-category-news',$categorynewsdata);

	$footer_view['js'] = $this->load->view($datafoldername.'view-parts/detail-view-js-files','',TRUE);
	$this->load->view($datafoldername.'view-parts/footer-view',$footer_view);