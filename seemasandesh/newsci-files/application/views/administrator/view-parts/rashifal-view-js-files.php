<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
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
	$('#rashifal_form').on('submit',function(event){
		_this = $(this);
		var postData = _this.serializeArray();
		$('#loading_bar').css({'display':'inline'});
		console.log(postData);
		$.ajax({
			async:true,
			type:'POST',
			dataType:'json',
			url:xb_global_namespace.baseurl+"admin_requests/rashifal/save_rashifal",
			data:postData,
			success:function(datarecieved,textStatus,jqXHR)
			{
				console.log(datarecieved);
				$('#loading_bar').css({'display':'none'});
				if(datarecieved['status'] == 'login')
				{
					_this.find('input,textarea').val('');
				}
				else if(datarecieved['status'] == 'notlogin')
				{$(location).attr('href',$(location).attr('href'));}
			},
			error:function(jqXHR,textStatus,errorThrown)
			{
				$('#loading_bar').css({'display':'none'});
				console.log(jqXHR,textStatus,errorThrown);
			}
		});
		event.preventDefault();
	});
</script>