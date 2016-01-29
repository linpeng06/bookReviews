<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review extends CI_Model {
    
    public function addReview($review){
        $query = "INSERT INTO reviews (review, rating, created_at, updated_at, book_id, user_id) VALUES (?, ?, NOW(), NOW(), ?, ?)";

        $values = array($review['review'], $review['rating'], $review['book_id'], $this->session->userdata('id'));
        
        return $this->db->query($query, $values);
    }
    
    public function get_review_info($book_id_returned){
        $query = "select * FROM reviews 
LEFT JOIN users ON reviews.user_id = users.id  
LEFT JOIN books ON reviews.book_id = books.id
WHERE reviews.book_id= ?
";
        $values = $book_id_returned;
        
        return $this->db->query($query, $values)->result_array();
    
    }
    
    public function get_all_review(){
        $query = "select * FROM reviews JOIN users ON reviews.user_id = users.id 
JOIN books ON reviews.book_id = books.id ORDER BY reviews.created_at DESC";
        
        return $this->db->query($query)->result_array();
    }

    public function get_user_info($author_id_returned){
        $query = "select * FROM reviews JOIN users ON reviews.user_id = users.id 
JOIN books ON reviews.book_id = books.id WHERE user_id = ?";
        $values = $author_id_returned;
        return $this->db->query($query, $values)->result_array();
    }
    
    function total_review($userId){
        $query = "SELECT COUNT(review) FROM reviews WHERE user_id = ?";
        $values = $userId;
        return $this->db->query($query, $values)->row_array();
    }
    
    function delete($reviewId){
        $query = "DELETE FROM reviews WHERE id = ?";
        $values = $reviewId;
        $this->db->query($query, $values);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */