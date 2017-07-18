<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 09-Dec-16
 * Time: 10:27 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger form-error">', '</div>');
    }

    public function add(){
        $data = array();
        $data['page_title'] = 'Add Personal Info';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if ($this->input->post()) {
            $postData = $this->input->post();


            $this->form_validation->set_rules('title', 'title', 'required');
            $this->form_validation->set_rules('description', 'description', 'required');
            $this->form_validation->set_rules('country', 'country', 'required');
            //$this->form_validation->set_rules('primary_photo', 'primary_photo', 'required');


            if ($this->form_validation->run() == true) {
                $save['uid'] = $loginId;
                $save['title'] = $postData['title'];
                $save['description'] = $postData['description'];
                $save['body'] = $postData['body'];
                $save['height'] = $postData['height'];
                $save['ethnicity'] = $postData['ethnicity'];
                $save['maritalstatus'] = $postData['maritalstatus'];
                $save['age'] = $postData['age'];
                $save['child'] = $postData['child'];
                $save['lang'] = $postData['lang'];
                $save['religion'] = $postData['religion'];
                $save['smoker'] = $postData['smoker'];
                $save['drinker'] = $postData['drinker'];
                $save['entimicyorpreference'] = $postData['entimicyorpreference'];
                $save['eyecolor'] = $postData['eyecolor'];
                $save['haircolor'] = $postData['haircolor'];
                $save['country'] = $postData['country'];
                $save['state'] = (!empty($postData['state'])?$postData['state']:'');
                $save['city'] = $postData['city'];
                $save['zip'] = $postData['zip'];
                $save['im'] = $postData['im'];
                $save['interestedin'] = $postData['interestedin'];
                $save['profession'] = (!empty($postData['profession']))?implode(',', $postData['profession']):'';

                //// (image upload funtion)
                uploadConfiguration();
                ///

                //// PHOTO UPLOAD
                if ($this->upload->do_upload('primary_photo')) {
                    $fileInfo = $this->upload->data();
                    $pic1['name'] = $fileInfo['file_name'];
                    $save['primary_photo'] = $pic1['name'];
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
                if ($this->upload->do_upload('primary_files')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['primary_files'] = $file1['name'];
                }
                if ($this->upload->do_upload('file_2')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['file_2'] = $file1['name'];
                }

                //sound upload
                if ($this->upload->do_upload('primary_sounds')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['primary_sounds'] = $sound['name'];
                }
                //sound upload
                if ($this->upload->do_upload('sound1')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['sound1'] = $sound['name'];
                }
                //video upload
                if ($this->upload->do_upload('primary_videos')) {
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

                /*print '<pre>';
                print_r($save);die;*/


                $ref_id = $this->global_model->insert('personals', $save);

                if ($ref_id > 0) {
                    $this->session->set_flashdata('message', 'Save Success');
                }
            }
            else{
                $this->session->set_flashdata('message', 'Save operation is not Successfull');

            }

        }


        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('personal/add', $data);
        $this->load->view('footer');
    }


    public function all()
    {
        $table = 'personals';
        $data = array();
        $data['page_title'] = 'All Personals';
        $loginId = $this->session->userdata('login_id');
        $data['allpersonals']  	 = $this->global_model->get($table);
        /*print '<pre>';
        print_r($data['allpersonals']);die;*/

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('personal/allPersonals_view', $data);
        $this->load->view('footer');

    }
    public function grid()
    {
        $table = 'personals';
        $data = array();
        $data['page_title'] = 'All Personals';
        $loginId = $this->session->userdata('login_id');
        $data['allpersonals']  	 = $this->global_model->get($table);
        /*print '<pre>';
        print_r($data['allpersonals']);die;*/

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('personal/personalGrid_view', $data);
        $this->load->view('footer');

    }

    public function edit($id = ''){
        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'edit';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        $id = $this->uri->segment('4');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['states'] = $this->global_model->get('states');
        $data['login_id'] = $loginId;



        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));
        $data['personaldata'] = $this->global_model->get_data('personals', array('id' => $id));
        $data['states'] = privategetStatesByCountry($id);

        /*print '<pre>';
        print_r($data['personaldata']);exit();*/

        $this->load->view('header', $data);
        $this->load->view('personal/editPersonal', $data);
        $this->load->view('footer');
    }
    
    public function updatePersonal(){

        $data = array();
        $data['page_title'] = 'Edit Personal';
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
            $data['body'] = $this->input->post('body');
            $data['height'] = $this->input->post('height');
            $data['ethnicity'] = $this->input->post('ethnicity');
            $data['maritalstatus'] = $this->input->post('maritalstatus');
            $data['age'] = $this->input->post('age');
            $data['child'] = $this->input->post('child');
            $data['lang'] = $this->input->post('lang');
            $data['religion'] = $this->input->post('religion');
            $data['smoker'] = $this->input->post('smoker');
            $data['drinker'] = $this->input->post('drinker');
            $data['entimicyorpreference'] = $this->input->post('entimicyorpreference');
            $data['eyecolor'] = $this->input->post('eyecolor');
            $data['haircolor'] = $this->input->post('haircolor');
            $data['country'] = $this->input->post('country');
            $data['state'] = (!empty($this->input->post('state'))?$this->input->post('state'):'');
            $data['city'] = $this->input->post('city');
            $data['zip'] = $this->input->post('zip');
            $data['iam'] = $this->input->post('iam');
            $data['interestedin'] = $this->input->post('interestedin');
            $data['profession'] = (!empty($this->input->post('profession')))?implode(',', $this->input->post('profession')):'';

            //// (image upload funtion)
            uploadConfiguration();
            ///

            //// PHOTO UPLOAD
            if ($this->upload->do_upload('primary_photo')) {
                $fileInfo = $this->upload->data();
                $pic1['name'] = $fileInfo['file_name'];
                $data['primary_photo'] = $pic1['name'];
            }

            if ($this->upload->do_upload('photo1')) {
                $fileInfo = $this->upload->data();
                $pic2['name'] = $fileInfo['file_name'];
                $data['photo1'] = $pic2['name'];
            }

            if ($this->upload->do_upload('photo2')) {
                $fileInfo = $this->upload->data();
                $pic3['name'] = $fileInfo['file_name'];
                $data['photo2'] = $pic3['name'];
            }

            //video upload
            if ($this->upload->do_upload('primary_videos')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['primary_videos'] = $video['name'];
            }

            //video upload
            if ($this->upload->do_upload('video1')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['video1'] = $video['name'];
            }

            //sound upload
            if ($this->upload->do_upload('primary_sounds')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['primary_sounds'] = $sound['name'];
            }
            //sound upload
            if ($this->upload->do_upload('sound1')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['sound1'] = $sound['name'];
            }


            //// File UPLOAD
            if ($this->upload->do_upload('primary_files')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['primary_files'] = $file1['name'];
            }
            if ($this->upload->do_upload('file1')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['file1'] = $file1['name'];
            }




            $result = $this->global_model->update('personals',$data,array('id'=>$id));
            if($result > 0)
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" id="success-alert">'.'Data Update Successfully'.'</div>');
            }
            redirect(base_url('personal/Personal/edit/'.$id));


        }
        
    }
    public function detail(){
        $data = array();

        $data['page_title'] = 'personal detail';
        $data['error'] = '';
        $id = $this->uri->segment('4');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));



        $data['layoutfull'] = $this->global_model->get_data('personals', array('id' => $id));


        $this->load->view('header', $data);
        $this->load->view('personal/personaldetail_view', $data);
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
            $value['city'] = (!empty($postData['city']))?$postData['city']:'';
            $value['profession'] = (!empty($postData['profession']))?$postData['profession']:'';
            $value['maritalstatus'] = (!empty($postData['maritalstatus']))?$postData['maritalstatus']:'';
            $value['lang'] = (!empty($postData['lang']))?$postData['lang']:'';

            $data['result'] = $this->global_model->get_personal_search_data('personals',$value,FALSE,FALSE);


        }

        $id = $this->uri->segment('4');
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
        $this->load->view('personal/search_view', $data);
        $this->load->view('footer');




    }

    //// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('personals', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect('personal/Personal/grid');
        }

    }




}
?>