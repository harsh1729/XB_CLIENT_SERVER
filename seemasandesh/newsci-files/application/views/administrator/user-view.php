 		<?=$header;?>
	</div>
</div>
<div id="loading_bar" style="height:700px;width:100%; margin-top:-10px; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:;">
		<img src="<?=base_url('admin_docs/images/ajax-loader-blue.gif');?>" style="margin-top:18%; margin-left:45%;">
</div>
<div class="container-fluid" style="min-height:89vh;">
<div class="row" style="">
    	<div class="col-md-12">
            <div class="panel panel-info" >
                <div class="panel-heading" id="all_user_heading">
                    <span class="glyphicon glyphicon-sort"></span> View All Users
                </div>
                <div class="panel-body" id="all_user_container" style="display:none;">
                </div>
            </div>
		</div>
    </div>

    <div class="row">
	    <div class="col-lg-1 col-md-1">
	    </div>
	    <div class="col-lg-10 col-md-10">
		    <div class="panel panel-info">
			    <div class="panel-heading">
				    <h3 class="panel-title">New User</h3>
			    </div>
			    <div class="panel-body">
                	<form action="<?=base_url('admin_requests/user/add_user');?>" method="post" id="newUserForm">
				    <div class="input-group">
				        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-user"></span></span>
				        <input  class="form-control lang_class"  name="name" id="name" placeholder="First Name" required type="text" maxlength="20" pattern=".{3,20}" title="3 characters minimum" aria-required="true" pattern="[A-Za-z-0-9]+" />
				    </div>
                    <div class="input-group">
                        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-user"></span></span>
                        <input  name="lastname" id="lastname" placeholder="Last Name" type="text" class="form-control lang_class" maxlength="20" pattern=".{3,20}" title="3 characters minimum"  pattern="[A-Za-z-0-9]+"/>
                    </div> 
                    <div class="input-group">
                        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-envelope"></span></span>
                        <input  name="email" id="email" placeholder="Email Id" class="form-control lang_class" type="email"  />
                    </div> 
                    <div class="input-group">
                        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-phone"></span></span>
                        <input required name="contact" id="contact" placeholder="Contact Number" class="form-control" maxlength="12" pattern=".{10,}" pattern="[0-9]+" type="text" />	
                    </div> 
                    <div class="input-group">
                        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-briefcase"></span></span>
                        <select name="userrole" class="form-control" required="required">
                        	<option value="">Choose User Role</option>
                            <?php
                                foreach ($usertypes as $row)
                                {
                                    echo "<option value='".$row['id']."'>".$row['type']."</option>";
                                }
							?>
                        </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-calendar"></span></span>
<!--                        <input required name="dob" placeholder="date of birth" class="form-control lang_class" type="date"  max="2004-12-31" min="1975-12-21"/>-->
                        <input type="text" name="dob" class="form-control" id="datepicker" placeholder="Date of Birth" data-date-format="dd-mm-yyyy">
                    </div>  
                    <div class="input-group">
                        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-tree-deciduous"></span></span>
                        <input  name="address" id="address" placeholder="Address" class="form-control lang_class" maxlength="20" pattern=".{4,}" title="4 characters minimum" type="text" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-globe"></span></span>
                        <select name="areacodeid" class="form-control">
                            <option value="">Choose Area</option>
                            <?php
                                foreach ($areas as $row)
                                {
                                    echo "<option value='".$row['areaid']."'>".$row['areaname']."[".$row['areacode']."](".$row['statename'].")</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-user"></span></span>
                        <input required name="username" id="username" placeholder="User Name" class="form-control lang_class" maxlength="20" pattern=".{4,}" title="4 characters minimum" type="text" />
                    </div> 
                    <div class="input-group">
                        <span class="input-group-addon" style="border:solid 1px #999999; background-color:#1abc9c"><span style="color:#FFF;" class="glyphicon glyphicon-lock"></span></span>
                        <input required name="password" id="password" id="Resiter_password" placeholder="Password" class="form-control" pattern=".{6,}" title="6 characters minimum" type="text" />
                    </div> 
                    
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <button type="submit" class="btn btn-success btn-block btn-lg" ><span class="glyphicon glyphicon-log-in"></span> Create User</button>
                        </div>
                        <div class="col-lg-4 col-md-4">
                        </div>
                    </div>
                    </form>
			    </div>
			</div>
		</div>
        <div class="col-lg-1 col-md-1">
        </div>
 <div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="customModalLabel">
               Are you Sure ?
            </h4>
         </div>
         <div class="modal-body">
            This will delete the user !
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">
                Close
            </button>
            <button type="button" class="btn btn-danger" id="DeleteCategory" data-catId="-1" >
               Delete
            </button>
         </div>
      </div>
   </div>
</div>  
    </div> 