<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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

		$this->load->library('session');

		// left_pane
		// $this->stencil->slice('left_pane');
		$this->stencil->js('kod_scripts/form_validation.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/formValidation.min.js');
		$this->stencil->js('kod_scripts/form_validation/bootstrap_validator/dist/bootstrap.min.js');

	}

	// cruise_lines
 	public function cruise_lines(){
		
		$pages_row = $this->cms->get_front_pages_contents();
		$data['pages_row'] = $pages_row;
		
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
		$this->stencil->paint('home/cruise_lines', $data);

	} // End - public function cruise_lines()
	
	// ships_and_ratings
 	public function ships_and_ratings(){
		
		$pages_row = $this->cms->get_front_pages_contents();
		$data['pages_row'] = $pages_row;
		
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
		$this->stencil->paint('home/ships_and_ratings', $data);

	} // End - public function ships_and_ratings()
	
	// cruise_regions
 	public function cruise_regions(){
		
		$pages_row = $this->cms->get_front_pages_contents();
		$data['pages_row'] = $pages_row;
		
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
		$this->stencil->paint('home/cruise_regions', $data);

	} // End - public function cruise_regions()
	
	// ports
 	public function ports(){
		
		$pages_row = $this->cms->get_front_pages_contents();
		$data['pages_row'] = $pages_row;
		
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
		$this->stencil->paint('home/ports', $data);

	} // End - public function ports()
	
	// cruise_newsletter
 	public function cruise_newsletter(){
		
		$pages_row = $this->cms->get_front_pages_contents();
		$data['pages_row'] = $pages_row;
		
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
		$this->stencil->paint('home/cruise_newsletter', $data);

	} // End - public function cruise_newsletter()
	
	// singles_cruises
 	public function singles_cruises(){
		
		$pages_row = $this->cms->get_front_pages_contents();
		$data['pages_row'] = $pages_row;
		
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
		$this->stencil->paint('home/singles_cruises', $data);

	} // End - public function singles_cruises()
	
	// my_account
 	public function my_account(){
		
		$pages_row = $this->cms->get_front_pages_contents();
		$data['pages_row'] = $pages_row;
		
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
		$this->stencil->paint('home/my_account', $data);

	} // End - public function my_account()
	
	// register_login
 	public function register_login(){
		
		$pages_row = $this->cms->get_front_pages_contents();
		$data['pages_row'] = $pages_row;
		
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
		$this->stencil->paint('home/register_login', $data);

	} // End - public function register_login()

	public function register_process(){
	
		extract($this->input->post());
	
		$ins_arr = array(
			'title' => trim($title),
			'first_name' => trim($first_name),
			'last_name' => trim($last_name),
			'email' => trim($email),
			'password' => trim(md5($password)),
			'country' => trim($country)
		);
		
		$this->db->dbprefix('users');
		$this->db->insert('users', $ins_arr);
		
		$id = $this->db->insert_id();
		
		$this->db->dbprefix('users');
		$this->db->where('id', $id);
		$row = $this->db->get('users')->row_array();
		
		$row['my_id'] = $row['id'];
		
		$this->session->set_userdata($row);
		
		redirect(SURL);
	
	}
	
	public function login_process(){
	
		extract($this->input->post());
	
		$this->db->dbprefix('users');
		$this->db->where('email', $email);
		$this->db->where('password', md5($password));
		$row = $this->db->get('users')->row_array();
		if(isset($row))
		{
			$id = $row['id'];
			$email = $row['email'];
			$title = $row['title'];
			$name = $row['first_name'];
			$this->session->set_userdata('Id',$id);
			$this->session->set_userdata('Email',$email);
			$this->session->set_userdata('Title',$title);
			$this->session->set_userdata('Name',$name);
			redirect('pages/ticker');
	
		}
		else{

		redirect(SURL);
	}
	}
	
	public function logout(){
		//print_this($_SESSION); exit;
		$this->session->sess_destroy();
		
		redirect(SURL);
		
	}

	public function ticker()
	{
		/*if($this->session->userdata('Id') == TRUE )
		{*/
			$pages_row = $this->cms->get_front_pages_contents();
			$data['pages_row'] = $pages_row;
		
			// CMS DATA for Homepage
			$homepage_cms = $this->cms->get_cms_page('homepage');
			$data['homepage_cms'] = $homepage_cms;
		
			if(filter_string($homepage_cms['page_title']))
			{
			
				//set title
				$page_title = $homepage_cms['meta_title'];
				$this->stencil->title($page_title);	
			
				//Sets the Meta data
				$this->stencil->meta(array(
					'description' => $homepage_cms['meta_description'],
					'keywords' => $homepage_cms['meta_keywords']
				));

			}
			else
			{
			
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
			$page_heading = 'Find A Bargain';
			$data['page_heading'] = $page_heading;
		
			$this->stencil->layout('site_layout');
			$this->stencil->paint('home/ticker', $data);
		/*}
		else
		{
			redirect('pages/register_login');
		}		
		*/
	}

	public function tickerPost()
	{
		extract($this->input->post());
		$sm = $SMonth;
		$tm = $TMonth;
		$r = $RegionID;
		$l = $LineID;
		$s = $ShipID;
		$n = $Lenght;
		$d = $DPortID;
		$v = $VPortID;
		$postFields["data"] = array("SMonth" => $sm,
									"TMonth" => $tm,
									"RegionID" => $r,
									"LineID" => $l,
									"ShipID" => $s,
									"Lenght" => $l,
									"DPortID" => $d,
									"VPortID" => $v
								);
		$this->load->view('home/tickerPost',$postFields);

		/*if($this->session->userdata('Id') == TRUE )
		{
			$pages_row = $this->cms->get_front_pages_contents();
			$data['pages_row'] = $pages_row;
		
			// CMS DATA for Homepage
			$homepage_cms = $this->cms->get_cms_page('homepage');
			$data['homepage_cms'] = $homepage_cms;
		
			if(filter_string($homepage_cms['page_title']))
			{
			
				//set title
				$page_title = $homepage_cms['meta_title'];
				$this->stencil->title($page_title);	
			
				//Sets the Meta data
				$this->stencil->meta(array(
					'description' => $homepage_cms['meta_description'],
					'keywords' => $homepage_cms['meta_keywords']
				));

			}
			else
			{
			
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
			$page_heading = 'Find A Bargain';
			$data['page_heading'] = $page_heading;
		
			$this->stencil->layout('site_layout');
			$this->stencil->paint('home/tickerPost', $data);
		}
		else
		{
			redirect('pages/register_login');
		}		
		*/
	}


	public function FastDeals($fastdeals=0)
	{
		$fastDeals = $fastdeals;
		if(!(isset($fastDeals)) || $fastDeals == 0)
		{
			redirect('home/ticker');
		}

		else{
			 $this->load->view('home/FastDeals',$fastDeals);
		}
	}


} // End - CI Class
