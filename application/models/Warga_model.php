<?php
ini_set('max_execution_time', 30000);
ini_set('memory_limit', '-1');

defined('BASEPATH') OR exit('No direct script access allowed');

class Warga_model extends CI_Model {
    
    function get_warga($kelompok, $id = false){
        $this->db->select('id, kelompok, nama, email, telepon, alamat, foto, jumlah_iuran');
        
        if($id)
            $this->db->where('id', $id);

        $this->db->where(['level' => 2, 'status' => 1, 'kelompok' => $kelompok]);

        return $this->db->get('tm_user');
    }

    function get_iuran($id_user, $tahun){

        $sql = "SELECT a.id AS id_bulan, a.bulan AS nama_bulan, b.* FROM tm_bulan a LEFT JOIN 
                (SELECT * FROM tr_iuran WHERE tahun='$tahun' AND id_user='$id_user' AND status=1) AS b
                ON b.bulan=a.id ORDER BY id_bulan";

        return $this->db->query($sql);
    }

    function get_total_iuran_perbulan($kelompok, $tahun, $bulan){
        
        $this->db->select('COALESCE(SUM(jumlah_iuran),0) as jumlah');
        
        $this->db->where(['kelompok' => $kelompok, 'status' => 1]);

        $this->db->where('tahun', $tahun);

        $this->db->where('bulan', $bulan);

        return $this->db->get('tr_iuran');
    }

    function get_total_iuran_perwarga($userid, $tahun){
        $this->db->select('COALESCE(SUM(jumlah_iuran),0) as jumlah');
        
        $this->db->where(['id_user' => $userid, 'status' => 1]);

        $this->db->where('tahun', $tahun);

        return $this->db->get('tr_iuran');
    }

    function get_iuran_perbulan($kelompok, $tahun,  $bulan){

        $sql = "SELECT a.nama, a.level, b.* FROM tm_user a LEFT JOIN (SELECT * FROM tr_iuran WHERE status=1 AND tahun='$tahun' AND bulan='$bulan') AS b ON a.id=b.id_user WHERE a.status=1 AND a.kelompok='$kelompok' ORDER BY kode, nama ASC";
        return $this->db->query($sql);
    }

    function get_saldo($kelompok){
        $this->db->select('saldo as jumlah')->from('tm_user');
        $this->db->where(['kelompok' => $this->user->kelompok, 'level' => 1]);
        return $this->db->get();
    }
    
}
