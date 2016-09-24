<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Circulation_model
 *
 * @author sonjoy
 */
class Circulation_model extends CI_Model {

    //put your code here
    public function issue() {
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->join('users','issuereturn.UserId=users.id','left');
        $this->db->join('book','issuereturn.BookId=book.BookId','left');
        return $this->db->get()->result();
    }

    function select_book_info($bookInfo) {
        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('BookId', $bookInfo);
        $this->db->or_like('Title', $bookInfo);
        $results = $this->db->get()->result();
        $table = '<table class="table table-hover table-striped"><tbody>';
        foreach ($results as $result) {
            $table .='<tr value="' . $result->BookId . '"><td><option value="' . $result->BookId . '">' . $result->Title . ' | book id-' . $result->BookId . '</option></td></tr>';
        }
        $table .= '</tbody></table>';
        return $table;
    }

    function select_book_id($book_id) {
        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('BookId', $book_id);
        return $this->db->get()->result();
    }
    
    function new_issue($post_array){
        $book_id = $this->input->post('BookId');
        $this->db->select('*');
        $this->db->from('book');
        $this->db->where('BookId', $book_id);
        $book_info = $this->db->get()->row();
        $data['BookId'] = $book_info->BookId;
        $data['UserId'] = $this->input->post('UserId');
        $data['Title'] = $book_info->Title;
        $data['IssueDate'] = date('Y-m-d H:i:s');
        $data['ExpiryDate'] = date('Y-m-d H:i:s' . " +2 day");
        $data['ReturnOrNot'] = '2';
        $this->db->insert('issuereturn',$data);
        return true;
    }
    
    function get_issue_book(){
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->where('ReturnOrNot', '2');
        $this->db->where('approval_status', '2');
        return $this->db->get()->result();
    }
    
    function returned_book($book_id){
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->where('BookId', $book_id);
        $book_info = $this->db->get()->row();
        $data['ReturnDate'] = date('Y-m-d h:i:s');
        $data['ReturnOrNot'] = '1';
        $this->db->where('BookId',$book_id);
        $this->db->update('issuereturn',$data);
        return true;
    }
    
    function issue_approval($IssueReturnId,$data){
        $this->db->where('IssueReturnId',$IssueReturnId);
        $this->db->update('issuereturn',$data);
        return true;
    }

}
