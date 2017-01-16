<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class View extends CI_Controller{
		public function profile($uid){
			$identity = $this->session->userdata('identity');
			$data['data'] = $this->Home_model->profile_all($uid);
			$check_identity = $data['data']['data1'][0]['identity'];
			//echo '<pre>';print_r($data['data']);echo '</pre>';
			if($identity != $check_identity){
				$this->load->view('view_profile/index', $data);
			}
			else{
				redirect('home/me/'.$uid);
			}
		}
	}
?>