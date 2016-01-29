<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reviews extends CI_Controller {

  	public function delete($reviewId)
	{
        $this->review->delete($reviewId);
        redirect("/books");
    }
    
    public function one_review($bookId){
        redirect("/books/addReview2/".$bookId);

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */