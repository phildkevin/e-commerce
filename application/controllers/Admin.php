<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index(){
			$this->load->view('admin/login');
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		redirect('admin');
	}

	public function loginProcess(){

		$this->load->library('checker');

		$email_login    = $this->checker->check($this->input->post("email_login"));
		$password_login = $this->checker->check($this->input->post("user_password"));

		$return['message'] = "Oops something went wrong!";
		$return['type']	   = "error";
		$return['status']  = 0;

		$this->form_validation->set_rules('email_login', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password_login', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
			$return['message'] = validation_errors();
		}else{

			$this->load->model('loginModel');
			$data = [$email_login, $password_login];

			$result = $this->loginModel->loginProcess($data);
				if ($result->num_rows() > 0) {
					$this->session->set_userdata('email_login', $email_login);
					$return['message'] = "Welcome Administrator!";
					$return['type']	   = "success";
					$return['status']  = 1;
				}else{
					$return['message'] = "Invalid Account!";
				}
		}


		echo json_encode($return);

	}


}

?>
