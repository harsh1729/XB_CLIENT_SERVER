		<?=$header?>
	</div>
</div>
<form id="public_message_form" action="">
<div class="container-fluid" style="padding-bottom:10px; background-color:#fff;">
	<div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">
		<div class="row" style="">
			<div class="col-md-3">
				<select class="form-control" id="select_public_message_type" required="required" style="margin-left:10px;">
				<option value="">---- Select Option ----</option>  
				<option value="1">शोक समाचार</option>
				<option value="2">बधाई सन्देश</option>
				</select>
	                </div>
	                <div class="col-md-6">
	                </div>
                	<div class="col-md-3 col-xs-12">
	                	<div class='input-group date' id='newsDatePicker' style="margin-right:10px;">
		                    <input type='text' class="form-control" required="required" name="datetime" id="datetime" value="" placeholder="Expiry date"/>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
	                	</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;">
	<div class="row" style="margin-top:50px;">
		<div class="col-md-7">
			<textarea style="height:310px;"  required="required" class="form-control lang_class" id="public_message_text"></textarea>
                        <input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
		</div>
		<div class="col-md-5">
			<div id="Qdropzone" class="question dropzone text-center form-control" action="<?=base_url('admin_requests/public_message/upload_image');?>" style="height:210px;width:100%; background-color:#aaaaaa;border:1px solid #666666;border-radius:10px;background-size:contain;">
            			<input type="hidden" id="public_message_image" name="public_message_image"></div>
		</div>
	</div>
	<div class="row" style="margin-top:50px;">
		<div class="col-md-5">
		</div>
		<div class="col-md-2">
			<button type="submit" id="public_message_submit_btn" class="btn btn-lg btn-success btn-block"><span class="glyphicon glyphicon-floppy-save" style="margin-right:3px;"></span>save</button>
		</div>
		<div class="col-md-5">
		</div>
	</div>
</form>	