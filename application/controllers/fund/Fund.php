<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fund extends CI_Controller {

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
    
    public function addfund() {
        $data = array();

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        if($this->input->post()){
            $postData = $this->input->post();
            $this->form_validation->set_rules('inAmount', 'inAmount', 'required');
            if($this->form_validation->run() == true){
                $loginId = $this->session->userdata('login_id');
                $save['inAmount'] = empty($postData['inAmount']) ? NULL : $postData['inAmount'];
                $save['outAmount'] = 0;
                $save['transactionReason'] = 'add funds';
                $save['userID'] = $loginId;
                $save['transactionDateTime'] =  date('Y-m-d H:i:s');
                $credit['inAmount'] = $postData['currentAmount'];
                $credit['inAmount'] = $credit['inAmount'] += $save['inAmount'] = $postData['inAmount'];
                if ($ref = $this->global_model->insert('lander_transaction_history', $save)) {
                        if($ref = $this->global_model->update('users', $credit, array('id' => $loginId))){
                        $this->session->set_flashdata('message', 'Save Success');
                        redirect(base_url('fund/transactions'));
                    }
                }
            }
            
        }
        
        $data['login_id'] = $loginId;
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');

        $this->load->view('header', $data);
        $this->load->view('fund/addFund', $data);
        $this->load->view('footer');


    }


    public function transactions()
    {


        $data = array();
        $data['page_title'] = 'Transactions History';
        $loginId = $this->session->userdata('login_id');


        $data['allTransactions'] = $this->global_model->get('lander_transaction_history', array('userID' => $loginId));


        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;

        $this->load->view('header', $data);
        $this->load->view('fund/allTransactionstable', $data);
        $this->load->view('footer');

    }


    public function withdraw() {
        $data = array();

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        if($this->input->post()){
            $postData = $this->input->post();

            $this->form_validation->set_rules('outAmount', 'outAmount', 'required');

            if($this->form_validation->run() == true){
                $loginId = $this->session->userdata('login_id');
                $save['inAmount'] = 0;
                $save['outAmount'] = empty($postData['outAmount']) ? NULL : $postData['outAmount'];
                $save['transactionReason'] = 'withdraw funds';
                $save['userID'] = $loginId;
                $save['transactionDateTime'] =  date('Y-m-d H:i:s');


                $credit['inAmount'] = $postData['currentAmount'];
                $credit['inAmount'] = $credit['inAmount'] -= $save['outAmount'] = $postData['outAmount'];
                if ($ref = $this->global_model->insert('lander_transaction_history', $save)) {
                    if($ref = $this->global_model->update('users', $credit, array('id' => $loginId))){
                        $this->session->set_flashdata('message', 'Save Success');
                        redirect(base_url('fund/transactions'));
                    }
                }
            }

        }
        $data['login_id'] = $loginId;
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');



        $this->load->view('header', $data);
        $this->load->view('fund/withdraw', $data);
        $this->load->view('footer');


    }









}