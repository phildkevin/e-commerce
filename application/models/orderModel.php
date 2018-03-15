	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model{

		public function getOrders(){
    	$query = "SELECT * FROM tbl_order";
    	return $this->db->query($query);
    }

}

?>
