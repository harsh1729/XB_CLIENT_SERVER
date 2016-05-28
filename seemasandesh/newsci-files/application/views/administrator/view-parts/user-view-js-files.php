<script src="<?=base_url();?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?=base_url();?>admin_docs/js/xerces_globals.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/libs/rangy/rangy-core.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.selector.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.preferences.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/src/jquery.ime.inputmethods.js"></script>
<script type="text/javascript" src="<?=base_url();?>plugins/ime_tool/js/script.js"></script>
<script>
$('#datepicker').datepicker({
                    format: "dd/mm/yyyy"
                });  
	$(document).ready(function(){ 
	$('#loading_bar').addClass('hidden');
		$('#newUserForm').on('submit',function(event){
                       $("#loading_bar").css("display","block");	
			postData = $(this).serializeArray();
			url = $(this).attr('action');
			//console.log(postData,url);
			$.ajax({
				async: true,
				type:'POST',
				dataType:'json',
				url:url,
				data:postData,
				success:function(datarecieved,textStatus,jqXHR)
				{
					//console.log(datarecieved);
					if(datarecieved['status'] == 'login')
					{
						var data = datarecieved['data'];
						if(data[0] >0 && data[1] > 0)
						{
							alert("Created Successfully !");
							/*$(this).find("input[type=text],textarea,input[type=email]").val('');
							$(this).find('select').prop('selectedIndex',0);*/
							$("#newUserForm")[0].reset();
						}
					}
					else if(datarecieved['status'] == 'notlogin')
					{$(location).attr('href',$(location).attr('href'));}
                                      $("#loading_bar").css("display","none");	
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
				}
			});
			event.preventDefault();
		});
	});

 $('#all_user_heading').click(function()
        {
            $('#all_user_container').slideToggle("slow");
        });



	$(document).ready(function(e) {
         $.ajax({
                url:xb_global_namespace.baseurl+'admin_requests/user/get_child_users',
                dataType:"json",
                async: true,
                type: 'POST',
                data: {},
                success: function(data, textStatus, jqXHR)
                {
                   console.log(data.length);
                    $.each(data,function(key,value){
                            console.log("main :"+value.id);
                            //console.log("main :"+value.name);
                         
                           var all_cat = "<div class='row' style='' id='div"+value.id+"'>"
                                                +"<div class='col-md-3' style='padding:5px; '>"
                                                    +"<div class='form-control' style='background-color:#fff; padding-top:5px;padding-bottom:5px;'>"+value.name+"</div>"
                                                +"</div>"
                                                  +"<div class='col-md-3' style='padding:5px; '>"
                                                    +"<div class='form-control' style='background-color:#fff; padding-top:5px;padding-bottom:5px;'>"+value.contact+"</div>"
                                                +"</div>"
                                                  +"<div class='col-md-4' style='padding:5px; '>"
                                                    +"<div class='form-control' style='background-color:#fff; padding-top:5px;padding-bottom:5px;'>"+value.email+"</div>"
                                                +"</div>"
                                                 +"<div class='col-md-1'></div>"
                                                +"<div class='col-md-1' style='padding-top:5px;padding-bottom:9px;padding-left:5px;padding-right:5px;'>"
                                               +"<button   class='user_delete_btn btn btn-sm btn-danger btn-block' data-id='"+value.id+"' data-target='#customModal' data-toggle='modal' ><span class='glyphicon glyphicon-trash'></span> Delete</button>"
                                                +"</div>"
     
                                            +"</div>";
                             
                            $(all_cat).appendTo('#all_user_container');
                            
				$("#loading_bar").css("display","none");									
                          
                                    
                       });
                
                },
                error: function(jqXHR, textStatus, errorThrown) 
                {
                    console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
                    $("#loading_bar").css("display","none");	
                },
            });
    });


 $('#customModal').modal({
                keyboard: true,
                backdrop: "static",
                show:false
                }).on('show.bs.modal',function(event){
                        
                        var button = $(event.relatedTarget);
                        var id = button.data('id');
                        
                        
                        
                      
                     var modal = $(this);
                    modal.find('.modal-body').text('This operation will delete the respective category from server !');
                    modal.find('#DeleteCategory').text("Delete");
                    modal.find('#DeleteCategory').data("id",id);
               
            
        });

$('#DeleteCategory').on('click',function(){
            var _this = $(this);
            $('#customModal').modal('hide');
              var id = _this.data('id');
           $.ajax({
                    type:'POST',
                    async:false,
                    //dataType:"json",
                    data:{"userid":id},
                    url:xb_global_namespace.baseurl+'admin_requests/user/delete_user',
                    success: function(data, textStatus, jqXHR)
                    {
                        $('#div'+id).remove();
                       
                   },
                
                    
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
                        alert(textStatus);
                    }
                });
        }); 

    /*   $(document).on('click','.user_delete_btn',function(){
      _this = $(this);
      var id = _this.data('id');


       $.ajax({
                    type:'POST',
                    async:false,
                    //dataType:"json",
                    data:{"userid":id},
                    url:xb_global_namespace.baseurl+'admin_requests/user/delete_user',
                    success: function(data, textStatus, jqXHR)
                    {
                        $('#div'+id).remove();
                        alert("delete succesfully");
                   },
                
                    
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        console.log(jqXHR + "\n" + textStatus + "\n" + errorThrown);
                        alert(textStatus);
                    }
                });
            
});*/
</script>