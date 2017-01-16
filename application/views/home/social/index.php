<?php
	if($this->session->userdata('oauth_uid') && $this->session->userdata('identity')){
		$uid = $this->session->userdata('oauth_uid');
		$provider = $this->session->userdata('oauth_provider');
	}
	else{
		redirect('');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>HOME</title>
		<?php $this->load->view('template/head'); ?>
	</head>
	<body>
		<?php $this->load->view('template/header_main'); ?>
		<div class="container" style="margin-top:70px;">
			<div>
				<?php $this->load->view('template/home_div_left_me'); ?>
				<div class="col-md-8" style="background: #ebe2e2;height:784px;width:61.6666677%;margin-left: 21px;margin-right: 21px;border-radius: 5px;">
					<h3>Connect with People Around</h3>
					<div style="margin-top:10px;">
						<?php
							foreach ($data as $key => $value) {
								echo '<div class="col-md-6" style="background: #ffffff;width:47%;padding:0;height: auto;margin: 10px;border-radius: 4px;-webkit-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);">
							<div class="pull-left">
								<div style="width: 100px;overflow:hidden;height:91px;margin-bottom:5px;"><img src="'.$value['picture'].'" width="85" style="margin:5px;"></div>
								</div>
							<div>
								<h4 style="margin-top: 5px;margin-bottom: 2px;margin-left: 100px;"><a href="#">'.$value['first_name'].' '.$value['last_name'].'</a></h4>
								<div style="height: 35px;"><h6 style="margin: 0;margin-top: 8px;margin-bottom: 10px;margin-left: 100px;margin-right:4px;overflow: hidden;">'.$value['oauth_uid'].'</h6></div>
								<center><button class="btn btn-success" style="padding-top: 0;padding-bottom: 0"><a href="#" style="color:#f5f5f5;">View Profile</a></button><button class="btn btn-default" style="padding-top: 0;padding-bottom: 0;margin-left: 4px;"><a href="#" style="color:#131314;">Connect</a></button></center>
							</div>
						</div>';
							}
						?>		
					</div>
				</div>
				<div class="col-md-2" style="background: #ebe2e2;height:250px;border-radius:5px;">
				</div>
			</div>
		</div>
		<?php $this->load->view('template/footer_main');?>
	</body>
</html>