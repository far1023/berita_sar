<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model {

	public function getLogin($key) {
		$hasil = $this->db->where('username', $key)->or_where('email', $key)->limit(1)->get('admin');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function getById($key) {
		$hasil = $this->db->where('id_admin', $key)->limit(1)->get('admin');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function create($data){
		$this->db->insert('admin', $data);
	}

	public function read() {
		return $this->db->get('admin')->result();
	}

	public function updateLog($key, $key2) {
		$this->db->where('id_admin', $key)->update('admin', $key2);		
	}

	public function delete($key) {
		$this->db->where('id_admin', $key)->delete('admin');
	}

}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */