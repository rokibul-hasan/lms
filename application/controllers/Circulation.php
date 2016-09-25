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

    function issuetable() {
        $data['issue_info'] = $this->Circulation_model->issue();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Issue & Return';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'circulation/issue_table', $data);
    }

    function book_issue() {
        $data['get_users'] = $this->db->get('users')->result();
        $data['get_issue_book'] = $this->Circulation_model->get_issue_book();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Issue';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'circulation/book_issue', $data);
    }

    function book_return() {
        $data['get_issue_book'] = $this->Circulation_model->get_issue_book();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Return';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'circulation/book_return', $data);
    }

    function returned_book($book_id) {
        $this->Circulation_model->returned_book($book_id);
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Saved!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('circulation/issuetable');
    }

    function new_issue() {
        $btn = $this->input->post('btn');
        if (isset($btn)) {
            $this->Circulation_model->new_issue($_POST);
        }
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Saved!</p></div>';
        $this->session->set_userdata($sdata);
        redirect('circulation/issuetable');
    }

    function issue_approval() {
        $approved_by = $_SESSION['user_id'];
        $status = $this->input->post('approval_status');
        $IssueReturnId = $this->input->post('IssueReturnId');
        $sql = $this->db->query("UPDATE `issuereturn` "
                . "SET "
                . "`approval_status`='$status',"
                . "`ApprovedBy`=$approved_by "
                . "WHERE `IssueReturnId`=$IssueReturnId");
        if ($status == 2) {
            $data = '<span class="bg-green">Accepted</span>';
        } elseif ($status == 3) {
            $data = '<span class="bg-red">Canceled</span>';
        } else {
            $data = 'Pending';
        }
        echo json_encode($data);
    }

    function get_book_info() {
        $bookInfo = $this->input->post('bookInfo');
        $option = $this->input->post('option');
        echo $data = $this->Circulation_model->select_book_info($bookInfo,$option);
    }

    function get_book_info_after_search() {
        $Id = $this->input->post('bookId');
        $typeName = $this->input->post('typeName');
//        print_r($typeName);exit();
        $data = $this->Circulation_model->select_book_id($Id,$typeName);
        echo json_encode($data);
//        }
    }

}
