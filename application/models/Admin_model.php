<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function get_paket($id_paket)
    {
        $query = $this->db->get_where('paket', array('id_paket' => $id_paket));
        return $query;
    }
    function get_jenis_barang($id_jnsbrg)
    {
        $query = $this->db->get_where('jenis_barang', array('id_jnsbrg' => $id_jnsbrg));
        return $query;
    }
    function search_user($username)
    {
        $this->db->like('username', $username, 'both');
        $this->db->order_by('username', 'ASC');
        $this->db->limit(10);
        return $this->db->get('user')->result();
    }
    function save_detail($no_nota, $username, $nama, $telepon, $id_paket, $id_jnsbrg, $tgl_selesai, $total, $pembayaran, $status, $Kg, $sub_harga, $sub_harga_jenis)
    {
        $data = array(
            'no_nota' => $no_nota,
            'username' => $username,
            'nama' => $nama,
            'telepon' => $telepon,
            'id_paket' => $id_paket,
            'id_jnsbrg' => $id_jnsbrg,
            'tgl_selesai' => $tgl_selesai,
            'total' => $total,
            'pembayaran' => $pembayaran,
            'status' => $status,
            'Kg' => $Kg,
            'sub_harga' => $sub_harga,
            'sub_harga_jenis' => $sub_harga_jenis,
            'tanggal' => time()
        );
        $this->db->insert('transaksi', $data);
    }
    function get_transaksi()
    {
        $this->db->select('transaksi.*,paket.nama_paket as id_paket,jenis_barang.nama_barang as id_jnsbrg');
        $this->db->from('transaksi');
        $this->db->join('paket', 'paket.id_paket=transaksi.id_paket');
        $this->db->join('jenis_barang', 'jenis_barang.id_jnsbrg=transaksi.id_jnsbrg');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function get_riwayat()
    {
        $this->db->select('transaksi.*,paket.nama_paket as id_paket,jenis_barang.nama_barang as id_jnsbrg');
        $this->db->from('transaksi');
        $this->db->join('paket', 'paket.id_paket=transaksi.id_paket');
        $this->db->join('jenis_barang', 'jenis_barang.id_jnsbrg=transaksi.id_jnsbrg');
        $this->db->where(['username' => $this->session->userdata('username')]);
        $query = $this->db->get();
        return $query->result();
    }
    function get_pesanan()
    {
        $this->db->select('pesanan.*,user.username as id_user,paket.nama_paket as id_paket');
        $this->db->from('pesanan');
        $this->db->join('paket', 'paket.id_paket=pesanan.id_paket');
        $this->db->join('user', 'user.id_user=pesanan.id_user');
        $this->db->order_by('id_pesanan', 'desc');
        $this->db->where('status', 2);
        $query = $this->db->get();
        return $query->result();
    }
    public function ambilData($id)
    {
        $this->db->select("id_transaksi,id_pesanan,total");
        $this->db->from("transaksi");
        $this->db->where("id_transaksi", $id);
        return $this->db->get();
    }
    public function simpanData($id_transaksi, $total)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'total' => $total
        );
        $this->db->insert("detail_pembayaran", $data);
        return true;
    }
    public function updateDetail($id)
    {
        $data = array(
            'tgl_bayar' => date('y-m-d')
        );
        $this->db->where("id_transaksi", $id);
        $this->db->update("detail_pembayaran", $data);
        // return $this->db->get();
    }
    public function updateData($id)
    {
        $data = array(
            'pembayaran' => 'DIBAYAR',
            'status' => 'DIAMBIL'
        );
        $this->db->where("id_transaksi", $id);
        $this->db->update("transaksi", $data);
        // return $this->db->get();
    }
    public function sum()
    {
        $this->db->select_sum('total');
        $result = $this->db->get('transaksi')->row();
        return $result->total;
    }

    public function proses($id)
    {
        $this->db->select('pesanan.*,user.username as id_user,paket.nama_paket as id_paket');
        $this->db->from('pesanan');
        $this->db->join('paket', 'paket.id_paket=pesanan.id_paket');
        $this->db->join('user', 'user.id_user=pesanan.id_user');
        $this->db->where("id_pesanan", $id);
        return $this->db->get();
    }
    function save_proses($no_nota, $username, $nama, $telepon, $id_paket, $id_jnsbrg, $tgl_selesai, $total, $pembayaran, $status, $Kg, $sub_harga, $sub_harga_jenis, $id_pesanan)
    {
        $data = array(
            'no_nota' => $no_nota,
            'username' => $username,
            'nama' => $nama,
            'telepon' => $telepon,
            'id_paket' => $id_paket,
            'id_jnsbrg' => $id_jnsbrg,
            'tgl_selesai' => $tgl_selesai,
            'total' => $total,
            'pembayaran' => $pembayaran,
            'status' => $status,
            'Kg' => $Kg,
            'sub_harga' => $sub_harga,
            'sub_harga_jenis' => $sub_harga_jenis,
            'id_pesanan' => $id_pesanan,
            'tanggal' => time()
        );
        $this->db->insert('transaksi', $data);
    }
    public function proses_pesanan($id_pesanan)
    {
        $data = array(
            'status' => 4
        );
        $this->db->where("id_pesanan", $id_pesanan);
        $this->db->update("pesanan", $data);
        // return $this->db->get();
    }
    public function proses_pengantaran($id_pesanan)
    {
        $data = array(
            'status' => 3
        );
        $this->db->where("id_pesanan", $id_pesanan);
        $this->db->update("pesanan", $data);
        // return $this->db->get();
    }
    function get_invoice($id)
    {
        $this->db->select('transaksi.*,paket.nama_paket as id_paket,jenis_barang.nama_barang as id_jnsbrg');
        $this->db->from('transaksi');
        $this->db->join('paket', 'paket.id_paket=transaksi.id_paket');
        $this->db->join('jenis_barang', 'jenis_barang.id_jnsbrg=transaksi.id_jnsbrg');
        $this->db->where('id_transaksi', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_slaporan($table)
    {
        return $this->db->get($table)->result();
    }

    function get_laporan($table, $start_date, $end_date)
    {
        // $this->db->select('a.total, b.harga');
        // $this->db->from('detail_pembayaran as a');
        // $this->db->from('bahan as b');
        $this->db->where('tgl_bayar >=', $start_date);
        $this->db->where('tgl_bayar <=', $end_date);
        return $this->db->get($table);
    }
}
