<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	function __construct(){
		parent::__construct();
		// if(!session('login')){
		// 	redirect('login');
		// }
		
		
		date_default_timezone_set("ASIA/JAKARTA");
		
	}
	public function index()
	{

		if(session('userid')){
			redirect('welcome');
		}
		if(is_post_request()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('pass', 'Password', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');


			if ($this->form_validation->run() === TRUE){
				
				$user['password'] =  md5(post('pass'));
				$user['email'] =  post('email');
				$user['status'] =  1;

				$login = $this->db->get_where('user_baruna', $user);
				
				if($login->num_rows() > 0){
					$this->db->insert('login', ['userid' => $login->row()->userid, 'date' => date('Y-m-d H:i:s')]);

					// $f = "./files/" . strtolower($login->row()->tipe) . "/" . $login->row()->files;

					// if (!is_dir($f)){
				 // 	 	mkdir($f);
					// }

					setsession($login->result_array()[0]);

					redirect('welcome');
				} else {
					$this->session->set_flashdata('error', TRUE);
					redirect('login');
					// $userid = $this->uuid->v4(true);

					// $insert['userid'] = $userid;
					// $insert['email'] = post('email');
					// $insert['password'] =  md5(post('pass'));
					// $insert['status'] =  1;
					// $insert['created_date'] = date('Y-m-d H:i:s');
					// $insert['created_by'] = $userid;
					// $this->db->insert('users', $insert);

					// $login = $this->db->get_where('users', ['userid' => $userid]);
					// setsession($login->result_array()[0]);
					// redirect('welcome');
					// $data['error'] = TRUE;
				}

			}

		}
		$this->load->view('login');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
	function registration(){
		if(is_post_request()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required|trim');
			$this->form_validation->set_rules('pass', 'Password', 'required|trim');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
			if ($this->form_validation->run() === TRUE){
				$userid = $this->uuid->v4(true);
				$insert['userid'] = $userid;
				$insert['nama'] = post('name');
				$insert['email'] = post('email');
				$insert['password'] =  md5(post('pass'));
				$insert['status'] =  1;
				$insert['created_date'] = date('Y-m-d H:i:s');
				$insert['created_by'] = $userid;
				$this->db->insert('user_baruna', $insert);
				$this->session->set_flashdata('success', TRUE);
				redirect('login');
			}else{
				$this->session->set_flashdata('error', TRUE);
				redirect('login/registration');
			}

		}
		$this->load->view('registration');
	}
}