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
        $this->db->order_by('IssueReturnId', 'desc');
//        $this->db->join('book', 'issuereturn.BookId=book.BookId', 'left');
//        $this->db->join('journal', 'issuereturn.BookId=journal.JournalId', 'left');
        return $this->db->get()->result();
    }

    public function search_issue_info_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->join('users', 'issuereturn.UserId=users.id', 'left');
        $this->db->order_by('IssueReturnId', 'desc');
        $this->db->where('UserId', $user_id);
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
            $this->db->where('ReportId', $Info);
            $this->db->or_like('Title', $Info);
            $results = $this->db->get()->result();
            if (empty($results)) {
                $table = '<div class = "alert alert-danger">No Book found</div>';
            } else {
                $table = '<table class="table table-hover table-striped"><tbody>';
                foreach ($results as $result) {
                    $table .='<tr><td id="type" name="report"><option value="' . $result->ReportId . '">' . $result->Title . ' | Report id-' . $result->ReportId . '</option></td></tr>';
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
    function save_new_issue($post_array) {

//        print_r($post_array);
//        print_r($_SESSION);
        $id = $this->input->post('Id');

//        echo $id;
//        exit();
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
        $circulation = $this->db->where('UserType', $user_type)->get('circulation')->row();

        $data['UserId'] = $this->input->post('UserId');
        $data['Title'] = $info->Title;
        $data['IssueDate'] = date('Y-m-d H:i:s');
//        $data['ExpiryDate'] = date('Y-m-d H:i:s' . " +" . $circulation->IssueLimitDays . " day");
        $data['ExpiryDate'] = date("Y-m-d", strtotime("+" . $circulation->IssueLimitDays . " day"));
//        print_r($data['ExpiryDate']);exit();
        $data['ReturnOrNot'] = '2';
        if ($user_type == '1') {
            $data['approval_status'] = '2';
            $data['ApprovedBy'] = $_SESSION['user_id'];
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

    function fine_calculation() {
        $data = array();
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->join('users', 'issuereturn.UserId=users.id', 'left');
        $this->db->join('user_type', 'users.id=user_type.UserId', 'left');
//        $this->db->where('issuereturn.ReturnOrNot','2');
        $results = $this->db->get()->result();
        foreach ($results as $result) {
            $fine = $this->db->where('UserType', $result->Type)->get('circulation')->row();
            $fine_exist = $this->db->where('IssueReturnId', $result->IssueReturnId)->get('issuereturn')->row();
//            print_r($fine_exist);exit();
            $date1 = date_create($result->ExpiryDate);
            $date2 = date_create(date('Y-m-d H:i:s'));
            $diff = date_diff($date1, $date2);
            $total_day = $diff->format('%d');
            if (empty($fine)) {
                $total_fine = 0;
            }else if(!empty($fine_exist->Fine)){
                $total_fine = $fine_exist->Fine;
            }else {
                $total_fine = $fine->Fine * $total_day;
            }
            $data[] = array('username' => $result->username, 'Title' => $result->Title, 'Fine' => $total_fine, 'Find_paid' => $result->Fine, 'IssueReturnId' => $result->IssueReturnId); //            
        }
//        print_r($data);exit();
        return $data;
    }

    function search_fine_calculation_by_user_id($user_id, $payment) {
        $data = array();
        $this->db->select('*');
        $this->db->from('issuereturn');
        $this->db->join('users', 'issuereturn.UserId=users.id', 'left');
        $this->db->join('user_type', 'users.id=user_type.UserId', 'left');
        $this->db->where('issuereturn.UserId', $user_id);
        if ($payment == '0') {
            $this->db->where('issuereturn.Fine', '0');
        } else if ($payment == '1') {
            $this->db->where('issuereturn.Fine !=', '0');
        }
        $results = $this->db->get()->result();
        foreach ($results as $result) {
            $fine = $this->db->where('UserType', $result->Type)->get('circulation')->row();
            $date1 = date_create($result->ExpiryDate);
            $date2 = date_create(date('Y-m-d H:i:s'));
            $diff = date_diff($date1, $date2);
            $total_day = $diff->format('%d');
            if (empty($fine)) {
                $total_fine = 0;
            } else {
                $total_fine = $fine->Fine * $total_day;
            }
            $data[] = array('username' => $result->username, 'Title' => $result->Title, 'Fine' => $total_fine, 'Find_paid' => $result->Fine, 'IssueReturnId' => $result->IssueReturnId); //            
        }
//        print_r($data);exit();
        return $data;
    }

    function get_all_request_issue() {
        $userId = $this->session->userdata('user_id');
        return $this->db->where('UserId', $userId)->get('issuereturn')->result();
    }

}
