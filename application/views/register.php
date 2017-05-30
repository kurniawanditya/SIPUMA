<?php include("header.php"); ?>
<div class="main-container">
	<section class="wrapper padding50">
		<div class="container">
			<div class="row login-left">
				<div class="col-md-5 no-padding no-margin">
					<div class="col-md-12 col-sm-12 col-xs-12"><img class="img-responsive img-head" src="<?php echo base_url(); ?>assets/frontend/images/sign.jpg"></div>
				</div>
				<div class="col-md-3 no-padding no-margin login">
					<h3>Login</h3>
						<?=form_open('Login/login',array('class'=>'form-login'));?>
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<input type="text" id="name" class="form-control" maxlength="100" data-msg-required="Silahkan isi username anda" value="" name="username" placeholder="Username">
								</div>
								<div class="col-md-12">
									<input type="password" id="password" name="password" class="form-control" maxlength="100" data-msg-required="Kata Sandi Salah" value="" placeholder="Kata Sandi">
								</div>
							</div>
						</div>
						<?php echo $this->session->flashdata('notif');?>
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<input type="submit" data-loading-text="Loading..." class="btn btn-main-color" value="Login">
								</div>
							</div>
						</div>
					 <?=form_close();?>
				</div>
				<div class="col-md-3 no-padding no-margin register">
					<h2>Sign Up</h2>
					<form type="post" id="contactForm" action="" novalidate="novalidate">
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<input type="text" id="name" name="name" class="form-control" maxlength="100" data-msg-required="Please enter your name." value="" placeholder="Nama Hima">
								</div>
								<div class="col-md-12">
									<input type="email" id="email" name="email" class="form-control" maxlength="100" data-msg-email="Please enter a valid email address." data-msg-required="Please enter your email address." value="" placeholder="Email Hima">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-12">
									<input type="file" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="submit" data-loading-text="Loading..." class="btn btn-main-color" value="Sign Up">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include("footer.php"); ?>