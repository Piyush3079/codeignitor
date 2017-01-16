<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller{


		//loading index page with error data
		//**********************************
		public function view($data=""){
			if(!file_exists(APPPATH.'views/login/index.php')){
				show_404();
			};
			if($data == ""){
			$this->load->view('login/index');
			}
			elseif($data == "1"){
				$data1['var'] = '<div class="alert alert-danger" role="alert"><h5><b>Alert !!! </b></h5><p>Please fill the username and password properly...</p></div>';
				$this->load->view('login/index', $data1);
			}
			elseif($data == "2"){
				$data1['var'] = '<div class="alert alert-danger" role="alert"><h5><b>Alert !!! </b></h5><p>Either the username or password is incorrect...</p></div>';
				$this->load->view('login/index', $data1);
			}
			elseif($data == "3"){
				$data1['var'] = '<div class="alert alert-success" role="alert"><h5><b>Success !!! </b></h5><p>Your password has been changed successfully...</p></div>';
				$this->load->view('login/index', $data1);
			}
			else{
				redirect("/");
			}

		}


		//logging out of the application
		//******************************
		public function Logout($data=""){
			if($data == "facebook"){
				$this->load->view('login/logout');
			}
			elseif($data == "google"){
				$this->load->view('login/gplogout');
			}
			elseif($data == "sisystem"){
				$this->load->view('login/slogout');
			}
			else{
				redirect("/");
			}
		}


		//controller for viewing password recovery pages
		//**********************************************

		public function pre($data=""){
			if(!$this->session->userdata('oauth_uid')){
				if($data=="" || $data=="4"){
					if($data==""){
						$data0['var'] = array('action'=>'login/pwdre', 'legend'=>'Password Recovery', 'type'=>'email', 'name'=>'email','id'=>'email1','placeholder'=>'Enter Registered Email', 'submit_name'=>'submit0', 'submit_value'=>'Submit Email', 'var'=>'');
					}
					if($data=="4"){
						$data0['var'] = array('action'=>'login/pwdre', 'legend'=>'Password Recovery', 'type'=>'email', 'name'=>'email','id'=>'email1','placeholder'=>'Enter Registered Email', 'submit_name'=>'submit0', 'submit_value'=>'Submit Email', 'var'=>'<div class="alert alert-danger" role="alert"><h5><b>Alert !!! </b></h5><p>Unable to change the password. Either session has expired or server is not responding. Try again later...</p></div>');
					}
					$this->load->view('login/forgot_pass', $data0);
				}
				elseif($data=="10" || $data=="11"){
					$data0['var'] = array('action'=>'login/pwdre', 'legend'=>'Password Recovery', 'type'=>'email', 'name'=>'email','id'=>'email1','placeholder'=>'Enter Registered Email', 'submit_name'=>'submit0', 'submit_value'=>'Submit Email', 'var'=>'<div class="alert alert-danger" role="alert"><h5><b>Alert !!! </b></h5><p>The entered email address is incorrect...</p></div>');
					$this->load->view('login/forgot_pass', $data0);
				}
				elseif($data=="1"){
					if($this->session->tempdata('otp') && $this->session->tempdata('temp1')){
						$this->session->unset_tempdata('temp1');
						$data1['var'] = array('action'=>'login/pwdre', 'legend'=>'Varify OTP', 'type'=>'text', 'name'=>'otp','id'=>'email1','placeholder'=>'Enter 8 digit OTP', 'submit_name'=>'varify', 'submit_value'=>'Submit OTP', 'var'=>'<div class="alert alert-info" role="alert"><h5><b>Message !!! </b></h5><p>OTP has been sent to your registered email. Do not refresh the page. Your session will expire after 5 min. Hurry !!!...</p></div>');
						$this->load->view('login/forgot_pass', $data1);
					}
					else{
						redirect('login/pre');
					}
				}
				elseif($data=="2" || $data=="3"){
					if($this->session->tempdata('otp')){
						$this->session->unset_tempdata('otp');
						if($this->session->tempdata('temp')){
							if($data=="2"){
								$data0['var'] = '<div class="alert alert-info" role="alert"><h5><b>Message !!! </b></h5><p>Please enter your new password. Do not refresh the page. Your session will expire after 5 min. Hurry !!!...</p></div>';
							}
							if($data=="3"){
								$data0['var'] = '<div class="alert alert-danger" role="alert"><h5><b>Alert !!! </b></h5><p>Password and confirm password does not match try again...</p></div>';
							}
							$this->load->view('login/new_pass', $data0);
						}
						else{
							redirect('login/pre/1');
						}
					}
					else{
						redirect('login/pre');
					}
				}
				else{
					redirect('/');
				}
			}
			else{
				redirect('/');
			}
		}


		//comtroller for submitting different password recovery pages
		//***********************************************************

		public function pwdre(){
			if(!$this->session->userdata('oauth_uid')){
				if(isset($_POST['submit0'])){
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
					if($this->form_validation->run() == true){
						$result=$this->Login_model->varify_email();
						if($result){
							$result = json_decode(json_encode($result), True);
							$result1 = $result[0]['email'];
							$session = $this->session->set_userdata(array('email'=>$result1));
							$otp = rand(0,100000000);
							$this->session->set_tempdata('otp', $otp, 300);
							$this->session->set_tempdata('temp1', 'temp1', 300);
							redirect('login/pre/1');
						}
						else{
							redirect('login/pre/10');
						}
					}
					else{
						redirect('login/pre/11');
					}
				}
				if(isset($_POST['varify'])){
					$otp = $this->input->post('otp');
					$session = $this->session->tempdata();
					$temp = rand(0,1000);
					$this->session->set_tempdata('temp', $temp, 300);
					//if($otp == $session['otp']){
						redirect('login/pre/2');
					/*}
					else{
						redirect('login/pwdre/12');
					}*/
				}
				if(isset($_POST['proceed'])){
					$this->form_validation->set_rules('pass','Password','required');
					$this->form_validation->set_rules('confpass','ConfirmPassword','required');
					if($this->form_validation->run()==true){
						$pass = $this->input->post('pass');
						$confpass = $this->input->post('confpass');
						if($pass==$confpass){
							$uid = $this->session->userdata('email');
							$result = $this->Login_model->new_pass($pass, $uid);
							if($result){
								redirect('login/view/3');
							}
							else{
								redirect('login/pre/4');
							}
						}
						else{
							redirect('login/pre/3');
						}
					}
					else{
						redirect('login/pre/2');
					}
				}
				else{
					redirect('login/pre/');
				}
			}
			else{
				redirect('/');
			}	
		}


		//controller for registering in the app
		//*************************************

		public function register($var=""){
				if($var == ""){
					$this->load->view('login/register/index');
				}
				else{
					$data['data'] = $this->Login_model->registration_data($var);
					$this->load->view('login/register/index', $data);
				}
			
		}
		public function register_now(){
			$submit = $this->input->post('submit');
			if(isset($submit)){
				$this->load->library('form_validation');
				/*if(!$this->session->userdata('status')){
					$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha|min_length[2]');
					$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|alpha|min_length[3]');
					$this->form_validation->set_rules('email','Email', 'trim|required|valid_email');
				}*/
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
				$this->form_validation->set_rules('gender', 'Gender', 'trim|required|alpha|min_length[3]');
				$this->form_validation->set_rules('year', 'Year', 'trim|required|numeric|min_length[3]');
				$this->form_validation->set_rules('month', 'Month', 'trim|required|alpha|min_length[3]');
				$this->form_validation->set_rules('day', 'Day', 'trim|required|numeric|min_length[1]');
				$this->form_validation->set_rules('collegename', 'College Name', 'trim|required|min_length[3]');
					if($this->form_validation->run() == true){
						$password = $this->input->post('password');
						$confirm_password = $this->input->post('confirm_password');
						$gender = $this->input->post('gender');
						$year = $this->input->post('year');
						$month = $this->input->post('month');
						$day = $this->input->post('day');
						$collage_name = $this->input->post('collegename');
						if($this->session->userdata('oauth_uid')){
							$firstname = $this->session->userdata('first_name');
							$lastname = $this->session->userdata('last_name');
							$email = $this->session->userdata('email');
							$salt = rand(1,100000);
							$data = array(
										'first_name' => $firstname,
										'last_name' => $lastname,
										'email' => $email,
										'password' => $password,
										'gender' => $gender,
										'dob' => $day.' '.$month.' '.$year,
										'college' => $collage_name,
										'status' => 1,
										'identity' => md5(uniqid($salt, true)));
							echo '1';
							$date_success['success'] = $this->Login_model->create_new_user($data);
							if($date_success['success'] == false){
								redirect('/');
							}
							else{
								redirect('home/');
							}
						}
						else{
							$firstname = $this->input->post('firstname');
							$lastname = $this->input->post('lastname');
							$email = $this->input->post('email');
							$date = getdate();
							$salt = rand(1,100000);
							$oauth_uid = $date[0].$salt.$date['year'];
							$identity = md5(uniqid($salt, true));
							$data = array(
										'oauth_provider' => 'sisystem',
										'oauth_uid' => $oauth_uid,
										'identity' => $identity,
										'first_name' => $firstname,
										'last_name' => $lastname,
										'email' => $email,
										'gender' => $gender,
										'password' => $password,
										'dob' => $day.' '.$month.' '.$year,
										'college' => $collage_name,
										'status' => 1);
							$date_success['success'] = $this->Login_model->create_new_user($data);
							if($date_success['success'] == false){
								redirect('/');
							}
							else{
								redirect('home/');
							}
						}
				}
				else{
					redirect('/');
				}
			}
			else{
				redirect(base_url());
			}
		}

		//controller for varifying username and password while login
		//**********************************************************

		public function check(){
			//echo "piyush";
			if(isset($_POST['submit'])){
				//echo "PIYU";
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() == false){
				redirect('login/error/1');
				}
			else{
				$result = $this->Login_model->create();
				//echo "Piyush";
				if(isset($_POST['remember'])){
					//echo "pi123456";
					$this->load->helper('cookie');
					$cookie = $this->input->cookie('__sESSION');
					$this->input->set_cookie('__sESSION', $cookie, '63072000');
				}
				$result = json_decode(json_encode($result), True);
				$session = $this->session->set_userdata($result[0]);
				if($result){
					redirect('home/');
				}
				else{
					redirect('login/error/2');
				}
			}
		}
		}
	}
?>