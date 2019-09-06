<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// Verify if the user is loggedin
		if(!$this->session->userdata())
			redirect(SURL.'login');
		// if(!$this->session->admin_id)
		
		$this->load->model('Service_mod','service');
		$this->load->model('Cms_mod','cms');
	
		$this->load->library('BreadcrumbComponent');
		
		//Sets the variable $header_contents to use the slice head (/views/slices/header_contents.php)
		$this->stencil->slice('header_contents');

		//Sets the variable $header_scripts to use the slice head (/views/slices/header_scripts.php)
		$this->stencil->slice('header_scripts');
		
		//Sets the variable $footer_contents to use the slice head (/views/slices/footer_contents.php)
		$this->stencil->slice('footer_contents');
		
		//Sets the variable $footer_scripts_modal to use the slice head (/views/slices/footer_scripts_modal.php)
		$this->stencil->slice('footer_scripts_modal');
		
		//Sets the variable $footer_scripts to use the slice head (/views/slices/footer_scripts.php)
		$this->stencil->slice('footer_scripts');

		// left_pane
		// $this->stencil->slice('left_pane');
		
		// Layout
		$this->stencil->layout('dashboard_layout');

		// Form Validation	
		$this->stencil->js('kod_scripts/form_validation.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/formValidation.min.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/bootstrap.min.js');

		// $this->stencil->js('jquery.fancybox.js');

		////////// TEXT EDITOR SCRIPTS /////////////
		// $this->stencil->js('wysihtml5-0.3.0.min.js');
		// $this->stencil->js('bootstrap-wysihtml5.js');
		
		// $this->stencil->css('bootstrap-wysihtml5.css');

	} // public function __construct()

	public function index(){
		
		redirect(SURL.'dashboard');
		
	} // end index()

	public function cruise_lines(){

		// If Post is set then update into the database
		if($this->input->post()){

			extract($this->input->post());
		
			$success = $this->service->update_front_pages_contents('cruise_lines', $cruise_lines);
		
			if($success){
			
				$this->session->set_flashdata('ok_message', 'Cruise lines page successfully updated.');
				redirect(SURL.'pages/cruise-lines');

			}else{

				$this->session->set_flashdata('err_message', 'Something went wrong while updating the contents. Please try again or contact site adminstrator for any queries.');
				redirect(SURL.'pages/cruise-lines');
			
			}//end if($success)

		} // post

		// Get data from the database
		$get_front_pages_contents = $this->service->get_front_pages_contents();
		$data['get_front_pages_contents'] = $get_front_pages_contents;
		
		//set title
		$page_title = DEFAULT_TITLE;
		$this->stencil->title($page_title);	
		
		//Sets the Meta data
		$this->stencil->meta(array(
			'description' => DEFAULT_META_DESCRIPTION,
			'keywords' => DEFAULT_META_KEYWORDS,
			'meta_title' => DEFAULT_TITLE
		));
		
		
		$page_heading = 'Cruise Lines';
		$data['page_heading'] = $page_heading;
		
		// Bread crumb
		$this->breadcrumbcomponent->add('<i class="ace-icon fa fa-home home-icon"></i> Dashboard ', SURL.'dashboard');
		$this->breadcrumbcomponent->add($page_heading, base_url());	
		$data['breadcrum_data'] = $this->breadcrumbcomponent->output();

		// Set Header Fa-icon
		$data['header_icon'] = '<i class="fa fa-cog"></i>';

		$this->stencil->paint('front_pages/cruise_lines.php',$data);
		
	} // End cruise_lines()
	
	public function ships_and_ratings(){

		// If Post is set then update into the database
		if($this->input->post()){

			extract($this->input->post());
		
			$success = $this->service->update_front_pages_contents('ships_and_ratings', $ships_and_ratings);
		
			if($success){
			
				$this->session->set_flashdata('ok_message', 'Ships and ratings page successfully updated.');
				redirect(SURL.'pages/ships-and-ratings');

			}else{

				$this->session->set_flashdata('err_message', 'Something went wrong while updating the contents. Please try again or contact site adminstrator for any queries.');
				redirect(SURL.'pages/ships-and-ratings');
			
			}//end if($success)

		} // post

		// Get data from the database
		$get_front_pages_contents = $this->service->get_front_pages_contents();
		$data['get_front_pages_contents'] = $get_front_pages_contents;
		
		//set title
		$page_title = DEFAULT_TITLE;
		$this->stencil->title($page_title);	
		
		//Sets the Meta data
		$this->stencil->meta(array(
			'description' => DEFAULT_META_DESCRIPTION,
			'keywords' => DEFAULT_META_KEYWORDS,
			'meta_title' => DEFAULT_TITLE
		));
		
		
		$page_heading = 'Ships and ratings';
		$data['page_heading'] = $page_heading;
		
		// Bread crumb
		$this->breadcrumbcomponent->add('<i class="ace-icon fa fa-home home-icon"></i> Dashboard ', SURL.'dashboard');
		$this->breadcrumbcomponent->add($page_heading, base_url());	
		$data['breadcrum_data'] = $this->breadcrumbcomponent->output();

		// Set Header Fa-icon
		$data['header_icon'] = '<i class="fa fa-cog"></i>';

		$this->stencil->paint('front_pages/ships_and_ratings.php',$data);
		
	} // End ships_and_ratings()
	
	public function cruise_regions(){

		// If Post is set then update into the database
		if($this->input->post()){

			extract($this->input->post());
		
			$success = $this->service->update_front_pages_contents('cruise_regions', $cruise_regions);
		
			if($success){
			
				$this->session->set_flashdata('ok_message', 'Cruise regions page successfully updated.');
				redirect(SURL.'pages/cruise-regions');

			}else{

				$this->session->set_flashdata('err_message', 'Something went wrong while updating the contents. Please try again or contact site adminstrator for any queries.');
				redirect(SURL.'pages/cruise-regions');
			
			}//end if($success)

		} // post

		// Get data from the database
		$get_front_pages_contents = $this->service->get_front_pages_contents();
		$data['get_front_pages_contents'] = $get_front_pages_contents;
		
		//set title
		$page_title = DEFAULT_TITLE;
		$this->stencil->title($page_title);	
		
		//Sets the Meta data
		$this->stencil->meta(array(
			'description' => DEFAULT_META_DESCRIPTION,
			'keywords' => DEFAULT_META_KEYWORDS,
			'meta_title' => DEFAULT_TITLE
		));
		
		
		$page_heading = 'Cruise regions';
		$data['page_heading'] = $page_heading;
		
		// Bread crumb
		$this->breadcrumbcomponent->add('<i class="ace-icon fa fa-home home-icon"></i> Dashboard ', SURL.'dashboard');
		$this->breadcrumbcomponent->add($page_heading, base_url());	
		$data['breadcrum_data'] = $this->breadcrumbcomponent->output();

		// Set Header Fa-icon
		$data['header_icon'] = '<i class="fa fa-cog"></i>';

		$this->stencil->paint('front_pages/cruise_regions.php',$data);
		
	} // End cruise_regions()
	
	public function ports(){

		// If Post is set then update into the database
		if($this->input->post()){

			extract($this->input->post());
		
			$success = $this->service->update_front_pages_contents('ports', $ports);
		
			if($success){
			
				$this->session->set_flashdata('ok_message', 'Ports page successfully updated.');
				redirect(SURL.'pages/ports');

			}else{

				$this->session->set_flashdata('err_message', 'Something went wrong while updating the contents. Please try again or contact site adminstrator for any queries.');
				redirect(SURL.'pages/ports');
			
			}//end if($success)

		} // post

		// Get data from the database
		$get_front_pages_contents = $this->service->get_front_pages_contents();
		$data['get_front_pages_contents'] = $get_front_pages_contents;
		
		//set title
		$page_title = DEFAULT_TITLE;
		$this->stencil->title($page_title);	
		
		//Sets the Meta data
		$this->stencil->meta(array(
			'description' => DEFAULT_META_DESCRIPTION,
			'keywords' => DEFAULT_META_KEYWORDS,
			'meta_title' => DEFAULT_TITLE
		));
		
		
		$page_heading = 'Ports';
		$data['page_heading'] = $page_heading;
		
		// Bread crumb
		$this->breadcrumbcomponent->add('<i class="ace-icon fa fa-home home-icon"></i> Dashboard ', SURL.'dashboard');
		$this->breadcrumbcomponent->add($page_heading, base_url());	
		$data['breadcrum_data'] = $this->breadcrumbcomponent->output();

		// Set Header Fa-icon
		$data['header_icon'] = '<i class="fa fa-cog"></i>';

		$this->stencil->paint('front_pages/ports.php',$data);
		
	} // End cruise_regions()
	
	public function cruise_newsletter(){

		// If Post is set then update into the database
		if($this->input->post()){

			extract($this->input->post());
		
			$success = $this->service->update_front_pages_contents('cruise_newsletter', $cruise_newsletter);
		
			if($success){
			
				$this->session->set_flashdata('ok_message', 'Cruise newsletter successfully updated.');
				redirect(SURL.'pages/cruise-newsletter');

			}else{

				$this->session->set_flashdata('err_message', 'Something went wrong while updating the contents. Please try again or contact site adminstrator for any queries.');
				redirect(SURL.'pages/cruise-newsletter');
			
			}//end if($success)

		} // post

		// Get data from the database
		$get_front_pages_contents = $this->service->get_front_pages_contents();
		$data['get_front_pages_contents'] = $get_front_pages_contents;
		
		//set title
		$page_title = DEFAULT_TITLE;
		$this->stencil->title($page_title);	
		
		//Sets the Meta data
		$this->stencil->meta(array(
			'description' => DEFAULT_META_DESCRIPTION,
			'keywords' => DEFAULT_META_KEYWORDS,
			'meta_title' => DEFAULT_TITLE
		));
		
		
		$page_heading = 'Cruise newsletter';
		$data['page_heading'] = $page_heading;
		
		// Bread crumb
		$this->breadcrumbcomponent->add('<i class="ace-icon fa fa-home home-icon"></i> Dashboard ', SURL.'dashboard');
		$this->breadcrumbcomponent->add($page_heading, base_url());	
		$data['breadcrum_data'] = $this->breadcrumbcomponent->output();

		// Set Header Fa-icon
		$data['header_icon'] = '<i class="fa fa-cog"></i>';

		$this->stencil->paint('front_pages/cruise_newsletter.php',$data);
		
	} // End cruise_regions()
	
	public function singles_cruises(){

		// If Post is set then update into the database
		if($this->input->post()){

			extract($this->input->post());
		
			$success = $this->service->update_front_pages_contents('singles_cruises', $singles_cruises);
		
			if($success){
			
				$this->session->set_flashdata('ok_message', 'Singles cruises successfully updated.');
				redirect(SURL.'pages/singles-cruises');

			}else{

				$this->session->set_flashdata('err_message', 'Something went wrong while updating the contents. Please try again or contact site adminstrator for any queries.');
				redirect(SURL.'pages/singles-cruises');
			
			}//end if($success)

		} // post

		// Get data from the database
		$get_front_pages_contents = $this->service->get_front_pages_contents();
		$data['get_front_pages_contents'] = $get_front_pages_contents;
		
		//set title
		$page_title = DEFAULT_TITLE;
		$this->stencil->title($page_title);	
		
		//Sets the Meta data
		$this->stencil->meta(array(
			'description' => DEFAULT_META_DESCRIPTION,
			'keywords' => DEFAULT_META_KEYWORDS,
			'meta_title' => DEFAULT_TITLE
		));
		
		
		$page_heading = 'Singles cruises';
		$data['page_heading'] = $page_heading;
		
		// Bread crumb
		$this->breadcrumbcomponent->add('<i class="ace-icon fa fa-home home-icon"></i> Dashboard ', SURL.'dashboard');
		$this->breadcrumbcomponent->add($page_heading, base_url());	
		$data['breadcrum_data'] = $this->breadcrumbcomponent->output();

		// Set Header Fa-icon
		$data['header_icon'] = '<i class="fa fa-cog"></i>';

		$this->stencil->paint('front_pages/singles_cruises.php',$data);
		
	} // End singles_cruises()
	
	public function my_account(){

		// If Post is set then update into the database
		if($this->input->post()){

			extract($this->input->post());
		
			$success = $this->service->update_front_pages_contents('my_account', $my_account);
		
			if($success){
			
				$this->session->set_flashdata('ok_message', 'My account successfully updated.');
				redirect(SURL.'pages/my-account');

			}else{

				$this->session->set_flashdata('err_message', 'Something went wrong while updating the contents. Please try again or contact site adminstrator for any queries.');
				redirect(SURL.'pages/my-account');
			
			}//end if($success)

		} // post

		// Get data from the database
		$get_front_pages_contents = $this->service->get_front_pages_contents();
		$data['get_front_pages_contents'] = $get_front_pages_contents;
		
		//set title
		$page_title = DEFAULT_TITLE;
		$this->stencil->title($page_title);	
		
		//Sets the Meta data
		$this->stencil->meta(array(
			'description' => DEFAULT_META_DESCRIPTION,
			'keywords' => DEFAULT_META_KEYWORDS,
			'meta_title' => DEFAULT_TITLE
		));
		
		
		$page_heading = 'My Account';
		$data['page_heading'] = $page_heading;
		
		// Bread crumb
		$this->breadcrumbcomponent->add('<i class="ace-icon fa fa-home home-icon"></i> Dashboard ', SURL.'dashboard');
		$this->breadcrumbcomponent->add($page_heading, base_url());	
		$data['breadcrum_data'] = $this->breadcrumbcomponent->output();

		// Set Header Fa-icon
		$data['header_icon'] = '<i class="fa fa-cog"></i>';

		$this->stencil->paint('front_pages/my_account.php',$data);
		
	} // End singles_cruises()
	
	public function users_listing(){
	
		$this->db->dbprefix('users');
		$data['users'] = $this->db->get('users')->result_array();
		
		// Get data from the database
		$get_front_pages_contents = $this->service->get_front_pages_contents();
		$data['get_front_pages_contents'] = $get_front_pages_contents;
		
		//set title
		$page_title = DEFAULT_TITLE;
		$this->stencil->title($page_title);	
		
		//Sets the Meta data
		$this->stencil->meta(array(
			'description' => DEFAULT_META_DESCRIPTION,
			'keywords' => DEFAULT_META_KEYWORDS,
			'meta_title' => DEFAULT_TITLE
		));
		
		
		$page_heading = 'Cruise Lines';
		$data['page_heading'] = $page_heading;
		
		// Bread crumb
		$this->breadcrumbcomponent->add('<i class="ace-icon fa fa-home home-icon"></i> Dashboard ', SURL.'dashboard');
		$this->breadcrumbcomponent->add($page_heading, base_url());	
		$data['breadcrum_data'] = $this->breadcrumbcomponent->output();

		// Set Header Fa-icon
		$data['header_icon'] = '<i class="fa fa-cog"></i>';

		$this->stencil->paint('dashboard/users_listing.php',$data);
	
	}
	
} // End => Ci => Class Users
