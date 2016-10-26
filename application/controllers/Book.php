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
        $this->load->model('checkuser');
    }
    
    public function index(){
        $this->load->config('grocery_crud');
        $this->config->set_item('Ebook',
'pdf');
         $crud = new grocery_CRUD();
        $crud->set_table('book')
                ->set_subject('Book')
                ->set_field_upload('Banner')				
                ->set_field_upload('Ebook','asset/ebook/','pdf')
                ->display_as('publisherId','Publisher Name')
                ->display_as('BookTypeId','Book Type')
                ->set_relation('BookTypeId','booktype','BookType')
                ->set_relation('PublisherId', 'publisher', 'PublisherName')
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
                ->display_as('AuthorId','Author')
                ->display_as('AuthorTypeId','Author Type')
                ->set_relation('BookId', 'book', 'Title')
                ->set_relation('AuthorId', 'author', '{AuthorFirstName} {AuthorMiddleName} {AuthorLastName}')
                ->set_relation('AuthorTypeId', 'authortype', 'AuthorType')
                ->order_by('BookAuthorId','desc');
        
//        $crud->callback_add_field('type',array($this,'_callback_author'));
//        $crud->callback_column('AuthorId',array($this,'_callback_author'));
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Author';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
//    public function _callback_author($value,$row){
//        $this->db->select('AuthorFirstName, AuthorMiddleName, AuthorLastName')
//                ->from('author')
//                ->where('AuthorId',$row->AuthorId);
//        $query = $this->db->get()->result();
//        foreach ($query as $result){
//            return "$result->AuthorFirstName $result->AuthorMiddleName $result->AuthorLastName";
//        }
//        
//    }
    
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
    
    
        public function book_type(){
         $crud = new grocery_CRUD();
        $crud->set_table('booktype')
                ->set_subject('Book Type')
                ->order_by('BookTypeId','desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Book Type';
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
                ->display_as('IncludeId','Include')
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
