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
        if (!empty($year)) {
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
        $sql = "SELECT DISTINCT  `BookId` ,  `ISBN` ,  `Title` ,  `BookKeywords` ,  `YearOfPublication` ,  `PlaceOfPublication`  FROM `view_book_details` $conditions LIMIT $limit_offset , $limit_size";
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

    function search_journal($bookTitle, $Publisher, $year, $subject, $limit_offset = 0, $limit_size = 20) {
        $result = $this->db->get("journal", $limit_size, $limit_offset)->result();
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
     * @param   array  $Organization
     * @param   array  $year    (array of integer . size 2)   (Ex : array(1999,2016)) (Ex : array(2013,2013))
     * @param   array  $keyword    (array of string)
     * @param   array  $subject    (array of integer)
     * 
     * @return  array   (db 2D array as object)
     */

    function search_report($reportTitle, $Organization, $year, $keyword, $subject, $limit_offset = 0, $limit_size = 20) {
        $result = $this->db->get("report", $limit_size, $limit_offset)->result();
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
     * @param   array  $department    (array of string)
     * @param   array  $Author    (array of integer)
     * @param   array  $subject    (array of integer)
     * 
     * @return  array   (db 2D array as object)
     */

    function search_thesis($thesisTitle, $year, $department, $Author, $subject, $limit_offset = 0, $limit_size = 20) {
        $result = $this->db->get("thesis", $limit_size, $limit_offset)->result();
        if (empty($result)) {
            return FALSE;
        } else {
            return $result;
        }
    }

}
