<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="row">
			<div class="col-md-4" style="padding-right:0px;">
				State : 
			</div>
			<div class="col-md-7" style="padding-right:0px;padding-left:0px;">	
				<select name="state" id="state" class="form-control" autofocus="autofocus">
					<option value="">Choose a state</option>
					<?php foreach ($states as $index => $row):?>
						<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="row">
			<div class="col-md-4" style="padding-right:0px;">
				City : 
			</div>
			<div class="col-md-7" style="padding-right:0px;padding-left:0px;">	
				<select name="city" id="city" class="form-control">
					<option value="">Choose a city</option>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="row">
			<div class="col-md-4" style="padding-right:0px;">
				Category : 
			</div>
			<div class="col-md-7" style="padding-right:0px;padding-left:0px;">	
				<select name="category" id="category" class="form-control">
					<option value="">Choose a category</option>
					<?php foreach ($categories as $index => $row):?>
						<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>
	<div class="col-md-1 col-sm-2 col-xs-4">
		<div class="dropdown">
			<button class="btn btn-default btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
				<span class="glyphicon glyphicon-filter"></span> 
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a href=""><label><input type="radio" name="filter" value="all" checked="checked"> Select All</label></a></li>
				<li role="separator" class="divider"></li>
				<li><a href=""><label><input type="radio" name="filter" value="approved"> Approved</label></a></li>
				<li><a href=""><label><input type="radio" name="filter" value="pending"> Pending Approval <span class="badge"></span></label></a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-2 col-sm-4 col-xs-8">
		<div class="btn btn-default btn-block" style="margin-top:0px;" id="saveSortBtn" disabled="true"><span class="glyphicon glyphicon-ok"></span> <span class="txt">No Changes<span></div>
	</div>
</div>
<div class="row" id="docContainerRowDiv">
	<div class="col-md-12">
		<div style="width:100%;background-color:#aaa;padding:10px;border:1px solid #999;border-radius:3px;margin-top:15px;" id="doctorsContainer">
			<div class="row" style="margin-bottom:10px;">

				<!--<div id="docid-1" class="col-md-3 sortableDiv" style="margin-bottom:10px;">
					<div style="background-color:#eee;border:1px solid #999;border-radius:4px;padding:5px;">
						<div class="row">
							<div class="col-md-10">
								<span class="label label-info">1</span>
							</div>
							<div class="col-md-2">
								<span class="glyphicon glyphicon-move sorthandle"></span>
							</div>
						</div>
						<div class="row"><div class="col-md-12"><div style="height:1px;width:100%;background-color:#888;margin-bottom:5px;"></div></div></div>
						<div class="row">
							<div class="col-md-5">
								<img src="http://totalassist.co.uk/wp-content/uploads/2014/05/Doctor-790x1024.jpg" class="center-cropped" style="min-width:100%;height:80px;border:1px solid #777;border-radius:3px;">
							</div>
							<div class="col-md-7" style="padding-left:0px;">
								<p style="text-align:right;margin:0 0 0;color:#888;">Jaspal Singh</p>
								<p style="text-align:right;margin:0 0 0;color:#aaa;">B.tech Honours</p>
								<p style="text-align:right;margin:0 0 0;color:#aaa;">+91 78913-84482</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p style="text-align:center;margin:0 0 0;color:#aaa;overflow:hidden;">Tantia Hospital & research centre</p>
								<p style="text-align:center;margin:0 0 0;color:#aaa;overflow:hidden;">Shiv colony,Sri Ganganagar</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6" style="padding-right:5px;">
								<div class="btn btn-success btn-sm btn-block"><span class="glyphicon glyphicon-pencil"></span> Edit</div>
							</div>
							<div class="col-md-6" style="padding-left:5px;">
								<div class="btn btn-danger btn-sm btn-block"><span class="glyphicon glyphicon-cancel"></span> Delete</div>
							</div>
						</div>
					</div>
				</div>

				-->


			</div>


		</div>
	</div>
</div>
<div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Are you Sure ?
				</h4>
			</div>
			<div class="modal-body">
				This will delete doctor Permanently !
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
				<button type="button" class="btn btn-danger" id="DeleteNews" data-docid="-1" >
					Delete
				</button>
			</div>
		</div>
	</div>
</div>