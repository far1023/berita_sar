<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mdosen');

	}

	public function index(){
		$data['title'] = 'List Dosen';
		$this->load->view('backoffice/dosen', $data);
	}

	public function read(){
		$dt = $this->Mdosen->read();

		foreach ($dt as $value) {
			$aksi= "<a href='".site_url('dosen/edit/'.$value->id_pegawai)."' data-id='".$value->id_pegawai."' class='badge badge-warning'>Edit</a> <a href='javascript:void(0)' data-id='".$value->id_pegawai."' class='badge badge-danger hapus-dosen'>Delete</a>";
			$tbody = array();
			$tbody[] = $value->nip;
			$tbody[] = $value->nama_lengkap;
			$tbody[] = $value->email;
			$tbody[] = $value->username;
			$tbody[] = $value->jekel;
			$tbody[] = $value->no_hp;
			$tbody[] = $value->alamat;
			$tbody[] = $aksi;
			$data[] = $tbody; 
		}

		if ($dt) {
			echo json_encode(array('data'=> $data));
		}else{
			echo json_encode(array('data'=>0));
		}
	}

	public function tambah() {
		$this->form_validation->set_rules('nip',		'NIP',				'trim|required|numeric|is_unique[pegawai.nip]');
		$this->form_validation->set_rules('nama',		'Nama Lengkap',		'trim|required');
		$this->form_validation->set_rules('email',		'Email',			'trim|required|is_unique[pegawai.email]|valid_email');
		$this->form_validation->set_rules('user',		'Username',			'trim|required|alpha_dash|is_unique[pegawai.username]');
		$this->form_validation->set_rules('password',	'Password',			'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('repass', 	'Ulangi Password',	'matches[password]|required');
		$this->form_validation->set_rules('jekel',		'Jenis Kelamin',	'trim|required');
		$this->form_validation->set_rules('no_hp',		'Nomor Hp',			'trim|numeric|required');
		$this->form_validation->set_rules('alamat',		'Alamat',			'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['header']	= "Tambah Dosen";
			$data['title'] 	= "Tambah Dosen";
			$data['action'] = "dosen/tambah";
			$data['dtdosen'] = NULL;
			$this->load->view('backoffice/dosen_form', $data);
		} else {
			$data = array(
				'nip'			=> set_value('nip'),
				'nama_lengkap'	=> htmlspecialchars(set_value('nama')),
				'email'			=> set_value('email'),
				'username'		=> set_value('user'),
				'password'		=> password_hash(set_value('password'), PASSWORD_DEFAULT),
				'jekel'			=> set_value('jekel'),
				'no_hp'			=> set_value('no_hp'),
				'alamat'		=> htmlspecialchars(set_value('alamat')),
			);
			$this->Mdosen->create($data);
			redirect('dosen');
		}
	}

	public function edit($key) {
		$this->form_validation->set_rules('nama',		'Nama Lengkap',		'trim|required');
		$this->form_validation->set_rules('password',	'Password',			'trim|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('repass', 	'Ulangi Password',	'matches[password]');
		$this->form_validation->set_rules('jekel',		'Jenis Kelamin',	'trim|required');
		$this->form_validation->set_rules('no_hp',		'Nomor Hp',			'trim|numeric|required');
		$this->form_validation->set_rules('alamat',		'Alamat',			'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data['header']	= "Edit Dosen";
			$data['title'] 	= "Edit Dosen";
			$data['action'] = "dosen/edit/".$key;
			$data['dtdosen'] = $this->Mdosen->getById($key);
			// var_dump($data['dtdosen']);die();
			$this->load->view('backoffice/dosen_form', $data);
		} else {
			if (set_value('password')) {
				$data = array(
					'nip'			=> set_value('nip'),
					'nama_lengkap'	=> htmlspecialchars(set_value('nama')),
					'email'			=> set_value('email'),
					'username'		=> set_value('user'),
					'password'		=> password_hash(set_value('password'), PASSWORD_DEFAULT),
					'jekel'			=> set_value('jekel'),
					'no_hp'			=> set_value('no_hp'),
					'alamat'		=> htmlspecialchars(set_value('alamat')),
				);
				$this->Mdosen->update($key, $data);
				redirect('dosen');
			} else {
				$data = array(
					'nip'			=> set_value('nip'),
					'nama_lengkap'	=> htmlspecialchars(set_value('nama')),
					'email'			=> set_value('email'),
					'username'		=> set_value('user'),
					'jekel'			=> set_value('jekel'),
					'no_hp'			=> set_value('no_hp'),
					'alamat'		=> htmlspecialchars(set_value('alamat')),
				);
				$this->Mdosen->update($key, $data);
				redirect('dosen');
			}
		}
	}

	public function hapus(){
		$this->Mdosen->delete();
		echo json_encode(array("status" => TRUE));
	}
}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
