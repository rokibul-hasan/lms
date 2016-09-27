<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author sonjoy
 */
class User extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->library('tank_auth');
        if (!$this->tank_auth->is_logged_in()) {         //not logged in
            redirect('login');
            return 0;
        }
//        if (!$this->session->userdata('user_type') or $this->session->userdata('user_type') != 1) {
//            redirect('admin');
//        }
        $this->load->library('grocery_CRUD');
        $this->load->model('User_model');
    }

    function index() {
        $crud = new grocery_CRUD();
        $crud->set_table('users')
                ->set_subject('Member')
                ->unset_columns('password', 'new_password_key', 'new_password_requested', 'new_email', 'new_email_key')
                ->order_by('id', 'desc')
                ->callback_column('banned', function($this) {
                    if ($this == 1) {
                        return 'Banned';
                    } else {
                        return 'Not Banned';
                    }
                });
        $output = $crud->render();
        $data['glosary'] = $output;
        $user_id = $this->uri->segment('4');
        $data['all_users'] = $this->User_model->get_all_users_info_by_user_id($user_id);
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Member';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'user_management', $data);
    }

    function user_type() {
        $crud = new grocery_CRUD();
        $crud->set_table('user_type')
                ->set_subject('Member Type')
                ->display_as('UserId', 'Member Name')
                ->set_relation('UserId', 'users', 'username')
                ->field_type('Type', 'dropdown', array('1' => 'Super Admin', '2' => 'IT Manager', '3' => 'Employee', '4' => 'User'))
                ->order_by('UserTypeId', 'desc');
        $output = $crud->render();
        $data['glosary'] = $output;
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Member Type';
        $data['base_url'] = base_url();
        $this->load->view($this->config->item('ADMIN_THEME') . 'item', $data);
    }

    function save_info() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        $user['username'] = $this->input->post('username');
        if (!empty($this->input->post('email'))) {
            $user['email'] = $this->input->post('email');
        }
        $password = $this->input->post('password');
        $hasher = new PasswordHash(
                $this->config->item('phpass_hash_strength', 'tank_auth'), $this->config->item('phpass_hash_portable', 'tank_auth')
        );
        $user['password'] = $hasher->HashPassword($password);
        $user['activated'] = $this->input->post('activated');
        $user['banned'] = $this->input->post('banned');
        $banned = $this->input->post('banned_reason');
        if (!empty($banned)) {
            $user['ban_reason'] = $banned;
        }
        $user['created'] = date('Y-m-d H:i:s');
        $user_id = $this->User_model->save('users', $user);
        $data['UserId'] = $user_id;
        $data['Type'] = $this->input->post('type');
        $this->User_model->save('user_type', $data);
        redirect('user');
    }

    function update_info() {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[' . $this->config->item('username_min_length', 'tank_auth') . ']|max_length[' . $this->config->item('username_max_length', 'tank_auth') . ']|alpha_dash');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        $user['username'] = $this->input->post('username');
        if (!empty($this->input->post('email'))) {
            $user['email'] = $this->input->post('email');
        }
        $password = $this->input->post('password');
        if (!empty($password)) {
            $hasher = new PasswordHash(
                    $this->config->item('phpass_hash_strength', 'tank_auth'), $this->config->item('phpass_hash_portable', 'tank_auth')
            );
            $user['password'] = $hasher->HashPassword($password);
        }
        $user['activated'] = $this->input->post('activated');
        $user['banned'] = $this->input->post('banned');
        $user['ban_reason'] = $this->input->post('banned_reason');
        $user['modified'] = date('Y-m-d H:i:s');
        $user_id = $this->User_model->update_info('users', 'id', $user, $id);
        $id_user_type = $this->input->post('id_user_type');
        $data['UserId'] = $user_id->id;
        $data['Type'] = $this->input->post('type');
        $this->User_model->update_info('user_type', 'UserTypeId', $data, $id_user_type);
        redirect('user');
    }

}
