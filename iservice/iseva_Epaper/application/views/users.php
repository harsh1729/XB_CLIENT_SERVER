<?=$header;?>
			<!-- <div id="loading_bar" style="height:700px;width:100%; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:none;">
				<img src="<?=base_url('docs/images/ajax-loader-blue.gif')?>" style="margin-top:18%; margin-left:45%;">
			</div> -->
			<div class="container-fluid" style="/*padding-bottom:10px;*/ background-color:#fff;">
                <div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">
					<div class="row" style="">
		                <div class="col-md-3 col-sm-3 hidden-xs">
		                	<span><button type="button" class="imeboldbtn btn btn-sm btn-info" title="Bold" style="margin-left:10px;"><b>B</b></button></span>
							<span><button type="button" class="imeitalicbtn btn btn-sm btn-info" title="Italic"><i>I</i></button></span>
							<span><button type="button" class="imeunderlinebtn btn btn-sm btn-info" title="Underline"><u>U</u></button></span>
							<span><button type="button" class="imefontsizebtn btn btn-sm btn-info" title="Text size"><span class="glyphicon glyphicon-signal"></span></button></span>
							<span><button type="button" class="imelinkbtn btn btn-sm btn-info" title="Add Link">li</button></span>
						</div>
		                <div class="col-md-9 col-sm-9 col-xs-12">
							<!-- <div class="btn btn-default pull-right" style="height:34px;margin-right:10px;" id='filter'><span class="glyphicon glyphicon-filter"></span></div> -->
							<select name="rootcategory" id="rootcategory" class="form-control" style="width:auto;display:inline-block;min-width:150px;max-width:150px;">
								<option value="">-- Root Category --</option>
								<?php foreach ($rootcategories as $index => $row): ?>
									<option value="<?=$row['catid'];?>"><?=$row['name'];?></option>
								<?php endforeach; ?>
							</select>
							<select name="subcategory" id="subcategory" class="form-control" style="width:auto;display:inline-block;min-width:150px;max-width:150px;">
								
							</select>
							<select name="city" id="city" class="form-control" style="width:auto;display:inline-block;min-width:150px;max-width:150px;">
								<option value="">-- City --</option>
								<?php foreach ($cities as $index => $row): ?>
									<option value="<?=$row['id'];?>"><?=$row['name'];?> [<?=$row['pincode'];?>]</option>
								<?php endforeach; ?>
							</select>
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-filter"></span> <span id="filterlabel">All</span></button>
								<ul class="dropdown-menu">
									<li><a href="" class="userfilter" data-filter="all">All</a></li>
									<li class="divider" role="separator"></li>
									<li><a href="" class="userfilter" data-filter="active">Active</a></li>
									<li><a href="" class="userfilter" data-filter="pending">Pending</a></li>
									<!-- <li><a href="" class="userfilter" data-filter="notregistered">Not Registered</a></li>
									<li><a href="" class="userfilter" data-filter="registered">Registered</a></li>
									<li><a href="" class="userfilter" data-filter="nonpaidmerchant">Merchant w/o payment</a></li>
									<li><a href="" class="userfilter" data-filter="merchant">Paid Merchants</a></li> -->
								</ul>
							</div>
							
						</div>
		            </div>
				</div>
			</div>
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;margin-top:20px;">
	<div class="row">
		<div class="col-md-12">
			<div style="padding:15px;border:1px dashed #aaaaaa;">
				<div class="row">
					<!-- <div class="col-md-4 text-center">
						Total Registered:<strong> 3547</strong>
						<div style="position:absolute;top:0;right:0px;height:20px;width:1px;background-color:#000;"></div>
					</div>
					<div class="col-md-2 text-center">
						<strong>536</strong> Premium
					</div>
					<div class="col-md-2 text-center">
						<strong>1043</strong> End Users
					</div>
					<div class="col-md-2 text-center">
						<strong>63</strong> Amount Pending
					</div>
					<div class="col-md-2 text-center">
						<strong>8</strong> Pending Approval
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div style="padding:15px;border:1px dashed #aaaaaa;" id="merchantcontainer">
				<!-- <div class="well well-sm">
					<div class="row">
						<div class="col-md-3">
							<div style="outline:solid 1px #fff;padding:1px;">
								<img src="http://localhost/iservice/publicuploads/2015/12/thumb_14514656151451466076.jpg" alt="img" class="img-responsive center-block" style="height:100px;">
							</div>
						</div>
						<div class="col-md-9">
							<p style="margin-bottom:0px;">
								<strong class="text-faded"><i>Jaspal Singh</i></strong>
								<span class="pull-right text-faded">Customer No: <i>34852</i></span>
							</p>
							<p style="margin-bottom:0px;">
								<span class="text-faded"><i class="fa fa-mobile"></i> : <i>+91-78913-84482</i></span>
							</p>
							<p style="margin-bottom:0px;">
								<span class="text-faded"><i class="fa fa-envelope"></i> : <i>jaspal.creator@gmail.com</i></span>
							</p>
							<p style="margin-bottom:0px;">
								<span class="text-faded"><i class="fa fa-user-secret"></i> : <i>jaspal.singh</i></span>
							</p>
							<p style="margin-bottom:0px;">
								<span class="text-faded"><i class="fa fa-star"></i> : <i>4.6</i></span>
							</p>
						</div>
						<div class="col-md-12">
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<a href="<?=base_url('users/3');?>" class="btn btn-default"><i class="fa fa-eye"></i> View</a>
							<div class="btn btn-success"><i class="fa fa-send"></i> Publish</div>
							<input type="checkbox" disabled name="" value=""  class="bootstraptogglebtn" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger" >
						</div>
					</div>
				</div> -->



			</div>
		</div>
	</div>