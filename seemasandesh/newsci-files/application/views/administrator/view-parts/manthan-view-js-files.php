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
		$('#manthanform').on('submit',function(event){
			_this = $(this);
			postData = _this.serializeArray();
			$('#loading_bar').css({'display':'inline'});
			$.ajax({
				url:xb_global_namespace.baseurl+'admin_requests/manthan/save_editorial',
				dataType:"json",
				async: true,
				type: 'POST',
				data:postData,
				success:function(datareceived,textStatus,jqXHR)
				{
					$('#loading_bar').css({'display':'none'});
					console.log(datareceived);
					if(datareceived['data'] > 0 )
					{
						$('#heading').val('');
						$('#content').val('');
						alert('Saved Successfully !');
					}
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					$('#loading_bar').css({'display':'none'});
					console.log(jqXHR,textStatus,errorThrown);
					alert(textStatus);
				}
			});
			event.preventDefault();
		});
	});
</script>