<?php
defined('BASEPATH') OR exit('No direct script access allowed'); //sicherheit erlaubt keinen anderen rein zu imagedashedline
class SQLQuery extends CI_Model {
  public function __construct()
  {
     parent::__construct();
  }



  public function Select($string){
    $query = $this->db->query($string);
    return $query->result_array();

  }

}
