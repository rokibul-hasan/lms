<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Event extends CI_Controller {

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
        
    }

    public function index() {
        
        
//        echo '<pre>';
//        print_r($data);
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'event', $data);
//		$this->load->view('welcome_message');
    }
	
	function select_all_issue_return(){
		$this->load->model('Event_model');
		$data = $this->Event_model->get_expiry_date();
		//print_r($data);exit();
		echo json_encode($data);
	}
    
    
    
    
    
}
