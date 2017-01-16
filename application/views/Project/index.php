<?php
	session_start();
	$token = uniqid(rand());
	$salt = rand(0,1000000);
	$_SESSION['token'] = $token;
	$_SESSION['salt'] = $salt;

?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Sample Project</title>
		<meta charset='utf-8'>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/script_form_login.js"

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<form class="form-horizontal" action="php/form_login.php" method="post">
						<fieldset class="fieldset">Log-in</fieldset>
					  <div class="form-group">
					    <label for="email" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10" id="email_login">
					      <input type="email" class="form-control" id="email1" placeholder="Email" aria-describedby="inputSuccess2Status">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10" id="pass_login">
					      <input type="password" class="form-control" id="email1" placeholder="Password">
					    </div>
					  </div>
					  <input type="hidden" value="<?php echo $token.$salt; ?>" name="token">
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox"> Remember me
					        </label>
					      </div>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-6 col-sm-6">
					      <button type="submit" class="btn btn-success">Sign in</button>
					    </div>
					  </div>
					</form>
				</div>
				<div class="col-lg-6">
				</div>
			</div>
		</div>
	</body>
</html>