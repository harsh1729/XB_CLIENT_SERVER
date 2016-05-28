<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<script src="<?=base_url();?>plugins/dropzone/js/dropzone.js"></script>
<!--********** loading IME methods ***************-->
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<!--************ IME loading end *****************-->
<script>
	$(document).ready(function(){
		$('#loading_bar').css({'display':'none'});
		$('#newsDatePicker').datepicker({
			autoclose: true,
			todayBtn: "linked",
			todayHighlight: true,
			format : "dd-mm-yyyy",
		}).on('changeDate',function(){});
		
	});
	
	
	
          $('#rivernrates_form').on('submit',function(event){
          		
			
			
			$('#loading_bar').css('display', 'block');
				$.ajax({
					url:xb_global_namespace.baseurl+'admin_requests/rivernrates/save_rivernrates',
					dataType:"json",
					async: true,
					type: 'POST',
					data: {
							
							"rivernrates_heading":$('#rivernrates_heading').val(),
							"rivernrates_content":$('#rivernrates_content').val(),
							"datetime":$('#datetime').val(),
							"type":$('#select_rivernrates_type').val()
							},
					success:function(datarecieved,textStatus,jqXHR)
					{
						$('#loading_bar').css('display', 'none');
						//console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{
							form_submit = true;
							 $('#rivernrates_heading').val("");
							 $('#rivernrates_content').val("");
							 $('#datetime').val("");
							 $('#select_rivernrates_type').val("");
							alert("save successfull");
							
						}
						else if(datarecieved['status'] == 'notlogin')
						{$(location).attr('href',$(location).attr('href'));}
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						$('#loading_bar').css('display', 'none');
						alert("Not Saved !!!");
						console.log("file not Remove!!",jqXHR,textStatus,errorThrown);
					}								
				});
			event.preventDefault();
		});

          
$(document).ready(function() {
		$('#loading_bar').css('display', 'none');
		});
</script>