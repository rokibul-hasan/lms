<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Checkuser  extends CI_Model  {
    
        function __construct() {  
           
            $user_id = $_SESSION['user_id'];
            
            $sql = $this->db->where('UserId = '.$user_id)
                    ->get('user_type')->result();
                   
                     
            foreach( $sql as $row){
               $user_type = $row->Type;
           }
//           echo $user_type;
//           exit();
           
            if(isset($user_type) && !empty($user_type)){
                
                            if($user_type == 4){
                                redirect('userdashboard');
                            }
            }else{
                //unset($_SESSION);
                $this->load->library('tank_auth');
                $this->tank_auth->logout();
               
                echo('<script>alert("Your Acount Not Varified Yet. Please Contact with Admin ");window.location="'. site_url('frontpage').'";</script>');
                
                               
            }
            
    }
    
}

