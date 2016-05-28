<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>plugins/dropzone/js/dropzone.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.0.0/js/bootstrap-toggle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<!--********** loading IME methods ***************-->
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<!--************ IME loading end *****************-->
<script>
	$(document).ready(function(){ 
		var formSubmitFlag = false;
	var _thisDropzone;
	Dropzone.options.advtDropzone = {
				addRemoveLinks: true,
				parallelUploads: 1,
				acceptedFiles: 'image/*, audio/*, video/*',
				thumbnailWidth: 300,
				thumbnailHeight:300,
				maxFiles: 1,
				uploadMultiple: false,
				init: function() {
						
						_thisDropzone = this;
						
						this.on("addedfile", function(file) {
								///console.log("***** ADDEDD fILE cALLED !	***********");
							});
						this.on("success", function(files, response) {
								///console.log("***** SUCCESS cALLED !	***********");
								console.log(response);
								$('#advtImage').val(response);
							});
						this.on("removedfile", function(file) {
								///console.log("***** REMOVED fILE cALLED !	***********");
								var img = $('#advtImage').val();
								if( formSubmitFlag !== true )
								{
									$.ajax({
											async:true,
											data:{"filename":img},
											url:xb_global_namespace.baseurl+'admin_requests/advt/remove_image',
											type:"POST",
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
												console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
												alert(textStatus);
											}
										});
								}
							});
						this.on("maxfilesexceeded", function(file) {
								///console.log("***** MAX FILES EXCEEDED cALLED !	***********");
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
										//console.log("addedFile Called!!");
										
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
										//console.log('removedFile Called : flag:'+editflagSubmit+" : Total : "+editTotalImageFiles);
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
											
											$.ajax({
													url:xb_global_namespace.baseurl+'admin_requests/advt/remove_image',
													async:true,
													data:{"filename":editfileToDelete},
													success: function(data, textStatus, jqXHR)
													{
														console.log(data);
													},
													error: function(jqXHR, textStatus, errorThrown)
													{
														console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
														alert(textStatus);
													}
													
												});
										}
									});
								this.on("maxfilesexceeded", function(file){
										//console.log("maxfiles exceeded!! : Total : " +editTotalImageFiles);
										this.removeAllFiles();
										this.addFile(file);
									});
							},
					};

		$('#advtType').on('change',function(event){
			var _this = $(this);
			if(_this.find(':selected').data('detail') != 'hideadvttypedetail')
			{
				$('#advttypedetail').text(_this.find(':selected').data('detail'));
				$('#advttypedetail').prepend("<span class='glyphicon glyphicon-info-sign'></span> ");
				$('#advttypedetail').css({
					display: 'block'
				});
			}
			else
			{
				$('#advttypedetail').css({
					display: 'none'
				});
			}
		});

		$("input[type='checkbox']").bootstrapToggle({
				on:"<span class='glyphicon glyphicon-ok-circle'></span> Enable",
				off:"<span class='glyphicon glyphicon-ban-circle'></span> Disable",
				onstyle:"success",
				offstyle:"danger",
		});
		$('#allAdvtHeading').on('click',function(){
				$('#allAdvtContainer').slideToggle('slow','easeOutCubic');
		});
		$('#advtForm').on('submit',function(event){
			advttxt = $.trim($('#advttxt').val());
			if(advttxt == "" && _thisDropzone.getAcceptedFiles().length <1 )
				alert("Please Write some text or upload any image for Advertisement ! ");
			else
			{
				$('#loading_bar').removeClass('hidden');
				formSubmitFlag = true;
				//var advtTxt = $('#advtTxt').val();
				//var advtImg = $('#advtImage').val();
				//var advtType = $('#advtType').val();
				
				var _this = $(this);
				var postData = _this.serializeArray();
	
				console.log("advtType:"+advtType);
				console.log(postData);
				$.ajax({
						data:postData,
						async: true,
						type: 'POST',
						dataType:"json",
						url:xb_global_namespace.baseurl+"admin_requests/advt/save_advt",
						success: function(data, textStatus, jqXHR)
						{
							console.log("Returned data : "+data);
							_thisDropzone.removeAllFiles();
							$('#advttxt').val("");
							$('#advtImage').val("");
							$('#loading_bar').addClass('hidden');
							formSubmitFlag = false;
							$(location).attr('href',$(location).attr('href'));
							//getAllAdvt();
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
							alert(textStatus);
							$('#loading_bar').addClass('hidden');
							formSubmitFlag = false;
						}
					});
			}
			event.preventDefault();
		});
		$('#allAdvtContainer').accordion({
			header:"> div > div.panel-heading",
			collapsible: true,
			heightStyle:"content",
		});
		$('.config-time-btn-cls').on('click',function(e){
			var clkId = $(this).data('advtid');
			//console.log($('#time-constant-'+clkId).val(),$('#time-field-'+clkId).val());
			
			$('#loading_bar').removeClass('hidden');
				$.ajax({
						url:xb_global_namespace.baseurl+"admin_requests/advt/update_advttype_timing",
						dataType:"json",
						async: true,
						type: 'POST',
						data: {intervalvalue:$('#time-constant-'+clkId).val(),intervalfield:$('#time-field-'+clkId).val(),id:clkId},
						success: function(datarecieved, textStatus, jqXHR)
						{
							$('#loading_bar').addClass('hidden');
							if(datarecieved['status'] == 'login')
                            {}
                            else if(datarecieved['status'] == 'notlogin')
                            {$(location).attr('href',$(location).attr('href'));}
							//console.log(data);
						},
						error: function(jqXHR, textStatus, errorThrown) 
						{
							$('#loading_bar').addClass('hidden');
							console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
							alert(textStatus);
						},
					});
		});
		$('.advt-type-status').on('change',function(event){
			$('#loading_bar').removeClass('hidden');
			$.ajax({
					url:xb_global_namespace.baseurl+"admin_requests/advt/update_advttype_status",
					dataType:"json",
					async: true,
					type: 'POST',
					data: {id:$(this).data('advtid'),status:$(this).prop('checked')},
					success: function(datarecieved, textStatus, jqXHR)
					{
						$('#loading_bar').addClass('hidden');
							if(datarecieved['status'] == 'login')
                            {}
                            else if(datarecieved['status'] == 'notlogin')
                            {$(location).attr('href',$(location).attr('href'));}
						//console.log(data);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						$('#loading_bar').addClass('hidden');
						console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
						alert(textStatus);
					},
				});
		});
		$('.advt-status').on('change',function(event){
			$('#loading_bar').removeClass('hidden');
			$.ajax({
					url:xb_global_namespace.baseurl+"admin_requests/advt/update_advt_status",
					dataType:"json",
					async: true,
					type: 'POST',
					data: {id:$(this).data('advtid'),status:$(this).prop('checked')},
					success: function(datarecieved, textStatus, jqXHR)
					{
						$('#loading_bar').addClass('hidden');
							if(datarecieved['status'] == 'login')
                            {}
                            else if(datarecieved['status'] == 'notlogin')
                            {$(location).attr('href',$(location).attr('href'));}
						console.log(data);
					},
					error: function(jqXHR, textStatus, errorThrown) 
					{
						$('#loading_bar').addClass('hidden');
						console.log(jqXHR , textStatus , errorThrown);
						alert(textStatus);
					},
				});
		});

		$('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
						var button = $(event.relatedTarget);
						var advtId = button.data('id');
						console.log( advtId );
				
					var modal = $(this);
					modal.find('#DeleteAdvt').data("advtid",advtId);
		});
	
		$('#DeleteAdvt').on('click',function(){
			var _this = $(this);
			$('#customModal').modal('hide');
			var advtId = _this.data('advtid');
			//console.log("advt id is :"+advtId);
			
			$.ajax({
					type:'POST',
					async:true,
					//dataType:"json",
					data:{advtid:advtId},
					url:xb_global_namespace.baseurl+"admin_requests/advt/delete_advt",
					success: function(data, textStatus, jqXHR)
					{
						console.log(data);
						//getAllAdvt();
						$('#loadingDiv').addClass('hidden');
						$(location).attr('href',$(location).attr('href'));
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						$('#loadingDiv').addClass('hidden');
						console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
						alert(textStatus);
					}
				});
		});	

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
						var advtId = button.data('id');
						//console.log( "advtId:"+advtId );
						var name = button.data('txt');
						//console.log( "name:"+name );
						var image = button.data('image');
						var weburl  =button.data('weburl');
						//console.log( "image:"+image );
						//console.log( image.substring(image.lastIndexOf('/')+1) );
					
				var modal = $(this);
				modal.find('#updateAdvt').data("advtid",advtId);
				modal.find('#advtNameInput').val(name);
				modal.find('#advtweburl').val(weburl);
				
				_editDropzone.removeAllFiles();
				
				if(image != "" )
				{
					var mockFile = { 
										name: image.substring(image.lastIndexOf('/')+1), 
										size: 12345, 
										type: 'image/*', 
										status: Dropzone.ADDED, 
										url: image,
										accepted:true
									};
									
					$('#editImage').val(image.substring(image.lastIndexOf('/')+1));
									
					_editDropzone.emit("addedfile", mockFile);
					
					// And optionally show the thumbnail of the file:
					_editDropzone.emit("thumbnail", mockFile, image);
					
					_editDropzone.files.push(mockFile);
					
					editflagSubmit = true;
					editTotalImageFiles = 0;
				}
		});

		$('#updateAdvt').on('click',function(){
			var _this = $(this);
			$('#editModal').modal('hide');
			$('#loadingDiv').removeClass('hidden');
			var advtId = _this.data('advtid');
			//console.log("cat id is :"+catId);
			var advtName = $('#advtNameInput').val();
			var weburl = $('#advtweburl').val();
			//console.log("cat Name is :"+catName);
			var image = $('#editImage').val();
			//console.log("image :"+image);
			
			$.ajax({
					type:'POST',
					async:true,
					dataType:"json",
					data:{"advtid":advtId,"weburl":weburl,"advttxt":advtName,"image":image},
					url:xb_global_namespace.baseurl+"admin_requests/advt/update_advt",
					success: function(data, textStatus, jqXHR)
					{
						console.log(data);
						editflagSubmit = true;
						//getAllAdvt();
						$('#loadingDiv').addClass('hidden');
						$(location).attr('href',$(location).attr('href'));
					},
					error: function(jqXHR, textStatus, errorThrown)
					{
						$('#loadingDiv').addClass('hidden');
						console.log(jqXHR , textStatus , errorThrown);
						alert(textStatus);
					}
				});
		});	


		$('#loading_bar').addClass('hidden');
	});
</script>