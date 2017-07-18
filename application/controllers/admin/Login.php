<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Class Login
 */
class Login extends CI_Controller {

    /**
     * @return
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index() {

        if (check_admin()) {
            redirect('login/dashboard');
        }

        $data['page_title'] = 'Login';
        $data['tabActive'] = 'login';

        $data = array();
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('email', 'User Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run()) {

                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $password = md5($password);

                if ($this->login_model->login_admin($email, $password)) {
                    $this->session->set_flashdata('success_login', 'You have successfully login.');
                    $redirect_link = base_url() . 'admin/dashboard';
                    redirect($redirect_link);
                } else {
                    $data['error'] = "Login Failed!! Invalid username or password. (Type anything)";
                }
            } else {
                $data['error'] = validation_errors();
            }
        }

        $this->load->view('admin/login', $data);
    }

    /**
     * logout
     */
    public function log_out_admin() {
        $this->session->unset_userdata('login_id');
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('logu_out_message', 'You have successful log out!');
        $redirect_link = base_url('admin/login');
        redirect($redirect_link);
    }

    public function log_out() {
        $this->session->unset_userdata('login_id');
        $this->session->unset_userdata('user_type');
        $this->session->set_flashdata('logu_out_message', 'You have successful log out!');
        $redirect_link = base_url('home/login');
        redirect($redirect_link);
    }

    /**
     * forgot_password
     */

    /**
     * forgot_password
     */
    public function forgot_password() {
        if (check_login()) {
            redirect('profile/dashboard');
        }

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

?>