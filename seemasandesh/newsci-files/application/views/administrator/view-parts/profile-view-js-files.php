<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>

<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<script>

var user_data;
		$(document).ready(function(){
		$.ajax({
											async:true,
											type:'POST',
											dataType:'json',
											//url:"<?=base_url('admin_requests/news/get_news')?>",
											url:xb_global_namespace.baseurl+"admin_requests/user/get_user_info",
										       
                                                                                        success:function(datarecieved,textStatus,jqXHR)
											{
                                                                                                console.log(datarecieved);
                                                                                                  $("#name").html(datarecieved.name);
                                                                                                  $("#img_name").html(datarecieved.name);

                                                                                                  $("#username").html(datarecieved.username);
                                                                                                  $("#dateofbirth").html(datarecieved.dob);
                                                                                                   $("#user_email").html(datarecieved.email);
                                                                                                  $("#user_contact").html(datarecieved.contact);
                                                                                                    $("#user_address").html(datarecieved.address);
                                                                                                   $("#joined").html(datarecieved.name);
                                                                                                    
                                                                                                    $("#loading_bar").css("display","none");
												

												                
											},
											error:function(jqXHR,textStatus,errorThrown)
											{
 $("#loading_bar").css("display","none");
												console.log(jqXHR,textStatus,errorThrown);
											}
										});
	});
</script>