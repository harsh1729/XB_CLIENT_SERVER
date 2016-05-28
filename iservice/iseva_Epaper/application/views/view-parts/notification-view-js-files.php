<script src="<?=base_url();?>plugins/dropzone/js/dropzone.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>
<script>
	$(document).ready(function(){ 
		$("#notification_submit_form").on("submit",function(event){
            var heading =$('#notification_heading').val();
            var content =$('#notification_content').val();
            var cityid=$('#cityselect').val();
            console.log(heading);
            console.log(content);
            console.log(cityid);
            if(cityid==0)
            {
            		alert("Choose City First");
            }
            else
            {
	            $.ajax({
						type:'POST',
						async:true,
						dataType:'json',
						//url:"<?=base_url('admin_requests/news/get_news')?>",
						url:xb_global_namespace.baseurl+"admin_requests/gcm/send_notification",
						data:{
								"heading":heading,
								"content":content,
								"cityid":cityid
						},
						success:function(datareceived,textStatus,jqXHR)
						{
							console.log(datareceived);
							if(datareceived['status'] == 'login')
							{
								console.log(datareceived);
								alert("success"); 
								$('#notification_heading').val("");
								$('#notification_content').val("");
							}
	                        else
	                        {
	                            alert("not success");
	                        }
							/*else if(datareceived['status'] == 'notlogin')
							{
								$(location).attr('href',$(location).attr('href'));
							}*/
						},
						error:function(jqXHR,textStatus,errorThrown)
						{
							console.log(jqXHR,textStatus,errorThrown);
						}
					});
	        }
					event.preventDefault();
			
		});
	});
</script>