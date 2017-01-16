<?php
	class Posts extends CI_Controller{
		public function index(){
			$data['var'] = 1;
			$data['posts'] = $this->Post_model->get_posts();
			$this->load->view('home/blog/index', $data);
		}
		public function view($slug = NULL){
			$data['var'] = 2;
			$data['posts']=$this->Post_model->get_posts($slug);
			 if($data['posts'] == false){
			 	show_404();
			 }
			 else{
			 	//print_r($data['posts']);
			$this->load->view('home/blog/index', $data);
			}
		} 
		public function create(){
			$data['title'] = 'Create Post';
			$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[10]');
			$uid = $this->session->userdata('oauth_uid');
			$name = $this->session->userdata('first_name').' '.$this->session->userdata('last_name');
			if($this->form_validation->run() === False){
				//$this->load->view('home/blog/headers');
				$this->load->view('home/blog/create', $data);
				//$this->load->view('home/blog/footer');
			}
			else{
			$this->Post_model->create_post($uid, $name);
			redirect('posts');
		}
		}
		public function delete($id){
			$uid = $_GET['id'];
			//echo $id;
			if($uid == $this->session->userdata('oauth_uid')){
				$this->Post_model->delete_post($id);
				
				redirect('posts');
			}
			else{
				redirect('/');
			}
		}
		public function update($slug){
			$data['post']=$this->Post_model->get_posts($slug);
			 if($data['post'] == false){
			 	show_404();
			 }
			 else{
			 	$data['title'] = 'Edit Post';
				//$this->load->view('home/blog/headers');
				$this->load->view('home/blog/update', $data);
				//$this->load->view('home/blog/footer');
			 }
		}
		public function edit(){
			$this->Post_model->update_post();
			redirect('posts');
		}
		
	}

?>