<?php
	class Admin_model extends CI_Model{
		public function login_check($username, $password){
			$query = $this->db->query("SELECT * FROM admin WHERE username='$username'");
			$result = $query->result_array();
			if($query->num_rows() > 0){
				$password_stored = $result[0]['password'];
				if($this->bcrypt->check_password($password, $password_stored)){
					return true;
				}
			}
			else{
				return false;
			}
		}
	}

?>