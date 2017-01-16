<?php
defined('BASEPATH') or exit ('No direct script access allowed');
	class Admin extends CI_Controller{
		public function index(){
			$password = "Piyush@vijay@1997";
			$username  = "Piyush@19971";
			$this->load->library('bcrypt');
			$data['data1'] = $this->bcrypt->hash_password($password);
			$this->load->model('admin_model');
			$data['data'] = $this->admin_model->login_check($username, $password);
			$this->load->view('admin/login/index', $data);
		}
	}
?>