<script src="<?php echo $includes_dir; ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo $includes_dir; ?>assets/plugins/popper/popper.min.js"></script>
<script src="<?php echo $includes_dir; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo $includes_dir; ?>assets/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo $includes_dir; ?>assets/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo $includes_dir; ?>assets/js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="<?php echo $includes_dir; ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="<?php echo $includes_dir; ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo $includes_dir; ?>assets/js/custom.min.js"></script>


<!-- chartist chart -->
<script src="<?php echo $includes_dir; ?>assets/plugins/chartist-js/dist/chartist.min.js"></script>
<script src="<?php echo $includes_dir; ?>assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 JavaScript -->
<script src="<?php echo $includes_dir; ?>assets/plugins/d3/d3.min.js"></script>
<script src="<?php echo $includes_dir; ?>assets/plugins/c3-master/c3.min.js"></script>

<!-- include the style -->
<link rel="stylesheet" href="<?php echo $includes_dir; ?>assets/plugins/alertifyjs/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="<?php echo $includes_dir; ?>assets/plugins/alertifyjs/css/themes/default.min.css" />
<script src="<?php echo $includes_dir; ?>assets/plugins/alertifyjs/alertify.min.js"></script>

<link rel="stylesheet" href="<?php echo $includes_dir; ?>assets/plugins/jquery-confirm/3.3.0/dist/jquery-confirm.min.css">
<script src="<?php echo $includes_dir; ?>assets/plugins/jquery-confirm/3.3.0/dist/jquery-confirm.min.js"></script>
<script>
    alertify.set('notifier', 'position', 'top-right');
</script>

<link rel="stylesheet" href="<?php echo $includes_dir; ?>assets/plugins/fancybox-master/dist/jquery.fancybox.min.css" />
<script src="<?php echo $includes_dir; ?>assets/plugins/fancybox-master/dist/jquery.fancybox.min.js"></script>

<script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>