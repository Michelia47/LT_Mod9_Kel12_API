<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register_model extends CI_Model {

    public function POST($data){
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }

    public function GET(){
        return $this->db->get('user')->result();
    }

    public function PUT($username, $data){
        $this->db->where('username', $username);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function DELETE($username){
        $this->db->delete('user', ['username'=>$username]);
        return $this->db->affected_rows();
    }
}
 