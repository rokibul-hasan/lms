<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author sonjoy
 */
class Report extends CI_Controller {

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
        $crud->set_table('report')
                ->set_field_upload('Banner')
                ->set_subject('Report');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Report Section';
        $data['Title'] = 'Report';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }

    public function reportssubject() {
        $crud = new grocery_CRUD();
        $crud->set_table('reportsubject')
                ->set_subject('Report Category')
                ->display_as('ReportId', 'Report Name')
                ->set_relation('ReportId', 'report', 'Title')
                ->display_as('SubjectId', 'Subject')
                ->set_relation('SubjectId', 'subject', 'Title')
        ;
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Report Section';
        $data['Title'] = 'Report Category';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }

    public function report_copy() {
        $crud = new grocery_CRUD();
        $crud->set_table('reportcopy')
                ->set_subject('Report Copy')
                ->display_as('ReportId', 'Report Name')
                ->set_relation('ReportId', 'report', 'Title')
                ->display_as('LocationId', 'Location')
                ->set_relation('LocationId', 'location', 'LocationName')
        ;
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Report Section';
        $data['Title'] = 'Report Copy';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }

}
