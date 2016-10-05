<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_report
 *
 * @author sonjoy
 */
class Admin_report extends CI_Controller{
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
        $this->load->model('Admin_report_model');
    }
    
    function index(){
        $data['get_fine_report'] = $this->Admin_report_model->get_fine_report();
        $data['users_info'] = $this->db->where('activated', '1')->get('users')->result();
//        echo '<pre>'; print_r($data);exit();           
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Fine Report';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'report/fine_report', $data);
    }
    
    function user_details(){
        $id = $this->input->post('user_id');
        $data = $this->db->where('UserId',$id)->get('issuereturn')->result();
        echo json_encode($data);
    }
}
