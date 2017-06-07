<?php include("header.php"); ?>
<div class="main-container atas">
	<section class="wrapper">
		<div class="container">
			<div class="row">
			<?php foreach($himaid as $hima){?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="header-image"><img class="img-responsive" src="<?php echo base_url();?>assets/frontend/images/bg1.jpg"></div>
					<div class="header-name"><p><?php echo $hima->hima_name; ?> <span class="clip-study" alt="verified"></span></p></div>
				</div>
			<?php } ?>
			</div>
			<div class="row" style="margin-top:20px;">
				<div class="col-md-12 col-sm-12 col-xs-12 res">
					<ol>
						<div id="results"></div>
					</ol>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
$(document).ready(function() {
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;  
$('#results').load("<?php echo base_url() ?>C_hima/load_more/<?php echo $hima->hima_id; ?>",
 {'group_no':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
          loading = true; 
          $.post('<?php echo site_url() ?>C_hima/load_more/<?php echo $hima->hima_id;?>',{'group_no': total_record},
            function(data){ 
                if (data != "") {                               
                    $("#results").append(data);                   
                    total_record++;
                }
            });     
        }
    }
});
});
</script>