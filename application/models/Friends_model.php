<?php
	class Friends_model extends CI_Model{
		public function get_friends($uid){
			$query1 = $this->db->query("SELECT oauth_uid FROM users WHERE oauth_uid NOT IN (SELECT friend_2 FROM friends WHERE friend_1='$uid')");
			$result1 = $query1->result_array();
			return $result1;
		}
		public function request($uid_mine, $uid_other){
			$query = $this->db->query("SELECT * FROM requests WHERE (request_1='$uid_mine' AND request_2='$uid_other') OR (request_1='$uid_other' AND request_2='$uid_mine')");
			$result = $query->result_array();
			if($query->num_rows() > 0){
				return array('success' => false,
							 'data' => $result[0]['status']);
			}
			else{
				$query = $this->db->query("INSERT INTO requests (request_1, request_2, status) VALUES ('$uid_mine', '$uid_other', '0')");
				if($query){
					$data = 1;
					return array('success' => true,
								 'data' => $data);
				}
				else{
					$data = 0;
					return array('success' => true,
								 'data' => $data);
				}
			}
		}
		public function get_requests($uid_mine, $var){
			if($var == 3){
				$query = $this->db->query("SELECT * FROM users WHERE oauth_uid IN (SELECT request_2 FROM requests WHERE request_1='$uid_mine' AND status='0')");
				$result = $query->result_array();
				if($query->num_rows() > 0){
					return $result;
				}
				else{
					return false;
				}
			}
			if($var == 2){
				$query = $this->db->query("SELECT * FROM users WHERE oauth_uid IN (SELECT request_1 FROM requests WHERE request_2='$uid_mine' AND status='0')");
				$result = $query->result_array();
				if($query->num_rows() > 0){
					return $result;
				}
				else{
					return false;
				}
			}
		}
		public function request_action($action, $uid_mine, $uid_other){
			//status details
			//0 is pending
		 	//1 is accepted
			//2 is block
			if($action == "block"){
				$query = $this->db->query("UPDATE requests SET status='2' WHERE request_1='$uid_other' AND request_2='$uid_mine'");
				if($query){
					return array('status' => true,
								 'action' => 'blocked');
				}
				else{
					return false;
				}
			}
			if($action == "accept"){
				$query = $this->db->query("INSERT INTO friends (friend_1, friend_2, status) VALUES ('$uid_mine', '$uid_other', '0')");
				if($query){
					$query = $this->db->query("DELETE FROM requests WHERE request_1='$uid_other' AND request_2='$uid_mine'");
					if($query){
						return array('status' => true,
									 'action' => 'accepted');
					}
					else{
						return array('status' => false);
					}
				}
				else{
					return array('status' => false);
				}
			}
			if($action == "reject"){
				$query = $this->db->query("DELETE FROM requests WHERE request_1='$uid_other' AND request_2='$uid_mine'");
				if($query){
					return array('status' => true,
								 'action' => 'rejected');
				}
				else{
					return array('status' => false);
				}
			}
			if($action == "cancel"){
				$query = $this->db->query("DELETE FROM requests WHERE request_1='$uid_mine' AND request_2='$uid_other'");
				if($query){
					return array('status' => true,
								 'action' => 'cancelled');
				}
				else{
					return array('success' => false);
				}
			}
		}
		public function get_friends1($uid_mine){
			$query = $this->db->query("SELECT * FROM users WHERE oauth_uid IN (SELECT friend_2 FROM friends WHERE friend_1='$uid_mine' AND status='0') UNION SELECT * FROM users WHERE oauth_uid IN (SELECT friend_1 FROM friends WHERE friend_2='$uid_mine' AND status='0')");
			$result = $query->result_array();
			return $result;
		}
		public function friends_action($action, $uid_mine, $uid_other){
			if($action == "block"){
				$query = $this->db->query("UPDATE friends SET status='2' WHERE (friend_2='$uid_mine' AND friend_1='$uid_other') OR (friend_1='$uid_mine' AND friend_2='$uid_other')");
				if($query){
					return array('status' => true,
								 'action' => 'blocked');
				}
				else{
					return array('success' => false);
				}
			}
			if($action == "cancel"){
				$query = $this->db->query("DELETE FROM friends WHERE (friend_1='$uid_mine' AND friend_2='$uid_other') OR (friend_1='$uid_other' AND friend_2='$uid_mine')");
				if($query){
					return array('success' => true,
								 'action' => 'unfriended');
				}
				else{
					return array('success' => false);
				}
			}
		}
	}
?>