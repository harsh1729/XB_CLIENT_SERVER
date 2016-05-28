<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(function(){

		var CITY_NAMESPACE = {};

		CITY_NAMESPACE.getCityDom = function(id,name,pincode)
		{
			var domString = '<div class="col-md-4 col-sm-6 col-xs-12">'+
								'<div class="well well-sm text-center">'+
									'<strong>'+name+'</strong><br>'+pincode+
								'</div>'+
							'</div>';
			return domString;
		}
		CITY_NAMESPACE.loadCities = function(){

			$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					url:xb_global_namespace.baseurl+"admin_requests/city/get",
					//data:postData,
					success:function(datarecieved,textStatus,jqXHR)
					{
						console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{
							$('#loadingscreen').css('display','none');
							data = datarecieved['data'];
							/*$.each(data, function(index, val) {
								IMAGE_CHOOSER.lastimageid = val.id;
								$(IMAGE_CHOOSER.getImageChooserDomString(val.imageurl,val.thumburl,val.imagename,val.id)).hide().appendTo('#galleryContainer').fadeIn('1000', function() {});
							});*/
							$("#mainContainer").empty();
							CITY_NAMESPACE.createCityViews(data);
						}
						else if(datarecieved['status'] == 'notlogin')
						{
							$(location).attr('href',$(location).attr('href'));
						}
					},
					error:function(jqXHR,textStatus,errorThrown)
					{
						$("#loading_bar").css("display","none");	
						console.log(jqXHR,textStatus,errorThrown);
					}
				});
		}
		CITY_NAMESPACE.createCityViews = function(data){
			$.each(data, function(index, value)
			{
				$(CITY_NAMESPACE.getCityDom(value.id,value.name,value.pincode)).appendTo('#mainContainer');
			});
		};
		CITY_NAMESPACE.loadCities();

		$('#addNewCity').on('click', function(event)
		{
			$(this).hide();
			$('#cancelNewCity').show();
			$('#newCityMainContainer').slideDown({duration:300,easing:"easeInQuart"}).slideDown('300', function() {
			});
		});
		$('#cancelNewCity').on('click', function(event)
		{
			$(this).hide();
			$('#addNewCity').show();
			$('#newCityMainContainer').slideUp({duration:300,easing:"easeInQuart"}).slideUp('300',function(){
			});
		});
		$('#newCityForm').on('submit', function(event)
		{
			event.preventDefault();
			var _this = $(this);
			var postData = _this.serializeArray();
			console.log(postData);
			$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					url:xb_global_namespace.baseurl+"admin_requests/city/add",
					data:postData,
					success:function(datarecieved,textStatus,jqXHR)
					{
						console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{
							$('#loadingscreen').css('display','none');
							if(datarecieved['cityid']>0)
							{
								data = datarecieved['data'];
								$('#cityname').val('');
								$('#pincode').val('');
								CITY_NAMESPACE.createCityViews(data);
								$('#cityname').focus();
								/*$.each(data, function(index, val) {
									IMAGE_CHOOSER.lastimageid = val.id;
									$(IMAGE_CHOOSER.getImageChooserDomString(val.imageurl,val.thumburl,val.imagename,val.id)).hide().appendTo('#galleryContainer').fadeIn('1000', function() {});
								});*/
							}
							else
							{
								alert("Fields already exists, Please first change values!");
							}
						}
						else if(datarecieved['status'] == 'notlogin')
						{
							$(location).attr('href',$(location).attr('href'));
						}
					},
					error:function(jqXHR,textStatus,errorThrown)
					{
						$("#loading_bar").css("display","none");	
						console.log(jqXHR,textStatus,errorThrown);
					}
				});
		});
	});
</script>