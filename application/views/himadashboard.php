<?php include("header.php"); ?>
<div class="main-container atas">
	<section class="wrapper">
		<div class="container">
			<div class="row">
			<?php if (!empty($this->session->flashdata('notif'))){ ?>
				<div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('notif');?></div><br>
			<?php } ?>
			
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
					 		<img class="img-responsive logohima" src="<?php echo base_url();?>assets/frontend/images/photo-profil/<?php echo $hima->hima_img; ?>">
					 	</div>
					 	<div class="col-md-5 col-sm-6 col-xs-12">
					 		<h1><?php echo $hima->hima_name; ?></span></h1>
					 		<span><?php echo $hima->hima_desc; ?></span><br>
					 		<span><?php echo $hima->fakultas_name." - ".$hima->universitas_name; ?></span><br>
					 		<span><a href="<?php echo base_url();?>hima/edithima/<?php echo $hima->hima_id; ?>"><i class="clip-settings"></i>
								Edit Profil</a></span>
					 	</div>
					 </div>						
					</div>
				</div>
			<?php } ?>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="content-hima">
						<article>
						
						<form method="POST" action="<?php echo base_url();?>Posting/add_posting"  enctype="multipart/form-data">
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1">Judul Posting</span>
							  <input type="text" class="form-control"  id="posting_title" name="posting_title" aria-describedby="basic-addon1">
							  <input type="hidden"  class="form-control" id="hima_id" name="hima_id" value="<?php echo $hima->hima_id; ?>">
							</div>
	                        <div class="form-group">
	                          <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	                          	 <script>
	                          	  tinymce.init({
								  selector: '#posting_description',
								  height: 100,
								  menubar: false,
								  plugins: [
								    'advlist autolink lists link image charmap print preview anchor',
								    'searchreplace visualblocks code fullscreen',
								    'insertdatetime media table contextmenu paste code'
								  ],
								  toolbar: 'undo redo | insert | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
								  content_css: [
								    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
								    '//www.tinymce.com/css/codepen.min.css']
								});
	                          </script>
	                          <textarea id="posting_description" name="posting_description" class="form-control inputposting"  placeholder="Deskripsi Posting"></textarea>
	                        </div>
	                        <div class="row">    
						        <div class="col-xs-12 col-md-12 col-sm-12">  
						            <!-- image-preview-filename input [CUT FROM HERE]-->
						            <div class="input-group image-preview">
						                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
						                <span class="input-group-btn">
						                    <!-- image-preview-clear button -->
						                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
						                        <span class="glyphicon glyphicon-remove"></span> Clear
						                    </button>
						                    <!-- image-preview-input -->
						                    <div class="btn btn-default image-preview-input">
						                        <span class="glyphicon glyphicon-folder-open"></span>
						                        <span class="image-preview-input-title">Browse</span>
						                        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
						                    </div>
						                </span>
						            </div><!-- /input-group image-preview [TO HERE]--> 
						        </div>
						    </div>
	                        <div class="form-group">
	                        	<input type="submit" data-loading-text="Loading..." class="btn btn-primary btn-submit" value="Post">
	                        </div>
						<form>
						</article>
					</div>
				</div>
			</div>
			<div class="row">
			<?php foreach($postingid as $post){?>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="content-hima">
						<article>
							<div class="row">
								<?php if(!empty($post->posting_image)){ ?>
								<div class="col-md-12">
									<div class="post-image postme">
										<center>
										<img class="img-responsive" src="<?php echo base_url();?>gambar/<?php echo $post->posting_image; ?>" >
										</center>
									</div>
								</div>
								<?php }else{

								}?>
								<div class="col-md-12">
									<div class="post-content">
										<h4>
											<?php echo $post->posting_title; ?>
										</h4>
										<span class="waktu"> <?php echo date('d F Y', strtotime($post->posting_create_at));?></span>
										<p>
											<?php echo character_limiter( $post->posting_description,200);?>
											<a class="btn btn-dark-grey btn-xs" href="<?php echo base_url();?>Index/detail_posting/<?php echo $post->posting_id; ?>">
												Selengkapnya <i class="fa fa-arrow-circle-right"></i>
											</a>
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class='col-md-12'>
									<div class='post-meta'>
										<a href='http://www.facebook.com/sharer.php?u=".base_url()."Index/detail_posting/".$content->posting_id."' target='_blank'>
										<button class='btn btn-facebook'>
											<i class='fa fa-facebook'></i>
										</button>
										</a>
									</div>
								</div>
							</div>
						</article>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
	$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>