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
        $data['total_issued_book'] = $this->total_issued_book();
        $data['total_issued_journal'] = $this->total_issued_journal();
        $data['total_issued_thesis'] = $this->total_issued_thesis();
        $data['total_issued_report'] = $this->total_issued_report();
        $data['total_rejected_book'] = $this->total_rejected_book();
        $data['total_rejected_journal'] = $this->total_rejected_journal();
        $data['total_rejected_thesis'] = $this->total_rejected_thesis();
        $data['total_rejected_report'] = $this->total_rejected_report();
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
                
                ->where('approval_status','2')
                ->count_all_results('issuereturn');         
     }    
     
     public function today_returned(){
         
        return $this->db->where('DATE(ReturnDate)=DATE(NOW()) AND ReturnOrNot=1')
                ->count_all_results('issuereturn');         
     }  
     
     public function this_month_issued(){
         return $this->db->where('MONTH(IssueDate)=MONTH(NOW()) AND YEAR(IssueDate)=YEAR(NOW())')
                 
                ->where('approval_status','2')
                ->count_all_results('issuereturn');  
     }
     
     
     public function this_month_returned(){
         return $this->db->where('MONTH(ReturnDate)=MONTH(NOW()) AND YEAR(ReturnDate)=YEAR(NOW()) AND ReturnOrNot=1')
                ->count_all_results('issuereturn');  
     }
     
     

     public function total_member(){
         return $this->db->from('users')
                 ->join( 'user_type' ,'user_type.UserId=users.id','left')
                 ->where('users.activated=1')
                ->count_all_results();     
    }
    
    public function total_issued_book(){
        return $this->db->from('issuereturn')
                ->where('type','book')
                ->where('ReturnOrNot','2')
                ->where('approval_status','2')
                ->count_all_results();
    }
    public function total_issued_journal(){
        return $this->db->from('issuereturn')
                ->where('type','journal')
                ->where('ReturnOrNot','2')
                ->where('approval_status','2')
                ->count_all_results();
    }
    public function total_issued_thesis(){
        return $this->db->from('issuereturn')
                ->where('ReturnOrNot','2')
                ->where('approval_status','2')
                ->where('type','thesis')->count_all_results();
    }
    public function total_issued_report(){
        return $this->db->from('issuereturn')
                ->where('ReturnOrNot','2')
                ->where('approval_status','2')
                ->where('type','report')->count_all_results();
    }
    public function total_rejected_book(){
        return $this->db->from('issuereturn')
                ->where('type','book')
                ->where('approval_status','3')->count_all_results();
    }
    public function total_rejected_journal(){
        return $this->db->from('issuereturn')
                ->where('type','journal')
                ->where('approval_status','3')->count_all_results();
    }
    public function total_rejected_thesis(){
        return $this->db->from('issuereturn')
                ->where('type','thesis')
                ->where('approval_status','3')->count_all_results();
    }
    public function total_rejected_report(){
        return $this->db->from('issuereturn')
                ->where('type','report')
                ->where('approval_status','3')->count_all_results();
    }
}
