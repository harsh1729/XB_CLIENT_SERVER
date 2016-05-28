<link rel="stylesheet" href="<?=base_url();?>plugins/slick-slider/css/slick.css"/>
<link rel="stylesheet" href="<?=base_url();?>plugins/slick-slider/css/slick-theme.css"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<style>

	#about_us
	{
		color:#fff;
	}
	#contact_us
	{
		color:#fff;
	}
    /*override slick slider image height*/
    div.slideContainer>img
    {
        height:180px;
        min-height:180px;
        max-height:180px;
    }

	.fa
	{
		padding-right:20px;
	}
	.fa-facebook:hover
	{
		color: #3A5795;
		cursor:pointer;
		font-weight:bolder;
	}
	.fa-twitter:hover
	{
		color: #55ACEE;
		cursor:pointer;
		font-weight:bolder;
	}
	.fa-google-plus:hover
	{
		color: #D95232;
		cursor:pointer;
		font-weight:bolder;
	}
	.fa-whatsapp:hover
	{
		color: #50CA5D;
		cursor:pointer;
		font-weight:bolder;
	}

	.slideContainer
	{
		/*cursor:ew-resize;*/
		cursor:pointer;
	}
	.slick-slide,.slick-track,.slick-slider,.slick-track
	{
		max-height:auto;
		height:auto;
	}
	.slick-dots li
	{
		margin:0px;
		height:30px;
	}
	.slick-dots li button:before
	{
		font-size:9px;
	}

	/********************** MAIN SLIDER STYLE START *****************/
	.center-cropped
	{
		object-fit: cover; /* Do not scale the image */
		object-position: center; /* Center the image within the element */
		height: auto;
		width: 100%;
	}
	.carousel-control
	{
		position:relative;
		border-collapse:separate;
	}
	#myHorizontalThumbnailSlider>div.carousel-inner>div.item>div:hover
	{
		cursor:pointer;
	}
	.slider-thumb-active-indicator
	{
		background-color:#C3161C;
	}
	.slider-heading-text
	{
		position: absolute;
		top: 198px;
		background-color: rgba(0,0,0,.6);
		color: #fff;
		width: 100%;
		height: 42px;
		padding: 1px 6px;
		overflow:hidden;
	}
	/********************** MAIN SLIDER STYLE END *****************/
</style>