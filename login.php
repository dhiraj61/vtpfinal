<?php

session_start();

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link href="https://fonts.googleapis.com/css2?family=Display+Playfair:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

  <title></title>
  <style>
li{
  list-style-type:none;
}
  </style>
</head>

<body>

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>


  
  <nav class="site-nav mb-5">
    <div class="pb-2 top-bar mb-3">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-lg-9">
            <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> <span class="d-none d-lg-inline-block"></span></a> 
            <a href="#" class="small mr-3"><span class="icon-phone mr-2"></span> <span class="d-none d-lg-inline-block"></span></a> 
            <a href="#" class="small mr-3"><span class="icon-envelope mr-2"></span> <span class="d-none d-lg-inline-block"></span></a> 
          </div>

          <div class="col-6 col-lg-3 text-right">
            <a href="login.html" class="small mr-3">
              <span class="icon-lock"></span>
              Log In
            </a>
            <a href="register.html" class="small">
              
            
            </a>
          </div>

        </div>
      </div>
    </div>
    <div class="sticky-nav js-sticky-header">
      <div class="container position-relative">
        <div class="site-navigation text-center">
          <a href="index.html" class="logo menu-absolute m-0">AcademicFlow<span class="text-primary">.</span></a>

     
                </li>
                <li><a href="#"></a></li>
              </ul>
            </li>
            <li><a href="staff.html"></a></li>
            <li><a href="news.html"></a></li>
            <li><a href="gallery.html"></a></li>
            <li><a href="about.html"></a></li>
            <li class="active"><a href="contact.html"></a></li>
          </ul>

          <a href="#" class="btn-book btn btn-secondary btn-sm menu-absolute">Enroll Now</a>

          <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>

        </div>
      </div>
    </div>
  </nav>
  

  <div class="untree_co-hero inner-page overlay" style="background-image: url('images/img-school-5-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Login</h1>

            </div>
          </div>
        </div>
      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div> <!-- /.untree_co-hero -->




  <div class="untree_co-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-lg-5 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
          <form action="" method="post" class="form-box">
            <div class="row">
              <div class="col-12 mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
              </div>
              <div class="col-12 mb-3">
                <input type="password" class="form-control" placeholder="Password" name="pass">
              </div>

              <!-- <div class="col-12 mb-3">
                <label class="control control--checkbox">
                  <span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked" />
                  <div class="control__indicator"></div>
                </label>
              </div> -->

              <div class="col-12">
                <input type="submit" value="Log In" class="btn btn-primary" name="submit" >
              </div>
            </div>
          </form>
        </div>
      </div>

      
    </div>
  </div> 

  <?php
  include 'conn.php';
  if(isset($_POST['submit'])){

   $email=$_POST['email'];
    $pass=$_POST['pass'];
    if($email=="admin123@gmail.com" && $pass=="admin123"){
      $_SESSION['email']=$email;
      echo "<script>alert('welcome')</script>";
      echo "<script>window.open('./insert/home.php','_self')</script>";
    }
    else{
 
    }
  
  }
  
  ?>
 
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/custom.js"></script>

  </body>

  </html>
