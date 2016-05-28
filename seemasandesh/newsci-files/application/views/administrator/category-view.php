 		<?=$header;?>
	</div>
</div>
<div id="loading_bar" style="height:700px;width:100%; margin-top:-10px; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:;">
		<img src="<?=base_url('admin_docs/images/ajax-loader-blue.gif');?>" style="margin-top:18%; margin-left:45%;">
</div>
<div class="container-fluid" style="min-height:89vh;">
	<div class="row">
    	<div class="col-md-12">
            <div class="panel panel-info" >
                <div class="panel-heading" id="all_category_heading">
                    <span class="glyphicon glyphicon-sort"></span> View All Categories
                </div>
                <div class="panel-body" id="all_category_container" style="display:none;">
                </div>
            </div>
		</div>
    </div>
    <div class="row" >
	    <form role="form" action="<?=base_url('admin_requests/category/save_category');?>" id="saveNewCatForm">
		    <div class="col-lg-7 col-md-7">
			    <div class="row" style="margin-top:30px;">
                	<div class="col-md-12">
                        <select class="form-control" name='parentcatid' id='parentcatid' required>
                            <option value="">Choose any Parent Category </option>
                            <option value='0'>No Parent --- 0 ---</option>
                            <?php
                                foreach ($categories as $category) 
                                {
                                    echo "<option value='".$category['id']."'>".$category['name']."</option>";
                                }
                            ?>
                        </select>
                    </div>
			    </div>
			    <div class="row" style="margin-top:15px;">
                	<div class="col-md-12">
					    <input type="text" name='catname' id='catname' class="form-control lang_class" placeholder="Enter New Category" />
                    </div>
			    </div>
			    <div class="row" style="margin-top:30px;">
				    <div class="col-lg-4 col-md-4">
				    </div>
				    <div class="col-lg-4 col-md-4">
					    <button type="submit" required="required" class="btn btn-block btn-success btn-lg "><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
				    </div>
				    <div class="col-lg-4 col-md-4">
				    </div>
			    </div>
		    </div>
		    <div class="col-lg-5 col-md-5">
			    <div id="my-dropzone" class="dropzone text-center" action="<?=base_url('admin_requests/category/upload_image');?>" style=" background-color:#aaaaaa;border:1px solid #666666;border-radius:10px;"></div>
				<input type='hidden' name='image' id='image' value='' />
		    </div>
	    </form>
    </div>

 <div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="customModalLabel">
               Are you Sure ?
            </h4>
         </div>
         <div class="modal-body">
            This will delete the category !
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Close
            </button>
            <button type="button" class="btn btn-danger" id="DeleteCategory" data-catId="-1" >
               Delete
            </button>
         </div>
      </div>
   </div>
</div>   
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="editModalLabel">
               Edit Category
            </h4>
         </div>
         <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" id="catNameInput" class="form-control lang_class" placeholder="Enter Category"/>
                </div>
            </div>
            <div class="row" style="margin-top:7px;">
                <div class="col-md-12">
                    <div id="edit-dropzone" class="dropzone text-center" action="<?=base_url('admin_requests/category/upload_image');?>" style="background-color:#aaaaaa;border:1px solid #666666;border-radius:10px;"></div>
                    <input type="hidden" id="editImage"/>
                </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Close
            </button>
            <button type="button" class="btn btn-success" id="updateCategory" data-catId="-1" >
              <span class="glyphicon glyphicon-floppy-disk"></span> Update
            </button>
         </div>
      </div>
   </div>
</div>