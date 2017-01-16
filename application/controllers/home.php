<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller{
		public function index(){
			if(!file_exists(APPPATH.'views/home/index.php')){
				show_404();
			};
			$uid = $this->session->userdata('oauth_uid');
			$data['data'] = $this->Home_model->home($uid);
			$this->load->view('home/index', $data);
		}
		public function me($uid){
			$identity = $this->session->userdata('identity');
			$data['data'] = $this->Home_model->profile_all($uid);
			$check_identity = $data['data']['data1'][0]['identity'];
			if($identity != $check_identity){
				redirect('view/profile/'.$uid);
				//echo "Piyush";
			}
			else{//echo "tatti";
				//$uid = $this->session->userdata('oauth_uid');
				$this->load->view('home/profile/index', $data);
			}
		}
		public function connect(){
			$uid = $this->session->userdata('oauth_uid');
			$data['var'] = 1;
			$data['data'] = $this->Home_model->connect($uid);
			$this->load->view('home/connect/index', $data);
			//echo '<pre>';print_r($data['data']);echo '</pre>';
		}
		/*public function blog(){
			$uid = $this->session->userdata('oauth_uid');
			$this->load->view('home/blog/index');
		}*/
		public function invite(){
			$uid = $this->session->userdata('oauth_uid');
			$this->load->view('home/invite/index');
		}
		public function social(){
			$uid = $this->session->userdata('oauth_uid');
			$this->load->view('home/social/index');
		}
	}
?>