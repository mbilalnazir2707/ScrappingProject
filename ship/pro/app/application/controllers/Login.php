<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Login_mod', 'login');
		//$this->load->model('Register_mod', 'register');
		$this->load->model('Cms_mod', 'cms');
		//$this->load->model('Pharmacy_mod', 'pharmacy');

		//Sets the variable $header_contents to use the slice head (/views/slices/header_contents.php)
		$this->stencil->slice('header_contents');

		//Sets the variable $header_scripts to use the slice head (/views/slices/header_scripts.php)
		$this->stencil->slice('header_scripts');
		
		//Sets the variable $footer_contents to use the slice head (/views/slices/footer_contents.php)
		$this->stencil->slice('footer_contents');
		
		//Sets the variable $footer_scripts to use the slice head (/views/slices/footer_scripts.php)
		$this->stencil->slice('footer_scripts');

		$this->stencil->js('kod_scripts/form_validation.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/formValidation.min.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/bootstrap.min.js');

	}

	public function index(){
		
		// Get page CMS page contents
		$cms_page = $this->cms->get_cms_page('login');
		$data['cms_page'] = $cms_page;
		
		if(filter_string($cms_page['page_title'])){
			
			//set title
			$page_title = $cms_page['meta_title'];
			$this->stencil->title($page_title);	
			
			//Sets the Meta data
			$this->stencil->meta(array(
				'description' => $cms_page['meta_description'],
				'keywords' => $cms_page['meta_keywords']
			));

		}else{
			
			//set title
			$page_title = DEFAULT_TITLE;
			$this->stencil->title($page_title);	
			
			//Sets the Meta data
			$this->stencil->meta(array(
				'description' => DEFAULT_META_DESCRIPTION,
				'keywords' => DEFAULT_META_KEYWORDS
			));

		}//end if(filter_string($homepage_cms['page_title']))

		// Page Heading
		$page_heading = 'Login';
		$data['page_heading'] = $page_heading;
		
		// $this->stencil->css('captcha.css');
		$this->stencil->js('https://www.google.com/recaptcha/api.js');
		
		// Get CMS contents from DB for Login Page
		$data['cms_page'] = $this->cms->get_cms_page('login');

		$this->stencil->layout('site_layout');
		$this->stencil->paint('login/login', $data);

		
	} //end index()
	
	//Function login_process(): Process and authenticate the login form
	public function login_process(){

		// If is a valid request
		if(!$this->input->post('email_address')) redirect(SURL);

		extract($this->input->post());

		// Captcha Validation
		if($this->input->post('g-recaptcha-response') == ''){
		 
			$this->session->set_flashdata($this->input->post());

			// PHP Error
			$this->session->set_flashdata('err_message', 'Please verify Captcha');
			
			redirect(base_url().'login');
		 
		} //end if($this->input->post('g_recaptcha_response') == '')
		
		// PHP Validation
		$this->form_validation->set_rules('email_address', 'Login ID', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == FALSE){
			
			$this->session->set_flashdata($this->input->post());
			
			// PHP Error
			$this->session->set_flashdata('err_message', validation_errors());
			
			redirect(base_url().'login');
			
		} else {
			
			$verify_user_credentials = $this->login->verify_user_credentials($email_address,$password);
			
			// print_this($verify_user_credentials); exit;
			
			if($verify_user_credentials){

				$verify_user_credentials['is_user_logged_in'] = true;
				$this->session->set_userdata($verify_user_credentials);
				/*echo "<pre>";
				print_r($this->session->userdata());
				die;
	
				echo base_url();
				echo "<br>";
				echo site_url();
				die;*/
				redirect(base_url().'dashboard');
					
			}else{

				// PHP Error
				$this->session->set_flashdata('err_message', 'Invalid email or password. Please try again.');
				
				redirect(base_url().'login');
				
			}//end if($verify_account_activation)
			
		}//end if($this->form_validation->run() == FALSE)
		
	}//end public function login_process()
		
} /* End of file */
