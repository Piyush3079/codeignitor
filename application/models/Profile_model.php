<?php
	class Profile_model extends CI_Model{
		public function add_details($value, $uid){
			$query = $this->db->query("UPDATE profile_general SET number='$value' WHERE oauth_uid='$uid'");
			//$result = $query->result();
			if($query){
				return var_dump($query);
			}
			else{
				return "FALSE";
			}
		}
	}
?>