<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrow extends CI_Controller {

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



    public function allProjects($statusID='') {
        $data = array();      
               
        $loginId = $this->session->userdata('login_id'); 
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        
        $data['borrowerAllProjects'] = $this->global_model->borrowerAllProject($loginId, $statusID);
        
         if($statusID == ''){
            $data['page_title'] = 'All Projects'; 
            $data['no_data'] = 'You have not create any project yet.';
        }elseif($statusID == 4){
            $data['page_title'] = 'Funded Projects';
            $data['no_data'] = 'Any Funded Project Not Found.';            
        }elseif($statusID == 3){
            $data['page_title'] = 'Currently Funding Projects';
            $data['no_data'] = 'Any Active Project Not Found.';            
        }elseif($statusID == 10){
            $data['page_title'] = 'Closed Projects';
            $data['no_data'] = 'Any Closed Project Not Found.';            
        }
        $this->load->view('header', $data);
        $this->load->view('borrow/allProjects', $data);
        $this->load->view('footer');

    } 
    
    public function repaymentShchedule(){
        $data = array(); 
        
        $data['page_title'] = 'Repayment Schedule'; 
        $data['no_data'] = 'No Repayment Schedule.';
        
        $loginId = $this->session->userdata('login_id');
        
        $data['repaymentSchedule'] = $this->global_model->borrower_repayment_schedule($loginId);
       // print_r($ref);die;
//        echo $ref[0]->projectID;
//        die;
//        $ref = $data['borrowerAllProjects'] = $this->global_model->get('project', array('userID' => $loginId, 'statusID' => '3'));
//        $ref[0]->id;
//        print_r($data['borrowerAllProjects']);die;
//        
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        
        $this->load->view('header', $data);
        $this->load->view('borrow/repaymentSchedule', $data);
        $this->load->view('footer');
    }
    

}
