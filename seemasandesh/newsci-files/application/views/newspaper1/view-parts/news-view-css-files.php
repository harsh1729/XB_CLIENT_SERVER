<link rel="stylesheet" href="<?=base_url();?>plugins/slick-slider/css/slick.css"/>
<link rel="stylesheet" href="<?=base_url();?>plugins/slick-slider/css/slick-theme.css"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<style>

    /*override slick slider image height*/
    div.slideContainer>img
    {
        height:250px;
        min-height:250px;
        max-height:250px;
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

</style>