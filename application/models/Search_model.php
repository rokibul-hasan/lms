<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Search_model
 *
 * @author MD. Mashfiq
 */
class Search_model extends CI_Model {
    /*
     * search_book
     * 
     * This will search book from the db
     * 
     * @param   string  $bookTitle
     * @param   array  $Publisher    (array of integer)
     * @param   array  $year    (array of integer . size 2)   (Ex : array(1999,2016)) (Ex : array(2013,2013))
     * @param   array  $keywords    (array of string)
     * @param   array  $Author    (array of integer)
     * @param   array  $subject    (array of integer)
     * 
     * @return  array   (db 2D array as object)
     */

    function search_book($bookTitle = null, $Publisher = null, $year = null, $keywords = null, $Author = null, $subject = null, $limit_offset = 0, $limit_size = 30) {
        $conditions = array();
        if (!empty($bookTitle)) {
            array_push($conditions, "`Title` LIKE  '%$bookTitle%'");
        }
        if (!empty($Publisher)) {
            $Publisher = implode(",", $Publisher);
            array_push($conditions, "`PublisherId` IN ($Publisher)");
        }
        if (!empty($year[0])&&!empty($year[1])) {
            array_push($conditions, "`YearOfPublication` BETWEEN  {$year[0]} AND {$year[1]}");
        }
        if (!empty($keywords)) {
            $keyword_coditions = array();
            foreach ($keywords as $keyword) {
                array_push($keyword_coditions, "`BookKeywords` LIKE  '%$keyword%'");
            }
            if (!empty($keyword_coditions)) {
                array_push($conditions, implode(" OR ", $keyword_coditions));
            }
        }

        if (!empty($Author)) {
            $Author = implode(",", $Author);
            array_push($conditions, "`AuthorId` IN ($Author)");
        }
        if (!empty($subject)) {
            $subject = implode(",", $subject);
            array_push($conditions, "`SubjectId` IN ($subject)");
        }

        if (!empty($conditions)) {
            $conditions = "WHERE " . implode(" AND ", $conditions);
        } else {
            $conditions = "";
        }
        $sql = "SELECT DISTINCT  `BookId` ,  `ISBN` ,  `Title` ,  `BookKeywords` ,
            `YearOfPublication` ,  `PlaceOfPublication`,`PublisherName`  FROM `view_book_details` $conditions LIMIT $limit_offset , $limit_size";
//        die($sql);
        $result = $this->db->query($sql)->result();
        if (empty($result)) {
            return FALSE;
        } else {
            return $result;
        }
    }

    /*
     * search_journal
     * 
     * This will search journal from the db
     * 
     * @param   string  $journalTitle
     * @param   array  $Publisher    (array of integer)
     * @param   array  $year    (array of integer . size 2)   (Ex : array(1999,2016)) (Ex : array(2013,2013))
     * @param   array  $subject    (array of integer)
     * 
     * @return  array   (db 2D array as object)
     */

    function search_journal($journalTitle = null, $Publisher = null, $year = null, $subject = null, $limit_offset = 0, $limit_size = 30) {
        $conditions = array();
        if (!empty($journalTitle)) {
            array_push($conditions, "`Title` LIKE  '%$journalTitle%'");
        }
        if (!empty($Publisher)) {
            $Publisher = implode(",", $Publisher);
            array_push($conditions, "`PublisherId` IN ($Publisher)");
        }
        if (!empty($year[0])&&!empty($year[1])) {
            array_push($conditions, "`Year` BETWEEN  {$year[0]} AND {$year[1]}");
        }
        if (!empty($subject)) {
            $subject = implode(",", $subject);
            array_push($conditions, "`SubjectId` IN ($subject)");
        }

        if (!empty($conditions)) {
            $conditions = "WHERE " . implode(" AND ", $conditions);
        } else {
            $conditions = "";
        }
        $sql = "SELECT DISTINCT  `JournalId`, `ISSN`, `Title`, `Year`,`PublisherName`  FROM `view_journal_details` $conditions LIMIT $limit_offset , $limit_size";
//        die($sql);
        $result = $this->db->query($sql)->result();
//        print_r($result);exit();
        if (empty($result)) {
            return FALSE;
        } else {
            return $result;
        }
    }

    /*
     * search_report
     * 
     * This will search report from the db
     * 
     * @param   string  $reportTitle
     * @param   array  $Organization    (array of string)
     * @param   array  $year    (array of integer . size 2)   (Ex : array(1999,2016)) (Ex : array(2013,2013))
     * @param   array  $keyword    (array of string)
     * @param   array  $subject    (array of integer)
     * 
     * @return  array   (db 2D array as object)
     */

    function search_report($reportTitle = null, $Organizations = null, $year = null, $keywords = null, $subject = null, $limit_offset = 0, $limit_size = 20) {
//         print_r($Organizations);exit();
//        die($limit_offset);
        $conditions = array();
        
        
        if (!empty($reportTitle)) {
            array_push($conditions, "`Title` LIKE  '%$reportTitle%'");
        }
        if (!empty($Organizations)) {
            $Organization_coditions = array();
            foreach ($Organizations as $Organization) {
                array_push($Organization_coditions, "`Organization` LIKE  '%$Organization%'");
            }
            if (!empty($Organization_coditions)) {
                array_push($conditions, implode(" OR ", $Organization_coditions));
            }
        }
        if (!empty($year[0])&&!empty($year[1])) {
            array_push($conditions, "`Year` BETWEEN  {$year[0]} AND {$year[1]}");
        }
        if (!empty($keywords)) {
            $keyword_coditions = array();
            foreach ($keywords as $keyword) {
                array_push($keyword_coditions, "`Keywords` LIKE  '%$keyword%'");
            }
            if (!empty($keyword_coditions)) {
                array_push($conditions, implode(" OR ", $keyword_coditions));
            }
        }

        if (!empty($subject)) {
            $subject = implode(",", $subject);
            array_push($conditions, "`SubjectId` IN ($subject)");
        }

        if (!empty($conditions)) {
            $conditions = "WHERE " . implode(" AND ", $conditions);
        } else {
            $conditions = "";
        }
        $sql = "SELECT DISTINCT  `ReportId`, `Title`, `Organization`, `Year`, `Keywords`  FROM `view_report_details` $conditions ";
//        die($sql);
        $result = $this->db->query($sql)->result();
        if (empty($result)) {
            return FALSE;
        } else {
            return $result;
        }
    }

    /*
     * search_thesis
     * 
     * This will search thesis from the db
     * 
     * @param   string  $thesisTitle
     * @param   array  $year    (array of integer . size 2)   (Ex : array(1999,2016)) (Ex : array(2013,2013))
     * @param   array  $departments    (array of string)
     * @param   array  $Author    (array of integer)
     * @param   array  $subject    (array of integer)
     * 
     * @return  array   (db 2D array as object)
     */

    function search_thesis($thesisTitle, $year, $departments, $Author, $subject, $limit_offset = 0, $limit_size = 20) {
        $conditions = array();
        if (!empty($thesisTitle)) {
            array_push($conditions, "`Title` LIKE  '%$thesisTitle%'");
        }
        if (!empty($year[0])&&!empty($year[1])) {
            array_push($conditions, "`yearofaward` BETWEEN  {$year[0]} AND {$year[1]}");
        }
        if (!empty($departments)) {
            $department_coditions = array();
            foreach ($departments as $department) {
                array_push($department_coditions, "`department` LIKE  '%$department%'");
            }
            if (!empty($department_coditions)) {
                array_push($conditions, implode(" OR ", $department_coditions));
            }
        }

        if (!empty($Author)) {
            $Author = implode(",", $Author);
            array_push($conditions, "`AuthorId` IN ($Author)");
        }
        if (!empty($subject)) {
            $subject = implode(",", $subject);
            array_push($conditions, "`SubjectId` IN ($subject)");
        }

        if (!empty($conditions)) {
            $conditions = "WHERE " . implode(" AND ", $conditions);
        } else {
            $conditions = "";
        }
        $sql = "SELECT DISTINCT  `Thesisid`, `Title`, `yearofaward`, `department`  FROM `view_thesis_details` $conditions LIMIT $limit_offset , $limit_size";
//        die($sql);
        $result = $this->db->query($sql)->result();
        if (empty($result)) {
            return FALSE;
        } else {
            return $result;
        }
    }

}
