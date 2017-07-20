<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($userEmail, $password) {
        $query = $this->db->get_where('users', array('email' => $userEmail, 'password' => $password));
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->session->set_userdata(array('login_id' => $result['id'], 'user_type' => $result['profession'], 'user_name' => $result['user_name']));
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login1($userEmail, $password) {
        $query = $this->db->get_where('users', array('email' => $userEmail, 'password' => $password, 'status' => 1));
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->session->set_userdata(array('login_id' => $result['id'], 'user_type' => $result['profession'], 'user_name' => $result['user_name']));
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login_admin($userEmail, $password) {
        $query = $this->db->get_where('admin', array('email' => $userEmail, 'password' => $password));
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->session->set_userdata(array('login_id' => $result['id'], 'email' => $result['email']));
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function verify_recovery_by_username($recovery_key)
    {
        if($recovery_key=='')
            return 0;
        else
        {
            $query = $this->db->get_where('users',array('recovery_key'=>$recovery_key));
            return $query;
        }
    }
    
    function update_password($password)
    {
        $this->load->library('encrypt');
        $user_name = $this->session->userdata('user_name');
        $data['password'] = md5($password);
        $data['recovery_key'] = '';
        $this->db->update('users',$data,array('user_name'=>$user_name));
    }

}

?>
