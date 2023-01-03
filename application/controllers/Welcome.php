<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		 if(!session('userid')){
			redirect('login');
		}
		
		
		date_default_timezone_set("ASIA/JAKARTA");
		
	}
	private $perPage = 4;

	public function index()
	{
		
		$this->load->database();
		$count = $this->db->get('complaint')->num_rows();

		if(!empty($this->input->get("page"))){
			$start = ceil($this->input->get("page") * $this->perPage);
			// $query = $this->db->limit($start, $this->perPage)->get("complaint");
			//$query = $this->db->limit(8, 4)->get("complaint")->num_rows();
			//$query = $this->db->query("SELECT * FROM complaint  ORDER BY id DESC LIMIT $start,$this->perPage");
			$query = $this->db->query("select a.id, a.userid, message,a.photo,longitude,latitude,a.created_date,b.status,c.email, c.nama from complaint as a left join approve as b on a.id=b.id_complaint  join user_baruna as c on a.userid=c.userid ORDER by a.id DESC LIMIT $start,$this->perPage");
			$data['posts'] = $query->result();
			$result = $this->load->view('template/data',$data);
			echo json_encode($result);
		}else{
			$this->db->order_by('id', 'DESC');
			$query = $this->db->query("select a.id, a.userid, message,a.photo,longitude,latitude,a.created_date,b.status, c.email, c.nama from complaint as a left join approve as b on a.id=b.id_complaint join user_baruna as c on a.userid=c.userid  ORDER by a.id DESC LIMIT 4");
			
			$data['posts'] = $query->result();
			$data['header'] = 'template/header';
			$this->load->view('template/content', $data);
		}
		
		// $this->db->order_by('id', 'DESC');
		// $data['complaint'] = $this->db->get('complaint')->result_array();
		
		// $data['header'] = 'template/header';
		// $this->load->view('template/content',$data);
	}
	public function store()
	{
		if(!post('latitude')){
			$this->session->set_flashdata('error', TRUE);
			redirect('welcome');
		}

		if ($_FILES["foto"]["name"]) {
			$path = './assets/document/complaint';
			$config['upload_path'] =  $path;
			$config['allowed_types'] = 'JPG|jpeg|jpg|png|PNG';
			$config['max_size'] = 1024 * 4;
			$new_name = time() . $_FILES["foto"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$upload = $this->upload->do_upload('foto');
			if (!$upload) {
				setflashdata('error_file', TRUE);
				redirect('profile/personal');
			} else {
				$foto = $this->upload->data();
				$file_foto = $foto['file_name'];
				// $file_foto_old = post('foto_old');
				// $path = './assets/document/profil/' . $file_foto_old . '';
				// @unlink($path);
			}
		}
		
		$data = [
			'message' => post('pesan'),
			'photo' => $file_foto,
			'latitude' => post('latitude'),
			'longitude' => post('longitude'),
			'userid' => session('userid'),
			'created_date' => date('Y-m-d H:i:s'),
			'created_by' => session('userid'),


		];
		$this->db->insert('complaint', $data);
		redirect('welcome');

	}
	public function show()
	{
		
	}
	public function edit()
	{
		
	}
	public function update()
	{
		
	}

}
