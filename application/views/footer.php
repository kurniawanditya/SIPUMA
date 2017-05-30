<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a class="logo" href="index.html">
					<img class="img-responsive img-footer" src="<?php echo base_url(); ?>assets/frontend/images/color.png">
				</a>
				<p>
					&copy; Copyright 2016 SIPUMA All Rights Reserved.
				</p>
			</div>
			<div class="col-md-7">
			</div>
		</div>
	</div>
</footer>
		<a id="scroll-top" href="#"><i class="fa fa-angle-up"></i></a>
		<!-- end: FOOTER -->
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="assets/plugins/respond.min.js"></script>
		<script src="assets/plugins/excanvas.min.js"></script>
		<script src="assets/plugins/html5shiv.js"></script>
		<script type="text/javascript" src="assets/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
		<![endif]-->
		<!--[if gte IE 9]><!-->
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
		<!--<![endif]-->
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/jquery.transit/jquery.transit.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/jquery.appear/jquery.appear.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/blockUI/jquery.blockUI.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/js/main.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/flex-slider/jquery.flexslider.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/stellar.js/jquery.stellar.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/plugins/colorbox/jquery.colorbox-min.js"></script>
		<script src="<?php echo base_url(); ?>assets/frontend/js/index.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Index.init();
				$.stellar();
			});
		</script>
	</body>
</html>
