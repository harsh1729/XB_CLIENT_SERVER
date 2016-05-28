<?=$data;?>
</div>
		
<!--	<div id="convert_container" style="width:685px;position:absolute;z-index:2000;border:1px solid #00f;display:none;background-color:#ccc">
	 	<div class="row" style="height:250px;">
	 		<div class="col-md-12" style="height:100%;">
		 		<textarea class="form-control" id="chanakya_text" placeholder="paste the chanakya font here and click convert button" style="height:100%;width:100%;resize:none;"></textarea>	
		 	</div>
	 	</div>
	 	<div class="row">
	 		<div class="col-md-2">
	 		</div>
	 		<div class="col-md-3">
	 			<input type="button" class="btn btn-block btn-lg btn-info" value="convert" onClick="convert_to_unicode();" style="margin-top:10px;margin-bottom:10px;">
	 		</div>
	 		<div class="col-md-2">
	 		</div>
	 		<div class="col-md-3">
	 			<input type="button" class="btn btn-block btn-lg btn-info" value="cancel" onClick="convert_cencel();" style="margin-top:10px; margin-bottom:10px;">
	 		</div>
	 		<div class="col-md-2">
	 		</div>
	 	</div>
	 	
	 </div>-->



<div class="modal fade" id="copyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	   	<div class="modal-dialog">
	    	<div class="modal-content">
	        	<div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	                	&times;
	            	</button>
		           
	        	</div>
		        <div class="modal-body">
		        <textarea class="form-control lang_class" id="chanakya_text" placeholder="paste the chanakya font here and click convert button" style="height:200px;width:100%;resize:none;"></textarea>	
		        </div>
		        <div class="modal-footer">
		           	<button type="button" class="btn btn-default" data-dismiss="modal">
		            	Close
		            </button>
		            <button type="button" class="btn btn-danger"  onClick="convert_to_unicode();" data-newsId="-1" data-table="none" >
		               convert
		            </button>
		        </div>
	    	</div>
		</div>
	</div>





<div class="container-fluid">
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
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
<?=$js;?>
</body>
</html>