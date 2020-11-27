<?php
if(!defined("HEADER")){
  exit("<script>window.location.href='../index.php';</script>");
}
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container-fluid d-flex align-items-center">
    <div class="logo mr-auto">
      <!-- <h1 class=""><a href="index.php"><span>Test </span>Series</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php"><img src="assets/images/logo.png" alt="logo"></a>
    </div>
    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="<?= WEB_ROOT ?>#about">About</a></li>
         <li class="drop-down"><a href="">Test Series</a>
          <ul>
            <li><a href="<?= WEB_ROOT ?>#services">Latest Exams Test Series</a></li>
            <li><a href="<?= WEB_ROOT ?>#testimonials">Live Test Series</a></li>
          </ul>
        </li>
        <li><a href="#exam-categories">Exam Categories</a></li>
        <li><a href="<?= WEB_ROOT ?>#pricing">Pricing</a></li>
        <li><a href="<?= WEB_ROOT ?>#features">Refers & Earn</a></li>
        
        <li><a href="<?= WEB_ROOT ?>#contact">Contact</a></li>

        <?php if(isset($_SESSION['login']) && $_SESSION['login'] == true) { 
          $myfname = $_SESSION['first_name'];
          $mylname = $_SESSION['last_name'];
          $mygender = $_SESSION['gender'];
          $myavatar = $_SESSION['avatar'];
          ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle font-weight-bold waves-effect waves-button waves-classic" data-toggle="dropdown">
              <span class="user-name"><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span>
              <?php 
              if ($myavatar == NULL) {
                print' <img class="img-circle avatar"  width="40" height="40" src="assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
              }else{
                echo '<img width="40" height="40" src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle avatar"  alt="'.$myfname.'"/>'; 
              }
              ?>
            </a>
            <ul class="dropdown-menu dropdown-list" role="menu">
              <li role="presentation"><a href="student/profile.php"><i class="fa fa-user"></i>&nbsp;&nbsp;Profile</a></li>
              <li role="presentation"><a href="student/logout.php"><i class="fa fa-sign-out m-r-xs"></i>&nbsp;&nbsp;Log out</a></li>
            </ul>
          </li>

        <?php }else{ ?>
          <li class="get-started-outline"><a href="<?= WEB_ROOT ?>login.php">Login</a></li>
          <li class="get-started"><a href="<?= WEB_ROOT ?>register.php">Register</a></li>
        <?php } ?>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->