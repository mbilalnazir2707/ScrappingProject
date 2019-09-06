<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		redirect(SURL.'dashboard');
		exit;

		$this->load->model('Cms_mod', 'cms');
		$this->load->model('Template_mod', 'template');
		
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

		////////// TEXT EDITOR SCRIPTS /////////////
		$this->stencil->js('wysihtml5-0.3.0.min.js');
		$this->stencil->js('bootstrap-wysihtml5.js');
		
		$this->stencil->css('bootstrap-wysihtml5.css');

	}

	// Start - function index() : Main Homepage view
 	public function index(){
		exit('Home');
	} // End - public function index()

} // End - CI Class
