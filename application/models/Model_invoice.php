<?php

class Model_invoice extends CI_Model{
    Public function tampil_invoice_user($where)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('alamat','alamat.id_alamat = transaksi.id_alamat');
        $this->db->join('kota','kota.id_kota = alamat.id_kota');
        $this->db->join('provinsi','provinsi.id_provinsi = alamat.id_provinsi');
        $this->db->where('transaksi.id_user', $where);
        $this->db->order_by('transaksi.id_transaksi','DESC');
        return $this->db->get();
    }
    Public function all_invoice()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('user','user.id_user = transaksi.id_user');
        $this->db->join('alamat','alamat.id_alamat = transaksi.id_alamat');
        $this->db->join('kota','kota.id_kota = alamat.id_kota');
        $this->db->join('provinsi','provinsi.id_provinsi = alamat.id_provinsi');
        $this->db->order_by('transaksi.id_transaksi','DESC');
        return $this->db->get();
    }
    public function detail_invoice($where){
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('alamat', 'alamat.id_alamat = transaksi.id_alamat');
        $this->db->join('provinsi', 'provinsi.id_provinsi = alamat.id_provinsi');
        $this->db->join('kota','alamat.id_kota = kota.id_kota');
        $this->db->where('transaksi.id_transaksi', $where);
        return $this->db->get();
    }
    public function detail_pesanan($where){
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('barang', 'barang.id_barang = detail_transaksi.id_barang');
        $this->db->where('detail_transaksi.id_transaksi', $where);
        return $this->db->get();
    }
}