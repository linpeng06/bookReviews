<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Model {
    
    public function addBook($book){ //adds a new book
        $query = "INSERT INTO books (book_title, created_at, updated_at, author_id) VALUES (?, NOW(), NOW(), ?)";
        $values = array($book['book_title'], $book['author_id']);
        
        $this->db->query($query, $values);
        
        return $this->db->insert_id();
    }
    
     public function get_latest_book($book_id_returned){
        $query = "SELECT * FROM books WHERE id = ?";
        
        return $this->db->query($query, $book_id_returned)->row_array();
    }
    
    public function get_other_books(){
        $query = "SELECT * FROM books ORDER BY created_at DESC";
        return $this->db->query($query)->result_array();
    }
      
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */