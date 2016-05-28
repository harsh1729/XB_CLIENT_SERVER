 		<?=$header;?>
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;">
	<div class="well well-sm">
		<form id="notification_submit_form" >
		<div class="row">
			<div class="col-sm-5" style="margin-bottom:10px">
							<select name="cityselect" id="cityselect" class="form-control" required="required"/ >
							      <option value="0">Choose a City</option>
							      <?php foreach ($city as $index => $row):?>
								   <option value="<?=$row['id'];?>"><?=$row['name'];?></option>
							       <?php endforeach; ?>
					        </select>
			</div>
			
		</div>
			<div class="row">
							<div class="col-md-12">
					<input type="text" id="notification_heading" class="form-control lang_class" placeholder="Heading" required="required"/>
					<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
					<textarea id="notification_content" class="form-control lang_class" rows="8" placeholder="Content" required="required" style="margin-top:10px;resize:none;"></textarea>
					<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
				</div>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-primary btn-block btn-lg"><span class="glyphicon glyphicon-bell"></span> Send Notification</button>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</form>
	</div>