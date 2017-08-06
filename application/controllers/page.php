<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('global');
    }



    public function about() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');

        $this->load->view('guest_head', $data);
        $this->load->view('pages/about');
        $this->load->view('guest_footer');
    }

    public function ourmission() {

        $this->load->view('guest_head');
        $this->load->view('pages/ourmission');
        $this->load->view('guest_footer');
    }

    public function ourvalues() {

        $this->load->view('guest_head');
        $this->load->view('pages/ourvalues');
        $this->load->view('guest_footer');
    }

    public function howitworks() {

        $this->load->view('guest_head');
        $this->load->view('pages/howitworks');
        $this->load->view('guest_footer');
    }

    public function faq() {

        $this->load->view('guest_head');
        $this->load->view('pages/faq');
        $this->load->view('guest_footer');
    }

    ///////
    public function projects() {

        $this->load->view('guest_head');
        $this->load->view('pages/projects');
        $this->load->view('guest_footer');
    }


    public function communities() {

        $this->load->view('guest_head');
        $this->load->view('pages/communities');
        $this->load->view('guest_footer');
    }

    public function countries() {

        $this->load->view('guest_head');
        $this->load->view('pages/countries');
        $this->load->view('guest_footer');
    }

    public function activities() {

        $this->load->view('guest_head');
        $this->load->view('pages/activities');
        $this->load->view('guest_footer');
    }

    public function teams() {

        $this->load->view('guest_head');
        $this->load->view('pages/teams');
        $this->load->view('guest_footer');
    }
    ///////
    public function borrow() {

        $this->load->view('guest_head');
        $this->load->view('pages/borrow');
        $this->load->view('guest_footer');
    }

    public function contactus() {

        $this->load->view('guest_head');
        $this->load->view('pages/contactus');
        $this->load->view('guest_footer');
    }

    public function blog() {

        $this->load->view('guest_head');
        $this->load->view('pages/blog');
        $this->load->view('guest_footer');
    }

    public function partnerwithus() {

        $this->load->view('guest_head');
        $this->load->view('pages/partnerwithus');
        $this->load->view('guest_footer');
    }

    public function privacypolicy() {

        $this->load->view('guest_head');
        $this->load->view('pages/privacypolicy');
        $this->load->view('guest_footer');
    }

    public function termofuse() {

        $this->load->view('guest_head');
        $this->load->view('pages/termofuse');
        $this->load->view('guest_footer');
    }







}
