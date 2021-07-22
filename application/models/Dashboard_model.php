<?php
class Dashboard_model extends CI_Model
{
	public function get_order_details($userId){
		$this->db->select("*");
		$this->db->from("order_details");
		$this->db->where("user_id = ",$userId);

		$query = $this->db->get();
		return $query->result();
	}

	public function get_user_details($userId){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("id = ",$userId);

		$query = $this->db->get();
		return $query->row();
	}
}
