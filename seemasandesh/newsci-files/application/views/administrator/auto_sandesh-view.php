		<?=$header;?>
	</div>
</div>
<form id="auto_sandesh_form" action="">
<div class="container-fluid" style="min-height:89vh;">
	<div class="row" style="margin-top:50px;">
		<div class="col-md-7">
			<textarea style="height:310px;" required="required" class="form-control lang_class" id="auto_sandesh_text" placeholder="enter the text..."></textarea>
			<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
		</div>
		<div class="col-md-5">
			<div id="Qdropzone" class="question dropzone text-center form-control" action="<?=base_url('admin_requests/auto_sandesh/upload_image');?>" style="height:210px;width:100%; background-color:#aaaaaa;border:1px solid #666666;border-radius:10px;background-size:contain;">
            			<input type="hidden" id="auto_sandesh_image" name="auto_sandesh_image"></div>
		</div>
	</div>
	<div class="row" style="margin-top:50px;">
		<div class="col-md-5">
		</div>
		<div class="col-md-2">
			<button type="submit" id="auto_sandesh_submit_btn" class="btn btn-lg btn-success btn-block"><span class="glyphicon glyphicon-floppy-save" style="margin-right:3px;"></span>save</button>
		</div>
		<div class="col-md-5">
		</div>
	</div>
	</form>