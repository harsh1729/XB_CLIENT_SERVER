<div id="slider1_container" style="position: relative; width: 720px;height: 450px;margin-bottom:15px;margin-top:3px;">
    <div style="background-color:transparent;color:#fff;text-shadow: 3px 3px 8px rgba(235, 45, 49, 0.45);position:absolute;z-index:1001;font-weight:bolder;font-size:1.7em;top:-17px;background-color:rgba(0,0,0,0.6);padding-left:6px;padding-right:6px;text-decoration:none;margin-left:15px;"><?=$rootcategoryheading;?></div>
    <!-- Loading Screen -->
    <div u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;"></div>
        <div style="position: absolute; display: block; background: url(<?=base_url();?>plugins/jssor-slider/images/loading.gif) no-repeat center center;top: 0px; left: 0px;width: 100%;height:100%;"></div>
    </div>
    <!-- Slides Container -->
    <div u="slides" style="background-image:url(<?=base_url($datafoldername.'/images/slider_bg3.gif')?>); cursor: pointer; position: absolute; left: 0px; top: 0px; width: 720px; height: 280px;overflow: hidden;border:1px solid #fff;border-bottom:none;">
        <?php foreach($news as $row): ?>
            <div>
	         <?php if($row['image']==""){ ?>   	
	               <a href="<?=base_url().'detail/'.$row['id'];?>"> <img u="image" src="<?=base_url($datafoldername.'images/no_image_large.png');?>" /></a>
	         <?php } else{?>
	         	<a href="<?=base_url().'detail/'.$row['id'];?>"> <img u="image" src="<?=$row['image']?>" /></a>
	         <?php }?>	      
	                <div u="thumb">
	                    <div style="widht:146px;height:88px;">
	                    	<?php if($row['image']==""){ ?>
	                        	<img u="" src="<?=base_url($datafoldername.'images/no_image_large.png');?>" style="width:146px;height:88px;" />
	                         <?php } else{?>	
	                         	<img u="" src="<?=$row['image']?>" style="width:146px;height:88px;" />
	                         <?php }?>	
	                    </div>
	                    <div style="padding-left:5px;margin-top:8px;padding-right:4px;widht:100%;line-height:1.3em;"><?=$row['heading']?></div>
	                </div>
	                <a href="<?=base_url().'detail/'.$row['id'];?>" style="color:#FFF;">
	                    <div u=caption t="T" t2="B" style="position:absolute;top:226px;width:100%;height:54px;overflow:hidden;color:#fff;line-height:1.5em;text-align:left;background-color:rgba(0,0,0,0.7);padding:7px 7px;">
	                        <?=$row['heading'];?>
	                    </div>
	                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- Thumbnail Navigator Skin Begin -->
    <div u="thumbnavigator" class="jssort07" style="position:absolute;width: 720px; height: 170px;left:0px;bottom:0px;overflow:hidden;">
        <div style=" background-color: #fff; filter:alpha(opacity=30); opacity:.9; width: 100%; height:100%;"></div>
        <!-- Thumbnail Item Skin Begin -->
        <div u="slides" style="cursor:pointer;">
            <div u="prototype" class="p" style="position:absolute;width:150px;height:135px;top:5px;left:5px;color:#000;font-size:14px;line-height:1em;">
                <div u="thumbnailtemplate" class="i" style="position:absolute;"></div>
                <div class="o">
                </div>
            </div>
        </div>
        <!-- Thumbnail Item Skin End -->
        <!-- Arrow Navigator Skin Begin -->
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora11l" style="width: 37px; height: 37px; top: 123px; left: 8px;"></span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora11r" style="width: 37px; height: 37px; top: 123px; right: 8px"></span>
        <!-- Arrow Navigator Skin End -->
    </div>
    <!-- ThumbnailNavigator Skin End -->
    <a style="display: none" href="http://www.jssor.com">jQuery Carousel</a>
    <!-- Trigger -->
</div>
<!-- Jssor Slider End -->