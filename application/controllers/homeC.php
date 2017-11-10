<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeC extends CI_Controller {

	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');

		$this->load->library('image_lib');
		//$this->load->helper(array('captcha'));
		$this->load->helper('captcha');
		
	}
	public function index()
	{
		$this->load->view('homeV');
	}

	public function about()
	{
		$this->load->view('aboutV');	
	}

	public function contact()
	{
		$this->load->view('contactV');
	}

	public function order()
	{
		$this->load->view('orderV');	
	}

	public function signin()
	{
		$capdata = array(
			'img_path' => './captcha/',
			'img_url'	=> base_url() . 'captcha',
			'word'=>'',
			'word_lenght'=>3,
			'img_width'	=> '150',
			'img_height' => 30,
			'font_size'	=> '24',
			'expiration' => 3600 
			);
		$cap = create_captcha($capdata);
		$data['captcha'] = $cap['image']; 
		$_SESSION['captchaWord'] = $cap['word'];
		//echo 'session word=' . $_SESSION['captchaWord'];
		$data['msg'] = '<h1>welcome to sign in page.</h1>';
		$this->load->view('signinForm', $data);
	}

	public function signin_validation()
	{
			// set variables from the form
			$username = $this->input->post('username'); //echo $username; echo '<br>';
			$password = $this->input->post('password'); //echo $password; echo '<br>';
			$user_id = $this->user_model->get_user_id($username, $password); 
			$captcha = $this->input->post('captcha'); 
			//echo 'captcha='.$captcha . '<br>';
			//echo 'captchaWord=' . $_SESSION['captchaWord'] . '<br>';

			if( ($user_id > 0) && (strcasecmp($captcha, $_SESSION['captchaWord'])==0) )
			 {
				// set session user datas
				$_SESSION['user_id']      = (int)$user_id;
				$_SESSION['username']     = (string)$username;
				$_SESSION['logged_in']    = (bool)true;
				
				// user login ok
				$this->load->view('signinOK_v',$_SESSION);	
			} else {
				$data['captcha'] = $_SESSION['captcha'];
				// login failed
				$this->session->set_flashdata('error', 'Invalid Username or Password or captche is wrong');  
				// send error to the view
				$this->load->view('signinForm',$data);				
			}
	}
  
	public function signup()
	{	
		$capdata = array(
			'img_path' => './captcha/',
			'img_url'	=> base_url() . 'captcha',
			'word'=>'',
			'word_lenght'=>3,
			'img_width'	=> '150',
			'img_height' => 30,
			'font_size'	=> '24',
			'expiration' => 3600 
			);
		$cap = create_captcha($capdata);
		$_SESSION['captcha'] = $cap['image'];
		$data['captcha'] = $cap['image']; 
		$_SESSION['captchaWord'] = $cap['word'];

		$data['msg'] = "";

//		$data = null;
		$this->load->view('signupForm', $data);
	}

	public function signup_validation()
	{
		// create the data object
		//$data = new stdClass();

		$this->load->helper('form');
		$this->load->library('form_validation');


			
			// set variables from the form
			$username = $this->input->post('username'); //echo $username; echo '<br>';
			$email    = $this->input->post('email');  //echo $email; echo '<br>';
			$password = $this->input->post('password');  //echo $password; echo '<br>';

			$captcha = $this->input->post('captcha'); 
			//echo 'captcha='.$captcha . '<br>';
			//echo 'captchaWord=' . $_SESSION['captchaWord'] . '<br>';

			$this->load->model('user_model');	
			if((strcasecmp($captcha, $_SESSION['captchaWord'])==0)){
			if ($this->user_model->create_user($username, $email, $password)) {
							//echo "aaaaOK";
							$data = new stdClass();
							$this->load->view('signupOK', $data);
						}
			} else {

//				$data->error = 'There was a problem creating your new account. Please try again.';
//				$data['captcha'] = $_SESSION['captcha'];
				// send error to the view

				$data['captcha'] = $_SESSION['captcha'];
				// login failed
				$this->session->set_flashdata('error', 'Invalid Username or Password or captche is wrong');
	         	//$data['captcha'] = $_SESSION['captcha'];
	            //$data['msg']='<h1>try again,captche is wrong</h1>';
				$this->load->view('signupForm',$data);	
				
				// user creation failed, this should never happen
				//$data->error = 'There was a problem creating your new account. Please try again.';
				//$this->load->view('signup', $data);
			}
	}
	public function checkCaptcha()
     {
        
         $captcha=$this->session->userdata['captchaWord'];
         //compare saved captcha word with submitted word
         if(strcasecmp($captcha,$_POST['captcha'])==0)
         {
            $msg='Well done ,captche is right';
         }  
         else
         {
            $msg='try again,captche is wrong';
         } 
     }


}
