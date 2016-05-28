<div class="row">
	<div class="col-md-9 col-lg-9">
		<?=$categorynews;?>
	</div>
	<div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
		  <!--<div class="text-center" style="height:520px;background:url(<?=base_url($datafoldername.'images/joke_bg.png');?>);background-size:contain;background-repeat:no-repeat; ">
        <div id="joke_container" style="margin-top:27%;color:#000;height:63%;width:85%;overflow-y:auto;overflow-x:hidden;position:absolute; margin-left:2.5%;text-align:center;padding:12px 6px;" >
           
		  
		</div>
        </div>-->
       

                 <div class="panel panel-default" style="margin-bottom:15px;">
  
                  			<div class="panel-heading text-center"><span>Editorial</span></div>
  			<div class="panel-body" style="text-align:center;">
                            <p><b><?=$editorial[0]['heading'];?></b></p>
                            <?=$editorial[0]['content'];?>
                            <a href="<?=base_url('editorial/'.$editorial[0]['id']);?>" target="_blank" class="btn btn-default btn-xs pull-right">read more ...</a>
 			 </div>

                 </div>
                 <div class="panel panel-default" style="margin-bottom:15px;">
  
                  			<div class="panel-heading ">
                                           <span id="scrollable_public_message_header">
<?php foreach($publicmessages as $index => $row): ?>
		                                            <span style="<?=($index>0?'display:none;':'')?>"><?=$row['typename']?></span>  
<?php endforeach; ?>
                                           </span>
                                      
<span class="glyphicon glyphicon-chevron-right pull-right" style="color:#000;cursor:pointer;" id="scrollable-public-message-right-btn"></span>
<span class="glyphicon glyphicon-chevron-left pull-right" style="color:#000;cursor:pointer;" id="scrollable-public-message-left-btn"></span>

                                       </div>
  			<div class="panel-body havenicescroll" style="height:300px;overflow-y:auto;" id="public-message-container">
	<?php foreach($publicmessages as $index => $row): ?>
		<div style="<?=($index>0?'display:none;':'')?>">
			<?php foreach($row['data'] as $ind => $singlerow): ?> 
				<div style="cursor:pointer;">
					<div class="row">
                                                <div style="position:absolute;right:20px;" class="pull-right"><span class="glyphicon glyphicon-sort"></span></div>
						<div class="col-md-4 col-xs-2 img">
							<img src="<?=$singlerow['image']?>" class="center-cropped" style="height:50px;"/>                             
						</div>
						<div class="col-md-8 col-xs-10 txt" style="padding-left:0px;height:43px;overflow:hidden;">
							<?=$singlerow['text']?>
						</div>
					</div> 
				</div>
				<hr style="margin-top:10px;margin-bottom:10px;">
			<?php endforeach; ?>
		</div>
	<?php endforeach; ?>
</div>

                 </div>
                 <div class="panel panel-default" style="margin-bottom:15px;display:none;">
  
                  			<div class="panel-heading"><span>मंडी भाव/हमारी नहरें </span>
                      <span class="glyphicon glyphicon-chevron-right pull-right" style="color:#000;cursor:pointer;" id="scrollable-mandi-bhaav-right-btn"></span>
				<span class="glyphicon glyphicon-chevron-left pull-right" style="color:#000;cursor:pointer;" id="scrollable-mandi-bhaav-left-btn"></span>
                     </div>
  			<div class="panel-body havenicescroll" style="padding-bottom:10px;height:300px;overflow:auto;" id="mandi_bhaav_container">
                            <?php foreach($riversnrates as $index => $row): ?>
                                  <div style="<?=($index>0?'display:none;':'')?>">
                                      <?php foreach($row as $ind => $singledata): ?>
                                           <p><b><?=$singledata['heading']?> : </b></p>
                                           <p><?=nl2br($singledata['content']);?></p>
                                      <?php endforeach; ?>
                                  </div>
                            <?php endforeach; ?>
 			 </div>

                 </div>
                 <div class="panel panel-default" style="margin-bottom:15px;">
  
                  			<div class="panel-heading text-center">Automobile launches </div>
  			<div class="panel-body havenicescroll" style="height:300px;">
                            <?php foreach($autosandesh as $index => $row):?>
                                  <div class="row">
                                      <div class="col-md-4 col-xs-2" style="height:60px;">
                                          <img src="<?=$row['image']?>" style="height:100%;" class="center-cropped"> 
                                      </div>
                                      <div class="col-md-8 col-xs-10" style="padding-left:0px;">
                                        <?=$row['text'];?>
                                      </div>
                                  </div>
                                  <hr style="margin-top:10px;margin-bottom:10px;">
                            <?php endforeach; ?>
                        </div>
                    </div>
               
                 <div class="panel panel-default" style="margin-bottom:15px;">
  
                  			<div class="panel-heading ">Jokes</div>
  			<div class="panel-body" style="">
                             <img src="<?=$jokeoftheday['image'];?>" class="img-responsive"/>
                             <div class="text-center"><?=$jokeoftheday['text'];?></div>
    
 			 </div>

                 </div>

                 <div class="panel panel-default" style="margin-bottom:15px;">
  
                  			<div class="panel-heading"><span>Horoscope </span> 
                        <span class="glyphicon glyphicon-chevron-right pull-right" style="color:#000;cursor:pointer;" id="scrollable-rashi-fal-right-btn"></span>
				<span class="glyphicon glyphicon-chevron-left pull-right" style="color:#000;cursor:pointer;" id="scrollable-rashi-fal-left-btn"></span>
                     </div>
  			<div class="panel-body" style="height:300px;" id="rashifal_container">
                              <div>
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/aries.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>मेष</b></p>

                                   <p><?=(isset($rashifal['aries'])?$rashifal['aries']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/taurus.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>वृषभ</b></p>
                                   <p><?=(isset($rashifal['taurus'])?$rashifal['taurus']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/gemini.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>मिथुन</b></p>
                                   <p><?=(isset($rashifal['gemini'])?$rashifal['gemini']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/cancer.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>कर्क</b></p>
                                   <p><?=(isset($rashifal['cancer'])?$rashifal['cancer']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/leo.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>सिंह</b></p>
                                   <p><?=(isset($rashifal['leo'])?$rashifal['leo']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/virgo.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>कन्या</b></p>
                                   <p><?=(isset($rashifal['virgo'])?$rashifal['virgo']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/libra.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>तुला</b></p>
                                   <p><?=(isset($rashifal['libra'])?$rashifal['libra']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/scorpio.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>वृश्चिक</b></p>
                                   <p><?=(isset($rashifal['scorpio'])?$rashifal['scorpio']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/sagittarius.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>धनु</b></p>
                                   <p><?=(isset($rashifal['sagittarius'])?$rashifal['sagittarius']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/capricorn.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>मकर</b></p>
                                   <p><?=(isset($rashifal['capricorn'])?$rashifal['capricorn']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/aquarius.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>कुंभ</b></p>
                                   <p><?=(isset($rashifal['aquarius'])?$rashifal['aquarius']:'')?></p>
                              </div>
                              <div style="display:none;">
                                   <div style="100%;"><img src="<?=base_url($datafoldername.'images/pisces.png');?>" class="img-responsive center-block" />
                                   </div>
                                   <p class="text-center"><b>मीन</b></p>
                                   <p><?=(isset($rashifal['pisces'])?$rashifal['pisces']:'')?></p>
                              </div>
    
 			 </div>

                 </div>
		
	</div>
</div>