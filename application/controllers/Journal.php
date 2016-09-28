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
class Journal extends CI_Controller {

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
        $crud->set_table('journal')
                ->set_subject('Journal')
                ->set_field_upload('Banner')
				->set_field_upload('Ebook','asset/ebook/','pdf')
                ->display_as('PublisherId', 'Publisher Name')
                ->set_relation('PublisherId', 'publisher', 'PublisherName')
                ->order_by('JournalId', 'desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Journal Section';
        $data['Title'] = 'Journal';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }

    public function journal_copy() {
        $crud = new grocery_CRUD();
        $crud->set_table('journalcopy')
                ->set_subject('Journal Copy')
                ->display_as('JournalId', 'Journal Name')
                ->set_relation('JournalId', 'journal', 'Title')
                ->display_as('LocationId', 'Location')
                ->set_relation('LocationId', 'location', 'LocationName')
                ->order_by('JournalCopyId', 'desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Journal Section';
        $data['Title'] = 'Journal Copy';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }

    public function journal_category() {
        $crud = new grocery_CRUD();
        $crud->set_table('journalsubject')
                ->set_subject('Journal Category')
                ->display_as('JournalId', 'Journal Name')
                ->set_relation('JournalId', 'journal', 'Title')
                ->display_as('SubjectId', 'Subject')
                ->set_relation('SubjectId', 'subject', 'Title')
                ->order_by('JournalSubjectId', 'desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Journal Section';
        $data['Title'] = 'Journal Category';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }

    public function journal_include() {
        $crud = new grocery_CRUD();
        $crud->set_table('journalinclude')
                ->set_subject('Journal Include')
                ->display_as('JournalId', 'Journal Name')
                ->set_relation('JournalId', 'journal', 'Title')
                ->display_as('IncludeId', 'Include')
                ->set_relation('IncludeId', 'include', 'Include')
                ->order_by('JournalIncludeId', 'desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Journal Section';
        $data['Title'] = 'Journal Include';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }

}
