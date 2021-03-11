<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kurir_model', 'kurir_model');
    }
    public function index()
    {
        $data['title'] = 'Penjemputan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penjemputan'] = $this->kurir_model->get_penjemputan();

        $this->template->load('templates/master', 'backend/kurir/penjemputan', $data);
    }
    public function penjemputan()
    {
        $data['title'] = 'Penjemputan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['penjemputan'] = $this->kurir_model->get_penjemputan();

        $this->template->load('templates/master', 'backend/kurir/penjemputan', $data);
    }
    public function pengantaran()
    {
        $data['title'] = 'Pengantaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengantaran'] = $this->kurir_model->get_pengantaran();

        $this->template->load('templates/master', 'backend/kurir/pengantaran', $data);
    }
    public function selesai_penjemputan($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', 'Gagal di Selesaikan');
            redirect('kurir/penjemputan');
        } else {
            $this->kurir_model->ambilData($id); {
                $this->kurir_model->selesai_penjemputan($id);
                $this->session->set_flashdata('message', 'di Selesaikan');
                redirect('kurir/penjemputan');
            }
        }
    }
    public function selesai_pengantaran($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', 'Gagal di Selesaikan');
            redirect('kurir/pengantaran');
        } else {
            $this->kurir_model->ambilData($id); {
                $this->kurir_model->selesai_pengantaran($id);
                $this->session->set_flashdata('message', 'di Selesaikan');
                redirect('kurir/pengantaran');
            }
        }
    }
}
