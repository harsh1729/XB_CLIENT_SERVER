<?php
	$header_data['datafoldername'] = $datafoldername;
	
	$header_data['css'] = $this->load->view($datafoldername.'view-parts/home-view-css-files','',TRUE);
	$data2navigation['datafoldername'] = $datafoldername;
	$data2navigation['categories'] = $categories;
	$header_data['navigation'] = $this->load->view($datafoldername.'view-parts/navigation-view',$data2navigation,TRUE);
	
	$this->load->view($datafoldername.'view-parts/header-view',$header_data);

	$top_news_data['news'] = $rootcontent['detail'];
	$top_news_data['rootcategoryheading'] = $rootcategoryheading;
	$data_top_news_row['slider'] = $this->load->view($datafoldername.'view-parts/top-news-view',$top_news_data,TRUE);

	$data_top_news_row['cat_news_scroller'] = $content;
	$this->load->view($datafoldername.'view-parts/top-news-content-view',$data_top_news_row);

	
	$categoryNews['content'] = $content;
	$data['categorynews'] = $this->load->view($datafoldername.'view-parts/category-news-short-desc-view',$categoryNews,TRUE);
	
	$this->load->view($datafoldername.'view-parts/home-view-content',$data);

	$footer_view['js'] = $this->load->view($datafoldername.'view-parts/home-view-js-files','',TRUE);
	$this->load->view($datafoldername.'view-parts/footer-view',$footer_view);