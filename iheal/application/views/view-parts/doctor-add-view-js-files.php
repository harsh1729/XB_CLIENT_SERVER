<script type="text/javascript" src="<?=base_url();?>js/xerces_globals.js"></script>
<!--********** loading DROPZONE methods ***************-->
<script src="<?=base_url();?>plugins/dropzone/js/dropzone.js"></script>
<!--************ IME DROPZONE end *****************-->

<script type="text/javascript">



var _Ddropzone;
var _Hdropzone;
var formDataSaved = false;

	$(document).ready(function(){
		$('#address_state').on('change',function(e){
			var _this = $(this);
			var stateid = _this.find('option:selected').val();
			console.log(stateid);

			$('#address_city').empty();

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
					//console.log(datareceived);
					if(datareceived['status'] == 'login')
					{
						var domString = "";
						$.each(datareceived['cities'],function(key,value){
							if(key == 0)
								domString += "<option value=''>choose city</option>";
							domString += "<option value='"+value.id+"'>"+value.name+"</option>";
						});
						$('#address_city').append(domString);
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


		/*$('#hospital_address_state').on('change',function(e){
			var _this = $(this);
			var stateid = _this.find('option:selected').val();
			console.log(stateid);

			$('#hospital_address_city').empty();

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
					//console.log(datareceived);
					if(datareceived['status'] == 'login')
					{
						var domString = "";
						$.each(datareceived['cities'],function(key,value){
							if(key == 0)
								domString += "<option value=''>choose city</option>";
							domString += "<option value='"+value.id+"'>"+value.name+"</option>";
						});
						$('#hospital_address_city').append(domString);

					}
					else if(datareceived['status'] == 'notlogin')
					{$(location).attr('href',$(location).attr('href'));}
				},
				error:function(jqXHR,textStatus,errorThrown)
				{
					console.log(jqXHR,textStatus,errorThrown);
				}
			});

		});*/

		$('#doctor_entry_form').on('submit',function(event){
			var _this = $(this);

			event.preventDefault();
			/*var doc_city = $('#doctor_address_city').val();
			var clinic_city = $('#hospital_address_city').val();
			if((doc_city == "" || doc_city == null) && (clinic_city == "" || clinic_city == null) )
			{
				alert("please choose city in atleast one address !");
			}
			else
			{*/
				var postData = $(this).serializeArray();
					var lat = document.getElementById('lat').dataset.lat;
					var lng = document.getElementById('lng').dataset.lng;
				//	console.log(lat,lng);
					postData.push({"name":"lat","value":lat});
					postData.push({"name":"lng","value":lng});
				//console.log(postData);

				formDataSaved = true;
				$('#loading_bar').css({"display":"inline"});
				$.ajax({
					async: true,
					type:'POST',
					dataType:'json',
					url:xb_global_namespace.baseurl+"admin_requests/doctor/insertDoctor",
					data:postData,
					success:function(datareceived,textStatus,jqXHR)
					{
						console.log(datareceived);
						if(datareceived['status'] == 'login')
						{
							_Ddropzone.removeAllFiles();
							_Hdropzone.removeAllFiles();
							_this.find('input,textarea').not('input[type="submit"]').val('');
							_this.find('input:checkbox').removeAttr('checked');
							_this.find('select').prop('selectedIndex',0);
							_this.find('#address_city').empty();

							$('#mapblock').css({
								"display":"block"
							});
							document.getElementById('lat').dataset.lat = 0;
							document.getElementById('lat').innerHTML = "Lat:"+0;

							document.getElementById('lng').dataset.lng = 0;
							document.getElementById('lng').innerHTML = "Long:"+0;

							formDataSaved = false;
							$('#loading_bar').css({"display":"none"});
							$('html, body').animate({
										scrollTop: $("body").offset().top
									}, 1000);
						}
						else if(datareceived['status'] == 'notlogin')
						{$(location).attr('href',$(location).attr('href'));}
					},
					error:function(jqXHR,textStatus,errorThrown)
					{
						console.log(jqXHR,textStatus,errorThrown);
					}
				});
			//}

		});
		$('input').keypress(function(e) {
		    var code = e.keyCode || e.which;
		    if(code == 13)
		        return false;
		});

		$(document).on('change','#mapenable',function(event){
			var _this = $(this);
			//_this.is(':checked')
			if(_this.is(':checked'))
			{
				//console.log("if part!!1",myMarker.position);
				$('#mapblock').css({
					"display":"none"
				});
				updatelatlng(myMarker.position.G,myMarker.position.K);
			}
			else
			{
				$('#mapblock').css({
					"display":"block"
				});
				document.getElementById('lat').dataset.lat = 0;
				document.getElementById('lat').innerHTML = "Lat:"+0;

				document.getElementById('lng').dataset.lng = 0;
				document.getElementById('lng').innerHTML = "Long:"+0;
			}
			
		});

	});




	Dropzone.options.Ddropzone = {
			addRemoveLinks: true,
			parallelUploads: 1,
            acceptedFiles: 'image/*, audio/*, video/*',
            thumbnailWidth: 130,
            thumbnailHeight: 100,
            maxFiles: 1,
         //   previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n <input type=\"text\" data-dz-doc-expiration-date class=\"dz-doc-input\" />\n <select class=\"dz-doc-input\" data-dz-doc-document-type-id  ></select>\n   <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress></span></div>\n  <div class=\"dz-success-mark\"><span>✔</span></div>\n  <div class=\"dz-error-mark\"><span>✘</span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>",   
            uploadMultiple: false,
	            init: function() {
                    _Ddropzone = this;
                    
                    
                  //var doctor_image_name;
                    
    	          this.on("addedfile", function(file) {
                    
                    		//console.log(file);
            			  }); 
                     
                     
                this.on("success", function(files, response) {
                       
                   	  //console.log("success:-----",response);
						$('#image_doctor').val(response.trim());
						
    			
                    });
						  
				this.on("removedfile",function(file){

					if(!formDataSaved)
					{
						$.ajax({
								url:xb_global_namespace.baseurl+'admin_requests/doctor/remove_image',
								dataType:"json",
								async: true,
								type: 'POST',
								data: {"filename":file.xhr.response},
								success:function(datarecieved,textStatus,jqXHR)
								{
									//console.log("Removed successfully!",datarecieved);
									if(datarecieved['status'] == 'login')
									{}
									else if(datarecieved['status'] == 'notlogin')
									{$(location).attr('href',$(location).attr('href'));}
								},
								error: function(jqXHR, textStatus, errorThrown)
								{
									console.log("file not Remove!!",jqXHR,textStatus,errorThrown);
								}								
							});
						$('#image_doctor').val("");
                 	}
    						
					});
                    
                    this.on("maxfilesexceeded", function(file){
                        this.removeAllFiles();
                        this.addFile(file);
                    });
 
				},			
          };
var hospital_image=0;

          Dropzone.options.Hdropzone = {
			addRemoveLinks: true,
			parallelUploads: 1,
            acceptedFiles: 'image/*, audio/*, video/*',
            thumbnailWidth: 130,
            thumbnailHeight: 100,
            maxFiles: 30,
         //   previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n <input type=\"text\" data-dz-doc-expiration-date class=\"dz-doc-input\" />\n <select class=\"dz-doc-input\" data-dz-doc-document-type-id  ></select>\n   <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress></span></div>\n  <div class=\"dz-success-mark\"><span>✔</span></div>\n  <div class=\"dz-error-mark\"><span>✘</span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>",   
            uploadMultiple: false,
	            init: function() {
                    _Hdropzone = this;
                    
                    
                  var pre_textdelete_file_name;
                    
    	          this.on("addedfile", function(file) {
                    
                    		
            			  }); 
                     
                     
                this.on("success", function(files, response) {
                	hospital_image++;
                       files.name = response;
                   	  //console.log('hospital image'+response,files.xhr.response);
						$('#imgpre_text').val(response);
						pre_textdelete_file_name = response;

						var hidden = "<input type='hidden' id='"+files.xhr.response.trim()+"' value='"+files.xhr.response.trim()+"' name='hospital_image"+hospital_image+"'>";
    					$('#container_hospital').append(hidden);
    					$('#no_of_H_img').val(hospital_image);
                    });
						  
				this.on("removedfile",function(file){
                   	
	               		if(!formDataSaved)
	               		{
	                   		console.log("delete"+file.xhr.response);
							$.ajax({
									url:xb_global_namespace.baseurl+'admin_requests/doctor/remove_image',
									dataType:"json",
									async: true,
									type: 'POST',
									data: {"filename":file.xhr.response},
									success:function(datarecieved,textStatus,jqXHR)
									{
										//console.log("Removed successfully!",datarecieved);
										if(datarecieved['status'] == 'login')
										{}
										else if(datarecieved['status'] == 'notlogin')
										{$(location).attr('href',$(location).attr('href'));}
									},
									error: function(jqXHR, textStatus, errorThrown)
									{
										console.log("file not Remove!!",jqXHR,textStatus,errorThrown);
									}								
								});
							var s =file.xhr.response;

							$('#'+s.trim()).remove();
	    				}	
					});
                    
                    this.on("maxfilesexceeded", function(file){
                        this.removeAllFiles();
                        this.addFile(file);
                    });
 
				},			
          };

 function updatelatlng(lat,lng)
 {
 	mapenable = document.getElementById('mapenable').checked;
 	if(mapenable)
 	{
		document.getElementById('lat').dataset.lat = lat;
		document.getElementById('lat').innerHTML = "Lat:"+lat;

		//console.log(document.getElementById('lat').dataset.lat);

		document.getElementById('lng').dataset.lng = lng;
		document.getElementById('lng').innerHTML = "Long:"+lng;

	}
 }
 var myMarker;
function initAutocomplete() {
                  var map = new google.maps.Map(document.getElementById('map-canvas'), {
                    center: {lat:24.06839925673952, lng:79.26364124999998},
                    zoom: 3,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                  });



                  myMarker = new google.maps.Marker({
                    position: new google.maps.LatLng(47.651968, 9.478485),
                    draggable: true
                });

                google.maps.event.addListener(myMarker, 'dragend', function (evt) {
                    //document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat() + ' Current Lng: ' + evt.latLng.lng() + '</p>';
                    
                    updatelatlng(evt.latLng.lat(),evt.latLng.lng());
                });

                google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
                    //document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
                });

                map.setCenter(myMarker.position);
                myMarker.setMap(map);



                  //var infoWindow = new google.maps.InfoWindow({map: map});

                  // Try HTML5 geolocation.
                 if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                      var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                      };

                      //infoWindow.setPosition(pos);
                      //infoWindow.setContent('Location found.');
                      myMarker.setPosition(pos);

                      	updatelatlng(pos.lat,pos.lng);

                      map.setCenter(pos);
                      map.setZoom(9);
                    }, function() {
                      //handleLocationError(true, infoWindow, map.getCenter());
                    });
                  } else {
                    // Browser doesn't support Geolocation
                   // handleLocationError(false, infoWindow, map.getCenter());
                  }


                  // Create the search box and link it to the UI element.
                  var input = document.getElementById('pac-input');
                  input.style.display = "block";
                  var searchBox = new google.maps.places.SearchBox(input);
                  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                  // Bias the SearchBox results towards current map's viewport.
                  map.addListener('bounds_changed', function() {
                    searchBox.setBounds(map.getBounds());
                  });

                  // Listen for the event fired when the user selects a prediction and retrieve
                  // more details for that place.
                  searchBox.addListener('places_changed', function() {
                    var places = searchBox.getPlaces();

                    //console.log(places);


                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function(place) {

                    updatelatlng(place.geometry.location.G,place.geometry.location.K);
                    //console.log(place.geometry.location.G,place.geometry.location.K);
                    myMarker.setPosition(place.geometry.location);
                      if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                      } else {
                        bounds.extend(place.geometry.location);
                      }

                    });
                    map.fitBounds(bounds);
                  });
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6Ul_RxInUyYb7lVhPUPv9CAQP4Txe9tY&libraries=places&callback=initAutocomplete" async defer></script>