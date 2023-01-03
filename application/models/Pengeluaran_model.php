<?php
ini_set('max_execution_time', 30000);
ini_set('memory_limit', '-1');

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model {
    
    function get_total_pengeluaran_perbulan($kelompok, $tahun, $bulan){
        
        $this->db->select('COALESCE(SUM(jumlah),0) as jumlah');
        
        $this->db->where(['kelompok' => $kelompok, 'status' => 1]);

        $this->db->like('tanggal', $tahun.'-'.$bulan, 'after');

        return $this->db->get('tr_pengeluaran');
    }

    function get_pengeluaran_perbulan($kelompok, $tahun, $bulan){
        
        $this->db->select('*');
        
        $this->db->where(['kelompok' => $kelompok, 'status' => 1]);

        $this->db->like('tanggal', $tahun.'-'.$bulan, 'after');

        return $this->db->get('tr_pengeluaran');
    }

}
