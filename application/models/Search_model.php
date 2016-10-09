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
     * @param   array  $BookCategory    (array of integer)
     * @param   array  $keyword    (array of string)
     * @param   array  $Author    (array of integer)
     * @param   array  $subject    (array of integer)
     * 
     * @return  array   (db 2D array as object)
     */

    function search_book($bookTitle, $Publisher, $year, $BookCategory, $keyword, $Author, $subject) {
        $result = $this->db->get("book")->result();
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

    function search_journal($bookTitle, $Publisher, $year, $subject) {
        $result = $this->db->get("journal")->result();
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

    function search_report($reportTitle, $Organization, $year, $keyword, $subject) {
        $result = $this->db->get("report")->result();
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

    function search_thesis($thesisTitle, $year, $department, $Author, $subject) {
        $result = $this->db->get("thesis")->result();
        if (empty($result)) {
            return FALSE;
        } else {
            return $result;
        }
    }

}
