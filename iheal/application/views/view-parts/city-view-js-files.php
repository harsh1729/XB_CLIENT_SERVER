<script type="text/javascript" src="<?=base_url();?>js/xerces_globals.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#newcityform').on('submit',function(event){
			var _this = $(this);

			event.preventDefault();
			var postData = $(this).serializeArray();
			console.log(postData);

			$.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:xb_global_namespace.baseurl+"admin_requests/city/insertCity",
				data:postData,
				success:function(datareceived,textStatus,jqXHR)
				{
					console.log(datareceived);
					if(datareceived['status'] == 'login')
					{
						_this.find('input').not('input[type="submit"]').val('');
						_this.find('select').prop('selectedIndex',0);

						$('html, body').animate({
									scrollTop: $("body").offset().top
								}, 1000);
					}
					else if(datareceived['status'] == 'notlogin')
					{$(location).attr('href',$(location).attr('href'));}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
				}
			});

		});

	});
</script>