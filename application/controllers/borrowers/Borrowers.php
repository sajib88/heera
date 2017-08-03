<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowers extends CI_Controller {

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



    public function allBorrowers() {
        $data = array();
        $data['page_title'] = 'All Borrowers';
        $data['no_data'] = 'No Project Not Found.';
        $loginId = $this->session->userdata('login_id');

        $data['borrowers'] = $this->global_model->get('users', array('profession' => '2'));
        
        //print_r($data['lendars']);

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('borrowers/borrowers', $data);
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
        $data['borrowersDetails'] = $this->global_model->get_data('users', array('id' => $userID));
        $data['allfundedproject'] = $this->global_model->get('project', array('status' => '4'));
        $data['allCreatedProject'] = $this->global_model->get('project', array('userID' => $userID));
        
        echo $this->load->view('borrowers/borrowers_deatails', $data, TRUE);
       // print_r($projectDetails);
        
        exit;
    }

}
