<?php
//Function print_this(&$array): Used for development purpose. Pritning Array or any Object with <pre>.
function print_this(&$arr){
	
	echo '<pre>';
	print_r($arr);
	
}//end print_this(&$array);

function filter_options($name){
	
	$filter_name = str_replace('-',' ',$name);
	$filter_name = ucwords($filter_name);

	return $filter_name;
	
}//end filter_price()


//Function filter_string():  will filter the string from unwanted characters while displaying it on teh screen.
function filter_string(&$string){
	
	$ci =& get_instance();
	
	$filter_txt = stripcslashes(trim($string));
	
	return $filter_txt;
	
}//end filter_string()

//Function filter_string():  will filter the string from unwanted characters while displaying it on teh screen.
function filter_theme_name(&$string){
	
	$ci =& get_instance();
	
	$filter_txt = stripcslashes(trim($string));
	$filter_txt = (strlen($filter_txt) > 20) ? substr($filter_txt,0,20).'...' : $filter_txt ;
	
	return $filter_txt;
	
}//end filter_theme_name()

//WIll retuirn date format in MM/dd/YY, if time is true it will return the time as well
function filter_uk_date($date, $time = false){
	
	if($time)
		return date('d/m/Y G:i:s',strtotime($date));
	else
		return date('d/m/Y',strtotime($date));
		
}//end filter_uk_date($date, $time = false)


//Function filter_price():  Wil change the price formats as per the need.
function filter_price(&$price){
	
	$ci =& get_instance();
	
	$filter_price = number_format($price,2);
	
	return $filter_price;
	
}//end filter_price()

//Function filter_price():  Wil change the price formats as per the need.
function filter_quantity(&$quantity){
	
	$ci =& get_instance();
	
	if(trim($quantity) != ''){
		
		if(fmod(filter_string($quantity),1) == 0)
			$filter_qty = number_format(filter_string($quantity), 0,'.','');
		else
			$filter_qty =  filter_string($quantity); 

	}else{

		$filter_qty =  0;
		
	}//end if(trim($quantity) != '')

	return $filter_qty;
	
}//end filter_price()

//Function filter_percentage():  Wil change the Percentage formats as per the need.
function filter_percentage(&$percentage){
	
	$filter_per = number_format($percentage,0);
	return $filter_per;
	
}//end filter_percentage()

//Function filter_price():  Wil change the price formats as per the need.
function filter_name($name){
	
	$filter_txt = ucfirst(stripcslashes(trim($name)));
	return $filter_txt;
	
}//end filter_price()

//Function random_number_generator($digit): random number generator function
function random_number_generator($digit){
	$randnumber = '';
	$totalChar = $digit;  //length of random number
	$salt = "0123456789abcdefjhijklmnopqrstuvwxyz";  // salt to select chars
	srand((double)microtime()*1000000); // start the random generator
	$password=""; // set the inital variable
	
	for ($i=0;$i<$totalChar;$i++)  // loop and create number
	$randnumber = $randnumber. substr ($salt, rand() % strlen($salt), 1);
	return $randnumber;
	
}// end random_password_generator()


//Function filter_price():  Wil change the price formats as per the need.
function get_global_settings(&$setting_name){
	
	$ci =& get_instance();
	
	$ci->db->dbprefix('global_settings');
	$ci->db->where('setting_name',$setting_name);
	$get_result = $ci->db->get('global_settings');
	//echo $ci->db->last_query();
	$response = $get_result->row_array();

	if($response){
		$response['setting_value'] = ($response['setting_value']) ? filter_string($response['setting_value']) : '' ;
	} // if($response)
	
	return $response;

}//end get_global_settings(&$setting_name)

// function get_all_global_settings()
function get_all_global_settings(){
	
	$ci =& get_instance();
	
	$ci->db->dbprefix('global_settings');
	
	$get_result = $ci->db->get('global_settings');
	
	$settings_arr = $get_result->result_array();

	if($settings_arr){
		$new_settings_arr = array();
		foreach($settings_arr as $setting){

			$new_settings_arr[$setting['setting_name']] = filter_string($setting['setting_value']);

		} // foreach($settings_arr as $setting)
		return $new_settings_arr;
	} else {
		return false;
	} // if($settings_arr)
	
}// function get_all_global_settings()

// Start => function get_cms_page($url_slug)
function get_cms_page($url_slug){

	$ci =& get_instance();
	return $ci->cms->get_cms_page($url_slug);

} // End => function get_cms_page($url_slug)

	// Start - public function get_countries()
function get_countries(){
	
	$ci =& get_instance();
	$ci->db->dbprefix('countries_worldwide');
	return $ci->db->get('countries_worldwide')->result_array();
	
} // End - public function get_countries()

?>