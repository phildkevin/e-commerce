<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function view(){
		$data['title']  = "Dashboard";
    $data['icon']   = "fa fa-dashboard";

		$this->load->view('templates/header-admin', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('templates/footer-admin');

	}


}

?>
