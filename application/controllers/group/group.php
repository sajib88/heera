<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class group extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }

    }



    public function index()
    {
        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

            if ($this->input->post()) {
                $postData = $this->input->post();
                $this->form_validation->set_rules('group_name', 'group_name', 'trim');
                $this->form_validation->set_rules('description', 'description', 'trim');
                $this->form_validation->set_rules('category', 'category', 'trim');
                $this->form_validation->set_rules('discussion', 'discussion', 'trim');
                $this->form_validation->set_rules('create_date', 'create_date', 'trim');

                if ($this->form_validation->run() == true) {


                    $save['group_name'] = $postData['group_name'];
                    $save['description'] = $postData['description'];
                    $save['category'] = $postData['category'];
                    $save['discussion'] = $postData['discussion'];
                    $save['create_date'] = $postData['create_date'];
                    $save['user_id'] = $loginId;
                    $save['status'] = '1';

                    //// (image upload funtion)
                    uploadConfiguration();
                    ///

                    //// PHOTO UPLOAD
                    if ($this->upload->do_upload('primary_image')) {
                        $fileInfo = $this->upload->data();
                        $pic1['name'] = $fileInfo['file_name'];
                        $save['primary_image'] = $pic1['name'];
                    }

                    if ($this->upload->do_upload('image_2')) {
                        $fileInfo = $this->upload->data();
                        $pic2['name'] = $fileInfo['file_name'];
                        $save['image_2'] = $pic2['name'];
                    }





                    if ($ref_id = $this->global_model->insert('gorupfad', $save)) {

                        $this->session->set_flashdata('message', 'Save Success');
                        //redirect('profile/profile');
                    }
                }
            }
            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
            $data['login_id'] = $loginId;
            $this->load->view('header', $data);
            $this->load->view('group/add', $data);
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
            $this->form_validation->set_rules('group_name', 'group_name', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('category', 'category', 'trim');
            $this->form_validation->set_rules('discussion', 'discussion', 'trim');
            $this->form_validation->set_rules('create_date', 'create_date', 'trim');

            if ($this->form_validation->run() == true) {

                $save['group_name'] = $postData['group_name'];
                $save['description'] = $postData['description'];
                $save['category'] = $postData['category'];
                $save['discussion'] = $postData['discussion'];
                $save['create_date'] = $postData['create_date'];
                $save['user_id'] = $loginId;
                $save['status'] = '1';

                //// (image upload funtion)
                uploadConfiguration();
                ///

                //// PHOTO UPLOAD
                if ($this->upload->do_upload('primary_image')) {
                    $fileInfo = $this->upload->data();
                    $pic1['name'] = $fileInfo['file_name'];
                    $save['primary_image'] = $pic1['name'];
                }


                if ($this->upload->do_upload('image_2')) {
                    $fileInfo = $this->upload->data();
                    $pic2['name'] = $fileInfo['file_name'];
                    $save['image_2'] = $pic2['name'];
                }



                $id = $this->uri->segment('4');
                if ($this->global_model->update('gorupfad', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Save Success');
                    //redirect('profile/profile');
                }
            }
        }

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $id = $this->uri->segment('4');
        $data['editgroup'] = $this->global_model->get_data('gorupfad', array('id' => $id));

        $this->load->view('header', $data);
        $this->load->view('group/edit', $data);
        $this->load->view('footer');
    }





    ////  View my classified only
    public function mygroup(){

        $data = array();
        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));

        $data['mygroup'] = $this->global_model->get('gorupfad', array('user_id' => $loginId));

        $this->load->view('header', $data);
        $this->load->view('group/myview', $data);
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

        $data['viewallevent'] = $this->global_model->get('gorupfad');

        $this->load->view('header', $data);
        $this->load->view('group/detailsview', $data);
        $this->load->view('footer');


    }




    //// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('gorupfad', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect('group/group/mygroup');
        }

    }



}

?>
