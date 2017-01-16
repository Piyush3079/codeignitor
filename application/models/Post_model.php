<?php
	class Post_model extends CI_Model{
		 Public function __construct(){
		 	$this->load->database();
		 }

		 public function get_posts($slug = False){
		 	if($slug == False){
		 		$this->db->order_by('id','desc');
		 		$this->db->limit(20);
		 		$query = $this->db->get('posts');
		 		$result = $query->result_array();
		 		if($query->num_rows()>0){
		 			return $result;
		 		}
		 		else{
		 			return false;
		 		}
		 	}
		 	else{
		 		$query =$this->db->get_where('posts', array('slug' => $slug));
		 		return $query->row_array();	
		 	}
		 }
		 public function create_post($uid, $name){
		 	$slug = url_title($this->input->post('title'));
		 	$data = array(
		 		'oauth_uid' => $uid,
		 		'name' => $name,
		 		'title' => $this->input->post('title'),
		 		'slug' => $slug,
		 		'body' => $this->input->post('body')
		 		);

		 	return $this->db->insert('posts',$data);
		 }
		 public function delete_post($id){
		 	$this->db->where('id', $id);
		 	$this->db->delete('posts');
		 	return true;
		 }
		 public function update_post(){
		 	$slug = url_title($this->input->post('title'));

		 	$data = array(
		 		'title' => $this->input->post('title'),
		 		'slug' => $slug,
		 		'body' => $this->input->post('body')
		 		);
		 	$this->db->where('id', $this->input->post('id'));
		 	return $this->db->update('posts', $data);

		 }
	}