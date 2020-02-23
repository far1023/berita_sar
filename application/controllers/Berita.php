<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mberita');
		$this->load->model('Mtags');
		if (!$this->session->userdata('level')) {
			redirect('auth');
		}
	}

	public function index() {
		$data['berita'] = $this->Mberita->read();
		$data['title']	= 'List Berita';

		$this->load->view('backoffice/berita', $data);
	}

	public function count_checkbox($dt){
		if (count($this->input->post('tags'))>0) {
			return TRUE;
		} else {
			$this->form_validation->set_message('count_checkbox', 'Wajib pilih satu');
			return FALSE;
		}
	}

	public function tambah(){
		$this->form_validation->set_rules('judul',	'Judul Berita',	'trim|required');
		$this->form_validation->set_rules('isi',	'Isi Berita',	'trim|required');
		$this->form_validation->set_rules('tags[]',	'Tag Berita',	'callback_count_checkbox');
		$this->form_validation->set_rules('user[]',	'User',			'callback_count_checkbox');

		if ($this->form_validation->run() == FALSE) {
			$data['tags'] 	= $this->Mtags->read();
			$data['header']	= 'Tambah Berita';
			$data['title'] 	= "Tambah Berita";
			$data['action'] = 'berita/tambah';
			$this->load->view('backoffice/berita_form', $data);
		} else {
			$user = implode("_&_",$this->input->post('user')); // convert array to string input user
			$tags = implode("_&_",$this->input->post('tags')); // convert array to string input tags

			// Generating slug of judul
			$string = preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', set_value('judul')); // Prevent unique chars
			$trim = trim($string); // trimming
			$pre_slug = strtolower(str_replace(" ", "-", $trim)); // Blank space to dash
			$pre_slug = str_replace(",", "", $pre_slug); // Prevent comma
			$slug = str_replace(".", "", $pre_slug); // Prevent dot
			// End of generating slug of judul

			// for uploading file
			$config['upload_path'] = './assets/img/doc'; 
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 512;
			$config['file_name'] = date('Y-m-d').'-gambar-'.$slug;

			$this->load->library('upload');
			$this->upload->initialize($config);
			// end for uploading file

			// echo $config['file_name'];die();

			if(!empty($_FILES['gambar']['name'])){
				if ( ! $this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('error', 'Gambar gagal diupload');
					redirect('berita/tambah');
				}
				else {
					$gbr = $this->upload->data();
					$gambar = $gbr['file_name'];

					$data = array (
						'judul'			=> htmlspecialchars(set_value('judul')),
						'isi_berita'	=> htmlspecialchars_decode(set_value('isi')),
						'gambar'		=> $gambar,
						'tagar'			=> $tags,
						'dibuat_oleh'	=> $this->session->userdata('id'),
						'user'			=> $user,
					);
					$id = $this->Mberita->create($data);

					$tags = $this->input->post('tags');
					$t_jum = count($tags);
					for ($i = 0; $i < $t_jum; $i++) {
						$t_dt = array(
							'id_tag' => $tags[$i],
							'id_berita' => $id
						);
						$this->Mberita->forTag($t_dt);
					}

					$user = $this->input->post('user');
					$u_jum = count($user);
					for ($i = 0; $i < $u_jum; $i++) {
						$u_dt = array(
							'id_user' => $user[$i],
							'id_berita' => $id
						);
						$this->Mberita->forUser($u_dt);

						// Enabling error reporting
						error_reporting(-1);
						ini_set('display_errors', 'On');

						$fields = NULL;
						$topics = $user[$i];
						$message = set_value('judul');

						$res = array();
						$res['body'] = $message;

						$fields = array(
							'to' => '/topics/' . $topics,
							'notification' => $res,
							'click_action' => "OPEN_ACTIVITY_1",
						);

						// Set POST variables
						$url = 'https://fcm.googleapis.com/fcm/send';
						$server_key =   "AAAA2T9zIks:APA91bEevvifGnW2A15MAtl6fS0k6E3ZEHGMwS8xIECGprZ-OjWx81weUKN8gir1Jo1h_Sd6GtomxzIMhtZSGWoNkxe1rVf-DXBky4aQXQC6S2xtrnKkaC72zq5tkZZ2R7TAp1Mdfax2";

						$headers = array(
							'Authorization: key=' . $server_key,
							'Content-Type: application/json'
						);

						// Open connection
						$ch = curl_init();

						// Set the url, number of POST vars, POST data
						curl_setopt($ch, CURLOPT_URL, $url);

						curl_setopt($ch, CURLOPT_POST, true);
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

						// Disabling SSL Certificate support temporarly
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

						curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

						// Execute post
						$result = curl_exec($ch);
						if ($result === FALSE) {
							echo 'Curl failed: ' . curl_error($ch);
						}

						// Close connection
						curl_close($ch);

					}

					redirect('berita');
				}
			} else {
				$this->session->set_flashdata('error', 'Gambar wajib diisi');
				redirect('berita/tambah');
			}
		}
	}

	public function edit($key){
		$this->form_validation->set_rules('judul',	'Judul Berita',	'trim|required');
		$this->form_validation->set_rules('isi',	'Isi Berita',	'trim|required');
		$this->form_validation->set_rules('tags[]',	'Tag Berita',	'callback_count_checkbox');
		$this->form_validation->set_rules('user[]',	'User',			'callback_count_checkbox');

		if ($this->form_validation->run() == FALSE) {
			$data['tags'] = $this->Mtags->read();
			$data['dtberita'] = $this->Mberita->getById($key);
			$data['title'] = "Edit Berita";
			$data['header']	= 'Edit Berita';
			$data['action'] = 'berita/edit/'.$key;
			$this->load->view('backoffice/berita_form_edit', $data);
		} else {
			$tags = implode("_&_",$this->input->post('tags')); // convert array to string input tags
			$user = implode("_&_",$this->input->post('user')); // convert array to string input tags

			// Generating slug of judul
			$string = preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', set_value('judul')); // Prevent unique chars
			$trim = trim($string); // trimming
			$pre_slug = strtolower(str_replace(" ", "-", $trim)); // Blank space to dash
			$pre_slug = str_replace(",", "", $pre_slug); // Prevent comma
			$slug = str_replace(".", "", $pre_slug); // Prevent dot
			// End of generating slug of judul

			// for uploading file
			$config['upload_path'] = './assets/img/doc'; 
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 512;
			$config['file_name'] = date('Y-m-d').'-gambar-'.$slug;

			$this->load->library('upload');
			$this->upload->initialize($config);
			// end for uploading file

			// echo $config['file_name'];die();

			if(!empty($_FILES['gambar']['name'])){
				if ( ! $this->upload->do_upload('gambar')) {
					$this->session->set_flashdata('error', 'Gambar gagal diupload');
					redirect('berita/tambah');
				}
				else {
					$dt = $this->Mberita->getById($key);
					if (is_file('./assets/img/doc/'.$dt->gambar)) {
						unlink('./assets/img/doc/'.$dt->gambar);
					}
					$gbr = $this->upload->data();
					$gambar = $gbr['file_name'];

					$data = array (
						'judul'			=> htmlspecialchars(set_value('judul')),
						'isi_berita'	=> htmlspecialchars_decode(set_value('isi')),
						'gambar'		=> $gambar,
						'tagar'			=> $tags,
						'diedit_oleh'	=> $this->session->userdata('id'),
						'user'			=> $user,
					);

					$this->Mberita->update($key, $data);
					$this->Mberita->delForTag($key);
					$this->Mberita->delForUser($key);

					$tags = $this->input->post('tags');
					$t_jum = count($tags);
					for ($i = 0; $i < $t_jum; $i++) {
						$t_dt = array(
							'id_tag' => $tags[$i],
							'id_berita' => $id
						);
						$this->Mberita->forTag($t_dt);
					}

					$user = $this->input->post('user');
					$u_jum = count($user);
					for ($i = 0; $i < $u_jum; $i++) {
						$u_dt = array(
							'id_user' => $user[$i],
							'id_berita' => $key
						);
						$this->Mberita->forUser($u_dt);
					}
					redirect('berita');
				}
			} else {
				$data = array (
					'judul'			=> htmlspecialchars(set_value('judul')),
					'isi_berita'	=> htmlspecialchars_decode(set_value('isi')),
					'tagar'			=> $tags,
					'diedit_oleh'	=> $this->session->userdata('id'),
					'user'			=> $user,
				);

				$this->Mberita->update($key, $data);
				$this->Mberita->delForTag($key);
				$this->Mberita->delForUser($key);

				$tags = $this->input->post('tags');
				$t_jum = count($tags);
				for ($i = 0; $i < $t_jum; $i++) {
					$t_dt = array(
						'id_tag' => $tags[$i],
						'id_berita' => $key
					);
					$this->Mberita->fortag($t_dt);
				}

				$user = $this->input->post('user');
				$u_jum = count($user);
				for ($i = 0; $i < $u_jum; $i++) {
					$u_dt = array(
						'id_user' => $user[$i],
						'id_berita' => $key
					);
					$this->Mberita->forUser($u_dt);
				}
				redirect('berita');
			}
		}
	}

	public function hapus($key) {
		$dt = $this->Mberita->getById($key);
		if (is_file('./assets/img/doc/'.$dt->gambar)) {
			unlink('./assets/img/doc/'.$dt->gambar);
		}
		$this->Mberita->delete($key);
		redirect('berita');
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */