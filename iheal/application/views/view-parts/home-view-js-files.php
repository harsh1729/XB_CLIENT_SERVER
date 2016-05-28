<script type="text/javascript" src="<?=base_url();?>js/xerces_globals.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
		$('#doctorsContainer').sortable({
			//containment: "#docContainerRowDiv",
			items:">div>div.sortableDiv",
			handle:".sorthandle",
			revert:true,
			axis:'y',
			update:function(event,ui){
				$('#saveSortBtn').removeAttr("disabled").removeClass('btn-default').addClass('btn-success').find('span.txt').text('Save Changes');
				//console.log("sorting Updated!!!",$(this).sortable('toArray'));
			},
			tolerance: "pointer",
			placeholder: "sortable-placeholder",
			forcePlaceholderSize: true
		});
		$( document ).disableSelection();	//this disables the text selection inside the sortable selector

		$("#saveSortBtn").on('click',function(event){
			var sortorder = $('#doctorsContainer').sortable('toArray');
			//console.log("sorting data!!!",sortorder);
			catid = $('#category').find('option:selected').val();
			cityid = $('#city').find('option:selected').val();

			$('#loading_bar').css({"display":"inline"});
			$.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:xb_global_namespace.baseurl+"admin_requests/doctor/updatesortorder",
				data:{
						"sortorder":sortorder,
						"catid":catid,
						"cityid":cityid
					},
				success:function(datareceived,textStatus,jqXHR)
				{
					///console.log(datareceived);
					if(datareceived['status'] == 'login')
					{
						$('#saveSortBtn').attr("disabled","disabled").removeClass('btn-success').addClass('btn-default').find('span.txt').text('No Changes');
						updateDoctorDOM(datareceived['data']);
						$('#loading_bar').css({"display":"none"});
					}
					else if(datareceived['status'] == 'notlogin')
					{$(location).attr('href',$(location).attr('href'));}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
				}
			});
		});


		$('#state').on('change',function(e){
			var _this = $(this);
			var stateid = _this.find('option:selected').val();
			//console.log(stateid);

			$('#city').empty();

			$.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:xb_global_namespace.baseurl+"admin_requests/city/getCityByStateId",
				data:{

						"stateid":stateid
					},
				success:function(datareceived,textStatus,jqXHR)
				{
					console.log(datareceived);
					if(datareceived['status'] == 'login')
					{
						var domString = "";
						$.each(datareceived['cities'],function(key,value){
							if(key == 0)
								domString += "<option value=''>choose city</option>";
							domString += "<option value='"+value.id+"'>"+value.name+"</option>";
						});
						$('#city').append(domString);
					}
					else if(datareceived['status'] == 'notlogin')
					{$(location).attr('href',$(location).attr('href'));}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
				}
			});

		});
		
		$('#city').on('change',function(e){
			var _this = $(this);
			var cityid = _this.find('option:selected').val();

			catid = $('#category').find('option:selected').val();
			filter = $('input[type=radio][name=filter]:checked').val();

			updateDoctors(cityid,catid,filter);
		});
		$('#category').on('change',function(e){
			var _this = $(this);
			var catid = _this.find('option:selected').val();

			cityid = $('#city').find('option:selected').val();

			//console.log("cityid:",cityid,"catid:",":"+catid+":");
			filter = $('input[type=radio][name=filter]:checked').val();
			updateDoctors(cityid,catid,filter);
		});
		$('input[type=radio][name=filter]').on('change',function(event){
			var _this = $(this);
			//alert(_this.val());

			catid = $('#category').find('option:selected').val();
			cityid = $('#city').find('option:selected').val();
			updateDoctors(cityid,catid,_this.val());
		});
		$(document).on('change','.enabledisable>input[type=checkbox]',function(event){
			//alert("clicked!!!"+this.checked);
			var _this = $(this);
			docid = _this.data('docid');
			enabledisable(docid,this.checked);
		});

		function enabledisable(docid,val)
		{
			$('#loading_bar').css({"display":"inline"});
			console.log("enabledisable js ----====>",val);
			enablevalue = "false";
			if(val)
				enablevalue = "true";
			$.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:xb_global_namespace.baseurl+"admin_requests/doctor/enabledisable",
				data:{
						"docid":docid,
						"enable":enablevalue
					},
				success:function(datareceived,textStatus,jqXHR)
				{
					console.log("enable disable -->>>\n",datareceived);
					if(datareceived['status'] == 'login')
					{
						$('#loading_bar').css({"display":"none"});
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
		function updateDoctors(cityid,catid,filter)
		{
			$('#loading_bar').css({"display":"inline"});
			$.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:xb_global_namespace.baseurl+"admin_requests/doctor/get_doctors",
				data:{
						"catid":catid,
						"cityid":cityid,
						"filter":filter
					},
				success:function(datareceived,textStatus,jqXHR)
				{
					console.log("data received -->>>\n",datareceived);
					if(datareceived['status'] == 'login')
					{
						updateDoctorDOM(datareceived['data']);
						$('#loading_bar').css({"display":"none"});
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
		function updateDoctorDOM(data)
		{
			//console.log(data);
			var domString = "";
			$.each(data,function(index,value){
				var isactive = "";
				if(value.isactive == 1)
					isactive = ' checked="checked" ';

				domString += 	'<div class="row" style="margin-bottom:10px;">'+
								'<div id="docid-'+value.id+'" class="col-md-12 sortableDiv" style="margin-bottom:10px;">'+
									'<div style="background-color:#eee;border:1px solid #999;border-radius:4px;padding:5px;">'+
										'<div class="row">'+
											'<div class="col-md-10">'+
												'<span class="label label-info">'+(index+1)+'</span>'+
											'</div>'+
											'<div class="col-md-2">'+
												'<span class="glyphicon glyphicon-move sorthandle pull-right"></span>'+
											'</div>'+
										'</div>'+
										'<div class="row"><div class="col-md-12"><div style="height:1px;width:100%;background-color:#888;margin-bottom:5px;"></div></div></div>'+
										'<div class="row">'+
											'<div class="col-md-2">'+
												'<img src="'+value.image+'" class="center-cropped" style="min-width:100%;height:105px;border:1px solid #777;border-radius:0px;padding:1px;">'+
											'</div>'+
											'<div class="col-md-3" style="padding-left:0px;">'+
												'<p style="text-align:right;margin:0 0 0;color:#888;overflow:hidden;line-height:1.3em;height:1.3em;">&nbsp;<b>'+value.regno+'</b></p>'+
												'<p style="text-align:right;margin:0 0 0;color:#888;overflow:hidden;line-height:1.3em;height:1.3em;">&nbsp;'+value.name+'</p>'+
												'<p style="text-align:right;margin:0 0 0;color:#aaa;height:2em;overflow:hidden;line-height:1.3em;height:2.6em;">&nbsp;'+value.qualification+'</p>'+
												'<p style="text-align:right;margin:0 0 0;color:#aaa;overflow:hidden;line-height:1.3em;height:1.3em;">&nbsp;'+value.contact+'</p>'+
											'</div>'+
											'<div class="col-md-4">'+
												'<p style="text-align:center;margin:0 0 0;color:#aaa;overflow:hidden;line-height:1.3em;height:1.3em;">&nbsp;'+value.clinic_name+'</p>'+
												'<p style="text-align:center;margin:0 0 0;color:#aaa;overflow:hidden;line-height:1.3em;height:1.3em;">&nbsp;'+value.address+'</p>'+
											'</div>'+
											'<div class="col-md-3">'+
												'<a href="<?=base_url("doctor/edit/'+value.id+'");?>" class="btn btn-success btn-sm btn-block"><span class="glyphicon glyphicon-pencil"></span> Edit</a>'+
												'<div class="btn btn-danger btn-sm btn-block" data-docid="'+value.id+'" data-target="#customModal" data-toggle="modal"><span class="glyphicon glyphicon-cancel"></span> Delete</div>'+
												'<label style="display:block;margin-top:5px;"><div class="btn btn-default btn-sm btn-block enabledisable"><input type="checkbox" '+isactive+'  data-docid='+value.id+'/> Active</div></label>'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
								'</div>';

			});
			$('#doctorsContainer').empty().append(domString);
		}



		$('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
				}).on('show.bs.modal',function(event){
						
						var _this = $(event.relatedTarget);
						var docid = _this.data('docid');
						console.log( docid );
				
				var modal = $(this);
				modal.find('.modal-body').text('Delete news and all subnews under this news.');
				modal.find('#DeleteNews').show();
				$('#customModal').find('[data-dismiss="modal"]').show();
				modal.find('#DeleteNews').data("docid",docid);
			
		});

		$('#DeleteNews').on('click',function(){
			var _this = $(this);
			$('#customModal').find('.modal-body').text('');
			$('#customModal').find('#DeleteNews').hide();
			$('#customModal').find('[data-dismiss="modal"]').hide();
			$('#customModal').find('.modal-body').append('<i class="fa fa-spinner fa-pulse"></i> Deleting News... ');
			var docid = _this.data('docid');
			//console.log(_this);
			$.ajax({
					type:'POST',
					async:true,
					dataType:"json",
					data:{
							"docid":docid
						},
					url:xb_global_namespace.baseurl+"admin_requests/doctor/remove_doctor",
					success: function(datareceived, textStatus, jqXHR)
					{
						//console.log(datareceived);
						$('#customModal').modal('hide');

						if(datareceived['status'] == 'login')
						{
							$('#docid-'+docid+'').slideUp(1000,function(){$(this).replaceWith('');});
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
</script>