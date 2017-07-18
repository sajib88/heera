<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:04 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class ces_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger form-error">', '</div>');

    }

    public function index($msg=''){
        $data = array();
        $data['page_title'] = 'Add CES';
        $data['error'] = $msg;
        $loginId = $this->session->userdata('login_id');

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['main_cat'] = $this->global_model->get('classified_main_cat');
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('ces/add_view', $data);
        $this->load->view('footer');

    }
    
    public function create(){

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');
        $loginId = $this->session->userdata('login_id');

        if ($this->form_validation->run() == FALSE)
        {
            $msg = '<div class="alert alert-danger form-error">'.'ERROR'.'</div>';
            $this->index($msg);
        }
        else{

            $data = array();
            $data['uid'] = $loginId;
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['ce_type'] = $this->input->post('ce_type');
            $data['price'] = $this->input->post('price');
            $data['special_price'] = $this->input->post('special_price');
            $data['country'] = $this->input->post('country');
            $data['state'] = (!empty($this->input->post('state'))?$this->input->post('state'):'');
            $data['postcode'] = $this->input->post('postcode');
            $data['address1'] = $this->input->post('address1');
            $data['address2'] = $this->input->post('address2');
            $data['business_name'] = $this->input->post('business_name');
            $data['business_email'] = $this->input->post('business_email');
            $data['business_phone'] = $this->input->post('business_phone');
            $data['business_fax'] = $this->input->post('business_fax');
            $data['business_website'] = $this->input->post('business_website');
            $data['status'] = 1;
            $data['profession_view'] = (!empty($this->input->post('profession')))?implode(',', $this->input->post('profession')):'';



            uploadConfiguration();


            //// PHOTO UPLOAD
            if ($this->upload->do_upload('primary_image')) {
                $fileInfo = $this->upload->data();
                $pic1['name'] = $fileInfo['file_name'];
                $data['primary_image'] = $pic1['name'];
            }

            if ($this->upload->do_upload('image2')) {
                $fileInfo = $this->upload->data();
                $pic2['name'] = $fileInfo['file_name'];
                $data['image2'] = $pic2['name'];
            }

            if ($this->upload->do_upload('image3')) {
                $fileInfo = $this->upload->data();
                $pic3['name'] = $fileInfo['file_name'];
                $data['image3'] = $pic3['name'];
            }

            //video upload
            if ($this->upload->do_upload('primary_video')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['primary_video'] = $video['name'];
            }

            //video upload
            if ($this->upload->do_upload('video1')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['video1'] = $video['name'];
            }

            //sound upload
            if ($this->upload->do_upload('primary_sound')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['primary_sound'] = $sound['name'];
            }
            //sound upload
            if ($this->upload->do_upload('sound1')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['sound1'] = $sound['name'];
            }


            //// File UPLOAD
            if ($this->upload->do_upload('primary_file')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['primary_file'] = $file1['name'];
            }
            if ($this->upload->do_upload('file2')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['file2'] = $file1['name'];
            }

                $post_id = $this->global_model->insert('ces',$data);
                $this->session->set_flashdata('msg', '<div class="alert alert-success" id="success-alert">'.'Create CES Successfully'.'</div>');
                redirect(base_url().'ces/add');

        }

    }

    public function allces()
    {
        $table = 'ces';
        $data = array();
        $data['page_title'] = 'All ces';
        $loginId = $this->session->userdata('login_id');
        $data['allces']  	 = $this->global_model->get($table);
        /*print '<pre>';
        print_r($data['allpersonals']);die;*/

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('ces/allces_view', $data);
        $this->load->view('footer');
    }

    public function grid()
    {
        $table = 'ces';
        $data = array();
        $data['page_title'] = 'All CES';
        $loginId = $this->session->userdata('login_id');
        $data['allcesGrid']  	 = $this->global_model->get($table);
        /*print '<pre>';
        print_r($data['allpersonals']);die;*/

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('ces/cesGrid_view', $data);
        $this->load->view('footer');

    }

    public function edit($cesID=''){
        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'edit';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        $id = $this->uri->segment('3');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['states'] = $this->global_model->get('states');
        $data['login_id'] = $loginId;




        $data['value'] = $this->global_model->get_data('ces', array('id' => $cesID));
        $tablename = 'ces';
        $data['states'] = getStatesByCountry($tablename,$id);

        /*print '<pre>';
        print_r($data['personaldata']);exit();*/

        $this->load->view('header', $data);
        $this->load->view('ces/edit_ces_view', $data);
        $this->load->view('footer');

    }

    public function updateCES(){

        $data = array();
        $data['page_title'] = 'Edit CES';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $id 	= $this->input->post('id');


        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->edit($id);
        }
        else{
            $data = array();
            $data['uid'] = $loginId;
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['ce_type'] = $this->input->post('ce_type');
            $data['price'] = $this->input->post('price');
            $data['special_price'] = $this->input->post('special_price');
            $data['country'] = $this->input->post('country');
            $data['state'] = (!empty($this->input->post('state'))?$this->input->post('state'):'');
            $data['postcode'] = $this->input->post('postcode');
            $data['address1'] = $this->input->post('address1');
            $data['address2'] = $this->input->post('address2');
            $data['business_name'] = $this->input->post('business_name');
            $data['business_email'] = $this->input->post('business_email');
            $data['business_phone'] = $this->input->post('business_phone');
            $data['business_fax'] = $this->input->post('business_fax');
            $data['business_website'] = $this->input->post('business_website');
            $data['status'] = 1;
            $data['profession_view'] = (!empty($this->input->post('profession')))?implode(',', $this->input->post('profession')):'';



            uploadConfiguration();


            //// PHOTO UPLOAD
            if ($this->upload->do_upload('primary_image')) {
                $fileInfo = $this->upload->data();
                $pic1['name'] = $fileInfo['file_name'];
                $data['primary_image'] = $pic1['name'];
            }

            if ($this->upload->do_upload('image2')) {
                $fileInfo = $this->upload->data();
                $pic2['name'] = $fileInfo['file_name'];
                $data['image2'] = $pic2['name'];
            }

            if ($this->upload->do_upload('image3')) {
                $fileInfo = $this->upload->data();
                $pic3['name'] = $fileInfo['file_name'];
                $data['image3'] = $pic3['name'];
            }

            //video upload
            if ($this->upload->do_upload('primary_video')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['primary_video'] = $video['name'];
            }

            //video upload
            if ($this->upload->do_upload('video1')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['video1'] = $video['name'];
            }

            //sound upload
            if ($this->upload->do_upload('primary_sound')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['primary_sound'] = $sound['name'];
            }
            //sound upload
            if ($this->upload->do_upload('sound1')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['sound1'] = $sound['name'];
            }


            //// File UPLOAD
            if ($this->upload->do_upload('primary_file')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['primary_file'] = $file1['name'];
            }
            if ($this->upload->do_upload('file2')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['file2'] = $file1['name'];
            }

           /* print '<pre>';
            print_r($data);die;*/



            $result = $this->global_model->update('ces',$data,array('id'=>$id));
            if($result > 0)
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" id="success-alert">'.'Data Update Successfully'.'</div>');
            }
            redirect(base_url('ces/edit/'.$id));


        }

    }

    public function detail(){
        $data = array();

        $data['page_title'] = 'ces detail';
        $data['error'] = '';
        $id = $this->uri->segment('3');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));



        $data['layoutfull'] = $this->global_model->get_data('ces', array('id' => $id));


        $this->load->view('header', $data);
        $this->load->view('ces/cesdetail_view', $data);
        $this->load->view('footer');


    }
    public function search(){
        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'edit';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');



        if($this->input->post()){
            $postData = $this->input->post();
            /*print '<pre>';
            print_r($this->input->post());
            die;*/
            $value = array();
            $value['country'] = (!empty($postData['country']))?$postData['country']:'';
            $value['state'] = (!empty($postData['country']))?$postData['state']:'';
            $value['postcode'] = (!empty($postData['postcode']))?$postData['postcode']:'';
            $value['profession'] = (!empty($postData['profession']))?$postData['profession']:'';
            $value['business_name'] = (!empty($postData['business_name']))?$postData['business_name']:'';
            $value['business_phone'] = (!empty($postData['business_phone']))?$postData['business_phone']:'';

            $data['result'] = $this->global_model->get_ces_search_data('ces',$value,FALSE,FALSE);


        }

        $id = $this->uri->segment('3');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['states'] = $this->global_model->get('states');
        $data['login_id'] = $loginId;

        $this->form_validation->set_rules('country', 'country', 'xss_clean');
        $this->form_validation->set_rules('state', 'state', 'xss_clean');
        $this->form_validation->set_rules('city', 'city', 'xss_clean');
        $this->form_validation->set_rules('interestin', 'interestin', 'xss_clean');
        $this->form_validation->set_rules('maritalstatus', 'maritalstatus', 'xss_clean');
        $this->form_validation->set_rules('lang', 'lang', 'xss_clean');

        $this->load->view('header', $data);
        $this->load->view('ces/ces_search_view', $data);
        $this->load->view('footer');

    }
}
?>