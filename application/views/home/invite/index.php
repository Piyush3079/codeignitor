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
		<div class="" id="loader_main_id"><div class="" id="loader_id"></div></div>
		<?php $this->load->view('template/header_main'); ?>
		<div class="container" style="margin-top:70px;">
			<div>
				<?php $this->load->view('template/home_div_left_me'); ?>
				<div class="col-md-8" style="background: #ebe2e2;height:500px;width:61.6666677%;margin-left: 21px;margin-right: 21px;border-radius: 5px;">
					<h3>Invite your Friends</h3><br>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					<?= form_open()?>
					  <legend style="font-size: 21px;margin-top: 200px;">Enter email to send invitation</legend>
					  <div class="row">
						  <div class="form-group col-md-10">
						    <input type="email" class="form-control" id="receiver_email" placeholder="Enter the the name of recriver">
						    <input type="hidden" id="sender_email" value="<?=$this->session->userdata('email')?>">
						    <input type="hidden" id="sender_id" value="<?= $this->session->userdata('oauth_uid')?>">
						    <input type="hidden" id="sender_firstname" value="<?= $this->session->userdata('first_name')?>">
						    <input type="hidden" id="sender_lastname" value="<?= $this->session->userdata('last_name')?>">
						    <input type="hidden" id="sender_picture" value="<?= $this->session->userdata('picture')?>">
						    <input type="hidden" id="token" value="<?= $this->security->get_csrf_hash()?>">
						  </div>
						  <button type="submit" class="btn btn-info col-md-2" id="invite_submit" style="margin-left: -12px;">Send invitation</button>
					  </div>
					</form>
				</div>
				<div class="col-md-2" style="background: #ebe2e2;height:250px;border-radius:5px;">
				</div>
			</div>
		</div>
		<?php $this->load->view('template/footer_main');?>
	</body>
<script>
	$(function(){
		$('#invite_submit').click(function(event){
			event.preventDefault();
			$('#invite_submit').css('pointer-events', 'none');
			$('#invite_submit').css('cursor', 'default');
			$('#receiver_email').attr('disabled', '');
			$('#loader_main_id').addClass('loader_main');
			$('#loader_id').addClass('loader');
			var receiverEmail = $('#receiver_email').val();
			var senderId = $('#sender_id').val();
			var senderEmail = $('#sender_email').val();
			var senderName = $('#sender_firstname').val()+' '+$('#sender_lastname').val();
			var senderPicture = $('#sender_picture').val();
			var csrf_token = $('#token').val();
			$.ajax({
				type : 'post',
				url : 'http://localhost/Project/invite/get_invite_data',
				data: {csrf_token:csrf_token, r_email:receiverEmail, s_email:senderEmail, s_name:senderName, s_picture:senderPicture},
				success: function(data){
					if(data == 1){
						$('#loader_main_id').removeClass('loader_main');
						$('#loader_id').removeClass('loader');
						alert("Mail sent successfully!!!");
						window.location = "http://localhost/Project/home/invite";
					}
				},
				error:function(){
					success = false;
				}
			});
		});
	});
</script>
</html>