<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_user extends CI_Model
{
  public function getUserByUsername($data)
  {
    return $this->db->get_where('tb_akun', ['username' => $data])->row_array();
  }
}
