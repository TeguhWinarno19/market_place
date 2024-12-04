<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatting extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
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
        $data['chats1'] = $this->Model_chat->get_chat_list($id_user);
        $this->form_validation->set_rules('pesan','pesan', 'trim|required');
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('chat_list', $data);
        $this->load->view('template/footer',$data);
    }
    public function toko()
    {
        $data['title'] = 'Toko Saya | oke';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user); // Panggil metode dari model
        $id_toko = $data['toko']->id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $data['chats'] = $this->Model_chat->get_chat_list1($id_toko);
        $this->form_validation->set_rules('pesan','pesan', 'trim|required');
        $this->load->view('shop/header',$data);
        $this->load->view('shop/sidebar',$data);
        $this->load->view('shop/topbar',$data);
        $this->load->view('shop/chat_list', $data);
        $this->load->view('shop/footer',$data);
    }
    public function detail($id_user, $id_toko)
    {
        $data = array(
            'dilihat' => '1'
        );
        $where1 = $id_user;
        $where2 = $id_toko;
        $where3 = $id_toko;
        $this->Model_chat->update_seen1($where1,$where2,$where3,$data,'chat_list');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['chats'] = $this->Model_chat->get_chat_detail($id_user, $id_toko);
        $data['chats1'] = $this->Model_chat->get_chat_list($id_user);
        $data['pengguna']= $id_user;
        $data['toko']= $id_toko;
        $data['to']=$this->Model_chat->toko($id_toko)->result();
        $this->form_validation->set_rules('pesan','pesan', 'trim|required');
        $id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        if($this->form_validation->run() == false){        
            $this->load->view('template/header',$data);
            $this->load->view('template/navbar',$data);
            $this->load->view('chat_detail', $data);
            $this->load->view('template/footer',$data);        
        } else{
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $kode = $this->Model_kode->generate_kode('chat_list', 'id_chat', 'CHT', 7);
            $id_user = $data['user']['id_user'];
            $data = array(
                'id_chat' => $kode,
                'id_user' => $id_user,
                'id_toko' => htmlspecialchars($this->input->post('id_toko', true)),
                'sender' => $id_user,
                'pesan' => htmlspecialchars($this->input->post('pesan', true)),
                'dilihat' =>'0',
                'created_at' => time(),
            );
            
            $this->Model_whistlist->tambah_whistlist($data,'chat_list');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ditambahkan ke Whistlist!</div>');
            redirect('chatting/detail/'.$id_user.'/'.$id_toko);
        }
    }
    public function detail_toko($id_user, $id_toko)
    {
        $data = array(
            'dilihat' => '1'
        );
        $where1 = $id_user;
        $where2 = $id_toko;
        $where3 = $id_user;
        $this->Model_chat->update_seen1($where1,$where2,$where3,$data,'chat_list');
        $data['title'] = 'Toko saya | Kontak Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['chats'] = $this->Model_chat->get_chat_detail($id_user, $id_toko);
        $data['pengguna']= $id_toko;
        $hitung = $this->Model_chat->notif($id_toko)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $target = $id_user;
        $data['lock'] = $id_user;
        $data['id_toko']= $id_toko;
        $data['toko'] = $this->Model_toko->joinKategoriToko($id_user); // Panggil metode dari model
        $data['to']=$this->Model_chat->toko($id_toko)->result();
        $this->form_validation->set_rules('pesan','pesan', 'trim|required');
        if($this->form_validation->run() == false){        
            $this->load->view('shop/header',$data);
            $this->load->view('shop/sidebar',$data);
            $this->load->view('shop/topbar',$data);
            $this->load->view('shop/chat_detail', $data);
            $this->load->view('shop/footer',$data);        
        } else{
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $kode = $this->Model_kode->generate_kode('chat_list', 'id_chat', 'CHT', 7);
            $id_user = $data['user']['id_user'];
            $data = array(
                'id_chat' => $kode,
                'id_user' => $target,
                'id_toko' => htmlspecialchars($this->input->post('id_toko', true)),
                'sender' => $id_toko,
                'pesan' => htmlspecialchars($this->input->post('pesan', true)),
                'dilihat' =>'0',
                'created_at' => time(),
            );
            
            $this->Model_whistlist->tambah_whistlist($data,'chat_list');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ditambahkan ke Whistlist!</div>');
            redirect('chatting/detail_toko/'.$target.'/'.$id_toko);
        }
    }
    public function start($id_toko,$id_barang){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['chat_list']=$this->Model_chat->chat_list($id_user);
        $data['id_toko'] = $id_toko;
        $data['id_barang'] = $id_barang;
        $data['toko']=$this->Model_chat->toko($id_toko)->result();
        $data['barang'] = $this->Model_barang->detail_barang($id_barang)->result();
        $id_user = $data['user']['id_user'];
        $hitung = $this->Model_chat->notif2($id_user)->result();
        $jumlah_notif = 0;
        if(!empty($hitung)){
            foreach($hitung as $h):
                $jumlah_notif = $jumlah_notif+1;
            endforeach;
        }
        $data['notifikasi'] = $jumlah_notif;
        $this->form_validation->set_rules('pesan','pesan', 'trim|required');
        if($this->form_validation->run() == false){
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('chat/chat', $data);
            $this->load->view('template/footer', $data);
        }
        else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $kode = $this->Model_kode->generate_kode('chat_list', 'id_chat', 'CHT', 7);
            $id_user = $data['user']['id_user'];
            $data = array(
                'id_chat' => $kode,
                'id_user' => $id_user,
                'id_toko' => htmlspecialchars($this->input->post('id_toko', true)),
                'sender' => $id_user,
                'pesan' => htmlspecialchars($this->input->post('pesan', true)),
                'dilihat' =>'0',
                'id_barang' => htmlspecialchars($this->input->post('id_barang', true)),
                'created_at' => time(),
            );
            
            $this->Model_whistlist->tambah_whistlist($data,'chat_list');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Ditambahkan ke Whistlist!</div>');
            redirect('dashboard');
            
        }
    } 

}