<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {

    public function login($username, $password){
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where("username",$username);
        $this->db->where("password",$password);
        $this->db->get();
        return $this->db->affected_rows();
    }
}
