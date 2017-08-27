<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectUpdates extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');        
            
        $this->load->helper('global');


    }



    public function index() {

        $data = array();

        $projectData = $this->global_model->get('project', array('statusID ' => 3));
        //echo $this->db->last_query();

        foreach ($projectData as $proData){
            $proData->totalRaisedAmount = $this->global_model->total_sum('project_fund_history', array('projectID' => $proData->projectID));
        }
        $data['projectData'] = $projectData;


       // $activeproject=$data['activeproject'] = $this->global_model->get_data($table, array('statusID' => 3));
        echo "<pre>";
       // print_r($projectData);
        echo "</pre>";
        //echo $totalamount = $projectData[0]->totalRaisedAmount;
        //echo $minamount = $projectData[0]->minimumAmount;
        foreach($projectData as $row){
            $projectEnddate = $row->projectEndDate;
            $todays =  $date = date('Y-m-d');
             $minamount = $row->minimumAmount;
           echo $fundedamount = $row->totalRaisedAmount;
            $need = $row->neededAmount;

            echo "<br>";
            echo  $pid = $row->projectID;
            echo "<br>";
            //// not funded

            if($minamount<=$fundedamount){
                    echo "funded";


                $save['statusID'] = 4;
                $this->global_model->update('project', $save, array('neededAmount' => $need));

            }


            elseif($minamount>=$fundedamount)
            {
                echo "not fund";
                if($projectEnddate<$todays){
                    echo "go to reject";
                    $save['statusID'] = 8;
                    $this->global_model->update('project', $save, array('neededAmount' => $need));

                }

            }
            else {
                echo "not match";
            }


        }


        ////// funded with repaid amount
        //$projectData =  $data['repaymentSchedule'] = $this->global_model->get('repayment_schedules', array('projectID' => $id));
        $projectData =$this->global_model->get('project', array('statusID' => 4));

        foreach ($projectData as $proData){
            $fundedAmount = $this->global_model->total_sum('project_fund_history', array('projectID' => $proData->projectID));
            $proData->fundedAmount = (!empty($fundedAmount))? $fundedAmount:'0';
            $repaidAmount = $this->global_model->total_sum('project_repaid_history', array('projectID' => $proData->projectID, 'repaidStatus' => 'Done'), 'repaidAmount');
            $proData->repaidAmount = (!empty($repaidAmount))? $repaidAmount:'0';

            // calculate repaid %
            $x =  $repaidAmount;
            $y =  $fundedAmount;

            $percent = $x/$y;
            $percent_friendly = number_format( $percent * 100, 2 ); // change 2 to # of decimals

            $proData->repaidPercent = $percent_friendly;

            $paymentAmount = $this->global_model->get_data('repayment_schedules', array('projectID' => $proData->projectID), array('limit'=>'1','start'=>'0'));
            $proData->paymentAmount = (!empty($paymentAmount))?$paymentAmount['repaidAmount']:'0';



            $proData->remaining = $percent_friendly;


            //$proData->fundcollecttion = (!empty($fundcollecttion))? $fundcollecttion:'0';

        }
        $data['projectData'] =   $projectData;

        foreach ($projectData as $pro ){
          //  echo "<pre>";
           /// print_r($pro);
           /// echo  "<pre>";
             $totalfundedbylader = $pro->fundedAmount;
             $totalrepaid = $pro->repaidAmount;
             $pid = $pro->projectID;

             if($totalfundedbylader == $totalrepaid)
             {
                 $save['statusID'] = 6;
                 $this->global_model->update('project', $save, array('projectID' => $pid));
                 echo "go to repaid";
             }
             else{
                 echo "all payment not repaid";
             }

        }



       /// $data['fundcollecttion']  = $this->global_model->get('project_repaid_history', array('projectID' => $proData->projectID, 'repaidStatus' => 'Done'));

        ///




    }

}
