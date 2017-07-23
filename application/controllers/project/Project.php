<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('global');
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
            $this->form_validation->set_rules('name', 'name', 'trim|required');
            $this->form_validation->set_rules('purposeID', 'purposeID', 'trim|required');
            $this->form_validation->set_rules('shortDescription', 'shortDescription', 'trim|required');
            $this->form_validation->set_rules('detailsDescription', 'detailsDescription', 'trim|required');
            $this->form_validation->set_rules('mainImage', 'mainImage', 'trim|required');
            $this->form_validation->set_rules('creditScore', 'creditScore', 'trim|required');
            $this->form_validation->set_rules('loanTerm', 'loanTerm', 'trim|required');
            $this->form_validation->set_rules('RepaymentScheduleID', 'RepaymentScheduleID', 'trim|required');
            $this->form_validation->set_rules('neededAmount', 'neededAmount', 'trim|required');
            $this->form_validation->set_rules('paymentMethodID', 'paymentMethodID', 'trim|required');
            $this->form_validation->set_rules('interestRate', 'interestRate', 'trim');
            $this->form_validation->set_rules('address1', 'address1', 'trim|required');
            $this->form_validation->set_rules('address2', 'address2', 'trim|required');
            $this->form_validation->set_rules('city', 'city', 'trim|required');
            $this->form_validation->set_rules('state', 'state', 'trim|required');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('feedURL', 'feedURL', 'trim');
            $this->form_validation->set_rules('videoURL', 'videoURL', 'trim');
            $this->form_validation->set_rules('monthlyIncome', 'monthlyIncome', 'trim');
            $this->form_validation->set_rules('totalExpenses', 'totalExpenses', 'trim');
            $this->form_validation->set_rules('lengthOfEmployment', 'lengthOfEmployment', 'trim');
            $this->form_validation->set_rules('debtToIncome', 'debtToIncome', 'trim');
            $this->form_validation->set_rules('employmentSelfemployment', 'employmentSelfemployment', 'trim');
            $this->form_validation->set_rules('monthlyExpenses', 'monthlyExpenses', 'trim');
            $this->form_validation->set_rules('otherLoanRepayment', 'otherLoanRepayment', 'trim');
            $this->form_validation->set_rules('transportCharge', 'transportCharge', 'trim');
            $this->form_validation->set_rules('insurance', 'insurance', 'trim');
            $this->form_validation->set_rules('coursesSchoolFees', 'coursesSchoolFees', 'trim');
            $this->form_validation->set_rules('TaxNIProvisions', 'TaxNIProvisions', 'trim');
            



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
                
                
                //$save['profession_view'] = implode(',', $postData['profession_view']);


               // $save['mainImage'] = $postData['mainImage'];
                //// (image upload funtion)
                if (isset($_FILES["mainImage"]["name"]) && $_FILES["mainImage"]["name"] != '') {
                $this->PATH = './assets/file/project';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $data['mainImage'] = $this->resizeimg->image_upload('mainImage', $this->PATH, 'size[300,300]', '', $photo_name);
                }
                else {

                }   
                
                //// File UPLOAD
//                if ($this->upload->do_upload('primary_file')) {
//                    $fileInfo = $this->upload->data();
//                    $file1['name'] = $fileInfo['file_name'];
//                    $save['primary_file'] = $file1['name'];
//                }
//                if ($this->upload->do_upload('file_2')) {
//                    $fileInfo = $this->upload->data();
//                    $file1['name'] = $fileInfo['file_name'];
//                    $save['file_2'] = $file1['name'];
//                }
//
//                //sound upload
//                if ($this->upload->do_upload('primary_sound')) {
//                    $fileInfo = $this->upload->data();
//                    $sound['name'] = $fileInfo['file_name'];
//                    $save['primary_sound'] = $sound['name'];
//                }
//                //sound upload
//                if ($this->upload->do_upload('sound1')) {
//                    $fileInfo = $this->upload->data();
//                    $sound['name'] = $fileInfo['file_name'];
//                    $save['sound1'] = $sound['name'];
//                }
//                //video upload
//                if ($this->upload->do_upload('primary_video')) {
//                    $fileInfo = $this->upload->data();
//                    $video['name'] = $fileInfo['file_name'];
//                    $save['primary_video'] = $video['name'];
//                }
//
//                //video upload
//                if ($this->upload->do_upload('video1')) {
//                    $fileInfo = $this->upload->data();
//                    $video['name'] = $fileInfo['file_name'];
//                    $save['video1'] = $video['name'];
//                }


                // print '<pre>';
                // print_r($save);die;

                if ($ref_id = $this->global_model->insert('project', $save)) {
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






}
