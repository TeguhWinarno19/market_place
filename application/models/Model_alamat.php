<?php

class Model_alamat extends CI_Model{
    Public function tampil_data_provinsi(){
        return $this->db->get('provinsi');
    }
    Public function tampil_data_kota(){
        return $this->db->get('kota');
    }
    Public function tampil_alamat_user($where){
        $this->db->select('*');
        $this->db->from('alamat');
        $this->db->join('kota','kota.id_kota = alamat.id_kota');
        $this->db->join('provinsi','provinsi.id_provinsi = alamat.id_provinsi');
        $this->db->where('id_user', $where);
        return $this->db->get();
    }
    Public function tampil_alamat_id($where){
        $this->db->select('*');
        $this->db->from('alamat');
        $this->db->join('kota','kota.id_kota = alamat.id_kota');
        $this->db->join('provinsi','provinsi.id_provinsi = alamat.id_provinsi');
        $this->db->where('id_alamat', $where);
        return $this->db->get()->result();
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function hapus_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    Public function detail_alamat($id){
        $this->db->select('*');
        $this->db->from('alamat');
        $this->db->join('kota','kota.id_kota = alamat.id_kota');
        $this->db->join('provinsi','provinsi.id_provinsi = alamat.id_provinsi');
        $this->db->where('id_alamat', $id);
        $query = $this->db->get();
        return $query;
    }
}