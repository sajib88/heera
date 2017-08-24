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
            }elseif($today == $schedualeDateTime && $list->repaidStatus == 'Paid'){
                $currentArr[] = $list;
            }elseif($schedualeDateTime >= $today  && $next3rdDay <= $today){
                $dueArr[] = $list;
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

}
