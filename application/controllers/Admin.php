<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }
    public function index(){
        $data['title'] = 'Administrator | Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $all_user = $this->Model_user->tampil_data()->result();
        $jumlah_user = 0;
        $user_aktif = 0;
        $user_admin = 0;
        $toko_toktok = 0;
        foreach ($all_user as $u) :
            if($u->aktif == 1){$user_aktif = $user_aktif+1;}
            if($u->role == 1){$user_admin = $user_admin+1;}
            $jumlah_user = $jumlah_user+1;
            $toko_user = $this->Model_toko->ambil_toko_by_user($u->id_user);
            if(!empty($toko_user)){
                $toko_toktok = $toko_toktok+1;
            }
        endforeach;
        $total_barang_count = 0;
        $total_barang_array = $this->Model_barang->ambil_data_all2()->result();
        foreach ($total_barang_array as $b):
            $total_barang_count = $total_barang_count + 1;
        endforeach;
        $total_pesanan_count = 0;
        $total_pesanan_array = $this->Model_order->all_pesanan()->result();
        foreach ($total_pesanan_array as $o):
            $total_pesanan_count = $total_pesanan_count + 1;
        endforeach;
        $selesai = 0;
        $proses = 0;
        $batal = 0;
        $waiting = 0;
        $dikirim = 0;
        $tiba = 0;
        foreach ($total_pesanan_array as $o):
            if ($o->status_pesanan == 'Batal'){
                $batal++;
            } else if($o->status_pesanan == 'Diproses'){
                $proses++;
            } else if($o->status_pesanan == 'Dikirim'){
                $dikirim++;
            } else if($o->status_pesanan == 'Tiba Tujuan'){
                $tiba++;
            } else if($o->status_pesanan == 'Menunggu Konfirmasi'){
                $waiting;
            } else {
                $selesai++;
            }
        endforeach;
        $data['menunggu_value']= $waiting;
        $data['proses_value']= $proses;
        $data['dikirim_value']= $dikirim;
        $data['tiba_value']= $tiba;
        $data['selesai_value']= $selesai;
        $data['batal_value']= $batal;
        $data['total_barang_pesan'] = $total_pesanan_count;
        $data['jumlah_toktok'] = $toko_toktok;
        $data['total_pengguna'] = $jumlah_user;
        $data['barang_count'] = $total_barang_count;
        $data['top_selling_items'] = $this->Model_barang->get_top_selling_items();
        $data['labels_user_aktif'] = json_encode(['User aktif', 'User Nonaktif']);
        $data['values_user_aktif'] = json_encode([$user_aktif, $jumlah_user-$user_aktif]);
        $data['labels_user_role'] = json_encode(['admin', 'User']);
        $data['values_user_role'] = json_encode([$user_admin, $jumlah_user-$user_admin]);
        $data['labels_user_toko'] = json_encode(['User punya toko', 'User tanpa toko']);
        $data['values_user_toko'] = json_encode([$toko_toktok, $jumlah_user-$toko_toktok]);
        $data['labels_pesanan'] = json_encode(['order selesai', 'order batal','waiting Konfirmation','sedang dikirim','Tiba tujuan','Diproses']);
        $data['values_pesanan'] = json_encode([$selesai, $batal, $waiting,$dikirim,$tiba,$proses]);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer', $data);
    }
    public function ubah_nonaktif($id){
        $data = array(
            'aktif'      => '0'
        );
        $where = array(
            'id_user' => $id
        );
        $this->Model_user->update_data($where,$data,'user');
        redirect('admin/user_management');
    }
    public function ubah_nonaktif_barang($id){
        $data = array(
            'status_barang'      => 'nonaktif'
        );
        $where = array(
            'id_barang' => $id
        );
        $this->Model_user->update_data($where,$data,'barang');
        redirect('admin/product_management');
    }
    public function ubah_nonaktif_shop($id){
        $data = array(
            'status'      => '1'
        );
        $where = array(
            'id_toko' => $id
        );
        $this->Model_user->update_data($where,$data,'toko');
        redirect('admin/shop_management');
    }
    public function ubah_aktif($id){
        $data = array(
            'aktif'      => '1'
        );
        $where = array(
            'id_user' => $id
        );
        $this->Model_user->update_data($where,$data,'user');
        redirect('admin/user_management');
    }
    public function ubah_aktif_barang($id){
        $data = array(
            'status_barang'      => 'aktif'
        );
        $where = array(
            'id_barang' => $id
        );
        $this->Model_user->update_data($where,$data,'barang');
        redirect('admin/product_management');
    }
    public function ubah_aktif_shop($id){
        $data = array(
            'status'      => '0'
        );
        $where = array(
            'id_toko' => $id
        );
        $this->Model_user->update_data($where,$data,'toko');
        redirect('admin/shop_management');
    }
    public function product_management() {
        $data['title'] = 'Administrator | Product Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->Model_barang->ambil_data_all()->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/product_management', $data);
        $this->load->view('admin/footer', $data);
    }

    public function kategori(){
        $data['title'] = 'Administrator | Kategori';
        $data['kategori'] = $this->Model_kategori->ambil_data()->result();
        $data['favorit'] = $this->Model_kategori->ambil_data_favorit()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/kategori', $data);
        $this->load->view('admin/footer', $data);
    }
    public function produk_pilihan(){
        $data['title'] = 'Administrator | Produk Pilihan';
		$data['barang'] = $this->Model_barang->ambil_data_all2()->result();
		$data['pilihan'] = $this->Model_barang->ambil_data_all3()->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/produk_pilihan', $data);
        $this->load->view('admin/footer', $data);
    }

    public function tambah_aksi(){
        $data['title'] = 'Administrator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kode = $this->Model_kode->generate_kode('kategori', 'id_kategori', 'KTG', 4);
        $nama_kategori = $this->input->post('nama_kategori');
        $gambar_kategori = $_FILES['gambar_kategori']['name'];
        // Cek apakah gambar diunggah
        if ($gambar_kategori != '') {
            $config['upload_path']   = './assets/img/kategori';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name']     = uniqid(); // Gunakan nama file unik

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar_kategori')) {
                echo 'Gambar gagal diunggah: ' . $this->upload->display_errors();
            } else {
                // Dapatkan nama file yang diunggah
                $gambar_kategori = $this->upload->data('file_name');

                // Resize gambar menjadi 200x200
                $config_resize['image_library'] = 'gd2';
                $config_resize['source_image'] = './assets/img/kategori/' . $gambar_kategori;
                $config_resize['maintain_ratio'] = TRUE;
                $config_resize['width'] = 100;
                $config_resize['height'] = 100;

                $this->load->library('image_lib', $config_resize);

                // Jalankan proses resize
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
            }
        }

        // Simpan data ke database
        $data = array(
            'id_kategori' => $kode,
            'kategori' => $nama_kategori,
            'gambar_kategori' => $gambar_kategori
        );

        $this->Model_barang->tambah_barang($data, 'kategori');
        redirect('admin/kategori');
    }
    public function tambahkan_favorit($id){
        $data = array(
            'id_kategori' => $id
        );
        $this->Model_kategori->tambah_kategori_favorit($data,'kategori_favorit');
        redirect('admin/kategori','refresh');
    }
    public function hapus_favorit($id){
        $where = array('id_kategori' => $id);
        $this->Model_kategori->hapus_data_favorit($where, 'kategori_favorit');
        redirect('admin/kategori');
    }
    public function user_management() {
        $data['title'] = 'Administrator | User Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->Model_user->tampil_data()->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/user_management', $data);
        $this->load->view('admin/footer', $data);
    }
    public function shop_management() {
        $data['title'] = 'Administrator | Shop Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['toko'] = $this->Model_toko->tampil_data()->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/shop_management', $data);
        $this->load->view('admin/footer', $data);
    }
    public function cetak_product_management(){
		$data['barang'] = $this->Model_barang->ambil_data_all()->result();
		$this->load->view('cetak/cetak_data_barang', $data);
	}
    public function excel_product_management() 
    {
        $data = array('title' => 'Laporan Data barang',
        'barang' => $this->Model_barang->ambil_data_all()->result_array());
        $this->load->view('cetak/export-excel-barang', $data); 
    }
    public function excel_shop_management() 
    {
        $data = array('title' => 'Laporan Data Toko',
        'toko' => $this->Model_toko->tampil_data()->result_array());
        $this->load->view('cetak/export-excel-shop', $data); 
    }
    public function excel_user_management() 
    {
        $data = array('title' => 'Laporan Data Pengguna',
        'pengguna' => $this->Model_user->tampil_data()->result_array());
        $this->load->view('cetak/export-excel-user', $data); 
    }
    public function cetak_user_management(){
		$data['pengguna'] = $this->Model_user->tampil_data()->result();;
		$this->load->view('cetak/cetak_data_user', $data);
	}
    public function cetak_shop_management(){
		$data['shop'] = $this->Model_toko->tampil_data()->result();;
		$this->load->view('cetak/cetak_data_toko', $data);
	}
    public function tambah_pilihan($id){
        $data = array(
            'id_barang' => $id
        );
        $this->Model_barang->tambah_pilihan($data,'pilihan');
        redirect('admin/produk_pilihan','refresh');
    }
    public function hapus_pilihan($id){
        $where = array('id_barang' => $id);
        $this->Model_kategori->hapus_data_favorit($where, 'pilihan');
        redirect('admin/produk_pilihan');
    }
    public function edit_kategori($id)
    {
        $data['title'] = 'Administrator | Edit Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->Model_kategori->detail_kategori($id)->result();
        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required|trim');
        if($this->form_validation->run() == false){
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/topbar',$data);
            $this->load->view('admin/edit_kategori',$data);
            $this->load->view('admin/footer',$data);
        }
        else {
            $this->update_kategori();
        }
    }
    public function update_kategori()
    {
        $id                 = $this->input->post('id_kategori');
        $nama_kategori           = $this->input->post('nama_kategori');
        $old_image               = $this->input->post('old');
        $upload_image = $_FILES['image']['name'];
        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2040';
            $config['upload_path'] = './assets/img/kategori/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')){
                if($old_image != 'default.jpg'){
                    unlink(FCPATH.'assets/img/kategori/'.$old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar_kategori', $new_image);
            }else{
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'kategori'      => $nama_kategori
        );
        $where = array(
            'id_kategori' => $id
        );
        $this->Model_kategori->update_data($where,$data,'kategori');
        redirect('admin/kategori');
    }
    public function hapus_kategori($id)
    {
        $data = array(
            'status_kategori'      => '1'
        );
        $where = array(
            'id_kategori' => $id
        );
        $this->Model_kategori->update_data($where,$data,'kategori');
        redirect('admin/hapus_favorit/'.$id);
    }
    public function edit_user($id)
    {
        $data['title'] = 'Administrator | Edit Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->Model_user->detail_user($id)->result();
        $this->form_validation->set_rules('nama_user', 'nama_user', 'required|trim');
        $this->form_validation->set_rules('no_telepon', 'nama_user', 'required|trim');
        if($this->form_validation->run() == false){
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/topbar',$data);
            $this->load->view('admin/edit_user',$data);
            $this->load->view('admin/footer',$data);
        }
        else {
            $this->update_user();

        }
    }
    public function update_user(){
        $id_user                = $this->input->post('id_user');
        $nama_user              = $this->input->post('nama_user');
        $old_image              = $this->input->post('old');
        $no_telepon             = $this->input->post('no_telepon');
        $email                  = $this->input->post('email');
        $aktif                  = $this->input->post('aktif');
        $role                  = $this->input->post('role');
        
        $upload_image = $_FILES['image']['name'];
        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2040';
            $config['upload_path'] = './assets/img/profile/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')){
                if($old_image != 'default.jpg'){
                    unlink(FCPATH.'assets/img/profile/'.$old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            }else{
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'nama'         => $nama_user,
            'no_telepon'        => $no_telepon,
            'aktif'        => $aktif,
            'role'              => $role
        );
        $where = array(
            'id_user' => $id_user
        );
        $this->Model_user->update_data($where,$data,'user');
        redirect('admin/user_management');
    }
    public function edit_toko($id)
    {
        $data['title'] = 'Administrator | Edit Toko';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['toko'] = $this->Model_toko->toko_by_id($id);
        $this->form_validation->set_rules('toko', 'toko', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim');
        $this->form_validation->set_rules('kota', 'kota', 'required|trim');
        $this->form_validation->set_rules('status', 'status', 'required|trim');
        $this->form_validation->set_rules('bank', 'bank', 'required|trim');
        $this->form_validation->set_rules('no_rekening', 'no_rekening', 'required|trim');
        if($this->form_validation->run() == false){
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/topbar',$data);
            $this->load->view('admin/edit_toko',$data);
            $this->load->view('admin/footer',$data);
        }
        else {
            $this->update_toko();

        }
    }
    public function update_toko(){
        $id_toko                = $this->input->post('id_toko');
        $nama_toko              = $this->input->post('toko');
        $old_image              = $this->input->post('old');
        $id_kota                = $this->input->post('kota');
        $bank                   = $this->input->post('bank');
        $no_rekening            = $this->input->post('no_rekening');
        $status                 = $this->input->post('status');
        $upload_image = $_FILES['image']['name'];
        if($upload_image){
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2040';
            $config['upload_path'] = './assets/img/profile_toko/';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')){
                if($old_image != 'default.jpg'){
                    unlink(FCPATH.'assets/img/profile_toko/'.$old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('logo_toko', $new_image);
            }else{
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'nama_toko'         => $nama_toko,
            'no_rekening'        => $no_rekening,
            'status'        => $status,
            'bank'        => $bank,
            'id_kota'              => $id_kota
        );
        $where = array(
            'id_toko' => $id_toko
        );
        $this->Model_toko->update_data($where,$data,'toko');
        redirect('admin/shop_management');
    }
    public function klaim_dana(){
        $data['title'] = 'Administrator | Laman Klaim dana';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['order'] =  $this->Model_order->klaim_list2()->result();
        $data['order1'] =  $this->Model_order->klaim_list3()->result();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/list_pengajuan',$data);
        $this->load->view('admin/footer',$data);
    }
    public function order_list(){
        $data['title'] = 'Administrator | Daftar Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['order'] =  $this->Model_order->all_pesanan()->result();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/list_order',$data);
        $this->load->view('admin/footer',$data);
    }
    public function invoice_list(){
        $data['title'] = 'Administrator | Daftar Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] =  $this->Model_invoice->all_invoice()->result();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/list_invoice',$data);
        $this->load->view('admin/footer',$data);
    }
    public function detail_invoice($id)
	{
        $data['title'] = 'Administrator | Detail Invoice';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['invoice'] = $this->Model_invoice->detail_invoice($id)->result();
		$data['pesanan'] = $this->Model_invoice->detail_pesanan($id)->result();
		$id_user = $data['user']['id_user'];
		$data['id_invoice_ini'] = $id;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('detail_invoice',$data);
		$this->load->view('admin/footer');
	}
    public function detail_pesanan($id)
	{
        $data['title'] = 'Administrator | Detail Pesanan';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['invoice'] = $this->Model_order->data_invoice($id)->result();
		$data['pesanan'] = $this->Model_order->pesanan_detail($id)->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/topbar',$data);
		$this->load->view('detail_pesanan',$data);
		$this->load->view('admin/footer');
	}
    public function bukti_transfer($id)
	{
        $data['title'] = 'Administrator | Input Bukti Transfer';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['id_order'] = $id;
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/bukti_transfer',$data);
        $this->load->view('admin/footer');
	}
    public function proses_transaksi($id){
        $gambar         = $_FILES['gambar']['name'];
        // Cek apakah gambar diunggah
        if ($gambar != '') {
            $config['upload_path']   = './assets/img/bukti_transfer';
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
                $config_resize['source_image'] = './assets/img/bukti_transfer/' . $gambar;
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
            'status'                    =>'disetujui',
            'gambar'                    => $gambar
        );
        $where = array(
            'id_order' => $id
        );
        $this->Model_order->update_data($where,$data,'klaim_dana_toko');
        redirect('admin/klaim_dana');
    }
    public function lihat_bukti($id){
        $data['title'] = 'Administrator | Bukti Transfer';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['order'] =  $this->Model_order->klaim_list6($id)->result();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('shop/bukti_transfer',$data);
        $this->load->view('admin/footer',$data);
    }
    public function edit_barang($id)
    {
        $data['title'] = 'Administrator | Edit Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['barang'] = $this->Model_barang->detail_barang($id)->result();
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'required|trim');
		$this->form_validation->set_rules('kondisi', 'kondisi', 'required|trim');
		$this->form_validation->set_rules('harga', 'harga', 'required|trim');
		$this->form_validation->set_rules('stok', 'stok', 'required|trim');
        if ($this->form_validation->run()==false){
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('admin/footer');
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
        redirect('admin/product_management');
    }
    public function profile(){
        $data['title'] = 'Administrator | Profile Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();	
		$id_user = $data['user']['id_user'];
        $this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/topbar', $data);
		$this->load->view('admin/admin_profile', $data); // Pastikan 'user' view bisa menampilkan $toko
		$this->load->view('admin/footer');
    }
    public function changepassword()
    {
        $data['title'] = 'Administrator | Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->form_validation->set_rules('current_password','Current Password','required|trim');
        $this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2','Confirm Password','required|trim|min_length[3]|matches[new_password1]');
        if($this->form_validation->run() == false){
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/topbar',$data);
            $this->load->view('admin/ubah_password',$data);
            $this->load->view('admin/footer',$data);
        }
        else {
            $current_password   = $this->input->post('current_password');
            $new_password       = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert
                alert-danger" role="alert">Wrong Password</div>');
                redirect('admin/changepassword');
            } else {
                if($current_password == $new_password){
                    $this->session->set_flashdata('message', '<div class="alert
                    alert-danger" role="alert">New Password cannot same!</div>');
                    redirect('admin/changepassword');
                }
                else{
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert
                    alert-success" role="alert">Password changed!</div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }
}
