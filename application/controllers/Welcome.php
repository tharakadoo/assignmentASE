<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('welcome_model');
	}

	public function index()
	{
		$data['title']="Checkout form";
		$this->load->view('home',$data);
	}

	public function post_checkout(){
		$response = array();
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$email = $this->input->post('email');
		$userName = $this->input->post('userName');
		$address1 = $this->input->post('address1');
		$address2 = $this->input->post('address2');
		$password = $this->input->post('password2');
		$nic = $this->input->post('nic');
		$tp = $this->input->post('tp');

		$pack=$this->input->post('pack');
		$price=$this->input->post('price');
		$quantity=$this->input->post('quantity');
		$subTotal=$this->input->post('subTotal');
		$total=$this->input->post('total');

		$this->form_validation->set_rules('firstName', "First Name", 'trim');
		$this->form_validation->set_rules('lastName', "Last Name", 'trim');
		$this->form_validation->set_rules('email', "Email", 'trim|required|valid_email');
		$this->form_validation->set_rules('userName', "UserName", 'trim|required|min_length[6]');
		$this->form_validation->set_rules('address1', "Address 1", 'trim');
		$this->form_validation->set_rules('address2', "Address 2", 'trim');
		$this->form_validation->set_rules('password1', "Password", 'trim|required|min_length[8]|strong_password_check');
		$this->form_validation->set_rules('password2', "Password Confirmation", 'trim|required|min_length[8]|matches[password1]');
		$this->form_validation->set_rules('nic', "NIC", 'trim|required|nic_check');
		$this->form_validation->set_rules('tp', "Telephone", 'trim|required|tp_check');

		if ($this->form_validation->run() == FALSE) {
			$response['status'] = 0;
			$response['msg'] = validation_errors('<div class="error">', '</div>');
		} else {
			$now = time();
			$post_data=array(
				'first_name' => $firstName,
				'last_name' => $lastName,
				'email' => $email,
				'user_name' => $userName,
				'address1' => $address1,
				'address2' => $address2,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'nic' => $nic,
				'tp' => $tp,
				'total' => $total,
				'created_at' => $now
			);

			$this->db->trans_start();
			$inserted_id= $this->welcome_model->insert_customer_data($post_data);
			$a=0;
			foreach ($pack as $value) {
				$order_data=array(
					'user_id' => $inserted_id,
					'package' => $a+1,
					'price' => $price[$a],
					'quantity' => $quantity[$a],
					'sub_total' => $subTotal[$a],
					'created_at' => $now
				);
				$this->welcome_model->insert_order_data($order_data);
				$a+=1;
			}
			$this->db->trans_complete();

			//send email
			$msg = "<h3>Your order placed successfully</h3>";
			$msg.= "<table>";
			$msg.= "<tr> <td>Package</td> <td>Price</td> <td>Quantity</td> <td>Sub Total</td> </tr>";
			$b=0;
			foreach ($pack as $value) {
				$c=$b+1;
				$msg.="<tr> <td>Package $c</td> <td>LKR $price[$b]</td> <td>$quantity[$b]</td> <td>LKR $subTotal[$b]</td> </tr>";
				$b+=1;
			}
			$msg.= "</table>";
			$msg.= "<h3>Total = LKR $total</h3>";
			$msg.="<p> Your login UserName is <b>$userName</b></p>";
			$msg.="<p> Your login Password is <b>$password</b></p>";
			$msg.="<p> Please login to the system using above login credentials.</p>";
			$msg.="<small>Thank You</small>";
			//$email_status=$this->welcome_model->sendMail($email,$msg);

			$response['status'] = 1;
			//$response['email_status'] = $email_status;
			$response['id'] = $inserted_id;
			$response['msg'] = " Successfully checked out.";
			$_SESSION["flash"] = array("type" => "success", "message" => "Order Placement Success! Please login to the system using your UserName and Password");
		}
		echo json_encode($response);
	}

	public function nic_check2($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('nic_check', 'The {nic} field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
