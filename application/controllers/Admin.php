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
        
    }

    public function index() {
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'starter', $data);
//		$this->load->view('welcome_message');
    }
    
    
    public function book(){
         $crud = new grocery_CRUD();
        $crud->set_table('book')
                ->set_subject('Book')
                ->order_by('BookId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
     public function bookauthor(){
         $crud = new grocery_CRUD();
        $crud->set_table('bookauthor')
                ->set_subject('Book Author')
                ->order_by('BookAuthorId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Author';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
        public function book_category(){
         $crud = new grocery_CRUD();
        $crud->set_table('booksubject')
                ->set_subject('Book Category')
                ->order_by('SubjectId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Category';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
    
    public function  bookcopy(){
         $crud = new grocery_CRUD();
        $crud->set_table('bookcopy')
                ->set_subject('Book Copy')
                ->order_by('BookCopyId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }

    
        public function author(){
         $crud = new grocery_CRUD();
        $crud->set_table('book')
                ->set_subject('Book')
                ->order_by('BookId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
        public function author_type(){
         $crud = new grocery_CRUD();
        $crud->set_table('book')
                ->set_subject('Book')
                ->order_by('BookId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
        public function journal(){
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
    
        public function thesis(){
         $crud = new grocery_CRUD();
        $crud->set_table('thesis')
                ->set_subject('Thesis');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
        public function thesis_copy(){
         $crud = new grocery_CRUD();
        $crud->set_table('thesiscopy')
                ->set_subject('Thesis Copy');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Thesis Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
     public function report(){
         $crud = new grocery_CRUD();
        $crud->set_table('report')
                ->set_subject('Report');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Report Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
     public function reportssubject(){
         $crud = new grocery_CRUD();
        $crud->set_table('reportssubject')
                ->set_subject('Report Subject');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Thesis Section';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
}
