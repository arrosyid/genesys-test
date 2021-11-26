<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
  }

  public function index()
  {
    //untuk memverifikasi sesi login
    (new IonAuth)->verified_access(true);

    //validation rules
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|required');

    if ($this->form_validation->run() == FALSE) {
      $data['tittle'] = 'Halaman Login';

      $this->load->view('template/login_header', $data);
      $this->load->view('auth/login');
      $this->load->view('template/login_footer');
    } else {
      //validasi sukses
      $this->_login();
    }
  }

  private function _login()
  {
    $username = htmlspecialchars($this->input->post('username', true));
    $password = htmlspecialchars($this->input->post('password', true));
    $user = $this->m_user->getUserByUsername($username);
    // var_dump($user);
    // die;

    if ($user) {
      if ($user['status'] == 1) {
        //cek password
        if (password_verify($password, $user['password'])) {
          //menyiapkan data pada session
          $data = [
            'id_user' => $user['id_user'],
            'username' => $user['username'],
            'level' => $user['level']
          ];
          //multiuser LOGIN
          $this->session->set_userdata($data);
          redirect('admin');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Password anda salah.</div>');
          redirect('Auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				Username tidak aktif.</div>');
        redirect('Auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			Username tidak terdaftar.</div>');
      redirect('Auth');
    }
  }
  public function registrasi()
  {
    //untuk memverifikasi sesi login
    (new IonAuth)->verified_access(true);

    //validation rules
    $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_akun.username]');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
      'min_length' => 'password terlalu pendek!',
      'matches' => 'password tidak sama!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $data['tittle'] = 'Halaman Registrasi';

      $this->load->view('template/login_header', $data);
      $this->load->view('auth/registrasi');
      $this->load->view('template/login_footer');
    } else {
      //validasi sukses
      $data_akun = [
        'username' => htmlspecialchars($this->input->post('username')),
        'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
        'date_created' => time(),
        'level' => 1,
        'status' => 1
      ];
      if ($this->db->insert('tb_akun', $data_akun)) {
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Akun Berhasil Ditambahkan</div>');
        redirect('Auth');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Akun Gagal Ditambahkan</div>');
        redirect('Auth');
      }
    }
  }
  // logout
  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('level');

    $this->session->set_flashdata('message', '<div class="alert alert-success" 
			role="alert alert-success"> Anda sudah keluar </div>');
    redirect('Auth');
  }
}
