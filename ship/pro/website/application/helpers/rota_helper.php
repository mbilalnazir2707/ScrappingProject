<?php
//Just transform teh complete text of holiday types.
function filter_leave_type($leave_code){
	
	$leave_type = '';
	if($leave_code == 'HO')
		$leave_type = 'Holiday'; 
	else if($leave_code == 'SI')
		$leave_type = 'Sickness';
	else if($leave_code == 'MP')
		$leave_type = 'Maternity/ Paternity';
	else if($leave_code == 'PH')
		$leave_type = 'Public Holiday';
	else if($leave_code == 'OT')
		$leave_type = 'Other Leave';
		
	return $leave_type;
	
}//end filter_leave_type($leave_code)

//Function  filter_rota_time(): Returns 19:00:00 to 19:00
function filter_rota_time($time){
	
	return date('H:i',strtotime($time));
	
}//end filter_rota_time($time)

//GET USER TYPES LIST
function get_user_types(){
	
	$ci =& get_instance();
	
	$ci->db->dbprefix('default_roles');
	$ci->db->order_by('id ASC');
	$list_arr = $ci->db->get('default_roles');
	//echo $ci->db->last_query();exit;
	
	return $list_arr->result_array();
	
}//end get_active_country()

function get_default_roles_list($usertype_id = ''){

	$ci =& get_instance();

	$ci->db->dbprefix('default_roles');
	
	if(trim($usertype_id)!= ''){
		$ci->db->where('id',$usertype_id);
		return $ci->db->get('default_roles')->row_array();
	}else
		return $ci->db->get('default_roles')->result_array();
	
} // function cdr_left_nav()

function get_pharmacy_roles_list($usertype_id = '',$pharmacy_id = '', $default_usertype_id = ''){
	
	$ci =& get_instance();

	$ci->db->dbprefix('pharmacy_roles');
	$ci->db->order_by('user_type','ASC');
	
	if($pharmacy_id!= '') {
		$ci->db->where('pharmacy_id',$pharmacy_id);
		//$where = "usertype_id is  NOT NULL";
		//$ci->db->where($where);
	
	} else {
		$ci->db->where('pharmacy_id',$ci->session->my_plp_pharmacy_id);
		
		//$where = "usertype_id is NOT NULL";
		//$ci->db->where($where);
	}
	
	if(trim($usertype_id)!= '')
		$ci->db->where('id',$usertype_id);	
	
	if(trim($default_usertype_id) != ''){

		$ci->db->where('usertype_id',$default_usertype_id);
	}
	
	$get = $ci->db->get('pharmacy_roles');
	//echo $ci->db->last_query();exit;
	
	if(trim($usertype_id) != '' || trim($default_usertype_id) != '')
		return $get->row_array();
	else
		return $get->result_array();

} // function get_usertype_list_pharmacy()

///////////////////////
// ROTA COLORS [25] ///
///////////////////////
function rota_colors(){

	$colors = array('A1CAF1', 'FF4040', '9B870C', '556B2F', 'DE3163', '4A5D23', '7BB661', '964B00', 'E30022', '062A78', 'ED9121', 'FFC911', '36454F', 'F4C2C2', '81613C', '58427C', '534B4F', 'CAE00D', '056608', 'F5C71A', 'FAE7B5', '6F00FF', '3F00FF', 'ACE5EE', '55D035');	

	return $colors;

} // function rota_colors()

// Start => get_user_day_work_status($user_id, $week_date)
function get_user_day_work_status($user_id, $week_date){

	$ci =& get_instance();
	
	$user_day_working_status = $ci->rota->get_user_day_work_status($ci->session->my_plp_pharmacy_id, $user_id, $week_date);
	return $user_day_working_status;

} // End => get_user_day_work_status($user_id, $week_date)

// Start => get_pharmacy_user_roles($user_id='')
function get_pharmacy_user_roles($user_id=''){

	$ci =& get_instance();

	if($user_id != '' || $user_id != 0){

		$ci->db->dbprefix('pharmacy_user_roles');
		
		$ci->db->select('pharmacy_roles.id, pharmacy_roles.user_type, pharmacy_user_roles.pharmacy_role_id as user_role_id');
		$ci->db->from('pharmacy_user_roles');

		$ci->db->join('pharmacy_roles', 'pharmacy_roles.id = pharmacy_user_roles.pharmacy_role_id');

		$ci->db->where('pharmacy_user_roles.pharmacy_id', $ci->session->my_plp_pharmacy_id);
		$ci->db->where('pharmacy_user_roles.is_deleted_for_rota', '0');
		
		$ci->db->where('pharmacy_user_roles.user_id', $user_id);

		$get = $ci->db->get();
		return $get->result_array();
		//echo $ci->db->last_query(); exit;

	} else {

		$ci->db->dbprefix('pharmacy_roles');
		$ci->db->select('pharmacy_roles.*, pharmacy_roles.id as user_role_id');
		$ci->db->where('pharmacy_id', $ci->session->my_plp_pharmacy_id);
		$get = $ci->db->get('pharmacy_roles');
		
		return $get->result_array();

	}//end if($user_id != '' || $user_id != 0)

} // End => get_pharmacy_user_roles($user_id='')

// Start => get_pharmacy_user_roles($user_id='')
function get_pharmacy_user_roles_permission($user_id=''){

	$ci =& get_instance();

	if($user_id != '' || $user_id != 0){

		$ci->db->dbprefix('pharmacy_role_permissions');
		
		$ci->db->select('pharmacy_role_permissions.*');
		$ci->db->from('pharmacy_role_permissions');

		$ci->db->join('pharmacy_roles', 'pharmacy_roles.id = pharmacy_role_permissions.role_id');

		$ci->db->where('pharmacy_role_permissions.pharmacy_id', $ci->session->my_plp_pharmacy_id);
		$ci->db->where('pharmacy_role_permissions.role_id', $user_id);
		
		$get = $ci->db->get();
		return $get->result_array();

	} else {

		$ci->db->dbprefix('pharmacy_roles');
		$ci->db->where('pharmacy_id', $ci->session->my_plp_pharmacy_id);
		$get = $ci->db->get('pharmacy_roles');
		return $get->result_array();

	}//end if($user_id != '' || $user_id != 0)

} // End => get_pharmacy_user_roles($user_id='')

// function user_role_details($shift_id)
function user_role_details($shift_id){

	$ci =& get_instance();

	$ci->db->dbprefix('user_shifts');
	
	$ci->db->select('pharmacy_roles.id, pharmacy_roles.user_type as user_type_name, pharmacy_roles.color_code');
	$ci->db->from('user_shifts');

	$ci->db->join('pharmacy_roles', 'pharmacy_roles.id = user_shifts.shift_role_id');

	$ci->db->where('user_shifts.id', $shift_id);
	
	return $ci->db->get()->row_array();
	/*
	$return = $ci->db->get()->row_array();
	echo $ci->db->last_query();
	exit;
	*/

} // End => Function user_role_details($shift_id)

//Function get_pharmacy_roles_count_date(): This function suppose to return the shift counts of a particular day of all the roles of the pharmacy
function get_pharmacy_roles_count_date($pharmacy_id, $pharmacy_user_roles, $is_in_rota = '', $date = ''){
	
	$ci =& get_instance();
	$role_array = $ci->rota->get_pharmacy_roles_count_date($pharmacy_id, $pharmacy_user_roles, $is_in_rota, $date);

	return $role_array;
	//print_this($role_array); exit;
	
}//end get_pharmacy_role_daily_count($weekdays,$pharmacy_user_roles)

//Function get_rota_users_by_shift_roles(): This function should return the users who works in a rota with the specified role e.g i need all users working as a pharmacist in a rota on a specified date
function get_rota_users_by_shift_roles($pharmacy_id, $role_id, $is_in_rota = '', $is_shift_published = '', $date = ''){
	
	$ci =& get_instance();
	$rota_users_by_shift_roles = $ci->rota->get_rota_users_by_shift_roles($pharmacy_id, $role_id, $is_in_rota, $is_shift_published, $date);
	
	return $rota_users_by_shift_roles;
	
	
}//end get_rota_users_by_shift_roles($pharmacy_id, $role_id, $date)

// Start => function get_all_users_by_role($pharmacy_role_id)
function get_all_users_by_role($pharmacy_role_id){

	$ci =& get_instance();
	
	$ci->db->dbprefix('users');
	$ci->db->where('user_type', $pharmacy_role_id);

	return $ci->db->get('users')->result_array();

} // End => function get_all_users_by_role($pharmacy_role_id)

//Function get_pharmacy_role_shifts_count(): This function will return the count of shifts against the given Role ID of the pharamcy
function get_pharmacy_role_shifts_count($pharmacy_id, $role_id = '', $shift_date = '', $is_open_shift = '0'){
	
	$ci =& get_instance();
	
	$get_shift_role_count = $ci->rota->get_pharmacy_role_shifts_count($pharmacy_id, $role_id, $shift_date, $is_open_shift);
	
	return $get_shift_role_count;
	
}//end get_pharmacy_role_shifts_count($pharmacy_id, $role_id)

function get_pharmacy_rota_users($my_plp_pharmacy_id,$data_date){

	$ci =& get_instance();

	$pharmacy_rota_users = $ci->rota->get_pharmacy_rota_users($my_plp_pharmacy_id,$data_date);
	$pharmacy_rota_users_final = array();

	for($i=0;$i<count($pharmacy_rota_users);$i++){
		
		$is_user_on_leave_this_day = get_user_leave_details($ci->session->my_plp_pharmacy_id, '', $pharmacy_rota_users[$i]['id'], $data_date, 'APPROVED', '', '');
			
        if(!$is_user_on_leave_this_day){
			$pharmacy_rota_users_final[$pharmacy_rota_users[$i]['user_role']][] = $pharmacy_rota_users[$i];
		} // if(!$is_user_on_leave_this_day)
		
	}//end for($i=0;$i<count($pharmacy_rota_users);$i++)

	return $pharmacy_rota_users_final;

}

function get_pharmacy_shift_list($pharmacy_id = '', $user_id = '', $shift_id = '', $shift_date = '', $is_open_shift = ''){
	
	$ci =& get_instance();
	
	$get_shift_result = $ci->rota->get_pharmacy_shift_list($pharmacy_id, $user_id, $shift_id, $shift_date, $is_open_shift);
	
	if($shift_date == '2016-11-23'){
		//echo $ci->db->last_query(); exit;
		//print_this($get_shift_result); 
	}
	return $get_shift_result;
	
}//end get_pharmacy_shift_list($pharmacy_id = '', $shift_id = '', $shift_date = '', $is_open_shift = '')

//Verify if teh user have already applied for the Open shift or not
function verify_if_open_shift_applied($pharmacy_id,$user_id,$shift_id){
	
	$ci =& get_instance();
	
	$verify_if_open_shift_applied = $ci->rota->verify_if_open_shift_applied($pharmacy_id,$user_id,$shift_id);
	return $verify_if_open_shift_applied;
	
}//end verify_if_open_shift_applied($pharmacy_id,$user_id,$shift_id)

function get_pharmacy_open_shifts_by_user_roles($pharmacy_id, $user_id, $shift_date = ''){

	$ci =& get_instance();
	
	$open_shift_available = $ci->rota->get_pharmacy_open_shifts_by_user_roles($pharmacy_id, $user_id, $shift_date);
	return $open_shift_available;
	
}//end get_pharmacy_open_shifts_by_user_roles($pharmacy_id, $user_id, $shift_date = '')

function get_user_leave_by_date($pharmacy_id, $user_id, $leave_date, $status){
	#DO NOT REMOVE THIS FUNCTION 
	
	$ci =& get_instance();
	
	$get_user_leave_by_date = $ci->leaves->get_user_leave_by_date($pharmacy_id, $user_id, $leave_date, $status);
	return $get_user_leave_by_date;
	
}//end get_user_leave_by_date($pharmacy_id, $user_id, $leave_date, $status)

function get_user_leave_details($pharmacy_id, $leave_id='', $user_id='', $leave_date='', $leave_status='', $leave_month='', $offset=''){
	
	$ci =& get_instance();
	
	$get_user_leave_history = $ci->leaves->get_user_leave_details($pharmacy_id, $leave_id, $user_id, $leave_date, $leave_status, $leave_month, $offset);
	return $get_user_leave_history;
	
}//end get_user_leave_details($user_id)

function get_pharmacy_staff_leave_details($pharmacy_id, $user_id, $leave_date){
	
	$ci =& get_instance();
	$get_pharmacy_staff_leave_details = $ci->leaves->get_pharmacy_staff_leave_details($pharmacy_id, $user_id, $leave_date);
	
	return $get_pharmacy_staff_leave_details;
	
}//end get_pharmacy_staff_leave_details($pharmacy_id, $leave_date)

// Function to get the day notes if exist by [ plp_my_pharmacy_id & day(2016-12-31) ]
function get_day_notes($day,$visible_to_employee = ''){

	$ci =& get_instance();
	$notes = $ci->rota->get_pharmacy_rota_note($ci->session->my_plp_pharmacy_id, $day, $visible_to_employee);
	
	return $notes;

} // function get_day_notes($day)

function get_week_shifts($user_id='', $my_plp_pharmacy_id, $from_date, $to_date, $get_open_shifts ='', $is_published = ''){
	
	$ci =& get_instance();
	
	$get_shift_of_week = $ci->rota->get_week_shifts($user_id, $my_plp_pharmacy_id, $from_date, $to_date, $get_open_shifts, $is_published);
	return $get_shift_of_week;
	
}//end get_week_shifts($user_id='', $my_plp_pharmacy_id, $from_date, $to_date, $get_open_shifts ='', $is_published = '')

// Start => get_all_open_shift_requests($my_plp_pharmacy_id, $shift_id)
// Function to get all shift requests
function get_all_open_shift_requests($shift_id){

	$ci =& get_instance();
	return $ci->rota->get_all_open_shift_requests($ci->session->my_plp_pharmacy_id, $shift_id);

} // End => get_all_open_shift_requests($my_plp_pharmacy_id, $shift_id)

?>