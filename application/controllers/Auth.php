<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Madmin');
	}

	public function index()
	{
		if ($this->session->userdata('level')) {
			redirect('beranda');
		}
		$this->form_validation->set_rules('user', 'Username / Email', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required');
		$this->form_validation->set_rules('captcha', 'Kode Captcha', 'required|trim|callback_passCaptcha');
		$this->load->helper('captcha');

		if ($this->form_validation->run() == FALSE) {
			$data['action']	= site_url('auth');
			$data['title'] 	= 'Halaman Login';
			$data['cap']	= $this->captcha(); // gambar captcha to form_login
			$this->load->view('login', $data);
		} else {
			$valid = $this->Madmin->getLogin(set_value('user'));
			// var_dump($valid);die();
			$password = set_value('pass');
			if(password_verify($password, $valid->password))
			{
				$this->session->unset_userdata('captc');
				$this->session->set_userdata('id', $valid->id_admin);
				$this->session->set_userdata('level', $valid->role);
				$data = array('terakhir_login' => date('Y-m-d H:i:s'));
				$this->Madmin->updatelog($valid->id_admin, $data);
				redirect('beranda');
			} else {
				$this->session->unset_userdata('captc');
				$this->session->set_flashdata('error','Data Login Invalid.');
				redirect('auth');
			}
		}
	}

	// generate captcha
	public function captcha(){
		$data = array(
			'img_path' 	=> './assets/img/captcha/',
			'img_url' 	=> base_url().'assets/img/captcha',
			'expiration'=> 1800,
        	'word_length'   => 4,
        	// 'font_size'     => 44,
			'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255), // border captcha
                'text' => array(100, 100, 100), // isi captcha
                'grid' => array(200, 200, 200) // salt pepper
        )
		);
		$captcha = create_captcha($data);
		$this->session->set_userdata('captc', $captcha['word']);
		return $captcha['image'];
	}

	// cek captcha login
	public function passCaptcha(){
		if ($this->input->post('captcha')==$this->session->userdata('captc')) {
			return TRUE;	
		} else {
			$this->session->set_flashdata('error','Kode Captcha salah.');
			return FALSE;
		}
	}

	public function logout(){
		$data = array('terakhir_login' => date('Y-m-d H:i:s'));
		$this->Madmin->updatelog($this->session->userdata('id'), $data);
		$this->session->sess_destroy();
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */