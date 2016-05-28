<script type="text/javascript" src="<?=base_url();?>plugins/jssor-slider/js/jssor.slider.mini.js"></script>

<script type="text/javascript" src="<?=base_url();?>plugins/slick-slider/js/slick.min.js"></script>
<script>
	
	
    

	$(document).ready(function() {
	
			$('.imgSlider>div.slideContainer').css({"display":"block"});
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
			  
			 $('#myHorizontalSlider').carousel({
		    		interval:3000
		    	}).on('slid.bs.carousel', function(event){
		    		var _this = $(this);
		    		var slidenumber = _this.children().find('div.active').data('slide-number');
		    		$('#myHorizontalThumbnailSlider>div.carousel-inner>div.item>div>div.slider-thumb-active-indicator').removeClass('slider-thumb-active-indicator');
		    		$('#myHorizontalThumbnailSlider>div.carousel-inner>div.item>div[data-thumbnumber="'+slidenumber+'"]>div:first-child').addClass('slider-thumb-active-indicator');
		
		    		/***********************************/
		    		if(!$('#myHorizontalThumbnailSlider').parent().is(':hover'))
		    		{
			    		if(slidenumber == $('#myHorizontalSlider>div.carousel-inner>div').length)
			    		{
			    			var thumbslidevalue = 0;
			    		}
			    		else
			    		{
			    			var thumbslidevalue = parseInt(slidenumber/4);
			    		}
			    		//console.log("thumbslidevalue",slidenumber,thumbslidevalue);
			    		$('#myHorizontalThumbnailSlider').carousel(thumbslidevalue).carousel('pause');
			    	}
		    	}).on('slide.bs.carousel',function(event){
		    	});
		
		    	$('#myHorizontalThumbnailSlider').carousel({
		    		interval:1000
		    	}).carousel('pause');
		    	$(document).on('click','#myHorizontalThumbnailSlider>div.carousel-inner>div.item>div',function(event){
		    		//console.log("slider thumbnail clicked !");
		    		var _this = $(this);
		    		var sliderId = _this.data('thumbnumber');
		    		_this.parent().parent().find('div.slider-thumb-active-indicator').removeClass('slider-thumb-active-indicator');
		    		_this.find('div.active-indicator').addClass('slider-thumb-active-indicator');
		    		$('#myHorizontalSlider').carousel(sliderId);
		    	});
		});

	$(document).ready(function()
	{
		
		$.ajax({                                                            
			async:true,
			type:'POST',
			dataType:'json',
			url:Global_namespace.baseurl+"client_requests/advt/get_advt",
			data:{
				'domainname':Global_namespace.domainname,
				"page":"home"
			},
			success:function(datareceived,textStatus,jqXHR)
			{
				console.log(datareceived);
				//#top-right-container
				data = datareceived['data'];
				timedelay = datareceived['timedelay'];
				if(data.length > 0)
					HOMEVIEW_NAMESPACE.advtupdt(timedelay,data);
			},
			error:function(jqXHR,textStatus,errorThrown)
			{
				console.log(jqXHR,textStatus,errorThrown);
				//alert(textStatus);
			}
		});


	HOMEVIEW_NAMESPACE = {};
	HOMEVIEW_NAMESPACE.currentadvt = -1;
	HOMEVIEW_NAMESPACE.advtupdt = 	function(timedelay,data)
									{
										if(HOMEVIEW_NAMESPACE.currentadvt == -1)
										{
											HOMEVIEW_NAMESPACE.currentadvt = Math.floor(Math.random() * ((data.length-1) - 0 + 1));
										}
										else
										{
											if(HOMEVIEW_NAMESPACE.currentadvt != (data.length-1))
											{
												HOMEVIEW_NAMESPACE.currentadvt++;
											}
											else
											{
												HOMEVIEW_NAMESPACE.currentadvt = 0;
											}
										}
										console.log(HOMEVIEW_NAMESPACE.currentadvt);
										var advtobj = data[HOMEVIEW_NAMESPACE.currentadvt];
										var advtString = 	"<div style='background-color:rgba(0,0,0,.6);position:absolute;bottom:0px;color:#fff;padding:3px 6px;margin-right:15px;font-size:1.2em;line-height:1.4em;max-height:60%;overflow:hidden;'>"+advtobj.content+"</div>"+
															"<a href='"+advtobj.weburl+"' target='_blank'>"+
																"<img src='"+advtobj.image+"' class='' style='height:100%;width:100%;'/>"+
															"</a>";
										$('#top-right-container').children().fadeOut(500);
										$('#top-right-container').empty();
										$(advtString).hide().appendTo('#top-right-container').fadeIn(1000);
										//$('#top-right-container').append(advtString);
										if(data.length > 1)
											HOMEVIEW_NAMESPACE.intervalreference = setTimeout(function(){HOMEVIEW_NAMESPACE.advtupdt(timedelay,data);},timedelay);
									}	
									
									$('#top-right-container').on('mouseover',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.intervalreference);
 	});
 	$('#top-right-container').on('mouseout',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.intervalreference);
 		HOMEVIEW_NAMESPACE.intervalreference = setTimeout(function(){HOMEVIEW_NAMESPACE.advtupdt(timedelay,data);},timedelay);
 	});	
	//scrollable-category-news-main-container
	//scrollable-cat-news-left-btn
	HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER = {};
	HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.total_count = $('#scrollable-category-news-main-container>div').length ;
	HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index = 0;

	
	HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.Scrollable_category_right_slide();},5000);

	HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.cat_scroller_main_container_have_news = function(){
		var lnth = $('#scrollable-category-news-main-container>div').length;
		//console.log("length of divs"+lnth);
		if(lnth > 0)
			return 1;
		else
			return 0;
	};
	$('#scrollable-cat-news-left-btn').on('click',function(){
		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.intervalreference);
		HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.Scrollable_category_right_slide();},5000);
		HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.Scrollable_category_left_slide();
	});
	$('#scrollable-cat-news-right-btn').on('click',function(){
			clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.intervalreference);
			HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.Scrollable_category_right_slide();},5000);
			HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.Scrollable_category_right_slide();
	});
	HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.Scrollable_category_left_slide = function()
	{
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.cat_scroller_main_container_have_news)
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index == 0)
					HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.total_count - 1;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index - 1;

			$($('#scrollable-category-news-main-container').children()[lastslide]).fadeOut(400, function() {
				$($('#scrollable-category-news-main-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index]).fadeIn(200,function(){
					$($('#scrollable-category-news-heading-main-container').children()[lastslide]).css({"display":'none'});
					$($('#scrollable-category-news-heading-main-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index]).css({"display":"inline"});
				});
			});
		}
	}
	HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.Scrollable_category_right_slide = function()
	{
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.cat_scroller_main_container_have_news)
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index == HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.total_count-1)
				HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index = 0;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index+1;
			$($('#scrollable-category-news-main-container').children()[lastslide]).fadeOut(400, function() {
				$($('#scrollable-category-news-main-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index]).fadeIn(200,function(){
					$($('#scrollable-category-news-heading-main-container').children()[lastslide]).css({"display":'none'});
					$($('#scrollable-category-news-heading-main-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_CATEGORY_NEWS_SLIDER.current_slider_index]).css({"display":"inline"});
				});
			});
		}
	}
	
	//***************************************//
	
	HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV = {};
	HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.total_count = $('#mandi_bhaav_container>div').length ;
	HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index = 0;

 	$('#mandi_bhaav_container').parent().parent().on('mouseover',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.intervalreference);
 	});
 	$('#mandi_bhaav_container').parent().parent().on('mouseout',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.intervalreference);
 		HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.Scrollable_category_right_slide();},7000);
 	});
	
	HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.Scrollable_category_right_slide();},7000);

	HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.cat_scroller_main_container_have_news = function(){
		var lnth = $('#mandi_bhaav_container>div').length;
		//console.log("length of divs"+lnth);
		if(lnth > 0)
			return 1;
		else
			return 0;
	};
	$('#scrollable-mandi-bhaav-left-btn').on('click',function(){
		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.intervalreference);
		HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.Scrollable_category_right_slide();},5000);
		HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.Scrollable_category_left_slide();
	});
	$('#scrollable-mandi-bhaav-right-btn').on('click',function(){
			clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.intervalreference);
			HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.Scrollable_category_right_slide();},5000);
			HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.Scrollable_category_right_slide();
	});
	HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.Scrollable_category_left_slide = function()
	{
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.cat_scroller_main_container_have_news)
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index == 0)
					HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.total_count - 1;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index - 1;

			$($('#mandi_bhaav_container').children()[lastslide]).fadeOut(400, function() {
				$($('#mandi_bhaav_container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index]).fadeIn(200,function(){
					//$($('#scrollable-category-news-heading-main-container').children()[lastslide]).css({"display":'none'});
					//$($('#scrollable-category-news-heading-main-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index]).css({"display":"inline"});
				});
			});
			$('#mandi_bhaav_container').scrollTop(0);
		}
	}
	HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.Scrollable_category_right_slide = function()
	{
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.cat_scroller_main_container_have_news)
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index == HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.total_count-1)
				HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index = 0;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index+1;
			$($('#mandi_bhaav_container').children()[lastslide]).fadeOut(400, function() {
				$($('#mandi_bhaav_container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index]).fadeIn(200,function(){
					//$($('#scrollable-category-news-heading-main-container').children()[lastslide]).css({"display":'none'});
					//$($('#scrollable-category-news-heading-main-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index]).css({"display":"inline"});
				});
			});
			$('#mandi_bhaav_container').scrollTop(0);
		}
	}
	
	
	/********************************* rashifal_container *********************///
	
	
	HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL = {};
	HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.total_count = $('#rashifal_container>div').length ;
	HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index = 0;

 	$('#rashifal_container').parent().parent().on('mouseover',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.intervalreference);
 	});
 	$('#rashifal_container').parent().parent().on('mouseout',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.intervalreference);
 		HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.Scrollable_category_right_slide();},5000);
 	});
	
	HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.Scrollable_category_right_slide();},5000);

	HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.cat_scroller_main_container_have_news = function(){
		var lnth = $('#rashifal_container>div').length;
		//console.log("length of divs"+lnth);
		if(lnth > 0)
			return 1;
		else
			return 0;
	};
	$('#scrollable-rashi-fal-left-btn').on('click',function(){
		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.intervalreference);
		HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.Scrollable_category_right_slide();},5000);
		HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.Scrollable_category_left_slide();
	});
	$('#scrollable-rashi-fal-right-btn').on('click',function(){
			clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.intervalreference);
			HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.Scrollable_category_right_slide();},5000);
			HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.Scrollable_category_right_slide();
	});
	HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.Scrollable_category_left_slide = function()
	{
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.cat_scroller_main_container_have_news)
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index == 0)
					HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.total_count - 1;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index - 1;

			$($('#rashifal_container').children()[lastslide]).fadeOut(400, function() {
				$($('#rashifal_container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index]).fadeIn(200,function(){
					//$($('#scrollable-category-news-heading-main-container').children()[lastslide]).css({"display":'none'});
					//$($('#scrollable-category-news-heading-main-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index]).css({"display":"inline"});
				});
			});
			$('#rashifal_container').scrollTop(0);
		}
	}
	HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.Scrollable_category_right_slide = function()
	{
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.cat_scroller_main_container_have_news)
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index == HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.total_count-1)
				HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index = 0;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index+1;
			$($('#rashifal_container').children()[lastslide]).fadeOut(400, function() {
				$($('#rashifal_container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.current_slider_index]).fadeIn(200,function(){
					//$($('#scrollable-category-news-heading-main-container').children()[lastslide]).css({"display":'none'});
					//$($('#scrollable-category-news-heading-main-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.current_slider_index]).css({"display":"inline"});
				});
			});
			$('#rashifal_container').scrollTop(0);
		}
	}
	
	$('#public-message-container>div>div').on('click',function(){
		_this = $(this);
		if(_this.find('.img').hasClass('col-md-4'))
		{
			_this.find('.img>img').css({"height":"auto"}).removeClass("center-cropped").addClass("img-responsive");
			_this.find('.img').removeClass('col-md-4').addClass('col-md-12');
			_this.find('.txt').removeClass('col-md-8').addClass('col-md-12').css({"height":'auto',"padding-left":'15px'});
			
			//_this.parent().scrollTop(_this.find('.img').parent().parent().position().top);
		}
		else
		{
			_this.find('.img>img').css({"height":"50px"}).removeClass("img-responsive").addClass("center-cropped");
			_this.find('.img').removeClass('col-md-12').addClass('col-md-4');
			_this.find('.txt').removeClass('col-md-12').addClass('col-md-8').css({"height":'43px',"padding-left":'0px'});
		}
	});
	
	
		
	/********************************* public-message-container *********************///
	
	
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES = {};
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.total_count = $('#publicmessagebody>div').length ;
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = 0;
	
	
 	$('#publicmessagebody').parent().on('mouseover',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference);
 	});
 	$('#publicmessagebody').parent().on('mouseout',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference);
 		HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_right_slide();},5000);
 	});
	
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_right_slide();},5000);

	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.cat_scroller_main_container_have_news = function(){
		var lnth = $('#publicmessagebody>div').length;
		//console.log("length of divs"+lnth);
		if(lnth > 0)
			return 1;
		else
			return 0;
	};
	$('#scrollable-public-message-left-btn').on('click',function(){
		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference);
		HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_right_slide();},5000);
		HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_left_slide();
	});
	$('#scrollable-public-message-right-btn').on('click',function(){
			clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference);
			HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_right_slide();},5000);
			HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_right_slide();
	});
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_left_slide = function()
	{
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.cat_scroller_main_container_have_news())
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index == 0)
					HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.total_count - 1;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index - 1;

			$($('#publicmessagebody').children()[lastslide]).fadeOut(400, function() {
				$($('#publicmessagebody').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index]).fadeIn(200,function(){
					$($('#scrollable_public_message_header').children()[lastslide]).css({"display":'none'});
					$($('#scrollable_public_message_header').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index]).css({"display":"inline"});
				});
			});
			$('#publicmessagebody').scrollTop(0);
		}
	}
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_right_slide = function()
	{
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.cat_scroller_main_container_have_news())
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index == HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.total_count-1)
				HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = 0;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index+1;
			$($('#publicmessagebody').children()[lastslide]).fadeOut(400, function() {
				$($('#publicmessagebody').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index]).fadeIn(200,function(){
					$($('#scrollable_public_message_header').children()[lastslide]).css({"display":'none'});
					$($('#scrollable_public_message_header').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index]).css({"display":"inline"});
				});
			});
			$('#publicmessagebody').scrollTop(0);
		}
	}
	
	$(".havenicescroll").niceScroll({cursorcolor:"#666",scrollspeed:100,mousescrollstep:20,cursorwidth:"3px",zindex:8});
	
	
	/**** Addons and Advertisement script starts Here ****/	


	$.ajax({
		async:true,
		dataType:'json',
		type:'POST',
		data:{'domainname':Global_namespace.domainname},
		url:Global_namespace.baseurl+"client_requests/addons/get_addons_n_advt",
		
		success:function(datareceived,textStatus,jqXHR)
		{
			//console.log(datareceived);
			$.each(datareceived,function(index,value)
			{
				console.log(index,value);
				switch(value.name)
				{
					case "editorial":
								if(value.data.length > 0)
								{
									//editorial_container
									var data = value.data[0];
									$('#editorial_container>div.panel-heading>span').text(value.addonname);
									var domString = "<p><b>"+data.heading+"</b></p>";
									domString = domString+data.content;
									domString = domString + "<a href='"+Global_namespace.baseurl+"editorial/"+data.id+"' target='_blank' class='btn btn-default btn-xs pull-right'>read more ...</a>";
									$('#editorial_container>div.panel-body').append(domString);
									$('#editorial_container').fadeIn();
								}
								break;
					case "joke":
								if(value.data != false)
								{
									//jokescontainer
									$('#jokescontainer>div.panel-heading').text(value.addonname);
									$('#jokescontainer>div.panel-body>img').attr("src",value.data['image']);
									$('#jokescontainer>div.panel-body>div').text(value.data['text']);
									$('#jokescontainer').fadeIn();

								}
								break;
					case "publicmessage":
									if(value.data.length > 0)
									{
										//publicmessagecontainer
										//$('#publicmessagecontainer>div.panel-heading>span#scrollable_public_message_header').append("<span style=''>"+value.addonname+"</span>").append("<span style='display:none;'>"+value.addonname+"</span>");
										var domString = "";
										$.each(value.data,function(ind,val){
											
											if(ind>0)
											{
												domString += "<div style='display:none;'>";
												$('#publicmessagecontainer>div.panel-heading>span#scrollable_public_message_header').append("<span style='display:none;'>"+val.typename+"</span>");
											}
											else
											{
												domString += "<div style=''>";
												$('#publicmessagecontainer>div.panel-heading>span#scrollable_public_message_header').append("<span style=''>"+val.typename+"</span>");
											}
											//console.log("test",val);
											$.each(val.data,function(dtind,row){

												domString+="<div style='cursor:pointer;'>"+
									                            "<div class='row'>"+
									                                "<div class='pull-right' style='position:absolute;right:20px;'>"+
									                                    "<span class='glyphicon glyphicon-sort'></span>"+
									                                "</div>"+
									                                "<div class='col-md-4 col-xs-2 img'><img class='center-cropped' src='"+row['image']+"' style='height:50px;'></div>"+
									                                "<div class='col-md-8 col-xs-10 txt' style='padding-left:0px;height:43px;overflow:hidden;'>"+
									                                row['text']+
									                                "</div>"+
									                            "</div>"+
									                        "</div>"+
									                        "<hr style='margin-top:10px;margin-bottom:10px;'>";
											});
							        		domString += "</div>";
										});
										$('#publicmessagecontainer>div.panel-body').append(domString);
										HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.total_count = $('#publicmessagebody>div').length ;
										
										$('#publicmessagecontainer').fadeIn();
									}
								break;
					case "rivernrates":
									if(value.data.length)
									{
										$('#rivernratescontainer>div.panel-heading>span:first-child').text(value.addonname);
										var domString = "";
										$.each(value.data,function(ind,val){
											if(ind>0)
											{
												domString += "<div style='display:none;'>";
											}
											else
											{
												domString += "<div style=''>";
											}
											$.each(val,function(dtind,row){
												domString += "<p style='font-weight: bold'>"+row['heading']+"</p>"+
                    											"<p>"+row['content']+"</p>";
											});
											domString += "</div>";
										});
										$('#rivernratescontainer>div.panel-body').append(domString);
HOMEVIEW_NAMESPACE.SCROLLABLE_MANDI_BHAAV.total_count = $('#mandi_bhaav_container>div').length ;
										$('#mandi_bhaav_container').fadeIn();
									}
								break;
					case "horoscope":
									if(value.data)
									{
										//horoscopecontainer
										$('#horoscopecontainer>div.panel-heading>span:first-child').text(value.addonname);
										$.each(value.data,function(ind,val){
											$('#'+ind+'_text').text(val);
										});
HOMEVIEW_NAMESPACE.SCROLLABLE_RASHI_FAL.total_count = $('#rashifal_container>div').length ;
										$('#horoscopecontainer').fadeIn();
									}
								break;
					case "automobile_launches":
									if(value.data.length)
									{
										//automobilelaunches
										$('#automobilelaunchescontainer>div.panel-heading').text(value.addonname);
										var domString = "";
										$.each(value.data,function(ind,val){
											domString += "<div class='row'>"+
										                    "<div class='col-md-4 col-xs-2' style='height:60px;'>"+
										                        "<img class='center-cropped' src='"+val['image']+"' style='height:100%;'>"+
										                    "</div>"+
										                    "<div class='col-md-8 col-xs-10' style='padding-left:0px;'>"+
										                        val['text']+
										                    "</div>"+
										                "</div>"+
										                "<hr style='margin-top:10px;margin-bottom:10px;'>";
										});
										$('#automobilelaunchescontainer>div.panel-body').append(domString);
										$('#automobilelaunchescontainer').fadeIn();
									}
								break;
				}
			});
		},
		error:function(jqXHR,textStatus,errorThrown)
		{			
			console.log(jqXHR,textStatus,errorThrown);
		}
	});



/**** Addons and Advertisement script ENDS Here ****/
});
</script>