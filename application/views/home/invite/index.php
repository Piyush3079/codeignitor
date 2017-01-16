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
					<h3>Invite your Friends</h3>
				</div>
				<div class="col-md-2" style="background: #ebe2e2;height:250px;border-radius:5px;">
				</div>
			</div>
		</div>
		<?php $this->load->view('template/footer_main');?>
	</body>
</html>