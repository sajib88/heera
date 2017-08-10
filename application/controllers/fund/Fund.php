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


                        $this->session->set_flashdata('message', 'Add Fund under your Credit balance');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'error found !');
                }
            }
            
        }

        $data['listpaymethod'] = $this->global_model->get_data('payment_methods', array('userID' => $loginId ));
        
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
        $data['page_title'] = 'withdraw';
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
                $save['transactionStatus'] =  'pending';


                $credit['inAmount'] = $postData['currentAmount'];
                $credit['inAmount'] = $credit['inAmount'] -= $save['outAmount'] = $postData['outAmount'];
                if ($ref = $this->global_model->insert('lander_transaction_history', $save)) {

                    $this->session->set_flashdata('message', 'Your withdraw amount review by admin');
//                    if($ref = $this->global_model->update('users', $credit, array('id' => $loginId))){
//                        $this->session->set_flashdata('message', 'Save Success');
//                        redirect(base_url('fund/transactions'));
//                    }
                }
                else {
                    $this->session->set_flashdata('error', 'error found !');
                }
            }

        }
        $data['login_id'] = $loginId;
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');

        $data['listpaymethod'] = $this->global_model->get_data('payment_methods', array('userID' => $loginId ));

        $this->load->view('header', $data);
        $this->load->view('fund/withdraw', $data);
        $this->load->view('footer');


    }

    public function addMethod() {
        $data = array();
        $data['page_title'] = 'Add Payment Method';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        if($this->input->post()){
            $postData = $this->input->post();

            if($postData == true){
                $loginId = $this->session->userdata('login_id');

                $save['userID'] = $loginId;
                $save['selectPaymentType'] = empty($postData['selectPaymentType']) ? NULL : $postData['selectPaymentType'];
                $save['paypalemail'] = empty($postData['paypalemail']) ? 0 : $postData['paypalemail'];
                $save['cardType'] = empty($postData['cardType']) ? 0 : $postData['cardType'];
                $save['firstName'] = empty($postData['firstName']) ? 0 : $postData['firstName'];
                $save['lastName'] = empty($postData['lastName']) ? 0 : $postData['lastName'];
                $save['cardNumber'] = empty($postData['cardNumber']) ? 0 : $postData['cardNumber'];
                $save['cvv'] = empty($postData['cvv']) ? 0 : $postData['cvv'];
                $save['expireDate'] = empty($postData['expireDate']) ? 0 : $postData['expireDate'];
                $save['expireMonth'] = empty($postData['expireMonth']) ? 0 : $postData['expireMonth'];
                $save['expireYear'] = empty($postData['expireYear']) ? 0 : $postData['expireYear'];
                $save['bankName'] = empty($postData['bankName']) ? 0 : $postData['bankName'];
                $save['routhingNumber'] = empty($postData['routhingNumber']) ? 0 : $postData['routhingNumber'];
                $save['accountNumber'] = empty($postData['accountNumber']) ? 0 : $postData['accountNumber'];
                $save['debitCardNumber'] = empty($postData['debitCardNumber']) ? 0 : $postData['debitCardNumber'];
                $save['useFor'] = empty($postData['useFor']) ? 0 : $postData['useFor'];

                $save['status'] =  1;
                $save['isPrimary'] = empty($postData['isPrimary']) ? '0' : $postData['isPrimary'];

                $ref = $this->global_model->insert('payment_methods', $save);
                    if($ref == true){
                        $this->session->set_flashdata('message', 'Added New Payment Method');

                    }
                    else{
                        $this->session->set_flashdata('error', 'error found !');
                    }
            }

        }

        $data['login_id'] = $loginId;

        /// list of payment mehtod
        $data['listpaymethod'] = $this->global_model->get('payment_methods', array('userID' => $loginId));


        $this->load->view('header', $data);
        $this->load->view('fund/payMethodadd', $data);
        $this->load->view('footer');


    }


    //// for remove
    public function delete()
    {

        $id = $this->uri->segment('4');
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));


        if ($ref = $this->global_model->delete('payment_methods', array('paymentMethodID' => $id))) {

            $this->session->set_flashdata('message', 'Delete successfully!');
            redirect('payment/listofPayment');

        }
        else{
            $this->session->set_flashdata('error', 'error found !');
        }




    }


    public function listofPayment(){
        $data = array();

        $id = $this->uri->segment('3');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['listpaymethod'] = $this->global_model->get('payment_methods', array('userID' => $loginId ));




        $this->load->view('header', $data);
        $this->load->view('fund/listallpayment', $data);
        $this->load->view('footer');


    }
    public function editpayment(){
        $data = array();
        $data['page_title'] = 'Update Payment Method';
        $id = $this->uri->segment('3');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));





        if($this->input->post()){
            $postData = $this->input->post();

            if($postData == true){
                $loginId = $this->session->userdata('login_id');

                $save['userID'] = $loginId;
                $save['selectPaymentType'] = empty($postData['selectPaymentType']) ? NULL : $postData['selectPaymentType'];
                $save['paypalemail'] = empty($postData['paypalemail']) ? 0 : $postData['paypalemail'];
                $save['cardType'] = empty($postData['cardType']) ? 0 : $postData['cardType'];
                $save['firstName'] = empty($postData['firstName']) ? 0 : $postData['firstName'];
                $save['lastName'] = empty($postData['lastName']) ? 0 : $postData['lastName'];
                $save['cardNumber'] = empty($postData['cardNumber']) ? 0 : $postData['cardNumber'];
                $save['cvv'] = empty($postData['cvv']) ? 0 : $postData['cvv'];
                $save['expireDate'] = empty($postData['expireDate']) ? 0 : $postData['expireDate'];
                $save['expireMonth'] = empty($postData['expireMonth']) ? 0 : $postData['expireMonth'];
                $save['expireYear'] = empty($postData['expireYear']) ? 0 : $postData['expireYear'];
                $save['bankName'] = empty($postData['bankName']) ? 0 : $postData['bankName'];
                $save['routhingNumber'] = empty($postData['routhingNumber']) ? 0 : $postData['routhingNumber'];
                $save['accountNumber'] = empty($postData['accountNumber']) ? 0 : $postData['accountNumber'];
                $save['debitCardNumber'] = empty($postData['debitCardNumber']) ? 0 : $postData['debitCardNumber'];
                $save['useFor'] = empty($postData['useFor']) ? 0 : $postData['useFor'];
                $save['status'] =  1;
                $save['isPrimary'] = empty($postData['isPrimary']) ? '0' : $postData['isPrimary'];


                if ($save['isPrimary'] == 1){
                    $test['isPrimary'] = 1;
                    $ref = $this->global_model->update('payment_methods', $test, array('userID' => $loginId));
                }
                else {
                    $test['isPrimary'] = 0;
                    $ref = $this->global_model->update('payment_methods', $test, array('userID' => $loginId));
                }
                if ($ref = $this->global_model->update('payment_methods', $save, array('paymentMethodID' => $id))) {
                    $this->session->set_flashdata('message', 'Update Your Payment method');
                }
                else{
                    $this->session->set_flashdata('error', 'error found !');
                }
            }

        }

        $data['editpayment'] = $this->global_model->get_data('payment_methods', array('paymentMethodID' => $id ));

        $this->load->view('header', $data);
        $this->load->view('fund/editMethod', $data);
        $this->load->view('footer');


    }




}