<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
    }

    //// Login by email
    public function login($userEmail, $password) {
        $password = $this->chechpassword($userEmail, $password);
        $query = $this->db->get_where('users', array('email' => $userEmail, 'password' => $password, 'status' => 1,'confirmed' => 1));
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->session->set_userdata(array('login_id' => $result['id'], 'user_type' => $result['profession'], 'user_name' => $result['user_name']));
            return TRUE;
        } else {
            return FALSE;
        }
    }       
    //// Login by username
    public function login1($username, $password) {
        $password = $this->chechpassword($username, $password);
        $query = $this->db->get_where('users', array('user_name' => $username, 'password' => $password, 'status' => 1,'confirmed' => 1));
        //echo $this->db->last_query();exit();
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
    
    public function chechpassword($email,$password){

        $query = $this->db->select('password')
            ->from('users')
            ->where('user_name',$email)
            ->or_where("email",$email)
            ->get();
        //echo $this->db->last_query();exit();
        $row = $query->row();

        $middle = strpos($row->password, ':');

        if($middle !== false) {
            if (isset($row->password) != null) {

                $hashparts = explode(':', $row->password);
                $joomPassword = $hashparts[1];
                $password = md5($password.$joomPassword);
                $password = $password.':'.$joomPassword;
                return $password;
            }
        }else {
            return md5($password);
        }

    }

    public function chechUser($email,$username){

        $query = $this->db->select('*')
            ->from('users')
            ->where('user_name',$username)
            ->or_where("email",$email)
            ->get();
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
