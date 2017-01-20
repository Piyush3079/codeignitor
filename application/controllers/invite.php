<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Invite extends CI_Controller{
		public function get_invite_data(){
			if($this->input->is_ajax_request()){
				$this->form_validation->set_rules('r_email','Email', 'trim|required|valid_email');
				if($this->form_validation->run() == true){
					$r_email = $this->input->post('r_email');
					$s_email = $this->session->userdata('email');
					$s_id = $this->session->userdata('oauth_uid');
					$s_name = $this->session->userdata('first_name').' '.$this->session->userdata('last_name');
					$s_image = $this->session->userdata('picture');
					require 'PHPMailer/PHPMailerAutoload.php';

					$mail = new PHPMailer;

					$mail->isSMTP();                                   // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                            // Enable SMTP authentication
					$mail->Username = 'developer.web1997@gmail.com';          // SMTP username
					$mail->Password = '8824083411'; // SMTP password
					$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 587;                                 // TCP port to connect to

					$mail->setFrom('info@SISystem.com', 'SISystem');
					$mail->addReplyTo('info@SISystem.com', 'SISystem');
					$mail->addAddress($r_email);   // Add a recipient
					//$mail->addCC('cc@example.com');
					//$mail->addBCC('bcc@example.com');

					$mail->isHTML(true);  // Set email format to HTML
					$bodyContent = '<h4>This is a system generated mail. Please do not reply.</h4>';
					$bodyContent .= '<h4>Invitation from '.$s_name.' to join SIsystem</h4>';
					$bodyContent .= '<center><img src="'.$s_image.'" style="width: 120px;height: 120px;border-radius: 100%;"></center><br><br>';
					$bodyContent .= '<div>
						<center><button class="btn btn-info"><a href="'.base_url().'home/me/'.$s_id.'" style="color:black;text-decoration:none;">View Profile</a></button>
						<button class="btn btn-danger" style="margin-left: 45px;"><a href="'.base_url().'login/register" style="color:black;text-decoration:none">Join Now</a></button></center>
					</div><br><br>';
					$bodyContent .= '<p><a href="'.base_url().'home/me/'.$s_id.'" style="text-decoration:none">'.$s_name.' </a> invited you to to join the network of students where you can find new friends and interact with them.</p>';
					$bodyContent .= '<p><a href="'.base_url().'about_us" style="text-decoration:none">SIsystem </a>is developed to create a relationship between different students of different institutes and create a whole new world of youths</p>';
					$bodyContent .= '<p>The application is developed by <a href="'.base_url().'home/me/1136618339788157" style="text-decoration:none">Piyush Vijay </a>';
					$bodyContent .= '<p><b>Regards</b></p>
									<pTeam SIsystem</p>
									<p>Thank you.</p>';
					$mail->Subject = 'Invitation from '.$s_name.' to join SIsystem';
					$mail->Body    = $bodyContent;

					if(!$mail->send()) {
					    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
					} else {
					    echo 1;
					}
				}
				else{
					echo 0;
				}
			}
			else{
				redirect('home/invite');
			}
		}
	}
?>