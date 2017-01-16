<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Friends extends CI_Controller{
		public function connection_request(){
			$uid_mine = $_GET['uid_mine'];
			$uid_other = $_GET['uid_other'];
			$this->load->model('Friends_model');
			$data = $this->Friends_model->request($uid_mine, $uid_other);
			echo json_encode($data);
		}
		public function get_requests($var){
			$uid_mine = $this->session->userdata('oauth_uid');
			$this->load->model('Friends_model');
			$data['var'] = $var;
			$data['data'] = $this->Friends_model->get_requests($uid_mine, $var);
			if($data['data'] == false){
				$this->load->view('home/connect/index', $data);
			}
			else{
				$this->load->view('home/connect/index', $data);
			}
		}
		public function request_action($var){
			$var_new = explode("_", $var);
			$action = $var_new[0];
			$uid_mine = $this->session->userdata('oauth_uid');
			$uid_other = $var_new[1];
			$this->load->model('Friends_model');
			$data = $this->Friends_model->request_action($action, $uid_mine, $uid_other); 
			print_r($data);
		}
		public function get_friends($uid){
			$this->load->model('Friends_model');
			$data['var'] = 4;
			$data['data'] = $this->Friends_model->get_friends1($uid);
			if($data['data'] == false){
				$this->load->view('home/connect/index', $data);
			}
			else{
				$this->load->view('home/connect/index', $data);
			}
		}
		public function friends_action($var){
			$var_new = explode("_", $var);
			$action = $var_new[0];
			$uid_mine = $this->session->userdata('oauth_uid');
			$uid_other = $var_new[1];
			$this->load->model('Friends_model');
			$data = $this->Friends_model->friends_action($action, $uid_mine, $uid_other);
			print_r($data);
		}
	}
?>