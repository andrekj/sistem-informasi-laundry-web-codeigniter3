<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir_model extends CI_Model
{
function get_penjemputan()
    {
        $this->db->select('pesanan.*,user.username as id_user,paket.nama_paket as id_paket');
        $this->db->from('pesanan');
        $this->db->join('paket', 'paket.id_paket=pesanan.id_paket');
        $this->db->join('user', 'user.id_user=pesanan.id_user');
        $this->db->order_by('id_pesanan', 'desc');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result();
    }
function get_pengantaran()
    {
        $this->db->select('pesanan.*,user.username as id_user,paket.nama_paket as id_paket');
        $this->db->from('pesanan');
        $this->db->join('paket', 'paket.id_paket=pesanan.id_paket');
        $this->db->join('user', 'user.id_user=pesanan.id_user');
        $this->db->order_by('id_pesanan', 'desc');
        $this->db->where('status', 3);
        $query = $this->db->get();
        return $query->result();
    }
    public function ambilData($id)
    {
        $this->db->select("id_pesanan");
        $this->db->from("pesanan");
        $this->db->where("id_pesanan", $id);
        return $this->db->get();
    }
    public function selesai_penjemputan($id)
    {
        $data = array(
            'status' => 2
        );
        $this->db->where("id_pesanan", $id);
        $this->db->update("pesanan", $data);
        // return $this->db->get();
    }
    public function selesai_pengantaran($id)
    {
        $this->db->where("id_pesanan", $id);
        $this->db->delete("pesanan");
    }
}