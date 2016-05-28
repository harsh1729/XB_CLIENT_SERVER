<div id="sidebar" >
		<p style="text-align:center;margin-top:50px;"><?=anchor("","<img src='".base_url().$datafoldername."/images/ui-sam.png' class='img-circle' width='60'>","");?></p>
		<a href="<?=base_url();?>"><h4 style="text-align:center;color:#fff;text-decoration:underline;">सीमा सन्देश</h4></a>
		<hr style="margin-bottom:5px;">
			<a id="epaper_navigation" href="<?=base_url('epaper');?>"><div style="width:100%;text-align:center;">ई - पेपर</div></a>
		<hr style="margin-top:5px;">
		<ul id="navmenu" style="width:100%;padding-bottom:50px;padding-left:0;">
			<?php foreach($categories as $index => $row): ?>
			<li>
				<?php if(count($row['subcat'])>0):?>
					<a href="<?=base_url('news/'.$row['id']);?>" style="" data-submenu-id="<?=($index+1)?>"><?=$row['name']?><span class="glyphicon glyphicon-chevron-right pull-right" style="margin-right:7px;"></span></a>
				<?php else: ?>				
					<a href="<?=base_url('news/'.$row['id']);?>" style="" data-submenu-id="-1"><?=$row['name']?></a>
				<?php endif;?>
			</li>
			<?php endforeach; ?>
		</ul>
</div>
<div class="navsubmenucontainer" style="">
	<?php foreach($categories as $index => $row): ?>
		<?php if(count($row['subcat'])>0):?>
		<div id="submenu_<?=($index+1)?>" style="display:none;z-index:1">
			<?php foreach($row['subcat'] as $ind => $val):?>
				<a href="<?=base_url('news/'.$val['id']);?>"><?=$val['name']?></a>
			<?php endforeach; ?>
		</div>
		<?php endif;?>
	<?php endforeach; ?>
</div>