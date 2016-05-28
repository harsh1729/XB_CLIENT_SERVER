<html>
	<head>
		<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-4 hidden-xs"></div>
				<div class="col-md-4 col-sm-4 col-xs-12" style="display:table;">
					<div style="display:table-cell;vertical-align:middle;height:100vh;">
						<div class="panel panel-info">
							<div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Login</div>
							<div class="panel-body">
								<form action="<?=base_url('login/loginAuth')?>" method="post">
									<?php if($this->session->flashdata('login_error')): ?>
										<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?=$this->session->flashdata('login_error');?></div>
									<?php endif; ?>
									<input type="text" class="form-control" placeholder="Username" style="margin-bottom:15px;" name="username"/>
									<input type="password" class="form-control" placeholder="Password" style="margin-bottom:15px;" name="password"/>
									<div class="row">
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<button type="submit" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-log-in"></span> Sign In</button>
										</div>
										<div class="col-md-4"></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 hidden-xs"></div>
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>