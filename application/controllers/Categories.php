<?php
class Categories extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('categorym'); 
        $this->load->model('postm');         
     }

     public function index(){
     	$data['title'] = 'All Categories';
     	$data['cat_details'] = $this->categorym->getCategories();
     	
     	$this->load->view('templates/header');
		$this->load->view('category/index',$data);
		$this->load->view('templates/footer');
     }

	public function create(){
		$data['title'] = 'create Category';
		$this->form_validation->set_rules('name','Category','required');
		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('category/create',$data);
			$this->load->view('templates/footer');
		}else{			
			$cat_data = $this->categorym->create_category();
			redirect('categories');
		}
		
	}

	public function posts($id){
		$data['title'] = $this->categorym->get_category($id)->name;
		$data['posts'] = $this->postm->get_posts_by_category($id);

		$this->load->view('templates/header');
		$this->load->view('posts/index',$data);
		$this->load->view('templates/footer');
	}
} 
?>