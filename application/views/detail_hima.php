<?php include("header.php"); ?>
<div class="main-container atas">
	<section class="wrapper">
		<div class="container">
			<div class="row">
			<?php foreach($himaid as $hima){?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="header-image">
					<?php
						if(!empty($hima->hima_banner)){?>
							<img class="img-responsive" src="<?php echo base_url();?>assets/frontend/images/photo-profil/<?php echo $hima->hima_banner; ?>">
						<?php }
						else{?>
							<img class="img-responsive" src="<?php echo base_url();?>assets/frontend/images/bg.jpg">
					<?php }
					?>
					</div>
					<div class="header-name">
					 <div class="row">
					 	<div class="col-md-2 col-sm-6 col-xs-12">
					 		<?php 
			              	if(!empty($hima->hima_img)){?>
					 			<img class="img-responsive logohima" src="<?php echo base_url();?>assets/frontend/images/photo-profil/<?php echo $hima->hima_img; ?>">
			              	<?php }else{?>
			              		<img class="img-responsive logohima" src="<?php echo base_url();?>assets/frontend/images/avatar.png">
			              	<?php }
			              ?>

					 	</div>
					 	<div class="col-md-5 col-sm-6 col-xs-12">
					 		<h1><?php echo $hima->hima_name; ?></span></h1>
					 		<span><?php echo $hima->hima_desc; ?></span><br>
					 		<span><?php echo $hima->fakultas_name." - ".$hima->universitas_name; ?></span><br>
					 	</div>
					 </div>						
					</div>
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