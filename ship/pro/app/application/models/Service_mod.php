<?php
class Service_mod extends CI_Model {
	
	function __construct(){
		 parent::__construct();
    }

	//Function get_front_pages_contents()
	public function get_front_pages_contents(){

		$this->db->dbprefix('front_pages_contents');
		
		$this->db->where('id',1);
		
		return $this->db->get('front_pages_contents')->row_array();
		
	}//end get_front_pages_contents()
	
	// update_front_pages_contents($this->input->post())
	
	public function update_front_pages_contents($db_column, $value){
	
		$upd_arr = array(
		
			$db_column => $this->db->escape_str(trim($value)),
			'status' => $this->db->escape_str(trim('1'))
		);
		
		//update  data into the database. 
		$this->db->dbprefix('front_pages_contents');
		$this->db->where('id','1');
		return $this->db->update('front_pages_contents', $upd_arr);
	
	} // update
	
	}//end file
?>