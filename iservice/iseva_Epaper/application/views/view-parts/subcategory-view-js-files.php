<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" >

	$(function(){


		var LOCAL_NAMESPACE = {};
		LOCAL_NAMESPACE.CATEGORY_ID = location.href.substr(location.href.lastIndexOf("/")+1,location.href.length);
		console.log(LOCAL_NAMESPACE.CATEGORY_ID);

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

		$('#imageChooserModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){	
					//var _callerthis = $(event.relatedTarget);

					$('#loadMoreImagesContainer').css('display','block');
					IMAGE_CHOOSER.loadImages();
		});


		$('#createCategoryForm').on('submit',function(event) {
			event.preventDefault();
			var _this = $(this);
			var postData = _this.serializeArray();
			postData.push({"name":"parentid","value":LOCAL_NAMESPACE.CATEGORY_ID});
			var imageid = $('#imageSelectorField').find('#imageid').val();
			if(imageid == "")
				alert("Please choose a category image first !");
			else
			{
				console.log(postData);
				$('#loadingscreen').css({"display": 'block'});
				$.ajax({                
						async:true,
						type:'POST',
						dataType:'json',
						//url:"<?=base_url('admin_requests/news/get_news')?>",
						url:xb_global_namespace.baseurl+"admin_requests/category/add",
						data:postData,
						success:function(datarecieved,textStatus,jqXHR)
						{
							console.log(datarecieved);
							if(datarecieved['status'] == 'login')
							{
								$('#imageSelectorField>div.imageSelectedBox').hide();
								$('#imageSelectorField').find('#imageid').val("");
								$('#imageSelectorField>div.imageSelectBox').show();
								$('#categoryname').val('');
								$('#loadingscreen').css({"display": 'none'});
								var data = datarecieved['data'];

								var reference_ar = new Array();
								$.each(data, function(index, val) {
									reference_ar.push( $(CATEGORY_NAMESPACE.getCategoryDomString(val.catid,val.name,val.parentid,val.sortorder,val.isenable,val.image)).css('visibility', 'hidden').appendTo('#newsContainerColumn') );

								});
								$('#newsContainerColumn').animate({"scrollTop":$('#newsContainerColumn').prop('scrollHeight')},500,function(){
									$.each(reference_ar, function(index, val) {
										val.css({'visibility':'visible','display':"none"});
										console.log(val);
										val.fadeIn('2200', function() {});
									});
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
			}
		});


		var CATEGORY_NAMESPACE = {};
		CATEGORY_NAMESPACE.getCategoryDomString = function(catid,name,parentid,sortorder,isenable,imagedata){
				var enablecheck = "";
				//var disablestyle = "background-color:#"
				if(isenable == "1")
					enablecheck = " checked ";
				var domString = '<div class="well well-sm sortableitem" id="category-'+catid+'">'+
									'<div class="row">'+
										'<div class="col-md-4">'+
											'<div style="width:100%;border:1px solid #fff;">'+
												'<img src="'+imagedata.thumburl+'" alt="Image not Available!" class="img-responsive center-block" style="height:150px;">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-6">'+
											'<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>'+
											'<h4>'+name+'</h4>'+
											'<hr>'+
											'<b>Total categories : </b><i>542 categories</i>'+
											'<br>'+
											'<b>Total Users : </b><i>1673 Users</i>'+
											'<br>'+
											'<b>Total Merchants : </b><i>1357 Merchants</i>'+
											'<br>'+
											'<b>Total views : </b><i>3174 Views</i>'+
										'</div>'+
										'<div class="col-md-2 col-sm-2 col-sm-2">'+
											'<div class="btn btn-default btn-block sortablehandle">'+
												'<span class="glyphicon glyphicon-move"></span> Move'+
												'<span class="label label-info pull-right " id="sortorderlabel-'+catid+'" >'+sortorder+'</span>'+
											'</div>'+
											'<div class="btn btn-default btn-block" style="margin-bottom:5px;">'+
												'<span class="glyphicon glyphicon-pencil"></span> edit'+
											'</div>'+
											//'<div class="btn btn-default btn-block">'+
											//	'<span class="glyphicon glyphicon-remove"></span> Disable'+
											//'</div>'+
											'<input type="checkbox" name="" value="'+catid+'" class="bootstraptogglebtn" '+enablecheck+' data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger" >'+
											'<a href="'+xb_global_namespace.baseurl+'category/manage/'+catid+'" class="btn btn-default btn-block" style="margin-top:5px;">'+
												'<span class="glyphicon glyphicon-indent-right"></span> Manage'+
											'</a>'+
										'</div>'+
									'</div>'+
								'</div>';
				return domString;
			};
			CATEGORY_NAMESPACE.loadCategories = function(){
				$.ajax({                
							async:true,
							type:'POST',
							dataType:'json',
							url:xb_global_namespace.baseurl+"admin_requests/category/get",
							data:{
								"parentid":LOCAL_NAMESPACE.CATEGORY_ID,
								//"isenable":1
							},
							success:function(datarecieved,textStatus,jqXHR)
							{
								console.log(datarecieved);
								if(datarecieved['status'] == 'login')
								{
									var data = datarecieved['data'];
									$.each(data, function(index, val) {
										$(CATEGORY_NAMESPACE.getCategoryDomString(val.catid,val.name,val.parentid,val.sortorder,val.isenable,val.image)).hide().appendTo('#newsContainerColumn').fadeIn('slow',function() {});
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

		CATEGORY_NAMESPACE.loadCategories();

		$('#newsContainerColumn').sortable({
			axis:"y",
			item:".sortableitem",
			handle:".sortablehandle",
			//appendTo:document.body,
			//helper:"clone",
			revert:true,
			tolerance:"pointer",
			placeholder: "sortable-placeholder",
			forcePlaceholderSize: true,
			containment: "#newsContainerColumn",
			update:function(event,ui){
				//$('#saveSortBtn').removeAttr("disabled").removeClass('btn-default').addClass('btn-success').find('span.txt').text('Save Changes');
				$('#saveSortBtn').show();
				//console.log("sorting Updated!!!",$(this).sortable('toArray'));
			},	
		});

		$(document).on('change','.bootstraptogglebtn',function(){
			var _this = $(this);
			//console.log(_this);
			var val = _this[0].checked;
			if(val == true)
				val = 1;
			else if(val == false)
				val = 0;
			var catid = _this.val();

			$('#loadingscreen').css({"display": 'block'});
			$.ajax({                
						async:true,
						type:'POST',
						dataType:'json',
						url:xb_global_namespace.baseurl+"admin_requests/category/setstatus",
						data:{
							"catid":catid,
							"value":val
						},
						success:function(datarecieved,textStatus,jqXHR)
						{
							$('#loadingscreen').css({"display": 'none'});
							//console.log(datarecieved);
							if(datarecieved['status'] == 'login')
							{
								var data = datarecieved['data'];
								//var rowsaffected = datarecieved['rowsaffected'];
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
		});

		$('#saveSortBtn').on('click',function(){
			var _this = $(this);
			var sortorder = $('#newsContainerColumn').sortable('toArray')
			console.log(sortorder);
			$('#saveSortBtn').hide();
			$('#loadingscreen').css({"display": 'block'});
			$.ajax({                
						async:true,
						type:'POST',
						dataType:'json',
						url:xb_global_namespace.baseurl+"admin_requests/category/sort",
						data:{
							"sortorder":sortorder
						},
						success:function(datarecieved,textStatus,jqXHR)
						{
							$('#loadingscreen').css({"display": 'none'});
							//console.log(datarecieved);
							if(datarecieved['status'] == 'login')
							{
								var data = datarecieved['data'];
								var rowsaffected = datarecieved['rowsaffected'];

								if(rowsaffected > 0)
								{
									$.each(data, function(index, val) {
										//console.log(index,val);
										$('#sortorderlabel-'+index).text(val);
									});
								}
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

		});
		//$('#newsContainerColumn .sortablehandle').disableSelection();
		$(document).disableSelection();

	});

</script>