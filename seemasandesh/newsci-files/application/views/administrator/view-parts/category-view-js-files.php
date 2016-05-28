<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>plugins/dropzone/js/dropzone.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<script>

    var CATEGORY_VIEW_NAMESPACE = {};
    CATEGORY_VIEW_NAMESPACE.updateAllCategories = function(){
        $.ajax({
                url:xb_global_namespace.baseurl+'admin_requests/category/get_all_categories',
                dataType:"json",
                async: true,
                type: 'POST',
                data: {},
                success: function(data, textStatus, jqXHR)
                {
                    //console.log(data);
                    $('#all_category_container').empty();
                    $('#parentcatid').empty();
                    
                    $('#parentcatid').append("<option value=''>Choose any Parent Category </option>");
                    $('#parentcatid').append("<option value='0'>No Parent --- 0 ---</option>");
                    
                    //console.log(data);
                    $.each(data,function(key,value){
                            //console.log("main :"+value.id);
                            //console.log("main :"+value.name);
                          if(value.root == 1)
                         {  
                            var all_cat = "<div class='row' style=''>"
                                                +"<div class='col-md-10' style='padding:5px; '>"
                                                    +"<div class='form-control' style='background-color:#fff; padding-top:5px;padding-bottom:5px;'>"+value.name+"</div>"
                                                +"</div>"
                                                +"<div class='col-md-1' style='padding-top:5px;padding-bottom:9px;padding-left:5px;padding-right:5px;'>"
                                                    +"<div class='btn btn-sm btn-danger btn-block' disabled data-id='"+value.id+"' data-table='Main' data-target='#customModal' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</div>"
                                                +"</div>"
                                                +"<div class='col-md-1' style='padding-top:5px;padding-bottom:9px;padding-left:5px;padding-right:5px;'>"
                                                    +"<div class='btn btn-sm btn-success btn-block' data-id='"+value.id+"' data-name='"+value.name+"' data-img='"+value.image+"' data-target='#editModal' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Edit</div>"
                                                +"</div>"
                                            +"</div>";
                         }
                         else
                         {
                           var all_cat = "<div class='row' style=''>"
                                                +"<div class='col-md-10' style='padding:5px; '>"
                                                    +"<div class='form-control' style='background-color:#fff; padding-top:5px;padding-bottom:5px;'>"+value.name+"</div>"
                                                +"</div>"
                                                +"<div class='col-md-1' style='padding-top:5px;padding-bottom:9px;padding-left:5px;padding-right:5px;'>"
                                                    +"<div class='btn btn-sm btn-danger btn-block' data-id='"+value.id+"' data-table='Main' data-target='#customModal' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</div>"
                                                +"</div>"
                                                +"<div class='col-md-1' style='padding-top:5px;padding-bottom:9px;padding-left:5px;padding-right:5px;'>"
                                                    +"<div class='btn btn-sm btn-success btn-block' data-id='"+value.id+"' data-name='"+value.name+"' data-img='"+value.image+"' data-target='#editModal' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Edit</div>"
                                                +"</div>"
                                            +"</div>";
                             }
                            $(all_cat).appendTo('#all_category_container');
                            
                            
                            $('#parentcatid').append("<option value='"+value.id+"'>"+value.name+"</option>");
                            
                            $.each(value.subcat,function(subKey,subValue){
                                    //console.log("sub :"+subValue.id);
                                    //console.log("sub :"+subValue.name);                                   
                                    var all_cat = "<div class='row' style=''>"
                                                        +"<div class='col-md-1' style=''>"
                                                        +"</div>"
                                                        +"<div class='col-md-9' style='padding:5px; '>"
                                                            +"<div class='form-control' style='padding-top:5px;padding-bottom:5px;'>"+subValue.name+"</div>"
                                                        +"</div>"
                                                        +"<div class='col-md-1' style='padding-top:5px;padding-bottom:9px;padding-left:5px;padding-right:5px;'>"
                                                            +"<div class='btn btn-sm btn-danger btn-block' data-id='"+subValue.id+"' data-table='SubN' data-target='#customModal' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</div>"
                                                        +"</div>"
                                                        +"<div class='col-md-1' style='padding-top:5px;padding-bottom:9px;padding-left:5px;padding-right:5px;'>"
                                                            +"<div class='btn btn-sm btn-success btn-block' data-id='"+subValue.id+"' data-name='"+subValue.name+"' data-img='"+subValue.image+"' data-target='#editModal' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Edit</div>"
                                                        +"</div>"
                                                    +"</div>";
                                    $(all_cat).appendTo('#all_category_container');
                                    
                                });
                        });
                },
                error: function(jqXHR, textStatus, errorThrown) 
                {
                    console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
                    alert(textStatus);
                },
            });
    };

	$(document).ready(function(){

        CATEGORY_VIEW_NAMESPACE.updateAllCategories();


		var TotalImageFiles = 0;
		var fileList = [];
        var fileDeleteList = [];
		var flagSubmit = false;
		var _thisDropZone;
        
        Dropzone.options.myDropzone = {
			addRemoveLinks: true,
			parallelUploads: 1,
            acceptedFiles: 'image/*, audio/*, video/*',
            thumbnailWidth: 160,
            thumbnailHeight: 160,
            maxFiles: 1,
            //   previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n <input type=\"text\" data-dz-doc-expiration-date class=\"dz-doc-input\" />\n <select class=\"dz-doc-input\" data-dz-doc-document-type-id  ></select>\n   <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress></span></div>\n  <div class=\"dz-success-mark\"><span>✔</span></div>\n  <div class=\"dz-error-mark\"><span>✘</span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>",   
            uploadMultiple: false,
	            init: function() {
                    _thisDropZone = this;
                    
    	          this.on("addedfile", function(file) {
                    $('#image').val(file.name);
					fileList.push(file.name);
                    fileDeleteList.push(file.name);
					TotalImageFiles = TotalImageFiles+1;
                    //alert(TotalImageFiles);
        	        //var TagText = Dropzone.createElement("<input name='imagetag_"+file.name+"' id='imagetag_"+file.name+"' type='text' class='lang_class img_description' placeholder='फोटो की टेग लाईन लिखें'></input>");
            	    //console.log("name=imagetag_"+file.name);
                    //file.previewElement.appendChild(TagText); 
					//$('input').ime();*/
            			  }); 
                     
                     
                this.on("success", function(files, response) {
                        // event when files are successfully uploaded
                        // you can return a response string and process it here through 'response'
                        
                        //console.log("#imagetag_"+files.name);
                        //document.getElementById("imagetag_"+files.name).value = "jaspal";
                    //    alert(response);
                    /*    document.getElementById("imagetag_"+files.name).name = "imagetag_"+response;
                    */    
						console.log(response);
    					var imgIndex = fileList.indexOf(files.name);
                        $('#image').val( response );
                        //alert( response );
						
						fileDeleteList.splice(imgIndex,1,response);
                    
                    });
						  
				this.on("removedfile",function(file){
    					if(flagSubmit != true)
                        { 
                        	$('#image').val("");
    						var imgIndex = fileList.indexOf(file.name);
                            var fileToDelete = fileDeleteList[imgIndex];
                            //alert(imgIndex+"delete called : "+fileToDelete);
    						fileList.splice(imgIndex,1);
                            fileDeleteList.splice(imgIndex,1);
    					
    						//alert("jaspal canceled"+file.name);						
                            if(TotalImageFiles > 0)
    						    TotalImageFiles = TotalImageFiles-1;
    						$.ajax({
                                url:xb_global_namespace.baseurl+'admin_requests/category/remove_image',
                                dataType:"json",
                                async: true,
                                type: 'POST',
                                data: {"filename":fileToDelete},
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
                        }
					});
                    
                    this.on("maxfilesexceeded", function(file){
                        this.removeAllFiles();
                        this.addFile(file);
                    });
				},
            };


            var editTotalImageFiles = 0;
        var editfileList = [];
        var editfileDeleteList = [];
        var editflagSubmit = true;
        var _editDropzone;
        
        Dropzone.options.editDropzone = {
                        addRemoveLinks : true,
                        parallelUploads:1,
                        acceptedFiles:'image/*,audio/*,video/*',
                        maxFiles:1,
                        uploadMultiple:false,
                        init: function() {
                                _editDropzone = this;
                                this.on('addedfile',function(file){
                                        console.log("addedFile Called!!");
                                        
                                        $('#editImage').val(file.name);
                                        editfileList.push(file.name);
                                        editfileDeleteList.push(file.name);
                                        editTotalImageFiles = editTotalImageFiles+1;
                                        
                                        editflagSubmit = false;
                                    });
                                this.on("success", function(files, response) {
                                        var editimgIndex = editfileList.indexOf(files.name);
                                        $('#editImage').val( response );
                                        editfileDeleteList.splice(editimgIndex,1,response);
                                    });
                                this.on("removedfile",function(file){
                                        console.log('removedFile Called : flag:'+editflagSubmit+" : Total : "+editTotalImageFiles);
                                        
                                            $('#editImage').val("");
                                        if(editflagSubmit != true)
                                        { 
                                            var editimgIndex = editfileList.indexOf(file.name);
                                            var editfileToDelete = editfileDeleteList[editimgIndex];
                                            //alert(imgIndex+"delete called : "+fileToDelete);
                                            editfileList.splice(editimgIndex,1);
                                            editfileDeleteList.splice(editimgIndex,1);
                                        
                                            //alert("jaspal canceled"+file.name);                       
                                            if(editTotalImageFiles > 0)
                                                editTotalImageFiles = editTotalImageFiles-1;
                                            console.log("file to delete: "+editfileToDelete);
                                            $.ajax({
                                                    url:xb_global_namespace.baseurl+'admin_requests/category/remove_image',
                                                    async:true,
                                                    type:'POST',
                                                    data:{"filename":editfileToDelete},
                                                    dataType:'json',
                                                    success: function(data, textStatus, jqXHR)
                                                    {
                                                        console.log(data);
                                                    },
                                                    error: function(jqXHR, textStatus, errorThrown)
                                                    {
                                                        console.log(jqXHR , textStatus , errorThrown);
                                                        alert(textStatus);
                                                    }
                                                    
                                                });
                                        }
                                    });
                                this.on("maxfilesexceeded", function(file){
                                        console.log("maxfiles exceeded!! : Total : " +editTotalImageFiles);
                                        this.removeAllFiles();
                                        this.addFile(file);
                                    });
                            },
                    };

            $('#editModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
                }).on('hidden.bs.modal',function(event){
                console.log("modal hidden!!!");
                
                editflagSubmit = true;
            });
        $('#editModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
                }).on('show.bs.modal',function(event){
                        
                        var button = $(event.relatedTarget);
                        var catId = button.data('id');
                        //console.log( catId );
                        var name = button.data('name');
                        //console.log( name );
                        var img = button.data('img');
                        //console.log( img );
                        console.log( img.substring(img.lastIndexOf('/')+1) );
                    
                var modal = $(this);
                modal.find('#updateCategory').data("catId",catId);
                modal.find('#catNameInput').val(name);
                
                _editDropzone.removeAllFiles();
                if (img != "")
                {
                    var mockFile = { 
                                        name: img.substring(img.lastIndexOf('/')+1), 
                                        size: 12345, 
                                        type: 'image/*', 
                                        status: Dropzone.ADDED, 
                                        url: img,
                                        accepted:true
                                    };
                                    
                    $('#editImage').val(img.substring(img.lastIndexOf('/')+1));
                                    
                    _editDropzone.emit("addedfile", mockFile);
                    
                    // And optionally show the thumbnail of the file:
                    _editDropzone.emit("thumbnail", mockFile, img);
                    
                    _editDropzone.files.push(mockFile);
                    
                    editflagSubmit = true;
                    editTotalImageFiles = 0;
                }
        });


        
        $('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
                }).on('show.bs.modal',function(event){
                        
                        var button = $(event.relatedTarget);
                        var catId = button.data('id');
                        //console.log( catId );
                        var table = button.data('table');
                        //console.log( table );
                        
                if( table == "Main" )
                {
                    var modal = $(this);
                    modal.find('.modal-body').text('This operation will delete all the sub-categories and this category !');
                    modal.find('#DeleteCategory').text("Delete All");
                    modal.find('#DeleteCategory').data("catId",catId);
                }
                else if( table == "SubN" )
                {
                    var modal = $(this);
                    modal.find('.modal-body').text('This operation will delete the respective category from server !');
                    modal.find('#DeleteCategory').text("Delete");
                    modal.find('#DeleteCategory').data("catId",catId);
                }
            
        });

        $('#DeleteCategory').on('click',function(){
            var _this = $(this);
            $('#customModal').modal('hide');

            var catId = _this.data('catId');
            //console.log("cat id is :"+catId);
            var table = _this.data('table');
            
            $.ajax({
                    type:'POST',
                    async:true,
                    //dataType:"json",
                    data:{"catid":catId},
                    url:xb_global_namespace.baseurl+'admin_requests/category/delete_category',
                    success: function(data, textStatus, jqXHR)
                    {
                        console.log(data);
                        CATEGORY_VIEW_NAMESPACE.updateAllCategories();
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
                        alert(textStatus);
                    }
                });
        }); 
        $('#updateCategory').on('click',function(){
            var _this = $(this);
            $('#editModal').modal('hide');
            var catId = _this.data('catId');
            //console.log("cat id is :"+catId);
            var catName = $('#catNameInput').val();
            //console.log("cat Name is :"+catName);
            var image = $('#editImage').val();
            //console.log("image :"+image);
            
            $.ajax({
                    type:'POST',
                    async:true,
                    //dataType:"json",
                    data:{catid:catId,catname:catName,image:image},
                    url:xb_global_namespace.baseurl+'admin_requests/category/update_category',
                    success: function(data, textStatus, jqXHR)
                    {
                        console.log(data);
                        editflagSubmit = true;
                        CATEGORY_VIEW_NAMESPACE.updateAllCategories();
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        console.log(jqXHR , textStatus , errorThrown);
                        alert(textStatus);
                    }
                });
        }); 

        $(window).bind('beforeunload',function(e)
        {       
            if(TotalImageFiles > 0)
            {
                //var msg = "Total Files are : "+TotalImageFiles+":";
                var msg = "";
                for(i=0;i<fileList.length;i++)
                {
                    //fileList[i] = fileList[i].replace(".","\\.");
                    console.log(fileList[i]);
                    msg += fileList[i]+"="+fileList[i]+"&";
                }
                e.returnValue = msg;
                //console.log(msg);
                if(!flagSubmit)
                    return "You have Images pending to delete , Please delete these files before leaving the page.";
            }
        });
        $('#all_category_heading').click(function()
        {
            $('#all_category_container').slideToggle("slow");
        });
        $('#saveNewCatForm').on('submit',function(event){
            $("#loading_bar").css("display","block");
            postData = $(this).serializeArray();
            flagSubmit = true;
            console.log(postData);
            $.ajax({
                async: true,
                type:'POST',
                dataType:'json',
                url:xb_global_namespace.baseurl+"admin_requests/category/save_category",
                data:postData,
                success:function(datarecieved,textStatus,jqXHR)
                {
                    console.log(datarecieved);
                    if(datarecieved['status'] == 'login')
                    {
                        data = datarecieved['data'];
                        if(data > 0)
                        {
                            alert("successfully saved !");
                            _thisDropZone.removeAllFiles();
                            $("#saveNewCatForm")[0].reset();
                        }
                        else
                            flagSubmit = false;
                    }
                    else if(datarecieved['status'] == 'notlogin')
                    {$(location).attr('href',$(location).attr('href'));}
                    CATEGORY_VIEW_NAMESPACE.updateAllCategories();

                   $("#loading_bar").css("display","none");
                },
                error:function(jqXHR,textStatus,errorThrown)
                {
                    console.log(jqXHR,textStatus,errorThrown);
                }
            });
            event.preventDefault();
        });
	});
$("#loading_bar").css("display","none")
</script>