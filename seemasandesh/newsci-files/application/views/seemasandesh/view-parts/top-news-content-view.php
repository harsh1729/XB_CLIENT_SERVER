<div class="row" >
	<div class="col-md-6 col-lg-6">
		<?=$slider;?>
	</div>
	<div class="col-md-3 col-lg-3 col-xs-12" style="padding:0px;margin-top:5px;" id="top-middle-container">
		<div class="panel panel-default" style="height:372px;">
			<div class="panel-heading">
				<span id="scrollable-category-news-heading-main-container">
					<?php foreach($cat_news_scroller as $index => $singleCategory): ?>
					
						<?php if(count($singleCategory['detail']) > 0): ?>
							<?php if(isset($singleCategory['category'])):?>
								<?php if($index == 0): ?>
									<span><?=$singleCategory['category']?></span>
								<?php else: ?>
									<span style="display:none;"><?=$singleCategory['category']?></span>
								<?php endif;?>
							<?php else: ?>
								<?php if($index == 0): ?>
									<span></span>
								<?php else: ?>
									<span style="display:none;"></span>
								<?php endif;?>
							<?php endif; ?>
						<?php endif;?>
						
					<?php endforeach; ?>
				</span>
				<span class="glyphicon glyphicon-chevron-right pull-right" style="color:#000;cursor:pointer;" id="scrollable-cat-news-right-btn"></span>
				<span class="glyphicon glyphicon-chevron-left pull-right" style="color:#000;cursor:pointer;" id="scrollable-cat-news-left-btn"></span>
			</div>
			<div class="panel-body" id="scrollable-category-news-main-container" style="padding-top:5px;">
				<?php foreach($cat_news_scroller as $index => $singleCategory): ?>
					<?php if(isset($singleCategory['category'])):?>	
					<?php endif; ?>
					<?php if(count($singleCategory['detail']) > 0): ?>
						<?php if($index == 0): ?>
							<div class="scrollable-category-news-container">
								<?php foreach($singleCategory['detail'] as $ind => $singleNews):?>
									<?php if($ind < 5): ?>
									<a href="<?=base_url('detail/'.$singleNews['newsId']);?>">
										<div class="row">
											<div class="col-md-4 col-xs-2 col-sm-2" style="height:45px;">
											<?php if(count($singleNews['images'])): ?>
												<img src="<?=$singleNews['images'][0]['link'];?>" class="center-cropped" style="height:100%;" />
											<?php else: ?>
												<img src="<?=base_url($datafoldername.'images/no_image_large.png')?>" class="center-cropped" style="height:100%;" />
											<?php endif; ?>
											</div>
											<div class="col-md-8 col-xs-10 col-sm-10" style="padding-left:0px;height:42px;overflow:hidden;"><?=$singleNews['heading'];?></div>
										</div>
									</a>
									<hr style="margin-top:5px;margin-bottom:5px;">
									<?php endif;?>
								<?php endforeach;?>
							</div>
						<?php else: ?>
							<div class="scrollable-category-news-container" style="display:none;">
								<?php foreach($singleCategory['detail'] as $ind => $singleNews):?>
									<?php if($ind < 5): ?>
									<a href="<?=base_url('detail/'.$singleNews['newsId']);?>">
										<div class="row">
											<div class="col-md-4 col-xs-2 col-sm-2" style="height:45px;">
												<?php if(count($singleNews['images'])): ?>
												<img src="<?=$singleNews['images'][0]['link'];?>" class="center-cropped" style="height:100%" />
												<?php else: ?>
												<img src="<?=base_url($datafoldername.'images/no_image_large.png')?>" class="center-cropped" style="height:100%;" />
											<?php endif; ?>
											</div>
											<div class="col-md-8 col-xs-10 col-sm-10" style="padding-left:0px;height:42px;overflow:hidden;"><?=$singleNews['heading'];?></div>
										</div>
									</a>
									<hr style="margin-top:5px;margin-bottom:5px;">
									<?php endif;?>
								<?php endforeach;?>
							</div>
						<?php endif; ?>
					<?php endif;?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-lg-3 col-xs-12" style="margin-top:6px;height:372px;" id="top-right-container">
	</div>
</div>