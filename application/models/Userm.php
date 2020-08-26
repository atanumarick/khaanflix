<?php
class Userm extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function register($enc_password){
		$data = array(
			      'name'=>$this->input->post('name'),
			      'zipcode'=>$this->input->post('zipcode'),
			      'email'=>$this->input->post('email'),
			      'username'=>$this->input->post('username'),
			      'password'=>$enc_password
		             );

		$query = $this->db->insert('users',$data);
		return $this->db->insert_id();

	}

	public function loginf($email,$password){

		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		$query = $this->db->get('users');
		if($query->num_rows() == 1){
			return $query->row();
		}
		return false;


	}

	public function check_username_exists($username){
		$query = $this->db->get_where('users',array('username'=>$username));
		if(empty($query->row())){
			return true;
		}else{
			return false;
		}

	}
}