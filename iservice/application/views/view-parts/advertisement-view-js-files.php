<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
	$(function(){
        IMAGE_CHOOSER = {};
		IMAGE_CHOOSER.totalcount = 0;
		IMAGE_CHOOSER.lastimageid = 0;
		IMAGE_CHOOSER.myinfinitescroll = {};
		IMAGE_CHOOSER.myinfinitescroll.scrollEnable = true;	
		IMAGE_CHOOSER.myinfinitescroll.scrollBusy = false;	// is there any ongoing ajax request
		IMAGE_CHOOSER.myinfinitescroll.loadBefore = 100; // load this much pixel before the scrollbar reaches to end!

		$("#galleryScrollView").scroll(function(event)
		{
			//console.log(event);
			if(
				IMAGE_CHOOSER.myinfinitescroll.scrollEnable && 
				!IMAGE_CHOOSER.myinfinitescroll.scrollBusy && 
				$("#galleryContainer").height() - $("#galleryScrollView").height() - IMAGE_CHOOSER.myinfinitescroll.loadBefore <= $("#galleryScrollView").scrollTop() )
				{
					//console.log("*********************************************************");
					$('#loadMoreImagesContainer').css('display','block');
					IMAGE_CHOOSER.loadImages();
					//HOME_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = true;
					//HOME_VIEW_NAMESPACE.load_news($('#categoryId').val(),$('#fromDate').val(),$('#toDate').val(),"old");
				}
		});

		IMAGE_CHOOSER.loadImages = function(){
			$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					//url:"<?=base_url('admin_requests/news/get_news')?>",
					url:xb_global_namespace.baseurl+"admin_requests/gallery/get_images",
					data:{
						"lastimageid":IMAGE_CHOOSER.lastimageid
					},
					success:function(datarecieved,textStatus,jqXHR)
					{
						console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{

							IMAGE_CHOOSER.myinfinitescroll.scrollBusy = false;
							$('#loadMoreImagesContainer').css('display','none');
							data = datarecieved['data'];
							$.each(data, function(index, val) {
								IMAGE_CHOOSER.lastimageid = val.id;
								$(IMAGE_CHOOSER.getImageChooserDomString(val.imageurl,val.thumburl,val.imagename,val.id)).hide().appendTo('#galleryContainer').fadeIn('1000', function() {});
							});
						}
						else if(datarecieved['status'] == 'notlogin')
						{
							$(location).attr('href',$(location).attr('href'));
						}
					},
					error:function(jqXHR,textStatus,errorThrown)
					{
						$("#loading_bar").css("display","none");	
						console.log(jqXHR,textStatus,errorThrown);
					}
				});
		};

		$('#imageChooserModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){	
					//var _callerthis = $(event.relatedTarget);

					$('#loadMoreImagesContainer').css('display','block');
					IMAGE_CHOOSER.loadImages();
		});

		IMAGE_CHOOSER.getImageChooserDomString = function(imageurl,thumburl,imagename,imageid){
			var domString = '<div class="col-md-2 col-sm-2 col-xs-2 galleryImgContainer">'+
				        			'<div style="padding:2px;border:1px solid #aaa;">'+
				        				'<img src="'+imageurl+'" alt="image" style="height:80px;" class="center-cropped">'+
				        				'<div class="galleryHR"></div>'+
										'<div class="row">'+
											'<div class="col-md-6 col-sm-6 col-xs-6" style="padding-right:1px;">'+
												'<a href="'+imageurl+'" target="_blank" class="btn btn-default btn-block btn-xs" style="border-radius:0px;">'+
													'<i class="fa fa-eye"></i> View'+
												'</a>'+
											'</div>'+
											'<div class="col-md-6 col-sm-6 col-xs-6" style="padding-left:1px;">'+
												'<div class="btn btn-success btn-block btn-xs addImageBtn" style="border-radius:0px;" data-imageid="'+imageid+'" data-imageurl="'+imageurl+'" data-thumburl="'+thumburl+'" data-imagename="'+imagename+'">'+
													'<i class="fa fa-check"></i> Add'+
												'</div>'+
											'</div>'+
										'</div>'+
				        			'</div>'+
				        		'</div>';
			return domString;
		};


		$(document).on('click', '.addImageBtn', function(event) {
			//event.preventDefault();
			var _this = $(this);
			$('#imageChooserModal').modal('hide');
			$('#imageSelectorField>div.imageSelectBox').hide();

			$('#imageSelectorField>div.imageSelectedBox').find('img').attr("src",_this.data('thumburl'));
			$('#imageSelectorField').find('#imageid').val(_this.data('imageid'));
			$('#imageSelectorField>div.imageSelectedBox').show();
			/*console.log("Imageid",_this.data('imageid'));
			console.log("Imageurl",_this.data('imageurl'));
			console.log("thumburl",_this.data('thumburl'));
			console.log("imagename",_this.data('imagename'));*/
		});

		$(document).on('click', '#removeImgBtn', function(event) {
			$('#imageSelectorField>div.imageSelectedBox').hide();
			$('#imageSelectorField').find('#imageid').val("");
			$('#imageSelectorField>div.imageSelectBox').show();
		});

		/*add new advertisement*/

		function adjustCategoryContainerHeight()
		{
			$('#newsContainerColumn').css({
				"overflow":"auto",
				"height":$(window).height() - $('#newsContainerColumn').offset().top
			});
			console.log("height set:",$(window).height() - $('#newsContainerColumn').offset().top);
		}

		$('#addNewBtn').on('click',function(event){
			$('#newCategoryMainContainer').slideUp({duration:300,easing:"easeInQuart"}).slideDown('300', function() {
				adjustCategoryContainerHeight();
			});
			$(this).hide();
			$('#addNewCancelBtn').show();
			$('#newsContainerColumn').sortable("disable");
			
		});
		$('#addNewCancelBtn').on('click',function(event){
			$('#newCategoryMainContainer').slideUp({duration:300,easing:"easeInQuart"}).slideUp('300',function(){
				//adjustCategoryContainerHeight();
				$('#newsContainerColumn').css({
					"overflow":"auto",
					"height":"auto"
				});
			});
			$(this).hide();
			$('#addNewBtn').show();
			$('#newsContainerColumn').sortable("enable");
			
		});

        $('#createCategoryForm').on('submit',function(event) {
			event.preventDefault();
			var _this = $(this);
			var userid = $('#userselect').find('option:selected').val();
			var catid = $('#catselect').find('option:selected').val();
			var advtcityselectid = $('#advtcityselectid').find('option:selected').val();
			var advtisbusiness = $('#isbusiness').find('option:selected').val();

			var postData = _this.serializeArray();
			postData.push({"name":"userid","value":userid});
			postData.push({"name":"catid","value":catid});
			postData.push({"name":"bextraid","value":'1'});
			postData.push({"name":"advtcityselectid","value":advtcityselectid});
			postData.push({"name":"isbusiness","value":advtisbusiness});
			var imageid = $('#imageSelectorField').find('#imageid').val();
			//var imagearray = [imageid];
			//imagearray.push(imageid);
			//postData.push({"name":"images","value":imagearray});
			if(advtisbusiness==-1)
			{
                     alert("Please choose a business type first !");
			}else{
			if(imageid == "")
				alert("Please choose a advertisement image first !");
			else
			{
				if(advtcityselectid==0){
				alert("Please choose a city first !");
			    }else{
				console.log(postData);
				//$('#loadingscreen').css({"display": 'block'});
				$.ajax({                
						async:true,
						type:'POST',
						dataType:'json',
						//url:"<?=base_url('admin_requests/news/get_news')?>",
						url:xb_global_namespace.baseurl+"admin_requests/businessextra/add",
						data:postData,
						success:function(datarecieved,textStatus,jqXHR)
						{
							console.log(datarecieved);
							if(datarecieved['success'] == '1')
							{
								/*$('#imageSelectorField>div.imageSelectedBox').hide();
								$('#imageSelectorField').find('#imageid').val("");
								$('#imageSelectorField>div.imageSelectBox').show();
								$('#categoryname').val('');
								$('#loadingscreen').css({"display": 'none'});
								var data = datarecieved['data'];

								var reference_ar = new Array();
								$.each(data, function(index, val) {
									reference_ar.push( $(CATEGORY_NAMESPACE.getCategoryDomString(val.catid,val.name,val.parentid,val.sortorder,val.isenable,val.image)).css('visibility', 'hidden').appendTo('#newsContainerColumn') );

								});*/
								/*$('#newsContainerColumn').animate({"scrollTop":$('#newsContainerColumn').prop('scrollHeight')},500,function(){
									$.each(reference_ar, function(index, val) {
										val.css({'visibility':'visible','display':"none"});
										console.log(val);
										val.fadeIn('2200', function() {});
									});
								});*/
                               location.reload();
                                alert("success");
                               // $('#createCategoryForm').empty();
								
							}
							else if(datarecieved['status'] == 'notlogin')
							{
								$(location).attr('href',$(location).attr('href'));
							}
						},
						error:function(jqXHR,textStatus,errorThrown)
						{
							//$("#loading_bar").css("display","none");	
							console.log(jqXHR,textStatus,errorThrown);
						}
					});
			}
		  }
		 }
		});


    ADVERTISEMENT_NAMESPACE = {};
		ADVERTISEMENT_NAMESPACE.getDomString = function(id,des,useridid,expiredate,publishdate,isenable,imagedata){
			var enablecheck = "";
			//var disablestyle = "background-color:#"
			if(isenable == "1")
				enablecheck = " checked ";
			var domString = '<div class="well well-sm sortableitem" id="category-'+id+'">'+
								'<div class="row">'+
									'<div class="col-md-4">'+
										'<div style="width:100%;border:1px solid #fff;">'+
											'<img src="'+imagedata.thumburl+'" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-6">'+
										'<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>'+
										'<h4>'+des+'</h4>'+
										'<hr>'+
										'<b>Publish Date  </b><i>'+publishdate+'</i>'+
										'<br>'+
										'<b>Expiry Date </b><i>'+expiredate+'</i>'+
										'<br>'+
										/*'<b>Total views : </b><i>3174 Views</i>'+*/
									'</div>'+
									'<div class="col-md-2 col-sm-2 col-sm-2">'+
										/*'<div class="btn btn-default btn-block sortablehandle">'+
											'<span class="glyphicon glyphicon-move"></span> Move'+
											'<span class="label label-info pull-right " id="sortorderlabel-'+catid+'" >'+sortorder+'</span>'+
										'</div>'+*/
										/*'<div class="btn btn-danger btn-block" style="margin-bottom:5px;">'+
											'<span class="glyphicon glyphicon-remove"></span> Delete'+
										'</div>'+*/
										//'<div class="btn btn-default btn-block">'+
										//	'<span class="glyphicon glyphicon-remove"></span> Disable'+
										//'</div>'+
										'<input type="checkbox" name="" value="'+id+'" id="'+id+'" class="bootstraptogglebtn" '+enablecheck+' data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger" onchange=setDisablenable('+id+')>'+
										/*'<a href="'+xb_global_namespace.baseurl+'category/'+catid+'" class="btn btn-default btn-block" style="margin-top:5px;">'+
											'<span class="glyphicon glyphicon-eye-open"></span> View'+
										'</a>'+*/
									'</div>'+
								'</div>'+
							'</div>';
			return domString;
		};




    setDisablenable = function(id){
        	
        	var isenable;
        	/*var check = document.getElementById(id);
        	if(check && check.checked){
        		 isactive = 1;
        	}*/
        	/*if(document.getElementById(id).checked){
                isactive = 1;
        	}else{
        		 isactive = 0;
        	}*/

        	var x=$("#"+id).is(":checked");
        	console.log("call checkbox",id);
        	if(x==true){
                isenable = 1;
        	}else{
        		 isenable = 0;
        	}
        	
        	$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					url:xb_global_namespace.baseurl+"admin_requests/businessextra/setactive",
					data:{
						"id":id,
						"isenable":isenable
						
					},
					success:function(datarecieved,textStatus,jqXHR)
					{
						console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{
							//$('#loadMoreImagesContainer').css('display','none');
							

						}
						else if(datarecieved['status'] == 'notlogin')
						{
							$(location).attr('href',$(location).attr('href'));
						}
					},
					error:function(jqXHR,textStatus,errorThrown)
					{
						$("#loading_bar").css("display","none");	
						console.log(jqXHR,textStatus,errorThrown);
					}
				});
        }

		/*ADVERTISEMENT_NAMESPACE.loadAdver = function(){
			
            $('#newsContainerColumn').empty();
			$.ajax({                
						async:true,
						type:'POST',
						dataType:'json',
						url:xb_global_namespace.baseurl+"admin_requests/businessextra/get",
						data:{
							"userid":0,
							//"isenable":1
						},
						success:function(datarecieved,textStatus,jqXHR)
						{
							console.log(datarecieved);
							if(datarecieved['status'] == 'login')
							{
								var data = datarecieved['data'];
								$.each(data, function(index, val) {
									$(ADVERTISEMENT_NAMESPACE.getDomString(val.id,val.des,val.userid,val.expirydatetime,val.publishdatetime,val.isnable,val.image)).hide().appendTo('#newsContainerColumn').fadeIn('slow',function() {});
								});
								$('.bootstraptogglebtn').bootstrapToggle();
							}
							else if(datarecieved['status'] == 'notlogin')
							{
								$(location).attr('href',$(location).attr('href'));
							}
						},
						error:function(jqXHR,textStatus,errorThrown)
						{
							$("#loading_bar").css("display","none");	
							console.log(jqXHR,textStatus,errorThrown);
						}
					});

		}*/

/*ADVERTISEMENT_NAMESPACE.loadAdver();

*/		
//ADVERTISEMENT_NAMESPACE.loadAd();
				ADVERTISEMENT_NAMESPACE.loadAd = function(){
									$('#newsContainerColumn').empty();
									var cityid = false;
									var catid = false;
									var userid= false;
									var isbusiness= false;
									//if($("#city").val() !== null)
										cityid = $("#advtcityselectid").val();

									//if($("#subcategory").val() !== null)

										catid = $("#catselect").val();
										userid = $("#userselect").val();
										isbusiness = $("#isbusiness").val();
									//else 
										

                                   /*if(catid==null){
                                   	catid = 0;
                                   }*/
									console.log("catid:",catid);
									console.log("cityid:",cityid);
									console.log("userid:",userid);
									console.log("isbusiness:",isbusiness);
									//console.log("fileter:",USER_NAMESPACE.filter);
									$.ajax({                
											async:true,
											type:'POST',
											dataType:'json',
											url:xb_global_namespace.baseurl+"admin_requests/businessextra/get",
											data:{
												"catid":catid,
												"cityid":cityid,
												"userid":userid,
												"isbusiness":isbusiness
											},
											success:function(datarecieved,textStatus,jqXHR)
											{
												console.log(datarecieved);
												if(datarecieved['status'] == 'login')
												{
													//$('#loadMoreImagesContainer').css('display','none');
													data = datarecieved['data'];
													$('#merchantcontainer').empty();
													$.each(data, function(index, val) {
														//console.log(val);
														$(ADVERTISEMENT_NAMESPACE.getDomString(val.id,val.des,val.userid,val.expirydatetime,val.publishdatetime,val.isnable,val.image)).hide().appendTo('#newsContainerColumn').fadeIn('1000', function() {});
													});
													$('.bootstraptogglebtn').bootstrapToggle();

												}
												else if(datarecieved['status'] == 'notlogin')
												{
													$(location).attr('href',$(location).attr('href'));
												}
											},
											error:function(jqXHR,textStatus,errorThrown)
											{
												$("#loading_bar").css("display","none");	
												console.log(jqXHR,textStatus,errorThrown);
											}
										});
								}

								ADVERTISEMENT_NAMESPACE.loadAd();

$('#userselect').on('change',function(e){
			var _this = $(this);
			$('#newsContainerColumn').empty();
			ADVERTISEMENT_NAMESPACE.loadAd();
			
			/*var userid = _this.find('option:selected').val();
			console.log(userid);
            $('#newsContainerColumn').empty();
			$.ajax({                
						async:true,
						type:'POST',
						dataType:'json',
						url:xb_global_namespace.baseurl+"admin_requests/businessextra/get",
						data:{
							"userid":userid,
							//"isenable":1
						},
						success:function(datarecieved,textStatus,jqXHR)
						{
							console.log(datarecieved);
							if(datarecieved['status'] == 'login')
							{
								var data = datarecieved['data'];
								$.each(data, function(index, val) {
									$(ADVERTISEMENT_NAMESPACE.getDomString(val.id,val.des,val.userid,val.expirydatetime,val.publishdatetime,val.isnable,val.image)).hide().appendTo('#newsContainerColumn').fadeIn('slow',function() {});
								});
								$('.bootstraptogglebtn').bootstrapToggle();
							}
							else if(datarecieved['status'] == 'notlogin')
							{
								$(location).attr('href',$(location).attr('href'));
							}
						},
						error:function(jqXHR,textStatus,errorThrown)
						{
							$("#loading_bar").css("display","none");	
							console.log(jqXHR,textStatus,errorThrown);
						}
					});*/

		});
$('#catselect').on('change',function(e){
			var _this = $(this);
			console.log(_this.val());
			$('#newsContainerColumn').empty();
			ADVERTISEMENT_NAMESPACE.loadAd();

			});
$('#advtcityselectid').on('change',function(e){
			var _this = $(this);
			console.log(_this.val());
			$('#newsContainerColumn').empty();
			ADVERTISEMENT_NAMESPACE.loadAd();

			});
				//ADVERTISEMENT_NAMESPACE.loadAd();
				
	});
$('#isbusiness').on('change',function(e){

			var _this = $(this);
			console.log(_this.val());
  
			
			var isbusiness = _this.val();
        $.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:xb_global_namespace.baseurl+"admin_requests/category/getbusinesscat",
				data:{

						"isbusiness":isbusiness
					},
				success:function(datareceived,textStatus,jqXHR)
				{
					console.log(datareceived['data']);
					if(datareceived['status'] == 'login')
					{
						$('#catselect').empty();
						var domString = "";
						$.each(datareceived['data'],function(key,value){
							if(key == 0)
								domString += "<option value='"+key+"'>-- Choose Category --</option>";
							domString += "<option value='"+value.catid+"'>"+value.name+"</option>";
						});
						$('#catselect').append(domString);
						/*if(datareceived['data'].length==0){
							catid = rootcategory;
						}*/
					}
					else if(datareceived['status'] == 'notlogin')
					{$(location).attr('href',$(location).attr('href'));}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
				}
			});




			$('#newsContainerColumn').empty();
			ADVERTISEMENT_NAMESPACE.loadAd();

			});
</script>