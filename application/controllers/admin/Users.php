<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_admin()) {
            redirect('admin/login');
        }
    }

    public function index() {
        $data = array();
        $data['page_title'] = 'Users';
        $data['tabActive'] = 'user';
        $data['error'] = '';
        $data['users'] = $this->global_model->get('users');
        $this->load->view('admin/header', $data);
        $this->load->view('admin/users', $data);
        $this->load->view('admin/footer');
    }

    public function changeUserStatus($userId, $status) {
        if ($status == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        $this->global_model->update('users', $data, array('id' => $userId));
        redirect('admin/users');
    }

}

?>
