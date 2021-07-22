<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('login', $data);
	}

	public function post_login(){
		$response = array();
		$userName = $this->input->post('userName');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('userName', "UserName", 'trim|required');
		$this->form_validation->set_rules('password', "password", 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$response['status'] = 0;
			$response['msg'] = validation_errors('<div class="error">', '</div>');
		} else {
			$results= $this->login_model->login_check($userName);
			if(password_verify($password,$results->password)){
				$this->session->set_userdata(array('user'=>$results->id));
				$response['status'] = 1;
				$response['msg'] = " Successfully Logged In.";
			}else{
				$response['status'] = 0;
				$response['msg'] = "Incorrect UserName or Password!";
			}
		}
		echo json_encode($response);
	}
}
