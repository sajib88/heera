<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_admin()) {
            redirect('admin/login');
        }
    }

    public function index() {
        $data = array();
        $data['page_title'] = 'Dashboard';
        $data['tabActive'] = 'dashboard';
        $data['error'] = '';
        $this->load->view('admin/dashboard_header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/dashboard_footer');
    }

}

?>
