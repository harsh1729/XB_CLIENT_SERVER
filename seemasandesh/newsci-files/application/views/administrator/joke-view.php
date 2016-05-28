<?=$header;?>
	</div>
</div>
<div id="loading_bar" style="height:700px;width:100%; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:block;">
				<img src="<?=base_url('admin_docs/images/ajax-loader-blue.gif');?>" style="margin-top:18%; margin-left:45%;">
            </div>
            
            <div class="container-fluid" style="background-color:#fff;min-height:89vh;">
    		<div class="row">
        		<div class="col-md-7">
            			<textarea id="joke_text" class="lang_class form-control" rows="5"  placeholder="enter text hare..." name="joke_text" style=""></textarea>
            			<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
            		</div>
            		<div class="col-md-5">
            			<div id="Qdropzone" class="question dropzone text-center " action="<?=base_url('admin_requests/joke/upload_image');?>" style="height:210px;width:100%; background-color:#aaaaaa;border:1px solid #666666;border-radius:10px;background-size:contain;">
            			<input type="hidden" id="joke_image" name="joke_image">
            		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-5">
        		
        		</div>
        		<div class="col-md-2">
        			<input type="submit" class="btn btn-lg btn-success btn-block" value="save" id="joke_submit_btn">
        		</div>
        		<div class="col-md-5">
        		
        		</div>
        	</div>
        	
    	</div>