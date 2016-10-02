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
class Event_model extends CI_Model {

    //put your code here
    function get_expiry_date() {
        $sql = 'SELECT concat(`users`.username," (", `issuereturn`.Title,")")  AS title ,`issuereturn`.ExpiryDate AS start FROM issuereturn LEFT JOIN `users` ON issuereturn.UserId = users.id';
        return $this->db->query($sql)->result();
    }

}
