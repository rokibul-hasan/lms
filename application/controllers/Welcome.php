<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Welcome
 *
 * @author sonjoy
 */
class Welcome extends CI_Controller{
    //put your code here
    function index(){
       mail('sujon.roy420@yahoo.com', 'My Subject', 'message test messaage');
        echo 'success';
    }
    
    
}
