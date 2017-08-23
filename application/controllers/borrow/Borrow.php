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
            $data['page_title'] = 'All';
            $data['no_data'] = 'You have not create any project yet.';
        }elseif($statusID == 4){
            $data['page_title'] = 'Funded';
            $data['no_data'] = 'Any Funded Project Not Found.';            
        }elseif($statusID == 3){
            $data['page_title'] = 'Currently Funding';
            $data['no_data'] = 'Any Active Project Not Found.';            
        }elseif($statusID == 10){
            $data['page_title'] = 'Closed';
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


    public function projectFunding()
    {
        $data = array();

        $loginId = $this->session->userdata('login_id');

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;

        $data['fundHistory'] = $this->global_model->getProjectFunding($loginId);

        $data['repaid'] = $this->global_model->getRepaidFunding($loginId);
//        echo '<pre>';
//        print_r($data['repaid']);
//        echo '</pre>';
//        die;

        $this->load->view('header', $data);
        $this->load->view('borrow/projectFunding', $data);
        $this->load->view('footer');
    }

    public function borrowerRepayment($project_id, $repaid_amount, $repayment_date, $repaymentStatus, $repaymentScheduleID)
    {
        $loginId = $this->session->userdata('login_id');
        $projectData['projectID'] = $project_id;
        $projectData['repaidAmount'] = $repaid_amount;
        $projectData['repaidBy'] = $loginId;
        $projectData['repaidDateTime'] = $repayment_date;
        $projectData['repaidStatus'] = 'Pending';
        $projectData['paymentProcessBy'] = Null;
        $projectData['paymentProcessTime'] = Null;
        $projectData['repaymentScheduleID'] = $repaymentScheduleID;

        $repaymentData['repaidStatus'] = $repaymentStatus;
        //$repaymentStatus['repaymentScheduleID'] = $repaymentScheduleID;

        if($this->global_model->insert('project_repaid_history', $projectData)){
            $this->global_model->update('repayment_schedules', $repaymentData, array('repaymentScheduleID' => $repaymentScheduleID));
            $this->session->set_flashdata('message', 'Your Repayment is Pending. Please wait some time to make it done.');
            redirect(base_url('borrow/repaymentShchedule'));
        }else{
            $this->session->set_flashdata('message', 'Something went wrong. Please try again.');
            redirect(base_url('borrow/repaymentShchedule'));
        }

    }
    

}
