<?php
session_start();
include_once("database/config.php");
include_once("components/head_links.php");
?>
<title>Career Trackon | Test Series</title>
<style>
  @media (max-width: 767px) {
  .test-series-front{
    max-width: 38% !important;
    height: auto !important;
    position: relative;
    top: 75px;
    left: 20px;
    margin-top: 20px;
    padding-bottom: 20px;
  }
  .mock-test-card .mock-test-icon img{
    max-width:40% !important;
    max-height:auto !important;
  }
  .mock-test-card .mock-test-desc{
    text-align: center !important;
    margin-top:15px;
    padding-bottom:40px;
  }
  .mock-test-card .mock-test-desc .row{
    margin-left:25px;
  }

  .mock-test-card .mock-test-desc a{
    position: absolute;
    top:55px;
    right:125px;
  }
  .join a{
    font-size:13px;
    padding:2px;
  }
}
td,th {
  text-align: center;
  vertical-align: middle;
}
</style>
<body>
  <!-- ======== header section ========-->
  <?php include_once("components/header.php"); ?>
  <!-- end header section -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <i class="fa fa-user-circle-o text-white test-series-front mb-4" style="font-size:150px;"></i>
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" style="color:white;">
          <h1 data-aos="fade-up" class="text-white">Student Registration</h1>
          <p data-aos="fade-up" data-aos-delay="400" style="font-size:15px;">Join CareerTrackon and do practice with best institutes and crack the exams</p>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  <div class="join container" style="background:#1b2162;">
    <div class="container row mx-lg-5 mx-md-5" style="padding-top:3%">
      <div class="col-md-3 col-sm-6 col-6 d-flex"><a href="" class="text-white"><i class='fa fa-info-circle'></i> Instructions</a></div>
      <div class="col-md-3 col-sm-6 col-6 d-flex dropdown" ><a href="" class="text-white"><i class='fa fa-file-text-o'></i> Privacy & Policy</a>
      </div>
      <div class="col-md-3 col-sm-7 col-7 d-flex"><a href="#about" class="text-white"><i class='fa fa-list'></i> Terms & Condition</a></div>
      <div class="col-md-3 col-sm-7 col-7 d-flex"><a href="#features" class="text-white"><i class='fa fa-file-o'></i> Registration Form</a></div>
    </div>
  </div>

  <main id="main" class=" bg-light">
        <!-- ======= Services Section ======= -->
    <section id="services" class="services" class="mb-0 pb-0">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>What We Have?</h2>
        </div>
        <ul>
          <li>Institutes can provide their video lectures of compitition / academic etc to students.</li>
          <li>Institutes can provide online test series Paid/Free.</li>
          <li>Institute can provide Study Material</li>
          <li>Provide Practice Set</li>
        </ul>
      </div>
    </section><!-- End Services Section -->
    <section id="features">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Registration Form</h2>
        </div>
          <div class="col-md-12 mx-auto bg-white shadow p-5" id="signup-form">
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
    </section>
  </main>

    <!-- Footer Section -->
  <?php include_once("components/footer.php"); ?>
  <!-- End Footer -->
  <?php include_once("components/footer_links.php"); ?>
  <script type="text/javascript">
    $(document).on('click', 'a[href^="#"]', function (event) {
          event.preventDefault();
          $('html, body').animate({
              scrollTop: $($.attr(this, 'href')).offset().top-100
          }, 1000);
      });
     $(".test-carousel").owlCarousel({
      autoplay: true,
      dots: true,
      loop: true,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 1
        },
        900: {
          items: 2
        }
      }
    });
  </script>
  </body>
</html>