<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="HDTemplates">
  <link rel="icon" href="<?php echo ASSETS?>img/favicon.png">
  <title><?php echo $title; ?></title>
  <!-- Start - Kod-Header Scripts -->
  <?php
	  echo $meta;        
	  echo $header_scripts;
	  echo $css;
  ?>
  <!-- End - Header Scripts -->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  .com-topbar-links li{
	  float: left;
	  margin-right: 20px;
	  list-style: circle
  }
  </style>
</head>
<body>

  <!-- Top Header -->
  <div class="d-none d-sm-block d-md-none d-block d-sm-none d-none d-md-block d-lg-none">
	  <div class="row p-3">

		  <div class="col-sm-6">

			  <div class="form-group">
				  <a href="<?php echo SURL; ?>">
				  	<img src="<?php echo IMAGES; ?>aa.png" class="img-fluid" width="150px;" />
				  </a>
			  </div>
		
			  <div class="form-group">
				  <label> Select your language </label>
				  <select class="form-control form-control-sm ">
					  <option> English (UK) </option>
				  </select>
			  </div>

		  </div>

	  </div>
  </div>

  <div class="d-none d-xl-block d-lg-block d-xl-none">

	  <div class="row p-3">
		  <div class="col-3">
		  	<a href="<?php echo SURL; ?>">
			  <img src="<?php echo IMAGES; ?>aa.png" class="img-fluid" width="200px;" />
			</a>
		  </div>
		  <div class="col-6">

			  <div class="text-center mt-4">
				  <h3> World's Largest Cruise Agency </h3>
				  <h4 class="text-danger"> +1-713-974-2121 </h4>
			  </div>

		  </div>
		  <div class="col-3">
			  
			  <div class="form-group">
			  	<label> Select your language </label>
			  	<div id="google_translate_element"></div>
			  </div>

			  <script type="text/javascript">
			  function googleTranslateElementInit() {
				new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
			  }
			  </script>

			  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

			  <p>
				  <a href="#"> River Cruises </a>
				  |
				  <a href="#"> Hotels &amp; Resorts </a>
				  |
				  <a href="#"> Escorted </a>

			  </p>

		  </div>
	  </div>

  </div>

  <!-- Header Menu -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
	  <a class="navbar-brand" href="<?php echo SURL; ?>">Home</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		  <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav">
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo SURL; ?>pages/cruise-lines">Cruise Lines</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo SURL; ?>pages/ships-and-ratings">Ships &amp; Ratings</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo SURL; ?>pages/cruise-regions">Cruise Regions</a>
		  </li>    	
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo SURL; ?>pages/ports">Ports</a>
		  </li>  
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo SURL; ?>pages/cruise-newsletter">Cruise Newsletter</a>
		  </li>  
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo SURL; ?>pages/singles-cruises">Singles Cruises</a>
		  </li>  
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo SURL; ?>pages/my-account">My Account</a>
		  </li> 
		  
		  <?php if($this->session->userdata('my_id')){ ?>
		  
			<li class="nav-item">
			  <a class="nav-link btn btn-sm btn-danger text-white" href="<?php echo SURL; ?>pages/logout">Logout</a>
			</li>  
		  
		  <?php } else { ?>
		  
		  	<li class="nav-item">
			  <a class="nav-link btn btn-sm btn-primary text-white" href="<?php echo SURL; ?>pages/register-login">Registeration / Login</a>
			</li> 
		  
		  <?php } // if($this->session->my_id) ?>
		  
		</ul>
	  </div> 
  </nav>

  <!-- Contents -->
  <?php echo $content; ?>

  <!-- Footer -->
  <div class="p-5 text-center" style="margin-bottom:0; background-color: #34495E;">

   <div class="row">

	 <div class="col-md-3 col-sm-12">

		 <div class="card">
		   <img class="card-img-top" src="<?php echo IMAGES; ?>tour_footer.jpg" alt="Card image">
		   <div class="card-body">
			 <p class="card-text">Some example text.</p>
			 <a href="#" class="btn btn-primary">More Details</a>
		   </div>
		 </div>

	 </div>

	  <div class="col-md-3 col-sm-12">

		 <div class="card">
		   <img class="card-img-top" src="<?php echo IMAGES; ?>resort_footer.jpg" alt="Card image">
		   <div class="card-body">
			 <p class="card-text">Some example text.</p>
			 <a href="#" class="btn btn-primary">More Details</a>
		   </div>
		 </div>
 
	 </div>

	  <div class="col-md-3 col-sm-12">

		 <div class="card">
		   <img class="card-img-top" src="<?php echo IMAGES; ?>river_cruise_footer.jpg" alt="Card image">
		   <div class="card-body">
			 <p class="card-text">Some example text.</p>
			 <a href="#" class="btn btn-primary">More Details</a>
		   </div>
		 </div>
 
	 </div>

	  <div class="col-md-3 col-sm-12">

		 <div class="card">
		   <img class="card-img-top" src="<?php echo IMAGES; ?>safari_footer.jpg" alt="Card image">
		   <div class="card-body">
			 <p class="card-text">Some example text.</p>
			 <a href="#" class="btn btn-primary">More Details</a>
		   </div>
		 </div>

	 </div>

	 <div class="col-md-12 text-center">

		 <button class="btn btn-warning mt-5 text-white"> Tell us what you thing about our site </button>

		 <p class="mt-4" style="color: aliceblue;"> Copyright © 2019 by VacationsToGo.com. All rights reserved. CST 2072920-50 </p>

	 </div>

   </div>

  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>