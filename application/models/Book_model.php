<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Book_model  extends CI_Model  {
    
    public function get_all($table){

            return  $this->db->get($table)->result();
       
    }

            
    public function get_book_details($id=''){
        $this->db->select('*,subject.Title as Category,book.Title as book_title')
                ->from('bookauthor')
                ->join('author' , 'author.AuthorId=bookauthor.AuthorId' , 'left')
                ->join( 'book' , 'book.BookId=bookauthor.BookId' , 'left')
                ->join( 'publisher' , 'publisher.PublisherId=book.PublisherId' , 'left')
                ->join('booksubject' , 'booksubject.BookId=book.BookId' , 'left')
                ->join('subject' , 'booksubject.SubjectId=subject.SubjectId' , 'left')                
                ->where('book.BookId' , $id );
        $sql=$this->db->get()->result();
        return $sql;
    }
    
        public function get_journal_details($id=''){
        $this->db->select('*,subject.Title as Category,journal.Title as journal_title')
                ->from('journal')
                ->join( 'publisher' , 'publisher.PublisherId=journal.PublisherId' , 'left')
                ->join('journalsubject' , 'journalsubject.JournalId=journal.JournalId' , 'left')
                ->join('subject' , 'journalsubject.SubjectId=subject.SubjectId' , 'left')                
                ->where('journal.JournalId' , $id );
        $sql=$this->db->get()->result();
        return $sql;
    }
    
        public function get_report_details($id=''){
        $this->db->select('*,subject.Title as Category,book.Title as book_title')
                ->from('bookauthor')
                ->join('author' , 'author.AuthorId=bookauthor.AuthorId' , 'left')
                ->join( 'book' , 'book.BookId=bookauthor.BookId' , 'left')
                ->join( 'publisher' , 'publisher.PublisherId=book.PublisherId' , 'left')
                ->join('booksubject' , 'booksubject.BookId=book.BookId' , 'left')
                ->join('subject' , 'booksubject.SubjectId=subject.SubjectId' , 'left')                
                ->where('book.BookId' , $id );
        $sql=$this->db->get()->result();
        return $sql;
    }
    
        public function get_thesis_details($id=''){
        $this->db->select('*,subject.Title as Category,book.Title as book_title')
                ->from('bookauthor')
                ->join('author' , 'author.AuthorId=bookauthor.AuthorId' , 'left')
                ->join( 'book' , 'book.BookId=bookauthor.BookId' , 'left')
                ->join( 'publisher' , 'publisher.PublisherId=book.PublisherId' , 'left')
                ->join('booksubject' , 'booksubject.BookId=book.BookId' , 'left')
                ->join('subject' , 'booksubject.SubjectId=subject.SubjectId' , 'left')                
                ->where('book.BookId' , $id );
        $sql=$this->db->get()->result();
        return $sql;
    }
    
    
}