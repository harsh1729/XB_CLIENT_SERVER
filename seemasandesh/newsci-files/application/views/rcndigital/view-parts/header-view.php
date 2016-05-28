<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_url();?><?=$datafoldername?>/css/style.css" rel="stylesheet">

<!-- for FF, Chrome, Opera -->
<link rel="icon" type="image/png" href="<?=base_url();?><?=$datafoldername?>/images/favicon-16x16.png?v=2" sizes="16x16">
<link rel="icon" type="image/png" href="<?=base_url();?><?=$datafoldername?>/images/favicon-32x32.png?v=2" sizes="32x32">

<!-- for IE -->
<link rel="icon" type="image/x-icon" href="<?=base_url();?><?=$datafoldername?>/images/favicon.ico?v=2" >
<link rel="shortcut icon" type="image/x-icon" href="<?=base_url();?><?=$datafoldername?>/images/favicon.ico?v=2"/>
	<?=$css;?>
	<style>
		.vertical-center {

	height:148px;
  	background-color:#C3161C;
  align-items: center;
 
}
</style>
	</head>
	<body>
		<?=$navigation;?>
		<div id="loading_bar" style="height:700px;width:100%; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:;">
			<img src="<?=base_url($datafoldername.'images/ajax-loader.gif');?>" style="margin-top:18%; margin-left:45%;">
		</div>
		<div class="container-fluid" style="min-height:90vh;background-color:#E0E0E0;">
			<div class="row" style="margin-bottom:20px;margin-top:10px;">
				<div class="col-md-12">
					<div style="width:100%;background-color:#fff;border-bottom:4px solid #FBFF4B;padding-bottom:5px;">
					<!--<div style="width:100%;background-color:#C3161C;background:url(<?=base_url()?><?=$datafoldername?>/images/bckg.jpg);border-bottom:4px solid #FBFF4B;padding-bottom:5px;">-->
						<div class="row">
							<div class="col-md-2 col-xs-2" style="height:160px;">
<div class="fb-like pull-left" style="margin-top:5px;margin-left:5px;" data-href="https://www.facebook.com/XercesBlueIndia?fref=ts" data-width="150px" data-layout="button" data-action="like" data-show-faces="false" data-kid-directed-site="true" data-share="false"></div>
									<div id="fb-root" style="margin-right:200px;"></div>
         <?php
                            $month_array = array();
                            $month_array[1]="जनवरी";
                            $month_array[2]="फरवरी";
                            $month_array[3]="मार्च";
                            $month_array[4]="अप्रैल";
                            $month_array[5]="मई";
                            $month_array[6]="जून";
                            $month_array[7]="जुलाई";
                            $month_array[8]="अगस्त";
                            $month_array[9]="सितम्बर";
                            $month_array[10]="अक्टूबर";
                            $month_array[11]="नवम्बर";
                            $month_array[12]="दिसंबर";
                           $day_array =array();
                             $day_array[0]="रविवार";
                             $day_array[1]="सोमवार";
                             $day_array[2]="मंगलवार";
                             $day_array[3]="बुधवार";
                             $day_array[4]="गुरुवार";
                             $day_array[5]="शुक्रवार";
                             $day_array[6]="शनिवार";
                            $dtObj = new DateTime("now",new DateTimeZone("Asia/Kolkata"));
                    
                            $day = $dtObj->format("d");
                            $month =$dtObj->format("n");
                            $year = $dtObj->format("Y");
                            $day_number = $dtObj->format("w");
                            $day_name = $day_array[$day_number];
                            $month_name = $month_array[$month];
                        
            


?>
								<p style="color:#000;position:absolute;bottom:0;margin-bottom:2px;margin-left:10px;">
                                                                                <?php
                                                                                    //echo $day_name."  ".$day."  ".$month_name.", ".$year;
                                                                                    echo $dtObj->format("l j M,Y");
                                                                                  ?>
                                                               </p>

								
							</div>
							<div class="col-md-6 col-xs-6">
								<!--<p style="font-family:Courier New;text-align:center;font-size:4em;color:#fff;">
									सीमा सन्देश
								</p>-->
								<img src='<?=base_url()?><?=$datafoldername?>/images/rcn_header.png' class="img-responsive center-block" style="max-height:150px;margin-top:10px;" />
							</div>
							<div class="col-md-4 col-xs-4 ">
								
								<div class="jumbotron vertical-center"  style="height:100px;padding:20px;background-color:transparent;">
									   <div id="header_slider" style="z-index:100;color:#000;font-size:15px;" class="text-center">
									   	
									   </div>
								</div>
                                                               
                                                                
                                                               <a href="<?=base_url('contactus');?>" id="contact_us" class="btn btn-sm pull-right" style="background-color:#354c8c;margin-left:20px;margin-right:10px;color:#fff;">Contact Us</a>
                                                               <a href="<?=base_url('aboutus');?>" id="about_us" class="btn btn-sm pull-right" style="background-color:#354c8c;color:#fff;">About Us</a>
 							</div>
						</div>
					</div>
				</div>
			</div>