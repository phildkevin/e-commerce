<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checker {

  public function check($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);

    return $data;
  }

  public function coder($string){
    $characters = '0123456789abcdef';
  	$string = '';
  	$max = strlen($characters) - 1;
  	for ($i = 0; $i < 8; $i++) {
  	     $string .= $characters[mt_rand(0, $max)];
  	}

    return $string;

  }



}

?>
