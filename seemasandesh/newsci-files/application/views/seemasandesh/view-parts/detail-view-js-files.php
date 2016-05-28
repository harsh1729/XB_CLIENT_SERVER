<script type="text/javascript" src="<?=base_url();?>plugins/jssor-slider/js/jssor.slider.mini.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		//console.log($('#newsContent').find('*:nth-child(1)').text());
		//console.log($('#newsContent').find('*:nth-child(2)').text());

	var _CaptionTransitions = [];
	_CaptionTransitions["T"] = { $Duration: 900, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
	_CaptionTransitions["B"] = { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };

		var jssor_slider1;
			jssor_slider1_starter = function (containerId) {
				var options = {
					$DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
					$SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
					$AutoPlaySteps: 1,
					$AutoPlay: false,
					$LazyLoading:1,
					$Loop: 0,
					$FillMode:1,
					$CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
	                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
	                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
	                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
	                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
	                },
					$ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
						$Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
						$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
						$AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
						$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
					}
				};
				jssor_slider1 = new $JssorSlider$(containerId, options);
			};
			jssor_slider1_starter('slider1_container');

			jssor_slider1.$On($JssorSlider$.$EVT_PARK,function(slideIndex,fromIndex){
				//content view
				$('#newsContent>div').hide();
				$('#newsContent').find('*:nth-child('+(slideIndex+1)+')').show();
				//heading view
				$('#newsHeading>div').hide();
				$('#newsHeading').find('*:nth-child('+(slideIndex+1)+')').show();
			});
			
			//responsive code begin
			//you can remove responsive code if you don't want the slider scales
			//while window resizes
			function ScaleSlider() {
				var parentWidth = $('#slider1_container').parent().width();
				if (parentWidth) {
					jssor_slider1.$ScaleWidth(parentWidth);
				}
				else
					window.setTimeout(ScaleSlider, 30);
			}
			//Scale slider after document ready
			ScaleSlider();
											
			//Scale slider while window load/resize/orientationchange.
			$(window).bind("load", ScaleSlider);
			$(window).bind("resize", ScaleSlider);
			$(window).bind("orientationchange", ScaleSlider);
			//responsive code end

			$.ajax({                                                            
			async:true,
			type:'POST',
			dataType:'json',
			url:Global_namespace.baseurl+"client_requests/advt/get_advt",
			data:{
				'domainname':Global_namespace.domainname,
				"page":"detail"
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
											setTimeout(function(){HOMEVIEW_NAMESPACE.advtupdt(timedelay,data);},timedelay);
									}



	});
</script>