<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="well" style="/*background-color:#424a5d;*/background-color:#000;border-radius:none;">
			<div style="background-color:transparent;color:#fff;text-shadow: 3px 3px 8px rgba(235, 45, 49, 0.45);position:absolute;z-index:1001;font-weight:bolder;font-size:1.7em;top:-17px;background-color:rgba(255,0,0,0.6);padding-left:6px;padding-right:6px;text-decoration:underline;">Breaking News</div>
			<a href="<?=base_url('detail/'.$id);?>" style="text-decoration:none;">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-3" >
					<img src="<?=$mainimage;?>" class="center-cropped" style="height:150px;"/>
				</div>
				<div class="col-md-9 col-sm-9 col-xs-9">
					<div style="height:130px;font-weight:bolder;font-size:2.2em;color:#fff;">
						<?=$heading?>
					</div>
					<div style="height:20px;color:#fff;">
						BY <?=$reportername;?> | <?=$daytime;?>
					</div>
				</div>
			</div>
			</a>
		</div>
	</div>
	<div class="col-md-3 col-sm-3 col-xs-3"></div>
</div>