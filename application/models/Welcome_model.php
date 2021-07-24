<?php
class Welcome_model extends CI_Model {

	public function insert_customer_data($data){
		$this->db->insert('users',$data);
		$insert_id=$this->db->insert_id();
		return $insert_id;
	}

	public function insert_order_data($data){
		$this->db->insert('order_details',$data);
		$insert_id=$this->db->insert_id();
		return $insert_id;
	}

	public function sendMail($to,$message)
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_port' => 465,
			'smtp_user' => 'abc@gmail.com', // change it to yours
			'smtp_pass' => '123', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		//$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->from('tharushidoo@gmail.com'); // change it to yours
		$this->email->to($to);// change it to yours
		$this->email->subject('Order placed successfully');
		$this->email->message($message);
		if($this->email->send())
		{
			//echo 'Email sent.';
			return true;
		}
		else
		{
			//show_error($this->email->print_debugger());
			return false;
		}

	}
}
