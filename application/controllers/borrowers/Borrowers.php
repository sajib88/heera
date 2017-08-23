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



        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('borrowers/repaymentList', $data);
        $this->load->view('footer');
    }

    public function getRepayment($id){
        $data = array();

        $loginId = $this->session->userdata('login_id');

        $data['projets']  = $repaymentdata = $this->global_model->repayment_get_by_id($id);
                            $totalRepaidAmount = $repaymentdata[0]->repaidAmount;

        $allLanders = $this->global_model->get_landerby_project_id($repaymentdata[0]->projectID);

        $totalFundedAmount = $this->global_model->total_sum('project_fund_history', array('projectID' => $repaymentdata[0]->projectID));


        // $proData->fundedAmount = (!empty($fundedAmount))? $fundedAmount:'0';


        foreach ($allLanders as $lendersData){


            $landersPaymentamount = $lendersData->fundedAmount;

            $x =  $landersPaymentamount;
            $y =  $totalFundedAmount;
            @$percent = @$x/@$y;

            $get_lenders_percent = number_format( $percent * 100, 2 ); // change 2 to # of decimals

            $individualRepaidAmount = number_format((($totalRepaidAmount*$get_lenders_percent)/100),2);
            $lendersData->individualRepaidAmount = $individualRepaidAmount;
        }

        $data['alllandersdata'] = $allLanders;

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

        //$currentCreditAmount = $data['user_info']['inAmount'];




        if($this->input->post()){
            $projectid = $this->input->post('projectsID');
            $borrower_ID = $this->input->post('borrower_ID');
            $projectRepaidID = $this->input->post('projectRepaidID');
            $repaymentScheduleID = $this->input->post('repaymentScheduleID');


            if(!empty($projectid)) {
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
                    $ref = $this->global_model->update('repayment_schedules', $statusschedule, array('repaymentScheduleID' => $repaymentScheduleID));

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


            }else
                {
                echo "Not sufficient fund";
            }
        }

        $this->load->view('guest_head', $data);
        $this->load->view('project/thankyou',$data);
        $this->load->view('guest_footer');

    }



}

