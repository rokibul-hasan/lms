<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Journal
 *
 * @author sonjoy
 */
class Journal extends CI_Controller{
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
    
     public function index(){
         $crud = new grocery_CRUD();
        $crud->set_table('journalcopy')
                ->set_subject('Journal Copy')
                ->order_by('JournalCopyId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Journal Copy Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
        public function journal_copy(){
         $crud = new grocery_CRUD();
        $crud->set_table('journal')
                ->set_subject('Journal')
                ->order_by('JournalId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Journal Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
}
