<script type="text/javascript" src="<?=base_url();?>plugins/jssor-slider/js/jssor.slider.mini.js"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/slick-slider/js/slick.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/jssor-slider/js/jssor.slider.mini.js"></script>
<script>
	
	$(document).ready(function()
		{
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
		});
/********************** JSSOR SLIDER CODE GOES HERE ****************///////

	var _CaptionTransitions = [];
	_CaptionTransitions["T"] = { $Duration: 900, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
	_CaptionTransitions["B"] = { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };

	var options = {
                $AutoPlay:true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $SlideDuration: 500,  
				$ArrowKeyNavigation: true,                              //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $UISearchMode: 0, 									
                $FillMode:1, 										//The way to fill image in slide, 0: stretch, 1: contain (keep aspect ratio and put all inside slide), 2: cover (keep aspect ratio and cover whole slide), 4: actual size, 5: contain for large image and actual size for small image, default value is 0
				$Loop: 2	,                                  //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
				$PauseOnHover: 1, 
				$LazyLoading:2,
				$CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                },
			
                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
					
				$ActionMode:1,
				 $AutoCenter: 0,
                    $Loop: 0,                                       //[Optional] Enable loop(circular) of carousel or not, 0: stop, 1: loop, 2 rewind, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,   
					$AutoCenter: 3,                                //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 4,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition:204,   
					$DisableDrag: true ,  
					$Orientation: 1	,                      //[Optional] The offset position to park thumbnail,

                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                        $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                        $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                        $Steps: 4	                                       //[Optional] Steps to go for each navigation request, default value is 1
                    }
                }
				
            };
            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                console.log(parentWidth,jssor_slider1.$Elmt.clientWidth);
                if(parentWidth)
                {
                    //jssor_slider1.$ScaleWidth(Math.min(parentWidth, 720));
			var w = window.innerWidth;
                    //here Subtract 30px of right left padding
                    jssor_slider1.$ScaleWidth(parentWidth-30);
                    ht = jssor_slider1.$Elmt.clientHeight;
                    $('#top-right-container').css({
                    	"height": ht
                    });
                    if(w>1000)
                    {
                  	  $('#top-middle-container').css({
                    		"height":ht
                    	});
		    }
                }
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);

            //responsive code end
/**********************  JSSOR SLIDER ENDS HERE ************///////////////
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
				alert(textStatus);
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
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.total_count = $('#public-message-container>div').length ;
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = 0;

 	$('#public-message-container').parent().parent().on('mouseover',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference);
 	});
 	$('#public-message-container').parent().parent().on('mouseout',function(){
 		clearTimeout(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference);
 		HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_right_slide();},5000);
 	});
	
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.intervalreference = setInterval(function(){HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_right_slide();},5000);

	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.cat_scroller_main_container_have_news = function(){
		var lnth = $('#public-message-container>div').length;
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
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.cat_scroller_main_container_have_news)
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index == 0)
					HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.total_count - 1;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index - 1;

			$($('#public-message-container').children()[lastslide]).fadeOut(400, function() {
				$($('#public-message-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index]).fadeIn(200,function(){
					$($('#scrollable_public_message_header').children()[lastslide]).css({"display":'none'});
					$($('#scrollable_public_message_header').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index]).css({"display":"inline"});
				});
			});
			$('#public-message-container').scrollTop(0);
		}
	}
	HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.Scrollable_category_right_slide = function()
	{
		if(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.cat_scroller_main_container_have_news)
		{
			var lastslide = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index;
			if(HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index == HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.total_count-1)
				HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = 0;
			else
				HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index = HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index+1;
			$($('#public-message-container').children()[lastslide]).fadeOut(400, function() {
				$($('#public-message-container').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index]).fadeIn(200,function(){
					$($('#scrollable_public_message_header').children()[lastslide]).css({"display":'none'});
					$($('#scrollable_public_message_header').children()[HOMEVIEW_NAMESPACE.SCROLLABLE_PUBLIC_MESSAGES.current_slider_index]).css({"display":"inline"});
				});
			});
			$('#public-message-container').scrollTop(0);
		}
	}
	
	$(".havenicescroll").niceScroll({cursorcolor:"#666",scrollspeed:100,mousescrollstep:20,cursorwidth:"3px",zindex:8});
	
});
</script>