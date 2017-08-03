<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_login()) {
            redirect('home/login');
        }
    }

    public function index() {

        $data = array();
        $data['page_title'] = 'Dashboard';
        $data['tabActive'] = 'dashboard';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        ///// For lender purpuse code
        $data['fundtotal'] =  $this->global_model->total_sum('project_fund_history', array('fundedBy' => $loginId));


        //// Project funded by login user
        $projectDatafund = $this->global_model->get('project');

        foreach ($projectDatafund as $proData){
            //$proData->totalRaisedAmount = $this->global_model->total_sum('project_fund_history', array('projectID' => $proData->projectID));

            //print_r($proData);
           // echo $proData->projectID;
        }

        $data['projectData'] = $projectDatafund;

        //print_r($projectDatafund);

        $data['projectfunded'] = $this->global_model->get('project_fund_history', array('fundedBy'=>$loginId));
//echo $projectDatafund[0]->projectFundID;

        $this->load->view('header', $data);
        $this->load->view('profile/dashboard', $data);
        $this->load->view('footer');
    }

}

?>
