<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Chart_model', 'chart_model');
        $this->load->model('Admin_model', 'admin_model');
    }

    public function index()
    {
        $data['title'] = 'Owner';
        $data['total_user'] = $this->db->where('role_id', 4)->from("user")->count_all_results();
        $data['total'] = $this->admin_model->sum();
        $data['baru'] = $this->db->where('status', 'baru')->from("transaksi")->count_all_results();
        $data['proses'] = $this->db->where('status', 'proses')->from("transaksi")->count_all_results();
        $data['selesai'] = $this->db->where('status', 'selesai')->from("transaksi")->count_all_results();
        $data['diambil'] = $this->db->where('status', 'diambil')->from("transaksi")->count_all_results();
        $data['total_transaksi'] = $this->db->count_all('transaksi');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $x = $this->chart_model->get_data()->result();
        $data['chart'] = json_encode($x);
        $data['transaksi'] = $this->admin_model->get_transaksi();

        $this->template->load('templates/master', 'backend/owner/index', $data);
    }

    public function report()
    {
        $datauser = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data_laporan = $this->admin_model->get_slaporan("laporan");
        $data = array(
			'title' => 'Laporan', 
            'data'  =>  $data_laporan,
            'user'   =>  $datauser);
        $this->template->load('templates/master', 'backend/owner/report', $data);
        
    }

    public function search(){
		$valid = $this->form_validation;
		$valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('start_date', 'Field Start Date', 'required|trim|strip_tags|htmlspecialchars');
		$valid->set_rules('end_date', 'Field Start Date', 'required|trim|strip_tags|htmlspecialchars');
		
		if ($valid->run() === TRUE)
        {
			$input = $this->input->post(NULL, TRUE);
			$data = $this->admin_model->get_laporan("laporan",$input["start_date"], $input["end_date"]);
			return $this->response([
                    'data'      => array_values($data)
        	]);
		} else return  $this->response(['success' => FALSE, 'error' => validation_errors()]);
	}

	public function response($data)
    {
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit();
    }

    public function rolemenu()
    {
        $data['title'] = 'Role & Menu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['role'] = $this->db->get('user_role')->result_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['subMenu'] = $this->menu->getSubMenu();

        $this->template->load('templates/master', 'backend/owner/role-menu', $data);
    }


    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->template->load('templates/master', 'backend/owner/role-access', $data);
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', 'Diubah');
    }
    public function menu()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/master', 'backend/owner/role-menu');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('owner/rolemenu');
        }
    }
    public function submenu()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/master', 'backend/owner/role-menu');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('owner/rolemenu');
        }
    }
    public function editsub()
    {
        $this->form_validation->set_rules('id', 'Id', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Gagal Diubah');
            redirect('owner/rolemenu');
        } else {
            $id = $this->input->post('id');
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('owner/rolemenu');
        }
    }
    public function hapussub($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', 'Gagal Dihapus');
            redirect('owner/rolemenu');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('user_sub_menu');
            $this->session->set_flashdata('message', "Dihapus");
            redirect('owner/rolemenu');
        }
    }
    public function Paket()
    {
        $data['title'] = 'Paket';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['paket'] = $this->db->get('paket')->result_array();

        $this->form_validation->set_rules('nama_paket', 'Nama_paket', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/master', 'backend/owner/paket', $data);
        } else {
            $data = [
                'nama_paket' => $this->input->post('nama_paket'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->insert('paket', $data);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('owner/paket');
        }
    }
    public function Editpaket()
    {
        $this->form_validation->set_rules('id_paket', 'Id_paket', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Gagal Diubah');
            redirect('owner/paket');
        } else {
            $id = $this->input->post('id_paket');
            $data = [
                'nama_paket' => $this->input->post('nama_paket'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->where('id_paket', $id);
            $this->db->update('paket', $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('owner/paket');
        }
    }
    public function Hapuspaket($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', 'Gagal Dihapus');
            redirect('owner/paket');
        } else {
            $this->db->where('id_paket', $id);
            $this->db->delete('paket');
            $this->session->set_flashdata('message', "Dihapus");
            redirect('owner/paket');
        }
    }
    public function Bahan()
    {
        $data['title'] = 'Pembelian Bahan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['bahan'] = $this->db->get('bahan')->result_array();

        $this->form_validation->set_rules('nama_bahan', 'Nama_bahan', 'required');
        $this->form_validation->set_rules('tgl_pembelian', 'Tgl_pembelian', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/master', 'backend/owner/bahan', $data);
        } else {
            $data = [
                'nama_bahan' => $this->input->post('nama_bahan'),
                'tgl_pembelian' => $this->input->post('tgl_pembelian'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->insert('bahan', $data);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('owner/bahan');
        }
    }
    public function Jenis()
    {
        $data['title'] = 'Jenis Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenis'] = $this->db->get('jenis_barang')->result_array();

        $this->form_validation->set_rules('nama_barang', 'Nama_barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/master', 'backend/owner/jenis', $data);
        } else {
            $data = [
                'nama_barang' => $this->input->post('nama_barang'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->insert('jenis_barang', $data);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('owner/jenis');
        }
    }
    public function Editjenis()
    {
        $this->form_validation->set_rules('id_jnsbrg', 'Id_jnsbrg', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Gagal Diubah');
            redirect('owner/jenis');
        } else {
            $id = $this->input->post('id_jnsbrg');
            $data = [
                'nama_barang' => $this->input->post('nama_barang'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->where('id_jnsbrg', $id);
            $this->db->update('jenis_barang', $data);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('owner/jenis');
        }
    }
    public function Hapusjenis($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', 'Gagal Dihapus');
            redirect('owner/jenis');
        } else {
            $this->db->where('id_jnsbrg', $id);
            $this->db->delete('jenis_barang');
            $this->session->set_flashdata('message', "Dihapus");
            redirect('owner/jenis');
        }
    }
}
