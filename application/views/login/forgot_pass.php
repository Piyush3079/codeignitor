<?php
	/*error_reporting(0);
    ini_set('display_errors', 0);*/
    if(!isset($_SESSION)){
	session_start();}
	$token = uniqid(rand());
	$salt = rand(0,1000000);
?>
<html lang='en'>
	<head>
		<title>Password Recovery</title>
		<meta charset='utf-8'>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/login/script_form_login.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/login/script_forgot_password.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
			<div class="col-sm-3">
				<div style="margin-top:9vh;"">
					<?php
						echo $var['var'];
					?></div>
				</div>
				<div class="col-sm-6"><br><br><br><br>
					<?php echo form_open(base_url($var['action']), array('id'=>'myForm', 'class'=>'form-horizontal')); ?>
						<legend><?=$var['legend'];?></legend>
					  <div class="form-group">
					    <!--<label for="email" class="col-sm-2 control-label">Email</label>-->
					    <div class="col-sm-offset-1 col-sm-10" id="email_login">
					      <input type="<?=$var['type'];?>" class="form-control" name="<?=$var['name'];?>" id="<?=$var['id'];?>" placeholder="<?=$var['placeholder'];?>" aria-describedby="inputSuccess2Status">
					    </div>
					    <div class="col-sm-1"><span class="glyphicon glyphicon-info-sign" aria-hidden="true" style="float:left;"></span></div>
					  </div>
					  <input type="hidden" value="<?php echo $this->security->get_csrf_hash(); ?>" name="token" id="token">
					  <div class="col-sm-offset-1 col-sm-10">
					    	<a href="<?php echo base_url(); ?>" style="float:right;"><small>Click here to Login.</small></a>
					    </div><br>
					  <div class="form-group">
					    <div class="col-sm-offset-5 col-sm-6">
					      <button type="submit" class="btn btn-success" id="button" name="<?=$var['submit_name'];?>"><?=$var['submit_value'];?></button>
					    </div>
					  </div>
					</form>
				</div>
				<div class="alert alert-success" style="display: none;">
				</div>
			</div>
		</div>
	</body>
</html>
