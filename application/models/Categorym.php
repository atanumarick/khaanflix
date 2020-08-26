<?php
class Categorym extends CI_Model{ 
	public function create_category(){
		$data = array('name' => $this->input->post('name'));
		$query = $this->db->insert('categories',$data);
		return $query;
	}
	public function getCategories(){
		$this->db->order_by('id');
		$query = $this->db->get('categories');
		return $query->result();
	}
	public function get_category($id){
		$query = $this->db->get_where('categories',array('id'=>$id));
		return $query->row();
	}

}
?>