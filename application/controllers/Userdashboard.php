<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Userdashboard extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('tank_auth');
        if (!$this->tank_auth->is_logged_in()) {         //not logged in
            redirect('login');
            return 0;
        }
        $this->load->library('grocery_CRUD');
        $this->load->model('role');
        $this->role->check_access();
        
    }


    
    
    public function index(){
        $this->load->helper('html');  
        
        $this->load->model('Book_model');
        
        $btn_book = $this->input->post('btn_book');
        $btn_journal = $this->input->post('btn_journal');
        $btn_report = $this->input->post('btn_report');
        $btn_thesis = $this->input->post('btn_thesis');
        
        $data['all_book'] = $this->Book_model->get_all('book');
        $data['all_journal'] = $this->Book_model->get_all('journal');       
         
        $data['all_report'] = $this->Book_model->get_all('report');
        $data['all_thesis'] = $this->Book_model->get_all('thesis');

        
        if(isset($btn_book)){
            $id = $this->input->post('bookid');
            $data['book_id'] = $this->Book_model->get_book_details($id); 
//            echo '<pre>';
//            print_r($data['book_id']);
          
        }
        
        if(isset($btn_journal)){
            $id = $this->input->post('bookid');
            $data['journal_id'] = $this->Book_model->get_journal_details($id); 

        }
        
        if(isset($btn_report)){
            $id = $this->input->post('reportid');
            $data['reportd_id'] = $this->Book_model->get_report_details($id); 

        }
        
        if(isset($btn_thesis)){
            $id = $this->input->post('thesisid');
            $data['thesis_id'] = $this->Book_model->get_thesis_details($id); 
//            echo '<pre>';
//            print_r($data['thesis_id']);
        }
        
        
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'member/userdashboard', $data);
    }
    
        public function journal(){
        $this->load->helper('html');  
        
        $this->load->model('Book_model');
        $data['all_book'] = $this->Book_model->get_all_journal();
        $btn_submit = $this->input->post('btn_submit');
        if(isset($btn_submit)){
            $id = $this->input->post('bookid');
            $data['book_id'] = $this->Book_model->get_journal_details($id); 
        }
        
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'member/userdashboard', $data);
    }
    
        public function reports(){
        $this->load->helper('html');  
        
        $this->load->model('Book_model');
        $data['all_book'] = $this->Book_model->get_all_book();
        $btn_submit = $this->input->post('btn_submit');
        if(isset($btn_submit)){
            $id = $this->input->post('bookid');
            $data['book_id'] = $this->Book_model->get_book_details($id); 
        }
        
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'member/userdashboard', $data);
    }
    
        public function thesis(){
        $this->load->helper('html');  
        
        $this->load->model('Book_model');
        $data['all_book'] = $this->Book_model->get_all_book();
        $btn_submit = $this->input->post('btn_submit');
        if(isset($btn_submit)){
            $id = $this->input->post('bookid');
            $data['book_id'] = $this->Book_model->get_book_details($id); 
        }
        
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'member/userdashboard', $data);
    }
    
}
