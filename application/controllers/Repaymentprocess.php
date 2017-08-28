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


            if(!empty($projectid)) {

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
                        $saveLenderFund['projectsID'] = $projectid;
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
                        $this->global_model->update('users', $credit, array('id' => $lendersData->id));
                    }
                }else{
                    echo "Actual Repaid amonut shuld be equal or less then calculated repaid amount";
                }

                // Update Repaiment schedule status to paid or unpaid
                $scheduldStatus = ($actualRepaidAmount < $repaidAmount)?'Due':'Paid';

                $updateArr['repaidStatus'] = $scheduldStatus;
                $updateArr['dueAmount'] = floatval($repaidAmount-$actualRepaidAmount);

                $ref = $this->global_model->update('repayment_schedules', $updateArr, array('repaymentScheduleID' => $repaymentScheduleID));
echo $this->db->last_query();
                /*$data['alllandersdata'] = $allLanders;

                $postData = $this->input->post();

                // insert borrow repaid Transaction
                foreach ($postData['lenderID'] as $key => $lenderID) {

                    // Insert into borrower repaid history table
                    $saveLenderFund['projectsID'] = $projectid;
                    $saveLenderFund['lenderID'] = $postData['lenderID'][$key];
                    $saveLenderFund['dateTime'] = date('Y-m-d H:i:s');
                    $saveLenderFund['amount'] = $postData['amount'][$key];
                    $saveLenderFund['process_by_ID'] = $loginId;
                    $saveLenderFund['borrower_ID'] = $borrower_ID;
                    $this->db->insert('borrower_repaid_history', $saveLenderFund);

                    // Insert into transation history table
                    $save['inAmount'] = $postData['amount'][$key];
                    $save['outAmount'] = 0;
                    $save['transactionReason'] = 'repayments';
                    $save['userID'] = $postData['lenderID'][$key];
                    $save['transactionDateTime'] = date('Y-m-d H:i:s');
                    $save['transactionStatus'] = 'done';

                    $this->db->insert('lander_transaction_history', $save);

                    // get lender old credit amount

                    //$lenderOldCredit
                    // update lender credit with new amount

                    $updateamount['inAmount'] = $postData['amount'][$key];
                    $currentCreditAmount = $postData['currentCreditAmount'][$key];

                    $credit['inAmount']  =  floatval($currentCreditAmount+$postData['amount'][$key]);

                    $this->global_model->update('users', $credit, array('id' => $postData['lenderID'][$key]));
                }


                /////// Update satus - done
                $status['repaidStatus'] = 'Done';
                $status['paymentProcessBy'] = $loginId;
                $status['paymentProcessTime'] = date('Y-m-d H:i:s');



                $this->global_model->update('project_repaid_history', $status, array('repaymentScheduleID' => $repaymentScheduleID));

                $statusschedule['repaidStatus'] = 'Done';
                $ref = $this->global_model->update('repayment_schedules', $statusschedule, array('repaymentScheduleID' => $repaymentScheduleID));*/

                if( $ref ){
                    // add flash data
                    // Your project save successfully
                    echo "success";
                    $this->session->set_flashdata('message', 'Repayment Successfully');
                    exit;
                }else{
                    echo "error";
                    // project status not saved. Please try again.
                    $this->session->set_flashdata('error', 'Repayment Error.');
                }
            }
        }

        $this->load->view('guest_head', $data);
        $this->load->view('project/thankyou',$data);
        $this->load->view('guest_footer');

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

}
