<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Counter_model
 *
 * @author sonjoy
 */
class Counter_model extends CI_Model {

    //put your code here

    public function count_read_book($id) {
        $sql = 'SELECT * FROM `counter` WHERE BookId =' . $id;
        $check = $this->db->query($sql)->row();
        if (empty($check)) {
            $data['BookId'] = $id;
            $data['TotalRead'] = '1';
            $this->db->insert('counter', $data);
        } else if (!empty($check)) {
            $count = $check->TotalRead;
            $count_id = $check->CounterId;
            $read['TotalRead'] = $count + 1;
            $this->db->where('CounterId', $count_id);
            $this->db->update('counter', $read);
        }
        return true;
    }
    public function count_download_book($id) {
        $sql = 'SELECT * FROM `counter` WHERE BookId =' . $id;
        $check = $this->db->query($sql)->row();
        if (empty($check)) {
            $data['BookId'] = $id;
            $data['TotalDownload'] = '1';
            $this->db->insert('counter', $data);
        } else if (!empty($check)) {
            $count = $check->TotalDownload;
            $count_id = $check->CounterId;
            $download['TotalDownload'] = $count + 1;
            $this->db->where('CounterId', $count_id);
            $this->db->update('counter', $download);
        }
        return true;
    }
    public function count_issue_book($id) {
        $sql = 'SELECT * FROM `counter` WHERE BookId =' . $id;
        $check = $this->db->query($sql)->row();
        if (empty($check)) {
            $data['BookId'] = $id;
            $data['TotalIssue'] = '1';
            $this->db->insert('counter', $data);
        } else if (!empty($check)) {
            $count = $check->TotalIssue;
            $count_id = $check->CounterId;
            $issue['TotalIssue'] = $count + 1;
            $this->db->where('CounterId', $count_id);
            $this->db->update('counter', $issue);
        }
        return true;
    }

}
