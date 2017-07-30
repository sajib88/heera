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
            $this->form_validation->set_rules('fundedAmount', 'fundedAmount', 'required');
            if($this->form_validation->run() == true){
                $loginId = $this->session->userdata('login_id');               
                $save['projectID'] = empty($postData['projectID']) ? NULL : $postData['projectID'];
                $save['fundedAmount'] = empty($postData['fundedAmount']) ? NULL : $postData['fundedAmount'];
                $save['fundedBy'] = $loginId;
                $save['fundedDateTime'] =  date('Y-m-d H:i:s');                
                $credit['fundedAmount'] = $postData['fundedAmount'];
                $credit['fundedAmount'] += $save['fundedAmount'] = $postData['currentAmount'];
                if ($ref = $this->global_model->insert('project_fund_history', $save)) {
                        if($ref = $this->global_model->update('users', $credit, array('id' => $loginId))){
                        $this->session->set_flashdata('message', 'Save Success');
                        redirect(base_url('profile/Dashboard'));
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
    
    public function payPal(){
        $data = array();
        
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        
        
    }

}