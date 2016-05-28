<script src="<?=base_url();?>plugins/dropzone/js/dropzone.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>

<script type="text/javascript" charset="utf-8">
	DROPZONE_DATA = {};
	DROPZONE_DATA.TotalImageFiles = 0;
	//DROPZONE_DATA.fileList = [];
	//DROPZONE_DATA.fileDeleteList = [];
	//DROPZONE_DATA.flagSubmit = 	false;
	DROPZONE_DATA._mainDropZone;


	DROPZONE_DATA.getImageDOM = function(imageurl,thumburl,imagename,imageid){
		var domString = '<div class="col-md-2 col-sm-4 col-xs-6 galleryImgContainer" style="margin-bottom:15px;">'+
							'<div class="galleryInnerColumnContainer">'+
								'<div style="position:relative;background-color:#e3e3e3;">'+
									'<img src="'+thumburl+'" alt="pic" class="center-cropped" style="height:150px;">'+
									'<div style="" class="galleryImageName">'+imagename+'</div>'+
								'</div>'+
								'<div class="galleryHR"></div>'+
								'<div class="row">'+
									'<div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:1px;">'+
										'<a href="'+imageurl+'" target="_blank" class="btn btn-default btn-block btn-xs" style="border-radius:0px;">'+
											'<i class="fa fa-eye"></i> View'+
										'</a>'+
									'</div>'+
									'<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:1px;">'+
										'<div class="btn btn-danger btn-block btn-xs deleteImageBtn" style="border-radius:0px;" data-imageid="'+imageid+'" data-target="#customModal" data-toggle="modal">'+
											'<i class="fa fa-remove"></i> Delete'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
		return domString;
	};
	
	$(function(){
		Dropzone.options.mainDropzone = {
			addRemoveLinks: true,
			parallelUploads: 1,
			acceptedFiles: 'image/*',// audio/*, video/*',
			thumbnailWidth: 250,
			thumbnailHeight: 200,
			//previewsContainer:"#DzPreviewContainer",
			//maxFiles: 1,
			init: function() {
				DROPZONE_DATA._mainDropZone = this;
				
				this.on("addedfile", function(file) {
						//console.log("addedFile:\n",file);
            		}); 
				this.on("thumbnail", function(file) {
						//console.log("thumbnail:\n",file);
				});
				this.on("success", function(files, response) {
						//console.log("success:\nfiles:",files,"\nresponse:\n",response);
						console.log($.parseJSON(response));
						var res = $.parseJSON(response);
						DROPZONE_DATA._mainDropZone.removeFile(files);
						$(DROPZONE_DATA.getImageDOM(res.imagedata.imageurl,res.imagedata.thumburl,res.imagedata.imagename,res.imagedata.id)).hide().prependTo('#galleryContainer').fadeIn('slow', function() {
							
						});
				});
				this.on("removedfile",function(file){
						//console.log("removeFile:\n",file);
				});
				this.on("maxfilesexceeded", function(file){
						//console.log("maxfilesexceeded:\n",file);
				});
			},					
		};


		$('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
					var _this = $(event.relatedTarget);
					var imageid = _this.data('imageid');
					console.log( imageid );
						
					var modal = $(this);
					modal.find('#DeleteImage').data("imageid",imageid);
				
		});

		$('#DeleteImage').on('click',function(){

			$('#customModal').modal('hide');
			var _this = $(this);
			var imageid = _this.data('imageid');
			$.ajax({
					type:'POST',
					async:true,
					dataType:"json",
					data:{
							"imageid":imageid,
						},
					url:xb_global_namespace.baseurl+"admin_requests/gallery/delete_image",
					success: function(datareceived, textStatus, jqXHR)
					{
						console.log(datareceived);
						//$('#customModal').modal('hide');

						if(datareceived['status'] == 'login')
						{
								//console.log('removing MAIN news!');
								delete_btn_this = $('div.btn.deleteImageBtn[data-imageid="'+imageid+'"]');
								//console.log("Delted node is:",delete_btn_this);
								//deleteselector = delete_btn_this.data("removeselector");
								delete_btn_this.parents('div.galleryImgContainer').fadeOut('slow', function() {
									$(this).remove();
								});
								//delete_btn_this.parents(deleteselector).slideUp(1000,function(){$(this).replaceWith('')});
						}
						else if(datareceived['status'] == 'notlogin')
						{
							$(location).attr('href',$(location).attr('href'));
						}
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						console.log(jqXHR , "\n" , textStatus , "\n" , errorThrown);
						$('#customModal').modal('hide');
					}
				});
		});	



	});
</script>	