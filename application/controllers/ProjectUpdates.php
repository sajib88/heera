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
                //$this->global_model->update('project', $save, array('neededAmount' => $need));

            }


            elseif($minamount>=$fundedamount)
            {
                echo "not fund";
                if($projectEnddate<$todays){
                    echo "go to reject";
                    $save['statusID'] = 8;
                    //$this->global_model->update('project', $save, array('neededAmount' => $need));

                }

            }
            else {
                echo "not match";
            }


        }



    }

}
