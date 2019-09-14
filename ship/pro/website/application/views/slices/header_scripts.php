<script>var SURL = '<?php echo SURL?>';</script>

<!-- jQuery  -->
<script src="<?php echo JS; ?>jquery.min.js"></script>

<!-- Custom style -->
<link href="<?php echo CSS; ?>jquery.fancybox.css" rel="stylesheet"> 

<!-- THEME -->
<link rel="shortcut icon" href="<?php echo IMAGES; ?>favicon_1.ico">
<link href="<?php echo ASSETS; ?>plugins/sweetalert2/sweetalert2.css" rel="stylesheet" type="text/css">

<!-- Custom Files -->
<link href="<?php echo CSS; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS; ?>icons.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS; ?>style.css" rel="stylesheet" type="text/css" />

<link href="<?php echo CSS; ?>custom_styles.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS; ?>custom_responsive.css" rel="stylesheet" type="text/css" />

<script src="<?php echo JS; ?>modernizr.min.js"></script>

<?php
    //$common_js = array('jquery-3.1.1.slim.min.js','jquery-2.2.4.min.js' ,'responsive-menu.js');
    echo add_js($common_js);
?>
