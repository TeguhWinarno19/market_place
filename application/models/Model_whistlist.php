<?php

class Model_whistlist extends CI_Model{
    public function tambah_whistlist($data,$table){
        $this->db->insert($table,$data);
        
    }
    Public function ambil_whistlist(){
        return $this->db->get('whistlist');
    }
    Public function tampil_whistlist_user($where)
    {
        $this->db->select('*');
        $this->db->from('whistlist');
        $this->db->join('barang','barang.id_barang = whistlist.id_barang');
        $this->db->where('barang.status_barang', 'aktif');
        $this->db->where('id_user', $where);
        return $this->db->get();
    }
    public function hapus_whistlist($id_user, $id_barang){
        $this->db->where('id_user', $id_user);
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('whistlist');
    }
    public function hapus_whistlist_data($id_barang){
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('whistlist');
    }
}