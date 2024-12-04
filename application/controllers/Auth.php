<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email'); //rules form email
        $this->form_validation->set_rules('password','Password', 'trim|required'); //rules form password        
        if($this->form_validation->run() == false)
        {
            $data['title'] = "Login Page";
            $this->load->view('auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }
        else
        {
            $this->login();
        }
    }

    private function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();        
        if($user)
        {
            if($user['aktif'] == 1)
            {
                if(password_verify($password, $user['password']))
                {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role'] == 1)
                    {
                        redirect('admin');
                    }
                    else{
                        redirect('dashboard');
                    }
                }
                else
                {
                    $this->session->set_flashdata('message', '<div class="alert
                    alert-danger" role="alert">Pasword anda Salah!</div>');
                    redirect('auth');    
                }
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert
                alert-danger" role="alert">This Email has not activated!</div>');
                redirect('auth');    
            }
        }
        else
        {
            $this->session->set_flashdata('message', '<div class="alert
            alert-danger" role="alert">Email has not registered!</div>');
            redirect('auth');
            
        }
    }
    public function daftar()
	{
        $data['kode'] = $this->Model_kode->generate_kode('user', 'id_user', 'USR', 4);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'email not valid',
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'min_length' => 'Password too short!',
            'matches' => 'Password dont match'
        ]);
        $this->form_validation->set_rules('no_telepon', 'Nomer Telepon', 'required|trim|min_length[10]', [
            'min_length' => 'No Telepon too short!',
        ]);
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|trim|matches[password1]', [
            'matches' => 'Password tidak sama'
        ]);
        if ($this->form_validation->run()==false)
        {
        $this->load->view('auth/header');
        $this->load->view('auth/register',$data);
        $this->load->view('auth/footer');
        }
        else{
                $data = [
                    'id_user' => htmlspecialchars($this->input->post('kode', true)),
                    'nama' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'no_telepon' => htmlspecialchars($this->input->post('no_telepon', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role' => 2,
                    'aktif' => 1,
                    'waktu_daftar' => time(),
                ];
                $this->db->insert('user',$data);
                $this->session->set_flashdata('message', '<div class="alert
                alert-success" role="alert">Conratulation your account has been
                created. Please login!</div>');
                redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
        
    }
}