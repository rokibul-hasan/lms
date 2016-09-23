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
        $data['UserId'] = $_SESSION['user_id'];
        $data['Title'] = $book_info->Title;
        $data['IssueDate'] = date('Y-m-d H:i:s');
        $data['ExpiryDate'] = date('Y-m-d H:i:s' . " +2 day");
        $data['ReturnOrNot'] = '1';
        $this->db->insert('issuereturn',$data);
        return true;
    }
    
    function get_issue_book(){
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->where('ReturnOrNot', '1');
        return $this->db->get()->result();
    }

}
