		<?=$header?>
	</div>
</div>
<form id="rivernrates_form" action="">
<div class="container-fluid" style="padding-bottom:10px; background-color:#fff;">
	<div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">
		<div class="row" style="">
			<div class="col-md-3">
				<select class="form-control" id="select_rivernrates_type" required="required" style="margin-left:10px;">
				<option value="">---- Select Option ----</option>  
				<option value="1">नहरें</option>
				<option value="2">मंडी भाव</option>
				</select>
	                </div>
	                <div class="col-md-6">
	                </div>
                	<div class="col-md-3 col-xs-12">
	                	<div class='input-group date' id='newsDatePicker' style="margin-right:10px;">
		                    <input type='text' class="form-control" required="required" name="datetime" id="datetime" value="" placeholder="Enter date"/>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
	                	</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;">
	<div class="row" style="margin-top:20px;">
		<div class="col-md-12">
			<input type="text" class="form-control lang_class" id="rivernrates_heading" placeholder="Heading" required="required">
<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
		
		</div>
	</div>
	<div class="row" style="margin-top:10px;">
		<div class="col-md-12">
			<textarea rows="6" class="form-control lang_class" id="rivernrates_content" placeholder="content" required="required"></textarea>
		         <input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
		</div>			
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="col-md-5">
		</div>
		<div class="col-md-2">
			
			<button type="submit" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-floppy-save" style="margin-right:3px;"></span>save</button>
		</div>
		<div class="col-md-5">
		</div>
	</div>
</form>		