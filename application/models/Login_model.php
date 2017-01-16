<?php
	class Login_model extends CI_Model{
		public function recover($email){
			$query = $this->db->query("SELECT oauth_uid FROM users WHERE email='".$email."'");
			$result = $query->result();
			if($result){
				return true;
			}
			else{
				return false;
			}
		}
		public function create(){
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);
			$query = $this->db->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
			$result = $query->result();
			if($query->num_rows() > 0){
				return $result;
			}
			else{
				return false;
			}
		}
		public function varify_email(){
			$email = $this->input->post('email', true);
			$query = $this->db->query("SELECT * FROM users WHERE email='$email'");
			$result = $query->result();
			if($query->row()){
				return $result;
			}
			else{
				return false;
			}
		}
		public function new_pass($pass, $uid){
			$query = $this->db->query("UPDATE users SET password='$pass' WHERE email='$uid'");
			if($query){
				return $query;
			}
			else{
				return false;
			}
		}
		public function registration_data($uid){
			$query = $this->db->query("SELECT * FROM users WHERE oauth_uid='$uid'");
			$result = $query->result_array();
			if($query->num_rows() > 0){
				return $result;
			}
			else{
				return false;
			}
		}
		public function create_new_user($data){
			$oauth_uid = $this->session->userdata('oauth_uid');
			if($oauth_uid){
				$query = $this->db->where('oauth_uid', $oauth_uid);
				$query = $this->db->update('users', $data);
				if($query){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return 'non oauth_uid';
				$query = $this->db->insert('users', $data);
				if($query){
					return true;
				}
				else{
					return false;
				}
			}
		}
	}
?>