<link href="<?=base_url();?>plugins/dropzone/css/dropzone.min.css" rel="stylesheet">
<style>
	body
	{
		padding-top:110px;
	}
	#left-navigation-container
	{
		margin-top:-110px;
	}


	.row.galleryContainer
	{
		margin-left:-5px;
		margin-right:-5px;
	}
	.row.galleryContainer>div.galleryImgContainer
	{
		padding-left:5px;
		padding-right:5px;
	}
	.galleryInnerColumnContainer
	{
		border:1px solid #aaa;
		padding:2px;
	}
	.galleryInnerColumnContainer:hover
	{
		border:1px solid #777;
	}
	.galleryHR
	{
		width:100%;
		height:1px;
		background-color:#aaa;
		margin-top:2px;
		margin-bottom:2px;
	}
	.galleryImgContainer .galleryImageName
	{
		position:absolute;
		bottom:0px;
		width:100%;
		background-color:rgba(0,0,0,.5);
		padding:2px;
		color:#fff;
		overflow:hidden;
		word-break:break-all;
		text-align:center;
	}
	.galleryImgContainer .galleryImageName:hover
	{
		background-color:rgba(0,0,0,.8);
	}
</style>