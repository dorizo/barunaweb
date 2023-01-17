<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		// if(!session('login')){
		// 	redirect('login');
		// }
		
		
		date_default_timezone_set("ASIA/JAKARTA");
		
	}
	public function index()
	{
		$data['data'] = $this->db->query("select kategori , sum(berat) as berat from detail_beli_sampah a JOIN jenis_sampah b ON a.jsCode=b.jsCode JOIN kategori_sampah c ON c.ksCode=b.ksCode WHERE c.deleteAt IS  NULL GROUP BY kategori")->result_array();
		$data['total'] = $this->db->query("select sum(berat) as berat from (
select kategori , sum(berat) as berat from detail_beli_sampah a JOIN jenis_sampah b ON a.jsCode=b.jsCode JOIN kategori_sampah c ON c.ksCode=b.ksCode WHERE c.deleteAt IS  NULL GROUP BY kategori) as a")->row();
		$data['average'] = $this->db->query("SELECT AVG(a.berat) as berat , jenis  FROM `detail_beli_sampah` a JOIN jenis_sampah b  ON b.jsCode=a.jsCode GROUP BY a.jsCode")->result_array();
		$this->load->view('dashboard', $data);
	}
}