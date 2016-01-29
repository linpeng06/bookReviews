<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

		
    public function index()
	{   
        $topReviews= $this->review->get_all_review();
        
        $otherBooks = $this->book->get_other_books();
//        var_dump($otherBooks);
//        die();
//        
        $this->load->view("books", array(
        "topReviews" => $topReviews,
        "otherBooks" => $otherBooks            
        ));
    }
    
    
    public function logout(){
		$this->session->sess_destroy();
		redirect("/");
	}

    //display the add book and review page
    public function add(){
        $displayAuthors = $this->author->get_author();
        $this->load->view("addReview",array("displayAuthors" => $displayAuthors));

    }

   public function add_book_review(){
       
//       var_dump($this->input->post());
//       die();
       if($this->input->post('author_list') == NULL && $this->input->post('newAuthor') == NULL){
           $this->session->set_flashdata("author_error", "Error: Choose or insert an author.");
           
           if($this->input->post('review') == NULL){
            $this->session->set_flashdata("review_error", "Error: Insert your review.");
            redirect("/books/add");
           }
           
           redirect("/books/add");
       }
       
       else {
           
           if($this->input->post('author_list') != NULL){
               
                $author_id_returned = $this->input->post('author_list');
//                if($this->input->post('review') == NULL){
//                $this->session->set_flashdata("review_error", "Error: Insert your review.");
//                redirect("/books/add");
               

           }
           else {
               $authorName = $this->input->post('newAuthor');
               $author_id_returned = $this->author->add_new_author($authorName); 
           }
            
           $book = array();
           $book = array(
                'book_title' => $this->input->post('book_title'),
                'author_id' => $author_id_returned
           );
//      
//           var_dump($book['author_id']);
//           die();
           
           //loaded the model and add the book
           $book_id_returned = $this->book->addBook($book);
      
           //get most added recent book information
           $latest = $this->book->get_latest_book($book_id_returned);
               
           $review = array();
           $review = array(
                'review' => $this->input->post('book_review'),
                'rating' => $this->input->post('rating'),
                'book_id' => $book_id_returned,
                'user_id' =>  $this->session->userdata('id')
           );
           
           //save everything in the session
           
           $this->session->set_userdata("review", $review);
           $this->session->set_userdata("latest", $latest);
           
           $this->review->addReview($review);
           redirect("/books/addReview2/".$review['book_id']);
       }
       
   }//end of addBook method
    
    public function addReview2($book_id_returned){
        //book information
        $bookId = $this->book->get_latest_book($book_id_returned);
   
        $author_id = $bookId['author_id'];
        
        //author information
        $author_name = $this->author->get_author_name($author_id);
        
        //review information
        $review = $this->review->get_review_info($book_id_returned);

        $this->load->view("addReview2", array(
            "bookInfo" => $bookId,
            "author_name" => $author_name,
            "reviewInfo" => $review
           ));
    }

    public function add_quick_review($book_id_returned){ 
    
        $review = array();
        $review = array(
            'review' => $this->input->post('add_review'),
            'rating' => $this->input->post('rating'),
            'book_id' =>  $book_id_returned,
            'user_id' =>  $this->session->userdata('id') 
        );
        
        $this->review->addReview($review);
       
        redirect("/books/addReview2/".$review['book_id']);
    }
    
    
    
    public function user_review($author_id_returned){
        
        $userInfo = $this->review->get_user_info($author_id_returned);
        $userId = $userInfo[0]['user_id'];
    
        $count = $this->review->total_review($userId);
        
        $this->load->view("userReview", array(
            "userInfo" => $userInfo,
            "count" => $count
        ));
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */