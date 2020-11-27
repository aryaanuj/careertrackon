<?php
  session_start();
  include_once("database/config.php");
  include_once("components/head_links.php");
?>
<title>Test Series | Login</title>
<body>
  <!-- header section -->
  <?php include_once("components/header.php"); ?>
  <!-- end header section -->
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Login Section</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>login</li>
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
            <div class="section-header"><i class="fa fa-lock"></i> Login Area</div>
            <br><br>
            <div class="myform form ">
              <form action="pages/authentication.php" method="POST" class=" needs-validation" novalidate>
                <!-- CSRF TOKEN -->
                <input type="hidden" name="token" value="">

                <!-- email input -->
                <div class="form-group">
                  <input type="email" name="user"  class="form-control my-input" id="email" placeholder="Email Address" autocomplete="off" required>
                </div>
                <div class="invalid-feedback">
                  Please enter valid email address.
                </div>

                <!-- password input -->
                <div class="form-group">
                  <input type="password" name="login" id="password"  class="form-control my-input" autocomplete="off" placeholder="Password" required>
                </div>

                <!-- signin button -->
                <div class="text-center ">
                  <button type="submit" class="btn btn-block tx-tfm text-white" style="background-color:#3498db;" name="signin"><i class="fa fa-sign-in"></i> Login</button>
                </div>

                <div class="pt-3">
                  <span>Don't have an Account?
                    <a href="register.php"> Register Here</a>
                    <a href="" class="float-right">Forgotten Password?</a>
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
  <!-- Footer Section -->
  <?php include_once("components/footer.php"); ?>
  <!-- End Footer -->
  <?php include_once("components/footer_links.php"); ?>
</body>
</html>