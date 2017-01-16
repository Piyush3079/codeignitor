<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Profile extends CI_Controller{
		public function add_details($uid){
			$data = $_GET['name'];
			$value = $_GET['value'];
			/*$this->load->model('Profile_model');
			$result = $this->Profile_model->add_details($value, $uid);*/
			//$data = "Piyush";
			$result = array('data' => $data, 'value' => $value, 'uid' => $uid);
			echo json_encode($result);
		}
		public function profile_all($uid){
			$data1 = $this->Home_model->profile_all($uid);
			echo json_encode($data1);
		}
	} 
?>