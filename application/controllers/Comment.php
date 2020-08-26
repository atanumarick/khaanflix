<?php
class Comment extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('commentm');
		$this->load->model('postm');   

	}
	public function create($post_id){
		$slug = $this->input->post('slug');
		$data['posts'] = $this->postm->get_posts($slug);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/view',$data);
				$this->load->view('templates/footer');
		}else{
			$this->commentm->create_comment($post_id);
			redirect('posts/'.$slug);
		}

	}
}
?>