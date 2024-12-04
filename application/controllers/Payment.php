<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->config('midtrans');
        $this->load->library('Midtrans');

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = $this->config->item('midtrans_server_key');
        \Midtrans\Config::$isProduction = $this->config->item('midtrans_is_production');
        \Midtrans\Config::$isSanitized = $this->config->item('midtrans_sanitization');
        \Midtrans\Config::$is3ds = $this->config->item('midtrans_3ds');
    }

    public function checkout() {
        $items = $this->cart->contents();
        $store_ids = [];

        // Menghitung ongkir per toko
        foreach ($items as $item) {
            $store_id = $item['options']['store_id'];
            if (!in_array($store_id, $store_ids)) {
                $store_ids[] = $store_id;
            }
        }

        $shipping_cost_per_store = 16000;
        $total_shipping_cost = count($store_ids) * $shipping_cost_per_store;
        $total_price = $this->cart->total() + $total_shipping_cost;

        // Mempersiapkan data untuk dikirim ke Midtrans
        $order_id = 'ORDER-' . rand();
        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $total_price,
            ],
            'customer_details' => [
                'first_name' => "John",
                'last_name' => "Doe",
                'email' => "johndoe@example.com",
                'phone' => "081234567890",
            ],
            'item_details' => []
        ];

        foreach ($items as $item) {
            $params['item_details'][] = [
                'id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['qty'],
                'name' => $item['name']
            ];
        }

        $params['item_details'][] = [
            'id' => 'ONGKIR',
            'price' => $total_shipping_cost,
            'quantity' => 1,
            'name' => 'Ongkos Kirim'
        ];

        // Mendapatkan Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Mengirim token ke view
        $data['snapToken'] = $snapToken;
        $data['total_price'] = $total_price;
        $this->load->view('checkout', $data);
    }

    public function finish() {
        $result = json_decode($this->input->post('result_data'));
        echo "Transaction status: " . $result->status_message;
        echo "<br>Order ID: " . $result->order_id;
    }
}
