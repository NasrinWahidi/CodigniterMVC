<?php

class Note extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('note_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    public function index() {
       
        $this->load_notes();

    }
    public function load_notes() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        $this->load->library('pagination');
        
        
        $data['note'] = $this->note_model->get_note();
        $lang = $this->session->userdata('lang');
        if($lang=="persion"){
            $data['lang']['title'] = 'آرشیف نوت ها';
            $data['lang']['add_note'] = 'اضافه کردن نوت';
            $data['lang']['tbl_col_num'] = 'شماره';
            $data['lang']['tbl_col_title'] = 'عنوان';
            $data['lang']['tbl_col_content'] = 'متن';
            $data['lang']['tbl_col_category'] = 'کتگوری';
            $data['lang']['tbl_col_action'] = 'عملیات';
            $data['lang']['edit'] = 'تغییر';
            $data['lang']['delete'] = 'حذف';
        }else{
            $data['lang']['title'] = 'Notes Archive';
            $data['lang']['add_note'] = 'Add note';
            $data['lang']['tbl_col_num'] = 'Number';
            $data['lang']['tbl_col_title'] = 'Title';
            $data['lang']['tbl_col_content'] = 'Content';
            $data['lang']['tbl_col_category'] = 'category';
            $data['lang']['tbl_col_action'] = 'Action';
            $data['lang']['edit'] = 'edit';
            $data['lang']['delete'] = 'delete';
        }


        $config = array();
        $config["base_url"] = base_url() . "note/load_notes";
        $config['first_url']= base_url() . "note/load_notes/1";
        $config["total_rows"] = $this->note_model->record_count();
        $config["per_page"] = 4;
        $config["uri_segment"] = 3;

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
    
    
    
        $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = '<i class="fa fa-long-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->note_model->fetch_note($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/admin-sidebar');
        $this->load->view('note/index', $data);
        $this->load->view('templates/footer');
    }
    public function load_category() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        $this->load->library('pagination');
        
        $lang = $this->session->userdata('lang');
        if($lang=="persion"){
            $data['lang']['title'] = 'کتگوری ها';
            $data['lang']['add_category'] = 'اضافه کردن کتگوری';
            $data['lang']['tbl_col_num'] = 'شماره';
            $data['lang']['tbl_col_title'] = 'عنوان';
            $data['lang']['tbl_col_content'] = 'تشریحات';
            $data['lang']['tbl_col_action'] = 'عملیات';
            $data['lang']['edit'] = 'تغییر';
            $data['lang']['delete'] = 'حذف';
        }else{
            $data['lang']['title'] = 'Categories';
            $data['lang']['add_category'] = 'Add category';
            $data['lang']['tbl_col_num'] = 'Number';
            $data['lang']['tbl_col_title'] = 'Title';
            $data['lang']['tbl_col_content'] = 'Discription';
            $data['lang']['tbl_col_action'] = 'Action';
            $data['lang']['edit'] = 'edit';
            $data['lang']['delete'] = 'delete';
        }


        $config = array();
        $config["base_url"] = base_url() . "note/load_category";
        $config['first_url']= base_url() . "note/load_category/1";
        $config["total_rows"] = $this->note_model->record_count_category();
        $config["per_page"] = 4;
        $config["uri_segment"] = 3;

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
    
    
    
        $config['prev_link'] = '<i class="fa fa-long-arrow-left"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
    
    
        $config['next_link'] = '<i class="fa fa-long-arrow-right"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->note_model->fetch_category($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view('templates/admin-header', $data);
        $this->load->view('templates/admin-sidebar');
        $this->load->view('note_category/index', $data);
        $this->load->view('templates/footer');
    }


    public function create() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        
        $data['category'] = $this->note_model->get_category();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $lang = $this->session->userdata('lang');

        if($lang=="persion"){
            $data['lang']['title'] = 'اضافه کردن نوت';
            $data['lang']['note_list'] = 'لیست نوت ها';
            $data['lang']['enter_text'] = 'متن را وارد کنید';
            $data['lang']['enter_title'] = 'عنوان را وارد کنید';
            $data['lang']['btn_reset'] = 'ریسیت';
            $data['lang']['btn_submit'] = 'تایید و ذخیره';
            
        }else{
            $data['lang']['title'] = 'Create note';
            $data['lang']['note_list'] = 'Note list';
            $data['lang']['enter_text'] = 'Enter text';
            $data['lang']['enter_title'] = 'Enter title';
            $data['lang']['btn_reset'] = 'reset';
            $data['lang']['btn_submit'] = 'submit';
           
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
        $this->form_validation->set_rules('category_id', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('note/create');
            $this->load->view('templates/footer');
        } else {
            $this->note_model->set_note();
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('note/success');
            $this->load->view('templates/footer');
            redirect(site_url('note'));
        }
    }
    public function create_category() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        
        $data['category'] = $this->note_model->get_category();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $lang = $this->session->userdata('lang');

        if($lang=="persion"){
            $data['lang']['title'] = 'اضافه کردن کتگوری';
            $data['lang']['category_list'] = 'لیست کتگوری ها';
            $data['lang']['enter_text'] = 'تشریحات را وارد کنید';
            $data['lang']['enter_title'] = 'عنوان را وارد کنید';
            $data['lang']['btn_reset'] = 'ریسیت';
            $data['lang']['btn_submit'] = 'تایید و ذخیره';
            
        }else{
            $data['lang']['title'] = 'Create category';
            $data['lang']['category_list'] = 'Category list';
            $data['lang']['enter_text'] = 'Enter Discription';
            $data['lang']['enter_title'] = 'Enter title';
            $data['lang']['btn_reset'] = 'reset';
            $data['lang']['btn_submit'] = 'submit';
           
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('note_category/create');
            $this->load->view('templates/footer');
        } else {
            $this->note_model->set_category();
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('note_category/success');
            $this->load->view('templates/footer');
            redirect(site_url('note/load_category'));
        }
    }

    public function edit() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        } else {
            $data['user_id'] = $this->session->userdata('user_id');
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['note_item'] = $this->note_model->get_note_by_id($id);

        $lang = $this->session->userdata('lang');

        if($lang=="persion"){
            $data['lang']['title'] = 'ایدیت نوت';
            $data['lang']['note_list'] = 'لیست نوت ها';
            $data['lang']['enter_text'] = 'متن را وارد کنید';
            $data['lang']['enter_title'] = 'عنوان را وارد کنید';
            $data['lang']['btn_reset'] = 'ریسیت';
            $data['lang']['btn_submit'] = 'تایید و ذخیره';
            
        }else{
            $data['lang']['title'] = 'Edit note';
            $data['lang']['note_list'] = 'Note list';
            $data['lang']['enter_text'] = 'Enter text';
            $data['lang']['enter_title'] = 'Enter title';
            $data['lang']['btn_reset'] = 'reset';
            $data['lang']['btn_submit'] = 'submit';
           
        }

        if ($data['note_item']['user_id'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class(); // class = controller
            redirect(site_url($currentClass));
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/admin-header', $data);
            $this->load->view('templates/admin-sidebar');
            $this->load->view('note/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->note_model->set_note($id);
            //$this->load->view('note/success');
            redirect(site_url('note'));
        }
    }

    public function delete() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $note_item = $this->note_model->get_note_by_id($id);

        if ($note_item['user_id'] != $this->session->userdata('user_id')) {
            $currentClass = $this->router->fetch_class(); // class = controller
            redirect(site_url($currentClass));
        }

        $this->note_model->delete_note($id);
        redirect(base_url() . '/note');
    }
    public function delete_category() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect(site_url('users/login'));
        }

        $id = $this->uri->segment(3);

        if (empty($id)) {
            show_404();
        }

        $this->note_model->delete_category($id);
        redirect(base_url() . 'note/load_category');
    }
}
