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
        $this->load->model('Counter_model');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }

    function index() {
        $crud = new grocery_CRUD();
        $crud->set_table('circulation')
                ->set_subject('Circulation Settings')
                ->display_as('UserType', 'Member Type')
//                ->set_relation('UserTypeId', 'user_type', 'Type')
                ->field_type('UserType', 'dropdown', array('1' => 'Super Admin', '3' => 'Employee', '4' => 'User'))
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
        $data['users_info'] = $this->db->where('activated', '1')->get('users')->result();
        $user_id = $this->input->get('member_id');
        $issue_return = $this->input->get('issue_return');

        $date_from = $this->input->get('date_from');
        $date_to = $this->input->get('date_to');
        $btn_submit = $this->input->get('btn_submit');
        if (isset($btn_submit)) {
            $data['search_issue_info'] = $this->Circulation_model->search_issue_info($user_id, $issue_return, $date_from, $date_to);
        } else {
            $data['issue_info'] = $this->Circulation_model->issue();
//echo'<pre>';print_r($data);exit();
        }
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Issue & Return';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'circulation/issue_table', $data);
    }

    function issue_confirmation() {
        $user_type = $this->session->userdata('user_type');
        $data['issue_info'] = $this->Circulation_model->issue_confirmation();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Borrow Request';
        $data['base_url'] = base_url();
        if ($user_type == '4') {
            $user_id = $this->session->userdata('user_id');
            $data['user_request'] = $this->Circulation_model->user_request($user_id);
            $this->load->view($this->config->item('ADMIN_THEME') . 'member/user_pending', $data);
        } else {
            $this->load->view($this->config->item('ADMIN_THEME') . 'circulation/issue_pending', $data);
        }
    }

    function userissuetable() {
        $data['users_info'] = $this->db->where('activated', '1')->get('users')->result();
        $user_id = $_SESSION['user_id'];
        $data['issue_info'] = $this->Circulation_model->search_issue_info_by_user_id($user_id);
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Issue & Return';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'member/issue_table', $data);
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
        $btn_submit = $this->input->get('btn_submit');
        $user_id = $this->input->get('member_id');
        $data['date_range'] = $this->input->get('date_range');
        $date = explode('-', $data['date_range']);
        $from = '';
        $to = '';
        if ($data['date_range'] != '') {
            $from = $date[0];
            $to = $date[1];
        }

        if (isset($btn_submit)) {
            $data['get_issue_book'] = $this->Circulation_model->get_issue_book_by_item($user_id, $from, $to);
        } else {
            $data['get_issue_book'] = $this->Circulation_model->get_issue_book();
        }
        $data['users_info'] = $this->db->where('activated', '1')->get('users')->result();

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
        $user_type = $this->session->userdata('user_type');
        if (isset($btn)) {
//            print_r($_POST);
            $this->Circulation_model->save_new_issue($_POST);
            $id = $this->input->post('Id');
            $type = $this->input->post('type');
            $UserId = $this->input->post('UserId');
            $this->Counter_model->count_issue_book($id, $type);
//            if ($user_type == '1') {
//                $email = $this->db->get_where('users', array('id' => $UserId))->row();
//                $data['site_name'] = $this->config->item('website_name', 'tank_auth');
//                $data['new_email'] = $email->email;
//                $this->_send_email('succes_email', $data['new_email'], $data);
//            }
        }
        $sdata['message'] = '<div class = "alert alert-success" id="message"><button type = "button" class = "close" data-dismiss = "alert"><i class = " fa fa-times"></i></button><p><strong><i class = "ace-icon fa fa-check"></i></strong> Data is Successfully Saved!</p></div>';
        $this->session->set_userdata($sdata);

        if ($user_type == '1') {
            $this->load->model('checkuser');
            redirect('circulation/issuetable');
        } else if ($user_type == '4') {
            redirect('circulation/userissuetable');
        }
    }

    function issue_approval() {
        $approved_by = $_SESSION['user_id'];
        $status = $this->input->post('approval_status');
        $email['site_name'] = $this->config->item('website_name', 'tank_auth');
        $email['new_email'] = $this->input->post('email');
        $email['item'] = $this->input->post('title');
        //die($email['site_name']);
        if ($status == 2) {
            $this->_send_email('succes_email', $email['new_email'], $email);
        } else if ($status == 3) {
            $this->_send_email('cancel_email', $email['new_email'], $email);
        }
        $IssueReturnId = $this->input->post('IssueReturnId');
        $this->db->set('approval_status', $status);
        $this->db->set('ApprovedBy', $approved_by);
        $this->db->set('IssueDate', Date('Y-m-d H:i:s'));
        $this->db->where('IssueReturnId', $IssueReturnId);
        $this->db->update('issuereturn');
        if ($status == 2) {
            $data = '<span class="bg-green">Accepted</span>';
        } elseif ($status == 3) {
            $data = '<span class="bg-red">Canceled</span>';
        } else {
            $data = 'Pending';
        }
//        die($data);
        echo json_encode($data);
    }

    function fine_payment() {
        $payment = $this->input->post('payment');
//        print_r($payment);exit();
        $IssueReturnId = $this->input->post('IssueReturnId');
        $sql = $this->db->query("UPDATE `issuereturn` "
                . "SET "
                . "`Fine`='$payment'"
                . "WHERE `IssueReturnId`=$IssueReturnId");
        $data = '<span class="bg-green">Paid</span>';
        echo json_encode($data);
    }

    function get_book_info() {
        $bookInfo = $this->input->post('bookInfo');
        $option = $this->input->post('option');
        echo $data = $this->Circulation_model->select_book_info($bookInfo, $option);
    }

    function get_book_info_after_search() {
        $Id = $this->input->post('bookId');
        $typeName = $this->input->post('typeName');
//        print_r($typeName);exit();
        $data['max_issue'] = $this->Circulation_model->get_max_issue($Id, $typeName);
        $data['get_resource_info'] = $this->Circulation_model->get_resource_info($Id, $typeName);
//        print_r($data['max_issue']);exit();
        echo json_encode($data);
//        }
    }

    function fine_calculation() {
        $this->load->model('users');
        $data['date_from'] = $this->input->get('date_from');
        $data['date_to'] = $this->input->get('date_to');
        $data['users_info'] = $this->db->where('activated', '1')->get('users')->result();
        $user_id = $this->input->get('member_id');
        $payment = $this->input->get('payment');
        if (isset($user_id)) {
            $data['fine_calculation_after_search'] = $this->Circulation_model->search_fine_calculation_by_user_id($user_id, $payment, $data['date_from'], $data['date_to']);
        } else {
            $data['fine_calculation'] = $this->Circulation_model->fine_calculation();
        }
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Fine Calculation';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'circulation/fine_calculation', $data);
    }

//    user section
    function requested_issue() {
        $data['issue_info'] = $this->Circulation_model->get_all_request_issue();
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Section'] = 'Circulation Section';
        $data['Title'] = 'Issue';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'circulation/requested_new_issue', $data);
    }

    /**
     * Send email message of given type (activate, forgot_password, etc.)
     *
     * @param	string
     * @param	string
     * @param	array
     * @return	void
     */
    function _send_email($type, $email, &$data) {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject(sprintf($this->lang->line('auth_subject_' . $type), $this->config->item('website_name', 'tank_auth')));
        $this->email->message($this->load->view('email/' . $type . '-html', $data, TRUE));
        $this->email->set_alt_message($this->load->view('email/' . $type . '-txt', $data, TRUE));
        $this->email->send();
    }

}
