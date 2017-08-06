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
        $user_info= $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        ///// For lender purpuse code
        $data['fundtotal'] =  $this->global_model->total_sum('project_fund_history', array('fundedBy' => $loginId));

        $data['count'] = $this->global_model->count_row_where('project', array('statusID' => NULL));



        if($user_info['profession'] == 1){

            //// Funded get table
            $landerfundloop  = $this->global_model->get('project_fund_history', array('fundedBy' => $loginId ));
            foreach ($landerfundloop as $landerfund){
                /// get id from loop
                $projectid=$landerfund->projectID;
                $landerfund->fundedAmount;
                $landerfund->fundedBy= $this->global_model->get('project', array('projectID' => $projectid));

            }


            $data['getanderproject'] = $this->global_model->get('project_fund_history', array('fundedBy' => $loginId));
        }else {

        }


        $this->load->view('header', $data);
        $this->load->view('profile/dashboard', $data);
        $this->load->view('footer');
    }

}

?>
