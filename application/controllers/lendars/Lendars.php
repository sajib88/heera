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
        
        $loginId = $this->session->userdata('login_id');

        $data['lendars'] = $this->global_model->get('users', array('profession' => '1'));
        
        $data['count'] = $this->global_model->count_row_where('project', array('statusID' => NULL));

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
        //$id = $_POST['id'];
        $data['lendarDetails'] = $this->global_model->get_data('users', array('id' => $userID));
        //$data['allfundedproject'] = $this->global_model->get('project', array('userID' => $userID));
        
        $data['allfundedproject'] = $this->global_model->all_project($userID);
        
//        echo '<pre>';
//        print_r($data['allfundedproject']);die;
//        echo '</pre>';
        
        echo $this->load->view('lendars/lenders_details', $data, TRUE);
       // print_r($projectDetails);
        
        exit;
    }

    public function billing()
    {
        $data = array();
        $data['page_title'] = 'Billable Lenders';
        $loginId = $this->session->userdata('login_id');
        $data['pendingBills'] = $this->global_model->billable_lendars('pending');
        $data['doneBills'] = $this->global_model->billable_lendars('done');
        $data['cancelBills'] = $this->global_model->billable_lendars('cancel');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('lendars/billable_lendars', $data);
        $this->load->view('footer');
    }

    public function changePaymentStatus(){
        $staus['transactionStatus'] = $this->uri->segment(5);
        if(!empty($staus['transactionStatus'])){
            //echo $staus['transactionStatus'];die;
            $id = $this->uri->segment(4);
            $ref = $this->global_model->update('lander_transaction_history', $staus, array('transactionID'=>$id));
            if($ref == true){
                $this->session->set_flashdata('message', 'Billing Status Changed Successfully.');
                redirect('lendars/Lendars/billing');
            }else{
                $this->session->set_flashdata('error', 'Somthing went wrong! plese try again letar.');
            }
        }

    }

}
