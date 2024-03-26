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


  <title></title>
  <style>
         .logout{
      position : fixed;
      right : 10px;
      top:5px;

    }

.circular-button {
      position: fixed;
      bottom: 20px;
      right: 20px;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      background-color: #007bff;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      border: none;
      cursor: pointer;
      z-index: 999999; 
    }
    .circular-button:focus {
      outline: none;
    }
  
    .modal-content {
      border-radius: 0; 
    }
    .modal-body {
      text-align: center; 
    }
    .image-container {
      width: 150px;
      height: 150px;
      border: 2px solid black;
      border-radius: 0;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 20px;
    }
    .profile-image {
      max-width: 100%;
      max-height: 100%;
      display: block;
      margin: auto;
    }
  </style>
</head>

<body>
<?php
  if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    echo "<script>window.open('login.php','_self');</script>";
  }
  
  ?>
<?php

if($_SESSION['studentid']==true)
{
$id=$_SESSION['studentid'];
  ?>
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

          <div class="col-6 col-lg-3 text-right"  >
            <a href="#" class="small mr-3" >
              <div style="display:flex;align-items:center;justify-content:center;gap:2px;margin-left:2vw;">
              <span class="icon-lock" name="logout"></span>
            <form action="" method="post">
              <input type="submit" name="logout" value="logout" style="background:none;border:none;color:white;">
            </form> 
            
          <?php
          
          $select="select * from students where student_id='$id'";
          $result=mysqli_query(mysqli_connect('localhost','root','','vtpfinal'),$select);
          $row=mysqli_fetch_assoc($result);
          $image=$row['img'];
          
          ?>
            <button type="button" class="circular-button bt" data-toggle="modal" data-target="#studentProfileModal" style="position:absolute;top:-10px;">
    <img src="<?php echo $row['img']?>" alt="Student Profile Image" style="width:50px;height:50px;border-radius:50%">
</button>

<!-- Modal -->
<div class="modal fade" id="studentProfileModal" tabindex="-1" role="dialog" aria-labelledby="studentProfileModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentProfileModalLabel" style="color:black;width:100%;text-align:center">Student Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="clos">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="image-container">
          <img class="profile-image" src="<?php echo $row['img']?>" alt="Student Profile Image">
        </div>
        <table class="table table-bordered">
  <tbody>
    <tr>
      <th scope="row">Student ID</th>
      <td><?php echo $row['student_id']?></td>
    </tr>
    <tr>
      <th scope="row">Name</th>
      <td><?php echo $row['name']?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?php echo $row['email']?></td>
    </tr>
    <tr>
      <th scope="row">Phone</th>
      <td><?php echo $row['phno']?></td>
    </tr>
    <tr>
      <th scope="row">Parents Phone</th>
      <td><?php echo $row['pmno']?></td>
    </tr>
    <tr>
      <th scope="row">Gender</th>
      <td><?php echo $row['gender']?></td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $row['address']?></td>
    </tr>
    <tr>
      <th scope="row">Section</th>
      <td><?php echo $row['sec']?></td>
    </tr>
    <tr>
      <th scope="row">Semester</th>
      <td><?php echo $row['semester']?></td>
    </tr>
    <tr>
      <th scope="row">Course</th>
      <td><?php echo $row['course']?></td>
    </tr>
  </tbody>
</table>
 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


        </div>
      </div>
    </div>
    <div class="sticky-nav js-sticky-header">
      <div class="container position-relative">
        <div class="site-navigation text-center">
          <a href="index.html" class="logo menu-absolute m-0">AcademicFlow<span class="text-primary">.</span></a>

          <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
            <li><a href="userindex.php">Home</a></li>
            <li class="has-children">
              <a href="#">Facilities</a>
              <ul class="dropdown">
                <li><a href="userelements.php">Learning Material</a></li>
                <li class="has-children">
                  <a href="#">Courses</a>
                  <ul class="dropdown">
                    <li><a href="#">B.com</a></li>
                    <li><a href="#">Bca</a></li>
                    <li><a href="#">B.Ed</a></li>
                  </ul>
                </li>
                <li><a href="#">Fees</a></li>
              </ul>
            </li>
            <li class="active"><a href="staff.php">Our Staff</a></li>
            <li><a href="usernews.php">News</a></li>
            <li><a href="usergallery.php">Gallery</a></li>
            <li><a href="userabout.php">About</a></li>
            <li><a href="usercontact.php">Contact</a></li>
          </ul>



          <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
          </a>

        </div>
      </div>
    </div>
  </nav>
  

  <div class="untree_co-hero overlay" style="background-image: url('images/img-school-3-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">School Staff</h1>
              <div class="mb-5 text-white desc mx-auto" data-aos="fade-up"
              data-aos-easing="ease-out-cubic"
              data-aos-duration="2000">
              
              <p  class=" text-white">Teachers are the one who can make the bright future</p>
              </div>

              <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="#" class="btn btn-secondary">Explore courses</a></p>

            </div>


          </div>

        </div>

      </div> 
    </div> 

  </div> 

  <div class="untree_co-section bg-light">
    <div class="container">
    <div class="row" >
<?php
$sql="select * from faculty";
$qu=mysqli_query(mysqli_connect('localhost','root','','vtpfinal'),$sql);

while ($row = mysqli_fetch_array($qu)){
  ?>
   
        <div class="col-12 col-sm-6 col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="0" >
          <div class="staff text-center">
            <div class="mb-4"><img src="<?php echo $row['img']?>" alt="Image" class="img-fluid"></div>
            <div class="staff-body">
              <h3 class="staff-name"><?php echo $row['name']?></h3>
              <span class="d-block position mb-4"></span>
              <p class="mb-4"></p>
              
            </div>
          </div>
        </div>
         
          <?php
}

?>
     </div> 
    </div>
  </div> <!-- /.untree_co-section -->

  <div class="site-footer">


    <div class="container">

      <div class="row">
        <div class="col-lg-3 mr-auto">
          <div class="widget">
            <h3>About Us<span class="text-primary">.</span> </h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div> <!-- /.widget -->
          <div class="widget">
            <h3>Connect</h3>
            <ul class="list-unstyled social">
              <li><a href="#"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
              <li><a href="#"><span class="icon-pinterest"></span></a></li>
              <li><a href="#"><span class="icon-dribbble"></span></a></li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-3 -->

        <div class="col-lg-2 ml-auto">
          <div class="widget">
            <h3>Projects</h3>
            <ul class="list-unstyled float-left links">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">HTML5</a></li>
              <li><a href="#">CSS3</a></li>
              <li><a href="#">jQuery</a></li>
              <li><a href="#">Bootstrap</a></li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-3 -->

        <div class="col-lg-3">
          <div class="widget">
            <h3>Gallery</h3>
            <ul class="instafeed instagram-gallery list-unstyled">
              <li><a class="instagram-item" href="images/gal_1.jpg" data-fancybox="gal"><img src="images/gal_1.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_2.jpg" data-fancybox="gal"><img src="images/gal_2.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_3.jpg" data-fancybox="gal"><img src="images/gal_3.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_4.jpg" data-fancybox="gal"><img src="images/gal_4.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_5.jpg" data-fancybox="gal"><img src="images/gal_5.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_6.jpg" data-fancybox="gal"><img src="images/gal_6.jpg" alt="" width="72" height="72"></a>
              </li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-3 -->


        <div class="col-lg-3">
          <div class="widget">
            <h3>Contact</h3>
            <address>43 Raymouth Rd. Baltemoer, London 3910</address>
            <ul class="list-unstyled links mb-4">
              <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
              <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
              <li><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-3 -->

      </div> <!-- /.row -->

      <div class="row mt-5">
        <div class="col-12 text-center">
          <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
          </div>
        </div>
      </div>
    </div>

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <?php
}else{
  header("location:userlogin.php");
}
    ?>

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
<script>
   var sticky_nav=document.querySelector('.sticky-nav');
var bt=document.querySelector('.bt');
var clos=document.querySelector('.clos');
console.log(bt);
bt.addEventListener('click',function(){
  sticky_nav.style.display="none";
});
clos.addEventListener('click',function(){
  sticky_nav.style.display="block";
})
console.log(sticky_nav);
</script>
  </body>

  </html>
