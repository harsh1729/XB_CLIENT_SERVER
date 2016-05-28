<?php foreach($content as $singleCategory): ?>
	<?php if(isset($singleCategory['category'])  && count($singleCategory['detail']) > 0 ):?>	
	<div class="row" style="margin-top:16px;margin-bottom:8px;">
		<div class="col-md-12 col-xs-12">
			<div style="width:100%;background-color:#C3161C;padding:6px 12px;color:#fff;">
				<b style="font-size:1.3em;"><?=$singleCategory['category']?></b>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php foreach($singleCategory['detail'] as $index => $singleNews):?>
		<?php if($index == 0): ?>
		<div class="row">
		<?php endif; ?>
		<?php if($index < 3 ): ?>
			<div class="col-md-3 col-xs-3">
				<div class="panel panel-default" style="margin-top:0px;margin-bottom:4px;">
					<div class="panel-body">
						<div class="row" style="margin-bottom:10px;">
							<div class="col-md-12 col-xs-12">
							<?php if(count($singleNews['images'])>0) {?>
							<a><i class="fa fa-facebook fa-lg share_button" data-image="<?=$singleNews['images'][0]['link'];?>" data-content="<?=$singleNews['heading'];?>" data-links="<?=base_url('detail/'.$singleNews['newsId']);?>"></i></a>
							<?php }else{ ?>
							
							<a><i class="fa fa-facebook fa-lg share_button" data-image="" data-content="<?=$singleNews['heading'];?>" data-links="<?=base_url('detail/'.$singleNews['newsId']);?>"></i></a>
							<?php } ?>
 
							 <a href="https://plus.google.com/share?url=<?=base_url('detail/'.$singleNews['newsId']);?>" onclick="javascript:window.open(this.href,
							  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus fa-lg"></i>
							 </a>
								<a href="http://www.twitter.com/share?text=An%20Awesome%20Link&url=<?=base_url('detail/'.$singleNews['newsId']);?>" onclick="javascript:window.open(this.href,
							  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter fa-lg"></i>
							 </a>							
								
							<div id="fb-root"></div>							
						
							</div>
						</div> 
					<?php	if(count($singleNews['images']) !== 0)
						{ ?>
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="imgSlider">								
									<?php foreach($singleNews['images'] as $imgind => $singleImage): ?>									
										<div class="slideContainer" style="<?=($imgind>0?'display:none;':'')?>">
											<img data-lazy="<?=$singleImage['link'];?>" class="center-cropped" style="height:120px;max-height:120px;min-height:120px;"/><!--img-responsive center-block-->
											<!--<p style="color:#666;font-size:.9em;margin-top:2px;" class="text-center"><?=$singleImage['tagline'];?></p>-->
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					<?php	} ?>
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="row">
									<div class="col-md-12 col-xs-12">
										<h6 class="pull-left" style="color:#333;margin-top:0;overflow:hidden;max-height:2.8em;min-height:2.8em;margin-bottom:0px;line-height:1.4em;font-size:14px;"><?=$singleNews['heading'];?></h6>
										<!--<h6 class="pull-right" style="color:#666;"><?=$singleNews['daytime']?></h6>-->
									</div>
								</div>
								<?php
								if(count($singleNews['images']) == 0)
								{
									echo "<p style='color:#999;font-size:13px;height:9.8em;overflow:hidden;margin-top:8px;line-height:1.4em;'>";
									
										//$singleNews['content'];
										/*$CI =& get_instance();
										$CI->load->library('xerces_globals');
										$str = $CI->xerces_globals->extract_paragraph($singleNews['content'],1);
										echo nl2br($str);*/
										
										echo $singleNews['content'];
									
									echo "</p>";
								}
								?>
								<a class="pull-right btn btn-default btn-xs" href="<?=base_url('detail/'.$singleNews['newsId']);?>" style="margin-top:5px;">Read More...</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php else: ?>
			<?php if($index == 3): ?>
				<div class="col-md-3 col-xs-3">
					<div class="panel panel-default" style="margin-top:0px;margin-bottom:4px;height:269px;max-height:269px;">
						<div class="panel-body">
			<?php endif;?>
				<div style="margin-bottom:5px; height:3em; overflow:hidden;"><a href="<?=base_url('detail/'.$singleNews['newsId']);?>"><?=$singleNews['heading'];?></a></div>
		<?php endif; ?>
		<?php if($index+1 == count($singleCategory['detail'])): ?>
			<?php if( count($singleCategory['detail']) > 3): ?>
			</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<!--<div style = 'background-color:#bbb;height:1px;width:100%;margin-bottom:20px'></div>-->
	<?php endforeach;?>
<?php endforeach;?>