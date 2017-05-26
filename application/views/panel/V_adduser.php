
					<!-- start: PAGE CONTENT -->
					<div class="row">
						<div class="col-md-12">
							<!-- start: FORM VALIDATION 1 PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Form Validation 1
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<h2><i class="fa fa-pencil-square teal"></i> REGISTER</h2>
									<p>
										Create one account to manage everything you do with ClipOne, from your shopping preferences to your ClipOne activity.
									</p>
									<hr>
									<form action="#" role="form" id="form">
										<div class="row">
											<div class="col-md-12">
												<div class="errorHandler alert alert-danger no-display">
													<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
												</div>
												<div class="successHandler alert alert-success no-display">
													<i class="fa fa-ok"></i> Your form validation is successful!
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														First Name <span class="symbol required"></span>
													</label>
													<input type="text" placeholder="Insert your First Name" class="form-control" id="firstname" name="firstname">
												</div>
												<div class="form-group">
													<label class="control-label">
														Last Name <span class="symbol required"></span>
													</label>
													<input type="text" placeholder="Insert your Last Name" class="form-control" id="lastname" name="lastname">
												</div>
												<div class="form-group">
													<label class="control-label">
														Email Address <span class="symbol required"></span>
													</label>
													<input type="email" placeholder="Text Field" class="form-control" id="email" name="email">
												</div>
												<div class="form-group">
													<label class="control-label">
														Password <span class="symbol required"></span>
													</label>
													<input type="password" class="form-control" name="password" id="password">
												</div>
												<div class="form-group">
													<label class="control-label">
														Confirm Password <span class="symbol required"></span>
													</label>
													<input type="password" class="form-control" id="password_again" name="password_again">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group connected-group">
													<label class="control-label">
														Date of Birth <span class="symbol required"></span>
													</label>
													<div class="row">
														<div class="col-md-3">
															<select name="dd" id="dd" class="form-control" >
																<option value="">DD</option>
																<option value="01">1</option>
																<option value="02">2</option>
																<option value="03">3</option>
																<option value="04">4</option>
																<option value="05">5</option>
																<option value="06">6</option>
																<option value="07">7</option>
																<option value="08">8</option>
																<option value="09">9</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
																<option value="13">13</option>
																<option value="14">14</option>
																<option value="15">15</option>
																<option value="16">16</option>
																<option value="17">17</option>
																<option value="18">18</option>
																<option value="19">19</option>
																<option value="20">20</option>
																<option value="21">21</option>
																<option value="22">22</option>
																<option value="23">23</option>
																<option value="24">24</option>
																<option value="25">25</option>
																<option value="26">26</option>
																<option value="27">27</option>
																<option value="28">28</option>
																<option value="29">29</option>
																<option value="30">30</option>
																<option value="31">31</option>
															</select>
														</div>
														<div class="col-md-3">
															<select name="mm" id="mm" class="form-control" >
																<option value="">MM</option>
																<option value="01">1</option>
																<option value="02">2</option>
																<option value="03">3</option>
																<option value="04">4</option>
																<option value="05">5</option>
																<option value="06">6</option>
																<option value="07">7</option>
																<option value="08">8</option>
																<option value="09">9</option>
																<option value="10">10</option>
																<option value="11">11</option>
																<option value="12">12</option>
															</select>
														</div>
														<div class="col-md-3">
															<input type="text" placeholder="YYYY" id="yyyy" name="yyyy" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label">
														Gender <span class="symbol required"></span>
													</label>
													<div>
														<label class="radio-inline">
															<input type="radio" class="grey" value="" name="gender" id="gender_female">
															Female
														</label>
														<label class="radio-inline">
															<input type="radio" class="grey" value="" name="gender"  id="gender_male">
															Male
														</label>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">
																Zip Code <span class="symbol required"></span>
															</label>
															<input class="form-control" type="text" name="zipcode" id="zipcode">
														</div>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label">
																City <span class="symbol required"></span>
															</label>
															<input class="form-control tooltips" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="" data-placement="top" name="city" id="city">
														</div>
													</div>
												</div>
												<div class="form-group">
													<hr>
													<label class="control-label">
														<strong>Signup for Clip-One Emails</strong> <span class="symbol required"></span>
													</label>
													<p>
														Would you like to review Clip-One emails?
													</p>
													<div>
														<label class="radio-inline">
															<input type="radio" class="grey" value="" name="newsletter">
															No
														</label>
														<label class="radio-inline">
															<input type="radio" class="grey" value="" name="newsletter">
															Yes
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div>
													<span class="symbol required"></span>Required Fields
													<hr>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-8">
												<p>
													By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
												</p>
											</div>
											<div class="col-md-4">
												<button class="btn btn-yellow btn-block" type="submit">
													Register <i class="fa fa-arrow-circle-right"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- end: FORM VALIDATION 1 PANEL -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- start: FORM VALIDATION 2 PANEL -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<i class="fa fa-external-link-square"></i>
									Form Validation 2
									<div class="panel-tools">
										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
										</a>
										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
											<i class="fa fa-wrench"></i>
										</a>
										<a class="btn btn-xs btn-link panel-refresh" href="#">
											<i class="fa fa-refresh"></i>
										</a>
										<a class="btn btn-xs btn-link panel-expand" href="#">
											<i class="fa fa-resize-full"></i>
										</a>
										<a class="btn btn-xs btn-link panel-close" href="#">
											<i class="fa fa-times"></i>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<h2><i class="fa fa-pencil-square teal"></i> REGISTER</h2>
									<p>
										Create one account to manage everything you do with ClipOne, from your shopping preferences to your ClipOne activity.
									</p>
									<hr>
									<form action="#" role="form" id="form2">
										<div class="row">
											<div class="col-md-12">
												<div class="errorHandler alert alert-danger no-display">
													<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
												</div>
												<div class="successHandler alert alert-success no-display">
													<i class="fa fa-ok"></i> Your form validation is successful!
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														First Name <span class="symbol required"></span>
													</label>
													<input type="text" placeholder="Insert your First Name" class="form-control" id="firstname2" name="firstname2">
												</div>
												<div class="form-group">
													<label class="control-label">
														Last Name <span class="symbol required"></span>
													</label>
													<input type="text" placeholder="Insert your Last Name" class="form-control" id="lastname2" name="lastname2">
												</div>
												<div class="form-group">
													<label class="control-label">
														Email Address <span class="symbol required"></span>
													</label>
													<input type="email" placeholder="Text Field" class="form-control" id="email2" name="email2">
												</div>
												<div class="form-group">
													<label class="control-label">
														Occupation <span class="symbol required"></span>
													</label>
													<input type="text" class="form-control" name="occupation" id="occupation">
												</div>
												<div class="form-group">
													<label class="control-label">
														Dropdown <span class="symbol required"></span>
													</label>
													<select class="form-control" id="dropdown" name="dropdown">
														<option value="">Select...</option>
														<option value="Category 1">Category 1</option>
														<option value="Category 2">Category 2</option>
														<option value="Category 3">Category 5</option>
														<option value="Category 4">Category 4</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="control-label">
														Services <em>(select at least two)</em> <span class="symbol required"></span>
													</label>
													<div>
														<div class="checkbox">
															<label>
																<input type="checkbox" class="grey" value="" name="services" id="service1">
																Service 1
															</label>
														</div>
														<div class="checkbox">
															<label>
																<input type="checkbox" class="grey" value="" name="services"  id="service2">
																Service 2
															</label>
														</div>
														<div class="checkbox">
															<label>
																<input type="checkbox" class="grey" value="" name="services"  id="service3">
																Service 3
															</label>
														</div>
														<div class="checkbox">
															<label>
																<input type="checkbox" class="grey" value="" name="services"  id="service4">
																Service 4
															</label>
														</div>
													</div>
												</div>
												<div class="form-group connected-group">
													<label class="control-label">
														Credit Card <em>(e.g: 0000 0000 0000 0000)</em> <span class="symbol required"></span>
													</label>
													<input type="text" class="form-control" id="creditcard" name="creditcard">
												</div>
												<div class="form-group connected-group">
													<label class="control-label">
														URL <em>(e.g: http://www.yoursite.com)</em> <span class="symbol required"></span>
													</label>
													<input type="text" class="form-control" id="url" name="url">
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
															<label class="control-label">
																Zip Code <span class="symbol required"></span>
															</label>
															<input class="form-control" type="text" name="zipcode2" id="zipcode2">
														</div>
													</div>
													<div class="col-md-8">
														<div class="form-group">
															<label class="control-label">
																City <span class="symbol required"></span>
															</label>
															<input class="form-control tooltips" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="" data-placement="top" name="city2" id="city2">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">
														Summernote <span class="symbol required"></span>
													</label>
													<div class="summernote"></div>
													<textarea class="form-control no-display" id="editor1" name="editor1" cols="10" rows="10"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="control-label">
														Ckeditor <span class="symbol required"></span>
													</label>
													<textarea class="ckeditor form-control" id="editor2" name="editor2" cols="10" rows="10"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div>
													<span class="symbol required"></span>Required Fields
													<hr>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-8">
												<p>
													By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
												</p>
											</div>
											<div class="col-md-4">
												<button class="btn btn-yellow btn-block" type="submit">
													Register <i class="fa fa-arrow-circle-right"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<!-- end: FORM VALIDATION 2 PANEL -->
						</div>
					</div>
					<!-- end: PAGE CONTENT-->
				</div>
			</div>
			<!-- end: PAGE -->
		</div>
		<!-- end: MAIN CONTAINER -->
		<!-- start: FOOTER -->
		<div class="footer clearfix">
			<div class="footer-inner">
				2014 &copy; clip-one by cliptheme.
			</div>
			<div class="footer-items">
				<span class="go-top"><i class="clip-chevron-up"></i></span>
			</div>
		</div>
		<!-- end: FOOTER -->
		<!-- start: RIGHT SIDEBAR -->
		<div id="page-sidebar">
			<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
			<div class="sidebar-wrapper">
				<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
					<li class="active">
						<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-users"></i></a>
					</li>
					<li>
						<a href="#favorites" role="tab" data-toggle="tab"><i class="fa fa-heart"></i></a>
					</li>
					<li>
						<a href="#settings" role="tab" data-toggle="tab"><i class="fa fa-gear"></i></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="users">
						<div class="users-list">
							<h5 class="sidebar-title">On-line</h5>
							<ul class="media-list">
								<li class="media">
									<a href="#">
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-2.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Nicole Bell</h4>
											<span> Content Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<div class="user-label">
											<span class="label label-success">3</span>
										</div>
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-3.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Steven Thompson</h4>
											<span> Visual Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-4.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<i class="fa fa-circle status-online"></i>
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-5.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
							</ul>
							<h5 class="sidebar-title">Off-line</h5>
							<ul class="media-list">
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-6.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Nicole Bell</h4>
											<span> Content Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<div class="user-label">
											<span class="label label-success">3</span>
										</div>
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-7.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Steven Thompson</h4>
											<span> Visual Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-8.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-9.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-10.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-5.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="user-chat">
							<div class="sidebar-content">
								<a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
							</div>
							<div class="user-chat-form sidebar-content">
								<div class="input-group">
									<input type="text" placeholder="Type a message here..." class="form-control">
									<div class="input-group-btn">
										<button class="btn btn-success" type="button">
											<i class="fa fa-chevron-right"></i>
										</button>
									</div>
								</div>
							</div>
							<ol class="discussion sidebar-content">
								<li class="other">
									<div class="avatar">
										<img src="<?php echo base_url();?>assets/admin//images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 51 min </span>
									</div>
								</li>
								<li class="self">
									<div class="avatar">
										<img src="<?php echo base_url();?>assets/admin//images/avatar-1.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 37 mins </span>
									</div>
								</li>
								<li class="other">
									<div class="avatar">
										<img src="<?php echo base_url();?>assets/admin//images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
									</div>
								</li>
							</ol>
						</div>
					</div>
					<div class="tab-pane" id="favorites">
						<div class="users-list">
							<h5 class="sidebar-title">Favorites</h5>
							<ul class="media-list">
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-7.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Nicole Bell</h4>
											<span> Content Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<div class="user-label">
											<span class="label label-success">3</span>
										</div>
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-6.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Steven Thompson</h4>
											<span> Visual Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-10.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-2.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-4.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Ella Patterson</h4>
											<span> Web Editor </span>
										</div>
									</a>
								</li>
								<li class="media">
									<a href="#">
										<img alt="..." src="<?php echo base_url();?>assets/admin//images/avatar-5.jpg" class="media-object">
										<div class="media-body">
											<h4 class="media-heading">Kenneth Ross</h4>
											<span> Senior Designer </span>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="user-chat">
							<div class="sidebar-content">
								<a class="sidebar-back" href="#"><i class="fa fa-chevron-circle-left"></i> Back</a>
							</div>
							<ol class="discussion sidebar-content">
								<li class="other">
									<div class="avatar">
										<img src="<?php echo base_url();?>assets/admin//images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 51 min </span>
									</div>
								</li>
								<li class="self">
									<div class="avatar">
										<img src="<?php echo base_url();?>assets/admin//images/avatar-1.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
										<span class="time"> 37 mins </span>
									</div>
								</li>
								<li class="other">
									<div class="avatar">
										<img src="<?php echo base_url();?>assets/admin//images/avatar-4.jpg" alt="">
									</div>
									<div class="messages">
										<p>
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</p>
									</div>
								</li>
							</ol>
						</div>
					</div>
					<div class="tab-pane" id="settings">
						<h5 class="sidebar-title">General Settings</h5>
						<ul class="media-list">
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green" checked="checked">
										Enable Notifications
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green" checked="checked">
										Show your E-mail
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green">
										Show Offline Users
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green" checked="checked">
										E-mail Alerts
									</label>
								</div>
							</li>
							<li class="media">
								<div class="checkbox sidebar-content">
									<label>
										<input type="checkbox" value="" class="green">
										SMS Alerts
									</label>
								</div>
							</li>
						</ul>
						<div class="sidebar-content">
							<button class="btn btn-success">
								<i class="icon-settings"></i> Save Changes
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end: RIGHT SIDEBAR -->
		<!-- start: MAIN JAVASCRIPTS -->
		<!--[if lt IE 9]>
		<script src="<?php echo base_url();?>assets/admin//plugins/respond.min.js"></script>
		<script src="<?php echo base_url();?>assets/admin//plugins/excanvas.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/admin//plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
		<![endif]-->
		
	</body>
	<!-- end: BODY -->
</html>