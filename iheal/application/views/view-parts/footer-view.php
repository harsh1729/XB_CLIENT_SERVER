<?=$data;?>
</div>

<div class="container-fluid">
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<input type="hidden" class="lang_class" />
			<div style="background-color:#999;width:100%;height:1px;"></div>
			<div class="pull-left">&copy; Copyright 2015</div>
			<div class="pull-right">Designed by Xerces Blue</div>
		</div>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.0/jquery.nicescroll.min.js"></script>
<script>
	$(document).ready(function(){
		
		try{
			$(".left-navigation-content-container").niceScroll({
				touchbehavior : true,
				cursorwidth : '8',
				bouncescroll : true
			});
		}
		catch(err){}
		
		$('a.dropdown-toggle-keep-open').on('click',function(e){
			$(this).parent().toggleClass('open');
			});
			$('body,html,div').on('click', function (e) 
			{
				if (!$('li.dropdown.keep-open').is(e.target) && $('li.dropdown.keep-open').has(e.target).length === 0 && $('.open').has(e.target).length === 0) 
				{
					$('li.dropdown.keep-open').removeClass('open');
				}
			});
	});
</script>
<!--********** loading IME methods ***************-->
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<!--************ IME loading end *****************-->
<?=$js;?>
</body>
</html>