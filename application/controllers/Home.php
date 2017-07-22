<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('global');
        $this->load->library('encrypt');
    }

    public function index() {
        $data = array();

        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');



        $this->load->view('guest_head');
        $this->load->view('home',$data);
        $this->load->view('guest_footer');


    }

    public function login($msg='') {

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
                $username = $this->input->post('email');
                $password = $this->input->post('password');

                if($this->login_model->chechUser($email,$username)){

                    if ($this->login_model->login($email, $password)) {
                        if ($this->login_model->login($email, $password)) {
                            $this->session->set_flashdata('msg', '<div class="alert alert-success" id="success-alert">'.'You have successfully logged in.'.'</div>');
                            //$this->session->set_flashdata('success_login', 'You have successfully login.');
                            $redirect_link = base_url() . 'profile/dashboard';
                            redirect($redirect_link);
                        } else {
                            $data['error'] = 'Warning! You have not activated it yet Or Your account has either been blocked';
                        }
                    }
                    elseif ($this->login_model->login1($username, $password))
                    {
                        if ($this->login_model->login1($username, $password)) {
                            $this->session->set_flashdata('msg', '<div class="alert alert-success" id="success-alert">'.'You have successfully logged in.'.'</div>');
                           // $this->session->set_flashdata('success_login', 'You have successfully login.');
                            $redirect_link = base_url() . 'profile/dashboard';
                            redirect($redirect_link);
                        } else {
                            $data['error'] = 'Warning! You have not activated it yet Or Your account has either been blocked';
                        }
                    }

                }
                else {
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
    
    #confirmation email link points here
    public function confirm($code='')
    {

        $res = confirm_email($code);

        if($res==TRUE)
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Email Confirmed. Now You can login '.'</div>');
            redirect(base_url('home/login'));
        }
        else
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">'.'Email Confirmed failed'.'</div>');
            redirect(base_url('home/login'));
        }
    }
    
    #get web admin name and email for email sending
    public function get_admin_email_and_name()
    {

        $data['admin_email'] = 'info@advertbd.com';
        $data['admin_name']  = 'Heera organization';

        return $data;
    }
    
    #send a confirmation email with confirmation link
    public function send_confirmation_email($data=array())
    {
        $val = $this->get_admin_email_and_name();       
        $admin_email = $val['admin_email'];
        $admin_name  = $val['admin_name'];        

        $link = base_url('home/confirm'.'/'.$data['confirmation_key']);


        //$this->load->model('admin/system_model');
        $tmpl = get_email_tmpl_by_email_name('confirmation_email');
        $subject = $tmpl->subject;
        $subject = str_replace("#username",$data['user_name'],$subject);
        $subject = str_replace("#activationlink",$link,$subject);
        $subject = str_replace("#webadmin",$admin_name,$subject);
        $subject = str_replace("#useremail",$data['email'],$subject);


        $body = $tmpl->body;
        $body = str_replace("#username",$data['user_name'],$body);
        $body = str_replace("#activationlink",$link,$body);
        $body = str_replace("#webadmin",$admin_name,$body);
        $body = str_replace("#useremail",$data['email'],$body);


        $this->load->library('email');
        $this->email->from($admin_email, $subject);
        $this->email->to($data['email']);
        $this->email->subject('Sign Up');
        $this->email->message($body);
        $this->email->send();
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
            //$this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
            //$this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
            if ($this->form_validation->run() == true) {
                
                $save['profession'] = $this->input->post('profession');
                $save['first_name'] = $this->input->post('first_name');
                $save['last_name'] = $this->input->post('last_name');
                $save['user_name'] = $this->input->post('user_name');
                $save['email'] = $this->input->post('email');
                $save['password'] = md5($this->input->post('password'));

                $save['confirmation_key'] 	= uniqid();
                $save['confirmed'] 	= 0;
                $save['status']     = 1;
                

                // if ($this->upload->do_upload('image')) {
                //     $fileInfo = $this->upload->data();
                //     $save['file_name'] = $fileInfo['file_name'];
                // }

                if ($this->global_model->insert('users', $save)) {
                    $this->load->library('email');
                    $this->email->from('sajib@osourcebd.com', 'All Doctors');
                    $this->email->to('sajib@osourcebd.com');
                    $this->email->subject('Activation Link');
                    $this->email->message('This is activation link for active user.');
                    $this->email->send();
                    $this->session->set_flashdata('success', 'Your account has been created and an activation link has been sent to the email address you entered. Note that you must activate the account by selecting the activation link when you get the email before you can login.');
                    $redirect_link = base_url() . 'home/login';

                    $this->send_confirmation_email($save);
                    $this->session->set_flashdata('msg', 'Email send Successfully');
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
    
   
    #reset password email link points here
    function resetpassword($recovery_key='')
    {

        $query = $this->login_model->verify_recovery_by_username($recovery_key);

        if($query->num_rows()>0)

        {
            $row = $query->row();

            $this->session->set_userdata('user_id',$row->id);

            $this->session->set_userdata('email',$row->email);

            $this->session->set_userdata('user_name',$row->user_name);

            $this->session->set_userdata('profession',$row->profession);

            $this->session->set_userdata('recovery',"yes");

            redirect(base_url('home/changepass'));

        }

        else

        {

            $this->session->set_flashdata('msg', '<div class="alert alert-block">'.'password recovery link invalid'.'</div>');

            redirect(base_url('home/forgotpassword'));

        }

    }
    
    function _send_recovery_email($data)

    {
        $val = $this->get_admin_email_and_name();

        $admin_email = $val['admin_email'];

        $admin_name  = $val['admin_name'];

        $link = base_url('home/resetpassword').'/'.$data['recovery_key'];



        $tmpl = get_email_tmpl_by_email_name('recovery_email');

        $subject = $tmpl->subject;

        $subject = str_replace("#username",$data['user_name'],$subject);

        $subject = str_replace("#recoverylink",$link,$subject);

        $subject = str_replace("#webadmin",$admin_name,$subject);


        $body = $tmpl->body;

        $body = str_replace("#username",$data['user_name'],$body);

        $body = str_replace("#recoverylink",$link,$body);

        $body = str_replace("#webadmin",$admin_name,$body);



        $this->load->library('email');

        $this->email->from($admin_email, $subject);

        $this->email->to($data['email']);

        $this->email->subject($subject);

        $this->email->message($body);

        $this->email->send();

    }
    
    #load forgot password view
    function forgotpassword()
    {
        $this->load->view('guest_head');
        $this->load->view('forgotpass_view');
        $this->load->view('guest_footer.php');
    }
    
    public function recoverpassword(){
        $this->form_validation->set_rules('user_email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url('home/forgotpassword'));
        }
        else
        {
            $user_email = $this->input->post('user_email');
            $val = set_recovery_key($user_email);
            $this->_send_recovery_email($val);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Email is send to your inbox.Check your email.'.'</div>');
            redirect(site_url('home/login'));
        }
    }
    
    function changepass()
    {
        $this->load->view('guest_head');
        $this->load->view('changepass_view');
        $this->load->view('guest_footer.php');
    }
    
    #update password function
    function update_password()
    {
        if($this->session->userdata('recovery')!='yes')
        $this->form_validation->set_rules('current_password', 'current_password', 'required|callback_currentpass_check');
        $this->form_validation->set_rules('new_password', 'new_password', 'required|matches[re_password]');
        $this->form_validation->set_rules('re_password', 'confirm_password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->changepass();
        }
        else
        {
            $password = $this->input->post('new_password');
            $this->login_model->update_password($password);
            $this->session->set_userdata('recovery',"no");
            $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Password changed successfully'.'</div>');
            redirect(base_url('home/login'));
        }
    }

}
