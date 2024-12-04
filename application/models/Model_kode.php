<?php

class Model_kode extends CI_Model{

public function generate_kode($tabel, $kolom_kode, $prefix, $length = 3) {
    // Ambil digit terakhir dari kode
    $this->db->select("RIGHT($kolom_kode, $length) as kode", FALSE);
    $this->db->order_by($kolom_kode, 'DESC'); // Urutkan dari yang terbesar
    $this->db->limit(1); // Ambil data terakhir
    $query = $this->db->get($tabel); // Query ke tabel dinamis sesuai parameter

    if($query->num_rows() <> 0) {
        // Jika ada data, ambil kode terakhir dan tambahkan 1
        $data = $query->row();
        $kode = intval($data->kode) + 1;
    } else {
        // Jika tabel kosong, mulai dari 1
        $kode = 1;
    }

    // Tambahkan nol di depan jika kurang dari panjang yang diinginkan
    $kode_max = str_pad($kode, $length, "0", STR_PAD_LEFT);

    // Gabungkan prefix dengan kode
    $kode_jadi = $prefix . $kode_max;

    return $kode_jadi; // Kembalikan kode yang sudah jadi
    }
}