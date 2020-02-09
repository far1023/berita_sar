<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlevel extends CI_Model {

	public function getById($key){
		$hasil = $this->db->where('id_level', $key)->limit(1)->get('kis_levels');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		} else {
			return array();
		}
	}

}

/* End of file Mlevel.php */
/* Location: ./application/models/Mlevel.php */