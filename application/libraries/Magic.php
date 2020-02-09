<?php defined('BASEPATH') or exit('No direct script access allowed');

class Magic {
    public function __construct(){
        $this->CI = &get_instance();
    }

    public function id_email($key) {
        $this->CI->load->model('Madmin');
        $val = $this->CI->Madmin->getById($key);
        echo $val->email;
    }

    public function id_level($key) {
        $this->CI->load->model('Mlevel');
        $val = $this->CI->Mlevel->getById($key);
        echo $val->level;
    }

    public function id_tag($key) {
        $this->CI->load->model('Mtags');
        $val = $this->CI->Mtags->getById($key);
        echo $val->tag;
    }

    public function user($key) {
        if ($key==0) {$val="<span class='badge badge-success'>DOSEN</span>";}
        elseif ($key==1) {$val="<span class='badge badge-info'>MAHASISWA</span>";}
        elseif ($key==2) {$val="<span class='badge badge-secondary'>CIVITAS AKADEMIK</span>";}
        return $val;
    }
}
