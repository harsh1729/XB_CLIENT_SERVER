<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<!--********** loading IME methods ***************-->
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<!--************ IME loading end *****************-->
<script>

	var HOME_VIEW_NAMESPACE = {};
	var copy_btn ="<input type='button'  data-id='newsheading' data-target='#copyModal' data-toggle='modal' class='unicode_convert_button btn btn-info btn-sm pull-right' value='copy' style='margin-bottom:20px;'>";
	HOME_VIEW_NAMESPACE.generate_dom_string = function(newsid,heading,paragraph,image,place,reporter,daytime,imgtagline){
		var domString =	'<div class="well">'+
							'<div style="background-color:#000;float:left;margin-right:10px;" class="left-start-bar">&nbsp;</div>'+
							'<p style="color:#555;font-size:1.2em;font-weight:500;" class="main-news-heading">'+heading+'</p>'+
							'<div class="row">'+
								'<div class="col-md-4">'+
									'<img style="height:220px;margin-bottom:5px;" src="'+image+'" class="img-responsive center-block main-news-image" />'+
									'<p style="color:#666;overflow:hidden;max-height:20px;" class="main-news-imgtagline">'+imgtagline+'</p>'+
								'</div>'+
								'<div class="col-md-8">'+
									'<p style="color:#555;max-height:220px;height:220px;overflow:hidden;margin:0 0 5px;" class="main-news-content">'+paragraph+'</p>'+
									
									'<div style="color:#666;cursor:pointer;" class="pull-right btn btn-xs delete-news-btn-active" data-newsid="'+newsid+'" data-target="#customModal" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> delete</div>'+
									'<div style="color:#666;margin-right:10px;cursor:pointer;" class="pull-right btn btn-xs edit-news-btn-active" data-newsid="'+newsid+'"><span class="glyphicon glyphicon-pencil"></span> edit</div>'+
									'<div style="color:#666;margin-right:10px;cursor:pointer;" class="pull-right btn btn-xs view-news-btn-active" data-newsid="'+newsid+'"><span class="glyphicon glyphicon-eye-open"></span> view</div>'+
								'</div>'+
							'</div>'+
							'<div class="row">'+
								 '<div class="col-md-12">'+
									
										'<div style="color:#666;margin-right:10px;" class="pull-right"><span class="glyphicon glyphicon-globe"></span> '+place+'</div>'+
										'<div style="color:#666;margin-right:10px;" class="pull-right"><span class="glyphicon glyphicon-user"></span> '+reporter+'</div>'+
										'<div style="color:#666;margin-right:10px;" class="pull-right"><span class="glyphicon glyphicon-calendar"></span> '+daytime+'</div>'+
								 '</div>'+
								'</div>'+
						'</div>';
		return domString;
	};
	HOME_VIEW_NAMESPACE.generate_view_dom_string = function(id,heading,content,image,imgtagline){
		
		var domString = '<hr style="border-width:1px;border-style:inset;display:none;" class="elements-added"/>'+
						'<div class="row elements-added" style="display:none;">'+
							'<div class="col-md-12">'+
								'<div style="background-color:#000;float:left;margin-right:10px;">&nbsp;</div>'+
								'<p style="color:#555;font-size:1.2em;font-weight:500;">'+heading+'</p>'+
								'<div class="row">'+
									'<div class="col-md-4">'+
										'<img style="height:220px;margin-bottom:5px;" src="'+image+'" class="img-responsive center-block" />'+
										'<p style="color:#666;overflow:hidden;max-height:20px;" >'+imgtagline+'</p>'+
									'</div>'+
									'<div class="col-md-8">'+
										'<p style="color:#555;max-height:240px;height:240px;overflow:hidden;overflow-y:scroll;margin:0 0 5px;">'+content+'</p>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
		return domString;
	};
	HOME_VIEW_NAMESPACE.generate_edit_dom_string = function(id,heading,content,image,imgtagline){
		
		var domString = '<hr style="border-width:1px;border-style:inset;display:none;" class="elements-added"/>'+
						'<div class="row elements-added" style="display:none;">'+
							'<div class="col-md-12">'+
								'<div contenteditable="true" class="lang_class form-control main-news-heading" style="color:#555;overflow:auto;" id="heading_'+id+'">'+heading+'</div>'+copy_btn+'<br><input type="hidden" name="heading_'+id+'" >'+
								'<div class="row">'+
									'<div class="col-md-4">'+
										'<img style="height:220px;margin-bottom:5px;" src="'+image+'" class="img-responsive center-block main-news-image" />'+
										'<div contenteditable="true" class="lang_class form-control main-news-imgtagline" style="color:#666;" id="imgtagline_'+id+'">'+imgtagline+'</div>'+copy_btn+'<br><input type="hidden" name="imgtagline_'+id+'">'+
									'</div>'+
									'<div class="col-md-8">'+
									'<span><button type="button" class="imeboldbtn btn btn-sm btn-info"><b>B</b></button></span>'+
					'<span><button type="button" class="imeitalicbtn btn btn-sm btn-info" ><i>I</i></button></span>'+
					'<span><button type="button" class="imeunderlinebtn btn btn-sm btn-info"><u>U</u></button></span>'+
										'<div style="color:#555;max-height:240px;height:240px;resize:none;overflow:auto;" contenteditable="true" id="content_'+id+'" name="content_'+id+'" class="lang_class form-control main-news-content">'+content+'</div>'+copy_btn+'<br><input type="hidden" name="content_'+id+'" >'+
										'<div style="margin-right:10px;cursor:pointer;" class="pull-right btn btn-danger btn-xs delete-subnews-btn-active" data-newsid="'+id+'" data-target="#customModal" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> delete</div>'+
										'<div style="margin-right:10px;cursor:pointer;" class="pull-right btn btn-success btn-xs save-subnews-btn-active" data-newsid="'+id+'"><span class="glyphicon glyphicon-check"></span> save</div>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
		return domString;
	};
	HOME_VIEW_NAMESPACE.load_news = function(catid,fromdate,todate,calltype){
console.log("\ncatid:",catid,"\nfromdate:",fromdate,"\ntodate:",todate,"\ncalltype",calltype);
                                                                              
										$.ajax({
                                                                                           
											async:true,
											type:'POST',
											dataType:'json',
											//url:"<?=base_url('admin_requests/news/get_news')?>",
											url:xb_global_namespace.baseurl+"admin_requests/news/get_news",
											data:{
													"catid":catid,
													"startdate":fromdate,
													"enddate":todate,
													"calltype":calltype,
													"limit":HOME_VIEW_NAMESPACE.limit,
													"offset":HOME_VIEW_NAMESPACE.offset,
													"lastnewsid":HOME_VIEW_NAMESPACE.lastnewsid,
													"domainname":xb_global_namespace.domainname
												},
											success:function(datarecieved,textStatus,jqXHR)
											{
                                                                                               $("#loading_bar").css("display","none");	
												console.log('RESPONCE:',datarecieved);
												var data = datarecieved['data'];
												if(datarecieved['status'] == 'login')
												{
													if(data.length)
													{
														if(calltype == 'fresh')
														{
															HOME_VIEW_NAMESPACE.myinfinitescroll.scrollEnable = true;
															HOME_VIEW_NAMESPACE.offset = 0;
														}

														if(data[data.length - 1]['id'] > 0)
															HOME_VIEW_NAMESPACE.lastnewsid = data[data.length - 1]['id'];
//HOME_VIEW_NAMESPACE.lastnewsid = data[0]['id'];
														HOME_VIEW_NAMESPACE.offset = HOME_VIEW_NAMESPACE.offset + data.length;
														$.each(data,function(index, el) {
														$(HOME_VIEW_NAMESPACE.generate_dom_string(el.id,el.heading,el.content,el.image,'default place',el.reportername,el.datetime,el.imgtagline)).hide().appendTo('#newsContainerColumn').fadeIn(1000);
														});

													}
													else
													{
 														$("#loading_bar").css("display","none");	
														HOME_VIEW_NAMESPACE.myinfinitescroll.scrollEnable = false;
													}
												}
												else if(datarecieved['status'] == 'notlogin')
												{
													$(location).attr('href',$(location).attr('href'));
												}
												HOME_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = false;
												$('#infiniteloadingindicator').css('display','none');
											},
											error:function(jqXHR,textStatus,errorThrown)
											{
 $("#loading_bar").css("display","none");	
												console.log(jqXHR,textStatus,errorThrown);
											}
										});
									};
	HOME_VIEW_NAMESPACE.lastnewsid = 0;
	HOME_VIEW_NAMESPACE.offset = 0;
	HOME_VIEW_NAMESPACE.limit = 2;
	HOME_VIEW_NAMESPACE.myinfinitescroll = {};
	HOME_VIEW_NAMESPACE.myinfinitescroll.scrollEnable = false;	
	HOME_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = false;	// is there any ongoing ajax request
	HOME_VIEW_NAMESPACE.myinfinitescroll.loadBefore = 100; // load this much pixel before the scrollbar reaches to end!

	
	$(document).ready(function(){ 
		
		HOME_VIEW_NAMESPACE.load_news($('#categoryId').val(),$('#fromDate').val(),$('#toDate').val(),"fresh");

		$('#datepicker').datepicker({
			autoclose: true,
			todayBtn: "linked",
			todayHighlight: true,
			format : "dd-mm-yyyy",
		}).on('changeDate',function(e){
			console.log($('#fromDate').val());
			console.log($('#toDate').val());
		});+
		//$(HOME_VIEW_NAMESPACE.generate_dom_string(1,"This is heading",'This is para','http://xercesblue.in/newsentry/uploads/14219140479887_r-day5.jpg','Sri Ganganagar','Vikas Sharma','02:30:23 23-02-2015')).appendTo('#newsContainerColumn');
		
		$('#categoryId').on('change',function(e){
			$('#newsContainerColumn').empty();
			HOME_VIEW_NAMESPACE.load_news($(this).val(),$('#fromDate').val(),$('#toDate').val(),"fresh");
		});
		
		$('#updateDateWise').on('click',function(e){
			$('#newsContainerColumn').empty();
			HOME_VIEW_NAMESPACE.load_news($('#categoryId').val(),$('#fromDate').val(),$('#toDate').val(),"fresh");
		});

		$(window).scroll(function(event)
		{
			if(HOME_VIEW_NAMESPACE.myinfinitescroll.scrollEnable && !HOME_VIEW_NAMESPACE.myinfinitescroll.scrollBusy && $(document).height() - $(window).height() - HOME_VIEW_NAMESPACE.myinfinitescroll.loadBefore <= $(window).scrollTop() )
			{
				$('#infiniteloadingindicator').css('display','block');
				HOME_VIEW_NAMESPACE.myinfinitescroll.scrollBusy = true;
				HOME_VIEW_NAMESPACE.load_news($('#categoryId').val(),$('#fromDate').val(),$('#toDate').val(),"old");
			}
		});


		$('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
						var _this = $(event.relatedTarget);
						var newsId = _this.data('newsid');
						console.log( newsId );
						
						
				if( _this.hasClass('delete-news-btn-active') )
				{
					var modal = $(this);
					modal.find('.modal-body').text('Delete news and all subnews under this news.');
					modal.find('#DeleteNews').show();
					$('#customModal').find('[data-dismiss="modal"]').show();
					modal.find('#DeleteNews').text("Delete All");
					modal.find('#DeleteNews').data("newsId",newsId);
					modal.find('#DeleteNews').data("newstype",'mainnews');
				}
				else if( _this.hasClass('delete-subnews-btn-active') )
				{
					var modal = $(this);
					modal.find('.modal-body').text('Delete this news.');
					modal.find('#DeleteNews').show();
					$('#customModal').find('[data-dismiss="modal"]').show();
					modal.find('#DeleteNews').text("Delete");
					modal.find('#DeleteNews').data("newsId",newsId);
					modal.find('#DeleteNews').data("newstype",'subnews');
				}
		});

		$('#DeleteNews').on('click',function(){
			var _this = $(this);
			$('#customModal').find('.modal-body').text('');
			$('#customModal').find('#DeleteNews').hide();
			$('#customModal').find('[data-dismiss="modal"]').hide();
			$('#customModal').find('.modal-body').append('<i class="fa fa-spinner fa-pulse"></i> Deleting News... ');
			var newsid = _this.data('newsId');
			var newstype = _this.data('newstype');
			//console.log(_this);
			$.ajax({
					type:'POST',
					async:true,
					dataType:"json",
					data:{
							"newsid":newsid,
							"newstype":newstype,
							"domainname":xb_global_namespace.domainname
						},
					url:xb_global_namespace.baseurl+"admin_requests/news/delete_news",
					success: function(datareceived, textStatus, jqXHR)
					{
						console.log(datareceived);
						$('#customModal').modal('hide');

						if(datareceived['status'] == 'login')
						{
							if(newstype == 'mainnews')
							{
								//console.log('removing MAIN news!');
								delete_btn_this = $('div.btn[data-newsid="'+newsid+'"]');
								if(delete_btn_this.parent().parent().parent().parent().prop('tagName').toLowerCase() == 'form')
								{
									delete_btn_this.parent().parent().parent().parent().slideUp(1000,function(){$(this).replaceWith('');});
								}
								else if(delete_btn_this.parent().parent().parent().parent().prop('tagName').toLowerCase() == 'div')
								{
									delete_btn_this.parent().parent().parent().slideUp(1000,function(){$(this).replaceWith('');});
								}
							}
							else if(newstype == 'subnews')
							{
								//console.log('removing subnews!');
								delete_btn_this = $('div.btn[data-newsid="'+newsid+'"]');
								delete_btn_this.parent().parent().parent().parent().prev().replaceWith('');
								delete_btn_this.parent().parent().parent().parent().slideUp(1000,function(){$(this).replaceWith('');});
							}
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
		
		$(document).on('click','div.save-news-btn-active',function(event){
			var _this = $(this);
			_this.removeClass('save-news-btn-active');
			_this.find('span').remove();
			_this.text('');
			_this.append('<i class="fa fa-spinner fa-pulse"></i> saving');

			serializedData = _this.parent().parent().parent().parent().serializeArray();
			console.log(serializedData);
			tagline_prepend = "imgtagline_";
			heading_prepend = "heading_";
			content_prepend = "content_";

			subnews_heading = {};
			subnews_content = {};
			subnews_tagline = {};
			subnews_newsid = {};

			$.each(serializedData,function(key,val){
				//console.log(val.name,val.value);
				
				if(val.name.search(tagline_prepend) == 0)
				{
					//subnews tagline
					tg_line = val.name.substr(tagline_prepend.length,val.name.length);
					//console.log("tagline key:"+tg_line+" : "+val.value);
					//subnews_tagline[tg_line] = val.value;
					subnews_tagline[tg_line] = $('#'+val.name).html();
					subnews_newsid[tg_line] = tg_line;
				}
				else if(val.name.search(heading_prepend) == 0)
				{
					//subnews heading
					hd_ng = val.name.substr(heading_prepend.length,val.name.length);
					//console.log("heading key:"+hd_ng+" : "+val.value);
					//subnews_heading[hd_ng] = val.value;
					subnews_heading[hd_ng] =$('#'+val.name).html();
				}
				else if(val.name.search(content_prepend) == 0)
				{
					//subnews content
					cn_nt = val.name.substr(content_prepend.length,val.name.length);
					console.log("content key:"+cn_nt+" : "+val.value);
					//subnews_content[cn_nt] = val.value;
					subnews_content[cn_nt] = $('#'+val.name).html();
					console.log($('#'+val.name).html());
				}
			});

			subnews = [];
			$.each(subnews_heading,function(index,val)
			{
				singlesubnews = {};
				singlesubnews.heading = val;
				singlesubnews.content = subnews_content[index];
				singlesubnews.tagline = subnews_tagline[index];
				singlesubnews.newsid = subnews_newsid[index];

				subnews.push(singlesubnews);
			});
			//console.log(subnews);
			$.ajax({
				async:true,
				url:xb_global_namespace.baseurl+"admin_requests/news/update_news",
				dataType:'json',
				type:'POST',
				data:{
					"news":subnews
				},
				success:function(datareceived,textStatus,jqXHR)
				{
					//console.log(datareceived);
					_this.addClass('save-news-btn-active');
					_this.find('span').remove();
					_this.text('');
					_this.append('<span class="glyphicon glyphicon-check"></span> saved');

					_this.parent().parent().parent().find('*:gt(19)').slideUp(1000,function(){$(this).remove();});

					var el = datareceived['data'];
					if(datareceived['status'] == 'login')
					{
						//_this.parent().parent().parent().empty();
						_this.parent().parent().parent().unwrap();
						_this.parent().parent().parent().replaceWith(HOME_VIEW_NAMESPACE.generate_dom_string(el.id,el.heading,el.content,el.image,'default place',el.reportername,el.datetime,el.imgtagline));

					}
					else if(datareceived['status'] == 'notlogin')
					{
						$(location).attr('href',$(location).attr('href'));
					}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
				}
			});
		});

		$(document).on('click','div.save-subnews-btn-active',function(event){
			var _this = $(this);
			_this.removeClass('save-subnews-btn-active');
			_this.find('span').remove();
			_this.html('');
			_this.append('<i class="fa fa-spinner fa-pulse"></i> saving');

			
			$.ajax({
				async:true,
				url:xb_global_namespace.baseurl+"admin_requests/news/update_subnews",
				//dataType:'json',
				type:'POST',
				data:{
						'newsid':_this.data('newsid'),
						'heading':_this.parent().parent().parent().find('.main-news-heading').html(),
						'content':_this.parent().find('.main-news-content').html(),
						'imgtagline':_this.parent().parent().find('.main-news-imgtagline').html()
					},
				success:function(datareceived,textStatus,jqXHR)
				{
					console.log(datareceived);
					_this.addClass('save-subnews-btn-active');
					_this.find('span').remove();
					_this.html('');
					_this.append('<span class="glyphicon glyphicon-check"></span> save');
				},
				error:function(jqXHR,textStatus,errorThrown)
				{}
			});
		});

/*
		$(document).on('click','div.delete-news-btn-active',function(event){
			alert("delete complete News");
		});

		$(document).on('click','div.delete-subnews-btn-active',function(event){
			alert("delete sub News");
		});
*/
		/*$(document).on('input','.main-news-content',function(event){
			
  			var text = $(this).text();
  			
  			$(this).next().next().next().val(text);
  			console.log($(this).next().next().next());
  			
		});*/
		$(document).on('click','div.edit-news-btn-active',function(event){
			var _this = $(this);
			newsid = _this.data('newsid');

			_this.find('span').remove();
			_this.prepend('<img src="'+xb_global_namespace.ajax_loader_img_1+'"/>');

			_this.removeClass('edit-news-btn-active');
			_this.addClass('edit-news-btn-busy');

			/***********************************************/
			_this.parent().find('.view-news-btn-active').addClass('disabled');

			$.ajax({
				async:true,
				//url: '<?=base_url('admin_requests/news/get_sub_news')?>',
				url:xb_global_namespace.baseurl+"admin_requests/news/get_complete_news",
				type: 'POST',
				dataType: 'json',
				data: {
						"newsid":newsid,
						"domainname":xb_global_namespace.domainname
					},
				success:function(datarecieved,textStatus,jqXHR)
				{
					console.log(datarecieved);
					
					var data = datarecieved['data'];
					if(datarecieved['status'] == 'login')
					{
						if(data)
						{
							_this.find('img').remove();
							_this.text('');
							_this.prepend('<span class="glyphicon glyphicon-remove"></span> close');
							_this.removeClass('edit-news-btn-busy');
							_this.addClass('edit-news-btn-disable');


							_this.parent().parent().parent().find('.main-news-heading').remove();
							_this.parent().parent().parent().find('.left-start-bar').remove();
							_this.parent().parent().prepend('<div contenteditable="true" class="form-control" style="color:#555;margin-bottom:;overflow:auto;" id="heading_'+data.id+'">'+data.heading+'</div>'+copy_btn+'<br><input type="hidden" name="heading_'+data.id+'">');

							_this.parent().parent().find('.main-news-image').attr('src',data.image).css({'height':'206px'});

							/*_this.parent().parent().find('.main-news-image').parent().append('<input type="text" class="form-control main-news-imgtagline" style="color:#666;" value="'+data.imgtagline+'"/>');
							_this.parent().parent().find('.main-news-imgtagline').remove();
*/
							_this.parent().parent().find('.main-news-imgtagline').replaceWith('<div contenteditable="true" class="form-control main-news-imgtagline" style="color:#666;overflow:auto;" id="imgtagline_'+data.id+'">'+data.imgtagline+'</div>'+copy_btn+'<br><input type="hidden" name="imgtagline_'+data.id+'">');


							_this.parent().find('.main-news-content').replaceWith(''+
				
					
			'<div style="color:#555;max-height:220px;height:220px;overflow:auto;" contenteditable="true" id="content_'+data.id+'" class="form-control main-news-content">'+data.content+'</div>'+copy_btn+'<br><input type="hidden" name="content_'+data.id+'">');

							_this.parent().parent().parent().css({
								'background-color': '#F9889C',
								'border-color':'#FF0000',
							});

							var saveBtn = '<div style="margin-right:10px;cursor:pointer;" class="pull-right btn btn-success btn-xs save-news-btn-active" data-newsid="'+newsid+'"><span class="glyphicon glyphicon-check"></span> save</div>';
							_this.parent().append(saveBtn);

							$.each(data.subnews,function(index,el){
								_this.parent().parent().parent().append(HOME_VIEW_NAMESPACE.generate_edit_dom_string(el.id,el.heading,el.content,el.image,el.imgtagline));
							});
							_this.parent().parent().parent().find('.elements-added').slideDown(1000).removeClass('elements-added');
							_this.parent().parent().parent().wrapAll('<form action="" class="form-horizontal" role="form"></form>');
							//_this.parent().parent().parent().append('</form>');
							$('input').ime();
							$('textarea').ime();
							$('.main-news-content').ime();
							
						}
						else
						{
							_this.find('img').remove();
							_this.prepend('<span class="glyphicon glyphicon-eye-open"></span> ');
							_this.removeClass('view-news-btn-busy');
							_this.addClass('view-news-btn-active');

							_this.parent().find('.edit-news-btn-active').removeClass('disabled');
							_this.parent().find('.delete-news-btn-active').removeClass('disabled');
						}
					}
					else if(datarecieved['status'] == 'notlogin')
					{
						$(location).attr('href',$(location).attr('href'));
					}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{

				},
			});

		});
		$(document).on('click','div.edit-news-btn-disable',function(event){
			var _this = $(this);

			_this.find('span').remove();
			_this.text('');
			_this.prepend('<span class="glyphicon glyphicon-pencil"></span> edit');
			_this.parent().find('.main-news-content').css({
								'overflow-y':'hidden',
								'border-bottom':'0px'
							});
			_this.parent().parent().parent().animate({
					//'padding-bottom': '19px',
				},
				600, function() {
					_this.parent().parent().parent().css({
								'background-color': '#f5f5f5',
								'border-color':'#e3e3e3',
							});
				});
			_this.removeClass('edit-news-btn-disable');
			_this.addClass('edit-news-btn-active');


			_this.parent().find('.view-news-btn-active').removeClass('disabled');

			//HANDLE WITH CARE , HERE GT MEANS DOM ELEMENTS HAVING INDEX GREATER THAN 19
			_this.parent().parent().parent().find('*:gt(19)').slideUp(1000,function(){$(this).remove();});

			//(newsid,heading,paragraph,image,place,reporter,daytime,imgtagline)
			
			$.ajax({
				async:true,
				dataType:'json',
				type:'POST',
				url:xb_global_namespace.baseurl+"admin_requests/news/get_main_news",
				data:{
					'newsid':_this.data('newsid'),
					"domainname":xb_global_namespace.domainname
				},
				success:function(datarecieved,textStatus,jqXHR){
					//console.log(datarecieved);
					var el = datarecieved['data'];
					if(datarecieved['status'] == 'login')
					{
						//_this.parent().parent().parent().empty();
						_this.parent().parent().parent().unwrap();
						_this.parent().parent().parent().replaceWith(HOME_VIEW_NAMESPACE.generate_dom_string(el.id,el.heading,el.content,el.image,'default place',el.reportername,el.datetime,el.imgtagline));

					}
					else if(datarecieved['status'] == 'notlogin')
					{
						$(location).attr('href',$(location).attr('href'));
					}
				},
				error:function(jqXHR,textStatus,errorThrown){
					console.log(jqXHR,textStatus,errorThrown);
				}
			});

		});
		$(document).on('click','div.view-news-btn-active',function(event){
			var _this = $(this);
			newsid = _this.data('newsid');
			_this.find('span').remove();
			//_this.prepend('<img src="<?=base_url("admin_docs/images/ajax-loader.gif");?>"/>');
			_this.prepend('<img src="'+xb_global_namespace.ajax_loader_img_1+'"/>');
			
			_this.removeClass('view-news-btn-active');
			_this.addClass('view-news-btn-busy');


			/***********************************************/
			_this.parent().find('.edit-news-btn-active').addClass('disabled');
			_this.parent().find('.delete-news-btn-active').addClass('disabled');

			$.ajax({
				async:true,
				//url: '<?=base_url('admin_requests/news/get_sub_news')?>',
				url:xb_global_namespace.baseurl+"admin_requests/news/get_complete_news",
				type: 'POST',
				dataType: 'json',
				data: {
						"newsid":newsid,
						"domainname":xb_global_namespace.domainname
					},
				success:function(datarecieved,textStatus,jqXHR)
				{
				  	//console.log(datarecieved);
					
					var data = datarecieved['data'];
					if(datarecieved['status'] == 'login')
					{
						if(data)
						{
							_this.find('img').remove();
							_this.text('');
							_this.prepend('<span class="glyphicon glyphicon-eye-close"></span> close');
							_this.removeClass('view-news-btn-busy');
							_this.addClass('view-news-btn-disable');


							_this.parent().parent().parent().find('.main-news-heading').html(data.heading);
							_this.parent().parent().find('.main-news-image').attr('src',data.image);
							_this.parent().parent().find('.main-news-imgtagline').html(data.imgtagline);
							_this.parent().find('.main-news-content').css({
								'overflow-y':'scroll',
								'border-bottom':'1px solid'
							}).html(data.content);

							_this.parent().parent().parent().css({
								'background-color': '#FFf89C',
								'border-color':'#000',
							});/*.animate({
										'padding-bottom': '850px',
										},
										1000, function() {});*/
							$.each(data.subnews,function(index,el){
								_this.parent().parent().parent().append(HOME_VIEW_NAMESPACE.generate_view_dom_string(el.id,el.heading,el.content,el.image,el.imgtagline));

							});
							_this.parent().parent().parent().find('.elements-added').slideDown(1000).removeClass('elements-added');

						}
						else
						{
							_this.find('img').remove();
							_this.prepend('<span class="glyphicon glyphicon-eye-open"></span> ');
							_this.removeClass('view-news-btn-busy');
							_this.addClass('view-news-btn-active');

							_this.parent().find('.edit-news-btn-active').removeClass('disabled');
							_this.parent().find('.delete-news-btn-active').removeClass('disabled');
						}
					}
					else if(datarecieved['status'] == 'notlogin')
					{
						$(location).attr('href',$(location).attr('href'));
					}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{

					_this.parent().find('.edit-news-btn-active').removeClass('disabled');
					_this.parent().find('.delete-news-btn-active').removeClass('disabled');
					console.log(jqXHR,textStatus,errorThrown);
				}
			});
			
		});
		$(document).on('click','div.view-news-btn-disable',function(event){
			var _this = $(this);

			_this.find('span').remove();
			_this.text('');
			_this.prepend('<span class="glyphicon glyphicon-eye-open"></span> view');
			_this.parent().find('.main-news-content').css({
								'overflow-y':'hidden',
								'border-bottom':'0px'
							});
			_this.parent().parent().parent().animate({
					//'padding-bottom': '19px',
				},
				600, function() {
					_this.parent().parent().parent().css({
								'background-color': '#f5f5f5',
								'border-color':'#e3e3e3',
							});
				});
			_this.removeClass('view-news-btn-disable');
			_this.addClass('view-news-btn-active');


			_this.parent().find('.edit-news-btn-active').removeClass('disabled');
			_this.parent().find('.delete-news-btn-active').removeClass('disabled');

			//HANDLE WITH CARE , HERE GT MEANS DOM ELEMENTS HAVING INDEX GREATER THAN 19
			_this.parent().parent().parent().find('*:gt(19)').slideUp(1000,function(){$(this).remove();});
		});
	});


</script>