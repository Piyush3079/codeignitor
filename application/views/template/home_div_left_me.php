<div class="col-md-2" style="background: #ebe2e2;border-radius: 5px;padding:0;">
<div class="img-div" style="position: relative;">
	<center>
		<img src="<?= $this->session->userdata('picture') ?>" class="img-thumbnail img-set11">	
		<figcaption id="figcaption1" style="position: absolute;background: white;margin-top: -23px;margin-left: 4px;border-radius: 2px;display: none;"><a href="#">Update Image</a></figcaption>
	</center>
</div>
<h4 class="center-align"><a href="<?php echo base_url().'home/me/'.$this->session->userdata('oauth_uid'); ?>" class="profile-name" style="word-wrap: break-word;"><?php echo $this->session->userdata('first_name').' '. $this->session->userdata('last_name'); ?></a></h4>
<h6 class="center-align" style="word-wrap: break-word;"><?= $this->session->userdata('email') ?></h6>
<input type="hidden" id="unique_id" value="<?php echo base_url().'home/me/'.$this->session->userdata('oauth_uid'); ?>">
<ul class="center-align" style="padding:0;list-style: none;font-size: 18px;">
	<li class="list-name1"><a href="<?php echo base_url().'home/me/'.$this->session->userdata('oauth_uid'); ?>" class="ul-name1">Profile</a></li>
	<li class="list-name2"><a href="<?= base_url() ?>home/connect" class="ul-name2">Connect</a></li>
	<li class="list-name3"><a href="#" class="ul-name3">Messages</a></li>
	<li class="list-name4"><a href="<?= base_url() ?>home/invite" class="ul-name4">Invite</a></li>
	<li class="list-name5"><a href="<?= base_url() ?>home/social" class="ul-name5">Go Social</a></li>
	<li class="list-name6"><a href="<?php echo base_url().'posts'; ?>" class="ul-name6">Blog</a></li>
</ul>
</div>