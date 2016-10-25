<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Thesis
 *
 * @author sonjoy
 */
class Thesis extends CI_Controller{
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
         $crud = new grocery_CRUD();
        $crud->set_table('thesis')
                ->set_field_upload('Banner')
				->set_field_upload('Ebook','asset/ebook/','pdf')
                ->set_subject('Thesis');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Thesis Section';
        $data['Title'] = 'Thesis';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
        public function thesis_copy(){
         $crud = new grocery_CRUD();
        $crud->set_table('thesiscopy')
                ->set_subject('Thesis Copy')
                ->display_as('ThesisID', 'Thesis Name')
                ->set_relation('ThesisID', 'thesis', 'Title')
                ;
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Thesis Section';
        $data['Title'] = 'Thesis Copy';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
        public function thesis_category(){
         $crud = new grocery_CRUD();
        $crud->set_table('thesissubject')
                ->set_subject('Thesis Category')
                ->display_as('Thesisid', 'Thesis Name')
                ->set_relation('Thesisid', 'thesis', 'Title')
                ->display_as('subjectID', 'Subject')
                ->set_relation('subjectID', 'subject', 'Title')
                ;
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Thesis Section';
        $data['Title'] = 'Thesis Category';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
        public function thesis_author(){
         $crud = new grocery_CRUD();
        $crud->set_table('thesisauthor')
                ->set_subject('Thesis Author')
                ->display_as('Thesisid', 'Thesis Name')
                ->set_relation('Thesisid', 'thesis', 'Title')
                ->display_as('AuthorID','Author Name')
                ->display_as('AuthorTypeId','Author Type')
                ->set_relation('AuthorID', 'author', '{AuthorFirstName} {AuthorMiddleName} {AuthorLastName}')
                ->set_relation('AuthorTypeId', 'authortype', 'AuthorType')
                ;
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Thesis Section';
        $data['Title'] = 'Thesis Author';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
        public function thesis_supervisor(){
         $crud = new grocery_CRUD();
        $crud->set_table('thesissupervisor')
                ->set_subject('Thesis Supervisor')
                ->display_as('Thesisid', 'Thesis Name')
                ->set_relation('Thesisid', 'thesis', 'Title')
//                ->display_as('AuthorID','Author Name')
//                ->display_as('AuthorTypeId','Author Type')
//                ->set_relation('AuthorID', 'author', 'AuthorCorporateName')
//                ->set_relation('AuthorTypeId', 'authortype', 'AuthorType')
                ;
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Thesis Section';
        $data['Title'] = 'Thesis Supervisor';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
}
