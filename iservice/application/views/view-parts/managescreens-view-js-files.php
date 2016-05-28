<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(function(){

		var SCREENS_NAMESPACE = {};
		SCREENS_NAMESPACE.getDomString = function(id,name,catid,sortorder,description){
			var domString = '<div class="well well-sm">'+
								'<div class="row">'+
									'<div class="col-md-10">'+
										'<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>'+
										'<h4>'+name+'</h4>'+
										'<hr>'+
										'<h5>'+description+'</h5>'+
										'<br>'+
									'</div>'+
									'<div class="col-md-2 col-sm-2 col-sm-2">'+
										'<div class="btn btn-default btn-block">'+
											'<span class="glyphicon glyphicon-move"></span> Move'+
											'<span class="badge">'+sortorder+'</span>'+
										'</div>'+
										'<div class="btn btn-default btn-block">'+
											'<span class="glyphicon glyphicon-pencil"></span> edit'+
										'</div>'+
										'<div class="btn btn-default btn-block">'+
											'<span class="glyphicon glyphicon-remove"></span> Disable'+
										'</div>'+
										'<div class="btn btn-default btn-block">'+
											'<span class="glyphicon glyphicon-eye-open"></span> View'+
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
			return domString;
		};

		$('#screensaveform').on('submit', function(event)
		{
			event.preventDefault();
			var _this = $(this);
			var postData = _this.serializeArray();
			urlarray = location.href.split('/');
			postData.push({"name":"catid","value":urlarray[urlarray.length-2]});
			console.log(postData);
				$('#loadingscreen').css({"display": 'block'});
				$.ajax({                
						async:true,
						type:'POST',
						dataType:'json',
						//url:"<?=base_url('admin_requests/news/get_news')?>",
						url:xb_global_namespace.baseurl+"admin_requests/screens/add",
						data:postData,
						success:function(datarecieved,textStatus,jqXHR)
						{
							//console.log(datarecieved);
							if(datarecieved['status'] == 'login')
							{
								$('#loadingscreen').css({"display": 'none'});
								var data = datarecieved['screen'];

								$.each(data,function(index, el) {
									//console.log(el);
									$( SCREENS_NAMESPACE.getDomString(el.id,el.name,el.catid,el.sortorder,el.description) ).appendTo('#screenscontainer');
								});

								$('#name').val('');
								$('#description').val('');
								
								/*$('#newsContainerColumn').animate({"scrollTop":$('#newsContainerColumn').prop('scrollHeight')},500,function(){
									$.each(reference_ar, function(index, val) {
										val.css({'visibility':'visible','display':"none"});
										console.log(val);
										val.fadeIn('2200', function() {});
									});
								});*/
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

	});
</script>