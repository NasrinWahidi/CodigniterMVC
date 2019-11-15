<?php
date_default_timezone_set('Asia/Kabul');
class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }

    public function index() {
        $this->login();
    }

    public function register() {
        $this->form_validation->set_rules('firstname','First Name','trim|required');
        $this->form_validation->set_rules('lastname','Last Name','trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]|md5');


        $data['title'] = 'Register';

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/register');
            $this->load->view('templates/footer');

        } else {
            if ($this->user_model->set_user()) {
                $this->session->set_flashdata('msg_success', 'Registration Successful!');
                redirect('users/login');
            } else {
                $this->session->set_flashdata('msg_error', 'Error! Please try again later.');
                redirect('users/register');
            }
        }
    }

    public function profile() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $data['prof_info'] = $this->user_model->get_user($data['user_id']);

        $lang = $this->session->userdata('lang');

        if($lang=="persion"){
            $data['lang']['title'] = 'پروفایل';
            $data['lang']['image'] = 'عکس';
            $data['lang']['name'] = 'اسم';
            $data['lang']['lastname'] = 'تخلص';
            $data['lang']['email'] = 'ایمیل آدرس';
            $data['lang']['password'] = 'رمز عبور';
            $data['lang']['cpassword'] = 'تایید رمز عبور';
            $data['lang']['btn_reset'] = 'ریسیت';
            $data['lang']['btn_submit'] = 'تایید و ذخیره';
            
        }else{
            $data['lang']['title'] = 'Profile';
            $data['lang']['image'] = 'Image';
            $data['lang']['name'] = 'Name';
            $data['lang']['lastname'] = 'LastName';
            $data['lang']['email'] = ' Email';
            $data['lang']['password'] = 'Password';
            $data['lang']['cpassword'] = 'Confirm Password';
            $data['lang']['btn_reset'] = 'Reset';
            $data['lang']['btn_submit'] = 'Submit';
           
        }

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->form_validation->set_rules('firstname','First Name','trim|required');
        $this->form_validation->set_rules('lastname','Last Name','trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]|md5');
        if ($this->form_validation->run()===FALSE) {
 
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('users/profile', $data);
            $this->load->view('templates/footer');           
 
        }else{
            if ($this->user_model->set_user($data['user_id'])) {
                $this->session->set_flashdata('msg_success', 'Updated Successful!');
                redirect('users/profile');
            } else {
                $this->session->set_flashdata('msg_error', 'Error! Please try again later.');
                redirect('users/register');
            }
            echo "form validation";
        }


    
    }
    public function setting() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $data['setting_info'] = $this->user_model->get_setting(1);

        $lang = $this->session->userdata('lang');

        if($lang=="persion"){
            $data['lang']['title'] = 'تنظیمات';
            $data['lang']['logo'] = 'لوگوی سیستم';
            $data['lang']['name'] = 'اسم سیستم';

            $data['lang']['btn_reset'] = 'ریسیت';
            $data['lang']['btn_submit'] = 'تایید و ذخیره';
            
        }else{
            $data['lang']['title'] = 'Setting';
            $data['lang']['logo'] = 'System LOGO';
            $data['lang']['name'] = 'System Name';
           
            $data['lang']['btn_reset'] = 'Reset';
            $data['lang']['btn_submit'] = 'Submit';
           
        }

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $this->form_validation->set_rules('name','Site Name','trim|required');

        if ($this->form_validation->run()===FALSE) {
 
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('users/setting', $data);
            $this->load->view('templates/footer');           
 
        }else{
            if ($this->user_model->set_setting()) {
                $this->session->set_flashdata('msg_success', 'Updated Successful!');
                redirect('users/setting');
            } else {
                $this->session->set_flashdata('msg_error', 'Error! Please try again later.');
                redirect('users/setting');
            }
            echo "form validation";
        }


    
    }
    public function activity() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $data['activity'] = $this->user_model->get_activity();

        $lang = $this->session->userdata('lang');

        if($lang=="persion"){
            
            $data['lang']['title'] = 'فعالیت ها کاربران';
            $data['lang']['user_name'] = 'اسم کاربر';
            $data['lang']['login_time'] = 'زمان ورود';
            
        }else{
            $data['lang']['title'] = 'Users Activity';
            $data['lang']['user_name'] = 'User Name';
            $data['lang']['login_time'] = 'Login Time';
        }

        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/admin-sidebar');
        $this->load->view('users/activity', $data);
        $this->load->view('templates/footer');           
    
    }

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $lang = $this->input->post('lang');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');

        $data['title'] = 'Login';

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/login');
            $this->load->view('templates/footer');

        } else {
            if ($user = $this->user_model->get_user_login($email, $password)) {
                $this->session->set_userdata('email', $email);
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('is_logged_in', true);
                $this->session->set_userdata('lang', $lang);
                $this->db->query("INSERT INTO logins(user_id,login_time) VALUES(".$user['id'].",'".time()."')");
                $this->session->set_flashdata('msg_success', 'Login Successful!');
                redirect('note');
            } else {
                $this->session->set_flashdata('msg_error', 'Login credentials does not match!');

                $currentClass = $this->router->fetch_class(); // class = controller
                $currentAction = $this->router->fetch_method(); // action = function

                redirect("$currentClass/$currentAction");
                //redirect('user/login');
            }
        }
    }

    public function logout() {
        if ($this->session->userdata('is_logged_in')) {

            //$this->session->unset_userdata(array('email' => '', 'is_logged_in' => ''));
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('is_logged_in');
            $this->session->unset_userdata('user_id');
        }
        redirect('users/login');
    }
}
