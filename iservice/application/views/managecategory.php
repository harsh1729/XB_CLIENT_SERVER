<?=$header;?>
			<div id="loadingscreen" style="height:700px;width:100%; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:block;">
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
						<div class="col-md-5">
							<button type="submit" form="savecontrolsform" class="btn btn-success pull-right" id="savecontrolsbtn" style="display:none;">
								<span class="glyphicon glyphicon-save"></span>
								Save Controls
							</button>
						</div>
						<div class="col-md-1 col-xs-12" style="padding-right:0px;">
							<a href="<?=base_url('category/manage/'.$catid.'/screens');?>" class="btn btn-default pull-right">
								<span class="glyphicon glyphicon-cog"></span>
							</a>
						</div>
						<div class="col-md-2 col-xs-12" style="padding-left:0px;">
							<select name="" class="form-control" id="screen_selector">
								<?php foreach ($screens as $index => $value): ?>
									<option value="<?=$value['id'];?>"><?=$value['name'];?></option>
								<?php endforeach; ?>
							</select>
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
					Add New Controls
				</div>
				<div class="panel-body">
					<div class="row">
						<?php foreach ($controls as $index => $value): ?>
							<div class="col-md-3">
								<div class="btn btn-default btn-block addNew addcontrolbtn" data-controlid="<?=$value['id'];?>"><span class="glyphicon glyphicon-plus"></span> <?=$value['name'];?></div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<hr>
		</div>	
	</div>
</div>
<div class="container-fluid" style="min-height:49vh;">
	<div class="row">
		<div class="col-md-7">
			<div style="border:1px solid #00ff00;padding:6px;">
				<div class="well well-sm">
					<h4>Firm Name</h4>
				</div>
				<div class="well well-sm">
					<h4>Firm Contact</h4>
				</div>
				<div class="well well-sm">
					<h4>Profile Image</h4>
				</div>
			</div>
			<form id="savecontrolsform">
				<div style="width:100%;border:1px solid #00ff00;padding:6px;overflow:auto;min-height:200px;" id="controlscontainer" class="sortableItem" >
					
				</div>
			</form>
		</div>
	</div>

