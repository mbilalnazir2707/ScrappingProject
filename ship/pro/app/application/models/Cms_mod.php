<?php
class Cms_mod extends CI_Model {
	
	function __construct(){
		 parent::__construct();
    }

	// Start - get_cms_page($url_slug): Return CMS Page by URL
	public function get_cms_page($url_slug){
	
		$this->db->dbprefix('site_pages');
		$this->db->where('url_slug', $url_slug);
		$this->db->where('status', '1');
		$query = $this->db->get('site_pages');
	
		return $query->row_array();
		
	} // End - get_cms_page($url_slug)
	
	
}//end file
?>