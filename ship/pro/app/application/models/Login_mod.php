<?php
class Login_mod extends CI_Model {
	
	function __construct(){
		 parent::__construct();
    }

	//Validate user credrnetials if match in the DB to login
	public function verify_user_credentials($email_address,$password){
		
		$this->db->dbprefix('admin');
		
		$this->db->select('admin.*,admin.id as tp_id');

		$this->db->where('email_address', strip_quotes($email_address));
		$this->db->where('password', strip_quotes($password));

		$get = $this->db->get('admin');
		
		return $get->row_array();
		
	}//end verify_pharmacy_credentials($email_address,$password)

}//end file
?>