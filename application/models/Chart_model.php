<?php
class Chart_model extends CI_Model{
 
  //get data from database
  function get_data(){
      $this->db->select('tgl_bayar,sum(total) as total');
      $this->db->group_by('tgl_bayar');
      $result = $this->db->get('detail_pembayaran');
      return $result;
  }
 
}