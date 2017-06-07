
<?php include("header.php"); ?>
<div class="main-container atas">
	<section class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
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
$('#results').load("<?php echo base_url() ?>Index/load_more",
 {'group_no':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
          loading = true; 
          $.post('<?php echo site_url() ?>Index/load_more',{'group_no': total_record},
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