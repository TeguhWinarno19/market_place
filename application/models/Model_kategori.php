<?php

class Model_kategori extends CI_Model{
    Public function ambil_data(){
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('status_kategori', '');
        return $this->db->get();
    }
    public function tambah_kategori_favorit($data,$table){
        $this->db->insert($table,$data);
    }
    Public function ambil_data_favorit(){
        $this->db->select('*');
        $this->db->from('kategori_favorit');
        $this->db->join('kategori','kategori.id_kategori = kategori_favorit.id_kategori');
        return $this->db->get();
    }
    public function hapus_data_favorit($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    Public function detail_kategori($id){
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id);
        $query = $this->db->get();
        return $query;
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}