<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Book_model extends CI_Model {

    public function get_all($table) {

        return $this->db->get($table)->result();
    }

    public function get_book_details($id = '') {
        $this->db->select('*,subject.Title as Category,book.Title as book_title')
                ->from('bookauthor')
                ->join('author', 'author.AuthorId=bookauthor.AuthorId', 'left')
                ->join('book', 'book.BookId=bookauthor.BookId', 'left')
                ->join('publisher', 'publisher.PublisherId=book.PublisherId', 'left')
                ->join('booksubject', 'booksubject.BookId=book.BookId', 'left')
                ->join('subject', 'booksubject.SubjectId=subject.SubjectId', 'left')
                ->where('book.BookId', $id);
        $sql = $this->db->get()->result();
        return $sql;
    }

    public function get_journal_details($id = '') {
        $this->db->select('*,subject.Title as Category,journal.Title as journal_title')
                ->from('journal')
                ->join('publisher', 'publisher.PublisherId=journal.PublisherId', 'left')
                ->join('journalsubject', 'journalsubject.JournalId=journal.JournalId', 'left')
                ->join('subject', 'journalsubject.SubjectId=subject.SubjectId', 'left')
                ->where('journal.JournalId', $id);
        $sql = $this->db->get()->result();
        return $sql;
    }

    public function get_report_details($id = '') {
        $this->db->select('*,subject.Title as Category,report.Title as book_title')
                ->from('report')
                ->join('reportsubject', 'reportsubject.ReportId=report.ReportId', 'left')
                ->join('subject', 'reportsubject.SubjectId=subject.SubjectId', 'left')
                ->where('report.ReportId', $id);
        $sql = $this->db->get()->result();
        return $sql;
    }

    public function get_thesis_details($id = '') {
        $this->db->select('*,subject.Title as Category,thesis.Title as book_title')
                ->from('thesisauthor')
                ->join('author', 'author.AuthorId=thesisauthor.AuthorId', 'left')
                ->join('thesis', 'thesis.ThesisId=thesisauthor.ThesisId', 'left')
                ->join('thesissubject', 'thesissubject.Thesisid=thesis.Thesisid', 'left')
                ->join('subject', 'thesissubject.SubjectID=subject.SubjectId', 'left')
                ->where('thesis.Thesisid', $id);
        $sql = $this->db->get()->result();
        return $sql;
    }

    function select_book_info($Info, $option) {
        $terms = explode(" ", $Info);
        $pos = strpos($Info,' ');
//       exit();

        if ($option == 'books_form') {
            if ($pos == TRUE) {
                $i = 1;
                $sql = "SELECT * FROM `book`";
                foreach ($terms as $each) {
                    
//                    if ($i == 1) {
                      echo  $sql.="YearOfPublication LIKE '$each' OR Title LIKE '$each' OR Edition LIKE '$each'";
//                    } else if ($i == 2) {
//                        $sql.="YearOfPublication LIKE '$each' OR Title LIKE '$each' OR Edition LIKE '$each'";
//                    } else {
//                        $sql.="YearOfPublication LIKE '$each' OR Title LIKE '$each' OR Edition LIKE '$each'";
//                    }
//                    $i++;
//                    $this->db->select('*');
//                    $this->db->from('book');
//                    $this->db->like('YearOfPublication', $Info);
//                    $this->db->or_like('Title', $Info);
//                    $this->db->or_like('Edition', $Info); 
//                    echo $sql;exit();
                }
                $results = $this->db->query($sql)->result();
            } else {
                $this->db->select('*');
                $this->db->from('book');
                $this->db->like('YearOfPublication', $Info);
                $this->db->or_like('Title', $Info);
                $this->db->or_like('Edition', $Info);
                $results = $this->db->get()->result();
            }
            if (empty($results)) {
                $table = '<div class = "alert alert-danger">No Book found</div>';
            } else {
                $table = '<table class="table table-hover table-striped"><tbody>';
                foreach ($results as $result) {
                    $table .='<tr><td id="type" name="book"><option value="' . $result->BookId . '">' . $result->Title . ' | Book id-' . $result->BookId . '</option></td></tr>';
                }
                $table .= '</tbody></table>';
            }
        } elseif ($option == 'journals_form') {
            $this->db->select('*');
            $this->db->from('journal');
            $this->db->where('JournalId', $Info);
            $this->db->or_like('Title', $Info);
            $results = $this->db->get()->result();
            if (empty($results)) {
                $table = '<div class = "alert alert-danger">No Journal found</div>';
            } else {
                $table = '<table class="table table-hover table-striped"><tbody>';
                foreach ($results as $result) {
                    $table .='<tr><td id="type" name="journel"><option value="' . $result->JournalId . '">' . $result->Title . ' | Journal id-' . $result->JournalId . '</option></td></tr>';
                }
                $table .= '</tbody></table>';
            }
        } elseif ($option == 'reports_form') {
            $this->db->select('*');
            $this->db->from('report');
            $this->db->where('ReportId', $Info);
            $this->db->or_like('Title', $Info);
            $results = $this->db->get()->result();
            if (empty($results)) {
                $table = '<div class = "alert alert-danger">No Report found</div>';
            } else {
                $table = '<table class="table table-hover table-striped"><tbody>';
                foreach ($results as $result) {
                    $table .='<tr><td id="type" name="report"><option value="' . $result->ReportId . '">' . $result->Title . ' | Report id-' . $result->ReportId . '</option></td></tr>';
                }
                $table .= '</tbody></table>';
            }
        } elseif ($option == 'thesis_form') {
            $this->db->select('*');
            $this->db->from('thesis');
            $this->db->where('Thesisid', $Info);
            $this->db->or_like('Title', $Info);
            $results = $this->db->get()->result();
            if (empty($results)) {
                $table = '<div class = "alert alert-danger">No Thesis found</div>';
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
    
    
    function siteinfo(){
        $query=  $this->db->get('about')->result_array();
        foreach ($query as $row){
            $data['sitetitle'] = $row['SiteTitle'];
            $data['AboutUs'] = $row['AboutUs'];
            $data['logininfo'] =  $row['LoginInstruction'];
            $data['registrationinfo'] = $row['RegistrationInstraction'];
        }
        
        return $data;
    }

}
