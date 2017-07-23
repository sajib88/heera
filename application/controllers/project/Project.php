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
        $data['page_title'] = 'Add Product';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if($this->input->post()){
            $postData = $this->input->post();
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('type', 'type', 'trim');
            $this->form_validation->set_rules('price', 'price', 'trim');
            $this->form_validation->set_rules('special_price', 'special_price', 'trim');
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('zip', 'zip', 'trim');
            $this->form_validation->set_rules('seller_address1', 'seller_address1', 'trim');
            $this->form_validation->set_rules('seller_address2', 'seller_address2', 'trim');
            $this->form_validation->set_rules('seller_name', 'seller_name', 'trim');
            $this->form_validation->set_rules('seller_email', 'seller_email', 'trim');
            $this->form_validation->set_rules('seller_website', 'seller_website', 'trim');
            $this->form_validation->set_rules('seller_phone', 'seller_phone', 'trim');
            $this->form_validation->set_rules('seller_fax', 'seller_fax', 'trim');



            if($this->form_validation->run() == true){

                $save['uid'] = $loginId;
                $save['name'] = $postData['name'];
                $save['description'] = $postData['description'];
                $save['type'] = $postData['type'];
                $save['price'] = $postData['price'];
                $save['special_price'] = $postData['special_price'];
                $save['country'] = $postData['country'];
                $save['state'] = $postData['state'];
                $save['city'] = $postData['city'];
                $save['zip'] = $postData['zip'];
                $save['seller_address1'] = $postData['seller_address1'];
                $save['seller_address2'] = $postData['seller_address2'];
                $save['seller_name'] = $postData['seller_name'];
                $save['seller_email'] = $postData['seller_email'];
                $save['seller_website'] = $postData['seller_website'];
                $save['seller_phone'] = $postData['seller_phone'];
                $save['seller_fax'] = $postData['seller_fax'];
                $save['profession_view'] = implode(',', $postData['profession_view']);
                $save['status'] = 1;



                //// (image upload funtion)
                uploadProduct();
                ///

                //// PHOTO UPLOAD
                if ($this->upload->do_upload('photo_primary')) {
                    $fileInfo = $this->upload->data();
                    $pic1['name'] = $fileInfo['file_name'];
                    $save['photo_primary'] = $pic1['name'];
                }

                if ($this->upload->do_upload('photo_2')) {
                    $fileInfo = $this->upload->data();
                    $pic2['name'] = $fileInfo['file_name'];
                    $save['photo_2'] = $pic2['name'];
                }

                if ($this->upload->do_upload('photo_3')) {
                    $fileInfo = $this->upload->data();
                    $pic3['name'] = $fileInfo['file_name'];
                    $save['photo_3'] = $pic3['name'];
                }


                //// File UPLOAD
                if ($this->upload->do_upload('primary_file')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['primary_file'] = $file1['name'];
                }
                if ($this->upload->do_upload('file_2')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['file_2'] = $file1['name'];
                }

                //sound upload
                if ($this->upload->do_upload('primary_sound')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['primary_sound'] = $sound['name'];
                }
                //sound upload
                if ($this->upload->do_upload('sound1')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['sound1'] = $sound['name'];
                }
                //video upload
                if ($this->upload->do_upload('primary_video')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['primary_video'] = $video['name'];
                }

                //video upload
                if ($this->upload->do_upload('video1')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['video1'] = $video['name'];
                }


                // print '<pre>';
                // print_r($save);die;

                if ($ref_id = $this->global_model->insert('product', $save)) {
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
