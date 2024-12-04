<?php

class Model_toko extends CI_Model{
    public function tampil_data(){
        $this->db->select('*');
        $this->db->from('toko');
        $this->db->join('kota','kota.id_kota = toko.id_kota');
        $this->db->join('user','user.id_user = toko.id_user');
        return $this->db->get();
    }
    // Ambil data toko berdasarkan ID pengguna
    public function ambil_toko_by_user($id_user) {
        $this->db->where('id_user', $id_user);
        return $this->db->get('toko')->result(); // Mengembalikan hasil sebagai array objek
    }
    public function joinKategoriToko($where)
    {
        $this->db->select('*');
        $this->db->from('toko');
        $this->db->join('kota','kota.id_kota = toko.id_kota');
        $this->db->where('id_user', $where);
        return $this->db->get()->row();
    }
    public function joinKategoriToko1($where)
    {
        $this->db->select('*');
        $this->db->from('toko');
        $this->db->where('toko.id_user', $where); 
        return $this->db->get()->row();
    }
    public function toko_by_id($where)
    {
        $this->db->select('*');
        $this->db->from('toko');
        $this->db->join('kota','kota.id_kota = toko.id_kota');
        $this->db->join('provinsi','provinsi.id_provinsi = kota.id_provinsi');
        $this->db->where('id_toko', $where);
        return $this->db->get()->row();
    }
    public function toko_by_id2($where)
    {
        $this->db->select('*');
        $this->db->from('toko');
        $this->db->join('kota','kota.id_kota = toko.id_kota');
        $this->db->join('provinsi','provinsi.id_provinsi = kota.id_provinsi');
        $this->db->where('id_toko', $where);
        return $this->db->get();
    }
    public function beranda($where){
        $this->db->select('*');
        $this->db->from('beranda');
        $this->db->where('id_toko', $where);
        return $this->db->get();
    }
    public function hapus_gambar_beranda($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}