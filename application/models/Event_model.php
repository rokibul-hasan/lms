<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Even_model
 *
 * @author sonjoy
 */
class Event_model extends CI_Model{
    //put your code here
	function get_expiry_date(){
		$this->db->select('*');
		$this->db->from('issuereturn');
		$this->db->join('users','issuereturn.UserId = users.id','left');
		return $this->db->get()->result();
	}
}