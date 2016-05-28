<?=$header;?>

<div class="container-fluid" style="/*padding-bottom:10px;*/ background-color:#fff;">
                <div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">
					<div class="row" style="">

                          <!-- <div class="col-md-2 col-xs-12">

                          <select name="isbusiness" id="isbusiness" class="form-control" autofocus="autofocus" required>
						      <option value="-1">Choose Business Type</option>
						       <option value="1">Business</option>
						        <option value="0">Business Extra</option>
					        </select>

                          </div>

                         <div class="col-md-3 col-xs-12">
                             <select name="userselect" id="userselect" class="form-control" autofocus="autofocus">
						      <option value="0">Choose User</option>
						      <?php foreach ($user as $index => $row):?>
							   <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
						       <?php endforeach; ?>
					        </select>
 						</div>
		                <div class="col-md-3 col-xs-12">
                         <select name="catselect" id="catselect" class="form-control" autofocus="autofocus">
                         </select>
						      <!-- <option value="0">Choose Category</option>
						      <?php foreach ($category as $index => $row):?>
							   <option value="<?=$row['catid'];?>"><?=$row['name'];?></option>
						       <?php endforeach; ?>
					        </select> 
						</div> -->
						

						<div class="col-md-2 col-xs-12" style="margin-left:20px">
                        <!--  <select name="catselect" id="catselect" class="form-control" autofocus="autofocus"> -->
                        <select name="advtcityselectid" id="advtcityselectid" class="form-control" autofocus="autofocus" required>
						      
						      <!--<?php foreach ($category as $index => $row):?>
							   <option value="<?=$row['catid'];?>"><?=$row['name'];?></option>
						       <?php endforeach; ?>-->
						       <option value="0">Choose City</option>
						      	<?php foreach ($city as $index => $row):?>
								   <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
							       <?php endforeach; ?>

					        </select>
						</div>

		                <div class="col-md-2 ">
		                	<!-- <span><button type="button" class="imeboldbtn btn btn-sm btn-info" title="Bold" style="margin-left:10px;"><b>B</b></button></span>
							<span><button type="button" class="imeitalicbtn btn btn-sm btn-info" title="Italic"><i>I</i></button></span>
							<span><button type="button" class="imeunderlinebtn btn btn-sm btn-info" title="Underline"><u>U</u></button></span>
							<span><button type="button" class="imefontsizebtn btn btn-sm btn-info" title="Text size"><span class="glyphicon glyphicon-signal"></span></button></span>
							<span><button type="button" class="imelinkbtn btn btn-sm btn-info" title="Add Link">li</button></span> -->
                             
							<!-- <div class="btn btn-default pull-right" style="height:34px;margin-right:10px;" id='filter'><span class="glyphicon glyphicon-filter"></span></div> -->
							<div class="btn btn-default pull-right" style="height:34px;margin-right:10px;display:none;" id='addNewCancelBtn'>Cancel <span class="glyphicon glyphicon-remove"></span></div>
							<div class="btn btn-default pull-right" style="height:34px;margin-right:10px;" id='addNewBtn'>New <span class="glyphicon glyphicon-plus"></span></div>
							<!-- <div class="btn btn-success pull-right" style="height:34px;margin-right:10px;display:none;" id='saveSortBtn'>Save Sort Order <span class="glyphicon glyphicon-sort"></span></div> -->

						

						</div>
						
		            </div>
				</div>
			</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row" id="newCategoryMainContainer" style="display:none;">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					Add Epaper User<span class="glyphicon glyphicon-remove pull-right"></span>
				</div>
				<div class="panel-body">
					<form id="createCategoryForm">
					<div class="row">
						<div class="col-md-4" id="imageSelectorField">
							<div class="imageSelectBox" style="height:150px;border:1px solid #666;padding:2px;">
								<div style="background-color:#f3f3f3;height:100%;" class="text-center">
									<div class="btn btn-default" style="margin-top:58px;" data-imageid="" data-target="#imageChooserModal" data-toggle="modal">
									<span class="glyphicon glyphicon-picture"></span> Epaper Profile Image
									</div>
								</div>
							</div>
							<div class="imageSelectedBox" style="border:1px solid #666;padding:2px;display:none;">
								<div style="background-color:#f3f3f3;" class="text-center">
									<div style="position:relative;">
										<div style="width:100%;position:absolute;padding:4px;color:#fff;bottom:0px;">
											<div class="btn btn-danger" id="removeImgBtn"><span class="glyphicon glyphicon-remove"></span> Remove</div>
										</div>
										<img src="" alt="" style="height:150px;" class="img-responsive center-block">
									</div>
								</div>
							</div>
							<input type="hidden" name="image" id="imageid" value="">
						</div>
						<div class="col-md-8">
							<input type="text" name="name" id="name" value="" placeholder="Epaper name" class="form-control" style="margin-top:10px" required="required">
							<input type="text" name="address" id="address" value="" placeholder="address" class="form-control" style="margin-top:10px;height:50px" required="required">
							<input type="text" name="contact" id="contact" value="" placeholder="contact number" class="form-control" style="margin-top:10px" required="required">
							<input type="text" name="username" id="username" value="" placeholder="username" class="form-control" style="margin-top:10px" required="required">
							<input type="text" name="password" id="password" value="" placeholder="password" class="form-control"  style="margin-top:10px" required="required">
							<div class="text-center" style="margin-top:40px;">
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

<div class="container-fluid" style="">
	<div class="row">
		<div class="col-md-12">
			<div id="newsContainerColumn" style="overflow:auto;height:auto;border:1px solid #00aa00;padding:5px;">
				
			</div>
		</div>
	</div>
</div>



<!-- image chooser -->

<div class="modal fade" id="imageChooserModal" tabindex="-1" role="dialog" aria-labelledby="myimgModalLabel" aria-hidden="true">
	   	<div class="modal-dialog modal-lg">
	    	<div class="modal-content" style="border-bottom-left-radius:0px;border-radius:0px;">
	        	<div class="modal-header">
	            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	                	&times;
	            	</button>
		            <h4 class="modal-title" id="myimgModalLabel">
		               Image Chooser
		            </h4>
	        	</div>
		        <div class="modal-body" style="height:75vh;overflow:auto;" id="galleryScrollView">
		        	<div class="row galleryContainer" id="galleryContainer">
		        	<?php for($i=0;$i>0;$i--): ?>
		        		<div class="col-md-2 col-sm-2 col-xs-2 galleryImgContainer">
		        			<div style="padding:2px;border:1px solid #aaa;">
		        				<img src="http://localhost/iservice/publicuploads/2015/11/thumb_14488655351448865663.jpeg" alt="image" style="height:80px;" class="center-cropped">
		        				<div class="galleryHR"></div>
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:1px;">
										<a href="#" target="_blank" class="btn btn-default btn-block btn-xs" style="border-radius:0px;">
											<i class="fa fa-eye"></i> View
										</a>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:1px;">
										<div class="btn btn-success btn-block btn-xs deleteImageBtn" style="border-radius:0px;" data-imageid="" data-target="#customModal" data-toggle="modal">
											<i class="fa fa-check"></i> Add
										</div>
									</div>
								</div>
		        			</div>
		        		</div>
		        	<?php endfor; ?>
		        	</div>
		        	<div class="row" style="display:none;" id="loadMoreImagesContainer" >
		        		<div class="col-md-12">
		        			<div style="width:100%;border:1px solid #aaa;padding:2px;">
		        				<div style="width:100%;background-color:#e3e3e3;padding:10px;" class="text-center">
		        					<div>
		        						<i class="fa fa-circle-o-notch fa-spin"></i> 
		        						Loading ...
		        					</div>
		        				</div>
		        			</div>
		        		</div>
		        	</div>
		        </div>
		        <div class="modal-footer">
		           	<!-- <button type="button" class="btn btn-default" data-dismiss="modal">
		            	Close
		            </button>
		            <button type="button" class="btn btn-danger" id="DeleteImage" data-imageid="-1" >
		               Delete
		            </button> -->
		        </div>
	    	</div>
		</div>
	</div>
