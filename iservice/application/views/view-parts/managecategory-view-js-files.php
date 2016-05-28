<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(function(){

		var LOCAL_NAMESPACE = {};
		LOCAL_NAMESPACE.CATEGORY_ID = location.href.substr(location.href.lastIndexOf("/")+1,location.href.length);
		console.log(LOCAL_NAMESPACE.CATEGORY_ID);

		var CONTROLS_NAMESPACE = {};
		CONTROLS_NAMESPACE.controlsCount = 0;
		CONTROLS_NAMESPACE.spinnerValuesCount = 0;
		CONTROLS_NAMESPACE.getEditText = function(count,isnew,label,holder,isreq )
		{
			var domString = "";
			if(isnew)
			{
				domString = '<div class="well well-sm sortableitem" id="new_edt_'+count+'" >'+
								'<h4>EditText<span class="glyphicon glyphicon-remove pull-right removecontrolbtn"></span></h4>'+
					   			'<div class="row">'+
									'<div class="col-md-6">'+
										'<input type="text" name="new_edt_'+count+'" required="required"  value="" placeholder="Enter Label Value" style="width:100%;" class="form-control">'+
										'<br/>'+
										'<input type="text" name="new_edt_'+count+'_plh" required="required"  value="" placeholder="Enter Place Holder Value" style="width:100%;" class="form-control">'+
									'</div>'+
									'<div class="col-md-4">'+
									'</div>'+
									'<div class="col-md-2 text-right">'+
										'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
										'<br/>'+
										'<input type="checkbox" value="1" style="zoom:2.5" name="new_edt_'+count+'_req">'+
									'</div>'+
									/*'<div class="col-md-2 text-right">'+
										'<input type="checkbox" value="" name="isRequired" class="form-control">'+
									'</div>'+*/
								'</div>'+
							'</div>';
			}
			else
			{
				var chkString = '<input type="checkbox" value="1" style="zoom:2.5" name="upt_edt_'+count+'_req">'

				if(isreq == 1){
					chkString = '<input type="checkbox" value="1" checked="true" style="zoom:2.5" name="upt_edt_'+count+'_req">'
				}

				domString = '<div class="well well-sm sortableitem" id="upt_edt_'+count+'" >'+
								'<h4>EditText</h4>'+
					   			'<div class="row">'+
									'<div class="col-md-6">'+
										'<input type="text" name="upt_edt_'+count+'" required="required"  value="'+label+'" placeholder="Enter Label Value" style="width:100%;" class="form-control">'+
										'<br/>'+
										'<input type="text" name="upt_edt_'+count+'_plh" required="required"  value="'+holder+'"   placeholder="Enter Place Holder Value" style="width:100%;" class="form-control">'+
									'</div>'+
									'<div class="col-md-4">'+
									'</div>'+
									'<div class="col-md-2 text-right">'+
										'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
										'<br/>'+
										chkString+
									'</div>'+
									/*'<div class="col-md-2 text-right">'+
										'<input type="checkbox" value="" name="isRequired" class="form-control">'+
										//'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
									'</div>'+*/
								'</div>'+
							'</div>';
			}
			return domString;

		};
		CONTROLS_NAMESPACE.getSingleImage = function(count,isnew,label,isreq)
		{
			var domString = "";
			if(isnew)
			{
				domString = '<div class="well well-sm sortableitem" id="new_img_'+count+'" >'+
									'<h4>Single Image<span class="glyphicon glyphicon-remove pull-right removecontrolbtn"></span></h4>'+
					   				'<div class="row">'+
										'<div class="col-md-6">'+
											'<input type="text" name="new_img_'+count+'" required="required"  value="" placeholder="Enter Label Value" style="width:100%;" class="form-control">'+
										'</div>'+
										'<div class="col-md-4">'+
										'</div>'+
										'<div class="col-md-2 text-right">'+
											'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
											'<br/>'+
										'<input type="checkbox" value="1" style="zoom:2.5" name="new_img_'+count+'_req">'+
										'</div>'+
										/*'<div class="col-md-2 text-right">'+
										'<input type="checkbox" value="" name="isRequired" class="form-control">'+
										//'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
									'</div>'+*/
									'</div>'+
								'</div>';
			}
			else
			{
				var chkString = '<input type="checkbox" value="1" style="zoom:2.5" name="upt_img_'+count+'_req">'

				if(isreq == 1){
					chkString = '<input type="checkbox" value="1" checked="true" style="zoom:2.5" name="upt_img_'+count+'_req">'
				}

				domString = '<div class="well well-sm sortableitem" id="upt_img_'+count+'" >'+
									'<h4>Single Image</h4>'+
					   				'<div class="row">'+
										'<div class="col-md-6">'+
											'<input type="text" name="upt_img_'+count+'" required="required"  value="'+label+'" placeholder="Enter Label Value" style="width:100%;" class="form-control">'+
										'</div>'+
										'<div class="col-md-4">'+
										'</div>'+
										'<div class="col-md-2 text-right">'+
											'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
											'<br/>'+
										chkString+
										'</div>'+
										/*'<div class="col-md-2 text-right">'+
										'<input type="checkbox" value="" name="isRequired" class="form-control">'+
										//'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
									'</div>'+*/
									'</div>'+
								'</div>';
			}
			return domString;
		};
		CONTROLS_NAMESPACE.getMultipleImages = function(count,isnew,label,isreq)
		{
			var domString = "";
			if(isnew)
			{
				domString = '<div class="well well-sm sortableitem" id="new_glr_'+count+'" >'+
								'<h4>Multiple Images<span class="glyphicon glyphicon-remove pull-right removecontrolbtn"></span></h4>'+
				   				'<div class="row">'+
									'<div class="col-md-6">'+
										'<input type="text" name="new_glr_'+count+'" required="required"  value="" placeholder="Enter Label Value" style="width:100%;" class="form-control">'+
									'</div>'+
									'<div class="col-md-4">'+
									'</div>'+
									'<div class="col-md-2 text-right">'+
										'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
										'<br/>'+
										'<input type="checkbox" value="1" style="zoom:2.5" name="new_glr_'+count+'_req">'+
									'</div>'+
									/*'<div class="col-md-2 text-right">'+
										'<input type="checkbox" value="" name="isRequired" class="form-control">'+
										//'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
									'</div>'+*/
								'</div>'+
							'</div>';
			}
			else
			{
				var chkString = '<input type="checkbox" value="1" style="zoom:2.5" name="upt_glr_'+count+'_req">'

				if(isreq == 1){
					chkString = '<input type="checkbox" value="1" checked="true" style="zoom:2.5" name="upt_glr_'+count+'_req">'
				}

				domString = '<div class="well well-sm sortableitem" id="upt_glr_'+count+'" >'+
								'<h4>Multiple Images</h4>'+
				   				'<div class="row">'+
									'<div class="col-md-6">'+
										'<input type="text" name="upt_glr_'+count+'" required="required"  value="'+label+'" placeholder="Enter Label Value" style="width:100%;" class="form-control">'+
									'</div>'+
									'<div class="col-md-4">'+
									'</div>'+
									'<div class="col-md-2 text-right">'+
										'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
										'<br/>'+
										chkString+
									'</div>'+
									/*'<div class="col-md-2 text-right">'+
									'<input type="checkbox" value="" name="isRequired" class="form-control">'+
										//'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
									'</div>'+	*/
								'</div>'+
							'</div>';
			}
			return domString;
		};
		CONTROLS_NAMESPACE.getSpinner = function(count,isnew,label,itemsarray,isreq)
		{
			var domString = "";
			if(isnew)
			{

				domString = '<div class="well well-sm sortableitem" id="new_spr_'+count+'" >'+
								'<h4>Dropdown List<span class="glyphicon glyphicon-remove pull-right removecontrolbtn"></span></h4>'+
				   				'<div class="row">'+
									'<div class="col-md-6">'+
										'<input type="text" name="new_spr_'+count+'" required="required"  value="" placeholder="Enter Label Value" style="width:100%;" class="form-control">'+
									'</div>'+
									'<div class="col-md-4">'+
										''+
									'</div>'+
									'<div class="col-md-2 text-right">'+
									
										'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
										'<br/>'+
										'<input type="checkbox" value="1" style="zoom:2.5" name="new_spr_'+count+'_req">'+
									'</div>'+
									
									/*'<div class="col-md-2 text-right">'+
										'<input type="checkbox" value="" name="isRequired" class="form-control">'+
										//'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
									'</div>'+*/
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-12">'+
										'<hr>'+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-6">'+
										'<input type="text" name="" value="" placeholder="list item" class="form-control newspinnervalueinput" style="margin-top:30px;">'+
										'<div class="text-center" style="margin-top:6px;">'+
											'<div class="btn btn-info spinneraddtolistbtn addNew">'+
												'Add to List&nbsp;&nbsp;'+
												'<span class="glyphicon glyphicon-menu-right"></span>'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class="col-md-6">'+
										'<div style="height:150px;border:1px solid #66afe9;padding:4px;overflow:auto;" id="sort_new_spr_'+count+'" class="spinnervaluescontainer">'+
											//'<div style="width:100%;display:inline-block">'+
											//	'<div style="width:100%;border:1px solid #121212;padding:2px;float:left;">'+
											//		'option 1'+
											//		'<span class="glyphicon glyphicon-remove-circle pull-right" style="color:#ff0000;padding-top:2px;cursor:pointer;">'+
											//		'</span>'+
											//	'</div>'+
											//'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
			}
			else
			{
				var chkString = '<input type="checkbox" value="1" style="zoom:2.5" name="upt_spr_'+count+'_req">'

				if(isreq == 1){
					chkString = '<input type="checkbox" value="1" checked="true" style="zoom:2.5" name="upt_spr_'+count+'_req">'
				}

				domString = '<div class="well well-sm sortableitem" id="upt_spr_'+count+'" >'+
								'<h4>Dropdown List</h4>'+
				   				'<div class="row">'+
									'<div class="col-md-6">'+
										'<input type="text" name="upt_spr_'+count+'" required="required"  value="'+label+'" placeholder="Enter Label Value" style="width:100%;" class="form-control">'+
									'</div>'+
									'<div class="col-md-4">'+
										''+
									'</div>'+
									'<div class="col-md-2 text-right">'+
										'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
										'<br/>'+
										chkString+
									'</div>'+
									/*'<div class="col-md-2 text-right">'+
										'<input type="checkbox" value="" name="isRequired" class="form-control">'+
										//'<div class="btn btn-warning sortablehandle"><span class="glyphicon glyphicon-move"></span></div>'+
									'</div>'+*/
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-12">'+
										'<hr>'+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-6">'+
										'<input type="text" name="" value="" placeholder="list item" class="form-control newspinnervalueinput" style="margin-top:30px;">'+
										'<div class="text-center" style="margin-top:6px;">'+
											'<div class="btn btn-info spinneraddtolistbtn addNew">'+
												'Add to List&nbsp;&nbsp;'+
												'<span class="glyphicon glyphicon-menu-right"></span>'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class="col-md-6">'+
										'<div style="height:150px;border:1px solid #66afe9;padding:4px;overflow:auto;" id="sort_upt_spr_'+count+'" class="spinnervaluescontainer">';
											$.each(itemsarray, function(i,v) {
												CONTROLS_NAMESPACE.spinnerValuesCount = i+1;
												domString += CONTROLS_NAMESPACE.getSpinnerItem(v.name,v.id,false);
											});
						   domString += '</div>'+
									'</div>'+
								'</div>'+
							'</div>';
			}
			return domString;
			
		};
		CONTROLS_NAMESPACE.getSpinnerItem = function(value,count,isnew){
			var domString = "";
			if(isnew)
			{
				domString = '<div style="position:relative;margin-bottom:4px;" id="new_listitem_'+count+'" class="spinneritem">'+
								'<input style="width:100%;border:1px solid #121212;padding:2px;" id="new_list_item_'+count+'" value="'+value+'" />'+
								'<span class="glyphicon glyphicon-remove-circle pull-right" style="color:#ff0000;padding-top:2px;position:absolute;top:4px;right:4px;cursor:pointer;">'+
								'</span>'+
								'<span class="glyphicon glyphicon-move pull-right spinneritemhandle" style="color:#5bc0de;padding-top:2px;position:absolute;top:4px;right:18px;cursor:pointer;">'+
								'</span>'+
								''+
							'</div>';
			}
			else
			{
				domString = '<div style="position:relative;margin-bottom:4px;" id="upt_listitem_'+count+'" class="spinneritem">'+
								'<input style="width:100%;border:1px solid #121212;padding:2px;" id="upt_list_item_'+count+'" value="'+value+'" />'+
								//'<span class="glyphicon glyphicon-remove-circle pull-right" style="color:#ff0000;padding-top:2px;position:absolute;top:4px;right:4px;cursor:pointer;">'+
								//'</span>'+
								'<span class="glyphicon glyphicon-move pull-right spinneritemhandle" style="color:#5bc0de;padding-top:2px;position:absolute;top:4px;right:4px;cursor:pointer;">'+
								'</span>'+
								''+
							'</div>';
			}
			return domString;
		};

		CONTROLS_NAMESPACE.drawControls = function(data)
		{
			$('#controlscontainer').empty();
			$.each(data, function(index, val) {
			//IMAGE_CHOOSER.lastimageid = val.id;
			//$(IMAGE_CHOOSER.getImageChooserDomString(val.imageurl,val.thumburl,val.imagename,val.id)).hide().appendTo('#galleryContainer').fadeIn('1000', function() {});
			if(val.mastercontrolid == 1)
			{
				//Edittext
				domString = CONTROLS_NAMESPACE.getEditText(val.id,false,val.label,val.placeholder,val.isrequired);
				//CONTROLS_NAMESPACE.allControls.push("new_edt_"+CONTROLS_NAMESPACE.controlsCount);
			}
			else if(val.mastercontrolid == 2)
			{
				//Single Image
				domString = CONTROLS_NAMESPACE.getSingleImage(val.id,false,val.label,val.isrequired);
				//CONTROLS_NAMESPACE.allControls.push("new_img_"+CONTROLS_NAMESPACE.controlsCount);
			}
			else if(val.mastercontrolid == 3)
			{
				//multiple images
				domString = CONTROLS_NAMESPACE.getMultipleImages(val.id,false,val.label,val.isrequired);
				//CONTROLS_NAMESPACE.allControls.push("new_glr_"+CONTROLS_NAMESPACE.controlsCount);
			}
			else if(val.mastercontrolid == 4)
			{
				//spinner
				domString = CONTROLS_NAMESPACE.getSpinner(val.id,false,val.label,val.controldata,val.isrequired);
				//CONTROLS_NAMESPACE.allControls.push("new_spr_"+CONTROLS_NAMESPACE.controlsCount);
			}
			var _ref = $(domString).appendTo('#controlscontainer');
			if(val.mastercontrolid == 4)
			{
				_ref.find('.spinnervaluescontainer').sortable({
					axis:"y",
					item:".spinneritem",
					handle:".spinneritemhandle",
					scrollSensitivity:40,
					scrollSpeed:30,
					//appendTo:document.body,
					//helper:"clone",
					revert:true,
					tolerance:"pointer",
					placeholder: "sortable-placeholder-spinneritem",
					forcePlaceholderSize: true,
					containment: "parent",
					update:function(event,ui){
						$('#savecontrolsbtn').show();
					}
				});
			}

		});
		}


		CONTROLS_NAMESPACE.loadControls = function()
		{
			//$('#loadingscreen').css('display','block');
			//$('#loadingscreen').css('display','none');
			$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					//url:"<?=base_url('admin_requests/news/get_news')?>",
					url:xb_global_namespace.baseurl+"admin_requests/controls/getCategoryControls",
					data:{
						"catid":LOCAL_NAMESPACE.CATEGORY_ID,
						"screenid":$('#screen_selector').val()
					},
					success:function(datarecieved,textStatus,jqXHR)
					{
						console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{

							//IMAGE_CHOOSER.myinfinitescroll.scrollBusy = false;
							$('#loadingscreen').css('display','none');
							data = datarecieved['data'];
							CONTROLS_NAMESPACE.drawControls(data);
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
		CONTROLS_NAMESPACE.loadControls();
		
		$("#loading_bar").css("display","none");

		CONTROLS_NAMESPACE.disableAddables = function(){
			$('.addNew').prop('disabled', true);
		};
		CONTROLS_NAMESPACE.enableAddables = function(){
			$('.addNew').prop('disabled', false);
		};

		CONTROLS_NAMESPACE.disableSortables = function(){
			$('.sortableItem').sortable('disable');
		};
		CONTROLS_NAMESPACE.enableSortables = function(){
			$('.sortableItem').sortable('enable');
		};


		$('#savecontrolsform').on('submit', function(event)
		{
			
			event.preventDefault();
			var _this = $(this);
			var postData = _this.serializeArray();
			$('#loadingscreen').css('display','block');
			$.each($('.spinnervaluescontainer'), function(index, value)
			{
				///console.log(index,value);
				//console.log("---------------------");
				ar = [];
				$.each($(value).find('input'), function(ind, val) {
					//console.log(ind,val);
					obj = {};
					obj.key = $(val).attr('id');
					obj.value = $(val).val();

					ar.push(obj);
				});
				//console.log(ar);
				postData.push({"name":$(value).attr("id"),"value":JSON.stringify(ar)});
				//console.log("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
			});

			//postData.push({"name":"controls","value":temp});
			postData.push({"name":"catid","value":LOCAL_NAMESPACE.CATEGORY_ID});
			postData.push({"name":"screenid","value":$('#screen_selector').val()});
			postData.push({"name":"sortorder","value":$('#controlscontainer').sortable('toArray')});

			console.log(postData);

			$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					url:xb_global_namespace.baseurl+"admin_requests/controls/save",
					data:postData,
					success:function(datarecieved,textStatus,jqXHR)
					{
						console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{
							$('#loadingscreen').css('display','none');
							$('#savecontrolsbtn').hide();
							data = datarecieved['data'];

							CONTROLS_NAMESPACE.drawControls(data);
							//$(location).attr('href',$(location).attr('href'));
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

			CONTROLS_NAMESPACE.enableSortables();
			CONTROLS_NAMESPACE.enableAddables();
		});

		$(document).on('click', '.removecontrolbtn', function(event)
		{
			var _this = $(this);
			_this.parents('.sortableitem').remove();
		});

		

		$(document).on('click', '.addcontrolbtn', function(event)
		{
			//CONTROLS_NAMESPACE.disableSortables();

			var _this = $(this);
			var controlid = _this.data('controlid');
			//alert("HI" );
			$('#savecontrolsbtn').show();
			console.log(controlid);
			var domString = "";
			CONTROLS_NAMESPACE.controlsCount++;
			if(controlid == 1)
			{
				//Edittext
				domString = CONTROLS_NAMESPACE.getEditText(CONTROLS_NAMESPACE.controlsCount,true,"","",0);
				//CONTROLS_NAMESPACE.allControls.push("new_edt_"+CONTROLS_NAMESPACE.controlsCount);
			}
			else if(controlid == 2)
			{
				//Single Image
				domString = CONTROLS_NAMESPACE.getSingleImage(CONTROLS_NAMESPACE.controlsCount,true,"",0);
				//CONTROLS_NAMESPACE.allControls.push("new_img_"+CONTROLS_NAMESPACE.controlsCount);
			}
			else if(controlid == 3)
			{
				//multiple images
				domString = CONTROLS_NAMESPACE.getMultipleImages(CONTROLS_NAMESPACE.controlsCount,true,"",0);
				//CONTROLS_NAMESPACE.allControls.push("new_glr_"+CONTROLS_NAMESPACE.controlsCount);
			}
			else if(controlid == 4)
			{
				//spinner
				domString = CONTROLS_NAMESPACE.getSpinner(CONTROLS_NAMESPACE.controlsCount,true,"",[],0);
				//CONTROLS_NAMESPACE.allControls.push("new_spr_"+CONTROLS_NAMESPACE.controlsCount);
			}
			var _ref = $(domString).css("visibility","hidden").appendTo('#controlscontainer');
			$('body').animate({
				"scrollTop": $('#controlscontainer').prop('scrollHeight')
				},
				500, function(){
					_ref.css({
						'visibility':'visible',
						'display':'none'
					});
					_ref.fadeIn('100', function() {});
					if(controlid == 4)
					{
						console.log("reference of newly created element is :",_ref);
						_ref.find('.spinnervaluescontainer').sortable({
										axis:"y",
										item:".spinneritem",
										handle:".spinneritemhandle",
										scrollSensitivity:40,
										scrollSpeed:30,
										//appendTo:document.body,
										//helper:"clone",
										revert:true,
										tolerance:"pointer",
										placeholder: "sortable-placeholder-spinneritem",
										forcePlaceholderSize: true,
										containment: "parent",
										update:function(event,ui){
											
										}}
						);
					}
			});
			//console.log(CONTROLS_NAMESPACE.allControls);
		});

		$('#controlscontainer').sortable({
			axis:"y",
			item:".sortableitem",
			handle:".sortablehandle",
			//appendTo:document.body,
			//helper:"clone",
			revert:true,
			tolerance:"pointer",
			placeholder: "sortable-placeholder",
			forcePlaceholderSize: true,
			//containment: "parent",
			update:function(event,ui){
				$('#savecontrolsbtn').show();
				//$('#saveSortBtn').removeAttr("disabled").removeClass('btn-default').addClass('btn-success').find('span.txt').text('Save Changes');
				//$('#saveSortBtn').show();
				//console.log("sorting Updated!!!",$(this).sortable('toArray'));
			},	
		});
		$('#controlscontainer').disableSelection();


		$(document).on('click', '.spinneraddtolistbtn', function(event)
		{
			var _this = $(this);
			$('#savecontrolsbtn').show();
			var val = _this.parents('.sortableitem').find('.newspinnervalueinput').val().trim();
			_this.parents('.sortableitem').find('.newspinnervalueinput').val('');
			if(val)	//check if not empty
			{
				CONTROLS_NAMESPACE.spinnerValuesCount++;
				_this.parents('.sortableitem').find('.spinnervaluescontainer').append(CONTROLS_NAMESPACE.getSpinnerItem(val,CONTROLS_NAMESPACE.spinnerValuesCount,true));
			}
			//console.log(_this.parents('.sortableitem').find('.spinnervaluescontainer'));
		});

		$('#screen_selector').on('change', function(event) {
			var _this = $(this);
			console.log("Changeddddd!!!!",_this.val());
			CONTROLS_NAMESPACE.loadControls();
			
		});




	});
</script>