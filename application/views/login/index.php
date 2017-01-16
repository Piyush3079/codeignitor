<?php
print_r($this->session->userdata());
	error_reporting(0);
    ini_set('display_errors', 0);
    if(!isset($_SESSION)){
	session_start();}
	$token = uniqid(rand());
	$salt = rand(0,1000000);
?>
<?php
$if = $this->session->userdata('oauth_provider');
$status = $this->session->userdata('status');
if($if && $status==1){
	redirect('home/');
}
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Sample Project</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/login/script_form_login.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class=" col-xs-1 col-sm-3 col-lg-3">
					<div style="margin-top:9vh;"">
					<?php
						echo $var;
					?></div>
				</div>
				<div class="col-xs-10 col-sm-6 col-lg-6"><br><br><br><br>
					<?php echo form_open(base_url('login/check'), array('class' => 'form-horizontal')); ?>
						<legend>Log-in</legend>
					  <div class="form-group">
					    <!--<label for="email" class="col-sm-2 control-label">Email</label>-->
					    <div class="col-sm-offset-1 col-sm-10" id="email_login">
					      <input type="email" name="email" class="form-control" id="email1" placeholder="Email" aria-describedby="inputSuccess2Status">
					    </div>
					  </div>
					  <div class="form-group">
					    <!--<label for="inputPassword3" class="col-sm-2 control-label">Password</label>-->
					    <div class="col-sm-offset-1 col-sm-10" id="pass_login">
					      <input type="password" name="password" class="form-control" id="pass1" placeholder="Password">
					    </div>
					  </div>
					  <input type="hidden" value="<?php echo $token.$salt; ?>" name="token">
					  <div class="form-group">
					    <div class="col-sm-offset-1 col-sm-10">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox" name="remember" value="remember"> Remember me
					        </label>
					      </div>
					    </div><br>
					    <div class="col-sm-offset-1 col-sm-10">
					    	<a href="<?php echo base_url(); ?>login/pre" style="float:right;"><small>Forgot password?</small></a>
					    </div><br>
					    <div class="col-sm-offset-1 col-sm-10">
					    	<a href="<?php echo base_url(); ?>login/register" style="float:right;"><small>Not registered yet? Sign up now...</small></a>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-5 col-sm-6">
					      <button type="submit" class="btn btn-success" name="submit">Sign in</button>
					    </div>
					  </div>
					</form><br><br><br>
						<?php
						//Include FB config file && User class
						require_once 'fbConfig.php';
						require_once 'User.php';

						if(!$fbUser){
							$fbUser = NULL;
							$loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
							$output = '<a href="'.$loginURL.'"><img src="'.base_url().'assets/img/login/facebook.png" class="img-responsive"></a>';
						}else{
							//Get user profile data from facebook
							$fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
							
							//Initialize User class
							$user = new User();
							$salt = rand(1,100000);
							//Insert or update user data to the database
							$fbUserData = array(
								'oauth_provider'=> 'facebook',
								'oauth_uid' 	=> $fbUserProfile['id'],
								'identity'		=> md5(uniqid($salt, true)),
								'first_name' 	=> $fbUserProfile['first_name'],
								'last_name' 	=> $fbUserProfile['last_name'],
								'email' 		=> $fbUserProfile['email'],
								'gender' 		=> $fbUserProfile['gender'],
								'locale' 		=> $fbUserProfile['locale'],
								'picture' 		=> $fbUserProfile['picture']['data']['url'],
								'link' 			=> $fbUserProfile['link']
							);
							$userData = $user->checkUser($fbUserData);
							
							//Put user data into session
							
							//Render facebook profile data
							if(!empty($userData)){
								echo "Piyush";
								redirect(base_url().'login/register/'.$fbUserData['oauth_uid']);
								/*$output = '<h1>Facebook Profile Details </h1>';
								$output .= '<img src="'.$userData['picture'].'">';
						        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
						        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
						        $output .= '<br/>Email : ' . $userData['email'];
						        $output .= '<br/>Gender : ' . $userData['gender'];
						        $output .= '<br/>Locale : ' . $userData['locale'];
						        $output .= '<br/>Logged in with : Facebook';
								$output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
						        $output .= '<br/>Logout from <a href="'.base_url().'login/logout">Facebook</a>';*/ 
							}else{
								$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
							}
							
						}
						?>
					<center>
						<div style="width:23vw;"><?php echo $output; ?></div>
					</center>
							<?php
							//Include GP config file && User class
							include_once 'gpConfig.php';
							include_once 'gpUser.php';

							if(isset($_GET['code'])){
								$gClient->authenticate($_GET['code']);
								$_SESSION['token'] = $gClient->getAccessToken();
								header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
							}

							if (isset($_SESSION['token'])) {
								$gClient->setAccessToken($_SESSION['token']);
							}

							if ($gClient->getAccessToken()) {
								//Get user profile data from google
								$gpUserProfile = $google_oauthV2->userinfo->get();
								
								//Initialize User class
								$user = new gpUser();
								$salt = rand(1,100000);
								//Insert or update user data to the database
							    $gpUserData = array(
							        'oauth_provider'=> 'google',
							        'oauth_uid'     => $gpUserProfile['id'],
							        'identity'		=> md5(uniqid($salt, true)),
							        'first_name'    => $gpUserProfile['given_name'],
							        'last_name'     => $gpUserProfile['family_name'],
							        'email'         => $gpUserProfile['email'],
							        'gender'        => $gpUserProfile['gender'],
							        'locale'        => $gpUserProfile['locale'],
							        'picture'       => $gpUserProfile['picture'],
							        'link'          => $gpUserProfile['link']
							    );
							    $userData = $user->checkUser($gpUserData);
								
								//Storing user data into session
								
								//Render facebook profile data
							    if(!empty($userData)){
							    	header('Location:'.base_url().'login/register/'.$gpUserData['oauth_uid']);
							        /*$output = '<h1>Google+ Profile Details </h1>';
							        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
							        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
							        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
							        $output .= '<br/>Email : ' . $userData['email'];
							        $output .= '<br/>Gender : ' . $userData['gender'];
							        $output .= '<br/>Locale : ' . $userData['locale'];
							        $output .= '<br/>Logged in with : Google';
							        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
							        $output .= '<br/>Logout from <a href="'.base_url().'login/gplogout">Google</a>';*/
							    }else{
							        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
							    }
							} else {
								$authUrl = $gClient->createAuthUrl();
								$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="'.base_url().'assets/img/login/glogin.png" alt="" class="img-responsive"/></a>';
							}
							?>
							<center>
								<div style="width:23vw;"><?php echo $output; ?></div>
							</center>	
				</div>
			</div>
		</div>
	</body>
</html>
