<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
    
//---------------------------------------Registration------------------------------------//

	public function register($post){
//		 var_dump($post);
//		 die();
//---------------------------------------VALIDATIONS------------------------------------//
		//firstName
		$this->form_validation->set_rules("first_name", "First Name", "required|min_length[2]");
		//lastName
		$this->form_validation->set_rules("last_name", "Last Name", "required|min_length[2]");
		//alias
        $this->form_validation->set_rules("alias", "Alias", "trim|required|alpha");
        //email
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email]");
		//passWord
		$this->form_validation->set_rules("password", "password", "required|min_length[8]");
		//confirmPassword
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "required|matches[password]");
		//END VALIDATIONS
		//---------------------------------------RUN VALIDATIONS------------------------------------//
		if($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata("register_errors", validation_errors());
			redirect('/');
		}
		else {
			//ADD USERS
			$query = "INSERT INTO users (first_name, last_name, alias, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
			$values = array($post["first_name"], $post["last_name"], $post["alias"],$post["email"], $post["password"]);
			$this->db->query($query, $values);
		}
        
        
    }//end of Register Method
    

//---------------------------------------LOGIN------------------------------------//

    public function login($post){
//		 var_dump($post);
//		 die();
        $this->form_validation->set_rules("email", "email", "trim|required");
		$this->form_validation->set_rules("password", "password", "trim|required");

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("errors", validation_errors());
		}
		else 
		{
			$query = "SELECT * FROM users WHERE email = ? AND password = ?";
			$values = array($post["email"], $post["password"]);
			$user = $this->db->query($query, $values)->row_array();
			// var_dump($user);
			// die();
			if(!empty($user)){
				//user found 

				$this->session->set_userdata("id", $user["id"]); //setting the key as id
                
                $this->session->set_userdata("first_name", $user["first_name"]);
                
				return true;
	
			}
			else {
				//no user found
				$this->session->set_flashdata("login_errors", "Invalid credentials. Please try again.");
				return false;

			}//end of if-else for not empty
		}
   
    }//end of Login Method
    
    
}//end of User Model
