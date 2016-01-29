<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author extends CI_Model {
    
    public function add_new_author($authorName){
        $query = "INSERT INTO authors (author_name, created_at, updated_at) VALUES (?, NOW(), NOW())";
        $values = $authorName;
        $this->db->query($query, $values);
        return $this->db->insert_id(); 
    }
    
    public function get_author(){
        return $this->db->query("SELECT * FROM authors")->result_array();
    }
  
    public function get_author_name($author_id){
        $query = "SELECT * FROM authors LEFT JOIN books ON authors.id = books.author_id WHERE authors.id = ?";
        $values = $author_id;
        
        return $this->db->query($query, $values)->row_array();

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */