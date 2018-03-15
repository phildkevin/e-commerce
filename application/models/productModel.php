	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model{

		public function getProducts(){
    	$query = "SELECT * FROM tbl_product";
    	return $this->db->query($query);
    }

		public function getProduct($productID){
    	$query = "SELECT * FROM tbl_product WHERE product_id = ?";
    	return $this->db->query($query, [$productID]);
  	}

		public function checkProduct($product_code, $productID){
    	$where  = "";
	    $data[] = $product_code;
	    if(is_numeric($productID)){
	      $where  = "AND product_id != ?";
	      $data[] = $productID;
	    }

	    $query  = "SELECT * FROM tbl_product WHERE product_code = ? $where";
	    return $this->db->query($query, $data);
		}

		public function addProduct($data){
    	$query = "INSERT INTO tbl_product (product_code, product_name, product_price, product_stock) VALUES(?, ?, ?, ?)";
    	$this->db->query($query, $data);
    }

		public function editProduct($data){
    	$query = "UPDATE tbl_product SET product_code = ?, product_name = ?, product_price = ?, product_stock = ? WHERE product_id = ?";
    	$this->db->query($query, $data);
    }

		public function deleteProduct($productID){
			$query = "DELETE FROM tbl_product WHERE product_id = ?";
			return $this->db->query($query, $productID);
		}


}

?>
