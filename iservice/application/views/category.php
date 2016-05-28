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
							<div class="btn btn-default pull-right" style="height:34px;margin-right:10px;" id='filter'><span class="glyphicon glyphicon-filter"></span></div>
							<div class="btn btn-default pull-right" style="height:34px;margin-right:10px;display:none;" id='addNewCancelBtn'>Cancel <span class="glyphicon glyphicon-remove"></span></div>
							<div class="btn btn-default pull-right" style="height:34px;margin-right:10px;" id='addNewBtn'>New <span class="glyphicon glyphicon-plus"></span></div>
							<div class="btn btn-success pull-right" style="height:34px;margin-right:10px;display:none;" id='saveSortBtn'>Save Sort Order <span class="glyphicon glyphicon-sort"></span></div>

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
					Add New Category<span class="glyphicon glyphicon-remove pull-right"></span>
				</div>
				<div class="panel-body">
					<form id="createCategoryForm">
					<div class="row">
						<div class="col-md-4" id="imageSelectorField">
							<div class="imageSelectBox" style="height:150px;border:1px solid #666;padding:2px;">
								<div style="background-color:#f3f3f3;height:100%;" class="text-center">
									<div class="btn btn-default" style="margin-top:58px;" data-imageid="" data-target="#imageChooserModal" data-toggle="modal">
									<span class="glyphicon glyphicon-picture"></span> Add Image
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
							<input type="hidden" name="imageid" id="imageid" value="">
						</div>
						<div class="col-md-8">
							<input type="text" name="categoryname" id="categoryname" value="" placeholder="Category Name" class="form-control" required="required">
							<div class="text-center" style="margin-top:82px;">
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
			
			<!-- <div class="well well-sm">
				<div class="row">
					<div class="col-md-4">
						<div style="width:100%;border:1px solid #fff;">
							<img src="http://lorempixel.com/300/200/" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">
						</div>
					</div>
					<div class="col-md-6">
						<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
						<h4>Doctors</h4>
						<hr>
						<b>Total categories : </b><i>542 categories</i>
						<br>
						<b>Total Users : </b><i>1673 Users</i>
						<br>
						<b>Total views : </b><i>3174 Views</i>
					</div>
					<div class="col-md-2 col-sm-2 col-sm-2">
						<div class="btn btn-default btn-block">
							<span class="glyphicon glyphicon-move"></span> Move
							<span class="badge">1</span>
						</div>
						<div class="btn btn-default btn-block">
							<span class="glyphicon glyphicon-pencil"></span> edit
						</div>
						<div class="btn btn-default btn-block">
							<span class="glyphicon glyphicon-remove"></span> Disable
						</div>
						<div class="btn btn-default btn-block">
							<span class="glyphicon glyphicon-eye-open"></span> View
						</div>
					</div>
				</div>
			</div> -->
			<!-- <div class="well well-sm" style="background-color:#d9534f;border-color:red;">
						<div class="row">
							<div class="col-md-4">
								<div style="width:100%;border:1px solid #fff;">
									<img src="http://lorempixel.com/400/200/" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">
								</div>
							</div>
							<div class="col-md-6">
								<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
								<h4>Educational Institutes</h4>
								<hr>
								<b>Total categories : </b><i>542 categories</i>
								<br>
								<b>Total Users : </b><i>1673 Users</i>
								<br>
								<b>Total views : </b><i>3174 Views</i>
							</div>
							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-move"></span> Move
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-pencil"></span> edit
								</div>
								<div class="btn btn-success btn-block">
									<span class="glyphicon glyphicon-ok"></span> Enable
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-eye-open"></span> View
								</div>
							</div>
						</div>
					</div>
					<div class="well well-sm">
						<div class="row">
							<div class="col-md-4">
								<div style="width:100%;border:1px solid #fff;">
									<img src="http://lorempixel.com/300/170/" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">
								</div>
							</div>
							<div class="col-md-6">
								<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
								<h4>Restaurent</h4>
								<hr>
								<b>Total categories : </b><i>542 categories</i>
								<br>
								<b>Total Users : </b><i>1673 Users</i>
								<br>
								<b>Total views : </b><i>3174 Views</i>
							</div>
							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-move"></span> Move
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-pencil"></span> edit
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-remove"></span> Disable
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-eye-open"></span> View
								</div>
							</div>
						</div>
					</div>
					<div class="well well-sm">
						<div class="row">
							<div class="col-md-4">
								<div style="width:100%;border:1px solid #fff;">
									<img src="http://lorempixel.com/300/180/" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">
								</div>
							</div>
							<div class="col-md-6">
								<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
								<h4>Free Lancers</h4>
								<hr>
								<b>Total categories : </b><i>542 categories</i>
								<br>
								<b>Total Users : </b><i>1673 Users</i>
								<br>
								<b>Total views : </b><i>3174 Views</i>
							</div>
							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-move"></span> Move
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-pencil"></span> edit
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-remove"></span> Disable
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-eye-open"></span> View
								</div>
							</div>
						</div>
					</div> -->

		</div>
	</div>

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



<!-- <!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<style type="text/css" media="screen">
			.panel,.well
			{
				border-radius: 0px;
			}
			.panel-heading
			{
				border-top-left-radius: 0px;
				border-top-right-radius: 0px;
			}
			body
			{
				margin-left:250px;
				padding:30px;
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					


					<div class="panel panel-success">
						<div class="panel-heading">Doctors <span class="glyphicon glyphicon-move pull-right" style="margin-left:6px;"></span><span class="glyphicon glyphicon-remove pull-right" style="margin-left:6px;"></span> <span class="glyphicon glyphicon-pencil pull-right" style="margin-left:6px;"></span></div>
						<div class="panel-content" style="padding:15px;">
							<div class="well well-sm">
								<div class="row">
									<div class="col-md-4">
										<div style="width:100%;border:1px solid #fff;">
											<img src="http://lorempixel.com/300/200/business" alt="Image not Available!" class="img-responsive center-block" style="height:200px;">
										</div>
									</div>
									<div class="col-md-6">
										<div style="height:200px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
										<h4>Hospitals</h4>
										<hr>
										<b>Total users : </b><i>542 Users</i>
										<br>
										<b>Payments pending : </b><i>13 Users</i>
										<br>
										<b>Total views : </b><i>1174 Views</i>
									</div>
									<div class="col-md-2 col-sm-2 col-sm-2">
										<div class="btn btn-default btn-block">
											<span class="glyphicon glyphicon-move"></span> Move
										</div>
										<div class="btn btn-default btn-block">
											<span class="glyphicon glyphicon-pencil"></span> edit
										</div>
										<div class="btn btn-default btn-block">
											<span class="glyphicon glyphicon-remove"></span> Disable
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>




					<h2><u>All Categories</u></h2>
					<div class="well well-sm">
						<div class="row">
							<div class="col-md-4">
								<div style="width:100%;border:1px solid #fff;">
									<img src="http://lorempixel.com/300/200/business" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">
								</div>
							</div>
							<div class="col-md-6">
								<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
								<h4>Doctors</h4>
								<hr>
								<b>Total categories : </b><i>542 categories</i>
								<br>
								<b>Total Users : </b><i>1673 Users</i>
								<br>
								<b>Total views : </b><i>3174 Views</i>
							</div>
							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-move"></span> Move
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-pencil"></span> edit
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-remove"></span> Disable
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-eye-open"></span> View
								</div>
							</div>
						</div>
					</div>
					<div class="well well-sm" style="background-color:#d9534f;border-color:red;">
						<div class="row">
							<div class="col-md-4">
								<div style="width:100%;border:1px solid #fff;">
									<img src="http://lorempixel.com/400/200/abstract" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">
								</div>
							</div>
							<div class="col-md-6">
								<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
								<h4>Educational Institutes</h4>
								<hr>
								<b>Total categories : </b><i>542 categories</i>
								<br>
								<b>Total Users : </b><i>1673 Users</i>
								<br>
								<b>Total views : </b><i>3174 Views</i>
							</div>
							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-move"></span> Move
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-pencil"></span> edit
								</div>
								<div class="btn btn-success btn-block">
									<span class="glyphicon glyphicon-ok"></span> Enable
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-eye-open"></span> View
								</div>
							</div>
						</div>
					</div>
					<div class="well well-sm">
						<div class="row">
							<div class="col-md-4">
								<div style="width:100%;border:1px solid #fff;">
									<img src="http://lorempixel.com/300/170/nightlife" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">
								</div>
							</div>
							<div class="col-md-6">
								<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
								<h4>Restaurent</h4>
								<hr>
								<b>Total categories : </b><i>542 categories</i>
								<br>
								<b>Total Users : </b><i>1673 Users</i>
								<br>
								<b>Total views : </b><i>3174 Views</i>
							</div>
							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-move"></span> Move
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-pencil"></span> edit
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-remove"></span> Disable
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-eye-open"></span> View
								</div>
							</div>
						</div>
					</div>
					<div class="well well-sm">
						<div class="row">
							<div class="col-md-4">
								<div style="width:100%;border:1px solid #fff;">
									<img src="http://lorempixel.com/300/180/fashion" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">
								</div>
							</div>
							<div class="col-md-6">
								<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
								<h4>Free Lancers</h4>
								<hr>
								<b>Total categories : </b><i>542 categories</i>
								<br>
								<b>Total Users : </b><i>1673 Users</i>
								<br>
								<b>Total views : </b><i>3174 Views</i>
							</div>
							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-move"></span> Move
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-pencil"></span> edit
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-remove"></span> Disable
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-eye-open"></span> View
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</body>
</html> -->