<?php 
/*ob_start();
//Get the ipconfig details using system commond
system('ipconfig /all');
$mycom=ob_get_contents();
//Get OS info
system('systeminfo');
$mysystem = ob_get_contents();
ob_clean();
echo '<pre>';print_r($mycom);echo '</pre>';
echo '<pre>';print_r($mysystem);echo '</pre>';
$ipconfig = explode("Ethernet", $mycom);
//Search the "Physical" | Find the position of Physical text
$pmac = strpos($ipconfig[2], "Physical");
$mac=substr($ipconfig[2],($pmac+36),17);
$pIPv4 = strpos($ipconfig[2], "IPv4");
$IPv4 = substr($ipconfig[2], ($pIPv4+36),13);
$pIPv6 = strpos($ipconfig[2], "IPv6");
$IPv6 = substr($ipconfig[2], ($pIPv6+24),29);
$DHCPv6 = strpos($ipconfig[2], "DHCPv6");
$DHCPv6 = substr($ipconfig[2], ($DHCPv6+36),12);
$DUID = strpos($ipconfig[2], "DUID");
$DUID = substr($ipconfig[2], ($DUID+22),41);
$DNS = strpos($ipconfig[2], "DNS");
$DNS = substr($ipconfig[2], ($DNS+16),13);
$DHCP = strpos($ipconfig[2], "DHCP Server");
$DHCP = substr($ipconfig[2], ($DHCP+36),11);
$DNS_server = strpos($ipconfig[2], "DNS Servers");
$DNS_server = substr($ipconfig[2], ($DNS_server+36),13);
echo 'Connection-specific DNS Suffix : '.$DNS.'<br>';
echo 'Physical Address : '.$mac.'</br>';
echo 'Link-local IPv6 Address : '.$IPv6.'<br>';
echo 'IPv4 Address : '.$IPv4.'<br>';
echo 'DHCP Server : '.$DHCP.'<br>';
echo 'DHCPv6 IAID : '.$DHCPv6.'<br>';
echo 'DHCPv6 Cliant DUID : '.$DUID.'<br>';
echo 'DNS Servers : '.$DNS_server.'<br>';*/
error_reporting(0);
ini_set('display_errors', 0);
if(isset($data[0]['status'])){
	$this->session->set_userdata($data[0]);
	$this->session->unset_userdata('status');
	if($data[0]['status'] == 1){
		$this->session->set_userdata(array('status' => 1));
		redirect(base_url().'home/');
	}
}
if(isset($data[0]['first_name'])){
	$first_name = $data[0]['first_name'];
	$disabled = 'disabled';
}
else{
	$first_name = "";
}
if(isset($data[0]['last_name'])){
	$last_name = $data[0]['last_name'];
	$disabled = 'disabled';
}
else{
	$first_name = "";
}
if(isset($data[0]['email'])){
	$email = $data[0]['email'];
	$disabled = 'disabled';
}
else{
	$first_name = "";
}
if(isset($data[0]['picture'])){
	$image = $data[0]['picture'];
	$hidden_class = "hidden";
}
else{
	$image = base_url().'assets/img/login/photo.jpg';
}
if(isset($data[0]['oauth_provider'])){
	$logout_provider = $data[0]['oauth_provider'];
}
else{
	$logout_provider = "";
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Register</title>
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
				<div class="col-lg-6">
					<center><img src="<?=$image?>" id="iamge_preview" style="margin-top:70px;width:300px;height: 300px;"><center><br>
					<a href="<?=base_url()?>login/logout/<?=$logout_provider?>">Login if already registered</a>
				</div>
				<div class="col-lg-6">
					<?php echo form_open_multipart('login/register_now', array("style" => "margin-top:50px;")); ?>
					<legend>Register</legend>
					<div class="form-group col-md-6">
						<?php
							 $username_attributes = array(
							                            'type' => 'text',
							                            'name' => 'firstname',
							                            'class' => 'form-control',
							                            'id' => 'firstname',
							                            'placeholder' => 'First Name',
							                            'value' => $first_name,
							                            $disabled => ''
							                        );
							    //echo lang('username');
							    echo form_input($username_attributes);
						?>
					</div>
					<div class="form-group col-md-6">
						<?php
							 $username_attributes = array(
							                            'type' => 'text',
							                            'name' => 'lastname',
							                            'class' => 'form-control',
							                            'id' => 'lastname',
							                            'placeholder' => 'Last Name',
							                            'value' => $last_name,
							                            $disabled => ''
							                        );
							    //echo lang('username');
							    echo form_input($username_attributes);
						?>
					</div>
					<div class="form-group col-md-12">
						<?php
							 $username_attributes = array(
							                            'type' => 'email',
							                            'name' => 'email',
							                            'class' => 'form-control',
							                            'id' => 'email',
							                            'placeholder' => 'Your Email ID',
							                            'value' => $email,
							                            $disabled => ''
							                        );
							    //echo lang('username');
							    echo form_input($username_attributes);
						?>
					</div>
					<div class="form-group col-md-12">
						<?php
							 $username_attributes = array(
							                            'type' => 'password',
							                            'name' => 'password',
							                            'class' => 'form-control',
							                            'id' => 'password',
							                            'placeholder' => 'Password',
							                        );
							    //echo lang('username');
							    echo form_input($username_attributes);
						?>
					</div>
					<div class="form-group col-md-12">
						<?php
							 $username_attributes = array(
							                            'type' => 'password',
							                            'name' => 'confirm_password',
							                            'class' => 'form-control',
							                            'id' => 'confirm_password',
							                            'placeholder' => 'Confirm Password',
							                            '' => ""
							                        );
							    //echo lang('username');
							    echo form_input($username_attributes);
							    echo '<div class="username_availability_result" id="username_availability_result"></div>';
						?>
					</div>
					<div class="form-group col-md-4">
						<div class="controls">
							<select name="gender" id="gender" class="form-control">
								<option value="" class="inactive" disabled="disabled" selected>Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Otehr">Other</option>
							</select>
						</div>
					</div>
					<div class="col-md-1" style="margin-top: 6px;"">
						<span><b>D.O.B.</b></span>
					</div>
					<div class="col-md-7">
						<div class="form-group col-md-4" style="padding: 2px;padding-top: 0;">
							<div class="controls">
								<select name="year" id="year" class="form-control">
									<option value="" class="inactive" disabled="disabled" selected>Year</option>
									<?php
									for($i=1990;$i<2018;$i++){
										echo '<option value="'.$i.'">'.$i.'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4" style="padding: 2px;padding-top: 0;">
							<div class="controls">
								<select name="month" id="month" class="form-control">
									<option value="" class="inactive" disabled="disabled" selected>Month</option>
									<?php
									$month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "Octobrt", "November", "December");
									for($i=0;$i<12;$i++){
										echo '<option value="'.$month[$i].'">'.$month[$i].'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group col-md-4" style="padding: 2px;padding-top: 0;">
							<div class="controls">
								<select name="day" id="day" class="form-control" placeholder="Day">
									<option value="" disabled="disabled" class="inactive" selected>Day</option>

								</select>
							</div>
						</div>
					</div>
					<div class="form-group col-md-12">
						<?php
							 $username_attributes = array(
							                            'type' => 'text',
							                            'name' => 'collegename',
							                            'class' => 'form-control',
							                            'id' => 'institute_name',
							                            'placeholder' => 'College Name',
							                        );
							    //echo lang('username');
							    echo form_input($username_attributes);
						?>
					</div>
					<div class="form-group col-md-12">
						<?php
							 $username_attributes = array(
							                            'type' => 'file',
							                            'name' => 'image',
							                            'class' => 'form-control',
							                            'id' => 'image',
							                            'accept' => 'image/x-png,image/gif,image/jpeg',
							                            '' => ""
							                        );
							    //echo lang('username');
							    echo form_input($username_attributes);
						?>
						<br>
					</div>
					<center><button type="submit" name="submit" class="btn btn-default">Submit</button></center>
				</form>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(function(){
		$("#year").focus(function(){
			var month = $("#month").val();
			var year = $(this).val();
			if(year%4 == 0 && month == "February"){
				$("#day").empty();
				var days = 29;
			}
			else if(year%4 != 0 && month == "February"){
				$("#day").empty();
				var days = 28;
			}
			
			for(var i=1;i<(days+1);i++){
				$("#day").append($('<option>',{
					value:i,
					text:i}))
			}
		});
		$("#year").blur(function(){
			var year = $(this).val();
			if(year == " "){
				$(this).parent().parent().addClass("has-error");
			}
			else{
				$(this).parent().parent().removeClass("has-error");
			}
		});
		$("#month").focus(function(){
			var year = $("#year").val();
			console.log(year);
			if(year==""){
				alert("Piyush");
				$("#year").parent().parent().addClass("has-error");
			}
			else{
				$("#year").parent().parent().removeClass("has-error");
			}
		});
		$("#month").blur(function(){
			var year = $("#year").val();
			var month = $("#month").val();
			if(year != "" && month != ""){
				if(year%4 == 0){
					var x = 29;
				}
				else{
					var x = 28;
				}
				if(month == "January" || month == "March" || month == "May" || month == "July" || month == "August" || month == "October" || month == "December"){
					var days = 31;
				}
				else if(month == "February"){
					var days = x;
				}
				else{
					var days = 30;
				}
				$("#day").empty();
				for(var i=1;i<(days+1);i++){
					$("#day").append($('<option>',{
						value:i,
						text:i}))
				}
			}

		});
		function readURL(input) {

			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#iamge_preview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#image").change(function(){
			readURL(this);
		});
	});
</script>
</html>