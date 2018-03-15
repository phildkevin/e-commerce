<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function view(){
    $data['title']  = "Orders";
    $data['icon']   = "fa fa-shopping-cart";

		$this->load->view('templates/header-admin', $data);
		$this->load->view('admin/orders');
		$this->load->view('templates/footer-admin');

	}

  public function getOrders(){
		$data = null;
		$this->load->model('orderModel');
		$result = $this->orderModel->getOrders();
		if ($result->num_rows() > 0) {
			$data = $result->result_array();
		}
		echo json_encode($data);
	}


}

?>
