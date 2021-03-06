<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Frontpage extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->model('Book_model');
        $data['all_book'] = $this->Book_model->get_all('book','BookId');
        $data['all_journal'] = $this->Book_model->get_all('journal','JournalId');       
         
        $data['all_report'] = $this->Book_model->get_all('report','ReportId');
        $data['all_thesis'] = $this->Book_model->get_all('thesis','Thesisid');
        
        $data['siteinfo'] = $this->Book_model->siteinfo();
//        echo '<pre>';
//        print_r($data['siteinfo']);
//        echo $data['siteinfo']
//        exit();
        
        $this->load->helper('html');
        $data['theme_asset_url'] = base_url() . $this->config->item('THEME_ASSET');
        $data['Title'] = 'Dashboard';
        $data['base_url'] = base_url();
        $this->load->view( 'front/index', $data);

    }
    
    public  function trial(){
         $this->load->helper('html');
         $this->load->view( 'front/trial');
    }
    
    
    
}
