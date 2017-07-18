<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classifieds extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }

    }



    public function add()
    {
        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

            if ($this->input->post()) {
                $postData = $this->input->post();
               /// $this->form_validation->set_rules('classified', 'classified', 'trim');
                $this->form_validation->set_rules('title', 'title', 'trim');
                $this->form_validation->set_rules('main_category', 'main category', 'trim');
                $this->form_validation->set_rules('sub_cat', 'main cat', 'trim');
                $this->form_validation->set_rules('description', 'description', 'trim');
                $this->form_validation->set_rules('country', 'country', 'trim');
                $this->form_validation->set_rules('state', 'state', 'trim');
                $this->form_validation->set_rules('city', 'city', 'trim');
                $this->form_validation->set_rules('address_1', 'address_1', 'trim');
                $this->form_validation->set_rules('address_2', 'address_2', 'trim');
                $this->form_validation->set_rules('postal', 'postal', 'trim');
                $this->form_validation->set_rules('website', 'website', 'trim');
                $this->form_validation->set_rules('email', 'email', 'trim');
                $this->form_validation->set_rules('fax', 'fax', 'trim');
                $this->form_validation->set_rules('price', 'price', 'trim');

                if ($this->form_validation->run() == true) {

                   // $save['classifieds_ids'] = implode(',', $postData['classified']);
                    $save['classifieds_ids'] = '0';
                    $save['title'] = $postData['title'];
                    $save['description'] = $postData['description'];
                    $save['main_cat'] = $postData['main_category'];
                    $save['sub_cat'] = '0';
                    $save['price'] = $postData['price'];
                    $save['country'] = $postData['country'];
                    $save['city'] = $postData['city'];
                    $save['state'] = $postData['state'];
                    $save['postal'] = $postData['postal'];
                    $save['address_1'] = $postData['address_1'];
                    $save['address_2'] = $postData['address_2'];
                    $save['website'] = $postData['website'];
                    $save['name'] = $postData['name'];
                    $save['email'] = $postData['email'];
                    $save['phone'] = $postData['phone'];
                    $save['fax'] = $postData['fax'];
                    $save['price'] = $postData['price'];
                    $save['user_id'] = $loginId;

                    //// (image upload funtion)
                    uploadConfiguration();
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

                    if ($this->upload->do_upload('photo_4')) {
                        $fileInfo = $this->upload->data();
                        $pic4['name'] = $fileInfo['file_name'];
                        $save['photo_4'] = $pic4['name'];
                    }
                    //// File UPLOAD
                    if ($this->upload->do_upload('primary_file')) {
                        $fileInfo = $this->upload->data();
                        $file1['name'] = $fileInfo['file_name'];
                        $save['primary_file'] = $file1['name'];
                    }

                    //sound upload
                    if ($this->upload->do_upload('primary_sound')) {
                        $fileInfo = $this->upload->data();
                        $sound['name'] = $fileInfo['file_name'];
                        $save['primary_sound'] = $sound['name'];
                    }
                    //video upload
                    if ($this->upload->do_upload('primary_video')) {
                        $fileInfo = $this->upload->data();
                        $video['name'] = $fileInfo['file_name'];
                        $save['primary_video'] = $video['name'];
                    }

                    if ($ref_id = $this->global_model->insert('classified', $save)) {

                        $this->session->set_flashdata('message', 'Save Success');
                        //redirect('profile/profile');
                    }
                }
            }
            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
            $data['countries'] = $this->global_model->get('countries');
            $data['profession'] = $this->global_model->get('profession');
            $data['main_cat'] = $this->global_model->get('classified_main_cat');
            $data['login_id'] = $loginId;
            $this->load->view('header', $data);
            $this->load->view('classifieds/add', $data);
            $this->load->view('footer');
        }


    public function edit()
    {
        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if ($this->input->post()) {
            $postData = $this->input->post();
            //$this->form_validation->set_rules('classified', 'classified', 'trim');
            $this->form_validation->set_rules('title', 'title', 'trim');
            $this->form_validation->set_rules('main_category', 'main category', 'trim');
            $this->form_validation->set_rules('sub_cat', 'main cat', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('country', 'country', 'trim');
            $this->form_validation->set_rules('state', 'state', 'trim');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('address_1', 'address_1', 'trim');
            $this->form_validation->set_rules('address_2', 'address_2', 'trim');
            $this->form_validation->set_rules('postal', 'postal', 'trim');
            $this->form_validation->set_rules('website', 'website', 'trim');
            $this->form_validation->set_rules('email', 'email', 'trim');
            $this->form_validation->set_rules('fax', 'fax', 'trim');
            $this->form_validation->set_rules('price', 'price', 'trim');

            if ($this->form_validation->run() == true) {

                //$save['classifieds_ids'] = implode(',', $postData['classified']);
                $save['classifieds_ids'] = '0';
                $save['title'] = $postData['title'];
                $save['description'] = $postData['description'];
                $save['main_cat'] = $postData['main_category'];
                $save['sub_cat'] = '0';
                $save['price'] = $postData['price'];
                $save['country'] = $postData['country'];
                $save['city'] = $postData['city'];
                $save['state'] = $postData['state'];
                $save['postal'] = $postData['postal'];
                $save['address_1'] = $postData['address_1'];
                $save['address_2'] = $postData['address_2'];
                $save['website'] = $postData['website'];
                $save['name'] = $postData['name'];
                $save['email'] = $postData['email'];
                $save['phone'] = $postData['phone'];
                $save['fax'] = $postData['fax'];
                $save['price'] = $postData['price'];
                $save['user_id'] = $loginId;

                //// (image upload funtion)
                uploadConfiguration();
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

                if ($this->upload->do_upload('photo_4')) {
                    $fileInfo = $this->upload->data();
                    $pic4['name'] = $fileInfo['file_name'];
                    $save['photo_4'] = $pic4['name'];
                }
                //// File UPLOAD
                if ($this->upload->do_upload('primary_file')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['primary_file'] = $file1['name'];
                }

                //sound upload
                if ($this->upload->do_upload('primary_sound')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['primary_sound'] = $sound['name'];
                }
                //video upload
                if ($this->upload->do_upload('primary_video')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['primary_video'] = $video['name'];
                }
                $id = $this->uri->segment('4');
                if ($this->global_model->update('classified', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Save Success');
                    //redirect('profile/profile');
                }
            }
        }
        $id = $this->uri->segment('4');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $data['states'] = $this->global_model->get('states');
        $data['main_cat'] = $this->global_model->get('classified_main_cat');
        $data['personaldata'] = $this->global_model->get_data('classified', array('id' => $id));
        $data['login_id'] = $loginId;


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));
        $data['editclassified'] = $this->global_model->get_data('classified', array('id' => $id));

        $id = $data['editclassified']['id'];

        $data['states'] = classifiedgetStatesByCountry($id);

        $this->load->view('header', $data);
        $this->load->view('classifieds/edit', $data);
        $this->load->view('footer');
    }





    ////  View my classified only
    public function viewmyclassfied(){

        $data = array();
        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $data['myclassified'] = $this->global_model->get('classified', array('user_id' => $loginId));

        $this->load->view('header', $data);
        $this->load->view('classifieds/view', $data);
        $this->load->view('footer');


    }
    ////  View all users
    public function viewall(){

        $data = array();
        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $data['viewallclassified'] = $this->global_model->get('classified');

        $this->load->view('header', $data);
        $this->load->view('classifieds/detailsview', $data);
        $this->load->view('footer');


    }

    //// Detisls View
    public function layoutfull()
    {

        $data = array();

        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';
        $id = $this->uri->segment('4');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));



        $data['layoutfull'] = $this->global_model->get_data('classified', array('id' => $id));
        $data['countries'] = $this->global_model->get('countries');
        $data['main_cat'] = $this->global_model->get('classified_main_cat');

        $this->load->view('header', $data);
        $this->load->view('classifieds/layoutfull', $data);
        $this->load->view('footer');


    }


    //// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('classified', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect('classifieds/classifieds/viewmyclassfied');
        }

    }


    public function getStateByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;
    }

    public function getSubCat() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('classified_sub_cat', array('country_id' => $id));
        $data['cld_sub_cat'] = $states;
        echo $this->load->view('classified_sub_cat', $data, TRUE);
        exit;
    }

}

?>
