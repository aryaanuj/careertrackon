<?php
session_start();
include_once("database/config.php");
include_once("components/head_links.php");
?>
<title>Test Series | Register</title>
<body>
	<!-- header section -->
	<?php include_once("components/header.php"); ?>
	<!-- end header section -->
	<main id="main">
		<!-- ======= Breadcrumbs Section ======= -->
		<section class="breadcrumbs">
			<div class="container">
				<div class="d-flex justify-content-between align-items-center">
					<h2>Registration Section</h2>
					<ol>
						<li><a href="index.php">Home</a></li>
						<li>Register</li>
					</ol>
				</div>
			</div>
		</section><!-- End Breadcrumbs Section -->
		<!-- login area -->
		<section class="inner-page">
			<div class="container">
				<div class="row">
					<div class="col-md-6"><img src="assets/img/signin.jpg" class="img-fluid"></div>
					<div class="col-md-6 mx-auto" id="signup-form">
						<div class="section-header"><i class="fa fa-lock"></i> Registration Area</div>
						<br><br>
						<div class="myform form ">
							<div id="msg"></div>
							<form  method="POST" class=" needs-validation" novalidate id="reg-form">
								<!-- CSRF TOKEN -->
								<input type="hidden" name="token" value="<?= csrf_token(); ?>">
								<!-- name input -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="firstname"  class="form-control my-input" id="firstname" placeholder="First Name" autocomplete="off" required>
										</div>
										<div class="invalid-feedback">
											Please enter valid First Name
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="text" name="lastname"  class="form-control my-input" id="lastname" placeholder="Last Name" autocomplete="off" required>
										</div>
										<div class="invalid-feedback">
											Please enter valid Last Name
										</div>
									</div>
								</div>
								<!-- email input -->
								<div class="form-group">
									<input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email Address" autocomplete="off" required>
								</div>
								<div class="invalid-feedback">
									Please enter valid email address.
								</div>
								<!-- mobile input -->
								<div class="form-group">
									<input type="number" name="mobile"  class="form-control my-input" id="mobile" placeholder="Mobile Number" autocomplete="off" onkeydown="validateNum(event, this)" required>
									<div class="mobile-valid-feedback"></div>
								</div>
								<!-- password input -->
								<div class="form-group">
									<input type="password" name="password" id="password"  class="form-control my-input" onkeyup="CheckPassword(this)" autocomplete="off" placeholder="Password" required>
									<div class="valid-pass"></div>
								</div>
								<!-- password input -->
								<div class="form-group">
									<input type="password" name="cnfpassword" id="cnfpassword"  class="form-control my-input" autocomplete="off" placeholder="Confirm Password" required>
								</div>

								<!-- signin button -->
								<div class="form-group text-center ">
									<input type="hidden" name="action" value="register">
									<button type="submit" name="register" class="btn btn-block tx-tfm text-white" style="background-color:#3498db;"  id="regbtn">Register</button>
								</div>
								<div class="pt-3">
									<span>Already have an Account?
										<a href="login.php"> Login Here</a>
									</span>
								</div>
								<div class=" pt-4">
									<small>By Continuing, You Agree To Our <a href="">Terms of Services</a> &amp; <a href="">Privacy Policy</a></small>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- end login area -->
	</main><!-- End #main -->
	<!-- footer  -->
	<?php include_once("components/footer.php"); ?>
	<!-- End Footer -->
	<?php include_once("components/footer_links.php"); ?>
	<script type="text/javascript">
			// form validation
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					var forms = document.getElementsByClassName('needs-validation');
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();

			var valid = false;
			$("#mobile").keyup(function(){
				var val = $(this).val();
				if(val.length>10 || val.length<10){
					$(".mobile-valid-feedback").html("<small class='text-danger'>Enter 10 digit mobile no.</small>");
					$('form').removeClass('was-validated');
					$("#mobile").removeClass("is-valid");
					$("#mobile").addClass("is-invalid");
					valid = false;
				}else{
					$("#mobile").attr("style", "");
					$(".mobile-valid-feedback").html("");
					$("#mobile").removeClass("is-invalid");
					$("#mobile").addClass("is-valid");
					valid = true;
				}
			});
			$("#cnfpassword").keyup(function(){
				var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
				var cnfpass = $("#cnfpassword").val();
				if(cnfpass.match(regularExpression))
				{
					var pass = $("#password").val();
					var cnf_pass = $(this).val();
					if(pass!="" && cnf_pass!="")
					{
						if(pass==cnf_pass)
						{
							$("#cnfpassword").removeClass("is-invalid");
							$("#cnfpassword").addClass("is-valid");
						}
						else
						{
							$('form').removeClass('was-validated');
							$("#cnfpassword").removeClass("is-valid");
							$("#cnfpassword").addClass("is-invalid");
						}
					}
				}else{
					$('form').removeClass('was-validated');
					$("#cnfpassword").removeClass("is-valid");
					$("#cnfpassword").addClass("is-invalid");
				}

			});
			
			function validateNum(event, input) {
				event.preventDefault();
				var currVal = input.value ? input.value : "";
				// Checks if the key pressed is a number and the right length
				if(!isNaN(event.key) && currVal.length < 10){
					input.value = currVal + event.key;
				}
				// Backspace functionality
				else if(event.keyCode == 8 && currVal > 0) {
					input.value = input.value.slice(0, -1);
				}
			}
			function CheckPassword(inputtxt)
			{
				var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
				if(inputtxt.value.match(regularExpression))
				{
					$("#password").removeClass("is-invalid");
					$("#password").addClass("is-valid");
					$(".valid-pass").html("");
				}
				else
				{
					$('form').removeClass('was-validated');
					$(".valid-pass").html("<small class='text-danger'>Password must contain 8 to 15 characters and at least one lowercase letter, one uppercase letter, one numeric digit, and one special character</small>");
					$("#password").addClass("is-invalid");
				}
			}

			$(document).ready(function(){
				$("#reg-form").submit(function(e){
					e.preventDefault();
					var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
					if($("#password").val().match(regularExpression)){
					var form = $(this).serialize();
					$.ajax({
						url:"db/script.php",
						method:"POST",
						data:form,
						beforeSend:function(){
							$("#regbtn").attr("disabled", true);
							$("#regbtn").html("<i class='fa fa-spinner fa-spin'></i> Process");
						},
						success:function(data){
							var obj = JSON.parse(data);
							$("#msg").html(obj.msg);
							$("#regbtn").html("Register");
							$("#regbtn").attr("disabled", false);
							$("#reg-form")[0].reset();
						}
					});
				}
				});
			});
		</script>
	</body>
	</html>