<?php
class Users extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('userm');  
	}
	public function register(){
		$data['title'] = 'Sign Up';
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE){

				$this->load->view('templates/header');
				$this->load->view('users/register',$data);
				$this->load->view('templates/footer');
		}else{
			$enc_password = md5($this->input->post('password'));
			$this->userm->register($enc_password);
			$this->session->set_flashdata('insertdata','account has been created log in to continue!');
		
			redirect('users/login');
		}
                
	}


	public function login(){
		        $data['title'] = 'Login';

				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				if ($this->form_validation->run() == FALSE)
                {
                       
					$this->load->view('templates/header');
					$this->load->view('users/login',$data);
					$this->load->view('templates/footer');
                }else{

                	$email = $this->input->post('email');
                	$password =$this->input->post('password');

                	$user = $this->userm->loginf($email,$password);

                	// echo '<pre>'; print_r($user);exit;
                	if($user){

                		$data = array(
                			'id' => $user->id,
                			'email' =>$user->email,
                			'authenciated' => TRUE
                		);
                		$this->session->set_userdata($data);
                		redirect('dashboard');


                	}else{
                		$this->session->set_flashdata('loginfail','invalid credentials!');
                		redirect('users/login');
                	}
                }

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('users/login');
	}

	// public function check_username_exists($username){
	// 	$this->form_validation->set_message('check_username_exists','that username is taken please choose another one!');
	// 	if($this->userm->check_username_exists($username)){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}

	// }
}
?>