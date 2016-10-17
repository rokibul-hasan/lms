<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Userdashboard extends CI_Controller {

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
        $this->load->model('role');
        $this->role->check_access();
    }

    public function index() {
        $this->load->helper('html');

        $this->load->model('Book_model');
        $this->load->model('Search_model');

        $type_book = $this->input->post('type_book');

        if ($type_book) {
            if ($type_book == 'book') {
                $data['type_book'] = true;
            }
            if ($type_book == 'journal') {
                $data['type_journal'] = true;
            }
            if ($type_book == 'report') {
                $data['type_report'] = true;
            }
            if ($type_book == 'thesis') {
                $data['type_thesis'] = true;
            }
        }




        $btn_report = $this->input->post('btn_report');
        $btn_thesis = $this->input->post('btn_thesis');


        $data['all_publisher'] = $this->Book_model->get_all('publisher');
        $data['all_author'] = $this->Book_model->get_all('author');


        $btn_journal = $this->input->post('btn_journal');
        if (isset($btn_journal)) {

            $bookTitle = $this->input->post('book_name');
            $Publisher = $this->input->post('publisher');
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $year[0] = $from;
            $year[1] = $to;
            $subject = $this->input->post('subject');
            $data['journal_list'] = $this->Search_model->search_journal($bookTitle, $Publisher, $year, $subject, 0, 100);
//            echo '<pre>';
//            print_r($data['journal_list']);
//            exit();
        }



        $btn_book = $this->input->post('btn_book');
        if (isset($btn_book)) {

            $bookTitle = $this->input->post('book_name');
            $Publisher = $this->input->post('publisher');
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $year[0] = $from;
            $year[1] = $to;
            $keyword = $this->input->post('keywords');
            $Author = $this->input->post('author');
            $subject = $this->input->post('subject');
            $data['book_list'] = $this->Search_model->search_book($bookTitle, $Publisher, $year, $keyword, $Author, $subject, 0, 100);
//            echo '<pre>';
//            print_r($data['book_list']);
        }

        $btn_book_search = $this->input->post('btn_book_search');
        if (isset($btn_book_search)) {
            $id = $this->input->post('bookid'); 
            $data['book_id'] = $this->Book_model->get_book_details($id);
        }

        $btn_book_search = $this->input->post('btn_journal_search');
        if (isset($btn_book_search)) {
            $id = $this->input->post('JournalId');
            $data['journal_id'] = $this->Book_model->get_journal_details($id);
        }

//        thesis//////////////////////////
        $btn_thesis = $this->input->post('btn_thesis');
        if (isset($btn_thesis)) {

            $thesisTitle = $this->input->post('thesis_title');
//            die($bookTitle);
            $Department = $this->input->post('department');
            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $year[0] = $from;
            $year[1] = $to;
//            $keyword = $this->input->post('keywords');
            $Author = $this->input->post('author');
            $subject = $this->input->post('subject');
            $data['thesis_list'] = $this->Search_model->search_thesis($thesisTitle, $year, $Department, $Author, $subject, 0, 100);
//            echo "<pre>";
//            print_r($data['journal_list']);
//            exit();
        }

//        Report//////////////////////////////////
        $btn_report = $this->input->post('btn_report');
        if (isset($btn_report)) {

            $reportTitle = $this->input->post('report_name');
//            die($bookTitle);
            $Organization = $this->input->post('organization');

            $from = $this->input->post('from');
            $to = $this->input->post('to');
            $year[0] = $from;
            $year[1] = $to;
            $keyword = $this->input->post('keywords');

//            $Author = $this->input->post('author');
            $subject = $this->input->post('subject');
            $data['report_list'] = $this->Search_model->search_report($reportTitle, $Organization, $year, $keyword, $subject, 0, 100);
            //            echo "<pre>";
//            print_r($data['journal_list']);
//            exit();
        }

        $btn_report_search = $this->input->post('btn_report_search');
        if (isset($btn_report_search)) {
            $id = $this->input->post('ReportId');
            $data['reportd_id'] = $this->Book_model->get_report_details($id);
        }

        $btn_thesis_search = $this->input->post('btn_thesis_search');
        if (isset($btn_thesis_search)) {
            $id = $this->input->post('thesisid');
            $data['thesis_id'] = $this->Book_model->get_thesis_details($id);
//            echo '<pre>';
//            print_r($data['thesis_id']);
        }


        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Search Your Resource';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'member/userdashboard', $data);
    }

    public function book_form() {
        $this->load->model('Search_model');
        $data['all_publisher'] = $this->Book_model->get_all('publisher');
        $data['all_author'] = $this->Book_model->get_all('author');
        $this->load->view('_load_book_form', $data);
    }

    public function journal() {
        $this->load->helper('html');

        $this->load->model('Book_model');
        $data['all_book'] = $this->Book_model->get_all_journal();
        $btn_submit = $this->input->post('btn_submit');
        if (isset($btn_submit)) {
            $id = $this->input->post('bookid');
            $data['book_id'] = $this->Book_model->get_journal_details($id);
        }

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'member/userdashboard', $data);
    }

    public function reports() {
        $this->load->helper('html');

        $this->load->model('Book_model');
        $data['all_book'] = $this->Book_model->get_all_book();
        $btn_submit = $this->input->post('btn_submit');
        if (isset($btn_submit)) {
            $id = $this->input->post('bookid');
            $data['book_id'] = $this->Book_model->get_book_details($id);
        }

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'member/userdashboard', $data);
    }

    public function thesis() {
        $this->load->helper('html');

        $this->load->model('Book_model');
        $data['all_book'] = $this->Book_model->get_all_book();
        $btn_submit = $this->input->post('btn_submit');
        if (isset($btn_submit)) {
            $id = $this->input->post('bookid');
            $data['book_id'] = $this->Book_model->get_book_details($id);
        }

        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'member/userdashboard', $data);
    }

//    advance search
    function get_book_info() {
        $this->load->model('Book_model');
        $bookInfo = $this->input->post('bookInfo');
        $option = $this->input->post('option');
//        print_r($option);exit();
        echo $data = $this->Book_model->select_book_info($bookInfo, $option);
    }

}
