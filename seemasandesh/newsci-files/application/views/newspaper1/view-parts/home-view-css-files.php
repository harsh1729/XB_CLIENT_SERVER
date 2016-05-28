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


    /* jssor slider thumbnail navigator skin 07 css */
    .jssort07 .i 
    {
        position: absolute;
        top: 3px;
        left: 3px;
        width: 146px;
        height: 88px;
        filter: alpha(opacity=80);
        opacity: .8;
    }
    .jssort07 .p:hover .i, .jssort07 .pav .i {
        filter: alpha(opacity=100);
        opacity: 1;
    }

    .jssort07 .o {
        position: absolute;
        top: 4px;
        left: 4px;
        width: 144px;
        
        height: 86px;

        outline: 1.5px solid #b2b2b2;
        transition: outline-color .6s;
        -moz-transition: outline-color .6s;
        -webkit-transition: outline-color .6s;
        -o-transition: outline-color .6s;
    }

    * html .jssort07 .o {
        /* ie quirks mode adjust */
        width /**/: 148px;
        height /**/: 100px;
    }
    .jssort07 .pav .o
    {
        outline-color: #C3161C;
    }
    .jssort07 .p:hover .o 
    {
        outline-color: #000;
    }

    .jssort07 .pav:hover .o 
    {
        outline-color: #C3161C;
    }
    .jssort07 .p:hover .o 
    {
        transition: none;
        -moz-transition: none;
        -webkit-transition: none;
        -o-transition: none;
    }


    /* jssor slider arrow navigator skin 11 css */
        
    .jssora11l, .jssora11r, .jssora11ldn, .jssora11rdn 
    {
        position: absolute;
        cursor: pointer;
        display: block;
        background: url(<?=base_url();?>plugins/jssor-slider/images/a11.png) no-repeat;
        overflow: hidden;
    }

    .jssora11l 
    {
        background-position: -11px -41px;
    }

    .jssora11r 
    {
        background-position: -71px -41px;
    }

    .jssora11l:hover 
    {
        background-position: -131px -41px;
    }

    .jssora11r:hover 
    {
        background-position: -191px -41px;
    }

    .jssora11ldn 
    {
        background-position: -251px -41px;
    }

    .jssora11rdn 
    {
        background-position: -311px -41px;
    }
</style>