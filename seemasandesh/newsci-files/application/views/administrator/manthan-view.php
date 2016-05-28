 		<?=$header;?>
 		<div id="loading_bar" style="height:700px;width:100%; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:block;">
			<img src="<?=base_url('admin_docs/images/ajax-loader-blue.gif');?>" style="margin-top:18%; margin-left:45%;">
		</div>
	</div>
</div>
<div class="container-fluid" style="padding-bottom:10px; background-color:#fff;">
	<div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">
		<div class="row" style="">
	                <div class="col-md-9">
	                </div>
                	<div class="col-md-3 col-xs-12">
	                	<div class='input-group date' id='newsDatePicker' style="margin-right:10px;">
		                    <input type='text' class="form-control" required="required" name="datetime" id="datetime" value="" form="manthanform"/>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
	                	</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;">
	<form method="post" id="manthanform">
		<div class="row" style="margin-bottom:15px;">
			<div class="col-md-12">
				<input type="text" class="form-control lang_class" placeholder="heading" name="heading" id="heading"/>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
			
		</div>
		<div class="row" style="margin-bottom:15px;">
			<div class="col-md-12">
				<textarea class="form-control lang_class" rows="10" placeholder="Main Content" style="resize:none;" required="required" name="content" id="content"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-success btn-block">
					<span class="glyphicon glyphicon-save"></span> Save
				</button>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</form>