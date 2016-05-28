<script type="text/javascript" src="<?=base_url();?>js/xerces_globals.js"></script>
<script src="<?=base_url();?>plugins/dropzone/js/dropzone.js"></script>
<script type="text/javascript">
	var formSubmitFlag = false;
	function makedom(advts)
	{
		var dom_String = "";
		$.each(advts,function(ind,val){
			dom_String += '<div class="col-md-3">'+
					'<div class="well well-sm">'+
						'<a href="'+val.image+'" target="_blank">'+
							'<img src="'+val.image+'" style="height:160px;" class="center-cropped"/>'+
						'</a>'+
						'<div style="height:2.85714286em;overflow:hidden;margin-bottom:8px;">'+val.txt+'</div>'+
						'<div class="btn btn-danger btn-block btn-delete-advt" data-advtid="'+val.id+'" data-target="#customModal" data-toggle="modal"><span class="glyphicon glyphicon-remove-circle"></span> Delete</div>'+
					'</div>'+
				'</div>';
		});
		$('#allAdvtContainer').empty();
		$('#allAdvtContainer').append(dom_String);
	}
	$(document).ready(function(){
		
		
		$('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
						var _this = $(event.relatedTarget);
						var advtid = _this.data('advtid');
						console.log( advtid);
				
				var modal = $(this);
				modal.find('.modal-body').text('This will delete Advertisement Permanently !');
				modal.find('#DeleteAdvt').show();
				$('#customModal').find('[data-dismiss="modal"]').show();
				modal.find('#DeleteAdvt').data("advtid",advtid);
			
		});

		$('#DeleteAdvt').on('click',function(){
			var _this = $(this);
			$('#customModal').find('.modal-body').text('');
			$('#customModal').find('#DeleteAdvt').hide();
			$('#customModal').find('[data-dismiss="modal"]').hide();
			$('#customModal').find('.modal-body').append('<i class="fa fa-spinner fa-pulse"></i> Deleting Advertisement... ');
			var advtid = _this.data('advtid');
			//alert("deleting ..... id: "+advtid);
			//console.log(_this);
			$.ajax({
					type:'POST',
					async:true,
					dataType:"json",
					data:{
							"advtid":advtid
						},
					url:xb_global_namespace.baseurl+"admin_requests/advt/remove_advt",
					success: function(datareceived, textStatus, jqXHR)
					{
						//console.log(datareceived);
						$('#customModal').modal('hide');

						if(datareceived['status'] == 'login')
						{
							makedom(datareceived['advt']);
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
		
		
		
		
		$.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:xb_global_namespace.baseurl+"admin_requests/advt/get_all_advt",
				//data:postData,
				success:function(datareceived,textStatus,jqXHR)
				{
					console.log(datareceived);
					if(datareceived['status'] == 'login')
					{
						makedom(datareceived['advt']);
						$('#loading_bar').css({"display":"none"});

					}
					else if(datareceived['status'] == 'notlogin')
					{$(location).attr('href',$(location).attr('href'));}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
				}
			});
		
		
		$('#advtForm').on('submit',function(event){
			formSubmitFlag = true;
			event.preventDefault();
			var _this = $(this);
			var postData = _this.serializeArray();
			console.log(postData);

			$('#loading_bar').css({"display":"inline"});
			$.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:xb_global_namespace.baseurl+"admin_requests/advt/save_advt",
				data:postData,
				success:function(datareceived,textStatus,jqXHR)
				{
					console.log(datareceived);
					if(datareceived['status'] == 'login')
					{
						_this.find('input,textarea').not('input[type="submit"]').val('');
						_thisDropzone.removeAllFiles();
						formSubmitFlag = false;

						$('#loading_bar').css({"display":"none"});
						
						makedom(datareceived['advt']);

						$('html, body').animate({
									scrollTop: $("body").offset().top
								}, 1000);

					}
					else if(datareceived['status'] == 'notlogin')
					{$(location).attr('href',$(location).attr('href'));}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
				}
			});

		});


		var _thisDropzone;
		Dropzone.options.mydropzone = {
			addRemoveLinks: true,
			parallelUploads: 1,
            acceptedFiles: 'image/*',
            thumbnailWidth: 130,
            thumbnailHeight: 100,
            maxFiles: 1,
         //   previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n <input type=\"text\" data-dz-doc-expiration-date class=\"dz-doc-input\" />\n <select class=\"dz-doc-input\" data-dz-doc-document-type-id  ></select>\n   <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress></span></div>\n  <div class=\"dz-success-mark\"><span>✔</span></div>\n  <div class=\"dz-error-mark\"><span>✘</span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>",   
            uploadMultiple: false,
	            init: function() {
                    _thisDropzone = this;
                    
    	          this.on("addedfile", function(file) {
                    
                    		//console.log(file);
            			  }); 
                     
                     
                this.on("success", function(files, response) {
                       
						$('#advtImage').val(response.trim());
                    });
						  
				this.on("removedfile",function(file){

						if(!formSubmitFlag)
						{
							$.ajax({
									url:xb_global_namespace.baseurl+'admin_requests/advt/remove_image',
									dataType:"json",
									async: true,
									type: 'POST',
									data: {"filename":file.xhr.response},
									success:function(datarecieved,textStatus,jqXHR)
									{
										//console.log("Removed successfully!",datarecieved);
										if(datarecieved['status'] == 'login')
										{}
										else if(datarecieved['status'] == 'notlogin')
										{$(location).attr('href',$(location).attr('href'));}
									},
									error: function(jqXHR, textStatus, errorThrown)
									{
										console.log("file not Remove!!",jqXHR,textStatus,errorThrown);
									}								
								});
							$('#advtImage').val("");
						}
						else
						{
							console.log("Images Not Removed!!!!");
						}
    						
					});
                    
                    this.on("maxfilesexceeded", function(file){
                        this.removeAllFiles();
                        this.addFile(file);
                    });
 
				},			
          };



	});
</script>