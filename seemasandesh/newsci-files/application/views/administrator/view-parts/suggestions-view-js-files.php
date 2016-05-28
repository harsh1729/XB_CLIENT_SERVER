<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<script>
	SUGGESTIONS_VIEW_NAMESPACE = {};
	SUGGESTIONS_VIEW_NAMESPACE.getMessageDomSting = function(contact,message,name,datetime){
		domString = '<div class="well well-sm">'+
				'<p style="color:/*#59a1ff*/#888;">'+message+'</p>'+
				'<hr style="margin-top:10px;margin-bottom:10px;border-color:#fff;">'+
				'<p style="color:#aaa;text-align:right;margin:0 0 0;"><span class="glyphicon glyphicon-user"></span> '+name+'</p>'+
				'<div class="row">'+
					'<div class="col-md-6">'+
						'<p style="color:#aaa;margin:0 0 0;"><span class="glyphicon glyphicon-time"></span> '+datetime+'</p>'+
					'</div>'+
					'<div class="col-md-6">'+
						'<p style="color:#aaa;text-align:right;margin:0 0 0;"><span class="glyphicon glyphicon-envelope"></span> '+contact+'</p>'+
					'</div>'+
				'</div>'+
			'</div>';
		return domString;
	};
	SUGGESTIONS_VIEW_NAMESPACE.loadMessage = function(){
		$.ajax({
				async:true,
				type:'POST',
				dataType:'json',
				//url:"<?=base_url('admin_requests/news/get_news')?>",
				url:xb_global_namespace.baseurl+"admin_requests/contactus/get_suggestions",
				data:{
						"domainname":xb_global_namespace.domainname,
						"lastmessageid":SUGGESTIONS_VIEW_NAMESPACE.lastnewsid
					},
				success:function(datarecieved,textStatus,jqXHR)
				{
					console.log(datarecieved);
					
					var data = datarecieved['data'];
					if(datarecieved.status == "login")
					{
						if(data.length)
						{
							SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.scrollEnable = true;
							if(data[data.length - 1]['id'] > 0){
								SUGGESTIONS_VIEW_NAMESPACE.lastnewsid = data[data.length - 1]['id'];
								console.log('lastnewsid is '+SUGGESTIONS_VIEW_NAMESPACE.lastnewsid);
							}
							else{
								console.log('id not found');
							}
							SUGGESTIONS_VIEW_NAMESPACE.offset = SUGGESTIONS_VIEW_NAMESPACE.offset + data.length;
							$.each(data,function(index,value){
								$( SUGGESTIONS_VIEW_NAMESPACE.getMessageDomSting( value["contact"],value["message"],value["name"],value['datetime']) ).hide().appendTo('#msgcontainer').fadeIn(1000);
							});
						}
						else
						{
							SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.scrollEnable = false;
						}
					}
					else if(datarecieved['status'] == 'notlogin')
					{
						$(location).attr('href',$(location).attr('href'));
					}
					SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = false;
					$('#infiniteloadingindicator').css('display','none');
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
                                         $("#loading_bar").css("display","none");
				}
			});
	}
	
	SUGGESTIONS_VIEW_NAMESPACE.lastnewsid = 0;
	SUGGESTIONS_VIEW_NAMESPACE.offset = 0;
	SUGGESTIONS_VIEW_NAMESPACE.limit = 2;
	SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll = {};
	SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.scrollEnable = false;	
	SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = false;	// is there any ongoing ajax request
	SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.loadBefore = 100; // load this much pixel before the scrollbar reaches to end!
	
	$(document).ready(function(){
		$('#loading_bar').css({"display":"none"});
		SUGGESTIONS_VIEW_NAMESPACE.loadMessage();
		
		$(window).scroll(function(event)
		{
			if(SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.scrollEnable && !SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.scrollBusy && $(document).height() - $(window).height() - SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.loadBefore <= $(window).scrollTop() )
			{
				$('#infiniteloadingindicator').css('display','block');
				SUGGESTIONS_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = true;
				SUGGESTIONS_VIEW_NAMESPACE.loadMessage();
			}
		});

	});
</script>