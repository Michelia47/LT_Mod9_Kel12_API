<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require './application/libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class login extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('login_model');
    }

	public function index_post()
	{
        $username = urldecode($this->uri->segment(3));
        $password = urldecode($this->uri->segment(4));

		$query = $this->login_model->login($username, $password);

        if ($query){
            echo "Berhasil Login";
        } else {
            echo "Username atau Password Salah !";
        }
	}
}
