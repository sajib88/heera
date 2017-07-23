<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

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



    public function project_details() {

        $this->load->view('guest_head');
        $this->load->view('project/project_details');
        $this->load->view('guest_footer');
    }


    public function add(){
        $data = array();
        $data['page_title'] = 'Project';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if($this->input->post()){
            $postData = $this->input->post();
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('shortDescription', 'shortDescription', 'required');
            $this->form_validation->set_rules('detailsDescription', 'detailsDescription', 'required');
            $this->form_validation->set_rules('neededAmount', 'neededAmount', 'required');
            $this->form_validation->set_rules('interestRate', 'interestRate', 'required');
            $this->form_validation->set_rules('address1', 'address1', 'required');
            $this->form_validation->set_rules('address2', 'address2', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('state', 'state', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');

            if($this->form_validation->run() == true){
                $save['name'] = $postData['name'];
                $save['purposeID'] = $postData['purposeID'];
                $save['shortDescription'] = $postData['shortDescription'];
                $save['detailsDescription'] = $postData['detailsDescription'];
                $save['creditScore'] = $postData['creditScore'];
                $save['loanTerm'] = $postData['loanTerm'];
                $save['RepaymentScheduleID'] = $postData['RepaymentScheduleID'];
                $save['neededAmount'] = $postData['neededAmount'];
                $save['paymentMethodID'] = $postData['paymentMethodID'];
                $save['interestRate'] = $postData['interestRate'];
                $save['projectEndDate'] = $postData['projectEndDate'];
                $save['address1'] = $postData['address1'];
                $save['address2'] = $postData['address2'];
                $save['city'] = $postData['city'];
                $save['state'] = $postData['state'];
                $save['country'] = $postData['country'];
                $save['feedURL'] = $postData['feedURL'];
                $save['videoURL'] = $postData['videoURL'];
                $save['monthlyIncome'] = $postData['monthlyIncome'];
                $save['totalExpenses'] = $postData['totalExpenses'];
                $save['homeOwnership'] = $postData['homeOwnership'];
                $save['lengthOfEmployment'] = $postData['lengthOfEmployment'];
                $save['debtToIncome'] = $postData['debtToIncome'];
                $save['employmentSelfemployment'] = $postData['employmentSelfemployment'];
                $save['monthlyExpenses'] = $postData['monthlyExpenses'];
                $save['otherLoanRepayment'] = $postData['otherLoanRepayment'];
                $save['transportCharge'] = $postData['transportCharge'];
                $save['insurance'] = $postData['insurance'];
                $save['coursesSchoolFees'] = $postData['coursesSchoolFees'];
                $save['TaxNIProvisions'] = $postData['TaxNIProvisions'];
                $save['userID'] = $loginId;
                $save['status'] = 1;
                
                if (isset($_FILES["mainImage"]["name"]) && $_FILES["mainImage"]["name"] != '') {
                $this->PATH = './assets/file/project';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['mainImage'] = $this->resizeimg->image_upload('mainImage', $this->PATH, 'size[300,300]', '', $photo_name);
                }
                else {

                }  
                
                // print '<pre>';
                // print_r($save);die;

                if ($ref = $this->global_model->insert('project', $save)) {
                    $this->session->set_flashdata('message', 'Save Success');
                }

            }
        }

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['main_cat'] = $this->global_model->get('classified_main_cat');
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('project/add', $data);
        $this->load->view('footer');


    }
    
    public function edit(){
        
        $data = array();
        $data['page_title'] = 'Edit Project';
        $data['error'] = '';       
        
        $loginId = $this->session->userdata('login_id');
        
         if($this->input->post()){
            $postData = $this->input->post();
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('shortDescription', 'shortDescription', 'required');
            $this->form_validation->set_rules('detailsDescription', 'detailsDescription', 'required');
            $this->form_validation->set_rules('neededAmount', 'neededAmount', 'required');
            $this->form_validation->set_rules('interestRate', 'interestRate', 'required');
            $this->form_validation->set_rules('address1', 'address1', 'required');
            $this->form_validation->set_rules('address2', 'address2', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
            $this->form_validation->set_rules('state', 'state', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');

            if($this->form_validation->run() == true){
                $save['name'] = $postData['name'];
                $save['purposeID'] = $postData['purposeID'];
                $save['shortDescription'] = $postData['shortDescription'];
                $save['detailsDescription'] = $postData['detailsDescription'];
                $save['creditScore'] = $postData['creditScore'];
                $save['loanTerm'] = $postData['loanTerm'];
                $save['RepaymentScheduleID'] = $postData['RepaymentScheduleID'];
                $save['neededAmount'] = $postData['neededAmount'];
                $save['paymentMethodID'] = $postData['paymentMethodID'];
                $save['interestRate'] = $postData['interestRate'];
                $save['projectEndDate'] = $postData['projectEndDate'];
                $save['address1'] = $postData['address1'];
                $save['address2'] = $postData['address2'];
                $save['city'] = $postData['city'];
                $save['state'] = $postData['state'];
                $save['country'] = $postData['country'];
                $save['feedURL'] = $postData['feedURL'];
                $save['videoURL'] = $postData['videoURL'];
                $save['monthlyIncome'] = $postData['monthlyIncome'];
                $save['totalExpenses'] = $postData['totalExpenses'];
                $save['homeOwnership'] = $postData['homeOwnership'];
                $save['lengthOfEmployment'] = $postData['lengthOfEmployment'];
                $save['debtToIncome'] = $postData['debtToIncome'];
                $save['employmentSelfemployment'] = $postData['employmentSelfemployment'];
                $save['monthlyExpenses'] = $postData['monthlyExpenses'];
                $save['otherLoanRepayment'] = $postData['otherLoanRepayment'];
                $save['transportCharge'] = $postData['transportCharge'];
                $save['insurance'] = $postData['insurance'];
                $save['coursesSchoolFees'] = $postData['coursesSchoolFees'];
                $save['TaxNIProvisions'] = $postData['TaxNIProvisions'];
                $save['userID'] = $loginId;
                $save['status'] = 1;
                
                if (isset($_FILES["mainImage"]["name"]) && $_FILES["mainImage"]["name"] != '') {
                $this->PATH = './assets/file/project';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['mainImage'] = $this->resizeimg->image_upload('mainImage', $this->PATH, 'size[300,300]', '', $photo_name);
                }
                else {

                }  
                
                // print '<pre>';
                // print_r($save);die;
                $id = $this->uri->segment('4');
                if ($ref = $this->global_model->update('project', $save, array('projectID' => $id))) {
                    $this->session->set_flashdata('message', 'Save Success');
                }

            }
        }
        
        $id = $this->uri->segment('4');
        $data['editProject'] = $this->global_model->get_data('project', array('projectID' => $id));        
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['states'] = $this->global_model->get('states');
        $data['profession'] = $this->global_model->get('profession');
        //$data['main_cat'] = $this->global_model->get('classified_main_cat');
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('project/edit', $data);
        $this->load->view('footer');
    }
    






}
