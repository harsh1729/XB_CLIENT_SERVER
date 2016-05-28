<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>plugins/dropzone/js/dropzone.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<!--********** loading IME methods ***************-->
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<!--************ IME loading end *****************-->
<script type="text/javascript" src="<?=base_url();?>plugins/bootstrap-multiple-select/js/bootstrap-multiselect.js"></script>
<script>
	
	
	
		$("#newscontent").on("paste", function(e){
    // access the clipboard using the api
    console.log(e);
    var pastedData = e.originalEvent.clipboardData.getData('text');
    $('#newscontent').append(pastedData);

    return false;
} );

$("#newsheading").on("paste", function(e){
    // access the clipboard using the api
    console.log(e);
    var pastedData = e.originalEvent.clipboardData.getData('text');
    $('#newsheading').append(pastedData);

    return false;
} );
	
	
	$(document).ready(function(){ 
        	$('#newsDatePicker').datepicker({
					autoclose: true,
		            todayBtn: "linked",
		            todayHighlight: true,
					format : "dd-mm-yyyy",
			});
          
          $( "#newsDatePicker" ).datepicker({ defaultDate: new Date() });
	/*$('#categoryIdmore').multipleSelect({
		"placeholder":"Choose News Category(ies)",
		"styler":function(event,value){
			console.log(value);
		}
	});*/
	$('#categoryId').on('change',function(event){
		_this = $(this);
		optionvalue = _this.val();
		//console.log(event,optionvalue);
		$('#categoryIdmore').find("option:selected").prop("disabled",false);
		$('#categoryIdmore').multiselect('deselectAll',false);
		$('#categoryIdmore').multiselect('select',optionvalue);
		$('#categoryIdmore').find("option:selected").prop("disabled",true);
		$('#categoryIdmore').multiselect('refresh');
		
	});
          $('#categoryIdmore').multiselect({
                //buttonWidth:"100%",
                maxHeight: 200,
                nonSelectedText: 'Choose atleast one category',
                templates: {
                         button:'<button type="button" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-plus"></span></button>'
                },
                //optionLabel: function(element) {
                //       console.log(element);
                //       return $(element).html() + '(' + $(element).val() + ')';
                //}
          });
	});
	
	DROPZONE_DATA = {};
	DROPZONE_DATA.TotalImageFiles = 0;
	DROPZONE_DATA.fileList = [];
	DROPZONE_DATA.fileDeleteList = [];
	DROPZONE_DATA.flagSubmit = 	false;
	DROPZONE_DATA._thisDropZone;
	DROPZONE_DATA._mainDropZone;
	
	$(function(){
		Dropzone.options.mainDropzone = {
			addRemoveLinks: true,
			parallelUploads: 1,
            acceptedFiles: 'image/*, audio/*, video/*',
            thumbnailWidth: 250,
            thumbnailHeight: 200,
            maxFiles: 1,
	            init: function() {
					DROPZONE_DATA._mainDropZone = this;
    	          this.on("addedfile", function(file) {
						DROPZONE_DATA.fileList.push(file.name);
						DROPZONE_DATA.fileDeleteList.push(file.name);
						DROPZONE_DATA.TotalImageFiles = DROPZONE_DATA.TotalImageFiles+1;

						//var TagText = Dropzone.createElement("<input name='imagetag_main_"+file.name+"' id='imagetag_main_"+file.name+"' type='text' class='lang_class img_description  form-control' placeholder='image tagline'></input>");
						var TagText = Dropzone.createElement("<input name='mainimgtagline' id='mainimgtagline' type='text' class='lang_class img_description  form-control' placeholder='image tagline'></input>");
						//console.log("name=imagetag_"+file.name);
						file.previewElement.appendChild(TagText);

						var imgname = Dropzone.createElement("<input name='mainimgname' id='mainimgname' value='"+file.name+"' type='hidden'></input>");
						file.previewElement.appendChild(imgname);

						$('input').ime();
            		}); 
                       
                    this.on("success", function(files, response) {
						//console.log(response);
						//document.getElementById("imagetag_main_"+files.name).name = "imagetag_main_"+response;
						document.getElementById("mainimgname").value = response;
                        
    					var imgIndex = DROPZONE_DATA.fileList.indexOf(files.name);
						DROPZONE_DATA.fileDeleteList.splice(imgIndex,1,response);
                    
                    });
						  
				this.on("removedfile",function(file){
    					if(DROPZONE_DATA.flagSubmit != true)
                        {
    						var imgIndex = DROPZONE_DATA.fileList.indexOf(file.name);
                            var fileToDelete = DROPZONE_DATA.fileDeleteList[imgIndex];
                            //alert(imgIndex+"delete called : "+fileToDelete);
    						DROPZONE_DATA.fileList.splice(imgIndex,1);
                            DROPZONE_DATA.fileDeleteList.splice(imgIndex,1);
    					
    						//alert("jaspal canceled"+file.name);						
    						DROPZONE_DATA.TotalImageFiles = DROPZONE_DATA.TotalImageFiles-1;
							
							$.ajax({
								url:xb_global_namespace.baseurl+'admin_requests/news/remove_image',
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
			previewTemplate:"<div class=\"dz-preview dz-file-preview\">\n  "+
								"<div class=\"dz-details\">\n  "+
									"<div class=\"dz-filename\"><span data-dz-name></span></div>\n    "+
									"<div class=\"dz-size\" data-dz-size></div>\n    "+
									"<img data-dz-thumbnail class=\"img-responsive img-thumbnail center-block\" />\n  "+
								"</div>\n  "+
								"<div class=\"dz-progress\">"+
									"<span class=\"dz-upload\" data-dz-uploadprogress></span>"+
								"</div>\n  "+
								"<div class=\"dz-success-mark\"><span>✔</span>"+
								"</div>\n  "+
								"<div class=\"dz-error-mark\"><span>✘</span>"+
								"</div>\n  "+
								"<div class=\"dz-error-message\"><span data-dz-errormessage></span>"+
								"</div>\n"+
							"</div>",		
								
          };
		  
		Dropzone.options.myDropzone = {
			addRemoveLinks: true,
			parallelUploads: 10,
            acceptedFiles: 'image/*, audio/*, video/*',
            thumbnailWidth: 250,
            thumbnailHeight: 200,
	            init: function() {
                   DROPZONE_DATA._thisDropZone = this;
    	          this.on("addedfile", function(file) {
						DROPZONE_DATA.fileList.push(file.name);
						DROPZONE_DATA.fileDeleteList.push(file.name);
						DROPZONE_DATA.TotalImageFiles = DROPZONE_DATA.TotalImageFiles+1;

        	        //var TagText = Dropzone.createElement("<input name='imagetag_"+file.name+"' id='imagetag_"+file.name+"' type='text' class='lang_class img_description' placeholder='image tagline'></input>");
            	    //console.log("name=imagetag_"+file.name);
                    //file.previewElement.appendChild(TagText); 
					
					/*****************************************************************************************/
					/*_ref_remove_btn = file.previewTemplate.querySelector('.dz-remove');
					
					_ref_new_element_div_row = document.createElement("div");
					_ref_new_element_div_row.setAttribute('class','row');
					
					_ref_new_element_div_col = document.createElement('div');
					_ref_new_element_div_col.setAttribute('class','col-md-12');
					
					_ref_new_element_a_remove = document.createElement('a');
					_ref_new_element_a_remove.setAttribute('class','dz-remove');
					_ref_new_element_a_remove.setAttribute('href','javascript:undefined');
					_ref_new_element_a_remove.dataset.dzRemove = '';
					
					_ref_new_element_div_col.appendChild( _ref_new_element_a_remove );
					
					_ref_new_element_div_row.appendChild( _ref_new_element_div_col );
					
					_ref_remove_btn.parentNode.parentNode.appendChild( _ref_new_element_div_row );
					_ref_remove_btn.parentNode.parentNode.removeChild(_ref_remove_btn);
					/*****************************************************************************************/
					
					_ref_tagline = file.previewTemplate.querySelector('[data-tagline]');
					//console.log( _ref.length );
					//_ref_tagline.value = file.name;
					_ref_tagline.name = "imagetag_tagline_"+file.name;
					_ref_tagline.id = "imagetag_tagline_"+file.name;
					
					
					_ref_content = file.previewTemplate.querySelector('[data-content]');
					//_ref_content.html($('#newsContent').html()); 
					_ref_content.name = "imagetag_content_"+file.name;
					_ref_content.id = "imagetag_content_"+file.name;
					//data-content
					
					_ref_heading = file.previewTemplate.querySelector('[data-heading]');
console.log("data-heading:",_ref_heading);
					_ref_heading.innerHTML = $('#newsheading').html(); 
					_ref_heading.name = "imagetag_heading_"+file.name;
					_ref_heading.id = "imagetag_heading_"+file.name;
console.log(_ref_heading.name);

_ref_headinghidden = file.previewTemplate.querySelector('[data-headinghidden]');
					_ref_headinghidden.name = "hidden_imagetag_heading_"+file.name;
					_ref_headinghidden.id = "hidden_imagetag_heading_"+file.name;

_ref_contenthidden = file.previewTemplate.querySelector('[data-contenthidden]');
					_ref_contenthidden.name = "hidden_imagetag_content_"+file.name;
					_ref_contenthidden.id = "hidden_imagetag_content_"+file.name;
					
_ref_taglinehidden = file.previewTemplate.querySelector('[data-taglinehidden]');
					_ref_taglinehidden.name = "hidden_imagetag_tagline_"+file.name;
					_ref_taglinehidden.id = "hidden_imagetag_tagline_"+file.name;
					
					//data-heading
					
					$('div.lang_class').ime();
            	}); 
                       
                    this.on("success", function(files, response) {
                        // event when files are successfully uploaded
                        // you can return a response string and process it here through 'response'
                        
                        //console.log(response);

                        //console.log("#imagetag_"+files.name);
                        //document.getElementById("imagetag_"+files.name).value = "jaspal";
                        
						//document.getElementById("imagetag_tagline_"+files.name).name = "imagetag_tagline_"+response;
      document.getElementById("imagetag_tagline_"+files.name).id="imagetag_tagline_"+response;
						//document.getElementById("imagetag_content_"+files.name).name = "imagetag_content_"+response;
      document.getElementById("imagetag_content_"+files.name).id ="imagetag_content_"+response;
						//document.getElementById("imagetag_heading_"+files.name).name = "imagetag_heading_"+response;
      document.getElementById("imagetag_heading_"+files.name).id = "imagetag_heading_"+response;

                                               document.getElementById("hidden_imagetag_tagline_"+files.name).name = "imagetag_tagline_"+response;
                                               document.getElementById("hidden_imagetag_content_"+files.name).name = "imagetag_content_"+response;
                                               document.getElementById("hidden_imagetag_heading_"+files.name).name = "imagetag_heading_"+response;

    					var imgIndex = DROPZONE_DATA.fileList.indexOf(files.name);
						DROPZONE_DATA.fileDeleteList.splice(imgIndex,1,response);
                    
                    });
						  
				this.on("removedfile",function(file){
    					if(DROPZONE_DATA.flagSubmit != true)
                        {
    						var imgIndex = DROPZONE_DATA.fileList.indexOf(file.name);
                            var fileToDelete = DROPZONE_DATA.fileDeleteList[imgIndex];
                            //alert(imgIndex+"delete called : "+fileToDelete);
    						DROPZONE_DATA.fileList.splice(imgIndex,1);
                            DROPZONE_DATA.fileDeleteList.splice(imgIndex,1);
    					
    						//alert("jaspal canceled"+file.name);						
    						DROPZONE_DATA.TotalImageFiles = DROPZONE_DATA.TotalImageFiles-1;
							
							$.ajax({
								url:xb_global_namespace.baseurl+'admin_requests/news/remove_image',
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
                    
				},		
				previewTemplate: "<div class='container-fluid dz-preview dz-file-preview news-container'>"+
								"<div class='row'>"+
									"<div class='dz-details col-md-4'>"+
										"<div class='dz-filename'><span data-dz-name></span></div>"+
										"<div contenteditable='true' style=\"margin-top:14px;width:240px;overflow:auto;\"  data-tagline class='lang_class img_description form-control' ></div><input type='hidden' data-taglinehidden>"+
										"<div class='dz-size' data-dz-size></div>"+
										"<img data-dz-thumbnail class='img-responsive img-thumbnail' />"+
										"<span id=\"myId\"></span>"+
									"</div>"+
									"<div class='col-md-8'>"+
										"<div class='container-fluid'>"+
											"<div class='row'>"+
												"<div class='col-md-12'>"+
													"<div contenteditable='true'  style=' width:100%;overflow-x:auto;' placeholder=\"Heading of News\" data-heading  class=\"lang_class form-control\" required ></div><input type='hidden' data-headinghidden>"+
													"<input type='button' class='unicode_convert_button btn btn-sm btn-info pull-right' data-target='#copyModal' data-toggle='modal' value='copy'>"+
												"</div>"+
											"</div>"+
											"<div class='row'>"+
												"<div class='col-md-12'>"+
													"<div contenteditable='true' style='width:100%;height:205px;margin-top:5px; overflow:auto;' placeholder=\"Content of News\" data-content class=\"lang_class form-control\" >"+
													"</div><input type='hidden' data-contenthidden>"+
													"<input type='button' class='unicode_convert_button btn btn-sm btn-info pull-right' data-target='#copyModal' data-toggle='modal' value='copy'>"+
												"</div>"+
											"</div>"+
										"</div>"+
									"</div>"+
								"</div>"+
								"<div class='row'>"+
									"<div class='col-md-12'>"+
										"<div class='dz-progress'><span class='dz-upload' data-dz-uploadprogress></span></div>"+
									"</div>"+
								"</div>"+
								"<div class='dz-success-mark'><span>✔</span></div>"+
								"<div class='dz-error-mark'><span>✘</span></div>"+
								"<div class='dz-error-message'><span data-dz-errormessage></span></div>"+
							"</div>",
							
								
		};
		$('#SaveNewsForm').on('submit',function(event){
            
			event.preventDefault();
			if(DROPZONE_DATA.flagSubmit == false)
			{
	                        if($('#categoryId').val() == "" || $('#categoryId').val() == null)
	                               alert("Please choose atleast one category!");
	                        else if($('#newsheading').text() == "" || $('#newscontent').text() == "")
	                        {
	                        	alert("heading or content can not be empty");
	                        }
	                        else
	                        {
					DROPZONE_DATA.flagSubmit = true;
					var postData = $(this).serializeArray();
					//console.log(postData);
		
					tagline_prepend = "imagetag_tagline_";
					heading_prepend = "imagetag_heading_";
					content_prepend = "imagetag_content_";
		
					subnews_heading = {};
					subnews_content = {};
					subnews_tagline = {};
					subnews_image = {};
					$.each(postData,function(key,val){
						//console.log(val.name,val.value);
						
						if(val.name.search(tagline_prepend) == 0)
						{
							//subnews tagline
							tg_line = val.name.substr(tagline_prepend.length,val.name.length);
							//console.log("tagline key:"+tg_line+" : "+val.value);
							//subnews_tagline[tg_line] = val.value;
	                                                subnews_tagline[tg_line] =document.getElementById(val.name).innerHTML;
							subnews_image[tg_line] = tg_line;
						}
						else if(val.name.search(heading_prepend) == 0)
						{
							//subnews heading
							hd_ng = val.name.substr(heading_prepend.length,val.name.length);
							//console.log("heading key:"+val.name+" : "+val.value,document.getElementById(val.name));
							//subnews_heading[hd_ng] = val.value;
	                                                subnews_heading[hd_ng] = document.getElementById(val.name).innerHTML;
						}
						else if(val.name.search(content_prepend) == 0)
						{
							//subnews content
							cn_nt = val.name.substr(content_prepend.length,val.name.length);
							//console.log("content key:"+cn_nt+" : "+val.value);
							//subnews_content[cn_nt] = val.value;
	                                                subnews_content[cn_nt] = document.getElementById(val.name).innerHTML;
						}
					});
		
					subnews = [];
					$.each(subnews_heading,function(index,val)
					{
						singlesubnews = {};
						singlesubnews.heading = val;
						singlesubnews.content = subnews_content[index];
						singlesubnews.tagline = subnews_tagline[index];
						singlesubnews.image = subnews_image[index];
		
						subnews.push(singlesubnews);
					});
					//console.log("klasjdfkljasdlf",subnews);
		
					newsArray = {};
					newsArray.subnews = subnews;
		
					//catid = $('#categoryId').val();
		                        catid = $('#categoryId').val();
					newsArray.catid = catid;
	
					catidmore = $('#categoryIdmore').val();
					newsArray.catidmore = catidmore;
		
					date = $('#datetime').val();
					newsArray.date = date;
		
					is_important = $('#is_important').is(':checked');
					if(is_important)
						newsArray.is_important = is_important;
					
					is_cat_top_news = $('#is_cat_top_news').is(':checked');
					if(is_cat_top_news)
						newsArray.is_cat_top_news = is_cat_top_news;
		
					send_notification = $('#send_notification').is(':checked');
					if(send_notification)
						newsArray.send_notification = send_notification;
		
					heading = $('#newsheading').html().replace(/<div\s*[\/]?>/gi, "<br>").replace(/<div\s*[\/]?>/gi,"");
				
					newsArray.heading = heading;
					content = $('#newscontent').html().replace(/<div\s*[\/]?>/gi, "<br>").replace(/<\/div\s*[\/]?>/gi,"");
					
					newsArray.content = content;
	                                console.log(content);
		
					//mainimgtagline,mainimgname
					tagline = "";
					if($('#mainimgtagline').length > 0 )
						tagline = $('#mainimgtagline').val();
					newsArray.tagline = tagline;
		
					image = "";
					if($('#mainimgname').length > 0)
						image = $('#mainimgname').val();
					newsArray.image = image;
		                        console.log(newsArray);
					$.ajax({
						async: true,
						type:'POST',
						dataType:'json',
						url:xb_global_namespace.baseurl+"admin_requests/news/save_news",
						data:{
		
								"catid":newsArray.catid,
								"catidmore":newsArray.catidmore,
								"heading":newsArray.heading,
								"content":newsArray.content,
								"date":newsArray.date,
								"image":newsArray.image,
								"tagline":newsArray.tagline,
								"is_important":newsArray.is_important,
								"is_cat_top_news":newsArray.is_cat_top_news,
								"send_notification":newsArray.send_notification,
								"subnews":newsArray.subnews
							},
						success:function(datareceived,textStatus,jqXHR)
						{
							$("#loading_bar").css("display","none");
							//console.log(datareceived);
							if(datareceived['status'] == 'login')
							{
								var data = datareceived['data'];
								if(data['newsid'] > 0)
								{
									alert(data['msg']);
									$("#newsheading").html('');                                                   
									$("#newscontent").html('');
									$('#is_important').attr('checked', false); 
									$('#is_cat_top_news').attr('checked', false);
									$('#send_notification').attr('checked', false);
									$('#categoryId').find("option:selected").removeAttr('selected');
	
						                        $('#categoryIdmore').find("option:selected").prop("disabled",false);
									$('#categoryIdmore').multiselect('deselectAll',false);
									$('#categoryIdmore').multiselect('refresh');
									
									DROPZONE_DATA._thisDropZone.removeAllFiles();
									DROPZONE_DATA._mainDropZone.removeAllFiles();
									DROPZONE_DATA.flagSubmit = false;
								}
								else
									DROPZONE_DATA.flagSubmit = false;
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
		
		                }
			}
		});
	});

		$(window).bind('beforeunload',function(e){
				
				if(DROPZONE_DATA.TotalImageFiles > 0)
				{
					var msg = "";
					for(i=0;i<DROPZONE_DATA.fileList.length;i++)
					{
						//fileList[i] = fileList[i].replace(".","\\.");
						console.log(DROPZONE_DATA.fileList[i]);
						msg += DROPZONE_DATA.fileList[i]+"="+DROPZONE_DATA.fileList[i]+"&";
					}
					if( !DROPZONE_DATA.flagSubmit )
						return "You have Images pending to delete , Please delete these files before leaving the page.";
				}
		});

$("#loading_bar").css("display","none");


</script>