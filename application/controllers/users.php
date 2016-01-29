<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}
    
		
    public function register()
	{
//        var_dump($this->input->post());
//        die();
        $this->user->register($this->input->post());
        $this->login();
    }

	public function login(){

//        var_dump($this->input->post());
//        die();
       
        if($this->user->login($this->input->post()))
		{
            // user is found
            redirect('/books');

		}
		else{
            //user is not found
			redirect('/');
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */