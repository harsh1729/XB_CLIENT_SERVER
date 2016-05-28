<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
	$(function(){


           $('#passwordreset').on('submit',function(event) {
			event.preventDefault();
			var _this = $(this);
			var postData = _this.serializeArray();
			console.log(postData);
				//$('#loadingscreen').css({"display": 'block'});
				$.ajax({                
						async:true,
						type:'POST',
						dataType:'json',
						//url:"<?=base_url('admin_requests/news/get_news')?>",
						url:xb_global_namespace.baseurl+"admin_requests/user/reset",
						data:postData,
						success:function(datarecieved,textStatus,jqXHR)
						{
							console.log(datarecieved);
							if(datarecieved['success'] == '1')
							{
								alert("success");
								$('#username').val('');
								$('#nwpassword').val('');
							}
							else if(datarecieved['success'] == '0'){
								alert("Failed! Username did not match");
							}
							else if(datarecieved['status'] == 'notlogin')
							{
								$(location).attr('href',$(location).attr('href'));
							}
						},
						error:function(jqXHR,textStatus,errorThrown)
						{
							//$("#loading_bar").css("display","none");	
							console.log(jqXHR,textStatus,errorThrown);
						}
					});
			
		});



		});
</script>