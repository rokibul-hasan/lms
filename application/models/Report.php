<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Report  extends CI_Model  {
    
    public function short_report(){
        $data =  array();
        $data['book'] = $this->db->count_all('book');
        $data['journal'] = $this->db->count_all('journal');
        $data['report'] = $this->db->count_all('report');
        $data['thesis'] = $this->db->count_all('thesis');
        $data['total_issued'] = $this->total_issued();
        $data['rejected'] = $this->issue_rejected();
        $data['today_issued']=$this->today_issued();
        $data['month_issued'] = $this->this_month_issued();
        $data['today_returned'] = $this->today_returned();
        $data['month_returned'] = $this->this_month_returned();
        $data['total_member'] = $this->total_member();
        return $data;
       
    }
    
     public function total_issued(){
        return $this->db->where('ReturnOrNot',2)
                ->count_all_results('issuereturn');         
     }
     
public function issue_rejected(){
        return $this->db->where('approval_status',3)
                ->count_all_results('issuereturn');         
     }  

     public function today_issued(){
         
        return $this->db->where('DATE(IssueDate)=DATE(NOW())')
                ->count_all_results('issuereturn');         
     }    
     
     public function today_returned(){
         
        return $this->db->where('DATE(ReturnDate)=DATE(NOW()) AND ReturnOrNot=1')
                ->count_all_results('issuereturn');         
     }  
     
     public function this_month_issued(){
         return $this->db->where('MONTH(IssueDate)=MONTH(NOW()) AND YEAR(IssueDate)=YEAR(NOW())')
                ->count_all_results('issuereturn');  
     }
     
     
     public function this_month_returned(){
         return $this->db->where('MONTH(ReturnDate)=MONTH(NOW()) AND YEAR(ReturnDate)=YEAR(NOW())')
                ->count_all_results('issuereturn');  
     }
     
     

     public function total_member(){
         return $this->db->from('users')
                 ->join( 'user_type' ,'user_type.UserId=users.id','left')
                 ->where('users.activated=1')
                ->count_all_results();     
    }
}