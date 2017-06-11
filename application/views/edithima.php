<?php include("header.php"); ?>
<div class="main-container atas">
	<section class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
						foreach ($himaid as $hima) {?>	
						<form method="POST" action="<?php echo base_url();?>Hima/update"  enctype="multipart/form-data">
						<input type="hidden" name="hima_id" value="<?php echo $hima->hima_id; ?>">
							<div class="row">
								<div class="col-md-3 col-sm-12 col-xs-12">
								    <div class="form-group">
						              <div class="main-img-preview">
						                <img class="thumbnail img-preview" src="<?php echo base_url()."assets/frontend/images/photo-profil/".$hima->hima_img; ?>" title="Preview Logo">
						              </div>
						              <div class="input-group">
						                <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Pilih foto" disabled="disabled">
						                <div class="input-group-btn">
						                  <div class="fileUpload btn btn-danger fake-shadow">
						                    <span>Unggah Foto</span>
						                    <input id="logo-id" name="hima_img" type="file" class="attachment_upload" value="<?php echo $hima->hima_img; ?>">
						                    <input type="hidden" name="hima_img_if" value="<?php echo $hima->hima_img; ?>">
						                  </div>
						                </div>
						              </div>
						              <p class="help-block">*Ganti foto profil hima.</p>
						            </div>
								</div>
								<div class="col-md-9 col-sm-12 col-xs-12">
								    <div class="form-group">
						              <div class="main-img-preview">
						                <img class="thumbnail img-preview2" src="<?php echo base_url()."assets/frontend/images/photo-profil/".$hima->hima_banner; ?>" title="Preview Logo">
						              </div>
						              <div class="input-group">
						                <input id="fakeUploadLogo2" class="form-control fake-shadow" placeholder="Pilih foto" disabled="disabled">
						                <div class="input-group-btn">
						                  <div class="fileUpload btn btn-danger fake-shadow">
						                    <span>Unggah Foto</span>
						                    <input id="logo-id2" name="hima_img2" type="file" class="attachment_upload2" value="<?php echo $hima->hima_banner; ?>">
						                    <input type="hidden" name="hima_banner_if" value="<?php echo $hima->hima_banner; ?>">
						                  </div>
						                </div>
						              </div>
						              <p class="help-block">*Ganti foto banner hima.</p>
						            </div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">Email Hima</span>
										  <input type="text" class="form-control" name="hima_email"  aria-describedby="basic-addon1" value="<?php echo $hima->hima_email ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">Nama Hima</span>
										  <input type="text" class="form-control" name="hima_name"  aria-describedby="basic-addon1" value="<?php echo $hima->hima_name ?>">
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">Deskripsi Hima</span>
										  <textarea class="form-control" name="hima_desc"  aria-describedby="basic-addon1" value="<?php echo $hima->hima_desc; ?>"><?php echo $hima->hima_desc; ?></textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">Universitas</span>
										  <select class="form-control" name="hima_univ"  aria-describedby="basic-addon1" >
										  	<option value="<?php echo $hima->universitas_id; ?>">
										  	<?php 
												$id=$hima->universitas_id;
												$sql ="SELECT * FROM universitas WHERE universitas_id=$id";
												$query = $this->db->query($sql);
												if ($query->num_rows() > 0) {
												  foreach ($query->result() as $row) {
													echo $row->universitas_name;
												}
											}?>
											</option>
										  	<?php foreach ($univ as $un) { ?>
										  		<option value="<?php echo $un->universitas_id ?>"><?php echo $un->universitas_name ?></option>
										  	<?php } ?>
										  </select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="input-group">
										  <span class="input-group-addon" id="basic-addon1">Fakultas</span>
										  <select class="form-control" name="fakultas_id"  aria-describedby="basic-addon1" >
										  	<option value="<?php echo $hima->fakultas_id; ?>" selected>
									  		<?php 
												$id=$hima->fakultas_id;
												$sql ="SELECT * FROM fakultas WHERE fakultas_id=$id";
												$query = $this->db->query($sql);
												if ($query->num_rows() > 0) {
												  foreach ($query->result() as $row) {
													echo $row->fakultas_name;
												}
											}?>
										  	</option>
										  	<?php foreach ($fakultas as $fak) { ?>
										  		<option value="<?php echo $fak->fakultas_id ?>"><?php echo $fak->fakultas_name ?></option>
										  	<?php } ?>
										  </select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1">
									<input type="submit" data-loading-text="Loading..." class="btn btn-main-color" value="Simpan">
								</div>
								<div class="col-md-1">
									<a class="btn btn-warning"  href="<?php echo base_url(); ?>Hima/dash_hima">Kembali</a>
								</div>
							</div>
						</form>
					<?php }
					 ?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>
<script>
$(document).ready(function() {
    var brand = document.getElementById('logo-id');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#logo-id").change(function() {
        readURL(this);
    });
});
$(document).ready(function() {
    var brand = document.getElementById('logo-id2');
    brand.className = 'attachment_upload2';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo2').value = this.value.substring(12);
    };

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('.img-preview2').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#logo-id2").change(function() {
        readURL(this);
    });
});
</script>