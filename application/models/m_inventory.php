<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_inventory extends CI_Model
{
  public function getAllInventory()
  {
    $this->db->get('tb_inventory')->result_array();
  }
}
