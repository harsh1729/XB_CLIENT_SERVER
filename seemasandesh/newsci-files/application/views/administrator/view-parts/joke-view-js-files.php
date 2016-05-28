<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<script src="<?=base_url();?>plugins/dropzone/js/dropzone.js"></script>
<!--********** loading IME methods ***************-->
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<script>
var _myDropzone;
 var qdelete_file_name;
 var form_submit = false;
Dropzone.options.Qdropzone = {
			addRemoveLinks: true,
			parallelUploads: 1,
            acceptedFiles: 'image/*, audio/*, video/*',
            thumbnailWidth: 130,
            thumbnailHeight: 100,
            maxFiles: 1,
         //   previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n <input type=\"text\" data-dz-doc-expiration-date class=\"dz-doc-input\" />\n <select class=\"dz-doc-input\" data-dz-doc-document-type-id  ></select>\n   <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress></span></div>\n  <div class=\"dz-success-mark\"><span>✔</span></div>\n  <div class=\"dz-error-mark\"><span>✘</span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>",   
            uploadMultiple: false,
	            init: function() {
                    _thisDropZone = this;
                    _myDropzone = this;
                    
                 
                    
    	          this.on("addedfile", function(file) {
                    
                    
            			  }); 
                     
                     
                this.on("success", function(files, response) {
                       
                   	   console.log(response);
						$('#joke_image').val(response);
						qdelete_file_name = response;
    			
                    });
						  
				this.on("removedfile",function(file){
    						if(!form_submit)
    						{
							$.ajax({
								url:xb_global_namespace.baseurl+'admin_requests/joke/remove_image',
								dataType:"",
								async: true,
								type: 'POST',
								data: {"filename":qdelete_file_name},
								success:function(datarecieved,textStatus,jqXHR)
								{
									console.log("Removed successfully!",datarecieved);
									if(datarecieved['status'] == 'login')
									{
									}
									else if(datarecieved['status'] == 'notlogin')
									{$(location).attr('href',$(location).attr('href'));}
								},
								error: function(jqXHR, textStatus, errorThrown)
								{
									console.log("file not Remove!!",jqXHR,textStatus,errorThrown);
								}								
							});
						}
    						
					});
                    
                    this.on("maxfilesexceeded", function(file){
                        this.removeAllFiles();
                        this.addFile(file);
                    });
 
				},			
          };
          
          
          	$('#joke_submit_btn').on('click',function(event){
			filename = $('#joke_image').val();
			 console.log(filename);
			$('#loading_bar').css('display', 'block');
				$.ajax({
					url:xb_global_namespace.baseurl+'admin_requests/joke/save_joke',
					dataType:"json",
					async: true,
					type: 'POST',
					data: {
							"filename":filename,
							"joke_text":$('#joke_text').val()
							},
					success:function(datarecieved,textStatus,jqXHR)
					{
						$('#loading_bar').css('display', 'none');
						//console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{
							form_submit = true;
							 $('#joke_image').val("");
							 $('#joke_text').val("");
							alert("save successfull");
							_myDropzone.removeAllFiles();
							form_submit = false;
						}
						else if(datarecieved['status'] == 'notlogin')
						{$(location).attr('href',$(location).attr('href'));}
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						$('#loading_bar').css('display', 'none');
						alert("Not Saved !!!");
						console.log("file not Remove!!",jqXHR,textStatus,errorThrown);
					}								
				});
			
		});

          
$(document).ready(function() {
		$('#loading_bar').css('display', 'none');
		});
</script>