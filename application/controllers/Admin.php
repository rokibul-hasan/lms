<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller {

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

        $this->load->model('checkuser');
       
        $this->load->model('role');
        $this->role->check_access();
        $this->load->model('Admin_report_model');

    }

    public function index() {
        $this->load->model('report');
        $data['short_report'] = $this->report->short_report();
//        echo '<pre>';
//        print_r($data);
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'starter', $data);
//		$this->load->view('welcome_message');
    }
    
    public function daily_read_book(){
        $this->load->model('Admin_report_model');
        $data['get_daily_read_book'] = $this->Admin_report_model->daily_read_book();
//        echo '<pre>';print_r($data);exit();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Daily Read Books';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'daily_read_book', $data);
    }
    
    
    public function top_book(){
        $data['get_top_read'] = $this->Admin_report_model->top_read();
        $data['get_top_issue'] = $this->Admin_report_model->top_issue();
        $data['get_top_download'] = $this->Admin_report_model->top_download();
//        echo '<pre>';print_r($data);exit();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Top Books';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'top_book', $data);
    }
    
    
    
    
}
