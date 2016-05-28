 		<?=$header;?>
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;">
	<div class="row">
		<div class="col-md-12">
			
			<form role="form" action="Back_end_passchange.php" id="pass_form" method="post">
							<div class="row" style="margin-top:60px;">
								<div class="col-md-1">
								</div>
								<div class="col-md-10">
									<input type="password" required class="form-control lang_class" name="oldpass" placeholder="type your old password" />
								</div>
								<div class="col-md-1">	
								</div>
							</div>
							<div class="row" style="margin-top:15px;">
								<div class="col-md-1">
								</div>
								<div class="col-md-10">
									<input type="password" id="newpass" required class="input_size form-control" name="newpass" placeholder="type your password" />
								</div>
								<div class="col-md-1">
								</div>
							</div>
							<div class="row" style="margin-top:15px;">
								<div class="col-md-1">
								</div>
								<div class="col-md-10">
									<input type="password" id="repass" required class="input_size form-control" name="repass" placeholder="type your password again" />
								</div>
								<div class="col-md-1">
								</div>
							</div>
							<div class="row" style="margin-top:40px;margin-bottom:10px;">
								<div class="col-md-4">
								</div>
								<div class="col-md-4">
									<button type="submit" class="btn btn-block btn-lg" style="background-color:#1abc9c;" id="submit"><span class="glyphicon glyphicon-save"></span> Save</button>
								</div>
								<div class="col-md-4">
								</div>
							</div>
						</form>

		</div>
	</div>