<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Shop extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function dashboard(){
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
        $data['toko_id'] = $data['toko']->id_toko;
        $data['order'] =  $this->Model_order->pesanan_toko($id_toko)->result();
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $barangku = $this->Model_barang->toko($id_toko)->result();
        $barang_count = 0;
        if(!empty($barangku)){
            foreach ($barangku as $bg):
                $barang_count++;
            endforeach;
        } else{
            $barang_count = 0;
        }
        $data['barang_count_data'] = $barang_count;
        $data['notifikasi'] = $jumlah_notif;
        $pesanan_done = $this->Model_order->pendapatan_toko($id_toko)->result();
        $pendapatan_toko  = 0;
        foreach($pesanan_done as $d):
            $pendapatan_toko = $pendapatan_toko + $d->total_harga - 16000;
        endforeach;
        $data['pendapatan_toko_value'] = $pendapatan_toko;
        $barang_sell_array = $this->Model_order->barang_terjual($id_toko)->result();
        $barang_sell = 0;
        foreach($barang_sell_array as $bs):
            $barang_sell = $barang_sell + $bs->qty;
        endforeach;
        $data['barang_sell_value'] = $barang_sell;
        $menunggu_array = $this->Model_order->order_menunggu($id_toko)->result();
        $menunggu = 0;
        foreach($menunggu_array as $m):
            $menunggu = $menunggu + 1;
        endforeach;
        $data['menunggu_value'] = $menunggu;
        $data['barang_kritis'] = $this->Model_barang->barang_kritis($id_toko)->result();
        $data['barang_toko'] =  $this->Model_barang->toko($id_toko)->result();
        $this->load->view('shop/header',$data);
        $this->load->view('shop/sidebar',$data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/dashboard_shop',$data);
        $this->load->view('shop/footer',$data);
    }
    public function order_masuk(){
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
        $data['order'] =  $this->Model_order->pesanan_toko($id_toko)->result();
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->load->view('shop/header',$data);
        $this->load->view('shop/sidebar',$data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/order_masuk',$data);
        $this->load->view('shop/footer',$data);
    }
    public function hapus_barang($id){
        $data = array(
            'status_barang'          => 'nonaktif'
        );
        $where = array(
            'id_barang' => $id
        );
        $this->Model_barang->update_data($where,$data,'barang');
        $where = array('id_barang' => $id);
        $this->Model_kategori->hapus_data_favorit($where, 'pilihan');
        $this->Model_whistlist->hapus_whistlist_data($id);
        redirect('shop');
    }

    public function konfirmasi_pesanan($id){
        $data = array(
            'status_pesanan'          => 'Diproses'
        );
        $where = array(
            'id_order' => $id
        );
        $this->Model_order->update_data($where,$data,'order');
        redirect('shop/order_masuk');
    }
    public function detail_pesanan($id)
	{
        $data['title'] = 'Detail Pesanan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
        $data['invoice'] = $this->Model_order->data_invoice($id)->result();
		$data['pesanan'] = $this->Model_order->pesanan_detail($id)->result();
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('shop/header',$data);
		$this->load->view('shop/sidebar',$data);
		$this->load->view('shop/topbar',$data);
		$this->load->view('shop/detail_pesanan',$data);
		$this->load->view('template/footer');

	}
    public function input_resi($id)
	{
        $data['title'] = 'Masukan Resi';
        $data['id_order'] = $id;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
        $data['invoice'] = $this->Model_order->data_invoice($id)->result();
		$data['pesanan'] = $this->Model_order->pesanan_detail($id)->result();
        $this->form_validation->set_rules('resi','resi','required|trim|min_length[3]');
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        if($this->form_validation->run() == false){
            $this->load->view('shop/header',$data);
            $this->load->view('shop/sidebar',$data);
            $this->load->view('shop/topbar',$data);
            $this->load->view('shop/resi_pesanan',$data);
            $this->load->view('shop/footer');
        }
        else {
            $this->resi_pesanan($id);
        }
	}
    public function resi_pesanan($id){
        $resi = $this->input->post('ekspidisi').'|'.$this->input->post('resi');
        $data = array(
            'status_pesanan'          => 'Dikirim',
            'resi'                    => $resi
        );
        $where = array(
            'id_order' => $id
        );
        $this->Model_order->update_data($where,$data,'order');
        redirect('shop/order_masuk');
    }
    public function pesanan_sampai($id)
	{
        $data['title'] = 'Masukan bukti sampai';
        $data['id_order'] = $id;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
        $data['invoice'] = $this->Model_order->data_invoice($id)->result();
		$data['pesanan'] = $this->Model_order->pesanan_detail($id)->result();
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->load->view('shop/header',$data);
        $this->load->view('shop/sidebar',$data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/bukti_sampai',$data);
        $this->load->view('shop/footer');
	}
    public function bukti_sampai($id){
        $gambar         = $_FILES['gambar']['name'];
        // Cek apakah gambar diunggah
        if ($gambar != '') {
            $config['upload_path']   = './assets/img/bukti_pengiriman';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = uniqid(); // Gunakan nama file unik
            $config['max_size'] = 25600;  // Maksimal 25MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo 'Gambar gagal diunggah';
            } else {
                // Dapatkan nama file yang diunggah
                $gambar = $this->upload->data('file_name');

                // Resize gambar menjadi 200x200
                $config_resize['image_library'] = 'gd2';
                $config_resize['source_image'] = './assets/img/bukti_pengiriman/' . $gambar;
                $config_resize['maintain_ratio'] = TRUE;
                $config_resize['width'] = 200;
                $config_resize['height'] = 200;

                $this->load->library('image_lib', $config_resize);

                // Jalankan proses resize
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
            }
        }
        $data = array(
            'status_pesanan'          => 'Tiba Tujuan',
            'image'                    => $gambar
        );
        $where = array(
            'id_order' => $id
        );
        $this->Model_order->update_data($where,$data,'order');
        redirect('shop/order_masuk');
    }
    public function beranda(){
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['kategori'] = $this->Model_kategori->ambil_data()->result();
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
        $data['beranda'] = $this->Model_toko->beranda($id_toko)->result();
        $data['barang'] = $this->Model_barang->get_barang_by_user_and_toko($id_user, $id_toko);
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->load->view('shop/header',$data);
        $this->load->view('shop/sidebar',$data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/beranda',$data);
        $this->load->view('shop/footer',$data);
    }
    
    public function hapus_item_beranda($id)
    {
        $where = array('gambar' => $id);
        $this->Model_toko->hapus_gambar_beranda($where, 'beranda');
        unlink(FCPATH.'assets/img/beranda/'.$id);
        redirect('shop/beranda');
    }
    public function tambah_gambar()
    {
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user); // Panggil metode dari model
        $id_toko = $data['toko']->id_toko;
        $data['kategori'] = $this->Model_kategori->ambil_data()->result();
        $kode = $this->Model_kode->generate_kode('beranda', 'id_beranda', 'BND', 4);
        $gambar         = $_FILES['gambar']['name'];
        // Cek apakah gambar diunggah
        if ($gambar != '') {
            $config['upload_path']   = './assets/img/beranda';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = uniqid(); // Gunakan nama file unik
            $config['max_size'] = 25600;  // Maksimal 25MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo 'Gambar gagal diunggah';
            } else {
                // Dapatkan nama file yang diunggah
                $gambar = $this->upload->data('file_name');

                // Resize gambar menjadi 200x200
                $config_resize['image_library'] = 'gd2';
                $config_resize['source_image'] = './assets/img/beranda/' . $gambar;
                $config_resize['maintain_ratio'] = TRUE;
                $config_resize['width'] = 200;
                $config_resize['height'] = 200;

                $this->load->library('image_lib', $config_resize);

                // Jalankan proses resize
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
            }
        }

        // Simpan data ke database
        $data = array(
            'id_beranda' => $kode,
            'id_toko' => $id_toko,
            'gambar' => $gambar
        );

        $this->Model_barang->tambah_barang($data, 'beranda');
        redirect('shop/beranda');
    }
    public function detail_toko_produk($id)
	{
        $data['title'] = 'Toko Saya';

		$data['kategori'] = $this->Model_kategori->ambil_data()->result();
		$data['barang'] = $this->Model_barang->toko($id)->result();
		$data['toko'] = $this->Model_toko->toko_by_id($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['favorit'] = $this->Model_kategori->ambil_data_favorit()->result();
		$data['pilihan'] = $this->Model_barang->ambil_data_all3()->result();
		$data['favorit'] = $this->Model_kategori->ambil_data_favorit()->result();
		foreach ($data['pilihan'] as $produk) {
            $produk->wishlist_count = $this->Model_barang->getWishlistCount($produk->id_barang);
        }
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('shop/header',$data);
		$this->load->view('shop/sidebar',$data);
		$this->load->view('shop/topbar',$data);
		$this->load->view('shop/detail_toko_produk',$data);
		$this->load->view('shop/footer');
	}
    public function detail_toko_ulasan($id)
	{
        $data['title'] = 'Toko Saya | Ulasan Page';
		$data['kategori'] = $this->Model_kategori->ambil_data()->result();
		$data['toko'] = $this->Model_toko->toko_by_id($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['ulasan'] = $this->Model_order->ulasan_toko($id_toko)->result();
        $ulasan_array = $this->Model_order->ulasan_toko($id_toko)->result();
        $rating = 0;
        $count_ratting = 0;
        foreach($ulasan_array as $ua):
            $rating = $rating + $ua->rating;
            $count_ratting = $count_ratting + 1;
        endforeach;
        $data['overall'] = $rating / $count_ratting;
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('shop/header',$data);
		$this->load->view('shop/sidebar',$data);
		$this->load->view('shop/topbar',$data);
		$this->load->view('shop/detail_toko_ulasan',$data);
		$this->load->view('shop/footer');
	}
    public function edit(){
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['kategori'] = $this->Model_kategori->ambil_data()->result();
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user); // Panggil metode dari model
        $id_toko = $data['toko']->id_toko;
        $data['toko_id'] = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->form_validation->set_rules('nama_toko', 'nama_toko', 'required|trim');
		$this->form_validation->set_rules('no_rekening', 'no_rekening', 'required|trim');
        $this->form_validation->set_rules('bank', 'bank', 'required|trim');
		$this->form_validation->set_rules('kota', 'kota', 'required|trim');
        if ($this->form_validation->run()==false){
            $this->load->view('shop/header',$data);
            $this->load->view('shop/sidebar',$data);
            $this->load->view('shop/topbar',$data);
            $this->load->view('shop/edit_toko',$data);
            $this->load->view('shop/footer',$data);
		} else {
			$data = [
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'nama_toko' => htmlspecialchars($this->input->post('nama_toko', true)),
				'bank' => htmlspecialchars($this->input->post('bank', true)),
				'no_rekening' => htmlspecialchars($this->input->post('no_rekening', true)),
				'id_kota' => htmlspecialchars($this->input->post('kota', true)),
			];
            $where = array(
				'id_toko' => htmlspecialchars($this->input->post('id_toko', true))
            );
            $this->Model_toko->update_data($where,$data,'toko');
            redirect('shop/dashboard');

        }
    }
    public function index(){
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['kategori'] = $this->Model_kategori->ambil_data()->result();
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user); // Panggil metode dari model
        $id_toko = $data['toko']->id_toko;
        $data['toko_id'] = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $data['barang'] = $this->Model_barang->get_barang_by_user_and_toko($id_user, $id_toko);
		$this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'required|trim');
		$this->form_validation->set_rules('kondisi', 'kondisi', 'required|trim');
		$this->form_validation->set_rules('harga', 'harga', 'required|trim');
		$this->form_validation->set_rules('stok', 'stok', 'required|trim');
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        if ($this->form_validation->run()==false){
        $this->load->view('shop/header',$data);
        $this->load->view('shop/sidebar',$data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/index',$data);
        $this->load->view('shop/footer',$data);
        }
        else
        {
            $this->tambah_aksi();
        }
    }
    public function detail_barang($id_barang){
        $data['title'] = 'Toko Saya | Detail Barang';
		$data['barang'] = $this->Model_barang->detail_barang($id_barang)->result();
		$data['kategori'] = $this->Model_kategori->ambil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user); // Panggil metode dari mode
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $id_toko = $data['toko']->id_toko;
		$this->load->view('shop/header',$data);
		$this->load->view('shop/sidebar',$data);
		$this->load->view('shop/topbar',$data);
		$this->load->view('shop/detail_barang',$data);
		$this->load->view('shop/footer');

	}
    public function tambah_aksi()
    {
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user); // Panggil metode dari model
        $id_toko = $data['toko']->id_toko;
        $data['kategori'] = $this->Model_kategori->ambil_data()->result();
        $kode = $this->Model_kode->generate_kode('barang', 'id_barang', 'BRG', 4);
        $nama_barang       = $this->input->post('nama_barang');
        $keterangan     = $this->input->post('keterangan');
        $id_kategori       = $this->input->post('id_kategori');
        $kondisi       = $this->input->post('kondisi');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');
        $gambar         = $_FILES['gambar']['name'];

        // Cek apakah gambar diunggah
        if ($gambar != '') {
            $config['upload_path']   = './assets/img/product';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = uniqid(); // Gunakan nama file unik
            $config['max_size'] = 25600;  // Maksimal 25MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo 'Gambar gagal diunggah';
            } else {
                // Dapatkan nama file yang diunggah
                $gambar = $this->upload->data('file_name');

                // Resize gambar menjadi 200x200
                $config_resize['image_library'] = 'gd2';
                $config_resize['source_image'] = './assets/img/product/' . $gambar;
                $config_resize['maintain_ratio'] = TRUE;
                $config_resize['width'] = 200;
                $config_resize['height'] = 200;

                $this->load->library('image_lib', $config_resize);

                // Jalankan proses resize
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
            }
        }

        // Simpan data ke database
        $data = array(
            'id_barang' => $kode,
            'id_toko' => $id_toko,
            'nama_barang' => $nama_barang,
            'keterangan' => $keterangan,
            'id_kategori' => $id_kategori,
            'kondisi' => $kondisi,
            'harga' => $harga,
            'stok' => $stok,
            'status_barang' => 'aktif',
            'gambar' => $gambar
        );

        $this->Model_barang->tambah_barang($data, 'barang');
        redirect('shop');
    }
    public function edit_barang($id)
    {
        $data['title'] = 'Edit Data | Admin Page';        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['kategori'] = $this->Model_kategori->ambil_data()->result();
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user); // Panggil metode dari model
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $data['barang'] = $this->Model_barang->detail_barang($id)->result();
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'required|trim');
		$this->form_validation->set_rules('kondisi', 'kondisi', 'required|trim');
		$this->form_validation->set_rules('harga', 'harga', 'required|trim');
		$this->form_validation->set_rules('stok', 'stok', 'required|trim');
        if ($this->form_validation->run()==false){
        $this->load->view('shop/header', $data);
        $this->load->view('shop/sidebar', $data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/edit_barang', $data);
        $this->load->view('shop/footer');
        }
        else {
            $this->update();
        }
    }
    public function update()
    {
        $id                 = $this->input->post('id_barang');
        $nama_barang           = $this->input->post('nama_barang');
        $keterangan         = $this->input->post('keterangan');
        $id_kategori           = $this->input->post('id_kategori');
        $harga              = $this->input->post('harga');
        $kondisi              = $this->input->post('kondisi');
        $stok               = $this->input->post('stok');
        $old_image               = $this->input->post('old');
        $upload_image = $_FILES['image']['name'];
        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2040';
            $config['upload_path'] = './assets/img/product/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')){
                if($old_image != 'default.jpg'){
                    unlink(FCPATH.'assets/img/product/'.$old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            }else{
                echo $this->upload->display_errors();
            }
        }
        $data = array(
            'nama_barang'      => $nama_barang,
            'keterangan'    => $keterangan,
            'id_kategori'      => $id_kategori,
            'harga'         => $harga,
            'kondisi'         => $kondisi,
            'stok'          => $stok
        );
        $where = array(
            'id_barang' => $id
        );
        $this->Model_barang->update_data($where,$data,'barang');
        redirect('shop');
    }
    public function klaim_list(){
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
        $data['order'] =  $this->Model_order->klaim_list4($id_toko)->result();
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->load->view('shop/header',$data);
        $this->load->view('shop/sidebar',$data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/klaim_list',$data);
        $this->load->view('shop/footer',$data);
    }
    public function pencairan(){
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
        $data['order1'] =  $this->Model_order->klaim_list5($id_toko)->result();
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->load->view('shop/header',$data);
        $this->load->view('shop/sidebar',$data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/pencairan',$data);
        $this->load->view('shop/footer',$data);
    }
    public function bukti_transfer($id){
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
        $data['order'] =  $this->Model_order->klaim_list6($id)->result();
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif++;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->load->view('shop/header',$data);
        $this->load->view('shop/sidebar',$data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/bukti_transfer',$data);
        $this->load->view('shop/footer',$data);
    }
    public function ajukan_klaim($id)
    {
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user);
        $id_toko = $data['toko']->id_toko;
		$kode = $this->Model_kode->generate_kode('klaim_dana_toko', 'id_klaim', 'KLM', 8);
		$data = [
			'id_klaim' =>$kode,
			'id_order' => $id,
			'status' => 'diajukan',
		];
		$this->db->insert('klaim_dana_toko',$data);

        $data = array(
            'id_klaim'          => $kode
        );
        $where = array(
            'id_order' => $id
        );
        $this->Model_order->update_data($where,$data,'order');
        redirect('shop/klaim_list');

    }
    public function cetak_data_barang($id){
		$data['barang'] = $this->Model_barang->toko($id)->result();
		$this->load->view('cetak/cetak_data_barang', $data);
	}
    public function export_excel_barang($id) 
    {
        $data = array('title' => 'Laporan barang',
        'barang' => $this->Model_barang->toko($id)->result_array());
        $this->load->view('cetak/export-excel-shop', $data); 
    }
    public function export_barang_habis($id) 
    {
        $data = array('title' => 'Laporan Barang Habis',
        'barang' => $this->Model_barang->barang_kritis($id)->result_array());
        $this->load->view('cetak/export-excel-shop', $data); 
    }
    public function cetak_barang_habis($id){
        $data['barang_kritis'] = $this->Model_barang->barang_kritis($id)->result();
		$this->load->view('cetak/cetak_habis', $data);
	}
    
}