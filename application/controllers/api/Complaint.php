<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Complaint extends NAS_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set("ASIA/JAKARTA");
	}


	function list_get(){
		$query = $this->db->query("select a.id, userid, message,photo,longitude,latitude,a.created_date from complaint as a left join approve as b on a.id=b.id_complaint WHERE b.status IS NULL ORDER by a.id DESC")->result();
		 foreach ($query as $row) {
					$data[] = array(
						'id' => $row->id,
						'userid' => $row->userid,
						'message' => $row->message,
						'photo' => 'https://localhost/kibumi/assets/document/complaint/'.$row->photo,
						'longitude' => $row->longitude,
						'latitude' => $row->latitude,
						'created_date' => $row->created_date,
						
					);
				}
		$this->response($data, 200);

	}

	function approve_post(){
		$validation = [
            [
                    'field' => 'id_complaint',
                    'label' => 'Complaint',
                    'rules' => 'required'
            ],
            [
                    'field' => 'created_by',
                    'label' => 'Created By',
                    'rules' => 'required'
            ],
        ];

        $this->form_validation->set_data($this->post());
        $this->form_validation->set_rules($validation);

        if($this->form_validation->run()==FALSE){
            $this->response( [
                    'status' => false,
                    'message' => "Data yang diinputkan tidak valid/kurang"
                ], 404 );

            return;
        }
        $data = [
            
            'id_complaint' => $this->post('id_complaint'),
            'status' => 1,
            'created_by' => $this->post('created_by'),
            'created_date' => date('Y-m-d H:i:s')
        ];
        if($this->db->insert('approve', $data)){
            $this->response($data, 200 );
        } else {
            $this->response( [
                    'status' => false,
                    'message' => 'Gagal Menyimpan Data'
                ], 404 );
        }
		
	}
}