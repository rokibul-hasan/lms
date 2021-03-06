<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_report_model
 *
 * @author sonjoy
 */
class Admin_report_model extends CI_Model {

    //put your code here
    function get_fine_report() {
        $this->db->select('*');
        $this->db->from('users');
//        $this->db->join('issuereturn','users.id = issuereturn.UserId','left');
        $results = $this->db->get()->result();
        $data = array();
        foreach ($results as $result) {
            $this->db->select('*,SUM(Fine) as fine');
            $this->db->from('issuereturn');
            $this->db->where('UserId',$result->id);
            $fines = $this->db->get()->row();
            $data[] = array('name' => $result->username, 'email' => $result->email, 'fine' => $fines->fine, 'id_issue_return' => $fines->IssueReturnId, 'issue_id' => $fines->UserId);            
        }
        return $data;
    }
    
    function daily_read_book(){
        $date = date('Y-m-d');
        $this->db->select('*');
        $this->db->from('counter');
        $this->db->join('book','counter.BookId = book.BookId','left');
        $this->db->where('ReadDate',$date);
        return $this->db->get()->result();
    }
    
    function select_book_id($id, $typeName) {
        if ($typeName == 'book') {
            $this->db->select('*');
            $this->db->from('counter');
            $this->db->join('book','counter.BookId = book.BookId','left');
            $this->db->where('counter.BookId', $id);
            $this->db->where('counter.Type', $typeName);
            return $this->db->get()->result();
        } elseif ($typeName == 'journel') {
            $this->db->select('*');
            $this->db->from('counter');
            $this->db->join('journal','counter.BookId = journal.journalId','left');
            $this->db->where('counter.BookId', $id);
            $this->db->where('counter.Type', $typeName);
            return $this->db->get()->result();
        } elseif ($typeName == 'thesis') {
            $this->db->select('*');
            $this->db->from('counter');
            $this->db->join('thesis','counter.BookId = thesis.ThesisId','left');
            $this->db->where('counter.BookId', $id);
            $this->db->where('counter.Type', $typeName);
            return $this->db->get()->result();
        } elseif ($typeName == 'report') {
            $this->db->select('*');
            $this->db->from('counter');
            $this->db->join('report','counter.BookId = report.ReportId','left');
            $this->db->where('counter.BookId', $id);
            $this->db->where('counter.Type', $typeName);
            return $this->db->get()->result();
        } else {
            return false;
        }
    }
    
    function top_read(){
        $this->db->select('*');
        $this->db->from('counter');
        $this->db->join('book','counter.BookId = book.BookId','left');
        $this->db->limit('5');
        $this->db->order_by('TotalRead','desc');
        return $this->db->get()->result();
    }
    function top_issue(){
        $this->db->select('*');
        $this->db->from('counter');
        $this->db->join('book','counter.BookId = book.BookId','left');
        $this->db->limit('5');
        $this->db->order_by('TotalIssue','desc');
        return $this->db->get()->result();
    }
    function top_download(){
        $this->db->select('*');
        $this->db->from('counter');
        $this->db->join('book','counter.BookId = book.BookId','left');
        $this->db->limit('5');
        $this->db->order_by('TotalDownload','desc');
        return $this->db->get()->result();
    }

}
