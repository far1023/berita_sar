<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mberita extends CI_Model {

	public function read() {
		return $this->db->get('berita')->result();
	}

	public function create($data) {
		$this->db->insert('berita', $data);
		return $this->db->insert_id();
	}

	public function getById($key) {
		$hasil = $this->db->where('id_berita', $key)->limit(1)->get('berita');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function update($key, $key2) {
		$this->db->where('id_berita', $key)->update('berita', $key2);		
	}

	public function delete($key){
		$this->db->where('id_berita', $key)->delete('berita');
		$this->db->where('id_berita', $key)->delete('tag_berita');
		$this->db->where('id_berita', $key)->delete('user_berita');
	}

	public function forUser($u_dt){
		$this->db->insert('user_berita', $u_dt);
	}
	public function forTag($t_dt){
		$this->db->insert('tag_berita', $t_dt);
	}

	public function delForUser($key){
		$this->db->where('id_berita', $key)->delete('user_berita');
	}
	public function delForTag($key){
		$this->db->where('id_berita', $key)->delete('tag_berita');
	}

}

/* End of file Mberita.php */
/* Location: ./application/models/Mberita.php */