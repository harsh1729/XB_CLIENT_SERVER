<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
	$(function(){

		var USER_NAMESPACE = {};
		USER_NAMESPACE.filter = "all";
		USER_NAMESPACE.getUserDomString = function(id,name,number,promo,datetime){
			var domString = '<div class="well well-sm">'+
								'<div class="row">'+
									'<div class="col-md-9">'+
										'<p style="margin-bottom:0px;">'+
											'<strong class="text-faded"><i>'+name+'</i></strong></strong>'+
											'<span style = "margin-left:30px"class="text-faded"><i class="fa fa-mobile"></i> Contact: <i>'+number+'</i>'+
											'<span style = "margin-left:30px" class="text-faded"><i class=""></i> Code: <i>'+promo+'</i></span>'+
											/*'<span class="pull-right text-faded">Customer No: <i>'+id+'</i></span>'+*/
										'</p>'+
										//'<p style="margin-bottom:0px;">'+
										//	'<span class="text-faded"><i class="fa fa-mobile"></i> Contact: <i>'+number+'</i></span>'+
										//'</p>'+
										
										//'<p style="margin-bottom:0px;">'+
										//	'<span class="text-faded"><i class=""></i> Code: <i>'+promo+'</i></span>'+
										//'</p>'+
										/*'<p style="margin-bottom:0px;">'+
											'<span class="text-faded"><i class="fa fa-globe"></i> : <i>'+businesscity.name+'</i></span>'+
										'</p>'+
										'<p style="margin-bottom:0px;">'+
											'<span class="text-faded"><i class="fa fa-star"></i> : <i>'+rating+'</i></span>'+
										'</p>'+*/
									'</div>'+
									
								'</div>'+
								
							'</div>';
		return domString;
		}


      

        

		USER_NAMESPACE.loadUsers = function(){
		
		var code = document.getElementById("code").value;
			console.log("code is "+code);
			$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					url:xb_global_namespace.baseurl+"admin_requests/gcm/getdata",
					data:{
					     "code":code
					},
					success:function(datarecieved,textStatus,jqXHR)
					{
						console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{
							//$('#loadMoreImagesContainer').css('display','none');
							data = datarecieved['data'];
							$('#merchantcontainer').empty();
							$.each(data, function(index, val) {
								//console.log(val);
							var promo = "";//= val.deviceid.substring(val.deviceid.length-6, val.deviceid.length);
							for(var i=0;i<val.deviceid.length;i++){
							  if(i%2==0){
							      var c = val.deviceid.charAt(i);
							      promo = promo+c;
							  }
						       }	$(USER_NAMESPACE.getUserDomString(val.id,val.name,val.number,promo,val.datetime)).hide().appendTo('#merchantcontainer').fadeIn('1000', function() {});
							});
							$('.bootstraptogglebtn').bootstrapToggle();

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

		
		

		USER_NAMESPACE.loadUsers();
		$('#find').on('click',function(e){
			//var _this = $(this);
			
			//$('#newsContainerColumn').empty();
			USER_NAMESPACE.loadUsers();

			});

	});
</script>