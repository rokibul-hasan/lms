<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Count extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        
        $this->load->model('Counter_model');

    }

    public function count_read_book() {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        //print_r($_POST);exit();
        $this->Counter_model->count_read_book($id,$type);
		//return true;
    }
    public function count_issue_book() {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $this->Counter_model->count_issue_book($id,$type);
		//return true;
    }
    
    public function count_download_book(){
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $this->Counter_model->count_download_book($id,$type);
    }
    
    
    
    
    
}
