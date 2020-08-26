<?php 
class Dashboard extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->logged_in();
		 
	}


	private function logged_in(){
		if(! $this->session->userdata('authenciated')){
			$this->session->set_flashdata('sessioncheck','you have to login for accessing this part! do not access this part directly! :)');
			redirect('users/login');

		}
	}

	


	public function index(){

				$data['title'] = 'Welcome to dash!';
				$this->load->view('templates/header');
				$this->load->view('dashboard/index',$data);
				$this->load->view('templates/footer');
	}
}
?>