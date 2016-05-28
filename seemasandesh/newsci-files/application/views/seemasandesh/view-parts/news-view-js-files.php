<script type="text/javascript" src="<?=base_url();?>plugins/jssor-slider/js/jssor.slider.mini.js"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/slick-slider/js/slick.min.js"></script>
<script>

	NEWS_VIEW_NAMESPACE = {};
	NEWS_VIEW_NAMESPACE.limit = 4;
	NEWS_VIEW_NAMESPACE.offset = 0;
	NEWS_VIEW_NAMESPACE.lastnewsid  = 0;

	NEWS_VIEW_NAMESPACE.myinfinitescroll = {};
	NEWS_VIEW_NAMESPACE.myinfinitescroll.scrollEnable = false;	
	NEWS_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = false;	// is there any ongoing ajax request
	NEWS_VIEW_NAMESPACE.myinfinitescroll.loadBefore = 100; // load this much pixel before the scrollbar reaches to end!

	NEWS_VIEW_NAMESPACE.generate_dom_string = function(heading,datetime,newsid,content,images,index){
		var substring_index;
		var default_index =290;
		var heading_sub_index=50;
		console.log(content.length);
		if(heading.length-5 > heading_sub_index)
		{
			while(heading[heading_sub_index]!== " " && heading.length > heading_sub_index)
			{
							 	heading_sub_index++;
				
					 
			}
		}
		if(content.length > default_index)
		{	
			while(content[default_index]!== " " && content.length > default_index)
			{
							 	default_index++;
				
					 
			}
		}								
			substring_index=default_index;
			
						var domString ='<div class="col-md-3 col-sm-3 col-xs-3">'+
									'<div class="panel panel-default">'+
										'<div class="panel-body">'+
											'<div class="row" style="margin-bottom:10px;">'+
												'<div class="col-md-12">'+
													'<i class="fa fa-facebook fa-lg"></i>'+
													'<i class="fa fa-twitter fa-lg"></i>'+
													'<i class="fa fa-google-plus fa-lg"></i>'+
													
												'</div>'+
											'</div>'+
											'<div class="row">'+
												'<div class="col-md-12 col-sm-12 col-xs-12 ">'+
													'<div class="imgSlider">';
									$.each(images, function(index, val)
									{
										 domString += 	'<div class="slideContainer" style="height:200px;">'+
															'<img data-lazy="'+val.link+'" class="center-cropped" />'+
															//'<p style="color:#666;font-size:.9em;margin-top:2px;" class="text-center">'+val.tagline+'</p>'+
														'</div>';
									});
								if(images.length !== 0)
								{	
									domString +=	'</div>'+
												'</div>'+
												'<div class="col-md-12">'+
													'<div class="row">'+
														'<div class="col-md-12" style="height:3em;overflow:hidden;">'+
															'<h7 class="pull-left" style="color:#333;margin-top:0;">'+heading.substring(0,heading_sub_index)+'....</h7>'+
															//'<h6 class="pull-right" style="color:#666;">'+datetime+'</h6>'+
														'</div>'+
													'</div>'+
													
													//'<p style="color:#999;">'+content+'</p>'+
													'<a class="pull-right btn btn-default btn-xs"  style="margin-top:5px;" href="'+Global_namespace.baseurl+'detail/'+newsid+'">Read More...</a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>';
								
								}
								else
								{
								domString +=	'</div>'+
												'</div>'+
												'<div class="col-md-12">'+
													'<div class="row">'+
														'<div class="col-md-12" style="height:3em;overflow:hidden;">'+
															'<h7 class="pull-left" style="color:#333;margin-top:0;">'+heading.substring(0,heading_sub_index)+'....</h7>'+
															//'<h6 class="pull-right" style="color:#666;">'+datetime+'</h6>'+
														'</div>'+
													'</div>'+
													
													'<p style="color:#999;height:190px;overflow:hidden;" >'+content.substring(0,substring_index)+'....</p>'+
													'<a class="pull-right btn btn-default btn-xs"  style="margin-top:5px;" href="'+Global_namespace.baseurl+'detail/'+newsid+'">Read More...</a>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>';
								}
				
		return domString;
	}
	NEWS_VIEW_NAMESPACE.get_cat_id = function()
	{
		currenturl = window.location.href;
		controllername = currenturl.substr(Global_namespace.baseurl.length,4);
		controllerparameter = currenturl.substr((Global_namespace.baseurl.length));
		parameters = [];
		parameter = controllerparameter.split('/');
		return parameter[1];
	}
	NEWS_VIEW_NAMESPACE.loadnews = function(calltype)
	{
		postData = {
						"calltype":calltype,
						"limit":NEWS_VIEW_NAMESPACE.limit,
						"lastnewsid":NEWS_VIEW_NAMESPACE.lastnewsid,
						"domainname":Global_namespace.domainname
					};
		if(!NEWS_VIEW_NAMESPACE.get_cat_id())
		{
		}
		else
		{
			postData['catid'] = NEWS_VIEW_NAMESPACE.get_cat_id();
		}
		//console.log(postData);
		$.ajax({                                                            
			async:true,
			type:'POST',
			dataType:'json',
			url:Global_namespace.baseurl+"client_requests/news/web_get_cat_news",
			data:postData,
			success:function(datareceived,textStatus,jqXHR)
			{
				//console.log(datareceived);
				if(datareceived.length)
				{
					if(datareceived[datareceived.length-1]['newsid'] > 0)
						NEWS_VIEW_NAMESPACE.lastnewsid = datareceived[datareceived.length-1]['newsid'];
					$.each(datareceived,function(index, val)
					{
						 //console.log(val);	
						 	 $(NEWS_VIEW_NAMESPACE.generate_dom_string(val.heading,val.datetime,val.newsid,val.content,val.images,index)).hide().appendTo('#contentcontainer').fadeIn(1000);
					});
					NEWS_VIEW_NAMESPACE.loadSlickSlider();

					if(calltype == "fresh")
					{
						NEWS_VIEW_NAMESPACE.myinfinitescroll.scrollEnable = true;
						NEWS_VIEW_NAMESPACE.offset = 0;
					}
				}
				else
				{
					NEWS_VIEW_NAMESPACE.myinfinitescroll.scrollEnable = false;
				}
				NEWS_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = false;
				$('#infiniteloadingindicator').css('display','none');
				
			},
			error:function(jqXHR,textStatus,errorThrown)
			{
				console.log(jqXHR,textStatus,errorThrown);
			}
		});
	}
	NEWS_VIEW_NAMESPACE.loadSlickSlider = function(){

			$('.imgSlider').slick({
				infinite:true,
				autoplay:true,
				//accessibility:true,
				autoplaySpeed:4000,
				arrows:false,
				cssEase:"ease-in-out",
				dots:true,
				//fade:true,
				draggable:true,
				lazyLoad:"progressive",//ondemand,progressive
				mobileFirst:true,
				speed:650,
				swipeToSlide:false,
				touchThreshold:12,
				adaptiveHeight: false,
			  })/*.on('init',function(event,slider){
					
				console.log(event,"init");
					//var slideHeight = $(slider.$slides[0] ).height();
					//$(slider.$slider ).height( slideHeight);
			  });.on('reInit',function(event,slider){
					console.log(event);
			  })*/.on('afterChange',function(event,slider,currentSlide){
					//console.log(event,slider,currentSlide);
					var slideHeight = $(slider.$slides[currentSlide] ).height();
					$(slider.$slider ).height( slideHeight);
			  });
	}

	$(document).ready(function()
		{
			NEWS_VIEW_NAMESPACE.loadnews('fresh');

			$(window).scroll(function(event)
			{
				if(NEWS_VIEW_NAMESPACE.myinfinitescroll.scrollEnable && !NEWS_VIEW_NAMESPACE.myinfinitescroll.scrollBusy && $(document).height() - $(window).height() - NEWS_VIEW_NAMESPACE.myinfinitescroll.loadBefore <= $(window).scrollTop() )
				{
					$('#infiniteloadingindicator').css('display','block');
					NEWS_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = true;
					NEWS_VIEW_NAMESPACE.loadnews('old');
				}
			});

		});

</script>