<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

 public function __construct(){
		parent::__construct();
		//$this->load->helper('url');
		$this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('cookie');
		$this->load->helper('form');
		$this->load->library('form_validation');
	} 
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
    }
    
	public function validation_login()
	{
		$this->form_validation->set_rules('email','Enter Email id','required');
		$this->form_validation->set_rules('password','Enter Password','required');
		if($this->form_validation->run())
		{
			$this->load->model('login_modal');
			 $data = array(
			'name' => md5($this->input->POST('email')),
			'password' => md5($this->input->POST('password'))
			);
			$run = $this->login_modal->login_entry($data);
			if($run)
			{
				 $this->session->set_flashdata('item','Insert data successfully'); 
				redirect(base_url('dashboard'));
				
			}
			else{
				$this->session->set_flashdata('incorrect','Incorrect username or password.'); 
				redirect(base_url('login'));
			}
		}
		else
		{
			 $this->session->set_flashdata('incorrect','Enter email and password'); 
			$this->load->view('login');
		}
	}
	
    public function logout()
    {
		session_destroy();
		redirect(base_url());
    }

}