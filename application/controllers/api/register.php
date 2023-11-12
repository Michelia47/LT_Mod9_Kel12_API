<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require './application/libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class register extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('register_model');
    }

	public function index_post()
	{
        $data = [
            'username' => urldecode($this->uri->segment(3)),
            'password' => urldecode($this->uri->segment(4)) 

        ];

        if ($this->register_model->POST($data)>0){
            $this->response
            (
                [
                'Berhasil Buat Data' => 200,
                ],RestController::HTTP_OK
            );
        } else {
            $this->response
            (
                [
                'Gagal Buat Data' => 404,
                ],RestController::HTTP_BAD_REQUEST
            );
        }
	}

    public function index_get()
	{
        $this->response($this->register_model->GET(), RestController::HTTP_OK);
	}

    public function index_put()
	{
        $username = $this -> put('username');
        $username = urldecode($this->uri->segment(3));

        $data = [
            'username' => urldecode($this->uri->segment(3)),
            'password' => urldecode($this->uri->segment(4)) 

        ];

        if ($this->register_model->PUT($username, $data)>0){
            $this->response
            (
                [
                'Berhasil Update Data' => 200,
                ],RestController::HTTP_OK
            );
        } else {
            $this->response
            (
                [
                'Gagal Update Data' => 404,
                ],RestController::HTTP_BAD_REQUEST
            );
        }
	}

    public function index_delete()
	{
        $username = $this -> delete('username');
        $username = urldecode($this->uri->segment(3));

        if ($this->register_model->DELETE($username)>0){
            $this->response
            (
                [
                'Berhasil Delete Data' => 200,
                ],RestController::HTTP_OK
            );
        } else {
            $this->response
            (
                [
                'Gagal Delete Data' => 404,
                ],RestController::HTTP_BAD_REQUEST
            );
        }
	}
}
