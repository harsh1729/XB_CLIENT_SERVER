		<?=$header?>
		<div id="loading_bar" style="height:700px;width:100%; margin-top:-10px; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:;">
	            <img src="<?=base_url('admin_docs/images/ajax-loader-blue.gif');?>" style="margin-top:18%; margin-left:45%;">
        	</div>
	</div>
</div>
<div class="container-fluid" style="padding-bottom:10px; background-color:#fff;">
	<div style="background-color:#CCC;padding-top:10px;padding-bottom:10px;">
		<div class="row" style="">
	                <div class="col-md-9">
	                </div>
                	<div class="col-md-3 col-xs-12">
	                	<div class='input-group date' id='newsDatePicker' style="margin-right:10px;">
		                    <input type='text' class="form-control" required="required" name="datetime" id="datetime" value="" placeholder="choose date" form="rashifal_form"/>
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
	                	</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;">
	<form role="form" method="POST" id="rashifal_form">
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/aries.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Aries/मेष" name="aries" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/taurus.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Taurus/वृषभ" name="taurus" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/gemini.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Gemini/मिथुन" name="gemini" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/cancer.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Cancer/कर्क" name="cancer" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/leo.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Leo/सिंह" name="leo" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/virgo.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Virgo/कन्या" name="virgo" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/libra.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Libra/तुला" name="libra" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/scorpio.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Scorpio/वृश्चिक" name="scorpio" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/sagittarius.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Sagittarius/धनु" name="sagittarius" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/capricorn.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Capricorn/मकर" name="capricorn" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/aquarius.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Aquarius/कुंभ" name="aquarius" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<img src="<?=base_url('admin_docs/images/pisces.png');?>" class="img-responsive center-block" style="height:120px"/>
			</div>
			<div class="col-md-9">
				<textarea class="form-control lang_class" style="height:120px;resize:none;" placeholder="Pisces/मीन" name="pisces" required="required"></textarea>
				<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
			</div>
		</div>
		<div class="row" style="margin-top:15px;margin-bottom:20px;">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-success btn-block" ><span class="glyphicon glyphicon-upload"></span> Save</button>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</form>