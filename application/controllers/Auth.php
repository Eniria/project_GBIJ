<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasinya lolos
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $dashboard = $this->db->get_where('user', ['email' => $email])->row_array();

        //jika usernya ada
        if ($dashboard) {
            //pengecekan jika usernya aktif
            if ($dashboard['is_active'] == 1) {
                //cek password
                if (password_verify($password, $dashboard['password'])) {
                    $data = [
                        'email' => $dashboard['email'],
                        'role_id' => $dashboard['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($dashboard['role_id'] == 1) {
                        redirect('dashboard');
                    } else {
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                   Wrong password! </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
               This email has not been activated </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Email is not registered! </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        // if (!$this->session->userdata('email')) {
        //     redirect('auth');
        // }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!' //mengubah kalimat peringatan
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'GBIJ Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! your Account has been created. Please Login! </div>');

            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           You have been logged out! </div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

    // public function forgotPassword()
    // {
    //     //kalau reset passwordnya gagal
    //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Forgot Password';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/forgot_password');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $email = $this->input->post('email');
    //         $user =  $this->db->get_where('user', ['email' => $email])->row_array();

    //         if ($user) {
    //             $token = base64_encode(random_bytes(32));
    //             $user_token = [
    //                 'email' => $email,
    //                 'token' => $token,
    //                 'date_created' => time()
    //             ];
    //             $this->db->insert('user_token', $user_token);
    //             // $this->_sendEmail($token, 'forgot');

    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //            Cek email anda untuk mereset password! </div>');
    //             redirect('auth/forgotpassword');
    //         }
    //     }
    //     //      else {
    //     //         //ketika email belum terdaftar
    //     //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //     //    Email anda belum terdaftar! </div>');
    //     //         redirect('auth/forgotpassword');
    //     //     }
    // }
}
