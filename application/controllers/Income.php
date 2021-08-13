<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Income extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('client_model');
		$this->load->model('income_model');
	}
	public function income()
	{
		if(isset($_POST['income_submit'])){
			$b = $_POST['date'];
			$week = date("W", strtotime($b));
			
			$data = array(
				"income_heading" => $_POST['income_heading'],
				"amount"		 => $_POST['amount'],
				"date"			 => $_POST['date'],
				"client_id"      => $_SESSION['user']->client_id,
				"week"			 => $week,
				"created_at"     => date('Y-m-d'),

			);
			$this->income_model->insert_income($data);
			$this->session->set_flashdata("success","Your transaction was added successfully");
     		redirect("client/dashboard","refresh");
		}
		$this->load->view('templates/header');
		$this->load->view('income/client_income_insert');
		$this->load->view('templates/footer');
	}

	public function client_income(){
		$data = array();
		$h = $_SESSION['user']->client_id;
		$data['income'] = $this->income_model->show_client_income($h);

		$this->load->view('templates/header');
		$this->load->view('income/client_income', $data);
		$this->load->view('templates/footer');	
	}

	public function edit($id){
		$h = $_SESSION['user']->client_id;
		if(isset($_POST['edit']))
     	{	
     		$data = array(
     			'client_id' => $h,
     			'income_heading' => $_POST['income_heading'],
     			'amount' => $_POST['amount'],
     			'date' => $_POST['date'],
     			'updated_at'=> date('Y-m-d'),
     		);
     		
     		$this->income_model->update_income($data,$id);
     		$this->session->set_flashdata("success","Your transaction has been updated.");
     		redirect("client/dashboard","refresh");
     		
     	}
          
          $data['income'] = $this->income_model->get_single_client_income($id);
                    
		$this->load->view('templates/header');
		$this->load->view('income/client_income_edit',$data);
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
		$data['income'] = [];
        $data['message'] = '';
		if(isset($_POST['report']))
     	{	
     		$y = $_POST['year'];
     		$m = $_POST['month'];
     		$w = $_POST['week'];
     		if(!empty($_POST['year']) && !empty($_POST['month']) && empty($_POST['week']) )
			{


				$income = $this->income_model->get_month_year_report($y,$m,$id);
				 
                $data['message'] = "For" .$_POST['year']." ".$_POST['month'];		
				
			}
			if(!empty($_POST['year']) && empty($_POST['month']) && !empty($_POST['week'])  )
			{
				
				$income = $this->income_model->get_week_year_report($y,$w,$id);
                $week_array = $this->getSAD($_POST['week'],$_POST['year']);
                $weekst = $week_array['week_start'];
                $weeke = $week_array['week_end'];   				
				$data['message'] = "For Week" .$_POST['week']." ".$_POST['year']."(". $weekst." to ".$weeke.")";	
			}
			if(!empty($_POST['year']) && empty($_POST['month']) && empty($_POST['week']) )
			{

				$income = $this->income_model->get_year_report($y,$id);
						
				$data['message'] = "For" .$_POST['year'];	
			}
			// $users = $model->where('')

               $data['income'] = $income;
          
     	}
          
        $data['years'] = $this->income_model->get_income_years($id);

        
		$this->load->view('templates/header');
		$this->load->view('income/client_income_report',$data);
		$this->load->view('templates/footer');
		
	}

	public function delete($id)
	{
		$this->income_model->delete_income($id);
		$this->session->set_flashdata("success","Your transaction has deleted successfully.");
     		redirect("client/dashboard","refresh");
	}


}