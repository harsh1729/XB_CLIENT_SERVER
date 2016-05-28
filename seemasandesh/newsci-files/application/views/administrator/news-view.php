		<?=$header;?>
 
<div id="loading_bar" style="height:700px;width:100%; margin-top:-10px; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:;">
		<img src="<?=base_url('admin_docs/images/ajax-loader-blue.gif');?>" style="margin-top:18%; margin-left:45%;">
</div>
		<div class="container-fluid" style="padding-bottom:10px; background-color:#fff;">
                  <div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">
			<div class="row" style="">
				<div class="col-md-3 col-xs-12">
					<div class="form-group">
                       	<label class="col-sm-2 visible-xs visible-sm control-label" style="color:#FFF;margin-top:7px;">
                           	Category: 
						</label>
						<div class="col-md-10 col-sm-10 col-xs-10" style="padding-right:0px;">
							<select class="form-control" id="categoryId" form="SaveNewsForm" name="catid" required="required" style="">
								<option value=""> ---- Choose Category ---- </option>
								<?php 
									foreach ($categories as $category) 
									{
										echo "<option value='".$category['id']."'>".$category['name']."</option>";
										foreach ($category['subcat'] as $subcategory) 
										{
										echo "<option value='".$subcategory['id']."'>&nbsp;›&nbsp;".$subcategory['name']."</option>";
					
										}
									}
								?>
                            				</select>
                            			</div>
                            			<div class="col-md-2 col-sm-2 col-xs-2" style="padding-left:0px;">
                            				<select class="form-control" id="categoryIdmore" form="SaveNewsForm" name="catidmore[]"  style="height:34px;" multiple="multiple">
								<?php
									foreach ($categories as $category) 
									{
										echo "<option value='".$category['id']."'>".$category['name']."</option>";
										foreach ($category['subcat'] as $subcategory) 
										{
										echo "<option value='".$subcategory['id']."'>&nbsp;›&nbsp;".$subcategory['name']."</option>";
					
										}
									}
								?>
                            				</select>
						</div>
					</div>
                </div>
               <div class="col-md-2 col-sm-2 hidden-xs" style="font-size:12px;font-weight:bold;" >
			<button class="btn btn-default dropdown-toggle btn-block" type="button" id="optinsdropdown" data-toggle="dropdown" aria-expanded="true">
    				Options
    				<span class="caret"></span>
  			</button>
  			<ul class="dropdown-menu" role="menu" aria-labelledby="optinsdropdown" style="margin-left:15px;">
				<li role="presentation">
					<a role="menuitem" tabindex="-1" href="#">
						<input type="checkbox"  name="is_important" id="is_important" form="SaveNewsForm" style="margin-left:5px;" />
						<label for="is_important">Important</label>
					</a>
				</li>
				<li role="presentation">
					<a role="menuitem" tabindex="-1" href="#">
						<input type="checkbox"  name="is_cat_top_news" id="is_cat_top_news" form="SaveNewsForm"  style="margin-left:5px;" />
						<label for="is_cat_top_news">Show On Top</label>
					</a>
				</li>
				<li role="presentation">
					<a role="menuitem" tabindex="-1" href="#">
						<input type="checkbox"  name="send_notification"  id="send_notification" form="SaveNewsForm" style="margin-left:5px;" />
						<label for="send_notification">Notification </label>
					</a>
				</li>
			</ul>
                </div>
                  
                
                <div class="col-md-4 col-sm-4 " style="" >
                	<span><button type="button" class="imeboldbtn btn btn-sm btn-info" title="Bold"><b>B</b></button></span>
			<span><button type="button" class="imeitalicbtn btn btn-sm btn-info" title="Italic"><i>I</i></button></span>
			<span><button type="button" class="imeunderlinebtn btn btn-sm btn-info" title="Underline"><u>U</u></button></span>
			<span><button type="button" class="imefontsizebtn btn btn-sm btn-info" title="Text size"><span class="glyphicon glyphicon-signal"></span></button></span>
			<span><button type="button" class="imelinkbtn btn btn-sm btn-info" title="Add Link">li</button></span>
                </div>
                    <?php
				$dtObj = new DateTime("now");
				$dtObj->setTimeZone(new DateTimeZone("Asia/Kolkata"));
				$currentDate = $dtObj->format("d-m-Y");
				
				$dtObj7 = new DateTime("now");
				$dtObj7->sub(new DateInterval('P10D'));
				$dtObj7->setTimeZone(new DateTimeZone("Asia/Kolkata"));
				$before7Date = $dtObj7->format("d-m-Y");
			?>
                <div class="col-md-3 col-xs-12">
                    <div class='input-group date' id='newsDatePicker' style="margin-right:10px;display:none;">
                        <input type='text' class="form-control" required="false" name="datetime" id="datetime" form="SaveNewsForm" value="<?=$currentDate; ?>"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
				</div>
            </div>
		</div>
	</div>
</div>
</div>

<div class="container-fluid" style="min-height:89vh;margin-top:20px;">

	
	<form role="form"  action="<?=base_url('admin_requests/news/save_news');?>" method="post" id="SaveNewsForm">
	<div class="row">
		<div class="col-md-8">	
			<div class="row">
				<div class="col-md-12">
					<div name="newsheading" id="newsheading" contenteditable="true"  class="lang_class form-control"  placeholder="News Heading ..." required="required" style="height:40px;overflow:auto;"></div>
					<input type="button" id="newsheading" data-id="newsheading" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right" value="copy" style="margin-bottom:20px;">
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">	
					<div name="newscontent" contenteditable="true" id="newscontent" class="lang_class form-control tinymceeditor" placeholder="News content ..." style="margin-top:6px;resize:none;height:200px;overflow:auto;" required="required"></div>
					<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="">
				</div>
			</div>
			
		</div>
		<div class="col-md-4">
			<div style="background-color:#aaa;width:100%;min-height:355px;border-radius:4px;" id="main-dropzone" class="dropzone" action="<?=base_url('admin_requests/news/upload_image');?>">
			</div>
		</div>
	</div>
	<hr style="border-top:1px dotted #aaa;">
	<div class="row" style="margin-top:6px;">
		<div class="col-md-12">
			<div style="width:100%;min-height:330px;border-radius:4px;background-color:#aaa;" id="my-dropzone" class="dropzone" action="<?=base_url('admin_requests/news/upload_image');?>">
			</div>
		</div>
	</div>
	<div class="row" style="margin-top:6px;">
		<div class="col-md-5"></div>
		<div class="col-md-2">
			<button type="submit" class="btn btn-success btn-lg btn-block" id="saveNewsBtn"><span class="glyphicon glyphicon-floppy-disk"></span> Upload</button>
		</div>
		<div class="col-md-5"></div>
	</div>
	</form>
	