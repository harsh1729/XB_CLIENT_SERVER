<script type="text/javascript" src="<?=base_url();?>docs/js/xerces_globals.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
	$(function(){

		var USER_NAMESPACE = {};
		USER_NAMESPACE.filter = "all";
		USER_NAMESPACE.getUserDomString = function(id,name,firmname,firmcontact,contact,email,username,address,datetime,catid,cityid,isactive,ispublished,ismerchant,imagedata,wallet,limit){
			var ispublishedstr = "";
			if(isactive == 1)
				ispublishedstr = 'checked';

			var domString = '<div class="well well-sm">'+
								'<div class="row">'+
									'<div class="col-md-3">'+
										'<div style="outline:solid 1px #fff;padding:1px;">'+
											'<img src="'+imagedata.imageurl+'" alt="img" class="img-responsive center-block" style="height:100px;">'+
										'</div>'+
									'</div>'+
									'<div class="col-md-9">'+
										'<p style="margin-bottom:0px;">'+
											'<strong class="text-faded"><i>'+name+'</i>&nbsp;[</strong>'+firmname+'<strong class="text-faded">]</strong>'+
											/*'<span class="pull-right text-faded">Customer No: <i>'+id+'</i></span>'+*/
										'</p>'+
										'<p style="margin-bottom:0px;">'+
											'<span class="text-faded"><i class="fa fa-mobile"></i> Contact: <i>'+contact+'</i></span>'+
										'</p>'+
										'<p style="margin-bottom:0px;">'+
											'<span class="text-faded"><i class="fa fa-envelope"></i> Email: <i>'+email+'</i></span>'+
										'</p>'+
										'<p style="margin-bottom:0px;">'+
											'<span class="text-faded"><i class="fa fa-user-secret"></i> UserName: <i>'+username+'</i></span>'+
										'</p>'+
										'<p style="margin-bottom:0px;">'+
											'<span class="text-faded"><i class=""></i> Wallet: <i>'+wallet+'</i></span>'+
										'</p>'+
										/*'<p style="margin-bottom:0px;">'+
											'<span class="text-faded"><i class="fa fa-globe"></i> : <i>'+businesscity.name+'</i></span>'+
										'</p>'+
										'<p style="margin-bottom:0px;">'+
											'<span class="text-faded"><i class="fa fa-star"></i> : <i>'+rating+'</i></span>'+
										'</p>'+*/
									'</div>'+
									'<div class="col-md-12">'+
										'<hr>'+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-12">'+
										/*'<a href="'+xb_global_namespace.baseurl+'users/'+id+'" class="btn btn-default" ><i class="fa fa-eye"></i> View</a>'+*/
										/*'<div class="btn btn-success" '+ispublishedstr+'><i class="fa fa-send"></i> Publish</div>'+*/
										'<input type="checkbox" id="'+id+'" name="'+id+'" value="'+id+'"  class="bootstraptogglebtn" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger" '+ispublishedstr+' onchange=setDisablenable('+id+')>'+
										'<input type="text" id="edt.'+id+'" name="'+id+'" value="'+limit+'"  class="form control" >'+
										'<input type="button" style= "margin-left:10px" value="submit"  class="form control btn-success" onclick=setlimit('+id+')>'+
									'</div>'+
								'</div>'+
							'</div>';
		return domString;
		}


        setDisablenable = function(id){
        	
        	var isactive;
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
        	console.log("call checkbox",x);
        	if(x==true){
                isactive = 1;
        	}else{
        		 isactive = 0;
        	}
        	
        	$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					url:xb_global_namespace.baseurl+"admin_requests/user/setactive",
					data:{
						"userid":id,
						"isactive":isactive
						
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


        setlimit = function(id){
        	var limit =document.getElementById("edt."+id).value;
        	console.log("call btn max limit",limit);
        	$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					url:xb_global_namespace.baseurl+"admin_requests/user/setlimit",
					data:{
						"userid":id,
						"limit":limit
						
					},
					success:function(datarecieved,textStatus,jqXHR)
					{
						console.log(datarecieved);
						if(datarecieved['status'] == 'login')
						{
							//$('#loadMoreImagesContainer').css('display','none');
							alert("success");
							USER_NAMESPACE.loadUsers();

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

		USER_NAMESPACE.loadUsers = function(){
			
			var cityid = false;
			var catid = false;

			//if($("#city").val() !== null)
				cityid = $("#city").val();

			//if($("#subcategory").val() !== null)
				catid = $("#subcategory").val();
			//else 
				if(catid == null ){
				catid = $("#rootcategory").val();
			}


			console.log("catid:",catid);
			console.log("cityid:",cityid);
			console.log("fileter:",USER_NAMESPACE.filter);
			$.ajax({                
					async:true,
					type:'POST',
					dataType:'json',
					url:xb_global_namespace.baseurl+"admin_requests/user/getdata",
					data:{
						"catid":catid,
						"cityid":cityid,
						"filter":USER_NAMESPACE.filter
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
								$(USER_NAMESPACE.getUserDomString(val.id,val.name,val.firmname,val.firmcontact,val.contact,val.email,val.username,val.address,val.datetime,val.catid,val.cityid,val.isactive,val.ispublished,val.ismerchant,val.image,val.wallet,val.limit)).hide().appendTo('#merchantcontainer').fadeIn('1000', function() {});
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

		$('.bootstraptogglebtn').bootstrapToggle();
		$('#rootcategory').on('change', function(event) {
			
			var _this = $(this);
			console.log(_this.val());
			var rootcategory = _this.val();

			$('#subcategory').empty();

			$.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:xb_global_namespace.baseurl+"admin_requests/category/get",
				data:{

						"parentid":rootcategory
					},
				success:function(datareceived,textStatus,jqXHR)
				{
					console.log(datareceived['data'].length);
					if(datareceived['status'] == 'login')
					{
						var domString = "";
						$.each(datareceived['data'],function(key,value){
							if(key == 0)
								domString += "<option value=''>-- Sub Category --</option>";
							domString += "<option value='"+value.catid+"'>"+value.name+"</option>";
						});
						$('#subcategory').append(domString);
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
		});
		$('#subcategory').on('change', function(event) {
			var _this = $(this);
			console.log(_this.val());

			//catid = _this.val();
			
			USER_NAMESPACE.loadUsers();
		});
		$('#city').on('change',function(event){
			var _this = $(this);
			console.log(_this.val());

			//cityid = _this.val();
			
			USER_NAMESPACE.loadUsers();
		});


		$(document).on('click', '.userfilter', function(event) {
			event.preventDefault();
			console.log("clicked!!!");
			var _this = $(this);
			$('#filterlabel').text(_this.text());
			console.log(_this.data('filter'));
			USER_NAMESPACE.filter = _this.data('filter');
			console.log(USER_NAMESPACE.filter);

			USER_NAMESPACE.loadUsers();
		});

		USER_NAMESPACE.loadUsers();

	});
</script>