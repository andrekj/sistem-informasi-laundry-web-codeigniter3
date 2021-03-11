<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin_model');
        $this->load->model('M_invoice', 'm_invoice');
        $this->load->model('Chart_model', 'chart_model');
    }

    public function index()
    {
        $data['title'] = 'Admin';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['total_user'] = $this->db->where('role_id', 4)->from("user")->count_all_results();
        $data['baru'] = $this->db->where('status', 'baru')->from("transaksi")->count_all_results();
        $data['proses'] = $this->db->where('status', 'proses')->from("transaksi")->count_all_results();
        $data['selesai'] = $this->db->where('status', 'selesai')->from("transaksi")->count_all_results();
        $data['diambil'] = $this->db->where('status', 'diambil')->from("transaksi")->count_all_results();
        $data['total_transaksi'] = $this->db->count_all('transaksi');
        $x = $this->chart_model->get_data()->result();
        $data['chart'] = json_encode($x);

        $this->template->load('templates/master', 'backend/admin/index', $data);
    }
    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesanan'] = $this->admin_model->get_pesanan();

        $this->template->load('templates/master', 'backend/admin/pesanan', $data);
    }
    public function transaksi()
    {
        $data['title'] = 'Transaksi';
        $data['transaksii'] = $this->db->get('transaksi')->result_array();
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $data['detail'] = $this->db->get('detail_cucian')->result_array();
        $data['transaksi'] = $this->admin_model->get_transaksi();

        $this->template->load('templates/master', 'backend/admin/transaksi', $data);
    }
    public function transaksibaru()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['paket'] = $this->db->get('paket')->result_array();
        $data['jenis'] = $this->db->get('jenis_barang')->result_array();
        $data['invoice'] = $this->m_invoice->get_no_invoice();

        $this->template->load('templates/master', 'backend/admin/transaksi-baru', $data);
    }
    public function statustransaksi()
    {
        $this->form_validation->set_rules('id_transaksi', 'Id_transaksi', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Gagal Diubah');
            redirect('admin/transaksi');
        } else {
            $id = $this->input->post('id_transaksi');
            $data = [
                'status' => $this->input->post('status'),
            ];
            $this->db->where('id_transaksi', $id);
            $this->db->update('transaksi', $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('admin/transaksi');
        }
    }
    public function selesai($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', 'Gagal di Selesaikan');
            redirect('admin/transaksi');
        } else {
            $result_data = $this->admin_model->ambilData($id);
            foreach ($result_data->result() as $rows_data) {
                    $id_transaksi = $rows_data->id_transaksi;
                    $id_pesanan =  $rows_data->id_pesanan;
                    $total = $rows_data->total;
                $insert_data = $this->admin_model->simpanData($id_transaksi, $total);
                if ($insert_data == true) {
                    $this->admin_model->updateDetail($id);
                    $this->admin_model->updateData($id);
                    $this->admin_model->proses_pengantaran($id_pesanan);
                    $this->session->set_flashdata('message', 'di Selesaikan');
                    redirect('admin/transaksi');
                }
            }
        }
    }
    function save_detail()
    {
        $no_nota   = $this->input->post('no_nota', TRUE);
        $username   = $this->input->post('username', TRUE);
        $nama   = $this->input->post('nama', TRUE);
        $telepon   = $this->input->post('telepon', TRUE);
        $id_paket   = $this->input->post('id_paket', TRUE);
        $id_jnsbrg   = $this->input->post('id_jnsbrg', TRUE);
        $tgl_selesai   = $this->input->post('tgl_selesai', TRUE);
        $total   = $this->input->post('total', TRUE);
        $pembayaran   = $this->input->post('pembayaran', TRUE);
        $status   = $this->input->post('status', TRUE);
        $Kg   = $this->input->post('Kg', TRUE);
        $sub_harga  = $this->input->post('sub_harga', TRUE);
        $sub_harga_jenis   = $this->input->post('sub_harga_jenis', TRUE);
        $this->admin_model->save_detail($no_nota, $username, $nama, $telepon, $id_paket, $id_jnsbrg, $tgl_selesai, $total, $pembayaran, $status, $Kg, $sub_harga, $sub_harga_jenis);
        $this->session->set_flashdata('message', 'Ditambah');
        redirect('admin/transaksi');
    }
    public function get_paket()
    {
        $id_paket = $this->input->post('id', TRUE);
        $data = $this->admin_model->get_paket($id_paket)->result();
        echo json_encode($data);
    }
    public function get_jenis_barang()
    {
        $id_jnsbrg = $this->input->post('id', TRUE);
        $data = $this->admin_model->get_jenis_barang($id_jnsbrg)->result();
        echo json_encode($data);
    }
    public function get_user()
    {
        if (isset($_GET['term'])) {
            $result = $this->admin_model->search_user($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'         => $row->username,
                        'description'   => $row->nama,
                        'tele'          => $row->telepon,
                    );
                echo json_encode($arr_result);
            }
        }
    }
    public function proses()
    {
        $id = $this->uri->segment(3);
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['paket'] = $this->db->get('paket')->result_array();
        $data['jenis'] = $this->db->get('jenis_barang')->result_array();
        $data['invoice'] = $this->m_invoice->get_no_invoice();
        $data['query'] = $this->admin_model->proses($id);
        $this->template->load('templates/master', 'backend/admin/transaksi-on', $data);
    }
    public function save_proses()
    {
        $no_nota   = $this->input->post('no_nota', TRUE);
        $username   = $this->input->post('username', TRUE);
        $nama   = $this->input->post('nama', TRUE);
        $telepon   = $this->input->post('telepon', TRUE);
        $id_paket   = $this->input->post('id_paket', TRUE);
        $id_jnsbrg   = $this->input->post('id_jnsbrg', TRUE);
        $tgl_selesai   = $this->input->post('tgl_selesai', TRUE);
        $total   = $this->input->post('total', TRUE);
        $pembayaran   = $this->input->post('pembayaran', TRUE);
        $status   = $this->input->post('status', TRUE);
        $Kg   = $this->input->post('Kg', TRUE);
        $sub_harga  = $this->input->post('sub_harga', TRUE);
        $sub_harga_jenis   = $this->input->post('sub_harga_jenis', TRUE);
        $id_pesanan = $this->input->post('id_pesanan',TRUE);
        $this->admin_model->proses_pesanan($id_pesanan);
        $this->admin_model->save_proses($no_nota, $username, $nama, $telepon, $id_paket, $id_jnsbrg, $tgl_selesai, $total, $pembayaran, $status, $Kg, $sub_harga, $sub_harga_jenis, $id_pesanan);
        $this->session->set_flashdata('message', 'Ditambah');
        redirect('admin/transaksi');
    }
    public function invoice()
    {
        $id = $this->uri->segment(3);
        $data['transaksi'] = $this->admin_model->get_invoice($id);
        $this->load->view('backend/admin/invoice_k', $data);
    }
    public function invoice_b()
    {
        $id = $this->uri->segment(3);
        $data['transaksi'] = $this->admin_model->get_invoice($id);
        $this->load->view('backend/admin/invoice_b', $data);
    }
}
