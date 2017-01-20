<?php
	//print_r($data);
	error_reporting(0);
    ini_set('display_errors', 0);
	if($this->session->userdata('oauth_uid') && $this->session->userdata('identity')){
		$uid = $this->session->userdata('oauth_uid');
		$provider = $this->session->userdata('oauth_provider');
		//print_r($data);
		 //data for profile general
		if($data['data2'][0]['number'] != ''){
			$data1 = $data['data2'][0]['number'];
		}
		else{
			$data1 = 'No data to show';
		}
		if($data['data2'][0]['gender']){
			$data2 = $data['data2'][0]['gender'];
		}
		else{
			$data2 = 'No data to show';
		}
		if($data['data2'][0]['dob']){
			$data3 = $data['data2'][0]['dob'];
		}
		else{
			$data3 = 'No data to show';
		}
		if($data['data2'][0]['language']){
			$data4 = $data['data2'][0]['language'];
		}
		else{
			$data4 = 'No data to show';
		}
		if($data['data2'][0]['living']){
			$data5 = $data['data2'][0]['living'];
		}
		else{
			$data5 = 'No data to show';
		}
		if($data['data2'][0]['from']){
			$data6 = $data['data2'][0]['from'];
		}
		else{
			$data6 = 'No data to show';
		}
		if($data['data2'][0]['fb_link']){
			$data7 = $data['data2'][0]['fb_link'];
		}
		else{
			$data7 = 'No data to show';
		}
		
		//data for profile general
		if($data['data3'][0]['college_name'] != ''){
			$data_acad1 = $data['data3'][0]['college_name'];
		}
		else{
			$data_acad1 = 'No data to show';
		}
		if($data['data3'][0]['branch']){
			$data_acad2 = $data['data3'][0]['branch'];
		}
		else{
			$data_acad2 = 'No data to show';
		}
		if($data['data3'][0]['current_year']){
			$data_acad3 = $data['data3'][0]['current_year'];
		}
		else{
			$data_acad3 = 'No data to show';
		}
		if($data['data3'][0]['joining_year']){
			$data_acad4 = $data['data3'][0]['joining_year'];
		}
		else{
			$data_acad4 = 'No data to show';
		}
		if($data['data3'][0]['final_year']){
			$data_acad5 = $data['data3'][0]['final_year'];
		}
		else{
			$data_acad5 = 'No data to show';
		}
		if($data['data3'][0]['reg_no']){
			$data6 = $data['data3'][0]['reg_no'];
		}
		else{
			$data_acad6 = 'No data to show';
		}
		if($data['data3'][0]['nationality']){
			$data_acad7 = $data['data3'][0]['nationality'];
		}
		else{
			$data_acad7 = 'No data to show';
		}
		if($data['data3'][0]['website_link']){
			$data_acad8 = $data['data3'][0]['website_link'];
		}
		else{
			$data_acad8 = 'No data to show';
		}
		if($data['data3'][0]['linkedin_link']){
			$data_acad9 = $data['data3'][0]['linkedin_link'];
		}
		else{
			$data_acad9 = 'No data to show';
		}
	}
	else{
		redirect('');
	}
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>HOME</title>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/home/style.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/home/home.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/home/general.js"></script>
		<script src="<?= base_url(); ?>assets/js/login/script_form_login.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Privacy Policy</h4>
      </div>
      <div class="modal-body">
        <p>Privacy Policy.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Employee</h4>
      </div>
      <div class="modal-body">
        	<form class="form-horizontal" id="myForm" action="" method="post">
        		<div calss="form-group">
        			<label class="label-control col-md-4" id="profile_info_label" style="margin-left: 10px;margin-top: 7px;">Name</label>
        			<div id="email_login"><input id="email1" type="text" class="form-control" placeholder="Enter Information" style="width:350px;"></div>
        		</div>
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="formSubmit">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
	<?php $this->load->view('template/header_main'); ?>
		<div class="container" style="margin-top:70px;">
			<div>
				<div class="col-md-2" style="background: #ebe2e2;border-radius: 5px;padding:0;">
					<div>
						<center><img src="<?= $data['data1'][0]['picture'] ?>" class="img-thumbnail img-set11"></center>
					</div>
					<h4 class="center-align"><a href="<?= $data['data1'][0]['oauth_uid'] ?>" class="profile-name" style="word-wrap: break-word;"><?php echo $data['data1'][0]['first_name'].' '.$data['data1'][0]['last_name']; ?></a></h4>
					<h6 class="center-align" style="word-wrap: break-word;"><?= $data['data1'][0]['email'] ?></h6>
					<input type="hidden" id="unique_id" value="<?php echo $uid; ?>">
					<ul class="center-align" style="padding:0;list-style: none;font-size: 18px;">
						<li class="list-name1"><a href="<?php echo base_url().'home/me/'.$data['data1'][0]['oauth_uid']; ?>" class="ul-name1">Profile</a></li>
						<li class="list-name2"><a href="#" class="ul-name2">Connect</a></li>
						<li class="list-name3"><a href="#" class="ul-name3">Messages</a></li>
						<li class="list-name4"><a href="#" class="ul-name4">Invite</a></li>
						<li class="list-name5"><a href="#" class="ul-name5">Go Social</a></li>
						<li class="list-name6"><a href="#" class="ul-name6">Blog</a></li>
					</ul>
				</div>
				<div class="col-md-8" style="background: #ebe2e2;height:784px;width:61.6666677%;margin-left: 21px;margin-right: 21px;border-radius: 5px;">
					<div class="row">
						<div class="col-md-6" style="margin-top: 9px;">
							<h4><?= $data['data1'][0]['first_name'].' '.$data['data1'][0]['last_name'] ?></h4>
							<h6><?= $data['data1'][0]['email'] ?></h6>
						</div>
						<div class="col-md-6" style="margin-top: 9px;">
							<h4 style="float:right;margin-top: 5px;margin-top: 16px;">Logged in via <?= $data['data1'][0]['oauth_provider'] ?></h4>
						</div>
					</div>
						<div class="col-md-6 profile-div1">
							<div class="page-header div-header">Piyush Vijay</div>
							<div class="info-general">
								<ul class="gen-info-ul">
									<li class="gen-info-li">Name<span style="margin-left: 66px;">:</span><?= $data['data1'][0]['first_name'].' '.$data['data1'][0]['last_name'] ?></li>
									<li class="gen-info-li">Email<span style="margin-left: 68px;">:</span><?= $data['data1'][0]['email'] ?></li>
									<li class="gen-info-li" id="Contact No."><span>Contact No.</span><span style="margin-left: 27px;">:</span><?= $data1 ?></li>
									<li class="gen-info-li" id="Gender"><span>Gender</span><span style="margin-left: 53px;">:</span><?= $data2 ?></li>
									<li class="gen-info-li" id="Date of Birth">Date of Birth<span style="margin-left: 22px;">:</span><?= $data3 ?></li>
									<li class="gen-info-li" id="Language">Languages<span style="margin-left: 30px;">:</span><?= $data4 ?></li>
									<li class="gen-info-li" id="Place of Living">Place of Living<span style="margin-left: 9px;">:</span><?= $data5 ?></li>
									<li class="gen-info-li" id="Where are you From?">From<span style="margin-left: 67px;">:</span><?= $data6 ?></li>
									<li class="gen-info-li" id="Facebook Link">Facebook link<span style="margin-left: 13px;">:</span><?= $data7 ?></li>
								</ul>
							</div>
							<div class="div-footer">
								<a href="#" class="footer-edit">action</a>
								<a href="#" class="footer-view">action</a>
							</div>
						</div>
						<div class="col-md-6 profile-div2">
							<div class="page-header div-header">Piyush Vijay</div>
							<div class="info-general">
								<ul class="gen-info-ul">
									<li class="gen-info-li">College Name<span style="margin-left: 7px;">:</span><?= $data_acad1 ?></li>
									<li class="gen-info-li">Branch<span style="margin-left: 52px;">:</span><?= $data_acad2 ?></li>
									<li class="gen-info-li">Current Year<span style="margin-left: 17px;">:</span><?= $data_acad3 ?></li>
									<li class="gen-info-li">Joining Year<span style="margin-left: 20px;">:</span><?= $data_acad4 ?></li>
									<li class="gen-info-li">Final year<span style="margin-left: 34px;">:</span><?= $data_acad5 ?></li>
									<li class="gen-info-li">Regist. No.<span style="margin-left: 27px;">:</span><?= $data_acad6 ?></li>
									<li class="gen-info-li">Nationality<span style="margin-left: 31px;">:</span><?= $data_acad7 ?></li>
									<li class="gen-info-li">Website Link<span style="margin-left: 18px;">:</span><?= $data_acad8 ?></li>
									<li class="gen-info-li">Linkedin link<span style="margin-left: 20px;">:</span><?= $data_acad9 ?></li>
								</ul>
							</div>
							<div class="div-footer">
								<a href="#" class="footer-edit">action</a>
								<a href="#" class="footer-view">action</a>
							</div>
						</div>
						<div class="col-md-6 profile-div3">
							<div class="page-header div-header">Piyush Vijay</div>
							<div class="profile-view">
								<div class="row">
									<div class="col-md-6 profile-view-left">
										<div><center><img src="<?= $data['data4'][0]['picture'] ?>" height="90" width="100" class="view-img"></center></div>
										<h6 class="view-name"><a href="<?= base_url() ?>view/profile/<?= $data['data4'][0]['oauth_uid'] ?>"><?= $data['data4'][0]['first_name'].' '.$data['data4'][0]['last_name'] ?></a></h6>
									</div>
									<div class="col-md-6 profile-view-right">
										<div><center><img src="<?= $data['data4'][1]['picture'] ?>" height="90" width="100" class="view-img"></center></div>
										<h6 class="view-name"><a href="<?= base_url() ?>view/profile/<?= $data['data4'][1]['oauth_uid'] ?>"><?= $data['data4'][1]['first_name'].' '.$data['data4'][1]['last_name'] ?></a></h6>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 profile-view-left">
										<div><center><img src="<?= $data['data4'][2]['picture'] ?>" height="90" width="100" class="view-img"></center></div>
										<h6 class="view-name"><a href="<?= base_url() ?>view/profile/<?= $data['data4'][2]['oauth_uid'] ?>"><?= $data['data4'][2]['first_name'].' '.$data['data4'][2]['last_name'] ?></a></h6>
									</div>
									<div class="col-md-6 profile-view-right">
										<div><center><img src="<?= $data['data4'][3]['picture'] ?>" height="90" width="100" class="view-img"></center></div>
										<h6 class="view-name"><a href="<?= base_url() ?>view/profile/<?= $data['data4'][3]['oauth_uid'] ?>"><?= $data['data4'][3]['first_name'].' '.$data['data4'][3]['last_name'] ?></a></h6>
									</div>
								</div>
							</div>
							<div class="footer-more"><a href="<?= base_url() ?>friends/get_friends/<?= $data['data1'][0]['oauth_uid'] ?>">View more</a></div>
						</div>
						<div class="col-md-6 profile-div4">
							<div class="page-header div-header">Piyush Vijay</div>
							<div class="profile-view">
								<div class="row">
									<div class="col-md-6 profile-view-left">
										<div style="border-bottom: 1px solid #eee;text-align: center;font-weight: 500;font-size: 16px;margin-top: 0px;">Piyush</div>
										<div style="font-size: 12px;margin-left: 8px;word-break: break-word;height: 66px;overflow: hidden;">Welcome to the blog. This blog is about the complications of Engineering.Welcome to the blog. This blog is about the complications of Engineering.Welcome to the blog. This blog is about the complications of Engineering.Welcome to the blog. This blog is about the complications of Engineering.</div>
										<center><div class="blog-read-button" style="width: 76px;text-align: center;margin-top: 2px;background: #89a4e1;border-radius: 12px;"><a href="#">Read Blog</a></div><center>
									</div>
									<div class="col-md-6 profile-view-right">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 profile-view-left">
									</div>
									<div class="col-md-6 profile-view-right">
									</div>
								</div>
							</div>
							<div class="footer-more"><a href="#">action</a></div>
						</div>
				</div>
				<div class="col-md-2" style="background: #ebe2e2;height:250px;border-radius:5px;">
				</div>
			</div>
		</div>
		<?php $this->load->view('template/footer_main'); ?>
	</body>
</html>
