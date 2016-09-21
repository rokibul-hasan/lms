<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Book
 *
 * @author sonjoy
 */
class Book extends ci_controller{
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
        $crud->set_table('book')
                ->set_subject('Book')
                ->set_relation('PublisherId', 'Publisher', 'PublisherName')
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
}
