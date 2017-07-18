<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 09-Dec-16
 * Time: 1:18 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{

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
        $this->load->view('products/add', $data);
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
            $this->form_validation->set_rules('name', 'name', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('type', 'type', 'trim');
            $this->form_validation->set_rules('price', 'price', 'trim');
            $this->form_validation->set_rules('special_price', 'special_price', 'trim');
            $this->form_validation->set_rules('country', 'country', 'trim');
            $this->form_validation->set_rules('state', 'state', 'trim');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('zip', 'zip', 'trim');
            $this->form_validation->set_rules('seller_address1', 'seller_address1', 'trim');
            $this->form_validation->set_rules('seller_address2', 'seller_address2', 'trim');
            $this->form_validation->set_rules('seller_name', 'seller_name', 'trim');
            $this->form_validation->set_rules('seller_email', 'seller_email', 'trim');
            $this->form_validation->set_rules('seller_website', 'seller_website', 'trim');
            $this->form_validation->set_rules('seller_phone', 'seller_phone', 'trim');
            $this->form_validation->set_rules('seller_fax', 'seller_fax', 'trim');


            if ($this->form_validation->run() == true) {

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

                $save['profession_view'] = implode(',', $postData['profession_view']);
                $save['status'] = 1;
                $id = $this->uri->segment('4');

                /* echo $id;
                 print '<pre>';
                 print_r($save);die;*/
                if ($this->global_model->update('product', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Edit Success');
                    //redirect('profile/profile');
                }
            }
        }
        $id = $this->uri->segment('4');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $data['states'] = $this->global_model->get('states');
        $data['login_id'] = $loginId;


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));
        $data['editProduct'] = $this->global_model->get_data('product', array('id' => $id));

        $this->load->view('header', $data);
        $this->load->view('products/edit', $data);
        $this->load->view('footer');


    }

//// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('product', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect('product/products/myproduct');
        }

    }

    public function myproduct()
    {
        $table = 'product';
        $data = array();
        $data['page_title'] = 'Add Product';
        $loginId = $this->session->userdata('login_id');
        $data['allproducts']  	 = $this->global_model->get($table);

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('products/allproducts', $data);
        $this->load->view('footer');

    }



//// SHW ALL PRODUCT
    public function allProductGrid()
    {
        $table = 'product';
        $data = array();
        $data['page_title'] = 'Add Product';
        $loginId = $this->session->userdata('login_id');
        $data['allproducts']  	 = $this->global_model->get($table);

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('products/productgrid', $data);
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



        $data['layoutfull'] = $this->global_model->get_data('product', array('id' => $id));
        $data['countries'] = $this->global_model->get('countries');
        $data['main_cat'] = $this->global_model->get('classified_main_cat');

        $this->load->view('header', $data);
        $this->load->view('products/layoutfull', $data);
        $this->load->view('footer');


    }






}

?>