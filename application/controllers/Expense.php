<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Expense extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('client_model');
		$this->load->model('expense_model');
	}
	public function expense()
	{
		if(isset($_POST['expense_submit'])){
			$b = $_POST['date'];
			$week = date("W", strtotime($b));
			
			$data = array(
				"exp_heading"    => $_POST['exp_heading'],
				"amount"		 => $_POST['amount'],
				"date"			 => $_POST['date'],
				"client_id"      => $_SESSION['user']->client_id,
				"week"			 => $week,
				"created_at"     => date('Y-m-d'),

			);
			$this->expense_model->insert_expense($data);
			$this->session->set_flashdata("success","Your transaction was added successfully");
     		redirect("client/dashboard","refresh");
		}
		$this->load->view('templates/header');
		$this->load->view('expense/client_expense_insert');
		$this->load->view('templates/footer');
	}

	public function client_expense(){
		$data = array();
		$h = $_SESSION['user']->client_id;
		$data['expense'] = $this->expense_model->show_client_expense($h);

		$this->load->view('templates/header');
		$this->load->view('expense/client_expense', $data);
		$this->load->view('templates/footer');	
	}

	public function edit($id){
		$h = $_SESSION['user']->client_id;
		if(isset($_POST['edit']))
     	{	
     		$data = array(
     			'client_id' => $h,
     			'exp_heading' => $_POST['exp_heading'],
     			'amount' => $_POST['amount'],
     			'date' => $_POST['date'],
     			'updated_at'=> date('Y-m-d'),
     		);
     		
     		$this->expense_model->update_expense($data,$id);
     		$this->session->set_flashdata("success","Your transaction has been updated.");
     		redirect("client/dashboard","refresh");
     		
     	}
          
          $data['expense'] = $this->expense_model->get_single_client_expense($id);
                    
		$this->load->view('templates/header');
		$this->load->view('expense/client_expense_edit',$data);
		$this->load->view('templates/footer');
		
	}
	private function getSAD($week, $year) {
		
		  $dto = new DateTime();
		  $dto->setISODate($year, $week);
		  $ret['week_start'] = $dto->format('Y-m-d');
		  $dto->modify('+6 days');
		  $ret['week_end'] = $dto->format('Y-m-d');
		  return $ret;
		}

	public function report(){
		$id = $_SESSION['user']->client_id;
		$data['expense'] = [];
        $data['message'] = '';
		if(isset($_POST['report']))
     	{	
     		$y = $_POST['year'];
     		$m = $_POST['month'];
     		$w = $_POST['week'];
     		if(!empty($_POST['year']) && !empty($_POST['month']) && empty($_POST['week']) )
			{


				$expense = $this->expense_model->get_month_year_report($y,$m,$id);
				 
                $data['message'] = "For" .$_POST['year']." ".$_POST['month'];		
				
			}
			if(!empty($_POST['year']) && empty($_POST['month']) && !empty($_POST['week'])  )
			{
				
				$expense = $this->expense_model->get_week_year_report($y,$w,$id);
                $week_array = $this->getSAD($_POST['week'],$_POST['year']);
                $weekst = $week_array['week_start'];
                $weeke = $week_array['week_end'];   				
				$data['message'] = "For Week" .$_POST['week']." ".$_POST['year']."(". $weekst." to ".$weeke.")";	
			}
			if(!empty($_POST['year']) && empty($_POST['month']) && empty($_POST['week']) )
			{

				$expense = $this->expense_model->get_year_report($y,$id);
						
				$data['message'] = "For" .$_POST['year'];	
			}
			// $users = $model->where('')

               $data['expense'] = $expense;
          
     	}
          
        $data['years'] = $this->expense_model->get_expense_years($id);

        
		$this->load->view('templates/header');
		$this->load->view('expense/client_expense_report',$data);
		$this->load->view('templates/footer');
		
	}

	public function delete($id)
	{
		$this->expense_model->delete_expense($id);
		$this->session->set_flashdata("success","Your transaction has deleted successfully.");
     		redirect("client/dashboard","refresh");
	}


}