<?php

class Model_order extends CI_Model{
    Public function pesanan_user($where)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('toko', 'toko.id_toko = order.id_toko');
        $this->db->where('order.id_user', $where);
        $this->db->order_by('order.id_order','DESC');
        return $this->db->get();
    }
    Public function pesanan_toko($where)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('toko', 'toko.id_toko = order.id_toko');
        $this->db->join('user', 'user.id_user = order.id_user');
        $this->db->where('order.id_toko', $where);
        $this->db->order_by('order.id_order','DESC');
        return $this->db->get();
    }
    Public function order_menunggu($where)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order.id_toko', $where);
        $this->db->where('order.status_pesanan', "Menunggu Konfirmasi");
        $this->db->order_by('order.id_order','DESC');
        return $this->db->get();
    }
    Public function barang_terjual($where)
    {
        $this->db->select('*');
        $this->db->from('order_detail');
        $this->db->join('order', 'order.id_order = order_detail.id_order');
        $this->db->join('toko', 'toko.id_toko = order.id_toko');
        $this->db->where('order.id_toko', $where);
        return $this->db->get();
    }
    Public Function ulasan_toko($where){
        $this->db->select('*');
        $this->db->from('ulasan_produk');
        $this->db->join('barang', 'barang.id_barang = ulasan_produk.id_barang');
        $this->db->where('barang.id_toko', $where);
        return $this->db->get();
    }
    Public function barang_terjual_barang($where)
    {
        $this->db->select('*');
        $this->db->from('order_detail');
        $this->db->where('order_detail.id_barang', $where);
        return $this->db->get();
    }
    Public function pendapatan_toko($where)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('id_toko', $where);
        $this->db->where('status_pesanan', 'Selesai');
        return $this->db->get();
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    Public function data_invoice($where)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('toko', 'toko.id_toko = order.id_toko');
        $this->db->join('alamat', 'alamat.id_alamat = order.id_alamat');
        $this->db->join('kota', 'kota.id_kota = alamat.id_kota');
        $this->db->join('provinsi', 'provinsi.id_provinsi = alamat.id_provinsi');
        $this->db->join('transaksi', 'transaksi.id_transaksi = order.id_transaksi');
        $this->db->where('order.id_order', $where);
        $this->db->order_by('order.id_order','DESC');
        return $this->db->get();
    }
    Public function pesanan_detail($where)
    {
        $this->db->select('*');
        $this->db->from('order_detail');
        $this->db->join('order', 'order.id_order = order_detail.id_order');
        $this->db->join('barang', 'barang.id_barang = order_detail.id_barang');
        $this->db->join('toko', 'toko.id_toko = order.id_toko');
        $this->db->join('alamat', 'alamat.id_alamat = order.id_alamat');
        $this->db->join('kota', 'kota.id_kota = alamat.id_kota');
        $this->db->join('provinsi', 'provinsi.id_provinsi = alamat.id_provinsi');
        $this->db->where('order_detail.id_order', $where);
        $this->db->order_by('order_detail.id_detail','DESC');
        return $this->db->get();
    }
    public function auto_cancel_orders() {
        $this->db->set('status_pesanan', 'Batal');
        $this->db->where('status_pesanan', 'Menunggu Konfirmasi');
        $this->db->where('waktu <=', time() - 86400); // 86400 detik = 1 hari
        $this->db->update('order');
    }
    public function auto_done_orders() {
        $this->db->set('status_pesanan', 'Selesai');
        $this->db->where('status_pesanan', 'Tiba Tujuan');
        $this->db->where('waktu <=', time() - (86400*10)); // 86400 detik = 1 hari
        $this->db->update('order');
    }
    Public function ulasan_produk($where)
    {
        $this->db->select('*');
        $this->db->from('order_detail');
        $this->db->join('order', 'order.id_order = order_detail.id_order');
        $this->db->join('barang', 'barang.id_barang = order_detail.id_barang');
        $this->db->join('toko', 'toko.id_toko = order.id_toko');
        $this->db->join('alamat', 'alamat.id_alamat = order.id_alamat');
        $this->db->join('kota', 'kota.id_kota = alamat.id_kota');
        $this->db->join('provinsi', 'provinsi.id_provinsi = alamat.id_provinsi');
        $this->db->where('order_detail.id_detail', $where);
        $this->db->order_by('order_detail.id_detail','DESC');
        return $this->db->get();
    }
    public function review_barang($where)
    {
        $this->db->select('*');
        $this->db->from('ulasan_produk');
        $this->db->where('ulasan_produk.id_detail', $where);
        return $this->db->get();       
    }
    Public function klaim_list($where)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('toko', 'toko.id_toko = order.id_toko');
        $this->db->join('user', 'user.id_user = order.id_user');
        $this->db->join('klaim_dana_toko', 'klaim_dana_toko.id_order = order.id_order');
        $this->db->where('order.id_toko', $where);
        $this->db->where('order.status_pesanan','Selesai');
        $this->db->order_by('order.id_order','DESC');
        return $this->db->get();
    }
    Public function klaim_list2()
    {
        $this->db->select('*');
        $this->db->from('klaim_dana_toko');
        $this->db->join('order', 'order.id_order = klaim_dana_toko.id_order');
        $this->db->where('klaim_dana_toko.status','diajukan');
        $this->db->order_by('klaim_dana_toko.id_klaim','DESC');
        return $this->db->get();
    }
    Public function klaim_list3()
    {
        $this->db->select('*');
        $this->db->from('klaim_dana_toko');
        $this->db->join('order', 'order.id_order = klaim_dana_toko.id_order');
        $this->db->where('klaim_dana_toko.status','disetujui');
        $this->db->order_by('klaim_dana_toko.id_klaim','DESC');
        return $this->db->get();
    }
    Public function klaim_list4($id)
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->where('order.id_toko', $id);
        $this->db->order_by('order.id_order','DESC');
        return $this->db->get();
    }
    Public function klaim_list5($id)
    {
        $this->db->select('*');
        $this->db->from('klaim_dana_toko');
        $this->db->join('order', 'order.id_order = klaim_dana_toko.id_order');
        $this->db->where('order.id_toko', $id);
        $this->db->order_by('order.id_order','DESC');
        return $this->db->get();
    }
    Public function klaim_list6($id)
    {
        $this->db->select('*');
        $this->db->from('klaim_dana_toko');
        $this->db->join('order', 'order.id_order = klaim_dana_toko.id_order');
        $this->db->where('klaim_dana_toko.id_klaim', $id);
        return $this->db->get();
    }
    public function all_pesanan()
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('user', 'user.id_user = order.id_user');
        $this->db->join('alamat', 'alamat.id_alamat = order.id_alamat');
        $this->db->join('kota', 'kota.id_kota = alamat.id_kota');
        $this->db->order_by('order.id_order','DESC');
        return $this->db->get();
    }
}