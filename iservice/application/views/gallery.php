<?=$header;?>
			<!-- <div id="loading_bar" style="height:700px;width:100%; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:none;">
				<img src="<?=base_url('docs/images/ajax-loader-blue.gif')?>" style="margin-top:18%; margin-left:45%;">
			</div> -->
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
							<div class="btn btn-default pull-right" style="height:34px;margin-right:10px;"><span class="glyphicon glyphicon-plus"></span> Add New</div>

						</div>
		            </div>
				</div>
			</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div style="background-color:#e3e3e3;min-height:200px;width:100%;border:2px solid #aaa;" id="main-dropzone" class="dropzone" action="<?=base_url('admin_requests/gallery/upload_image');?>">
				
			</div>
		</div>
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;margin-top:20px;">
	<div class="row galleryContainer" id="galleryContainer" >
		<?php foreach ($gallerydata as $key => $value): ?>
			<div class="col-md-2 col-sm-4 col-xs-6 galleryImgContainer" style="margin-bottom:15px;">
				<div class="galleryInnerColumnContainer">
					<div style="position:relative;background-color:#e3e3e3;">
						<img src="<?=$value['imageurl'];?>" alt="pic" class="center-cropped" style="height:150px;">
						<div style="" class="galleryImageName"><?=$value['imagename'];?></div>
					</div>
					<div class="galleryHR"></div>
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:1px;">
							<a href="<?=$value['imageurl'];?>" target="_blank" class="btn btn-default btn-block btn-xs" style="border-radius:0px;">
								<i class="fa fa-eye"></i> View
							</a>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:1px;">
							<div class="btn btn-danger btn-block btn-xs deleteImageBtn" style="border-radius:0px;" data-imageid="<?=$value['id'];?>" data-target="#customModal" data-toggle="modal">
								<i class="fa fa-remove"></i> Delete
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
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
		        	This will <code>permanently</code> delete this image.
		        </div>
		        <div class="modal-footer">
		           	<button type="button" class="btn btn-default" data-dismiss="modal">
		            	Close
		            </button>
		            <button type="button" class="btn btn-danger" id="DeleteImage" data-imageid="-1" >
		               Delete
		            </button>
		        </div>
	    	</div>
		</div>
	</div>