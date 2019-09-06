<?php
class Common_mod extends CI_Model {
	
	function __construct(){
		 parent::__construct();
    }

	//Function random_number_generator($digit): random number generator function
	public function random_number_generator($digit){
		$randnumber = '';
		$totalChar = $digit;  //length of random number
		$salt = "0123456789abcdefjhijklmnopqrstuvwxyz";  // salt to select chars
		srand((double)microtime()*1000000); // start the random generator
		$password=""; // set the inital variable
		
		for ($i=0;$i<$totalChar;$i++)  // loop and create number
		$randnumber = $randnumber. substr ($salt, rand() % strlen($salt), 1);
		return $randnumber;
		
	}// end random_password_generator()
}//end file

?>