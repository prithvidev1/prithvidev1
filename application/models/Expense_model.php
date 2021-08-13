<?php
class Expense_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert_expense($data){
		$this->db->insert('expenses',$data);
	}

	public function show_client_expense($h){
		$this->db->select("*");
		$this->db->from('expenses');
		$this->db->where('client_id',$h);
		$query = $this->db->get();
		return $result = $query->result();
	}

	public function get_single_client_expense($id){
		$this->db->select("*");
		$this->db->from('expenses');
		$this->db->where('exp_id',$id);
		$query = $this->db->get();
		return $result = $query->row();
	}

	public function update_expense($data,$id){
		$this->db->where('exp_id',$id);
		$this->db->update('expenses',$data);
		return TRUE;
	}
	public function delete_expense($id){
		$this->db->where('exp_id',$id);
		$this->db->delete('expenses');
	}

	public function get_expense_years($id){
		$this->db->select("*");
		$this->db->from('expenses');
		$this->db->where('client_id',$id);
		$this->db->group_by('YEAR(date)');
		$query = $this->db->get();
		return $result = $query->result();
	}

	public function get_month_year_report($y,$m,$id)
	{
		$this->db->select("*");
		$this->db->from('expenses');
		$this->db->where('client_id',$id);
		$this->db->like('date',$y.'-'.$m);
		$query = $this->db->get();
		return $result = $query->result();	
	}

	public function get_year_report($y,$id)
	{
		$this->db->select("*");
		$this->db->from('expenses');
		$this->db->where('client_id',$id);
		$this->db->like('date',$y);
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function get_week_year_report($y,$w,$id)
	{
		$this->db->select("*");
		$this->db->from('expenses');
		$this->db->where('client_id',$id);
		$this->db->where('week',$w);
		$this->db->like('date',$y);
		$query = $this->db->get();
		return $result = $query->result();
	}
}