<?php

class Model_kota extends CI_Model{
    Public function ambil_data(){
        return $this->db->get('kota');
    }
}