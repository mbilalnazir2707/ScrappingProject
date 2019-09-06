<?php echo $js; ?>

<script src="<?php echo ASSETS; ?>js/common.js"></script>

<!-- THEME -->

<script>
var resizefunc = [];
</script>

<script src="<?php echo ASSETS; ?>js/bootstrap.bundle.min.js"></script>
<script src="<?php echo ASSETS; ?>js/detect.js"></script>
<script src="<?php echo ASSETS; ?>js/fastclick.js"></script>
<script src="<?php echo ASSETS; ?>js/jquery.slimscroll.js"></script>
<script src="<?php echo ASSETS; ?>js/jquery.blockUI.js"></script>
<script src="<?php echo ASSETS; ?>js/waves.js"></script>
<script src="<?php echo ASSETS; ?>js/wow.min.js"></script>
<script src="<?php echo ASSETS; ?>js/jquery.nicescroll.js"></script>
<script src="<?php echo ASSETS; ?>js/jquery.scrollTo.min.js"></script>

<!-- jQuery -->
<script src="<?php echo ASSETS; ?>plugins/moment/moment.min.js"></script>

<!-- Counter js  -->
<script src="<?php echo ASSETS; ?>plugins/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?php echo ASSETS; ?>plugins/counterup/jquery.counterup.min.js"></script>

<!-- sweet alerts -->
<script src="<?php echo ASSETS; ?>plugins/sweetalert2/sweetalert2.js"></script>

<!-- flot Chart -->
<script src="<?php echo ASSETS; ?>plugins/flot-chart/jquery.flot.min.js"></script>
<script src="<?php echo ASSETS; ?>plugins/flot-chart/jquery.flot.time.js"></script>
<script src="<?php echo ASSETS; ?>plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo ASSETS; ?>plugins/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo ASSETS; ?>plugins/flot-chart/jquery.flot.pie.js"></script>
<script src="<?php echo ASSETS; ?>plugins/flot-chart/jquery.flot.selection.js"></script>
<script src="<?php echo ASSETS; ?>plugins/flot-chart/jquery.flot.stack.js"></script>
<script src="<?php echo ASSETS; ?>plugins/flot-chart/jquery.flot.crosshair.js"></script>


<!-- Todoapp -->
<script src="<?php echo ASSETS; ?>pages/jquery.todo.js"></script>

<!-- jQuery  -->
<script src="<?php echo ASSETS; ?>pages/jquery.chat.js"></script>

<!-- Dashboard js  -->
<script src="<?php echo ASSETS; ?>pages/jquery.dashboard.js"></script>

<!-- App js  -->
<script src="<?php echo ASSETS; ?>js/jquery.app.js"></script>

<script src="<?php echo ASSETS;?>js/ckeditor/ckeditor.js"></script>

<script>
/* ==============================================
Counter Up
=============================================== */
jQuery(document).ready(function($) {
$('.counter').counterUp({
delay: 100,
time: 1200
});
});

</script>

<?php
// Load chat script from db
$chat_cms = get_cms_page('chat-init');
$chat_script = ($chat_cms['page_description']) ? filter_string($chat_cms['page_description']) : '' ;

echo $chat_script;

?>