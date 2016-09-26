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
//  $sql = $this->db->query('Select type from `issuereturn`')->result();
//  print_r($sql);exit();
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->join('users', 'issuereturn.UserId=users.id', 'left');
//        $this->db->join('book', 'issuereturn.BookId=book.BookId', 'left');
//        $this->db->join('journal', 'issuereturn.BookId=journal.JournalId', 'left');
        return $this->db->get()->result();
    }

    function select_book_info($Info, $option) {
        if ($option == 'book') {
            $this->db->select('*');
            $this->db->from('book');
            $this->db->where('BookId', $Info);
            $this->db->or_like('Title', $Info);
            $results = $this->db->get()->result();
            if (empty($results)) {
                $table = '<div class = "alert alert-danger">No Book found</div>';
            } else {
                $table = '<table class="table table-hover table-striped"><tbody>';
                foreach ($results as $result) {
                    $table .='<tr><td id="type" name="book"><option value="' . $result->BookId . '">' . $result->Title . ' | Book id-' . $result->BookId . '</option></td></tr>';
                }
                $table .= '</tbody></table>';
            }
        } elseif ($option == 'journel') {
            $this->db->select('*');
            $this->db->from('journal');
            $this->db->where('JournalId', $Info);
            $this->db->or_like('Title', $Info);
            $results = $this->db->get()->result();
            if (empty($results)) {
                $table = '<div class = "alert alert-danger">No Book found</div>';
            } else {
                $table = '<table class="table table-hover table-striped"><tbody>';
                foreach ($results as $result) {
                    $table .='<tr><td id="type" name="journel"><option value="' . $result->JournalId . '">' . $result->Title . ' | Journal id-' . $result->JournalId . '</option></td></tr>';
                }
                $table .= '</tbody></table>';
            }
        } elseif ($option == 'report') {
            $this->db->select('*');
            $this->db->from('report');
            $this->db->where('ReportlId', $Info);
            $this->db->or_like('Title', $Info);
            $results = $this->db->get()->result();
            if (empty($results)) {
                $table = '<div class = "alert alert-danger">No Book found</div>';
            } else {
                $table = '<table class="table table-hover table-striped"><tbody>';
                foreach ($results as $result) {
                    $table .='<tr><td id="type" name="report"><option value="' . $result->ReportlId . '">' . $result->Title . ' | Report id-' . $result->ReportlId . '</option></td></tr>';
                }
                $table .= '</tbody></table>';
            }
        } elseif ($option == 'thesis') {
            $this->db->select('*');
            $this->db->from('thesis');
            $this->db->where('Thesisid', $Info);
            $this->db->or_like('Title', $Info);
            $results = $this->db->get()->result();
            if (empty($results)) {
                $table = '<div class = "alert alert-danger">No Book found</div>';
            } else {
                $table = '<table class="table table-hover table-striped"><tbody>';
                foreach ($results as $result) {
                    $table .='<tr><td id="type" name="thesis"><option value="' . $result->Thesisid . '">' . $result->Title . ' | Thesis id-' . $result->Thesisid . '</option></td></tr>';
                }
                $table .= '</tbody></table>';
            }
        } else {
            $table = '<div class = "alert alert-danger">No Type Selected</div>';
        }

        return $table;
    }

    function select_book_id($id, $typeName) {
        if ($typeName == 'book') {
            $this->db->select('*');
            $this->db->from('book');
            $this->db->where('BookId', $id);
            return $this->db->get()->result();
        } elseif ($typeName == 'journel') {
            $this->db->select('*');
            $this->db->from('journal');
            $this->db->where('JournalId', $id);
            return $this->db->get()->result();
        } elseif ($typeName == 'thesis') {
            $this->db->select('*');
            $this->db->from('thesis');
            $this->db->where('Thesisid', $id);
            return $this->db->get()->result();
        } elseif ($typeName == 'report') {
            $this->db->select('*');
            $this->db->from('report');
            $this->db->where('ReportId', $id);
            return $this->db->get()->result();
        } else {
            return false;
        }
    }

//add new issue
    function new_issue($post_array) {
        $id = $this->input->post('Id');
        $type = $this->input->post('type');
        if ($type == 'book') {
            $this->db->select('*');
            $this->db->from('book');
            $this->db->where('BookId', $id);
            $info = $this->db->get()->row();
            $data['BookId'] = $info->BookId;
            $data['type'] = 'book';
        } elseif ($type == 'journel') {
            $this->db->select('*');
            $this->db->from('journal');
            $this->db->where('JournalId', $id);
            $info = $this->db->get()->row();
            $data['BookId'] = $info->JournalId;
            $data['type'] = 'journal';
        } elseif ($type == 'thesis') {
            $this->db->select('*');
            $this->db->from('thesis');
            $this->db->where('Thesisid', $id);
            $info = $this->db->get()->row();
            $data['BookId'] = $info->Thesisid;
            $data['type'] = 'thesis';
        } elseif ($type == 'report') {
            $this->db->select('*');
            $this->db->from('report');
            $this->db->where('ReportId', $id);
            $info = $this->db->get()->row();
            $data['BookId'] = $info->ReportId;
            $data['type'] = 'report';
        } else {
            return false;
        }
        $user_type = $this->session->userdata('user_type');
        $circulation = $this->db->where('UserTypeId',$user_type)->get('circulation')->row();

        $data['UserId'] = $this->input->post('UserId');
        $data['Title'] = $info->Title;
        $data['IssueDate'] = date('Y-m-d H:i:s');
        $data['ExpiryDate'] = date('Y-m-d H:i:s' . " +".$circulation->IssueLimitDays." day");
        $data['ReturnOrNot'] = '2';
        if( $user_type == '1'){
            $data['approval_status'] = '2';
        }
        $this->db->insert('issuereturn', $data);
        return true;
    }

    function get_issue_book() {
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->where('ReturnOrNot', '2');
        $this->db->where('approval_status', '2');
        return $this->db->get()->result();
    }

    function returned_book($book_id) {
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->where('BookId', $book_id);
        $book_info = $this->db->get()->row();
        $data['ReturnDate'] = date('Y-m-d h:i:s');
        $data['ReturnOrNot'] = '1';
        $this->db->where('BookId', $book_id);
        $this->db->update('issuereturn', $data);
        return true;
    }

    function issue_approval($IssueReturnId, $data) {
        $this->db->where('IssueReturnId', $IssueReturnId);
        $this->db->update('issuereturn', $data);
        return true;
    }

}
