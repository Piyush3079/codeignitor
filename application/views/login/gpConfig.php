<?php
if(!isset($_SESSION)){
session_start();}

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '644383037280-bb4j7jnlj4la54i695bd4lte7c25ba2f.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'xkuoaUnSKDkhRnfMQBCdPC1q'; //Google client secret
$redirectURL = 'http://localhost/Project/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>