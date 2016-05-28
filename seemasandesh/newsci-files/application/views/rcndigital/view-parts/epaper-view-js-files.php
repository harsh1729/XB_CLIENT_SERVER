<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">

		EPAPER_NAMESPACE = {};

		EPAPER_NAMESPACE.get_areas_dom_string = function(areacode,datetoday,previewimage,areaname){
			var domString = "<div class='col-md-4'>"+
								"<a href='<?=base_url();?>epaper/"+areacode+"/"+datetoday+"' target='blank'>"+
									"<div class='text-center'>"+
										"<img src='"+previewimage+"'>"+
										"<div style='margin-top:0px;background-image:url(<?=base_url($datafoldername.'images/epaper_bg.jpg');?>);color:#fff;padding:3px;'>"+areaname+
										"</div>"+
									"</div>"+
								"</a>"+
							"</div>";
			return domString;
		}
				 
			
			$(".datetimepicker").datepicker({
				autoclose: true,
				todayBtn: "linked",
				todayHighlight: true,
				endDate: '0d',
				format : "dd-mm-yyyy"
			}).on('changeDate',function(event){
				$('#loading_bar').css('display','block');
				$.ajax({
					async:true,
					dataType:'json',
					type:'POST',
					url:Global_namespace.baseurl+"client_requests/epaper/get_epaper",
					data:{
							'domainname':Global_namespace.domainname,
							'date':$('#mydate').val(),
						},
					success:function(data,textStatus,jqXHR)
					{
						$('#loading_bar').css('display','none');
						console.log(data);

						if(data.length > 0)
						{
							$('#states_container').empty();
							$('#states_container').tabs('destroy');
							var domString = "";
							var tabsDomString = "<ul>";
							var areasContainerDomString = "";

							$.each(data,function(index,statevalue)
							{
								console.log(statevalue);
								if(data.length > 1)
								{
									tabsDomString += "<li style='margin-left:2px;'>"+
														"<a href='#statetab-"+index+"'>"+statevalue.name+"</a>"+
													"</li>";
								}

								areasContainerDomString += "<div class='row' id='statetab-"+index+"' style='padding-top:0px;padding-bottom:0px;'>"+
																"<div class='col-md-12 epaper_container' style='background-image:url(<?=base_url($datafoldername.'images/epaper_container_bg.jpg');?>);'>";
															    	$.each(statevalue.areas,function(ind,val){
															    		if(ind%3 == 0)
															    		{
															    			areasContainerDomString += "<div class='row' style='margin-top:30px;'>"+
																											"<div class='col-md-1'></div>"+
																											"<div class='col-md-10'>"+
																												"<div class='row'>";
															    		}
															    		areasContainerDomString += EPAPER_NAMESPACE.get_areas_dom_string(val.areacode,$('#mydate').val(),val.previewimage,val.name);
															    		if((ind+1)%3 == 0 || ind+1 == statevalue['areas'].length)
															    		{
															    			areasContainerDomString += "</div>"+
																											"</div>"+
																											"<div class='col-md-1'>"+
																											"</div>"+
																										"</div>";
															    		}
															    	});
									areasContainerDomString += "</div>"+
															"</div>";

							});
							tabsDomString += "</ul>";
							domString = tabsDomString+areasContainerDomString;
							$('#states_container').append(domString);

							$('#states_container').tabs({active:0});
							//console.log(domString);
						}
					},
					error:function(jqXHR,textStatus,errorThrown)
					{
						$('#loading_bar').css('display','none');
						console.log(jqXHR,textStatus,errorThrown);
					}
				});
			});

	$(document).ready(function()
	{
		$('#states_container').tabs({active:0});
	});
				 
</script>