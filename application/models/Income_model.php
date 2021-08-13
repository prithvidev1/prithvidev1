<?php
class Income_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert_income($data){
		$this->db->insert('incomes',$data);
	}

	public function show_client_income($h){
		$this->db->select("*");
		$this->db->from('incomes');
		$this->db->where('client_id',$h);
		$query = $this->db->get();
		return $result = $query->result();
	}

	public function get_single_client_income($id){
		$this->db->select("*");
		$this->db->from('incomes');
		$this->db->where('income_id',$id);
		$query = $this->db->get();
		return $result = $query->row();
	}

	public function update_income($data,$id){
		$this->db->where('income_id',$id);
		$this->db->update('incomes',$data);
		return TRUE;
	}
	public function delete_income($id){
		$this->db->where('income_id',$id);
		$this->db->delete('incomes');
	}

	public function get_income_years($id){
		$this->db->select("*");
		$this->db->from('incomes');
		$this->db->where('client_id',$id);
		$this->db->group_by('YEAR(date)');
		$query = $this->db->get();
		return $result = $query->result();
	}

	public function get_month_year_report($y,$m,$id)
	{
		$this->db->select("*");
		$this->db->from('incomes');
		$this->db->where('client_id',$id);
		$this->db->like('date',$y.'-'.$m);
		$query = $this->db->get();
		return $result = $query->result();	
	}

	public function get_year_report($y,$id)
	{
		$this->db->select("*");
		$this->db->from('incomes');
		$this->db->where('client_id',$id);
		$this->db->like('date',$y);
		$query = $this->db->get();
		return $result = $query->result();
	}
	public function get_week_year_report($y,$w,$id)
	{
		$this->db->select("*");
		$this->db->from('incomes');
		$this->db->where('client_id',$id);
		$this->db->where('week',$w);
		$this->db->like('date',$y);
		$query = $this->db->get();
		return $result = $query->result();
	}
}