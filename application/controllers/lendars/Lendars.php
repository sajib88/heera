<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lendars extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');        
            
        $this->load->helper('global');
        
        
        $this->load->library('upload');
        $this->load->library('Resizeimg');
         if (!check_login()) {
            redirect('home/login');
        }
    }



    public function alllendars() {
        $data = array();
        $data['page_title'] = 'All Lendars';
        $data['no_data'] = 'No Project Not Found.';
        $loginId = $this->session->userdata('login_id');

        $data['lendars'] = $this->global_model->get('users', array('profession' => '1'));
        
        //print_r($data['lendars']);

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('lendars/lendars', $data);
        $this->load->view('footer');

    }
    
//    public function allFundedProject($userID){
//        $data = array();
//        //$id = $this->input->post('status');
//        $projectDetails = $this->global_model->get_data('project', array('userID' => $userID));
//        
//        echo json_encode($projectDetails);
//       // print_r($projectDetails);
//        
//        exit;
//    }
    
    public function allFundedProject($userID){
        $data = array();
        //$id = $this->input->post('status');
        $data['lendarDetails'] = $this->global_model->get_data('users', array('id' => $userID));
        $data['allfundedproject'] = $this->global_model->get('project', array('userID' => $userID));
        
        echo $this->load->view('lendars/lenders_details', $data, TRUE);
       // print_r($projectDetails);
        
        exit;
    }

}
