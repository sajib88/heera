<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_login()) {
            redirect('home/login');
        }
    }

    public function index() {

        $data = array();
        $data['page_title'] = 'Profile';
        $data['tabActive'] = 'profile';
        $data['error'] = '';
        
        $data['photos'] = $this->global_model->count_row_where('photos', array('ref_name' => 'image_album'));
        
        $loginId = $this->session->userdata('login_id');
          
        if ($this->input->post()) {
          
            $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
           
//            $this->form_validation->set_rules('pls', 'pls', 'trim');
//            $this->form_validation->set_rules('npi', 'npi', 'trim');
//            $this->form_validation->set_rules('pln', 'pln', 'trim');
            $this->form_validation->set_rules('gender', 'gender', 'trim');
            $this->form_validation->set_rules('address', 'address', 'trim');

            if ($this->form_validation->run() == true) {

               if($this->input->post('password')!= 0)
                {
                    $psw = $this->input->post('password');
                    $convertet = md5($psw);
                    $save['password'] = $convertet;
                }
                else {}
                
                $save['first_name'] = $this->input->post('first_name');
//                $save['last_name'] = $this->input->post('last_name');
//                $save['middle_name'] = $this->input->post('middle_name');
//                $save['plc'] = $this->input->post('plc');
//                $save['pls'] = $this->input->post('pls');
//                $save['npi'] = $this->input->post('npi');
//                $save['pln'] = $this->input->post('pln');
                $save['gender'] = $this->input->post('gender');
                $save['country'] = $this->input->post('country');
                $save['state'] = $this->input->post('state');
                $save['city'] = $this->input->post('city');
                $save['phone'] = $this->input->post('phone');
                $save['dateofbirth'] = $this->input->post('dateofbirth');
                $save['address'] = $this->input->post('address');
                $save['aboutme'] = $this->input->post('aboutme');
                
                if (isset($_FILES["profilepicture"]["name"]) && $_FILES["profilepicture"]["name"] != '') {
                $this->PATH = './assets/file/';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['profilepicture'] = $this->resizeimg->image_upload('profilepicture', $this->PATH, 'size[300,300]', '', $photo_name);
                }
                else {

                }

//
//                uploadConfiguration();
//                if ($this->upload->do_upload('profilepicture')) {
//                    $fileInfo = $this->upload->data();
//                    // $audo_data['ref_id'] = $insertedId;
//                    $audo_data['ref_id'] = $loginId;
//                    $audo_data['ref_name'] = 'profilepic';
//                    $audo_data['name'] = $fileInfo['file_name'];
//                    $this->global_model->insert('photos', $audo_data);
//
//                    $save['profilepicture'] = $audo_data['name'];
//                }
                if ($this->global_model->update('users', $save, array('id' => $loginId))) {
                    $this->session->set_flashdata('message', 'Update Success');
                    redirect('profile/profile');
                }
            } else {
                echo validation_errors();
            }
        }
        
        
        
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $countryInfo = $this->global_model->get_data('countries', array('id' => $data['user_info']['country']));
        $data['states'] = $this->global_model->get('states', array('country_id' => $countryInfo['id']));
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $this->load->view('header', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('footer');
    }

    public function viewProfile() {

        $data = array();
        $data['page_title'] = 'Profile';
        $data['tabActive'] = 'profile';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $this->load->view('header', $data);
        $this->load->view('profile/view', $data);
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

}

?>
