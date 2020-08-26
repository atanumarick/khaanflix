<?php
class Postm extends CI_Model{
	

	public function get_posts($slug = FALSE){

		if($slug == FALSE){
			$this->db->order_by("posts.id", "desc");
			$this->db->join('categories','categories.id=posts.category_id');
			$query = $this->db->get('posts');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('posts',array('slug'=>$slug));
		return $query->row_array();

	}

	public function create_post($post_image){
		$slug =url_title($this->input->post('title'));

		$data = array(
			     'title'=>$this->input->post('title'),
			     'slug'=>$slug,
			     'body'=>$this->input->post('body'),
			     'category_id'=>$this->input->post('category_id'),
			     'upload_moovie_image' => $post_image
		       );

		 $this->db->insert('posts',$data);
		 return $this->db->insert_id();
	}

	public function delete_post($id){
		$this->db->where('id',$id);
		$this->db->delete('posts');
		return true;
	}

	// public function getparticularResult($id){
	// 	$query = $this->db->get_where('posts',array('id'=>$id));
	// 	return $query->row();
	// }

	public function update(){
		
		$slug =url_title($this->input->post('title'));
		$data = array(
			     'title'=>$this->input->post('title'),
			     'slug'=>$slug,
			     'body'=>$this->input->post('body'),
			     'category_id'=>$this->input->post('category_id')
		       );
		$this->db->where('id',$this->input->post('id'));
		$query = $this->db->update('posts',$data);
		return $query;

	}

	public function getCategories(){
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result();
	}

	public function get_posts_by_category($category_id){
		$this->db->order_by("posts.id", "desc");
		$this->db->join('categories','categories.id=posts.category_id');
		$query = $this->db->get_where('posts',array('category_id'=>$category_id));
		return $query->result_array();
	}


}
?>