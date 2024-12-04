<?php

class Model_provinsi extends CI_Model{
    Public function ambil_data(){
        return $this->db->get('provinsi');
    }
}