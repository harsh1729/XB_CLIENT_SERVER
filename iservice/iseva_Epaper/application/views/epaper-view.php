		<?=$header;?>


           <div id="saving_bar" style="height:700px;width:100%; background-color:rgba(102,102,102,.9); z-index:1100; position:fixed; display:none;">
            	<h4 class="text-center" style="margin-top:20px;color:#eee;">Creating Epaper Files... Please wait!!! ...</h4>
            	<div class="progress" style="width:50vw;margin:0 auto;margin-top:60px;">
					<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:1%"></div>
				</div>
				<!--<img src="<?=base_url('newspaper1/images/ajax-loader.gif');?>" style="margin-top:18%; margin-left:45%;">-->
            </div>
            

			<div class="container-fluid" style="padding-bottom:10px; background-color:#fff;">

                  <div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">

			<div class="row" style="">

				<div class="col-md-3 col-xs-12">

					<div class="form-group">

                       	<label class="col-sm-2 visible-xs visible-sm control-label" style="color:#FFF;margin-top:7px;">

                           	Category: 

						</label>

					</div>

                </div>

                <div class="col-md-6">

                </div>

                <div class="col-md-3 col-xs-12">

	                <div class='input-group date' id='newsDatePicker' style="margin-right:10px;">

	                    <input type='text' class="form-control" required="required" name="datetime" id="datetime" value=""/>

	                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>

	                    </span>

	                </div>

				</div>

            </div>

		</div>

	</div>

</div>

</div>

<div class="container-fluid" style="min-height:89vh;">

	<div class="row" style="margin-top:10px;">

		<div class="col-md-7" style="max-height:450px;min-height:300px;overflow-y:auto;" id="today_epapers_container">

			
		</div>

		<div class="col-md-5" id="dropzoneContainer">

<!--			<div id="main-dropzone" class="dropzone text-center" action="<?=base_url('admin_requests/epaper/upload_pdf');?>" style=" background-color:#aaaaaa;border:1px solid #666666;border-radius:10px;"></div>

			<input type="hidden" id="pdffile">
-->
				

			<div id="actions" class="row">
				<div class="col-lg-12">
        		<!-- The fileinput-button span is used to style the file input field as button -->
        			<span class="btn btn-success fileinput-button">
            			<i class="glyphicon glyphicon-plus"></i>
            			<span>Add files...</span>
        			</span>
        			<button type="submit" class="btn btn-primary start">
            			<i class="glyphicon glyphicon-upload"></i>
            			<span>Start upload</span>
        			</button>
        			<button type="reset" class="btn btn-warning cancel">
            			<i class="glyphicon glyphicon-ban-circle"></i>
            			<span>Cancel upload</span>
        			</button>
      			</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
			        <!-- The global file processing state -->
			        <span class="fileupload-process">
						<div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
							<div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
						</div>
			        </span>
				</div>
			</div>
		<!-- HTML heavily inspired by http://blueimp.github.io/jQuery-File-Upload/ -->
		<div class="table table-striped" class="files" id="previews">
		  <div id="template" class="file-row">
		    <!-- This is used as the file preview template -->
		    <div>
		        <span class="preview"><img data-dz-thumbnail /></span>
		    </div>
		    <div>
		        <p class="name" data-dz-name></p>
		        <strong class="error text-danger" data-dz-errormessage></strong>
		    </div>
		    <div>
		    	<p class="totalpages"></p>
		    </div>
		    <div>
		        <p class="size" data-dz-size></p>
		        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
		          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
		        </div>
		    </div>
		    <div>
		      <button class="btn btn-primary start">
		          <i class="glyphicon glyphicon-upload"></i>
		          <span>Start</span>
		      </button>
		      <button data-dz-remove class="btn btn-warning cancel">
		          <i class="glyphicon glyphicon-ban-circle"></i>
		          <span>Cancel</span>
		      </button>
		      <button data-dz-remove class="btn btn-danger delete">
		        <i class="glyphicon glyphicon-trash"></i>
		        <span>Delete</span>
		      </button>
		    </div>
		  </div>
		 
		</div>




			<div class="btn btn-success btn-block disabled" id="saveBtn"><span class="glyphicon glyphicon-floppy-disk"></span> Save</div>

		</div>

	</div>

	<input type="hidden" class="lang_class" />

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

		        	This will delete Epaper forever !

		        </div>

		        <div class="modal-footer">

		           	<button type="button" class="btn btn-default" data-dismiss="modal">

		            	Close

		            </button>

		            <button type="button" class="btn btn-danger" id="DeleteEpaper" data-epaperid="-1">

		               Delete

		            </button>

		        </div>

	    	</div>

		</div>

	</div>