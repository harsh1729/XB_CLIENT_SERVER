<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>plugins/dropzone/js/dropzone.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<script>
	$(document).ready(function(){ 
		$("#notification_submit_form").on("submit",function(event){
            var heading =$('#notification_heading').val();
            var content =$('#notification_content').val();
            console.log(heading);
            console.log(content);
            $.ajax({
					type:'POST',
					async:true,
					dataType:'json',
					//url:"<?=base_url('admin_requests/news/get_news')?>",
					url:xb_global_namespace.baseurl+"admin_requests/gcm/send_notification",
					data:{
							"heading":heading,
							"content":content
					},
					success:function(datareceived,textStatus,jqXHR)
					{
						if(datareceived['status'] == 'login')
						{
							console.log(datareceived);
							alert("success"); 
							$('#notification_heading').val("");
							$('#notification_content').val("");
						}
						else if(datareceived['status'] == 'notlogin')
						{
							$(location).attr('href',$(location).attr('href'));
						}
					},
					error:function(jqXHR,textStatus,errorThrown)
					{
						console.log(jqXHR,textStatus,errorThrown);
					}
				});
		event.preventDefault();
		});
	});
</script>