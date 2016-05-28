<?=$header;?>
			<div id="loadingscreen" style="height:700px;width:100%; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:none;">
				<img src="<?=base_url('docs/images/ajax-loader-blue.gif')?>" style="margin-top:18%; margin-left:45%;">
			</div>
			<div class="container-fluid" style="/*padding-bottom:10px;*/ background-color:#fff;">
                <div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">
					<div class="row" style="">
		                <div class="col-md-4 hidden-xs">
		                	<span><button type="button" class="imeboldbtn btn btn-sm btn-info" title="Bold" style="margin-left:10px;"><b>B</b></button></span>
							<span><button type="button" class="imeitalicbtn btn btn-sm btn-info" title="Italic"><i>I</i></button></span>
							<span><button type="button" class="imeunderlinebtn btn btn-sm btn-info" title="Underline"><u>U</u></button></span>
							<span><button type="button" class="imefontsizebtn btn btn-sm btn-info" title="Text size"><span class="glyphicon glyphicon-signal"></span></button></span>
							<span><button type="button" class="imelinkbtn btn btn-sm btn-info" title="Add Link">li</button></span>
						</div>
						<div class="col-md-3 col-xs-12">
						</div>
		                <div class="col-md-5 col-xs-12">
							<div class="btn btn-default pull-right" style="height:34px;margin-right:10px;" id='addNewCity'>
								New 
								<span class="glyphicon glyphicon-plus"></span>
							</div>
							<div class="btn btn-default pull-right" style="height:34px;margin-right:10px;display:none;" id='cancelNewCity'>
								Cancel 
								<span class="glyphicon glyphicon-remove"></span>
							</div>

						</div>
		            </div>
				</div>
			</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row" style="display:none;" id="newCityMainContainer">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					Add New City<span class="glyphicon glyphicon-remove pull-right"></span>
				</div>
				<div class="panel-body">
					<form id="newCityForm">
					<div class="row">
						<div class="col-md-4 col-md-offset-2">
							<input type="text" name="cityname" id="cityname" value="" placeholder="City Name" class="form-control" required="required">
						</div>
						<div class="col-md-4">
							<input type="number" name="pincode" id="pincode" value="" placeholder="Pincode" class="form-control" required="required">
							<div class="text-center" style="margin-top:42px;">
								<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save"></span> Save</button>
							</div>
						</div>	
					</div>
					</form>
				</div>
			</div>
			<hr>
		</div>	
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;margin-top:20px;">
	<div class="row" id="mainContainer">
	<?php for($i=0;$i<0;$i++): ?>
		<div class="col-md-4">
			<div class="well well-sm text-center">
				<strong>Sri Ganganagar</strong><br>
				335001
			</div>
		</div>
	<?php endfor; ?>
	</div>