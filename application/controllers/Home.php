<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/frontend/header', $data);
        $this->load->view('frontend/home/index', $data);
        $this->load->view('templates/frontend/footer');
    }
    public function profile()
    {
        is_logged_in();
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/frontend/header', $data);
        $this->load->view('frontend/home/profile', $data);
        $this->load->view('templates/frontend/footer');
    }
    public function edit()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', '<div class="alert alert-error" align="center" role="alert">Data Gagal Di Edit</div>');
            redirect('home/profile');
        } else {
            $username = $this->input->post('username');
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat')
            ];

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types']    = 'gif|jpg|png';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->where('username', $username);
            $this->db->update('user', $data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" align="center" role="alert">Data Berhasil Di Edit</div>');
            redirect('home/profile');
        }
    }
    public function riwayat()
    {
        is_logged_in();
        $data['title'] = 'Riwayat Pemesanan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['customer'] = $this->admin_model->get_riwayat();

        $this->load->view('templates/frontend/header', $data);
        $this->load->view('frontend/home/riwayat-pesanan', $data);
        $this->load->view('templates/frontend/footer');
    }
    public function pesan()
    {
        is_logged_in();
        $data['title'] = 'Pemesanan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['paket'] = $this->db->get('paket')->result_array();
        $data['jenis'] = $this->db->get('jenis_barang')->result_array();

        $this->form_validation->set_rules('id_user', 'Id_user', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/frontend/header', $data);
            $this->load->view('frontend/home/pesan', $data);
            $this->load->view('templates/frontend/footer');
        } else {
            $data = [
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'id_user' => $this->input->post('id_user'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon'),
                'id_paket' => $this->input->post('id_paket'),
                'status' => 1
            ];
            $this->db->insert('pesanan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Pesan berhasil, laundry akan di jemput!</div>');
            redirect('home');
        }
    }
}
