<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">All Advertisements</div>
			<div class="panel-body">
				<div class="row" id="allAdvtContainer">
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
    	<div class="well">
            <form id="advtForm">
        		<textarea class="form-control lang_class" id="advttxt" name="advttxt" rows='4' placeholder="Write text for advertisement here." style="resize:none;" required="required"></textarea>
                <input type="url" class="form-control" placeholder="Place website URL here." style="margin-top:10px;" name="weburl" pattern="https?://.+"/>
                <div class="dropzone text-center" id="mydropzone" action="<?=base_url('admin_requests/advt/upload_image');?>" style="margin-top:19px;background-color:#666;"></div>
                <input type="hidden" id="advtImage" name="advtImage"/>
                <div class="row" style="margin-top:19px;">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success btn-lg btn-block" id="saveAdvtBtn">
                        	<span class="glyphicon glyphicon-save"></span> Save Advertisement
                        </button>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Are you Sure ?
				</h4>
			</div>
			<div class="modal-body">
				This will delete Advertisement Permanently !
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
				<button type="button" class="btn btn-danger" id="DeleteAdvt" data-advtid="-1" >
					Delete
				</button>
			</div>
		</div>
	</div>
</div>