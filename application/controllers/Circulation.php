<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Circulation
 *
 * @author sonjoy
 */
class Circulation extends CI_Controller {

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
        $this->load->model('Circulation_model');
    }

    function index() {
        $crud = new grocery_CRUD();
        $crud->set_table('circulation')
                ->set_subject('Circulation Settings')
                ->display_as('RoleId', 'Member Type')
                ->set_relation('RoleId', 'role', 'Role')
                ->order_by('CirculationId', 'desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Circulation Settings';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }
    
    function issue(){
        $data['issue_info'] = $this->Circulation_model->issue();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Issue & Return';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'circulation/issue_table', $data);
    }
    
    function get_book_info() {
        $bookInfo = $this->input->post('bookInfo');
        echo $data = $this->Circulation_model->select_book_info($bookInfo);
    }
    function get_book_info_after_search() {
        $bookId = $this->input->post('bookId');
         $data = $this->Circulation_model->select_book_id($bookId);
        echo json_encode($data);
//        }
    }
    
    function book_issue(){
        $data['get_issue_book'] = $this->Circulation_model->get_issue_book();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Issue & Return';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'circulation/book_issue', $data);
    }
    
    function new_issue(){
        $btn = $this->input->post('btn');
        if(isset($btn)){
            $this->Circulation_model->new_issue($_POST);
        }
        redirect('circulation/book_issue');
    }
    

}
