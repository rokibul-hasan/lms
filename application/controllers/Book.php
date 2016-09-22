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
                ->display_as('PublisherId','Publisher Name')
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
                ->display_as('BookId','Book Name')
                ->display_as('AuthorId','Author Name')
                ->display_as('AuthorTypeId','Author Type')
                ->set_relation('BookId', 'book', 'Title')
                ->set_relation('AuthorId', 'author', 'AuthorCorporateName')
                ->set_relation('AuthorTypeId', 'authortype', 'AuthorType')
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
                ->display_as('BookId','Book Name')
                ->display_as('SubjectId','Subject')
                ->set_relation('BookId', 'book', 'Title')
                ->set_relation('SubjectId', 'subject', 'Title')
                ->order_by('SubjectId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Category';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
    
    public function  book_copy(){
         $crud = new grocery_CRUD();
        $crud->set_table('bookcopy')
                ->set_subject('Book Copy')
                ->display_as('BookId','Book Name')
                ->display_as('LocationId','Location')
                ->set_relation('BookId', 'book', 'Title')
                ->set_relation('LocationId', 'location', 'LocationName')
                ->order_by('BookCopyId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Copy';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    public function  book_include(){
         $crud = new grocery_CRUD();
        $crud->set_table('bookinclude')
                ->set_subject('Book Include')
                ->display_as('BookId','Book Name')
                ->set_relation('BookId', 'book', 'Title')
                ->display_as('IncludeId','Book Name')
                ->set_relation('IncludeId', 'include', 'Include')
                ->order_by('BookIncludeId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Include';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
}