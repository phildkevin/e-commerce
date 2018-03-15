<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function view(){
    $data['title']  = "Products";
    $data['icon']   = "fa fa-shopping-bag";

		if(!isset($this->session->userdata['email_login'])){
			redirect('admin');
		}else{
			$this->load->view('templates/header-admin', $data);
			$this->load->view('admin/products');
			$this->load->view('templates/footer-admin');
		}

	}

	public function getItems(){
		$data = null;
		$this->load->model('productModel');
		$result = $this->productModel->getItems();
		if ($result->num_rows() > 0) {
			$data = $result->result_array();
		}
		echo json_encode($data);
	}

  public function getProducts(){
		$data = null;
		$this->load->model('productModel');
		$result = $this->productModel->getProducts();
		if ($result->num_rows() > 0) {
			$data = $result->result_array();
		}
		echo json_encode($data);
	}

  public function getProduct(){
		$data = null;
		$productID = $this->input->post('productID');
		$this->load->model('productModel');
		$result = $this->productModel->getProduct($productID);
		if ($result->num_rows() > 0) {
			$data = $result->row_array();
		}
		echo json_encode($data);
	}

  public function addProduct(){

		$this->load->library('checker');

		$config = array(
			'upload_path'    => './assets/images/uploads/',
			'allowed_types'  => 'jpg|png|jpeg',
			'max_size'       => 5000,
			'max_width'      => 5000,
			'max_height'     => 5000,
		);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('product_img')){
						$error = array('error' => $this->upload->display_errors());
						$return['message'] = $error;
						$image = "";
		}else{
						$data = array('upload_data' => $this->upload->data());
						$image = $_FILES['product_img']['name'];
		}

		$product_code    = $this->checker->check($this->input->post("product_code"));
		$product_name    = $this->checker->check($this->input->post("product_name"));
		$product_desc    = $this->checker->check($this->input->post("product_desc"));
		$product_price   = $this->checker->check($this->input->post("product_price"));
		$product_stock   = $this->checker->check($this->input->post("product_stock"));
		$product_img     = $this->checker->check($image);
		$productID       = $this->input->post("productID");

		$return['message'] = "Oops something went wrong!";
		$return['type']	   = "error";
		$return['status']  = 0;

		$this->form_validation->set_rules('product_code', 'Product Code', 'required');
		$this->form_validation->set_rules('product_name', 'Product Name', 'required');
		$this->form_validation->set_rules('product_price', 'Product Price', 'required');
		$this->form_validation->set_rules('product_stock', 'Product Stock', 'required');

			if ($this->form_validation->run() == FALSE){
				$return['message'] =  validation_errors();
			}else{
				$this->load->model('productModel');

				$result = $this->productModel->checkProduct($product_code, $productID);

				if ($result->num_rows() > 0) {
					$return['message'] = "Product is already exist!";
				}else{

				if (is_numeric($productID)) {
					$data = [$product_code, $product_name, $product_desc, $product_price, $product_stock];
					$data[] = $productID;
					$this->productModel->editProduct($data);
					$return['message'] = "Product successfully updated!";
				} else{
					$data = [$product_code, $product_name, $product_desc, $product_price, $product_stock, $product_img];
					$this->productModel->addProduct($data);
					$return['message'] = "Product successfully added!";
				}

					$return['status'] = 1;
					$return['type'] = "success";
				}

			}

		echo json_encode($return);

	}

  public function deleteProduct(){
		$productID = $this->input->post("productID");
		$this->load->model('productModel');

		$return['message'] = "Oops something went wrong!";
		$return['type']	   = "error";

		$this->productModel->deleteProduct($productID);
		if ($this->db->affected_rows() > 0) {
			$return['message'] = "Account successfully deleted!";
			$return['type']		 = "success";
		}
		echo json_encode($return);
	}





}

?>
