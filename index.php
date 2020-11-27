<?php
session_start();
include_once("database/config.php");
include_once("components/head_links.php");
?>
<title>Career Trackon | Home</title>
<style>
  .tick {
    padding-bottom: 1em;
    font-size:1rem;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
  }
  .tick-label {
    font-size:.375em;
    text-align:center;
  }
  .tick-group {
    margin:0 .25em;
    text-align:center;
  }
</style>
<body>
  <!-- ======== header section ========-->
  <?php include_once("components/header.php"); ?>
  <!-- end header section -->
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" style="color:white;">
          <h1 data-aos="fade-up" class="text-white">Let's Crack the Exam with us</h1>
          <p data-aos="fade-up" data-aos-delay="400">Online Courses, Practice Question Bank, Mock Test Series, Study Notes, Strategy & Preparation Plans, Guidance & Mentoring and more</p>
          <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
            <div data-aos="fade-up" data-aos-delay="800">
              <a href="student/examinations.php" class="btn-get-started scrollto">Test Series</a>
              <a href="" class="btn-get-started scrollto">Join Class</a>
            </div>
          <?php }else{ ?>
            
          <?php } ?>
          <!--========== student dashboard ===========-->
          <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true) { ?>
            <div data-aos="fade-up" data-aos-delay="800">
              <a href="student/" class="btn-get-started text-white btn-primary scrollto mt-4">Go To Student Dashboard</a>
            </div>
          <?php } ?>
          <!--=========== student dashboard end ===========-->
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <!-- <img src="assets/img/hero-img.png" class="img-fluid animated" alt=""> -->
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  <div class="join container" style="background:#1b2162;">
    <div class="button join_button"><a href="institute_registration.php" >Register as Institute<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
    <div class="button join_button1"><a href="student_registration.php">Register as Student<div class="button_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div></a></div>
  </div>
   <!-- <div class="hero-footer container bg-primary">
    <center>
     <div data-aos="fade-up" data-aos-delay="800" class="pt-4 col-md-6">
      
          
      </div>
    </center>
   </div> -->
  <main id="main">
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients clients">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/rrb.png" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/ssc.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/drdo.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="200">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/neet.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/tgt_pgt.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="400">
          </div>
          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/kvs.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="500">
          </div>
        </div>
      </div>
    </section><!-- End Clients Section -->
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>About Us</h2>
        </div>
        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->
   <!-- Milestones -->

  <div class="milestones">
    <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="assets/img/milestones.jpg" data-speed="0.8"></div>
    <div class="container">
      <div class="row milestones_container">
              
        <!-- Milestone -->
        <div class="col-lg-3 milestone_col">
          <div class="milestone text-center">
            <div class="milestone_icon"><img src="assets/img/institute.png" alt=""></div>
            <div class="milestone_counter" data-end-value="200">100+</div>
            <div class="milestone_text">Institutes</div>
          </div>
        </div>

        <!-- Milestone -->
        <div class="col-lg-3 milestone_col">
          <div class="milestone text-center">
            <div class="milestone_icon"><img src="assets/img/students.png" alt=""></div>
            <div class="milestone_counter" data-end-value="300">10K+</div>
            <div class="milestone_text">Students</div>
          </div>
        </div>

        <!-- Milestone -->
        <div class="col-lg-3 milestone_col">
          <div class="milestone text-center">
            <div class="milestone_icon"><img src="assets/img/test.png" alt=""></div>
            <div class="milestone_counter" data-end-value="257">300K+</div>
            <div class="milestone_text">Test Series</div>
          </div>
        </div>

        <!-- Milestone -->
        <div class="col-lg-3 milestone_col">
          <div class="milestone text-center">
            <div class="milestone_icon"><img src="assets/img/exam_category.jpg" alt=""></div>
            <div class="milestone_counter" data-end-value="100">100+</div>
            <div class="milestone_text">Exams</div>
          </div>
        </div>

      </div>
    </div>
  </div>
   
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Latest Exams Test Series</h2>
          <p>Join Our Test series to crack the exams</p>
        </div>
        <div id="slider" class="row owl-carousel test-carousel" data-aos="fade-up" data-aos-delay="200">
          <div class="col-md-12 col-lg-12 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="mb-3"><img src="assets/img/rrb.png" style="" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">RRB NTPC CBT 1</a></h4>
              <p class="description text-center">
                <ul style="">
                  <li>10 Full Length Mock Tests</li>
                  <li>1 Free Full Length Mock Test</li>
                  <li>Full Solution with Explanation</li>
                </ul>
              </p>
              <a href='test-series.php?ext=rrb-ntpc-cbt-1' class="btn btn-block btn-primary">View Tests</a>
            </div>
          </div>
          <div class="col-md-12 col-lg-12 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="mb-3"><img src="assets/img/SSC.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">SSC CHSL Tier I</a></h4>
              <p class="description text-center">
                <ul style="">
                  <li>10 Full Length Mock Tests</li>
                  <li>1 Free Full Length Mock Test</li>
                  <li>Full Solution with Explanation</li>
                </ul>
              </p>
              <a href='test-series.php?ext=ssc-chsl-tier-I' class="btn btn-block btn-primary">View Tests</a>
            </div>
          </div>
          <div class="col-md-12 col-lg-12 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="mb-3"><img src="assets/img/bank.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">Bank (IBPS) PO</a></h4>
              <p class="description text-center">
                <ul style="">
                  <li>10 Full Length Mock Tests</li>
                  <li>1 Free Full Length Mock Test</li>
                  <li>Full Solution with Explanation</li>
                </ul>
              </p>
              <a href='test-series.php?ext=bank-po' class="btn btn-block btn-primary">View Tests</a>
            </div>
          </div>
          <div class="col-md-12 col-lg-12 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="mb-3"><img src="assets/img/ctet.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">CTET</a></h4>
              <p class="description text-center">
                <ul style="">
                  <li>10 Full Length Mock Tests</li>
                  <li>1 Free Full Length Mock Test</li>
                  <li>Full Solution with Explanation</li>
                </ul>
              </p>
              <a href='test-series.php?ext=ssc-chsl-tier-I' class="btn btn-block btn-primary">View Tests</a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->
     <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg test-series">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2 class="text-dark">Live Test Series</h2>
          <p class="text-muted">Magnam dolores commodi suscipit eum quidem consectetur velit</p>
        </div>
        <div class="owl-carousel testimonials-carousel" data-aos="fade-up" data-aos-delay="200">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/rrb.png" class="testimonial-img" alt="">
              <h3>RRB NTPC CBT 1</h3>
              <h4>Live Full Length Mock Test <span class="badge badge-danger" >Live</span></h4>
              <p>
                <div class="tick" data-did-init="handleTickInit">
                  <div data-repeat="true" data-layout="horizontal center fit" data-transform="preset(d, h, m, s) -> delay">
                    <div class="tick-group">
                      <div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">
                        <span data-view="flip"></span>
                      </div>
                      <span data-key="label" data-view="text" class="tick-label"></span>
                    </div>
                  </div>
                </div>
                <div class="">
                  <button class="btn btn-info pull-right"><i class="fa fa-sign-in"></i> Enroll Now</button>
                  <small>Total Questions: 100 </small><br>
                  <small> Duration: 3hrs</small><br>
                  <small class="text-success">Enrolled Students 2000+</small>
                </div>
              </p>
            </div>
          </div>
          
         <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/SSC.png" class="testimonial-img" alt="">
              <h3>SSC CHSL Tier I</h3>
              <h4>Live Full Length Mock Test <span class="badge badge-danger" >Live</span></h4>
              <p>
                <div class="tick" data-did-init="handleTickInit">
                  <div data-repeat="true" data-layout="horizontal center fit" data-transform="preset(d, h, m, s) -> delay">
                    <div class="tick-group">
                      <div data-key="value" data-repeat="true" data-transform="pad(00) -> split -> delay">
                        <span data-view="flip"></span>
                      </div>
                      <span data-key="label" data-view="text" class="tick-label"></span>
                    </div>
                  </div>
                </div>
                <div class="">
                  <button class="btn btn-info pull-right"><i class="fa fa-sign-in"></i> Enroll Now</button>
                  <small>Total Questions: 100 </small><br>
                  <small> Duration: 3hrs</small><br>
                  <small class="text-success">Enrolled Students 600+</small>
                </div>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->
    <!-- ======= Exam Categories Section ======= -->
    <section id="exam-categories" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Exam Categories</h2>
          <p>Magnam dolores commodi suscipit eius consequatur ex aliquid fug</p>
        </div>
        <div class="row">

          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="mb-3"><img src="assets/img/SSC.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">SSC</a></h4>
            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="mb-3"><img src="assets/img/rrb.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">Railway (RRB)</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="mb-3"><img src="assets/img/bank.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">Bank (IBPS)</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="mb-3"><img src="assets/img/ctet.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">CTET</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="mb-3"><img src="assets/img/upsc.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">UPSC</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="mb-3"><img src="assets/img/uppsc1.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">UPPSC</a></h4>

            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="mb-3"><img src="assets/img/tgt_pgt.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">TGT/PGT</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="mb-3"><img src="assets/img/kvs.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">KVS</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="mb-3"><img src="assets/img/nvs.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">NVS</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="mb-3"><img src="assets/img/drdo.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">DRDO</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="mb-3"><img src="assets/img/dsssb.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">DSSB</a></h4>

            </div>
          </div>
          <div class="col-md-6 col-lg-2 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="mb-3"><img src="assets/img/neet.png" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">NEET</a></h4>

            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">
        <div class="section-title">
          <h2>Pricing</h2>
          <p>Sit sint consectetur velit nemo qui impedit suscipit alias ea</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="zoom-in-right" data-aos-delay="200">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box recommended" data-aos="zoom-in" data-aos-delay="100">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in-left" data-aos-delay="200">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Pricing Section -->
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Refer & Earn Money</h2>
          <p></p>
        </div>
      <div class="row" data-aos="fade-up" data-aos-delay="200">
        <div class="col-md-6 col-lg-6">
          <img src="assets/img/refer.png" class="img-fluid my-4 py-3">
        </div>
        <div class="col-md-6 col-lg-6 mt-5">
          <h3>Earn Money By Refers to Your Friend.</h3>
          <h5 class="text-muted">Get 10% direct cash money per invited referal.</h5>
          <br>
          <p class="text-muted">Invite your friends to join Careertrackon and earn money.</p>
          <a href="" class="btn btn-primary btn-lg"><i class="fa fa-sign-in"></i> Get Started</a>
        </div>
      </div>
    </section><!-- End Features Section -->
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2 class="text-dark">Testimonials</h2>
          <p class="text-muted">Magnam dolores commodi suscipit eum quidem consectetur velit</p>
        </div>
        <div class="owl-carousel testimonials-carousel" data-aos="fade-up" data-aos-delay="200">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
              <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
              <h3>Sara Wilsson</h3>
              <h4>Designer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
              <h3>Jena Karlis</h3>
              <h4>Store Owner</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
              <h3>Matt Brandon</h3>
              <h4>Freelancer</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
              <h3>John Larson</h3>
              <h4>Entrepreneur</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>Test Series</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>
              <div>
                <i class="ri-mail-send-line"></i>
                <p>info@example.com</p>
              </div>
              <div>
                <i class="ri-phone-line"></i>
                <p>+1 5589 55488 55s</p>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
  <!-- Footer Section -->
  <?php include_once("components/footer.php"); ?>
  <!-- End Footer -->
  <?php include_once("components/footer_links.php"); ?>
  <script type="text/javascript">
    function handleTickInit(tick) {
      var nextYear = (new Date()).getFullYear() + 1;
      Tick.count.down(nextYear + '-01-01').onupdate = function(value) {
        tick.value = value;
      };
    }
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
          items: 4
        }
      }
    });
    $(".clients-carousels").owlCarousel({
      autoplay: true,
      dots: true,
      loop: true,
      responsive: { 0: { items: 4 }, 768: { items: 4 }, 900: { items: 4 }
    }
  });
</script>
</body>
</html>