<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Cms_mod', 'cms');
		//$this->load->model('Template_mod', 'template');
		
		//Sets the variable $header_contents to use the slice head (/views/slices/header_contents.php)
		$this->stencil->slice('header_contents');

		//Sets the variable $header_scripts to use the slice head (/views/slices/header_scripts.php)
		$this->stencil->slice('header_scripts');
		
		//Sets the variable $footer_contents to use the slice head (/views/slices/footer_contents.php)
		$this->stencil->slice('footer_contents');
		
		//Sets the variable $footer_scripts to use the slice head (/views/slices/footer_scripts.php)
		$this->stencil->slice('footer_scripts');

		// left_pane
		// $this->stencil->slice('left_pane');
		$this->stencil->js('kod_scripts/form_validation.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/formValidation.min.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/bootstrap.min.js');

	}

	// Start - function index() : Main Homepage view
 	public function index(){
		
		// CMS DATA for Homepage
		$homepage_cms = $this->cms->get_cms_page('homepage');
		$data['homepage_cms'] = $homepage_cms;
		
		if(filter_string($homepage_cms['page_title'])){
			
			//set title
			$page_title = $homepage_cms['meta_title'];
			$this->stencil->title($page_title);	
			
			//Sets the Meta data
			$this->stencil->meta(array(
				'description' => $homepage_cms['meta_description'],
				'keywords' => $homepage_cms['meta_keywords']
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

		// $this->stencil->css('jquery.fancybox.css');
        // $this->stencil->js('jquery.fancybox.js');

		// Page Heading
		$page_heading = 'Cruceros On Sale';
		$data['page_heading'] = $page_heading;
		
		$this->stencil->layout('site_layout');
		$this->stencil->paint('home/home', $data);

	} // End - public function index()

} // End - CI Class
