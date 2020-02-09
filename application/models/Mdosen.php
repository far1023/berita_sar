<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdosen extends CI_Model {

	public function read(){
		return $this->db->get('dosen')->result();	
	}

	public function getById($key) {
		$hasil = $this->db->where('id_dosen', $key)->limit(1)->get('dosen');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function create($data) {
		$this->db->insert('dosen', $data);
	}

	public function update($key, $data) {
		$this->db->where('id_dosen', $key)->update('dosen', $data);
	}

	public function delete() {
		$this->db->where('id_dosen', $this->input->post('id_dosen'))->delete('dosen');
	}

}

/* End of file Mdosen.php */
/* Location: ./application/models/Mdosen.php */