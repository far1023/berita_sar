<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtags extends CI_Model {

	public function read() {
		return $this->db->get('tags')->result();
	}

	public function getById($key) {
		$hasil = $this->db->where('id_tag', $key)->limit(1)->get('tags');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function getAjax($key) {
		$this->db->from('tags')->where('id_tag', $key);
		$query = $this->db->get();
		return $query->row();
	}

	public function create($data) {
		$this->db->insert('tags', $data);
		return $this->db->insert_id();
	}

	public function update($data) {
		$this->db->where('id_tag', $this->input->post('id_tag'))->update('tags', $data);
		return $this->db->affected_rows();
	}

	public function delete() {
		$this->db->where('id_tag', $this->input->post('id_tag'))->delete('tags');
	}

}

/* End of file Mtags.php */
/* Location: ./application/models/Mtags.php */