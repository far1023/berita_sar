<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mtags');
	}

	public function readTag(){
		$dt = $this->Mtags->read();

		foreach ($dt as $value) {
			$tbody = array();
			$aksi= "<a href='javascript:void(0)' data-id='".$value->id_tag."' class='btn btn-sm btn-flat btn-secondary edit-tag'><i class='fa fa-fw fa-edit'></i></a><a href='javascript:void(0)' data-id='".$value->id_tag."' class='btn btn-sm btn-flat btn-danger hapus-tag'><i class='fa fa-fw fa-trash'></i></a>";

			$tbody[] = $value->tag;
			$tbody[] = $aksi;
			$data[] = $tbody; 
		}

		if ($dt) {
			echo json_encode(array('data'=> $data));
		}else{
			echo json_encode(array('data'=>0));
		}
	}

	public function add() {
		$status = false;
		$id = $this->input->post('id_modul');

		if ($id!=NULL) {
			$data = array(
				'id_tag'	=> $this->input->post('id_tag'),
				'tag'	=> $this->input->post('nama_tag')
			);
			$update = $this->Mtags->update($data);
			$status = true;
		} else {
			$data = array(
				'id_tag'	=> $this->input->post('id_tag'),
				'tag'	=> $this->input->post('nama_tag')
			);
			$id = $this->Mtags->create($data);
			$status = true;
		}

		echo json_encode(array("status" => $status , 'data' => $data));
	}

	public function getTag()
	{
		$id = $this->input->post('id');
		$data = $this->Mtags->getAjax($id);
		$dt = array('success' => false, 'data' => '');
		if($data){
			$dt = array('success' => true, 'data' => $data);
		}
		echo json_encode($dt);
	}

	public function delTag()
	{
		$this->Mtags->delete();
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file Tag.php */
/* Location: ./application/controllers/Tag.php */