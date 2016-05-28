<form action="<?=base_url();?>admin_requests/city/insertCity" method="POST" id="newcityform">
	<div class="row" style="margin-top:20px;">
		<div class="col-md-1"></div>
		<div class="col-md-3 text-right">
			Choose State:
		</div>
		<div class="col-md-5">
			<select name="state" id="state" class="form-control" required="required">
				<option value="">choose State</option>
				<?php foreach ($states as $index => $row):?>
					<option value="<?=$row['id'];?>"><?=$row['name'];?></option>
				<?php endforeach;?>
			</select>
		</div>
		<div class="col-md-3"></div>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="col-md-1"></div>
		<div class="col-md-3 text-right">
			City name : 
		</div>
		<div class="col-md-5">
			<input type="text" placeholder="City name" name="cityname" id="cityname" class="form-control lang_class" required="required">
		</div>
		<div class="col-md-3"></div>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="col-md-1"></div>
		<div class="col-md-3 text-right">
			pincode : 
		</div>
		<div class="col-md-5">
			<input type="text" placeholder="pincode" name="pincode" id="pincode" class="form-control lang_class" required="required">
		</div>
		<div class="col-md-3"></div>
	</div>
	<div class="row" style="margin-top:20px;">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<input type="submit" class="btn btn-success btn-lg btn-block" value="submit">
		</div>
		<div class="col-md-4"></div>
	</div>
</form>