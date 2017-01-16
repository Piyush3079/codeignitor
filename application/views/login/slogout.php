<?php
	

	//Unset user data from session
	$this->session->unset_userdata($result['userData']);

	//Destroy session data
	session_destroy();

	//Redirect to homepage
	header("Location:".base_url());
?>