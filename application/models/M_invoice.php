<?php
class M_invoice extends CI_Model
{

    function get_no_invoice()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_nota,4)) AS kd_max FROM transaksi WHERE DATE(time)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy') . $kd;
    }
}
