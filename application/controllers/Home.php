<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('global');
    }

    public function index() {
        $data = array();

        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');



        $this->load->view('guest_head');
        $this->load->view('home',$data);
        $this->load->view('guest_footer');


    }

    public function login() {

        if (check_login()) {
            redirect('profile/dashboard');
        }
        $data['page_title'] = 'Login';
        $data['tabActive'] = 'login';

        $data = array();
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run()) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $password = md5($password);

                if ($this->login_model->login($email, $password)) {
                    if ($this->login_model->login1($email, $password)) {
                        $this->session->set_flashdata('success_login', 'You have successfully login.');
                        $redirect_link = base_url() . 'profile/dashboard';
                        redirect($redirect_link);
                    } else {
                        $data['error'] = 'Warning! You have not activated it yet Or Your account has either been blocked';
                    }
                } else {
                    $data['error'] = "Login Failed!! Invalid username or password. (Type anything)";
                }
            } else {
                $data['error'] = validation_errors();
            }
        }

        //Warning
        //Login error! You have not activated your account.
        //Login denied! Your account has either been blocked or you have not activated it yet.

        $this->load->view('guest_head');
        $this->load->view('login', $data);
        $this->load->view('guest_footer');
    }

    public function registration() {

        $data = array();
        $data['page_title'] = 'Registration';
        $data['tabActive'] = 'registration';
        $data['error'] = '';

        if ($this->input->post()) {
            uploadConfiguration();
            $this->form_validation->set_rules('profession', 'profession', 'trim|required');
            $this->form_validation->set_rules('first_name', 'first name', 'trim');
            $this->form_validation->set_rules('last_name', 'last name', 'trim');
            $this->form_validation->set_rules('user_name', 'user name', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('conf', 'Confirm Password', 'trim|required|matches[password]');

            if ($this->form_validation->run() == true) {

                $save['profession'] = $this->input->post('profession');
                $save['first_name'] = $this->input->post('first_name');
                $save['last_name'] = $this->input->post('last_name');
                $save['user_name'] = $this->input->post('user_name');
                $save['email'] = $this->input->post('email');
                $save['password'] = md5($this->input->post('password'));

                if ($this->upload->do_upload('image')) {
                    $fileInfo = $this->upload->data();
                    $save['file_name'] = $fileInfo['file_name'];
                }

                if ($this->global_model->insert('users', $save)) {
                    $this->load->library('email');
                    $this->email->from('shahinalomcse@gmail.com', 'All Doctors');
                    $this->email->to('shahinalomcse@gmail.com');
                    $this->email->subject('Activation Link');
                    $this->email->message('This is activation link for active user.');
                    $this->email->send();
                    $this->session->set_flashdata('success', 'Your account has been created and an activation link has been sent to the email address you entered. Note that you must activate the account by selecting the activation link when you get the email before you can login.');
                    $redirect_link = base_url() . 'home/login';
                    redirect($redirect_link);
                } else {
                    $this->session->set_flashdata('success', 'Something worng please try again.');
                }
            } else {
                $data['error'] = validation_errors();
            }
        }


        $this->load->view('guest_head');
        $this->load->view('registration', $data);
        $this->load->view('guest_footer');
    }

    public function log_out() {
        $this->session->unset_userdata('login_id');
        $this->session->unset_userdata('user_type');
        $this->session->set_flashdata('logu_out_message', 'You have successful log out!');
        $redirect_link = base_url('home/login');
        redirect($redirect_link);
    }

    public function forgot_password() {
//        if (check_login()) {
//            redirect('profile/dashboard');
//        }
        $data['error'] = '';
        if ($this->input->post('submit')) {

            $this->load->helper('form');
            $this->load->library('email');
            $this->load->helper('email');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');

            if ($this->form_validation->run()) {
                $user_email = $this->input->post('email');
                $newpassword = mt_rand(10000, 150000);
                $encrpassword = MD5($newpassword);

                $is_ok = $this->login_model->forgot_password($user_email, $encrpassword);

                if (!empty($is_ok)) {
                    $this->email->from('shahinalomcse@gmail.com', 'All Doctors');
                    $this->email->to($user_email);
                    $this->email->subject('Password Reset Confirmation');

                    $comment = "Hi,<br />";
                    $comment .= "You recently requested a new password.<br />";
                    $comment .= "Your new password is :" . $newpassword . "<br />";
                    $comment .= "which you may enter on the password field.<br />";
                    $comment .= "In future you may change your password from your admin panel.<br />";

                    $this->email->set_mailtype("html");
                    $this->email->message($comment);

                    if ($this->email->send()) {
                        $this->session->set_flashdata('success', "Password reset successfull, a confirmation mail with new password will send to your email.<br/>");
                        $redirect_link = base_url() . 'registration/login';
                        redirect($redirect_link);
                    } else {
                        $data['error'] = "Error: mail not send....";
                    }
                } else {
                    // $this->session->set_flashdata('error', 'Wrong Information!');
                    $data['error'] = "Password reset Failed!! <br>Please Enter Valid User Email.";
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('forget_password', $data);
    }

}
