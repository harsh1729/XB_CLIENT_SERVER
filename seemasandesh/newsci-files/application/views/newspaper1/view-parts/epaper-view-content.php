
<div class="row">
	<div class="col-md-12" style="/*border-bottom:4px solid #000;*/"  id="states_container">
		<ul>
			<?php if(count($states_n_areas) > 1): ?>
				<?php foreach($states_n_areas as $index => $value): ?>
					<li style='margin-left:2px;'>
					<a href="#statetab-<?=$index;?>"><?=$value['name'];?></a>
					</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>

		<?php foreach($states_n_areas as $index => $value): ?>
			<div class="row" id="statetab-<?=$index;?>" style="padding-top:0px;padding-bottom:0px;">
				<div class="col-md-12 epaper_container" style="background-image:url(<?=base_url($datafoldername.'images/epaper_container_bg.jpg');?>);">
					
			    	<?php foreach($value['areas'] as $ind => $val): ?>
			    		<?php if($ind%3 == 0): ?>
			    			<div class='row' style='margin-top:30px;'>
								<div class='col-md-1'>
								</div>
								<div class='col-md-10'>
									<div class='row'>
			    						<?php endif; ?>
								    		<div class='col-md-4'>
												<a href='<?=base_url('epaper/'.$val['areacode'].'/'.$datetoday);?>' target="blank">
													<div class='text-center'>
														<img src='<?=$val['previewimage'];?>'>
														<div style='margin-top:px;background-image:url(<?=base_url($datafoldername.'images/epaper_bg.jpg');?>);color:#fff;padding:3px;'><?=$val['name'];?>
														</div>
													</div>
												</a>
											</div>
										<?php if(($ind+1)%3 == 0 || $ind+1 == count($value['areas'])): ?>
									</div>
								</div>
								<div class='col-md-1'>
								</div>
							</div>
						<?php endif; ?>
			    	<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<div class="row" style="background-color:#fff;">
	<div class="col-md-9"></div>
	<div class="col-md-3">
		<div class='input-group datetimepicker date'>
			<input type='text' class="form-control"  id="mydate" value="<?=$datetoday;?>"/>
				<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
			</span>
		</div>
	</div>
</div>
