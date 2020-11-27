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
        <img src="assets/img/rrb.png" class="img-fluid test-series-front mb-4">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" style="color:white;">
          <h1 data-aos="fade-up" class="text-white">RRB NTPC CBT 1</h1>
          <p data-aos="fade-up" data-aos-delay="400" style="font-size:15px;">Railway Recruitment Board (RRB) conducts Non Technical Popular Categories (NTPC) exam to recruit Commercial apprentice, Goods guard, Traffic Apprentice, Traffic Assistant, Assistant Station Master etc. all over India.</p>
          <p class="text-warning mb-5">Exam Date - 15 DEC 2020 (Tentative)</p>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  <div class="join container" style="background:#1b2162;">
    <div class="container row" style="padding-top:3%">
      <div class="col-md-2 col-sm-6 col-6 d-flex"><a href="#services" class="text-white"><i class='fa fa-th-large'></i> Test Series</a></div>
      <div class="col-md-2 col-sm-6 col-6 d-flex"><a href="" class="text-white"><i class='fa fa-info-circle'></i> About Exam</a></div>
      <div class="col-md-2 col-sm-6 col-6 d-flex dropdown" ><a href="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="text-white dropdown-toggle"><i class='fa fa-file-text-o'></i> Syllabus</a>
        <div class="dropdown-menu mt-4" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#"><small>Hindi Syllabus</small></a>
          <a class="dropdown-item" href="#"><small>English Syllabus</small></a>
        </div>
      </div>
      <div class="col-md-2 col-sm-6 col-6 d-flex"><a href="#about" class="text-white"><i class='fa fa-list'></i> Exam Pattern</a></div>
      <div class="col-md-2 col-sm-6 col-6 d-flex"><a href="#features" class="text-white"><i class='fa fa-file-o'></i> Previous Papers</a></div>
      <div class="col-md-2 col-sm-6 col-6 d-flex"><a href="" class="text-white"><i class='fa fa-book'></i> Study Material</a></div>
    </div>
  </div>

  <main id="main" class=" bg-light">
        <!-- ======= Services Section ======= -->
    <section id="services" class="services" class="mb-0 pb-0">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Test Series</h2>
          <p>Join Our Test series to crack the exams</p>
        </div>
        <div class="row">
          <div class="row col-lg-8 col-md-8">
              <div class="col-lg-7 col-md-7">
                <img src="assets/img/wide-test-series.png" class="img-fluid">
              </div>
               <div class="col-md-5 col-lg-5 pt-5" style="font-size:18px;">
                  <p><i class="fa fa-check text-success"></i> 10 Full Length Mock Tests</p>
                  <p><i class="fa fa-check text-success"></i> 1 Free Full Length Mock Test</p>
                  <p><i class="fa fa-check text-success"></i> Full Solution with Explanation</p>
                  <div class="py-4">
                  <a href="" class="btn btn-primary">Unlock &#8377; 399/-</a>
                </div>
                </div>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="col-md-12 col-lg-12 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box p-3 mt-4 w-100" data-aos="fade-up" data-aos-delay="100">
              <div class="mb-3"><img src="assets/img/rrb.png" style="" class="img-fluid center-block d-block mx-auto"></div>
              <h4 class="title text-center"><a href="">RRB NTPC CBT 1</a></h4>
              <p class="text-center" style="font-size:14px;">Mock Test 1 <span class="badge badge-success">Free</span></p>
              <a href='' class="btn btn-block btn-primary mb-4">Start Now</a>
            </div>
          </div>
          </div>
        </div>
   
      </div>
      <div class="container mt-5">
         <div class="pb-3"><h3><i class="fa fa-th-large"></i> Mock Tests</h3></div>
      <div class="mock-test-card col-md-8 p-2 mb-2 shadow-sm bg-white" style="border:1px solid #DDD;border-radius:10px;">
        <div class="row pt-2">
          <div class="mock-test-icon col-md-2">
            <img src="assets/img/rrb.png" style="max-width:70%;max-height:auto;" class="img-fluid center-block d-block mx-auto">
          </div>
          <div class="col-md-10 center-block d-block mx-auto mock-test-desc">
            <a href="" class="btn btn-outline-primary pull-right mt-4"><i class="fa fa-lock"></i> Unlock</a>
            <h5 style="font-size:14px">RRB NTPC CBT 1</h5>
            <h6 style="font-size:13px" class="text-success">Mock Test 2</h6>
            <div class="row" style="font-size:12px;">
              <p class=""><i class="fa fa-question-circle-o"></i> Total Questions: 100</p>
              <span>&nbsp;|&nbsp;</span>
              <p><i class="fa fa-clock-o"></i> Duration: 90 Min</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mock-test-card col-md-8 p-2 mb-2 shadow-sm bg-white" style="border:1px solid #DDD;border-radius:10px;">
        <div class="row pt-2">
          <div class="mock-test-icon col-md-2">
            <img src="assets/img/rrb.png" style="max-width:70%;max-height:auto;" class="img-fluid center-block d-block mx-auto">
          </div>
          <div class="col-md-10 center-block d-block mx-auto mock-test-desc">
            <a href="" class="btn btn-outline-primary pull-right mt-4"><i class="fa fa-lock"></i> Unlock</a>
            <h5 style="font-size:14px">RRB NTPC CBT 1</h5>
            <h6 style="font-size:13px" class="text-success">Mock Test 2</h6>
            <div class="row" style="font-size:12px;">
              <p class=""><i class="fa fa-question-circle-o"></i> Total Questions: 100</p>
              <span>&nbsp;|&nbsp;</span>
              <p><i class="fa fa-clock-o"></i> Duration: 90 Min</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mock-test-card col-md-8 p-2 mb-2 shadow-sm bg-white" style="border:1px solid #DDD;border-radius:10px;">
        <div class="row pt-2">
          <div class="mock-test-icon col-md-2">
            <img src="assets/img/rrb.png" style="max-width:70%;max-height:auto;" class="img-fluid center-block d-block mx-auto">
          </div>
          <div class="col-md-10 center-block d-block mx-auto mock-test-desc">
            <a href="" class="btn btn-outline-primary pull-right mt-4"><i class="fa fa-lock"></i> Unlock</a>
            <h5 style="font-size:14px">RRB NTPC CBT 1</h5>
            <h6 style="font-size:13px" class="text-success">Mock Test 2</h6>
            <div class="row" style="font-size:12px;">
              <p class=""><i class="fa fa-question-circle-o"></i> Total Questions: 100</p>
              <span>&nbsp;|&nbsp;</span>
              <p><i class="fa fa-clock-o"></i> Duration: 90 Min</p>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section><!-- End Services Section -->
    <section id="about" class="mb-0 pb-0">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>RRB NTPC CBT-1 Exam Pattern</h2>
        </div>
        <div>
          <table class="table table-bordered">
            <tr>
              <th>Sections</th>
              <th>No. of Questions</th>
              <th>Total Marks</th>
              <th >Duration</th>
            </tr>
            <tr>
              <td>Mathematics</td>
              <td>30</td>
              <td>30</td>
              <td rowspan="4"><br><br>90 minutes</td>
            </tr>
            <tr>
              <td>General Intelligence and Reasoning</td>
              <td>30</td>
              <td>30</td>
            </tr>
            <tr>
              <td>General Awareness</td>
              <td>40</td>
              <td>40</td>
            </tr>
            <tr>
              <td>Total</td>
              <td>100</td>
              <td>100</td>
            </tr>
          </table>
          <p class="text-justify font-weight-bold">Minimum percentage of marks for eligibility in various categories: UR-40%, EWS40%, OBC (Non creamy layer) -30%, SC-30%, ST-25%. These percentages of marks for eligibility may be relaxed by 2% for PwBD candidates in case of shortage of PwBD candidates against vacancies reserved for them.</p>
        </div>
      </div>
    </section>
    <section id="features" >
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Previous Year Papers</h2>
        </div>
        <div>
          <table class="table table-bordered">
            <tr>
              <th>Exam</th>
              <th>Year</th>
              <th>Paper</th>
            </tr>
            <tr>
              <td rowspan="3"><br><br>RRB NTPC</td>
              <td>2016</td>
              <td><a href="" class=""><i class="fa fa-download"></i> Download</a></td>
            </tr>
            <tr>
              <td>2014</td>
              <td><a href="" class=""><i class="fa fa-download"></i> Download</a></td>
            </tr>
            <tr>
              <td>2012</td>
              <td><a href="" class=""><i class="fa fa-download"></i> Download</a></td>
            </tr>
          </table>
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