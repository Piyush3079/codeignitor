<?php
	class Home_model extends CI_Model{
		public function home($uid){
			$query = $this->db->query("SELECT oauth_provider, first_name, last_name, email, picture FROM users WHERE oauth_uid='$uid'");
			$result = $query->result_array();
			return $result;
		}
		public function profile_all($uid){
			$query1 = $this->db->query("SELECT oauth_uid, oauth_provider, identity, first_name, last_name, email, picture FROM users WHERE oauth_uid='$uid'");
			$result1 = $query1->result_array();
			$data2 = $this->db->query("SELECT * FROM profile_general WHERE oauth_uid='$uid'");
			$result2 = $data2->result_array();
			$data3 = $this->db->query("SELECT * FROM profile_acad WHERE oauth_uid='$uid'");
			$result3 = $data3->result_array();
			$data4 = $this->db->query("SELECT * FROM users WHERE oauth_uid IN (SELECT friend_2 FROM friends WHERE friend_1='$uid' AND status='0' ORDER BY score DESC) UNION SELECT * FROM users WHERE oauth_uid IN (SELECT friend_1 FROM friends WHERE friend_2='$uid' AND status='0'  ORDER BY score DESC) LIMIT 4");
			$result4 = $data4->result_array();
			$result = array();
			$result = array('data1' => $result1,
							'data2' => $result2,
							'data3' => $result3,
							'data4' => $result4);
			return $result;
		}
		public function connect($uid){
			$query = $this->db->query("SELECT * FROM users");
			$result = $query->result_array();
			if($query->num_rows() > 0){
				return $result;
			}
		}
	} 
?>