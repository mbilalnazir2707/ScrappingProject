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
	</head>
	<body>

		<div class="wrapper-page">
	    	<?php echo $content; ?>
	    </div>

		<?php echo $footer_scripts; ?>

	</body>
</html>