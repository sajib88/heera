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
        $this->load->library('Resizeimg');
        $loginId = $this->session->userdata('login_id');

        if($this->input->post()){
            $postData = $this->input->post();
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('shortDescription', 'shortDescription', 'required');
            //$this->form_validation->set_rules('detailsDescription', 'detailsDescription');
            $this->form_validation->set_rules('neededAmount', 'neededAmount', 'required');


            if($this->form_validation->run() == true){
                $save['name'] = $postData['name'];
                $save['purposeID'] = $postData['purposeID'];
                $save['shortDescription'] = $postData['shortDescription'];
                $save['detailsDescription'] = empty($postData['detailsDescription']) ? NULL : $postData['detailsDescription'];
                $save['loanTerm'] = $postData['loanTerm'];
                $save['RepaymentScheduleID'] = $postData['RepaymentScheduleID'];
                $save['neededAmount'] = $postData['neededAmount'];
                $save['minimumAmount'] = $postData['minimumAmount'];
                $save['paymentMethodID'] = $postData['paymentMethodID'];
                $save['interestRate'] = $postData['interestRate'];
                $date = date('Y-m-d', strtotime($postData['projectEndDate']));
                $save['projectEndDate'] = $date;                
                $save['address1'] = empty($postData['address1']) ? NULL : $postData['address1'];
                $save['address2'] = empty($postData['address2']) ? NULL : $postData['address2'];
                $save['city'] = $postData['city'];
                $save['state'] = $postData['state'];
                $save['country'] = $postData['country'];
                $save['monthlyIncome'] = $postData['monthlyIncome'];
                $save['monthlyExpenses'] = empty($postData['monthlyExpenses']) ? NULL : $postData['monthlyExpenses'];
                $save['homeOwnership'] = $postData['homeOwnership'];
                $save['employmentSelfemployment'] = empty($postData['employmentSelfemployment']) ? NULL : $postData['employmentSelfemployment'];
                $save['userID'] = $loginId;

                
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
                
                if (isset($_FILES["photo1"]["name"]) && $_FILES["photo1"]["name"] != '') {
                $this->PATH = './assets/file/project';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['photo1'] = $this->resizeimg->image_upload('photo1', $this->PATH, 'size[300,300]', '', $photo_name);
                }
                else {

                }
                
                if (isset($_FILES["photo2"]["name"]) && $_FILES["photo2"]["name"] != '') {
                $this->PATH = './assets/file/project';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['photo2'] = $this->resizeimg->image_upload('photo2', $this->PATH, 'size[300,300]', '', $photo_name);
                }
                else {

                }
                
                if (isset($_FILES["photo3"]["name"]) && $_FILES["photo3"]["name"] != '') {
                $this->PATH = './assets/file/project';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['photo3'] = $this->resizeimg->image_upload('photo3', $this->PATH, 'size[300,300]', '', $photo_name);
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
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $data['repaymentschedule'] = $this->global_model->get('repaymentschedulelookup');
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
        $this->load->library('Resizeimg');
        $loginId = $this->session->userdata('login_id');
        
         if($this->input->post()){

            $postData = $this->input->post();

             $save['name'] = $postData['name'];
             $save['purposeID'] = $postData['purposeID'];
             $save['shortDescription'] = $postData['shortDescription'];
             $save['detailsDescription'] = empty($postData['detailsDescription']) ? NULL : $postData['detailsDescription'];
             $save['loanTerm'] = $postData['loanTerm'];
             $save['RepaymentScheduleID'] = $postData['RepaymentScheduleID'];
             $save['neededAmount'] = $postData['neededAmount'];
             $save['minimumAmount'] = $postData['minimumAmount'];
             $save['paymentMethodID'] = $postData['paymentMethodID'];
             $save['interestRate'] = $postData['interestRate'];
             $date = date('Y-m-d', strtotime($postData['projectEndDate']));
             $save['projectEndDate'] = $date;
             $save['address1'] = empty($postData['address1']) ? NULL : $postData['address1'];
             $save['address2'] = empty($postData['address2']) ? NULL : $postData['address2'];
             $save['city'] = $postData['city'];
             $save['state'] = $postData['state'];
             $save['country'] = $postData['country'];
             $save['monthlyIncome'] = $postData['monthlyIncome'];
             $save['monthlyExpenses'] = empty($postData['monthlyExpenses']) ? NULL : $postData['monthlyExpenses'];
             $save['homeOwnership'] = $postData['homeOwnership'];
             $save['employmentSelfemployment'] = empty($postData['employmentSelfemployment']) ? NULL : $postData['employmentSelfemployment'];

                
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
                
                if (isset($_FILES["photo1"]["name"]) && $_FILES["photo1"]["name"] != '') {
                $this->PATH = './assets/file/project';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['photo1'] = $this->resizeimg->image_upload('photo1', $this->PATH, 'size[300,300]', '', $photo_name);
                }
                else {

                }
                
                if (isset($_FILES["photo2"]["name"]) && $_FILES["photo2"]["name"] != '') {
                $this->PATH = './assets/file/project';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['photo2'] = $this->resizeimg->image_upload('photo2', $this->PATH, 'size[300,300]', '', $photo_name);
                }
                else {

                }
                
                if (isset($_FILES["photo3"]["name"]) && $_FILES["photo3"]["name"] != '') {
                $this->PATH = './assets/file/project';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['photo3'] = $this->resizeimg->image_upload('photo3', $this->PATH, 'size[300,300]', '', $photo_name);
                }
                else {

                }  
                
                // print '<pre>';
                // print_r($save);die;
                $id = $this->uri->segment('4');
                if ($ref = $this->global_model->update('project', $save, array('projectID' => $id))) {
                    $this->session->set_flashdata('message', 'Update Your Project info...');
                }


        }
        
        $id = $this->uri->segment('4');
        $data['editProject'] = $this->global_model->get_data('project', array('projectID' => $id));        
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['states'] = $this->global_model->get('states');
        $data['profession'] = $this->global_model->get('profession');
        $data['purpose'] = $this->global_model->get('purpose_lookup');
        $data['repaymentschedule'] = $this->global_model->get('repaymentschedulelookup');
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('project/edit', $data);
        $this->load->view('footer');
    }


    public function all($id='')
    {
        $table = 'project';
        $data = array();

        $loginId = $this->session->userdata('login_id');
        $data['allprojects'] = $this->global_model->get($table, array('statusID' => $id));


        $data['fundtotal'] =  $this->global_model->total_sum('project_fund_history', array('fundedBy' => $loginId));
        $data['project_status'] = $this->global_model->get('project_status_lookup');

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $data['count'] = $this->global_model->count_row_where($table, array('statusID' => NULL));

        //echo $id;die;
        if($id == ''){

            $data['page_title'] = 'New Submitted Projects';
            $data['no_data'] = 'No Project Found.';

            $data['allprojects'] = $this->global_model->get($table, array('statusID' => NULL));
            
            //print_r($data['count']);die;
        
        }elseif($id == 1){

            $data['page_title'] = 'Open Projects';
            $data['no_data'] = 'Any Open Project Not Found.';

        }elseif ($id == 2) {

            $data['page_title'] = 'Not Funded Projects';
            $data['no_data'] = 'Any Not Funded Project Not Found.';

        }elseif ($id == 3) {

            $data['page_title'] = 'Active Projects';
            $data['no_data'] = 'Any Active Project Not Found.';

        }elseif ($id == 4) {
            $data['allprojects'] = $this->global_model->get_repayment_check($id);
            $data['page_title'] = 'Funded Projects';
            $data['no_data'] = 'Any Funded Project Not Found.';

        }elseif ($id == 5) {

            $data['page_title'] = 'Partial Repaid Projects';
            $data['no_data'] = 'Any Partial Repaid Project Not Found.'; 
        }elseif ($id == 6) {

            $data['page_title'] = 'Repaid Projects';
            $data['no_data'] = 'Any Repaid Project Not Found.';
        }elseif ($id == 7) {

            $data['page_title'] = 'Defaulted Projects';
            $data['no_data'] = 'Any Defaulted Project Not Found.';
        }elseif ($id == 8) {

            $data['page_title'] = 'Loaned Projects';
            $data['no_data'] = 'Any Loaned Project Not Found.';
        }elseif ($id == 9) {

            $data['page_title'] = 'Repayment Progress Projects';
            $data['no_data'] = 'Any Repayment Progress Project Not Found.';
        }elseif ($id == 10) {

            $data['page_title'] = 'Closed Projects';
            $data['no_data'] = 'Any Closed Project Not Found.';
        }

        $this->load->view('header', $data);
        $this->load->view('project/table_view', $data);
        $this->load->view('footer');
    }
    
    public function getStatus($projectID){
        $data = array();
        //$id = $this->input->post('status');
        $projectDetails = $this->global_model->get_data('project', array('projectID' => $projectID));
        $returnArr['projectID'] = $projectDetails['projectID'];
        $returnArr['name'] = $projectDetails['name'];
        $returnArr['status'] = $projectDetails['statusID'];
        echo json_encode($returnArr);
       // print_r($projectDetails);
        
        exit;
    }
    
    public function updateStatus(){
        
        $status['statusID'] = $this->input->post('status');
        $status['projectID'] = $this->input->post('projectID');    

        $ref = $this->global_model->update('project', $status, array('projectID' => $this->input->post('projectID'))); 
        if( $ref ){
            // add flash data
            // Your project save successfully
            echo "success";
            $this->session->set_flashdata('message', 'Your project status update successfully');
            exit;
        }else{
            echo "error";
            // project status not saved. Please try again.
            $this->session->set_flashdata('error', 'Your project status not updated. Please try again.');
        }
        
        
        
         
    }

    public function detail(){
        $data = array();

        $data['page_title'] = 'Projects Detail';
        $data['error'] = '';
        $id = $this->uri->segment('4');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));
        $getprojectdata=$data['layoutfull'] = $this->global_model->get_data('project', array('projectID' => $id));

        $getbyprojectid= $getprojectdata['userID'];

        $date = $user_info = $this->global_model->get_data('users', array('id' => $getbyprojectid, 'password' => ''));
            $date['first_name'];
            $date['email'];
            $date['password'];

         $password = uniqid(date('YmdHis'));


        $this->load->view('header', $data);
        $this->load->view('project/projectdetail_view', $data);
        $this->load->view('footer');


    }


    public function landerproject($id='')
    {
        $table = 'project';
        $data = array();
        $loginId = $this->session->userdata('login_id');
        $data['project_status'] = $this->global_model->get('project_status_lookup');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        //echo $id;die;
        if ($id == '') {
            $data['page_title'] = 'Active Projects';
            $data['no_data'] = 'Any Active Project Not Found.';
            $data['allprojects'] = $this->global_model->lenders_projects_funded_amount($loginId);

            //print_r($data['allprojects']);die;

        }elseif ($id == 4) {
            $data['page_title'] = 'Funded Projects';
            $data['no_data'] = 'Any Funded Project Not Found.';
            $data['allprojects'] = $this->global_model->lenders_projects_by_statusID($loginId, $id);

        }

        $this->load->view('header', $data);
        $this->load->view('project/query_table_view', $data);
        $this->load->view('footer');
    }
    
    public function getStateByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;
    }

    public function ajaxreject(){
        $data = array();

        $id = $this->uri->segment('4');
        /// project data get url
        //$data['projectData'] = $this->global_model->get_data('project', array('projectID'=>$id));
        $data['projectData']= $id;

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $totalamount = $data['user_info']['inAmount'];

        echo $this->load->view('project/ajaxreject', $data, TRUE);

    }

    public function rejectProject(){
        $data = array();

        $projectID = $this->input->post('projectID');
        $adminApprovalStatus = $this->input->post('adminApprovalStatus');
        $rejectReason = $this->input->post('shortDescription');


        $save['adminApprovalDateTime'] = date('Y-m-d H:i:s');
        $save['adminApprovalStatus'] = $adminApprovalStatus;
        $save['rejectReason'] = $rejectReason;
        $save['statusID'] = 8;

        $ref = $this->global_model->update('project', $save, array('projectID' => $projectID));


        if( $ref ){

            echo "success";
            /// get project details
            $getprojectdata=$data['layoutfull'] = $this->global_model->get_data('project', array('projectID' => $projectID));
            /// get project details by user id
            $getbyprojectid= $getprojectdata['userID'];
            //// Set temp pass
            /// get new user id and data
            $datas = $user_info = $this->global_model->get_data('users', array('id' => $getbyprojectid));


            if ($user_info['password'] == null){

                $datas['first_name'];
                $datas['email'];
                $datas['password'] = $tmpPass;;
                $datas['confirmation_key'] 	= uniqid();


                $update['password'] = md5($tmpPass);
                $update['confirmation_key'] =  $datas['confirmation_key'];



                $updateusers = $this->global_model->update('users', $update, array('id' => $getbyprojectid));

                $this->borrower_confirmation_email($datas);
                $datas['status']= "Approved";
                $datas['email'];
                $this->project_status_application($datas);
            }
            else {

                $datas['status']= "Approved";
                $datas['email'];
                $this->project_status_application($datas);

            }


            exit;
        }else{
            echo "error";
            // project status not saved. Please try again.
            $this->session->set_flashdata('error', 'Your project status not updated. Please try again.');
        }
        //print_r($this->session->userdata('deliverdata'));
        exit;
    }

    public function approvedProject(){
        $data = array();

        $id = $this->uri->segment('4');

        $save['adminApprovalDateTime'] = date('Y-m-d H:i:s');
        $save['adminApprovalStatus'] = 'Approved';
        $save['rejectReason'] = 0;
        $save['statusID'] = 3;


        $ref = $this->global_model->update('project', $save, array('projectID' => $id));

        if($ref){

            // Your project save successfully
            echo "success";
            /// get project details
            $getprojectdata=$data['layoutfull'] = $this->global_model->get_data('project', array('projectID' => $id));
            /// get project details by user id
            $getbyprojectid= $getprojectdata['userID'];
            //// Set temp pass
            $tmpPass = date('YmdHis');
            /// get new user id and data
            $datas = $user_info = $this->global_model->get_data('users', array('id' => $getbyprojectid));



            if ($user_info['password'] == null){

                $datas['first_name'];
                $datas['email'];
                $datas['password'] = $tmpPass;;
                $datas['confirmation_key'] 	= uniqid();


                $update['password'] = md5($tmpPass);
                $update['confirmation_key'] =  $datas['confirmation_key'];



                $updateusers = $this->global_model->update('users', $update, array('id' => $getbyprojectid));

                $this->borrower_confirmation_email($datas);

                $datas['status']= "Approved";
                $datas['email'];
                $this->project_status_application($datas);
            }
            else {

                $datas['status']= "Approved";
                $datas['email'];
                $this->project_status_application($datas);

            }

            exit;
        }else{
            echo "error";

        }


        exit;
    }

    public function borrower_confirmation_email($datas=array())
    {
        $val = $this->get_admin_email_and_name();
        $admin_email = $val['admin_email'];
        $admin_name  = $val['admin_name'];

        $link = base_url('home/confirm'.'/'.$datas['confirmation_key']);


        //$this->load->model('admin/system_model');
        $tmpl = get_email_tmpl_by_email_name('borrower_confirmation_email');
        $subject = $tmpl->subject;
        $subject = str_replace("#first_name",$datas['first_name'],$subject);
        $subject = str_replace("#activationlink",$link,$subject);
        $subject = str_replace("#password",$datas['password'],$subject);
        $subject = str_replace("#webadmin",$admin_name,$subject);
        $subject = str_replace("#useremail",$datas['email'],$subject);


        $body = $tmpl->body;
        $body = str_replace("#first_name",$datas['first_name'],$body);
        $body = str_replace("#activationlink",$link,$body);
        $body = str_replace("#password",$datas['password'],$body);
        $body = str_replace("#webadmin",$admin_name,$body);
        $body = str_replace("#useremail",$datas['email'],$body);


        $this->load->library('email');
        $this->email->from($admin_email, $subject);
        $this->email->to($datas['email']);
        $this->email->subject('New Borrow Sign Up');
        $this->email->message($body);
        $this->email->send();
    }

//{"subject":"Your project Status","body":"Dear Borrowe,\r\n\r\nThank's for Submit your application.\r\n\r\nYour Project is #status.\r\n\t\t\t\t\t\t\t\t\t\t\r\nRegards\r\n#webadmin","avl_vars":"#status"}


    public function project_status_application($datas=array())
    {
        $val = $this->get_admin_email_and_name();
        $admin_email = $val['admin_email'];
        $admin_name  = $val['admin_name'];

        //$this->load->model('admin/system_model');
        $tmpl = get_email_tmpl_by_email_name('project_status_application');
        $subject = $tmpl->subject;
        $subject = str_replace("#status",$datas['status'],$subject);
        $subject = str_replace("#webadmin",$admin_name,$subject);
        $subject = str_replace("#useremail",$datas['email'],$subject);

        $body = $tmpl->body;
        $body = str_replace("#status",$datas['status'],$body);
        $body = str_replace("#useremail",$datas['email'],$body);
        $body = str_replace("#webadmin",$admin_name,$body);



        $this->load->library('email');
        $this->email->from($admin_email, $subject);
        $this->email->to($datas['email']);
        $this->email->subject('Project '.$datas['status']);
        $this->email->message($body);
        $this->email->send();
    }


    #get web admin name and email for email sending
    public function get_admin_email_and_name()
    {

        $data['admin_email'] = 'info@advertbd.com';
        $data['admin_name']  = 'Heera organization';

        return $data;
    }


    public function paymentschedule(){
        $data = array();
        $data['page_title'] = 'Project Payment Shedule';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $action = $this->uri->segment('4');
        if($action == 'view'){
            $projectID = $this->uri->segment('5');
        }else{
            $projectID = $this->uri->segment('4');
        }
        if(empty($projectID)){$projectID = $this->input->post('projectID');}

        $projectData = $this->global_model->get_project_details_by_id($projectID);

        $existingSchedule = $this->global_model->get_data('repayment_schedules', array('projectID' => $projectID));
        if($action != 'view') {
            if (empty($projectData)) {
                $this->session->set_flashdata('error', 'This Project ID is not exist. Please try with valid project.');
            } elseif (!empty($projectData) && $projectData['statusID'] != '4') {
                $this->session->set_flashdata('error', 'This Project is not permitted to create Repayment Schedule. Please try with valid project.');
            } elseif (!empty($existingSchedule)) {
                $this->session->set_flashdata('error', 'Repayment Schedule already exist for this Project. Please try with valid project.');
            } else {

                $totalRaisedAmount = array('totalRaisedAmount' => $this->global_model->total_sum('project_fund_history', array('projectID' => $projectData['projectID'])));

                $fullProjectData = array_merge($projectData + $totalRaisedAmount);

                // IF subbmit button clicked.
                if ($this->input->post()) {

                    $postData = $this->input->post();
                    $repaidSchedulArr = array();

                    if (!empty($postData['projectID'])) {

                        $loanTerm = $projectData['loanTerm'];
                        $numberOfMonth = 0;

                        if ($loanTerm == '1 Year') {
                            $numberOfMonth = 12;
                            $numberOfYear = 1;
                        } elseif ($loanTerm == '2 Years') {
                            $numberOfMonth = 24;
                            $numberOfYear = 2;
                        } elseif ($loanTerm == '3 Years') {
                            $numberOfMonth = 36;
                            $numberOfYear = 3;
                        } elseif ($loanTerm == '4 Years') {
                            $numberOfMonth = 48;
                            $numberOfYear = 4;
                        } elseif ($loanTerm == '5 Years') {
                            $numberOfMonth = 60;
                            $numberOfYear = 5;
                        }

                        $repaymentScheduleValue = $projectData['repaymentScheduleValue'];
                        $repaymentScheduleType = $projectData['repaymentScheduleType'];

                        $totalFundedAmount = $fullProjectData['totalRaisedAmount'];

                        if ($repaymentScheduleType == 'Monthly') {

                            $repaidAmount = number_format(($totalFundedAmount / $numberOfMonth), 2, '.', '');

                            $CurrentMonth = date('d-m-Y', strtotime('first day of this month') + 60 * 60 * 24 * $repaymentScheduleValue);

                            $month = strtotime($CurrentMonth);
                            for ($i = 1; $i <= $numberOfMonth; $i++) {
                                $month = strtotime('next month', $month);

                                $repaidSchedulArr['projectID'] = $projectID;
                                $repaidSchedulArr['schedualeDateTime'] = date("Y-m-d", $month);
                                $repaidSchedulArr['repaidAmount'] = $repaidAmount;

                                $updateRef = $this->db->insert('repayment_schedules', $repaidSchedulArr);
                            }

                        } elseif ($repaymentScheduleType == 'Days') {

                            // Dont touch this veriable 
                            $totalDaysInyear = 365;

                            $days = ($totalDaysInyear * $numberOfYear) / $repaymentScheduleValue;

                            $repaidAmount = number_format(($totalFundedAmount / $days), 2, '.', '');

                            $currentDate = date('Y-m-d');

                            for ($i = 1; $i <= $days; $i++) {
                                $dateWise = date('Y-m-d', strtotime('+' . $repaymentScheduleValue . ' day', strtotime($currentDate)));
                                //$dateWiseArr[] = $dateWise;

                                $repaidSchedulArr['projectID'] = $projectID;
                                $repaidSchedulArr['schedualeDateTime'] = $dateWise;
                                $repaidSchedulArr['repaidAmount'] = $repaidAmount;
                                $updateRef = $this->db->insert('repayment_schedules', $repaidSchedulArr);

                                $currentDate = $dateWise;

                            }
                        }

                        if ($updateRef) {
                            $this->session->set_flashdata('message', 'Your project Repayment Schedule Created Successfully ');
                        } else {
                            $this->session->set_flashdata('errot', 'Your project Repayment Schedule Not Created. Please try again.');
                        }
                    }
                }

                $data['projectData'] = $fullProjectData;
            }
        }else{
            $data['projectData'] = $projectData;
        }

        $data['repaymentSchedule'] = $this->global_model->get('repayment_schedules', array('projectID' => $projectID));

        $data['login_id'] = $loginId;

        $this->load->view('header', $data);
        $this->load->view('project/paymentSchedule', $data);
        $this->load->view('footer');
    }



}
