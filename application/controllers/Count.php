<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        
        $this->load->model('counter_model');

    }

    public function count_read_book() {
        $this->input->post('id');
        $this->counter_model->count_read_book($id);
    }
    
    
    
    
    
}
