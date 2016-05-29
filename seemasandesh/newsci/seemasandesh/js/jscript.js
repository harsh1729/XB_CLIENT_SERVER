$(document).ready(function()
{
	//fb like button
	
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0&appId=1576492509265907";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
//fb like button

//fb code

	
	  window.fbAsyncInit = function() {
		FB.init({
		  appId  : '1576492509265907',
		  status : true, // check login status
		  cookie : true, // enable cookies to allow the server to access the session
		  xfbml  : true  // parse XFBML
		});
	  };
	
	  (function() {
		var e = document.createElement('script');
		e.src = 'http://connect.facebook.net/en_US/all.js';
		e.async = true;
		document.getElementById('fb-root').appendChild(e);
	  }());
	  
	  
	$(document).on('click','.share_button' ,function(e){
	 var content = $(this).data('content');
	 var links = $(this).data('links');
	 var image = $(this).data('image');
	
	e.preventDefault();
	FB.ui(
	{
	method: 'feed',
	name: ''+content,
	link: ''+links,
	picture: ''+image,
	
	
	});
	});
	
	
	
	//fb code

	Global_namespace = {};
	
	Global_namespace.rootdirectory = ""
	Global_namespace.baseurl = window.location.origin+"/"+Global_namespace.rootdirectory;
	Global_namespace.domainname = window.location.origin;

	Global_namespace.categories = [];



	$('#loading_bar').css('display','none');

	$("#sidebar").niceScroll({cursorcolor:"#fff",scrollspeed:100,mousescrollstep:20,cursorwidth:"0px",zindex:8}).hide();
	$(".navsubmenucontainer").niceScroll({cursorcolor:"#ffF",scrollspeed:100,mousescrollstep:20,cursorborder:"1px solid #fff"}).hide();

/**** SLIDER SCRIPT START HERE **/
	
        var navmenuslidespeed = 90;
	var currentmainmenu;
	$(document).on('mouseover','ul#navmenu>li>a',function(event) {

		_this = $(this);
		$('#sidebar>ul#navmenu>li>a').removeClass('menuhovered');
		_this.addClass('menuhovered');
		currentmainmenu = _this;
		var submenuId = _this.data('submenuId');
		if(submenuId != -1)
		{
			if($('.navsubmenucontainer>div.activemenu').length > 0)
			{
				//submenucontainer is active outside
				$('.navsubmenucontainer').stop();
				$('.navsubmenucontainer').animate({
					"margin-left":"0px"
						},
					navmenuslidespeed
				);
				$('#mainbody').stop();
				$('#mainbody').animate({
					"left":"130px"
						},
					navmenuslidespeed
				);

				$('.navsubmenucontainer>div.activemenu').css({"display":"none"}).removeClass('activemenu');
				$('#submenu_'+submenuId).css({
					"display":"block",
					zIndex:"20"
				}).addClass('activemenu');
			}
			else
			{
				//First time calling, means submenucontainer is hidden inside
				$('#submenu_'+submenuId).css({
					"display":"block",
				}).addClass('activemenu');
				
					$('.navsubmenucontainer').animate({
						"margin-left":"0px"
							},
						navmenuslidespeed
					);
					$('#mainbody').animate({
						"left":"130px"
							},
						navmenuslidespeed
					);
			}
		}
	});
	$(document).on('mouseout','ul#navmenu>li>a',function(event) {

		_this = $(this);
		_this.removeClass('menuhovered');
		var submenuId = _this.data('submenuId');
		if(submenuId != -1)
		{
			$('.navsubmenucontainer').stop();
			$('.navsubmenucontainer').animate({
					"margin-left":"-130px"
						},
					navmenuslidespeed,
					function(){
						$('#submenu_'+submenuId).removeClass('activemenu').css({zIndex:"1","display":"none"});
					}
			);
			$('#mainbody').stop();
			$('#mainbody').animate({
				"left":"0px"
					},
				navmenuslidespeed
			);

		}
	});
	$(document).on('mouseover','.navsubmenucontainer',function(){
		currentmainmenu.addClass('menuhovered');
		var submenuId = currentmainmenu.data('submenuId');
		if(submenuId == -1 || submenuId == undefined)
		{
			$('.navsubmenucontainer').stop();
			$('.navsubmenucontainer').animate({
				"margin-left":"-130px"
					},
				navmenuslidespeed,
				function(){
					$('.navsubmenucontainer>div.activemenu').css({"display":"none"}).removeClass('activemenu');
				}
			);
		}
		else
		{
			$('.navsubmenucontainer').stop();
			$('.navsubmenucontainer').animate({
				"margin-left":"0px"
					},
				navmenuslidespeed
			);
			$('#mainbody').stop();
			$('#mainbody').animate({
				"left":"130px"
					},
				navmenuslidespeed
			);

		}
	});
	$(document).on('mouseout','.navsubmenucontainer',function(){
		_this = $(this);
		$('#sidebar>ul#navmenu>li>a').removeClass('menuhovered');
		var submenuId = _this.data('submenuId');
		if(submenuId == -1 || submenuId == undefined)
		{
			$('.navsubmenucontainer').stop();
			$('.navsubmenucontainer').animate({
				"margin-left":"-130px"
					},
				navmenuslidespeed,
				function(){
					$('.navsubmenucontainer>div.activemenu').css({"display":"none"}).removeClass('activemenu');
				}
			);
			$('#mainbody').stop();
			$('#mainbody').animate({
				"left":"0px"
					},
				navmenuslidespeed
			);
		}
	});

/**** SLIDER SCRIPT END HERE **/


	

});



$(document).ready(function()
				
		{
		var i=0;
		var circle= 1; 
			var cars = [	"सच्ची व सीधी बात कहने वाला न बदले कोई रंग, न कोई वेश आपका सच्चा साथी सीमा सन्देश","ढाणी, गाँव या हो शहर, बिना डरे जो चले हर डगर, दे जो आपको ताजा खबर, आपका आधार, आपका प्यार,हमारी इच्छा,आपका सतकार","वक्त की चली आंधियाँ, आये कई तुफान..., ऊंचे आदर्शों से न हिला न कभी डरा... 64 सालों से सोने सा खरा, आपका अपना सीमा सन्देश",
"65 सालों का अटूट विश्वास, खबर दे सबकी आम हो या खास, जीवन के हर रंग में आपके पास, आपका अपना परखा हुआ साथ"];
			
			$("#header_slider").text(cars[i]);
			setInterval(settext, 12000);
		
		function settext()
		{
			console.log("settest")
			
			
			$("#header_slider").fadeOut(2000, function() {
			
   				
					if(i==4)
					{
						i=0;
					}
					else
					{
						i++;
					}
					$("#header_slider").text(cars[i]);
					$("#header_slider").fadeIn(2000);
    				
			});
		 	
		}
		});	