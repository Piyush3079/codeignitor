<?php
//Include FB config file
require_once 'fbConfig.php';

//Unset user data from session
$this->session->unset_userdata($userData);

//Destroy session data
session_destroy();

//Redirect to homepage
header("Location:".base_url());
?>