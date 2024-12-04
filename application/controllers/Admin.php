<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index(){
        $data['title'] = 'Administrator';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/footer', $data);
    }
    public function product_management() {
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this->Model_barang->ambil_data_all2()->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/product_management', $data);
        $this->load->view('admin/footer', $data);
    }

    public function kategori(){
        $data['title'] = 'Administrator';
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
        $data['title'] = 'Administrator';
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
        $data['title'] = 'Admin';
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
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->Model_user->tampil_data()->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/user_management', $data);
        $this->load->view('admin/footer', $data);
    }
    public function shop_management() {
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['toko'] = $this->Model_toko->tampil_data()->result();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('admin/shop_management', $data);
        $this->load->view('admin/footer', $data);
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
        $data['title'] = 'Kategori Page';
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
    public function edit_user($id)
    {
        $data['title'] = 'Edit User Page';
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
        $data['title'] = 'Edit User Page';
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
        $data['title'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['order'] =  $this->Model_order->klaim_list2()->result();
        $data['order1'] =  $this->Model_order->klaim_list3()->result();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('admin/list_pengajuan',$data);
        $this->load->view('admin/footer',$data);
    }
    public function detail_pesanan($id)
	{
        $data['title'] = 'Detail Pesanan';
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
        $data['title'] = 'Bukti Transfer';
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
        $data['title'] = 'Toko Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['order'] =  $this->Model_order->klaim_list6($id)->result();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/topbar',$data);
        $this->load->view('shop/bukti_transfer',$data);
        $this->load->view('admin/footer',$data);
    }
}
