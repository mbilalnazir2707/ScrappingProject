<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// echo $invoice_no = 'U'.$user_id.rand(11111, 99999); exit;

		if(!$this->session->userdata()){
			redirect(SURL.'login');
		} // if(!$this->session->is_user_logged_in)

		$this->load->model('Common_mod', 'common');
		$this->load->model('Cms_mod', 'cms');
		//$this->load->model('Pharmacy_mod', 'pharmacy');
		
		// $this->load->model('Users_mod', 'user');
		

		//Sets the variable $header_contents to use the slice head (/views/slices/header_contents.php)
		$this->stencil->slice('header_contents');

		//Sets the variable $header_scripts to use the slice head (/views/slices/header_scripts.php)
		$this->stencil->slice('header_scripts');
		
		//Sets the variable $footer_contents to use the slice head (/views/slices/footer_contents.php)
		$this->stencil->slice('footer_contents');
		
		//Sets the variable $footer_scripts to use the slice head (/views/slices/footer_scripts.php)
		$this->stencil->slice('footer_scripts');

		/*$this->stencil->js('kod_scripts/form_validation.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/formValidation.min.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/bootstrap.min.js');*/

		////////// TEXT EDITOR SCRIPTS /////////////
		// $this->stencil->js('wysihtml5-0.3.0.min.js');
		// $this->stencil->js('bootstrap-wysihtml5.js');
		
		// $this->stencil->css('bootstrap-wysihtml5.css');

	}

	// Start => public function index()
	public function index(){
		
		// Get page CMS page contents
		$cms_page = $this->cms->get_cms_page('dashboard');
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
		$page_heading = 'Dashboard';
		$data['page_heading'] = $page_heading;

		//Fancybox files
		$this->stencil->css('jquery.fancybox.css');
        $this->stencil->js('jquery.fancybox.js');
		
		/*
		// Get all products available for sale
		$products = $this->product->get_product_details();
		$data['products'] = $products;

		$pharmacy_details = $this->pharmacy->get_pharmacy_details($this->session->tp_id,'', $this->session->pf_branch_id);
		$data['pharmacy_details'] = $pharmacy_details;
		*/

        $this->stencil->css(ASSETS.'plugins/morris.js/morris.css');

        $this->stencil->js(ASSETS.'plugins/morris.js/morris.min.js');
        $this->stencil->js(ASSETS.'plugins/raphael/raphael-min.js');
        $this->stencil->js(ASSETS.'pages/morris.init.js');

		$this->stencil->layout('dashboard_layout');
		$this->stencil->paint('dashboard/new_dashboard_test_page',$data);

	} // End => public function index()
	
	

} // End - CI Class
