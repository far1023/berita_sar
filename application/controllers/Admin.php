<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
	}

	public function index() {
		$data['title'] = 'List Admin';
		$data['tambah_admin'] = 'admin/add';
		$data['admin'] = $this->Madmin->read();
		$this->load->view('backoffice/admin', $data);
	}

	public function add() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[admin.email]|valid_email');
		$this->form_validation->set_rules('user', 'Username', 'trim|required|is_unique[admin.username]');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('role', 'fieldlabel', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->flashdata('error', 'Terjadi kesalahan');
			redirect('admin');
		} else {
			$data = array(
				'email'		=> set_value('email'),
				'username'	=> htmlspecialchars(set_value('user')),
				'password'	=> password_hash(set_value('pass'), PASSWORD_DEFAULT),
				'role'		=> set_value('role'),
				'aktif'		=> 1
			);
			$this->Madmin->create($data);
			$this->session->set_flashdata('done', 'Data berhasil ditambahkan.');
			redirect('admin');
		}
	}

	public function hapus($key) {
		$this->Madmin->delete($key);
		redirect('admin');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */