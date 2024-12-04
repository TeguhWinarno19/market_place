<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class User_set extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();        
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
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
            $this->load->view('user/edit',$data);
            $this->load->view('template/footer',$data);
        }else{
            $name   = $this->input->post('name');
            $email  = $this->input->post('email');
            $upload_image = $_FILES['image']['name'];
            if($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2040';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')){
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.jpg'){
                        unlink(FCPATH.'assets/img/profile/'.$old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', '<div class="alert
                alert-success" role="alert">Update Profile Success</div>');
                redirect('dashboard/user');
        }
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';
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
            $this->load->view('template/header',$data);
            $this->load->view('template/navbar',$data);
            $this->load->view('user/ubah_password',$data);
            $this->load->view('template/footer',$data);
        }
        else {
            $current_password   = $this->input->post('current_password');
            $new_password       = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert
                alert-danger" role="alert">Wrong Password</div>');
                redirect('user_set/changepassword');
            } else {
                if($current_password == $new_password){
                    $this->session->set_flashdata('message', '<div class="alert
                    alert-danger" role="alert">New Password cannot same!</div>');
                    redirect('user_set/changepassword');
                }
                else{
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert
                    alert-success" role="alert">Password changed!</div>');
                    redirect('user_set/changepassword');
                }
            }
        }
    }
}