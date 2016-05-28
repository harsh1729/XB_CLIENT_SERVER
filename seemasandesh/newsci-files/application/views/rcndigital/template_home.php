<?php
	$header_data['datafoldername'] = $datafoldername;
	
	$header_data['css'] = $this->load->view($datafoldername.'view-parts/home-view-css-files','',TRUE);
	$header_data['navigation'] = $this->load->view($datafoldername.'view-parts/navigation-view',$datafoldername,TRUE);
	
	$this->load->view($datafoldername.'view-parts/header-view',$header_data);

	$top_news_data['news'] = $root_news;
	$top_news_data['rootcategoryheading'] = $rootcategoryheading;
	$data_top_news_row['slider'] = $this->load->view($datafoldername.'view-parts/top-news-view',$top_news_data,TRUE);

	$data_top_news_row['cat_news_scroller'] = $cat_news_scroller;
	$this->load->view($datafoldername.'view-parts/top-news-content-view',$data_top_news_row);

	
	$categoryNews['content'] = $content;
	$data['editorial'] = $editorial;
	$data['categorynews'] = $this->load->view($datafoldername.'view-parts/category-news-short-desc-view',$categoryNews,TRUE);
	$data['publicmessages'] = $publicmessages;
	$data['rashifal'] = $rashifal;
	$data['riversnrates'] = $riversnrates;
	$data['autosandesh'] = $autosandesh;
	
	$this->load->view($datafoldername.'view-parts/home-view-content',$data);

	$footer_view['js'] = $this->load->view($datafoldername.'view-parts/home-view-js-files','',TRUE);
	$this->load->view($datafoldername.'view-parts/footer-view',$footer_view);