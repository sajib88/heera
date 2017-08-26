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
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/ourmission');
        $this->load->view('guest_footer');
    }

    public function ourvalues() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/ourvalues');
        $this->load->view('guest_footer');
    }

    public function howitworks() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/howitworks');
        $this->load->view('guest_footer');
    }

    public function faq() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/faq');
        $this->load->view('guest_footer');
    }

    ///////
    public function projects() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/projects');
        $this->load->view('guest_footer');
    }


    public function communities() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/communities');
        $this->load->view('guest_footer');
    }

    public function countries() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/countries');
        $this->load->view('guest_footer');
    }

    public function activities() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/activities');
        $this->load->view('guest_footer');
    }

    public function teams() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/teams');
        $this->load->view('guest_footer');
    }
    ///////
    public function borrow() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/borrow');
        $this->load->view('guest_footer');
    }

    public function contactus() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/contactus');
        $this->load->view('guest_footer');
    }

    public function blog() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/blog');
        $this->load->view('guest_footer');
    }

    public function partnerwithus() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/partnerwithus');
        $this->load->view('guest_footer');
    }

    public function privacypolicy() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/privacypolicy');
        $this->load->view('guest_footer');
    }

    public function termofuse() {
        $data = array();
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $this->load->view('guest_head', $data);
        $this->load->view('pages/termofuse');
        $this->load->view('guest_footer');
    }







}
