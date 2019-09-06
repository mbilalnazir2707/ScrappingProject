<?php
// Get url sagments
$uri_segment_1 = $this->uri->segment(1);
$uri_segment_2 = $this->uri->segment(2);
$uri_segment_3 = $this->uri->segment(3);
?>

<!Doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" />
		<title><?php echo $title; ?></title>
		<!-- Start - Kod-Header Scripts -->
		<?php
		        echo $meta;        
		        echo $header_scripts;
		        echo $css;
		    ?>
		<!-- End - Header Scripts -->
	</head>
	<body class="fixed-left">

		<!-- Begin page -->
        <div id="wrapper">

			<?php echo $header_contents; ?>

			<!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        
                        <h3> Manage Website </h3>
                    </div>
                    
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo SURL; ?>dashboard" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect">
                                	<i class="fa fa-file-text-o"></i>
                                	<span> Wesbsite Pages </span>
                                	<span class="pull-right"><i class="md md-add"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    
                                    <li>
                                    	<a href="<?php echo SURL; ?>pages/cruise-lines">
                                    		
                                    		Cruise Lines

                                    	</a>
                                    </li>

                                    <li>
                                    	<a href="<?php echo SURL; ?>pages/ships-and-ratings">  Ships &amp; Ratings </a>
                                    </li>
                                    
									<li>
                                    	<a href="<?php echo SURL; ?>pages/cruise-regions">  Cruise Regions </a>
                                    </li>
                                    
                                    <li>
                                    	<a href="<?php echo SURL; ?>pages/ports">  Ports </a>
                                    </li>
                                    
                                    <li>
                                    	<a href="<?php echo SURL; ?>pages/cruise-newsletter">  Cruise Newsletter </a>
                                    </li>
                                    
                                    <li>
                                    	<a href="<?php echo SURL; ?>pages/singles-cruises">  Singles Cruises </a>
                                    </li>
                                    
                                    <li>
                                    	<a href="<?php echo SURL; ?>pages/my-account">  My Account </a>
                                    </li>
                                    
                                    
                                </ul>
                            </li>
                            
                            <li>
                                <a href="#" class="waves-effect">

									<i class="fa fa-repeat"></i>
                                	Manage Orders

                                </a>
                            </li>
                            
                            <li>
                                <a href="#" class="waves-effect">

									<i class="fa fa-dollar"></i>
                                	Manage Pricing

                                </a>
                            </li>
                            
                            <li>
                                <a href="#" class="waves-effect">

									<i class="fa fa-envelope"></i>
                                	Email Templates

                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo SURL; ?>pages/users-listing" class="waves-effect">

									<i class="fa fa-users"></i>
                                	Users Listing

                                </a>
                            </li>
                            
                            <li>
                                <a href="#" class="waves-effect">

									<i class="fa fa-bar-chart"></i>
                                	Reporting

                                </a>
                            </li>
                            

                        </ul>
						
                        <div class="clearfix"></div>

                    </div>
                    
                    <div class="clearfix"></div>

                </div>
            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
			
			<div class="content-page">
            	
            	<!-- Start content -->
				<?php echo $content; ?>

	            <?php echo $footer_contents; ?>

			</div>

			<!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                
                <!-- <h4 class="text-center">Branches</h4> -->

                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                         
                    	<li class="list-group-item">
			                            
							<a href="#">
								
								
								<div class="avatar">
									<img src="<?php echo IMAGES; ?>users/avatar-1.jpg" alt="">
								</div>
								
								<span class="name">
									New quote received
								</span>
								<i class="fa fa-circle online"> </i>
								
							</a>
							<span class="clearfix"></span>

						</li>
						
						<li class="list-group-item">
			                            
							<a href="#">
								
								
								<div class="avatar">
									<img src="<?php echo IMAGES; ?>users/avatar-1.jpg" alt="">
								</div>
								
								<span class="name">
									New quote received
								</span>
								<i class="fa fa-circle online"> </i>
								
							</a>
							<span class="clearfix"></span>

						</li>
						
						<li class="list-group-item active">
			                            
							<a href="#">
								
								
								<div class="avatar">
									<img src="<?php echo IMAGES; ?>users/avatar-1.jpg" alt="">
								</div>
								
								<span class="name">
									New quote received
								</span>
								<i class="fa fa-circle online"> </i>
								
							</a>
							<span class="clearfix"></span>

						</li>
						
						<li class="list-group-item">
			                            
							<a href="#">
								
								
								<div class="avatar">
									<img src="<?php echo IMAGES; ?>users/avatar-1.jpg" alt="">
								</div>
								
								<span class="name">
									New quote received
								</span>
								<i class="fa fa-circle online"> </i>
								
							</a>
							<span class="clearfix"></span>

						</li>
                        
                    </ul>  
                </div>
            </div>
            <!-- /Right-bar -->

		</div>
        <!-- END wrapper -->

        <?php echo $footer_scripts; ?>

	</body>


</html>