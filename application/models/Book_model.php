<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Book_model  extends CI_Model  {
    
    public function get_all_book(){

            return  $this->db->get('book')->result();
       
    }
    
    public function get_book_details($id=''){
        //$sql="SELECT * FROM `bookauthor` LEFT JOIN author ON author.AuthorId=bookauthor.AuthorId
//LEFT JOIN book ON book.BookId=bookauthor.BookId WHERE book.BookId=1";
        $this->db->select('*')
                ->from('bookauthor')
                ->join('author' , 'author.AuthorId=bookauthor.AuthorId' , 'left')
                ->join( 'book' , 'book.BookId=bookauthor.BookId' , 'left')
                ->join( 'publisher' , 'publisher.PublisherId=book.PublisherId' , 'left')
                ->where('book.BookId' , $id );
        $sql=$this->db->get()->result();
        return $sql;
    }
    
    
}