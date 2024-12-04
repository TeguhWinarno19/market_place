<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
	public function index()
	{
		$data['kategori'] = $this->Model_kategori->ambil_data()->result();
		$this->Model_order->auto_cancel_orders();
		$data['barang'] = $this->Model_barang->ambil_data_all2()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['favorit'] = $this->Model_kategori->ambil_data_favorit()->result();
		$data['pilihan'] = $this->Model_barang->ambil_data_all3()->result();
		$data['favorit'] = $this->Model_kategori->ambil_data_favorit()->result();
		foreach ($data['pilihan'] as $produk) {
            $produk->wishlist_count = $this->Model_barang->getWishlistCount($produk->id_barang);
        }
		foreach ($data['barang'] as $produk) {
            $produk->terjual_count = $this->Model_barang->getTerjualCount($produk->id_barang);
        }
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('index',$data);
		$this->load->view('template/footer');
	}
	public function detail_toko_beranda($id)
	{
		$data['beranda'] = $this->Model_toko->beranda($id)->result();
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
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('detail_toko_beranda',$data);
		$this->load->view('template/footer');
	}
	public function detail_toko_produk($id)
	{
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
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('detail_toko_produk',$data);
		$this->load->view('template/footer');
	}

	public function kategori_favorit()
	{
		$data['kategori'] = $this->Model_kategori->ambil_data()->result();
		$data['barang'] = $this->Model_barang->ambil_data_all2()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['favorit'] = $this->Model_kategori->ambil_data_favorit()->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('kategori_favorit',$data);
		$this->load->view('template/footer');
	}
	public function whistlist_user($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['whistlist'] = $this->Model_whistlist->tampil_whistlist_user($id)->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('whistlist',$data);
		$this->load->view('template/footer');
	}
	public function pesanan_user($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pesanan'] = $this->Model_order->pesanan_user($id)->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('list_pesanan',$data);
		$this->load->view('template/footer');
	}
	public function detail_pesanan($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->Model_order->data_invoice($id)->result();
		$data['pesanan'] = $this->Model_order->pesanan_detail($id)->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('detail_pesanan',$data);
		$this->load->view('template/footer');

	}
	public function invoice_user($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->Model_invoice->tampil_invoice_user($id)->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('invoice',$data);
		$this->load->view('template/footer');
	}
	public function detail_invoice($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->Model_invoice->detail_invoice($id)->result();
		$data['pesanan'] = $this->Model_invoice->detail_pesanan($id)->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('detail_invoice',$data);
		$this->load->view('template/footer');
	}
	public function lihat_kategori($id)
	{
		$data['judul_kategori'] = $id;
		$data['kategori'] = $this->Model_kategori->ambil_data()->result();
		$data['barang'] = $this->Model_barang->kategori($id)->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['favorit'] = $this->Model_kategori->ambil_data_favorit()->result();
		$data['pilihan'] = $this->Model_barang->ambil_data_all3()->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('kategori',$data);
		$this->load->view('template/footer');
	}
	public function cari_barang()
	{
        $cari = $this->input->post('search');
		$data['cari'] = $this->input->post('search');
		$data['kategori'] = $this->Model_kategori->ambil_data()->result();
		$data['barang'] = $this->Model_barang->cari_barang($cari)->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['favorit'] = $this->Model_kategori->ambil_data_favorit()->result();
		$data['pilihan'] = $this->Model_barang->ambil_data_all3()->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('cari',$data);
		$this->load->view('template/footer');
	}

	public function tambah_alamat(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
		$this->form_validation->set_rules('kota', 'kota', 'required|trim');
		$this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim');
		$this->form_validation->set_rules('RT', 'RT', 'required|trim');
		$this->form_validation->set_rules('RW', 'RW', 'required|trim');
		$this->form_validation->set_rules('penerima', 'penerima', 'required|trim');
		$this->form_validation->set_rules('kodepos', 'kodepos', 'required|trim');
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		if($this->form_validation->run()==false){
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('user/daftar_alamat',$data);
		$this->load->view('template/footer',$data);
		}
		else{
			$id_user = $data['user']['id_user'];
			$kode = $this->Model_kode->generate_kode('alamat', 'id_alamat', 'ADD', 4);
			$data = [
				'id_alamat' =>$kode,
				'id_user' => $id_user,
				'nama_penerima' => htmlspecialchars($this->input->post('penerima', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'rt' =>htmlspecialchars($this->input->post('RT', true)),
				'rw' =>htmlspecialchars($this->input->post('RW', true)),
				'kodepos' =>htmlspecialchars($this->input->post('kodepos', true)),
				'id_kota' => htmlspecialchars($this->input->post('kota', true)),
				'id_provinsi' =>htmlspecialchars($this->input->post('provinsi', true)),
			];
			$this->db->insert('alamat',$data);
			$this->session->set_flashdata('message', '<div class="alert
			alert-success" role="alert">Alamat Berhasil ditambahkan!</div>');
			redirect('dashboard/user');
		}
	}
	public function get_kota() {
		$id_provinsi = $this->input->post('id_provinsi');
		$this->db->where('id_provinsi', $id_provinsi);
		$kotaList = $this->db->get('kota')->result();
	
		$options = '<option value="">Pilih Kota</option>';
		foreach ($kotaList as $kota) {
			$options .= "<option value='{$kota->id_kota}'>{$kota->kota}</option>";
		}
		echo $options;
	}
	
	public function daftar()
	{
		$this->form_validation->set_rules('nama_toko', 'nama_toko', 'required|trim');
		$this->form_validation->set_rules('no_rekening', 'no_rekening', 'required|trim');
		$data['kategori'] 	= $this->Model_kategori->ambil_data()->result();
		$data['user'] 		= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		if ($this->form_validation->run()==false){
			$this->load->view('template/header');
			$this->load->view('template/navbar',$data);
			$this->load->view('user/daftar_toko',$data);
			$this->load->view('template/footer');
		}
		else{
			$id_user = $data['user']['id_user'];
			$kode = $this->Model_kode->generate_kode('toko', 'id_toko', 'SHP', 4);
			$data = [
				'id_toko' => $kode,
				'id_user' => $id_user,
				'nama_toko' => htmlspecialchars($this->input->post('nama_toko', true)),
				'bank' => htmlspecialchars($this->input->post('bank', true)),
				'no_rekening' => htmlspecialchars($this->input->post('no_rekening', true)),
				'logo_toko' => 'default.jpg',
				'waktu_daftar' => time(),
				'id_kota' => htmlspecialchars($this->input->post('kota', true)),
			];
			$this->db->insert('toko',$data);
			$this->session->set_flashdata('message', '<div class="alert
			alert-success" role="alert">Conratulation your account has been
			created. Please login!</div>');
			redirect('dashboard/user');

		}
	}
	public function user() {
		$data['kategori'] = $this->Model_kategori->ambil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	
		$id_user = $data['user']['id_user'];
	
		// Ambil data toko menggunakan model
		$data['toko'] = $this->Model_toko->joinKategoriToko1($id_user); // Panggil metode dari model
		$data['alamat'] = $this->Model_alamat->tampil_alamat_user($id_user);
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		// Load views
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('user/user', $data); // Pastikan 'user' view bisa menampilkan $toko
		$this->load->view('template/footer');
	}
	public function edit_alamat($id)
    {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['alamat'] = $this->Model_alamat->tampil_alamat_id($id);
		$data['provinsi'] = $this->Model_alamat->tampil_data_provinsi()->result();
		$data['kota'] = $this->Model_alamat->tampil_data_kota()->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('user/edit_alamat', $data); // Pastikan 'user' view bisa menampilkan $toko
		$this->load->view('template/footer');        
    }
	public function update_alamat()
    {
        $id_alamat		= $this->input->post('id_alamat');
        $penerima		= $this->input->post('penerima');
        $alamat         = $this->input->post('alamat');
        $rt         	= $this->input->post('rt');
        $rw           	= $this->input->post('rw');
        $kodepos        = $this->input->post('kodepos');
        $id_kota        = $this->input->post('kota');
        $id_provinsi    = $this->input->post('provinsi');

        $data = array(
            'nama_penerima'    => $penerima,
            'alamat'      => $alamat,
            'rt'         => $rt,
            'rw'         => $rw,
            'kodepos'         => $kodepos,
            'id_kota'         => $id_kota,
            'id_provinsi'          => $id_provinsi
        );
        $where = array(
            'id_alamat' => $id_alamat
        );
        $this->Model_alamat->update_data($where,$data,'alamat');
        redirect('dashboard/user');
    }
	public function hapus_alamat($id)
    {
        $where = array('id_alamat' => $id);
        $this->Model_alamat->hapus_data($where, 'alamat');
        redirect('dashboard/user');
    }
	public function detail_barang($id_barang){
		$data['barang'] = $this->Model_barang->detail_barang($id_barang)->result();
		$data['kategori'] = $this->Model_kategori->ambil_data()->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if(!empty($data['user']['id_user'])){
			$id_user = $data['user']['id_user'];
		}
		else {
			$id_user = '';
		}
		$data['whistlist'] = $this->Model_whistlist->tampil_whistlist_user($id_user)->result();
		foreach ($data['barang'] as $produk) {
            $produk->wishlist_count = $this->Model_barang->getWishlistCount($produk->id_barang);
        }
		foreach ($data['barang'] as $produk) {
            $produk->terjual_count = $this->Model_barang->getTerjualCount($produk->id_barang);
        }
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('detail_barang',$data);
		$this->load->view('template/footer');

	}
	public function tambah_keranjang($id)
    {
		if($this->input->post('satuan') == 0)
		{
			$this->session->set_flashdata('message', '<div class="alert
	        alert-danger" role="alert">Jumlah barang tidak boleh kosong</div>');
    	    redirect('dashboard/detail_barang/'.$id);
		}
		else{
			$data = array(
				'id'      => $this->input->post('id_barang'),
				'qty'     => $this->input->post('satuan'),
				'price'   => $this->input->post('harga'),
				'name'    => htmlspecialchars($this->input->post('nama_barang')),
				'id_toko'    => htmlspecialchars($this->input->post('id_toko')),
				'nama_toko'    => htmlspecialchars($this->input->post('nama_toko')),
				'kota'    => htmlspecialchars($this->input->post('kota')),
			);
			$this->cart->insert($data);
			$this->session->set_flashdata('message', '<div class="alert
	        alert-success" role="alert">Barang Berhasil ditambahkan ke keranjang</div>');
    	    redirect('dashboard/detail_barang/'.$id);
		}
    }
	public function hapus_keranjang()
    {
        $this->cart->destroy();
        
        redirect('dashboard/detail_keranjang');        
    }
	public function detail_keranjang()
    {
        $data['title'] = 'Cake Longue | Keranjang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$load = $this->cart->contents();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->load->view('template/header' , $data);
        $this->load->view('template/navbar' , $data);
        $this->load->view('keranjang', $data);
        $this->load->view('template/footer', $data);
    }
	public function tambahkan_whistlist($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$kode = $this->Model_kode->generate_kode('whistlist', 'id_whistlist', 'WLT', 4);
		$id_user = $data['user']['id_user'];
		$data = array(
			'id_whistlist' => $kode,
			'id_barang' => $id,
			'id_user' => $id_user
		);
		
		$this->Model_whistlist->tambah_whistlist($data,'whistlist');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ditambahkan ke Whistlist!</div>');
		redirect('dashboard/detail_barang/'.$id);
	}
	public function hapus_whistlist($id){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id_user = $data['user']['id_user'];
        $this->Model_whistlist->hapus_whistlist($id_user,$id);
		$this->session->set_flashdata('message', '<div class="alert
			alert-success" role="alert">Berhasil Dikeluarkan dari whistlist!</div>');
        redirect('dashboard/detail_barang/'.$id);
    }
	public function login_dulu($id) {
		$this->session->set_flashdata('message', '<div class="alert
        alert-danger" role="alert">Login Terlebih dahulu</div>');
        redirect('dashboard/detail_barang/'.$id);
	}
	public function pilih_alamat()
    {
        $data['title'] = 'Payment';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id_user = $data['user']['id_user'];
		$data['alamat'] = $this->Model_alamat->tampil_alamat_user($id_user);
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		$this->load->view('template/header' , $data);
        $this->load->view('template/navbar' , $data);
        $this->load->view('pilih_alamat', $data);
        $this->load->view('template/footer');   
    }
	
	public function pembayaran($id)
	{
		$id_alamat = $id;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id_user = $data['user']['id_user'];
		$data['cart'] = $this->cart->contents();
		$data['alamat'] = $this->Model_alamat->detail_alamat($id_alamat)->result();
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('pembayaran', $data);
        $this->load->view('template/footer', $data);
	}

	public function proses_pesananku($id) {
		$id_alamat = $id;
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id_user = $data['user']['id_user'];
	
		$cart = $this->cart->contents();
		if (empty($cart)) {
			show_error('Keranjang belanja kosong');
		}
	
		$alamat = $this->Model_alamat->detail_alamat($id_alamat)->row();
		if (!$alamat) {
			show_error('Alamat tidak ditemukan', 404);
		}
	
		// Merangkai alamat penerima
		$alamat_penerima = $alamat->alamat . " RT:" . $alamat->rt . " RW:" . $alamat->rw . " Kodepos:" . $alamat->kodepos . " Kota:" . $alamat->kota . " Provinsi:" . $alamat->provinsi;
	
		// Variabel untuk mengelompokkan item berdasarkan toko
		$cart_by_toko = [];
		$ongkir_per_toko = 16000; // Ongkir per toko
		$asuransi_per_toko = 500; // Asuransi per toko
		$biaya_aplikasi = 1000; // Biaya aplikasi tetap
	
		// Mengelompokkan item berdasarkan id_toko
		foreach ($cart as $item) {
			if (!isset($item['id_toko'])) {
				show_error('Cart item tidak valid, id_toko tidak ditemukan');
			}
			$cart_by_toko[$item['id_toko']][] = $item;
		}
		// Hitung jumlah toko yang berbeda
		$jumlah_toko = count($cart_by_toko);
	
		// Menghitung biaya
		$tarif_barang = $this->cart->total(); // Total harga barang di keranjang
		$tarif_ongkir = $jumlah_toko * $ongkir_per_toko; // Total ongkir berdasarkan jumlah toko
		$tarif_asuransi = $jumlah_toko * $asuransi_per_toko; // Total asuransi berdasarkan jumlah toko
		$subtotal = $tarif_barang + $tarif_ongkir + $tarif_asuransi + $biaya_aplikasi; // Subtotal sebelum pajak
		$pajak = 0.12 * $subtotal; // Pajak 12%
		$total_tagihan = $subtotal + $pajak; // Total tagihan termasuk pajak
	
		// Menyiapkan kode transaksi
		$kode = $this->Model_kode->generate_kode('transaksi', 'id_transaksi', 'INV', 4);
		if (!$kode) {
			show_error('Gagal menghasilkan kode transaksi');
		}
	
		// Data untuk insert transaksi
		$data = array(
			'id_transaksi' => $kode,
			'id_user' => $id_user,
			'id_alamat' => $id,
			'total_harga_barang' => $tarif_barang,
			'ongkir' => $tarif_ongkir,
			'asuransi' => $tarif_asuransi,
			'biaya_aplikasi' => $biaya_aplikasi,
			'pajak' => $pajak,
			'total_belanja' => $total_tagihan,
			'tanggal_transaksi' => date('Y-m-d H:i:s')
		);
	
		// Insert ke tabel transaksi
		$this->db->insert('transaksi', $data);

		foreach ($this->cart->contents() as $item){
			$kode_detail = $this->Model_kode->generate_kode('detail_transaksi', 'id_detail', 'DTL', 4);
			$data = array(
                'id_detail'    => $kode_detail,
                'id_transaksi'    => $kode,
                'id_barang'        => $item['id'],
				'id_toko' => $item['id_toko'],
                'nama_barang'      => $item['name'],
                'jumlah'        => $item['qty'],
                'harga'         => $item['price'],
            );
            $this->db->insert('detail_transaksi', $data);
			$data['barang'] = $this->Model_barang->detail_barang($item['id'])->row_array();
			$id_barang = $data['barang']['id_barang'];
			$stok = $data['barang']['stok'];
			$data = array(
				'stok'          => $stok-$item['qty']
			);
			$where = array(
				'id_barang' => $id_barang
			);
			$this->Model_barang->update_data($where,$data,'barang');
		}
		foreach ($cart_by_toko as $id_toko => $items) {
			$kode_order = $this->Model_kode->generate_kode('order', 'id_order', 'ODR', 8);
			if (!$kode_order) {
				show_error('Gagal menghasilkan kode Order');
			}
			$total_harga = 0;
			$ongkir = 16000;
			$id_toko = '';
			$id_alamat = $id;
			$status = "Menunggu Konfirmasi";
			foreach($items as $item) {
				$id_toko = $item['id_toko'];
				$total_harga = $total_harga + $item['subtotal'];
			}
			$data = array(
				'id_order' => $kode_order,
				'id_transaksi' => $kode,
				'id_toko' => $id_toko,
				'id_user' => $id_user,
				'id_alamat' => $id_alamat,
				'resi' => 'Belum Tersedia',
				'total_harga' => $total_harga + $ongkir,
				'status_pesanan' => $status,
				'waktu' => time()
			);
			$this->db->insert('order', $data);
			
			foreach ($items as $item) {
				$kode_detail_order = $this->Model_kode->generate_kode('order_detail', 'id_detail', 'ODT', 8);
				if (!$kode_order) {
					show_error('Gagal menghasilkan kode Order');
				}
				$data = array(
					'id_detail' => $kode_detail_order,
					'id_order' => $kode_order,
					'id_barang' => $item['id'],
					'qty' => $item['qty'],
				);
				$this->db->insert('order_detail', $data);
			}
		}
		$this->cart->destroy();
		redirect('dashboard');
	}
	public function selesaikan_pesanan($id){
        $data = array(
            'status_pesanan'          => 'Selesai'
        );
        $where = array(
            'id_order' => $id
        );
        $this->Model_order->update_data($where,$data,'order');
        redirect('dashboard/detail_pesanan/'.$id);
    }
	public function ulasan_produk($id){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['pesanan'] = $this->Model_order->ulasan_produk($id)->result();
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('id_barang', 'id_barang', 'required|trim');
		$this->form_validation->set_rules('id_detail', 'id_detail', 'required|trim');
		$this->form_validation->set_rules('rating', 'rating', 'required|trim');
		$this->form_validation->set_rules('ulasan', 'ulasan', 'required|trim');
		$id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
		if($this->form_validation->run()==false){
		$this->load->view('template/header',$data);
		$this->load->view('template/navbar',$data);
		$this->load->view('ulasan_page',$data);
		$this->load->view('template/footer',$data);
		}
		else{
			$id_user = $data['user']['id_user'];
			$kode = $this->Model_kode->generate_kode('ulasan_produk', 'id_ulasan', 'REV', 8);
			$data = [
				'id_ulasan' =>$kode,
				'nama_user' => htmlspecialchars($this->input->post('nama', true)),
				'id_barang' => htmlspecialchars($this->input->post('id_barang', true)),
				'id_detail' =>htmlspecialchars($this->input->post('id_detail', true)),
				'rating' =>htmlspecialchars($this->input->post('rating', true)),
				'ulasan' =>htmlspecialchars($this->input->post('ulasan', true)),
			];
			$this->db->insert('ulasan_produk',$data);
			$data = array(
				'ulasan_lock'          => '1'
			);
			$where = array(
				'id_detail' => $id
			);
			$this->Model_order->update_data($where,$data,'order_detail');

			$this->session->set_flashdata('message', '<div class="alert
			alert-success" role="alert">Alamat Berhasil ditambahkan!</div>');
			redirect('dashboard/user');
		}
	}
}
