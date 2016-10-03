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
            $data[] = array('name' => $result->username, 'email' => $result->email, 'fine' => $fines->fine, 'id_issue_return' => $fines->IssueReturnId);            
        }
        return $data;
    }

}
