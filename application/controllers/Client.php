<?php 
class Client extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($_SESSION['user_logged']== FALSE){
			$this->session->set_flashdata("error","Please login first to view this page !");
			redirect("auth/login");
			}
	}
	public function dashboard(){
		$this->load->view('templates/header');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}

	public function profile(){
		if(isset($_POST['edit']))
     	{

     		$this->form_validation->set_rules('client_name','Name','required');
     		// $this->form_validation->set_rules('username','Username','required|is_unique[clients.username]');
     		// $this->form_validation->set_rules('email','Email','required|is_unique[clients.email]');
     		if($_POST['password'] != ''){
     		$this->form_validation->set_rules('password','Password','required|min_length[8]');
     		$this->form_validation->set_rules('password_confirm','Confirm Password','required|min_length[8]|matches[password]');
     	}
     		if($this->form_validation->run() == TRUE)
     		{
     			$data = array(
     				'client_id' => $_SESSION['user']->client_id,
     				'address' => $_POST['address'],
     				'client_name' => $_POST['client_name'],
     				'created_at'=> date('Y-m-d'),
     			);
     			if($_POST['password'] !=''){
     				$data['password'] = md5($_POST['password']);
     			}
     			$this->db->update('clients', $data);
     			$this->session->set_flashdata("success","Your have updated your profile");
     			redirect("client/dashboard","refresh");
     		}
     	}
          $this->db->select('*');
          $this->db->from('clients');
          $this->db->where('client_id',$_SESSION['user']->client_id);
          $query = $this->db->get();
          $user = $query->row();

          $data['user'] = $user;
                    
		$this->load->view('templates/header');
		$this->load->view('profile',$data);
		$this->load->view('templates/footer');
		
	}
}