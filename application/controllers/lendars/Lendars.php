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

        //$lendars = $this->global_model->lenders_total_funded_amount();
        $data['lendars'] = $this->global_model->all_lenders_with_funded_amount(1);

        //print_r($data['lendars']);die;


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

        $data['lendarDetails'] = $this->global_model->get_data('users', array('id' => $userID));
        $data['allfundedproject'] = $this->global_model->all_project($userID);
        $data['listpaymethod'] = $this->global_model->get('payment_methods', array('userID' => $userID));

        $data['countries'] = $this->global_model->get('countries');
        $data['states'] = $this->global_model->get('states');

        echo $this->load->view('lendars/lenders_details', $data, TRUE);

        
        exit;
    }

    public function updateLenderProfile($id){
        $this->load->library('Resizeimg');

            $postData = $this->input->post();

            $save['first_name'] = $postData['first_name'];
            $save['email'] = $postData['email'];
            $save['phone'] = $postData['phone'];
            $save['gender'] = $postData['gender'];
            $save['dateofbirth'] = $postData['dateofbirth'];
            $save['country'] = $postData['country'];
            $save['state'] = $postData['state'];
            $save['city'] = $postData['city'];
            $save['address'] = $postData['address'];

            if (isset($_FILES["profilepicture"]["name"]) && $_FILES["profilepicture"]["name"] != '') {
                $this->PATH = './assets/file';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['profilepicture'] = $this->resizeimg->image_upload('profilepicture', $this->PATH, 'size[300,300]', '', $photo_name);
                print_r(  $save['profilepicture']);
            }
            else {

            }

            $ref = $this->global_model->update('users', $save, array('id' => $id));

            if($ref){
                echo "success";

            }
            else{
                echo "error";
            }


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

    public function changePaymentStatus($id='', $status='', $outAmount='', $inAmount='', $userID='')
    {
       $staus['transactionStatus'] = $status;
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $userID));
        if($outAmount != 0 || !empty($staus['transactionStatus'])){
            $credit['inAmount'] = $data['user_info']['inAmount'] - $outAmount;
            if($this->global_model->update('users', $credit, array('id' => $userID))) {
                $ref = $this->global_model->update('lander_transaction_history', $staus, array('transactionID' => $id));
            }
        }elseif($inAmount != 0 || !empty($staus['transactionStatus'])){
            $credit['inAmount']  = $data['user_info']['inAmount'] + $inAmount;
            if($this->global_model->update('users', $credit, array('id' => $userID))) {
                $ref = $this->global_model->update('lander_transaction_history', $staus, array('transactionID' => $id));
            }
        }elseif(!empty($staus['transactionStatus'])){
            $ref = $this->global_model->update('lander_transaction_history', $staus, array('transactionID'=>$id));
        }else{
            $this->session->set_flashdata('message', 'Somthing went wrong! plese try again letar.');
        }
        if($ref == true){
            $this->session->set_flashdata('message', 'Billing Status Changed Successfully.');
            redirect('lendars/billing');
        }else{
            $this->session->set_flashdata('error', 'Somthing went wrong! plese try again letar.');
            redirect('lendars/billing');
        }
    }


    public function getStateByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;
    }

}




