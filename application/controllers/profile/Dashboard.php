<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_login()) {
            redirect('home/login');
        }
    }

    public function index() {

        $data = array();
        $data['page_title'] = 'Dashboard';
        $data['tabActive'] = 'dashboard';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $this->load->view('header', $data);
        $this->load->view('profile/dashboard', $data);
        $this->load->view('footer');
    }

}

?>
