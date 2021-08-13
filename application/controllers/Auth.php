<?php
class Auth extends CI_Controller {


     public function logout()
     {
          unset($_SESSION);
          session_destroy();
          redirect ("auth/login","refresh");
     }

     public function login()
     {
     	$this->form_validation->set_rules('username','Username','required');
     	$this->form_validation->set_rules('password','Password','required|min_length[8]');
          if(isset($_POST['login']))
          {
          	if($this->form_validation->run() == TRUE)
          	{
          		$username = $_POST['username'];
          		$password = md5($_POST['password']);

          		$this->db->select('*');
          		$this->db->from('clients');
          		$this->db->where(array('username' => $username, 'password' => $password));
          		$query = $this->db->get();
          		$user = $query->row();
                      

          		if(isset($user)){
          			$this->session->set_flashdata("success","You are logged in");

          			$_SESSION['user_logged'] = TRUE;
          			$_SESSION['username'] = $user->username;
                         $_SESSION['user'] = $user;
          			redirect("client/dashboard", "refresh");
          		}
          		else {
          			$this->session->set_flashdata("error","No such account exists");
          			redirect("auth/login","refresh");
          		} 

          	}
          }

          $this->load->view('templates/header');
     	$this->load->view('login');   
     	$this->load->view('templates/footer'); 
     }

     public function register()
     {	

     	if(isset($_POST['register']))
     	{

     		$this->form_validation->set_rules('client_name','Name','required');
     		$this->form_validation->set_rules('username','Username','required|is_unique[clients.username]');
     		$this->form_validation->set_rules('email','Email','required|is_unique[clients.email]');
     		$this->form_validation->set_rules('password','Password','required|min_length[8]');
     		$this->form_validation->set_rules('password_confirm','Confirm Password','required|min_length[8]|matches[password]');
     		if($this->form_validation->run() == TRUE)
     		{
     			$data = array(
     				'username' => $_POST['username'],
     				'email' => $_POST['email'],
     				'address' => $_POST['address'],
     				'client_name' => $_POST['client_name'],
     				'password' => md5($_POST['password']),
     				'created_at'=> date('Y-m-d'),
     			);
     			$this->db->insert('clients', $data);
     			$this->session->set_flashdata("success","Your account has been registered");
     			redirect("auth/register","refresh");
     		}
     	}
     	$this->load->view('templates/header');
     	$this->load->view('register');   
     	$this->load->view('templates/footer');        
     }
}