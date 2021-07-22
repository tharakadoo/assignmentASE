<?php
class Login_model extends CI_Model
{
	public function login_check($userName){
		$this->db->select("password,id");
		$this->db->from("users");
		$this->db->where("user_name = ",$userName);

		$query = $this->db->get();
		return $query->row();
	}
}
