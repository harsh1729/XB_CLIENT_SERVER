<?=$header;?>
			<div id="loadingscreen" style="height:700px;width:100%; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:none;">
				<img src="<?=base_url('docs/images/ajax-loader-blue.gif')?>" style="margin-top:18%; margin-left:45%;">
			</div>
			<div class="container-fluid" style="/*padding-bottom:10px;*/ background-color:#fff;">
                <div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;padding-right:10px;">
					<div class="row" style="">
		                <div class="col-md-4 hidden-xs">
		                	<span><button type="button" class="imeboldbtn btn btn-sm btn-info" title="Bold" style="margin-left:10px;"><b>B</b></button></span>
							<span><button type="button" class="imeitalicbtn btn btn-sm btn-info" title="Italic"><i>I</i></button></span>
							<span><button type="button" class="imeunderlinebtn btn btn-sm btn-info" title="Underline"><u>U</u></button></span>
							<span><button type="button" class="imefontsizebtn btn btn-sm btn-info" title="Text size"><span class="glyphicon glyphicon-signal"></span></button></span>
							<span><button type="button" class="imelinkbtn btn btn-sm btn-info" title="Add Link">li</button></span>
						</div>
						<div class="col-md-6 col-xs-12" style="padding-right:0px;">
						</div>
		                <div class="col-md-2 col-xs-12" style="padding-left:0px;">
						</div>
		            </div>
				</div>
			</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row" id="" style="display:block;">
		<div class="col-md-12">
			<div class="panel panel-success">
				<div class="panel-heading">
					Add New Screen
				</div>
				<div class="panel-body">
					<form id="screensaveform">
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="name" id="name" value="" placeholder="Screen Name" class="form-control" required="required">
							</div>
							<div class="col-md-6">
								<textarea name="description" id="description" class="form-control" rows="1" style="resize:none;" placeholder="Description" required="required"></textarea>
							</div>
						</div>
						<div class="row" style="margin-top:10px;">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<button class="btn btn-success btn-block">
									<span class="glyphicon glyphicon-save"></span>
									Save
								</button>
							</div>
							<div class="col-md-4"></div>
						</div>
					</form>
				</div>
			</div>
			<hr>
		</div>	
	</div>
</div>
<div class="container-fluid" style="min-height:49vh;">
	<div class="row">
		<div class="col-md-12">
			<div style="width:100%;border:1px solid #00ff00;padding:6px;overflow:auto;min-height:200px;" id="screenscontainer">
				
				<?php foreach ($screens as $index => $value): ?>
					<div class="well well-sm">
						<div class="row">
							<div class="col-md-10">
								<div style="height:150px;background-color:#aaa;width:1px;position:absolute;right:0px;">&nbsp;</div>
								<h4><?=$value['name'];?></h4>
								<hr>
								<h5><?=$value['description'];?></h5>
								<br>
							</div>
							<div class="col-md-2 col-sm-2 col-sm-2">
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-move"></span> Move
									<span class="badge"><?=$value['sortorder'];?></span>
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-pencil"></span> edit
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-remove"></span> Disable
								</div>
								<div class="btn btn-default btn-block">
									<span class="glyphicon glyphicon-eye-open"></span> View
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

