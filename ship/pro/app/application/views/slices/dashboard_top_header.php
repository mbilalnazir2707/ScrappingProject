<!-- User Setting -->
<?php 
	$uri_string = uri_string();
	$uri_string_arr = explode('/',$uri_string);
	$top_current_tab = $uri_string_arr[count($uri_string_arr)-1];
	
	$top_current_tab = ($top_current_tab) ? $top_current_tab : $uri_string_arr[count($uri_string_arr)-2];
	
	$get_user_details = get_user_details($this->session->thmu_id);
	
?>

<div class="container-fluid">
  <div class="row">
    <div class="main-info-panel pt-4">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="user-pic"><img src="<?php echo IMAGES?>avatar/<?php echo ($get_user_details['avatar']) ? $get_user_details['avatar'] : 'placeholder.jpg'?>" class="img-fluid" alt="" /></div>
            <h3><?php echo filter_string($get_user_details['username'])?></h3>
            <p class="text-light">Member since <?php echo date('M, Y', strtotime($this->session->created_date))?> </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="dashboard-links">
              <ul>
                <!--<li><a class="<?php echo ($top_current_tab == 'dashboard') ? 'active' : '' ?>" href="<?php echo SURL?>dashboard">Dashboarad</a></li>-->
                <li><a class="<?php echo ($top_current_tab == 'my-themes' || $top_current_tab == 'upload-theme' || $top_current_tab == 'my-favorites' || $top_current_tab == 'my-purchase' || $top_current_tab == 'my-ftp') ? 'active' : '' ?>" href="<?php echo SURL?>dashboard/my-themes">Dashboard</a></li>
                <li><a class="<?php echo ($top_current_tab == 'profile' || $top_current_tab == 'change-password' || $top_current_tab == 'personal-information' || $top_current_tab == 'payment-details') ? 'active' : '' ?>" href="<?php echo SURL?>dashboard/profile">Profile</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
