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

        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {

            if ($user['is_active'] == 1) {

                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('owner');
                    } else {
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 2) {
                            redirect('admin');
                        } else {
                            $this->session->set_userdata($data);
                            if ($user['role_id'] == 3) {
                                redirect('kurir');
                            } else {
                                $this->session->set_userdata($data);
                                if ($user['role_id'] == 4) {
                                    redirect('home');
                                }
                            }
                        }
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum diaktifkan!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registrasi()
    {

        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'username ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password terlalu pendek'
        ]);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi';
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/auth/footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'telepon' => htmlspecialchars($this->input->post('telepon', true)),
                'image' => ('default.jpg'),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'role_id' => 4,
                'is_active' => 1,
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Berhasil logout!</div>');
        redirect('home');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
