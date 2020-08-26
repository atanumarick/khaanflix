<?php
class Posts extends CI_Controller {

		public function __construct(){
        parent::__construct();
        $this->load->model('postm');
        $this->load->model('commentm');         
     }

	public function index(){
		$data['title'] = 'Latest Posts';
		$data['posts'] = $this->postm->get_posts();		

		$this->load->view('templates/header');
		$this->load->view('posts/index',$data);
		$this->load->view('templates/footer');

	}

	public function view($slug = NULL){
		$data['posts'] = $this->postm->get_posts($slug);
		$post_id =$data['posts']['id'];
		$data['comments'] = $this->commentm->get_comments($post_id);
		
		if(empty($data['posts'])){
			show_404();
		}
		$data['title'] =$data['posts']['title'];
		$this->load->view('templates/header');
		$this->load->view('posts/view',$data);
		$this->load->view('templates/footer');

	}

	public function create(){
		$data['title'] = 'create post';
		$data['categories'] = $this->postm->getCategories();


		$this->form_validation->set_rules('title', 'Title', 'required');

		$this->form_validation->set_rules('body', 'Body', 'required');
		if ($this->form_validation->run() == FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/create',$data);
				$this->load->view('templates/footer');
		}else{
			// upload image
			 $config['upload_path']   = './uploads/'; 
			 $config['allowed_types'] = 'gif|jpg|png|mp4';

			 $this->load->library('upload',$config);
			 if(!$this->upload->do_upload()){

			 	$errors = array('error' => $this->upload->display_errors());
			 	$post_image = 'noimage.jpg';

			 }else{
			 	$data = array('upload_data' => $this->upload->data());
			 	$post_image = $_FILES['userfile']['name'];

			 }


			 $this->session->set_flashdata('data','data been added!');
			 $this->postm->create_post($post_image);
			
			redirect('posts');
		}
                
	}

	public function delete($id){
		$this->postm->delete_post($id);
		$this->session->set_flashdata('deltedata','data has been deleted!');
		redirect('posts');
	}
	public function editform($slug){
		// $data['title'] ='editform';
		// $data['particulardata'] = $this->postm->getparticularResult($id);
		$data['posts'] = $this->postm->get_posts($slug);
		$data['categories'] = $this->postm->getCategories();
		// print_r($data['posts']);exit;
		if(empty($data['posts'])){
			show_404();
		}
		// echo "<pre>";print_r($data['particulardata']);exit;
		$this->load->view('templates/header');
		$this->load->view('posts/editform',$data);
		$this->load->view('templates/footer');

	}

	public function update(){
		$this->postm->update();
		$this->session->set_flashdata('updatedata','data has been updated!!');
		redirect('posts');
	}
	

}

?>