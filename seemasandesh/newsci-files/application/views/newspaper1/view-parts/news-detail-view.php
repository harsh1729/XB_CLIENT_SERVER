<div style="background-color:#fff;padding:15px 10px;border-radius:3px;">
<div class="row" >
	<div class="col-md-12 col-xs-12" id="newsHeading">
		<?php foreach($news as $row): ?>
		<div>
			<div style="width:4px;background-color:#000;font-size:1.8em;margin-right:5px;float:left;">&nbsp;</div>
			<div style="font-size:1.8em;color:#333;">
				<?=$row['heading'];?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<div class="row" style="margin-top:10px;">
	<div class="col-md-12 col-xs-12">
		
		<div class="pull-left">
			<?php if(count($row['image'])>0) {?>
							<a><i class="fa fa-facebook fa-lg share_button" data-image="<?=$news[0]['image'];?>" data-content="<?=$news[0]['heading'];?>" data-links="<?=base_url('detail/'.$news[0]['id']);?>"></i></a>
							<?php }else{ ?>
							
							<a><i class="fa fa-facebook fa-lg share_button" data-image="" data-content="<?=$row['heading'];?>" data-links="<?=base_url('detail/'.$news[0]['id']);?>"></i></a>
							<?php } ?>
							
							
							
			<a href="https://plus.google.com/share?url=<?=base_url('detail/'.$news[0]['id']);?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus fa-lg"></i>
 </a>
			<a href="http://www.twitter.com/share?text=An%20Awesome%20Link&url=<?=base_url('detail/'.$news[0]['id']);?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter fa-lg"></i>
 </a>		
			
		</div>
		
		<div class="pull-right" style="font-size:.9em;color:#666;"><?=$datetime;?></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-xs-12">

		<!-- Jssor Slider Begin -->
		<!-- You can move inline styles to css file or css block. --> 
		<div id="slider1_container" style="position:relative;width:925px;height:390px;overflow: hidden;" class="center-block">
	 
			<!-- Slides Container --> 
			<div u="slides" style="cursor: col-resize; position: absolute; left: 0px; top: 0px; width:925px; height: 390px;overflow: hidden;background-color:#000;">
				<?php foreach($news as $row): ?>
				<div>
					<img u="image" src="<?=$row['image'];?>"/>
					 <?php if($row['imgtagline'] !== ""){ ?>
					<div u=caption t="T" t2="B" style="position: absolute;top:345px;width:100%;max-height:90px;overflow:none; color: #fff; line-height:1.5em; text-align:left; background-color:rgba(0,0,0,0.5);padding:12px 6px;border-radius:3px;">
						<?=$row['imgtagline'];?>
					</div>
                    <?php }?>
				</div>
				<?php endforeach; ?>
			</div>
			<!-- Arrow Left -->
			<span u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 123px; left: 8px;">
			</span>
			<!-- Arrow Right -->
			<span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 123px; right: 8px">
			</span>
		</div>
		<!-- Jssor Slider End -->

	</div>
</div>


<div class="row" style="margin-top:10px; padding:5px;">
	<div class="col-md-12 col-xs-12 col-sm-12" id="newsContent">
		<?php foreach($news as $row): ?>
			<div><?=nl2br($row['content']);?></div>
		<?php endforeach; ?>
	</div>
</div>
</div>