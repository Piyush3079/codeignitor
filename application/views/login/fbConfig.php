<?php
//session_start();

//Include Facebook SDK
require_once 'inc/facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '212790995839296'; //Facebook App ID
$appSecret = '8d2bea9b1049752b53f932f6cb73754d'; // Facebook App Secret
$redirectURL = 'http://localhost/Project/'; // Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));
$fbUser = $facebook->getUser();
?>