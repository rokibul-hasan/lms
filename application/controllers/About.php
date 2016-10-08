<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class About extends CI_Controller {

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

    }

    public function index() {
        $crud = new grocery_CRUD();
        $crud->set_table('about')
                ->set_subject('About')
                ->order_by('AboutId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'About';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
//		$this->load->view('welcome_message');
    }
    
    
    
    
    
}
