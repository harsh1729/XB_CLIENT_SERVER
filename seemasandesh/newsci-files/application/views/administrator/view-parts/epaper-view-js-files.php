<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<script src="<?=base_url();?>plugins/dropzone/js/dropzone.js"></script>
<!--********** loading IME methods ***************-->
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<!--************ IME loading end *****************-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.0/jquery.nicescroll.min.js"></script>

<script>

	EPAPER_NAMESPACE = {};
	EPAPER_NAMESPACE.get_preview_string = function(id,image,area){
		var previewString = '<div class="col-md-4">'+
								'<div class="well well-sm" style="">'+
									'<img src="'+image+'" alt="" class="center-cropped" style="">'+
									'<div style="color:#666;"><span class="glyphicon glyphicon-globe"></span> '+area+'</div>'+
									'<div>'+
										'<span class="glyphicon glyphicon-eye-open btn"></span>'+
										'<span data-epaperid="'+id+'" class="glyphicon glyphicon-remove btn pull-right" data-target="#customModal" data-toggle="modal"></span>'+
									'</div>'+
								'</div>'+
							'</div>';
		return previewString;
	};
/******************************************************************************/


			DROPZONE_DATA = {};
			DROPZONE_DATA.TotalPdfFiles = 0;
			DROPZONE_DATA.fileList = [];
			DROPZONE_DATA.fileDeleteList = [];
			DROPZONE_DATA.pdfTotalPagesList = [];
			DROPZONE_DATA.flagSubmit = 	false;
			DROPZONE_DATA._thisDropZone;



			// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
			var previewNode = document.querySelector("#template");
			previewNode.id = "";
			var previewTemplate = previewNode.parentNode.innerHTML;
			previewNode.parentNode.removeChild(previewNode);
			 
			var myDropzone = new Dropzone(document.getElementById("dropzoneContainer"), { // Make the whole body a dropzone
			  url: xb_global_namespace.baseurl+"admin_requests/epaper/upload_pdf", // Set the url
			  thumbnailWidth: 80,
			  thumbnailHeight: 80,
			  parallelUploads: 1,
			  previewTemplate: previewTemplate,
			  //autoQueue: false, // Make sure the files aren't queued until manually added
			  autoProcessQueue:false,
			  acceptedFiles:"application/pdf",
			  previewsContainer: "#previews", // Define the container to display the previews
			  clickable: ".fileinput-button", // Define the element that should be used as click trigger to select files.
			  init: function() {
			  	DROPZONE_DATA._thisDropZone = this;
			  }
			});
			 
			myDropzone.on("addedfile", function(file) {
			  // Hookup the start button
			  //file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
			  file.previewElement.querySelector(".start").onclick = function() { myDropzone.processFile(file); };
				
				DROPZONE_DATA.fileList.push(file.name);
				DROPZONE_DATA.fileDeleteList.push(file.name);
				DROPZONE_DATA.pdfTotalPagesList.push(0);
				DROPZONE_DATA.TotalPdfFiles = DROPZONE_DATA.TotalPdfFiles+1;

			});
			
			myDropzone.on('removedfile',function(file){
				//console.log(file.name);
				//console.log(file);
				if(DROPZONE_DATA.flagSubmit != true)
				{

					var pdfIndex = DROPZONE_DATA.fileList.indexOf(file.name);
                    var fileToDelete = DROPZONE_DATA.fileDeleteList[pdfIndex];
                    //alert(pdfIndex+"delete called : "+fileToDelete);
					DROPZONE_DATA.fileList.splice(pdfIndex,1);
                    DROPZONE_DATA.fileDeleteList.splice(pdfIndex,1);
                    DROPZONE_DATA.pdfTotalPagesList.splice(pdfIndex,1);
                    //document.getElementById("pdffile").value = "";
				
					//alert("jaspal canceled"+file.name);						
					DROPZONE_DATA.TotalPdfFiles = DROPZONE_DATA.TotalPdfFiles-1;

					$.ajax({
						url:xb_global_namespace.baseurl+'admin_requests/epaper/remove_pdf',
						dataType:"json",
						async: true,
						type: 'POST',
						data: {"filename":fileToDelete},
						success:function(datarecieved,textStatus,jqXHR)
						{
							//console.log("Removed successfully!",datarecieved);
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

			// Update the total progress bar
			myDropzone.on("totaluploadprogress", function(progress) {
			  document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
			});
			 
			myDropzone.on("sending", function(file,xhr,formData) {
				//formData.append("pageNumber",4545);
				//console.log(formData);
			  // Show the total progress bar when upload starts
			  document.querySelector("#total-progress").style.opacity = "1";
			  // And disable the start button
			  file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
			});

			myDropzone.on('success',function(file,response){
				
				 myDropzone.processQueue();
				 console.log('success');
				console.log(response);
				response = JSON.parse(response);
				console.log(response,file.previewElement.querySelector('.totalpages').innerHTML = response.totalpages+" page(s)");


				var pdfIndex = DROPZONE_DATA.fileList.indexOf(file.name);
				DROPZONE_DATA.pdfTotalPagesList.splice(pdfIndex,1,response.totalpages);
				DROPZONE_DATA.fileDeleteList.splice(pdfIndex,1,response.filename);

				if($('#saveBtn').hasClass('disabled'))
					$('#saveBtn').removeClass('disabled');
			});

			myDropzone.on('reset',function(){
				if(!$('#saveBtn').hasClass('disabled'))
					$('#saveBtn').addClass('disabled');

				DROPZONE_DATA.TotalPdfFiles = 0;
				DROPZONE_DATA.fileList = [];
				DROPZONE_DATA.fileDeleteList = [];
				DROPZONE_DATA.pdfTotalPagesList = [];
				DROPZONE_DATA.flagSubmit = 	false;
				
				console.log("resetted!!!");
			});
			myDropzone.on('queuecomplete',function(){
				console.log('queuecompleted!!!');
			});
			 
			// Hide the total progress bar when nothing's uploading anymore
			myDropzone.on("queuecomplete", function(progress) {
			    console.log('on queuecompleted!!!');
			  document.querySelector("#total-progress").style.opacity = "0";
			});
			 
			// Setup the buttons for all transfers
			// The "add files" button doesn't need to be setup because the config
			// `clickable` has already been specified.
			document.querySelector("#actions .start").onclick = function() {
			  //myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
			  myDropzone.processQueue();
			};
			document.querySelector("#actions .cancel").onclick = function() {
			  myDropzone.removeAllFiles(true);
			};



	$(function(){

		$('#datetime').datepicker({
			autoclose: true,
			todayBtn: "linked",
			todayHighlight: true,
			format : "dd-mm-yyyy",
		}).on('changeDate',function(){
			_this = $(this);
			datetime = _this.val();
			$('#loading_bar').css('display', 'block');
			$.ajax({
					url:xb_global_namespace.baseurl+'admin_requests/epaper/get_epaper_short',
					dataType:"json",
					async: true,
					type: 'POST',
					data: {
							"date":datetime
						},
					success:function(datarecieved,textStatus,jqXHR)
					{
						$('#loading_bar').css('display', 'none');
						//console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{
							domString = "";
							$.each(datarecieved['data'], function(index,val) {
								 if(index%3 == 0)
								 	domString += '<div class="row" style="margin-bottom:10px;"></div>';
								 domString += EPAPER_NAMESPACE.get_preview_string(val.id,val.preview,val.area);
								 if((index+1)%3 == 0 || index+1 == datarecieved['data'].length)
								 	domString += '</div>';
							});
							$('#today_epapers_container').empty();
							//console.log(domString);
							$('#today_epapers_container').append(domString);
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
		
		EPAPER_NAMESPACE.pdf2image = {};
		EPAPER_NAMESPACE.pdf2image.counter = 0;
		EPAPER_NAMESPACE.pdf2image.finaltimestamp4name = 0;
		EPAPER_NAMESPACE.pdf2image.now_page_number = 1;
		EPAPER_NAMESPACE.pdf2image.totalpdf = 0;
		EPAPER_NAMESPACE.pdf2image.totalpdfpages = 0;
		EPAPER_NAMESPACE.pdf2image.imagecreate = function()
		{
			console.log(DROPZONE_DATA.fileDeleteList[EPAPER_NAMESPACE.pdf2image.counter]);
			$.ajax({
				url:xb_global_namespace.baseurl+'admin_requests/epaper/pdf2image',
				dataType:"json",
				async: true,
				type: 'POST',
				data: {
						"filename":DROPZONE_DATA.fileDeleteList[EPAPER_NAMESPACE.pdf2image.counter],
						"epaperfilename":EPAPER_NAMESPACE.pdf2image.finaltimestamp4name,
						"pagenumberstart":EPAPER_NAMESPACE.pdf2image.now_page_number,
						//"arrayindex":EPAPER_NAMESPACE.pdf2image.counter
				},
				success:function(datarecieved,textStatus,jqXHR)
				{
					//$('#loading_bar').css('display', 'none');
					console.log(datarecieved);
					if(datarecieved['status'] == 'login')
					{
						EPAPER_NAMESPACE.pdf2image.now_page_number += DROPZONE_DATA.pdfTotalPagesList[EPAPER_NAMESPACE.pdf2image.counter];
						EPAPER_NAMESPACE.pdf2image.counter++;

						progress_percent_width = 100*(EPAPER_NAMESPACE.pdf2image.counter/EPAPER_NAMESPACE.pdf2image.totalpdf);
						console.log("total percentage : "+progress_percent_width);
						$('#saving_bar').find('.progress-bar').css({
							"width":progress_percent_width+"%"
						});

						if(EPAPER_NAMESPACE.pdf2image.counter < DROPZONE_DATA.fileDeleteList.length )
							EPAPER_NAMESPACE.pdf2image.imagecreate();
						if(EPAPER_NAMESPACE.pdf2image.counter == DROPZONE_DATA.fileDeleteList.length )
						{
							console.log("SAved Epaper Called !!!!");
							$.ajax({
									url:xb_global_namespace.baseurl+'admin_requests/epaper/save_epaper',
									dataType:"json",
									async: true,
									type: 'POST',
									data: {
										"date":$('#datetime').val(),
										"areacodeid":$('#areacode').val(),
										"filename":EPAPER_NAMESPACE.pdf2image.finaltimestamp4name+".pdf",
										"uploadedfiles":DROPZONE_DATA.fileDeleteList,
										"totalpages":EPAPER_NAMESPACE.pdf2image.totalpdfpages
									},
									success:function(datarecieved,textStatus,jqXHR)
									{
										console.log(datarecieved);

										domString = "";
										$.each(datarecieved['data'], function(index,val) {
											 if(index%3 == 0)
											 	domString += '<div class="row" style="margin-bottom:10px;"></div>';
											 domString += EPAPER_NAMESPACE.get_preview_string(val.id,val.preview,val.area);
											 if((index+1)%3 == 0 || index+1 == datarecieved['data'].length)
											 	domString += '</div>';
										});
										$('#today_epapers_container').empty();
										//console.log(domString);
										$('#today_epapers_container').append(domString);
										
										DROPZONE_DATA.flagSubmit = true;
										DROPZONE_DATA._thisDropZone.removeAllFiles();

										EPAPER_NAMESPACE.pdf2image.counter = 0;
										EPAPER_NAMESPACE.pdf2image.finaltimestamp4name = 0;
										EPAPER_NAMESPACE.pdf2image.now_page_number = 1;
										EPAPER_NAMESPACE.pdf2image.totalpdf = 0;
										$('#saving_bar').css({"display":"none"});
									},
									error: function(jqXHR, textStatus, errorThrown)
									{
										console.log("Error!",jqXHR,textStatus,errorThrown);
									}
							});
						}
					}
					else if(datarecieved['status'] == 'notlogin')
					{$(location).attr('href',$(location).attr('href'));}
				},
				error: function(jqXHR, textStatus, errorThrown)
				{
					$('#saving_bar').css({"display":"none"});
					alert("Not Saved !!!");
					console.log("file not Remove!!",jqXHR,textStatus,errorThrown);
				}
			});
		}
		
		$('#saveBtn').on('click',function(event){
			filename = $('#pdffile').val();
			if(filename == "")
				alert("Please upload E-paper file first !");
			//else if($('#datetime').val() == "")
			//	alert("Please Choose Date first !");
			else if($('#areacode').val() == "")
				alert("Please Choose Area first !");
			else if(DROPZONE_DATA.fileDeleteList.length < 1)
				alert("No Files uploaded, please upload atleat one file !");
			else if(DROPZONE_DATA._thisDropZone.getQueuedFiles().length > 0)
				alert("Please upload or delete all files !!!");
			else if(DROPZONE_DATA._thisDropZone.getUploadingFiles().length > 0)
				alert("Be patience, while files are uploading !!!");
			else
			{
				console.log(DROPZONE_DATA.fileDeleteList,DROPZONE_DATA.pdfTotalPagesList);
				$('#saving_bar').find('.progress-bar').css({
							"width":"1%"
						});
				$('#saving_bar').css({"display":"inline"});
				EPAPER_NAMESPACE.pdf2image.finaltimestamp4name = Date.now()+Math.floor((Math.random()*13)+3)+Date.now();
				EPAPER_NAMESPACE.pdf2image.totalpdf = DROPZONE_DATA.fileDeleteList.length;
				EPAPER_NAMESPACE.pdf2image.totalpdfpages = 0;
				$.each(DROPZONE_DATA.pdfTotalPagesList,function(index,el){
					EPAPER_NAMESPACE.pdf2image.totalpdfpages += el;
				});
				EPAPER_NAMESPACE.pdf2image.imagecreate();
			}
			
		});

		$('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
				var _this = $(event.relatedTarget);
				var epaperid = _this.data('epaperid');
				//console.log(epaperid);
						
				var modal = $(this);
				modal.find('#DeleteEpaper').data("epaperid",epaperid);
				modal.find('.modal-body').text('This will delete Epaper forever !');
				modal.find('#DeleteEpaper').show();
				$('#customModal').find('[data-dismiss="modal"]').show();
				modal.find('#DeleteEpaper').text("Delete");
		});

		$('#DeleteEpaper').on('click',function(){
			var _this = $(this);
			$('#customModal').find('.modal-body').text('');
			$('#customModal').find('#DeleteEpaper').hide();
			$('#customModal').find('[data-dismiss="modal"]').hide();
			$('#customModal').find('.modal-body').append('<i class="fa fa-spinner fa-pulse"></i> Deleting Epaper... ');
			var epaperid = _this.data('epaperid');
			//console.log(epaperid);
			$.ajax({
					type:'POST',
					async:true,
					dataType:"json",
					data:{
							"epaperid":epaperid,
							"date":$('#datetime').val()
						},
					url:xb_global_namespace.baseurl+"admin_requests/epaper/delete_epaper",
					success: function(datareceived, textStatus, jqXHR)
					{
						console.log(datareceived);
						$('#customModal').modal('hide');

						if(datareceived['status'] == 'login')
						{
							domString = "";
							$.each(datareceived['data'], function(index,val) {
								 if(index%3 == 0)
								 	domString += '<div class="row" style="margin-bottom:10px;"></div>';
								 domString += EPAPER_NAMESPACE.get_preview_string(val.id,val.preview,val.area);
								 if((index+1)%3 == 0 || index+1 == datareceived['data'].length)
								 	domString += '</div>';
							});
							$('#today_epapers_container').empty();
							//console.log(domString);
							$('#today_epapers_container').append(domString);
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

	$(document).ready(function() {
		$('#loading_bar').css('display', 'none');
		try{
			$("#today_epapers_container").niceScroll({
				touchbehavior : true,
				cursorwidth : '8',
				bouncescroll : true
			});
		}
		catch(err){console.log(err);}
	});
</script>