<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{

	public function loginProcess($data){
		$sql = "SELECT user_email FROM tbl_user WHERE user_email = ? AND user_password = ?";
		return $this->db->query($sql, $data);
	}

}

?>
