<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('level') != 1) {
      (new IonAuth)->verified_access(false);
    }
    $this->load->model('m_inventory');
    $this->load->model('m_transaksi');
  }

  public function index()
  {
    // echo 'login Berhasil';
    // echo '<a href="' . base_url('auth/logout') . '"> keluar</a>';
    $data['tittle'] = 'Daftar Inventory';
    $data['inventory'] = $this->m_inventory->getAllInventory();


    $this->load->view('template/header_template', $data);
    $this->load->view('admin/inventory');
    $this->load->view('template/footer_template');
  }

  public function pembelian()
  {
    $data['tittle'] = 'Pembelian';

    $this->load->view('template/header_template', $data);
    $this->load->view('admin/pembelian');
    $this->load->view('template/footer_template');
  }

  public function penjualan()
  {
    $data['tittle'] = 'Penjualan';

    $this->load->view('template/header_template', $data);
    $this->load->view('admin/penjualan');
    $this->load->view('template/footer_template');
  }
}
