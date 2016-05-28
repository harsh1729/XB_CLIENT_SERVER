<script type="text/javascript">
	$(document).ready(function(){
		$('#contactusform').on('submit',function(event){
			_this = $(this);
			var postData = _this.serializeArray();
			postData.push({"name":"domainname","value":Global_namespace.domainname});
			//console.log(postData);
			$('#loading_bar').css({"display":"inline"});
			$.ajax({                                                            
				async:true,
				type:'POST',
				dataType:'json',
				url:Global_namespace.baseurl+"client_requests/contactus/contact_us",
				data:postData,
				success:function(datareceived,textStatus,jqXHR)
				{
					//console.log(datareceived);
					$('#loading_bar').css({"display":"none"});
					_this.find("input[name='name'],input[name='phoneno'],input[name='email'],textarea").val('');
					if(datareceived.id>0)
						alert("Thanks for your respose.");
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
					$('#loading_bar').css({"display":"none"});
					alert(textStatus);
				}
			});
			event.preventDefault();
		});
	});
</script>