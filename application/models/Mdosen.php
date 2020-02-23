<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdosen extends CI_Model {

	public function read(){
		return $this->db->get('pegawai')->result();	
	}

	public function getById($key) {
		$hasil = $this->db->where('id_pegawai', $key)->limit(1)->get('pegawai');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function create($data) {
		$this->db->insert('pegawai', $data);
	}

	public function update($key, $data) {
		$this->db->where('id_pegawai', $key)->update('pegawai', $data);
	}

	public function delete() {
		$this->db->where('id_pegawai', $this->input->post('id_pegawai'))->delete('pegawai');
	}

}

/* End of file Mdosen.php */
/* Location: ./application/models/Mdosen.php */