<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index(){

		//Distroy All Sessions

		$this->session->sess_destroy();

		$this->session->set_flashdata('ok_message', 'You are successfully logged out.');
		redirect(base_url().'login');

		
	} //end index()

} /* End of file */
