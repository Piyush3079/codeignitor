<?php
	error_reporting(0);
    ini_set('display_errors', 0);
	if($this->session->userdata('oauth_uid') && $this->session->userdata('identity')){
		$uid = $this->session->userdata('oauth_uid');
		$provider = $this->session->userdata('oauth_provider');
		/*$this->load->model('Friends_model');
		$var = 3;
		$data = $this->db->Friends_model('get_requests', $uid, $var);
		echo count($data);*/
	}
	else{
		redirect('');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>HOME</title>
		<?php $this->load->view('template/head');?>
	</head>
	<body>
		<?php $this->load->view('template/header_main') ?>
		<div class="container" style="margin-top:70px;">
			<div>
				<?php $this->load->view('template/home_div_left_me'); ?>
				<div class="col-md-8 scrollbar" id="style-4" style="background: #ebe2e2;height:784px;width:61.6666677%;margin-left: 21px;margin-right: 21px;border-radius: 5px;">
					<h3 class="pull-left">Connect with People Around</h3>
					<h5 class="pull-right" style="margin-top: 25px;margin-bottom: 16px;margin-left: 10px;"><a href="<?= base_url() ?>friends/get_requests/2">Requests</a></h5>
					<h5 class="pull-right" style="margin-top: 25px;margin-bottom: 16px;margin-left: 10px;"><a href="<?= base_url() ?>friends/get_requests/3">Sent Requests</a></h5>
					<h5 class="pull-right" style="margin-top: 25px;margin-bottom: 16px;"><a href="<?= base_url() ?>friends/get_friends/<?= $uid ?>">Friends</a></h5>
					<div style="margin-top:10px;">
						<?php
							if($var == 1){
								foreach ($data as $key => $value) {
									echo '<div class="col-md-6 connect_view" style="background: #ffffff;width:47%;padding:0;height: 95px;;margin: 10px;border-radius: 4px;-webkit-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
	box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);">
								<div class="pull-left">
									<div style="width: 100px;overflow:hidden;height:91px;margin-bottom:5px;"><img src="'.$value['picture'].'" width="85" style="margin:5px;"></div>
								</div>
								<div>
									<h4 style="margin-top: 5px;margin-bottom: 2px;margin-left: 100px;">
										<a href="'.base_url().'view/profile/'.$value['oauth_uid'].'">'.$value['first_name'].' '.$value['last_name'].'</a>
									</h4>
									<div style="height: 35px;">
										<h6 style="margin: 0;margin-top: 8px;margin-bottom: 10px;margin-left: 100px;margin-right:4px;overflow: hidden;">'.$value['oauth_uid'].'</h6>
									</div>
									<center>
										<button class="btn btn-success" style="padding-top: 0;padding-bottom: 0">
											<a href="'.base_url().'view/profile/'.$value['oauth_uid'].'" style="color:#f5f5f5;">View Profile</a>
										</button>
										<button class="btn btn-default" style="padding-top: 0;padding-bottom: 0;margin-left: 4px;">
											<a href="#" style="color:#131314;" class="button_connect">
											<input type="hidden" value="'.$value['oauth_uid'].'" class="connect_uid">
											Connect</a>
										</button>
									</center>
								</div>
							</div>';
								}
							}
							if($var == 2){
								// incoming requests...
								if($data == false){
									echo '<h4 style="margin-top:100px;">No friend requests.</h4>';
								}
								else{
									foreach ($data as $key => $value) {
										//print_r($data);
										echo '<div class="col-md-6 connect_view" style="background: #ffffff;width:47%;padding:0;height: 95px;;margin: 10px;border-radius: 4px;-webkit-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
		box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);">
									<div class="pull-left">
										<div style="width: 100px;overflow:hidden;height:91px;margin-bottom:5px;"><img src="'.$value['picture'].'" width="85" style="margin:5px;"></div>
									</div>
									<div>
										<h4 style="margin-top: 5px;margin-bottom: 2px;margin-left: 100px;">
											<a href="'.base_url().'view/profile/'.$value['oauth_uid'].'">'.$value['first_name'].' '.$value['last_name'].'</a>
										</h4>
										<div style="height: 35px;">
											<h6 style="margin: 0;margin-top: 8px;margin-bottom: 10px;margin-left: 100px;margin-right:4px;overflow: hidden;">'.$value['oauth_uid'].'</h6>
										</div>
										<center>
											<button class="btn btn-danger" style="padding-top: 0;padding-bottom: 0">
												<a href="'.base_url().'friends/request_action/block_'.$value['oauth_uid'].'" style="color:#f5f5f5;">Block</a>
											</button>
											<button class="btn btn-info" style="padding-top: 0;padding-bottom: 0">
												<a href="'.base_url().'friends/request_action/reject_'.$value['oauth_uid'].'" style="color:#f5f5f5;">Reject</a>
											</button>
											<button class="btn btn-success" style="padding-top: 0;padding-bottom: 0;margin-left: 0px;">
												<a href="'.base_url().'friends/request_action/accept_'.$value['oauth_uid'].'" style="color:#f5f5f5;">
													<input type="hidden" value="'.$value['oauth_uid'].'" class="connect_uid">
												Accept
												</a>
											</button>
										</center>
									</div>
								</div>';
									}
								}
							}
							if($var == 3){
								// sent requests...
								if($data == false){
									echo '<h4 style="margin-top:100px;">No have no sent requests.</h4>';
								}
								foreach ($data as $key => $value) {
									echo '<div class="col-md-6 connect_view" style="background: #ffffff;width:47%;padding:0;height: 95px;;margin: 10px;border-radius: 4px;-webkit-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
	box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);">
								<div class="pull-left">
									<div style="width: 100px;overflow:hidden;height:91px;margin-bottom:5px;"><img src="'.$value['picture'].'" width="85" style="margin:5px;"></div>
								</div>
								<div>
									<h4 style="margin-top: 5px;margin-bottom: 2px;margin-left: 100px;">
										<a href="'.base_url().'view/profile/'.$value['oauth_uid'].'">'.$value['first_name'].' '.$value['last_name'].'</a>
									</h4>
									<div style="height: 35px;">
										<h6 style="margin: 0;margin-top: 8px;margin-bottom: 10px;margin-left: 100px;margin-right:4px;overflow: hidden;">'.$value['oauth_uid'].'</h6>
									</div>
									<center>
										<button class="btn btn-success" style="padding-top: 0;padding-bottom: 0;padding-left:4px;padding-right:4px;">
											<a href="'.base_url().'view/profile/'.$value['oauth_uid'].'" style="color:#f5f5f5;">View Profile</a>
										</button>
										<button class="btn btn-default" style="padding-top: 0;padding-bottom: 0;margin-left: 4px;padding-left:4px;padding-right:4px;">
										<a href="'.base_url().'friends/request_action/cancel_'.$value['oauth_uid'].'" style="color:#131314;">
											<input type="hidden" value="'.$value['request_2'].'" class="connect_uid">
											Cancel Request</a>
										</button>
									</center>
								</div>
							</div>';
								}
							}
							if($var == 4){
								// sent requests...
								if($data == false){
									echo '<h4 style="margin-top:100px;">No have no friends.</h4>';
								}
								foreach ($data as $key => $value) {
									echo '<div class="col-md-6 connect_view" style="background: #ffffff;width:47%;padding:0;height: 95px;;margin: 10px;border-radius: 4px;-webkit-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
	-moz-box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);
	box-shadow: 1px 1px 6px 0px rgba(0,0,0,0.75);">
								<div class="pull-left">
									<div style="width: 100px;overflow:hidden;height:91px;margin-bottom:5px;"><img src="'.$value['picture'].'" width="85" style="margin:5px;"></div>
								</div>
								<div>
									<h4 style="margin-top: 5px;margin-bottom: 2px;margin-left: 100px;">
										<a href="'.base_url().'view/profile/'.$value['oauth_uid'].'">'.$value['first_name'].' '.$value['last_name'].'</a>
									</h4>
									<div style="height: 35px;">
										<h6 style="margin: 0;margin-top: 8px;margin-bottom: 10px;margin-left: 100px;margin-right:4px;overflow: hidden;">'.$value['oauth_uid'].'</h6>
									</div>
									<center>
										<button class="btn btn-danger" style="padding-top: 0;padding-bottom: 0;padding-left:4px;padding-right:4px;">
											<a href="'.base_url().'friends/friends_action/block_'.$value['oauth_uid'].'" style="color:#f5f5f5;">Block</a>
										</button>
										<button class="btn btn-default" style="padding-top: 0;padding-bottom: 0;margin-left: 4px;padding-left:4px;padding-right:4px;">
										<a href="'.base_url().'friends/friends_action/cancel_'.$value['oauth_uid'].'" style="color:#131314;">
											<input type="hidden" value="'.$value['request_2'].'" class="connect_uid">
											Cancel Friend</a>
										</button>
									</center>
								</div>
							</div>';
								}
							}
						?>	
					<input type="hidden" value="<?= $uid ?>" id="connect_my_uid">	
					</div>
				</div>
				<div class="col-md-2" style="background: #ebe2e2;height:250px;border-radius:5px;">
				</div>
			</div>
		</div>
		<?php $this->load->view('template/footer_main');?>
	</body>
</html>