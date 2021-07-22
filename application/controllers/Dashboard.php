<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		$userId = $this->session->userdata('user');
		$data['results'] = $this->dashboard_model->get_order_details($userId);
		$data['user'] = $this->dashboard_model->get_user_details($userId);
		$data['title'] = "Dashboard";
		$this->load->view('dashboard', $data);
	}
}
