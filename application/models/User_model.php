<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_model
 *
 * @author sonjoy
 */
class User_model extends ci_model{
    //put your code here
    function get_all_users_info_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_type','users.id = user_type.UserId','left');
        $this->db->where('users.id',$user_id);
        return $query = $this->db->get()->result();
    }
}
