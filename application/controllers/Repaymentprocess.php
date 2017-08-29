<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repaymentprocess extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('login_model','Repayment_model'));
        $this->load->helper('global');
        $this->load->library('encrypt');
        $this->load->library('session');
    }

    public function index(){
        $data = array();
        $data['page_title'] = 'Repayment List';
        $data['no_data'] = 'Data not found.';
        $loginId = $this->session->userdata('login_id');
        $allRepaymentList = $this->Repayment_model->repaymentList();



        $pastDueArr = array();
        $dueArr = array();
        $currentArr =  array();
        $today = strtotime(date('Y-m-d', time()));
        $next3rdDay = strtotime(date('Y-m-d', strtotime('+3 day', $today)));
        //echo $schedualeDateTime = strtotime('2017-08-24');

        foreach ($allRepaymentList as $list){

            /// total funded
            $totalfunded = $this->global_model->total_sum('project_fund_history', array('projectID' => $list->projectID));
            $totalfunded = (!empty($totalfunded))? $totalfunded:'0';

            $projectRepaidAmount = $this->global_model->total_sum('borrower_repaid_history', array('projectsID' => $list->projectID), 'amount');
            $projectRepaidAmount = (!empty($projectRepaidAmount))? $projectRepaidAmount:'0';

            $loanbalane = floatval($totalfunded - $projectRepaidAmount);

            $list->loanbalance = $loanbalane;

            $schedualeDateTime = strtotime($list->schedualeDateTime);

            if($schedualeDateTime < $today){
                $pastDueArr[] = $list;
            }elseif($schedualeDateTime >= $today  && $schedualeDateTime <= $next3rdDay && $list->repaidStatus == 'Unpaid'){
                $dueArr[] = $list;
            }elseif($today == $schedualeDateTime && $list->repaidStatus == 'Paid'){
                $currentArr[] = $list;
            }

        }

        $data['pastDueArr'] = $pastDueArr;
        $data['dueArr'] = $dueArr;
        $data['currentArr'] = $currentArr;

        $data['allRepaymentList'] = $allRepaymentList;





        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('borrowers/repaymentList', $data);
        $this->load->view('footer');
    }


    public function getRepayment($scheduleID){
        $data = array();

        $loginId = $this->session->userdata('login_id');

        $data['repaymentData']  = $repaymentdata = $this->Repayment_model->repayment_info_by_scheduleid($scheduleID);
        $totalRepaidAmount = $repaymentdata[0]->repaidAmount;

        /// echo "<pre>";
        ///  print_r($repaymentdata);
        ///  echo "<pre>";

        echo $this->load->view('borrowers/getRepayment', $data, TRUE);

    }

    public function finalrepayment()
    {
        $data = array();

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        if($this->input->post()){
            $projectID = $this->input->post('projectsID');
            $borrower_ID = $this->input->post('borrower_ID');
            $repaidAmount = $this->input->post('repaidAmount');
            $repaymentScheduleID = $this->input->post('repaymentScheduleID');
            $actualRepaidAmount =  $this->input->post('actualRepaidAmount');


            if(!empty($projectID)) {

                $allLanders = $this->global_model->get_landerby_project_id($projectID);
                $totalFundedAmount = $this->global_model->total_sum('project_fund_history', array('projectID' => $projectID));

                if($actualRepaidAmount <= $repaidAmount) {
                    foreach ($allLanders as $lendersData) {

                        $landersPaymentamount = $lendersData->fundedAmount;

                        $x = $landersPaymentamount;
                        $y = $totalFundedAmount;
                        @$percent = @$x / @$y;

                        $get_lenders_percent = number_format($percent * 100, 2); // change 2 to # of decimals

                        $individualRepaidAmount = number_format((($actualRepaidAmount * $get_lenders_percent) / 100), 2);
                        //$lendersData->individualRepaidAmount = $individualRepaidAmount;

                        // Insert into borrower repaid history table
                        $saveLenderFund['projectsID'] = $projectID;
                        $saveLenderFund['repaymentScheduleID'] = $repaymentScheduleID;
                        $saveLenderFund['lenderID'] = $lendersData->id;
                        $saveLenderFund['dateTime'] = date('Y-m-d H:i:s');
                        $saveLenderFund['amount'] = $individualRepaidAmount;
                        $saveLenderFund['process_by_ID'] = $loginId;
                        $saveLenderFund['borrower_ID'] = $borrower_ID;
                        $this->db->insert('borrower_repaid_history', $saveLenderFund);

                        // Insert into transation history table
                        $save['inAmount'] = $individualRepaidAmount;
                        $save['outAmount'] = 0;
                        $save['transactionReason'] = 'repayments';
                        $save['userID'] = $lendersData->id;
                        $save['transactionDateTime'] = date('Y-m-d H:i:s');
                        $save['transactionStatus'] = 'done';
                        $this->db->insert('lander_transaction_history', $save);

                        // update lender credit with new amount

                        //$updateamount['inAmount'] = $individualRepaidAmount;
                        $currentCreditAmount = $lendersData->currentCreditAmount;
                        $credit['inAmount'] = floatval($currentCreditAmount + $individualRepaidAmount);
                       $success = $this->global_model->update('users', $credit, array('id' => $lendersData->id));
                    }
                    //// END FOR Loop ---

                }
                else{
                   echo"condition";
                    exit;
                }

                if(isset($success) && !empty($success)) {

                    // Update Repaiment schedule status to paid or unpaid
                    $scheduldStatus = ($actualRepaidAmount < $repaidAmount) ? 'Due' : 'Paid';

                    $updateArr['repaidStatus'] = $scheduldStatus;
                    $updateArr['dueAmount'] = floatval($repaidAmount - $actualRepaidAmount);

                    $ref = $this->global_model->update('repayment_schedules', $updateArr, array('repaymentScheduleID' => $repaymentScheduleID));
                }

                if(isset($ref) && !empty($ref)){
                    // add flash data
                    // Your project save successfully
                    echo "success";
                    exit;

                }else{
                    echo "error";
                    exit;

                }
            }
        }

       exit;

    }


    public function lenderRefundDetails($id){
        $data = array();
        $data['projects'] = $this->Repayment_model->all_refund_project($id);
        echo $this->load->view('lendars/lenderRefund', $data, TRUE);
        exit;
    }

    public function lenderRefund(){
        $data = array();
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        if($this->input->post()){
            $postData['projectID'] = $this->input->post('projectID');
            $postData['repaidAmount'] = $this->input->post('repaidAmount');
            $postData['lenderID'] = $this->input->post('lenderID');
            echo json_encode($postData);
            echo 'success';
        }else{
            echo 'error';
        }

    }


    function getrepaymentlist() {
        $data = array();
        $data['page_title'] = 'Repayment List';
        $data['no_data'] = 'Data not found.';

       $selectedTab = $this->input->post('selectedTab');

        $loginId = $this->session->userdata('login_id');
        $allRepaymentList = $this->Repayment_model->repaymentList();

        $pastDueArr = array();
        $dueArr = array();
        $currentArr =  array();
        $today = strtotime(date('Y-m-d', time()));
        $next3rdDay = strtotime(date('Y-m-d', strtotime('+3 day', $today)));
        //echo $schedualeDateTime = strtotime('2017-08-24');

        foreach ($allRepaymentList as $list){


            $totalfunded = $this->global_model->total_sum('project_fund_history', array('projectID' => $list->projectID));
            $totalfunded = (!empty($totalfunded))? $totalfunded:'0';

            $projectRepaidAmount = $this->global_model->total_sum('borrower_repaid_history', array('projectsID' => $list->projectID), 'amount');
            $projectRepaidAmount = (!empty($projectRepaidAmount))? $projectRepaidAmount:'0';

            $loanbalane = floatval($totalfunded - $projectRepaidAmount);

            $list->loanbalance = $loanbalane;


            $schedualeDateTime = strtotime($list->schedualeDateTime);
            if($schedualeDateTime < $today && $selectedTab == 'pastDue'){
                $pastDueArr[] = $list;
            }elseif($schedualeDateTime >= $today  && $schedualeDateTime <= $next3rdDay && $list->repaidStatus == 'Unpaid' && $selectedTab == 'due'){
                $dueArr[] = $list;
            }elseif($today == $schedualeDateTime && $list->repaidStatus == 'Paid'  && $selectedTab == 'current'){
                $currentArr[] = $list;
            }
        }

        if($selectedTab == 'current'){
            $data['dataArr'] = $currentArr;
        }elseif($selectedTab == 'pastDue'){
            $data['pastDueArr'] = $pastDueArr;
        }elseif($selectedTab == 'due'){
            $data['dueArr'] = $dueArr;
        }else{
            $data['dueArr'] = $allRepaymentList;
        }

        //$data['allRepaymentList'] = $allRepaymentList;

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        //$this->load->view('header', $data);
        echo $this->load->view('borrowers/ajax/repaymentList', $data, true);
        exit;
        //$this->load->view('footer');



    }



}
