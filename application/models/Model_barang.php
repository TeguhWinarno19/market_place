<?php

class Model_barang extends CI_Model{
    Public function tampil_data_toko($id_toko){
        return $this->db->get_where('barang', array('id_toko' => $id_toko));
    }
    public function edit_barang($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function tambah_barang($data,$table){
        $this->db->insert($table,$data);
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function get_barang_by_user_and_toko1($user_id, $id_toko) {
        // Select query
        $this->db->select('b.id_barang, b.nama_barang, b.keterangan, k.kategori AS nama_kategori, t.nama_toko, 
        FROM_UNIXTIME(t.waktu_daftar, "%Y-%m-%d") AS tanggal_didaftarkan, b.harga, b.stok, b.gambar');
        $this->db->from('barang b');
        $this->db->join('kategori k', 'b.id_kategori = k.id_kategori', 'inner');
        $this->db->join('toko t', 'b.id_toko = t.id_toko', 'inner');
        $this->db->where('t.id_user', $user_id);
        $this->db->where('t.id_toko', $id_toko);
        // Eksekusi query
        $query = $this->db->get();
        return $query->result();
    }
    public function get_barang_by_user_and_toko($user_id, $id_toko) {
        // Select query
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'inner');
        $this->db->join('toko', 'barang.id_toko = toko.id_toko', 'inner');
        $this->db->where('toko.id_user', $user_id);
        $this->db->where('toko.id_toko', $id_toko);
        $this->db->where('barang.status_barang','aktif');
        // Eksekusi query
        $query = $this->db->get();
        return $query->result();
    }
    Public function ambil_data_all2(){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('toko','toko.id_toko = barang.id_toko');
        $this->db->join('kategori','kategori.id_kategori = barang.id_kategori');
        $this->db->join('kota', 'kota.id_kota = toko.id_kota');
        $this->db->where('status_barang', 'aktif');
        $query = $this->db->get();
        return $query;
    }
    Public function ambil_data_all(){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('toko','toko.id_toko = barang.id_toko');
        $this->db->join('kategori','kategori.id_kategori = barang.id_kategori');
        $this->db->join('kota', 'kota.id_kota = toko.id_kota');
        $query = $this->db->get();
        return $query;
    }
    public function getWishlistCount($id_barang) {
        $this->db->select('COUNT(id_whistlist) as jumlah_disukai');
        $this->db->from('whistlist');
        $this->db->join('barang','barang.id_barang = whistlist.id_barang');
        $this->db->where('barang.id_barang', $id_barang);
        $this->db->where('barang.status_barang', 'aktif');
        $query = $this->db->get();
        
        return $query->row()->jumlah_disukai;
    }
    public function getTerjualCount($id_barang) {
        $this->db->select('COUNT(id_detail) as jumlah_terjual');
        $this->db->from('order_detail');
        $this->db->join('barang','barang.id_barang = order_detail.id_barang');
        $this->db->where('barang.id_barang', $id_barang);
        $this->db->where('barang.status_barang', 'aktif');
        $query = $this->db->get();

        return $query->row()->jumlah_terjual;
    }

    Public function ambil_data_all3(){
        $this->db->select('*');
        $this->db->from('pilihan');
        $this->db->join('barang','barang.id_barang = pilihan.id_barang');
        $this->db->where('barang.status_barang', 'aktif');
        return $this->db->get();
        
    }
    Public function detail_barang($id_barang){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('toko','toko.id_toko = barang.id_toko');
        $this->db->join('kategori','kategori.id_kategori = barang.id_kategori');
        $this->db->join('kota','kota.id_kota = toko.id_kota');
        $this->db->where('id_barang', $id_barang);
        $this->db->where('barang.status_barang', 'aktif');
        $query = $this->db->get();
        return $query;
    }
    public function find($id)
    {
        $result = $this->db->where('id_barang', $id)
        ->limit(1)
        ->get('barang');
        if($result->num_rows() > 0){
            return $result->row();
        }
        else{
            return array();
        }
    }
    public function tambah_pilihan($data,$table){
        $this->db->insert($table,$data);
    }
    public function hapus_pilihan($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function cari_barang($cari)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('toko', 'toko.id_toko = barang.id_toko');
        $this->db->like('nama_barang', $cari);
        $this->db->where('barang.status_barang', 'aktif');
        $query = $this->db->get();

        return $query;
    }

    Public function kategori($id){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('toko','toko.id_toko = barang.id_toko');
        $this->db->where('id_kategori', $id);
        $this->db->where('barang.status_barang', 'aktif');
        $query = $this->db->get();
        return $query;
    }
    Public function toko($id){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_toko', $id);
        $this->db->where('status_barang', 'aktif');
        $query = $this->db->get();
        return $query;
    }
    Public function barang_kritis($id){
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('id_toko', $id);
        $this->db->where('status_barang', 'aktif');
        $this->db->where('stok <', '5');
        $query = $this->db->get();
        return $query;
    }
    public function ulasan_barang($where)
    {
        $this->db->select('*');
        $this->db->from('ulasan_produk');
        $this->db->where('ulasan_produk.id_barang', $where);
        return $this->db->get();       
    }
    public function get_top_selling_items() {
        $this->db->select('order_detail.id_barang, barang.nama_barang,toko.nama_toko ,SUM(qty) AS total_terjual');
        $this->db->from('order_detail');
        $this->db->join('barang','barang.id_barang = order_detail.id_barang');
        $this->db->join('toko','toko.id_toko = barang.id_toko');
        $this->db->group_by('order_detail.id_barang');
        $this->db->order_by('total_terjual', 'DESC');
        return $this->db->get()->result_array();
    }
}
