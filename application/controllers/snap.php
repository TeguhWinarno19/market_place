<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');

class Snap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-jX5DY-i8VkPwSromjRhHEq6K', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
    }

    // Fungsi untuk mendapatkan token Midtrans
    public function token()
    {
        // Ambil total belanja dari form (untuk sementara kita tetapkan nilai manual)
        $total_belanja = $this->input->post('total_belanja');

        // Rincian transaksi
        $transaction_details = array(
            'order_id' => uniqid(), // Order ID unik
            'gross_amount' => $total_belanja, // Total belanja
        );

        $customer_details = array(
            'first_name' => "Nama",
            'last_name' => "Penerima",
            'email' => "email@example.com",
            'phone' => "08123456789",
            'address' => "Alamat Pengiriman",
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details
        );

        // Buat Snap token dan kirimkan hasilnya
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        echo json_encode(['token' => $snapToken]);
    }

    public function finish()
    {
        // Ambil data hasil transaksi dari Midtrans
        $result = json_decode($this->input->post('result_data'));
        // Cek apakah transaksi sukses
        if ($result->status_code == '200') {
            // Persiapkan data untuk tabel transaksi
            $transaksi_data = array(
                'order_id' => $result->order_id,
                'gross_amount' => $result->gross_amount,
                'transaction_status' => $result->transaction_status,
                'payment_type' => $result->payment_type,
                'transaction_time' => $result->transaction_time,
                'customer_name' => $result->customer_details->first_name . ' ' . $result->customer_details->last_name,
                'customer_email' => $result->customer_details->email,
                'customer_phone' => $result->customer_details->phone,
                'customer_address' => $result->customer_details->address
            );
            // Insert data ke tabel transaksi dan dapatkan ID-nya
            $this->db->insert('transaksi', $transaksi_data);
            $transaksi_id = $this->db->insert_id();
            // Contoh data detail produk (bisa Anda ambil dari session atau data lain sesuai aplikasi)
            $cart_items = $this->session->userdata('cart_items'); // Misalnya data produk ada di session
            // Simpan setiap item ke tabel detail_transaksi
            foreach ($cart_items as $item) {
                $detail_data = array(
                    'transaksi_id' => $transaksi_id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                );
                $this->db->insert('detail_transaksi', $detail_data);
            }

        echo "Transaksi berhasil dan data tersimpan.";
    } else {
        echo "Transaksi gagal.";
    }
}

}
