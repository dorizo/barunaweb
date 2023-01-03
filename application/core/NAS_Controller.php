<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class NAS_Controller extends RestController {

    var $user;

	function __construct(){
		parent::__construct();

        $token = $this->input->get_request_header('token');
        //$token = '525937b6a9a255749f9948c7bb4f46a111c70619';

        //$this->user = $this->db->get_where('users_api', ['token' => $token])->row();

        // if(empty($this->user) || empty($token)){
        if($token != '525937b6a9a255749f9948c7bb4f46a111c70619'){
            $this->response( [
                'status' => false,
                'message' => 'INVALID TOKEN'
            ], 404 );

            return;
        }

	}

}
