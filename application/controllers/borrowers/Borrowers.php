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
        $projectData = $this->global_model->all_borrower_with_funded_amount(2);

        foreach ($projectData as $proData){
            $repaidAmount = $this->global_model->total_sum('project_repaid_history', array('repaidBy' => $proData->userID, 'repaidStatus' => 'Done'), 'repaidAmount');
            $proData->repaidAmount = (!empty($repaidAmount))? $repaidAmount:'0';
        }

        $data['borrowers'] = $projectData;
        //print_r($data['borrowers']);die;

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
    
    public function borrowerDeatails($userID){
        $data = array();
        
        $data['borrowersDetails'] = $this->global_model->get_data('users', array('id' => $userID));

        $data['allfundedproject'] = $this->global_model->borrower_funded_project($userID);
        
        //print_r($data['allfundedproject']);die;
        
        $allCreatedProject = $this->global_model->borrower_all_project($userID);
        foreach ($allCreatedProject as $proData){

            $repaidAmount = $this->global_model->total_sum('project_repaid_history', array('projectID' => $proData->projectID, 'repaidStatus' => 'Done'), 'repaidAmount');
            $proData->repaidAmount = (!empty($repaidAmount))? $repaidAmount:'0';
        }
        $data['allCreatedProject'] = $allCreatedProject;
        
        echo $this->load->view('borrowers/borrowers_deatails', $data, TRUE);
       // print_r($projectDetails);
        
        exit;
    }

    public function repaymentList(){
        $data = array();
        $data['page_title'] = 'Repayment List';
        $data['no_data'] = 'Any Repayment Not Found.';
        $loginId = $this->session->userdata('login_id');
        $data['allRepaymentList'] = $this->global_model->repaymentList();

        //print_r($data['allRepaymentList']);die;

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('borrowers/repaymentList', $data);
        $this->load->view('footer');
    }

}

