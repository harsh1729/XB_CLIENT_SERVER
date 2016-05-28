<div style="background-color:transparent;color:#fff;text-shadow: 3px 3px 8px rgba(235, 45, 49, 0.45);position:absolute;z-index:1001;font-size:1.5em;top:-17px;background-color:rgba(0,0,0,0.6);padding-left:6px;padding-right:6px;text-decoration:none;margin-left:15px;margin-top:5px;"><?=$rootcategoryheading;?></div>
<div class="row-fluid" style="margin-top:5px;">
	<div class="col-md-12 carousel slide" id="myHorizontalSlider" style="background-image:url(<?=base_url($datafoldername.'/images/slider_bg3.gif')?>);padding:0px;border:1px solid #fff;">
		<div class="carousel-inner">
			<?php foreach($news as $newsindex => $row):?>
				<div class="<?=($newsindex==0)?'active':''?> item" data-slide-number="<?=$newsindex?>">
					<a href="<?=base_url().'detail/'.$row['newsId'];?>">
					<?php if(count($row['images'])>0):?>
						<?php if($row['images'][0]['link']==""):?>
							<img src="<?=base_url($datafoldername.'images/no_image_large.png');?>" style="height:240px;" class="img-responsive center-block">
						<?php else:?>
							<img src="<?=$row['images'][0]['link']?>" style="height:240px;" class="img-responsive center-block">
						<?php endif;?>
					<?php else: ?>
						<img src="<?=base_url($datafoldername.'images/no_image_large.png');?>" style="height:240px;" class="img-responsive center-block">
					<?php endif; ?>
						<div class="slider-heading-text"><?=$row['heading'];?></div>
					</a>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
<div class="row-fluid" style="background-color:#333333;">
	<div class="col-md-1 hidden-sm hidden-xs" style="padding-left:0px;padding-right:0px;">
		<a class="left carousel-control" href="#myHorizontalThumbnailSlider" data-slide="prev">
			<div style="height:130px;width:100%;background-color:#fff;display:table-cell;vertical-align:middle;">
				<img src="<?=base_url($datafoldername.'/images/left-arrow.png')?>" class="img-responsive" style="width:100%;"/>
			</div>
		</a>
	</div>
	<div class="col-md-10 hidden-sm hidden-xs carousel slide" id="myHorizontalThumbnailSlider" style="padding:0px 0px;">
		<div class="carousel-inner" style="background-color:#fff;">
			<?php foreach($news as $newsindex => $row):?>
				<?php if($newsindex%4==0): ?>
				<div class="row-fluid item <?=($newsindex==0)?'active':''?>" style="height:125px;margin-top:5px;">
				<?php endif;?>
					<div class="col-md-3" style="padding:0px 5px;" data-thumbnumber="<?=$newsindex?>">
						<div style="height:3px;width:100%;" class="<?=($newsindex==0)?'slider-thumb-active-indicator':''?> active-indicator"></div>
						<div style="height:80px;width:100%;background-color:#4a4a4a;border:1px solid #e0e0e0;" class="img_thumb_container">
							<div style="height:78px;width:100%;background-color:#ccc;">
								<?php if(count($row['images'])>0):?>
									<?php if($row['images'][0]['link']==""):?>
										<img src="<?=base_url($datafoldername.'images/no_image_large.png');?>" style="height:100%;" class="center-cropped">
									<?php else:?>
										<img src="<?=$row['images'][0]['link']?>" style="height:100%;" class="center-cropped">
									<?php endif;?>
								<?php else: ?>
									<img src="<?=base_url($datafoldername.'images/no_image_large.png');?>" style="height:100%;" class="center-cropped">
								<?php endif; ?>
							</div>
							<div style="height:2.78em;width:100%;color:#333;padding:2px;overflow:hidden;text-align:left;line-height:1.3em;">
								<?=$row['heading'];?>
							</div>
						</div>
					</div>
				<?php if((($newsindex+1)%4==0 && $newsindex!=0) || $newsindex+1==count($news)): ?>
					</div>
				<?php endif;?>
			<?php endforeach;?>

		</div>
	</div>
	<div class="col-md-1 hidden-sm hidden-xs" style="padding-left:0px;padding-right:0px;">
		<a class="right carousel-control" href="#myHorizontalThumbnailSlider" data-slide="next">
			<div style="height:130px;width:100%;background-color:#fff;display:table-cell;vertical-align:middle;">
				<img src="<?=base_url($datafoldername.'/images/right-arrow.png')?>" class="img-responsive"  style="width:100%;"/>
			</div>
		</a>
	</div>
</div>