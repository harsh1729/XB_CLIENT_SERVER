<div class="col-md-<?=$size;?> col-xs-<?=$size;?> col-sm-<?=$size;?>">
	<div style="background-color:#fff;border-radius:4px;">
	<a href="<?=base_url('detail/'.$id);?>" style="text-decoration:none;">
		<div class="well well-sm" style="background-color:transparent;">
			<div style="width:100%;height:200px;overflow:hidden;">
				<img src="<?=$image?>" class="center-cropped" style="min-height:100%;"/>
			</div>
			<div style="font-size:.8em;color:#666;"><?=$datetime;?></div>
			<div style="font-size:14px;line-height:1.4em;color:#333;"><?=$heading;?></div>
		</div>
	</a>
	</div>
</div>