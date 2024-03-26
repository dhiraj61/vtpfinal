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

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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

  <title>College Management System </title>
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
      z-index: 1051; /* Ensure the button is above the modal */
    }
    .circular-button:focus {
      outline: none;
    }
    /* Adjusting the modal content */
    .modal-content {
      border-radius: 0; /* Remove border-radius to make it square */
    }
    .modal-body {
      text-align: center; /* Center aligning content */
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


  
  <nav class="site-nav mb-5" style="min-width:100%" >
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
          // $image=$row['img'];
          
          ?>
            <button type="button" class="circular-button" data-toggle="modal" data-target="#studentProfileModal" style="position:absolute;top:-10px;">
    <img src="<?php echo $row['img']?>" alt="Student Profile Image" style="width:50px;height:50px;border-radius:50%">
</button>

<!-- Modal -->
<div class="modal fade" id="studentProfileModal" tabindex="-1" role="dialog" aria-labelledby="studentProfileModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentProfileModalLabel" style="color:black;width:100%;text-align:center">Student Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
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
            </a>

          </div>

        </div>
      </div>
    </div>
    <div class="sticky-nav js-sticky-header">
      <div class="container position-relative">
        <div class="site-navigation text-center">
          <a href="index.html" class="logo menu-absolute m-0">AcademicFlow<span class="text-primary">.</span></a>

          <ul class="js-clone-nav d-none d-lg-inline-block site-menu">
            <li class="active"><a href="userindex.php">Home</a></li>
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
            <li><a href="userstaff.php">Our Staff</a></li>
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
  

  <div class="untree_co-hero overlay" style="background-image: url('images/hero-img-1-min.jpg');">


    <div class="container">
      <div class="row align-items-center justify-content-center">

        <div class="col-12">

          <div class="row justify-content-center ">

            <div class="col-lg-6 text-center ">
              <!-- <a href="#" href="" data-fancybox data-aos="fade-up" data-aos-delay="0" class="caption mb-4 d-inline-block">Watch the video</a> -->

              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Education is the Mother of Leadership</h1>
              <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="#" class="btn btn-secondary">Explore courses</a></p>

            </div>


          </div>

        </div>

      </div> 
    </div>

  </div> 


  <div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-center mb-3">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0">
          <h2 class="line-bottom text-center mb-4">Browse Top Category</h2>
        </div>
      </div>
      <div class="row align-items-stretch">
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="0">
          <a href="#" class="category d-flex align-items-start h-100">
            <div>
              <i class="uil uil-atom"></i>
            </div>
            <div>
              <h3>Science</h3>
              <span></span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
          <a href="#" class="category d-flex align-items-start h-100">
            <div>
              <i class="uil uil-briefcase"></i>
            </div>
            <div>
              <h3>Business</h3>
              <span>3,234 courses</span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
          <a href="#" class="category d-flex align-items-start h-100">
            <div>
              <i class="uil uil-calculator"></i>
            </div>
            <div>
              <h3>Finance Accounting</h3>
              <span>931 courses</span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#" class="category d-flex align-items-start h-100">
            <div>
              <i class="uil uil-pen"></i>
            </div>
            <div>
              <h3>UI/UX Design</h3>
              <span>2 courses</span>
            </div>
          </a>
        </div>


        <div class="col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="0">
          <a href="#" class="category d-flex align-items-start h-100">
            <div>
              <i class="uil uil-music"></i>
            </div>
            <div>
              <h3>Music</h3>
              <span>9,114 courses</span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
          <a href="#" class="category d-flex align-items-start h-100">
            <div>
              <i class="uil uil-chart-pie"></i>
            </div>
            <div>
              <h3>Marketing</h3>
              <span>2,391 courses</span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
          <a href="#" class="category d-flex align-items-start h-100">
            <div>
              <i class="uil uil-camera"></i>
            </div>
            <div>
              <h3>Photography</h3>
              <span>7,991 courses</span>
            </div>
          </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
          <a href="#" class="category d-flex align-items-start h-100">
            <div>
              <i class="uil uil-circle-layer"></i>
            </div>
            <div>
              <h3>Animation</h3>
              <span>6,491 courses</span>
            </div>
          </a>
        </div>
        

      </div>

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="400">
        <div class="col-lg-8 text-center">
          <p>We have more category here. <a href="#">Browse all</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="services-section">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-4 mb-5 mb-lg-0">

          <div class="section-title mb-3" data-aos="fade-up" data-aos-delay="0">
            <h2 class="line-bottom mb-4">Become an Instructor</h2>
          </div>

          <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live.</p>

          <ul class="ul-check list-unstyled mb-5 primary" data-aos="fade-up" data-aos-delay="200">
            <li>Behind the word Mountains.</li>
            <li>Far far away Mountains.</li>
            <li>Large language Ocean.</li>
          </ul>

          <p data-aos="fade-up" data-aos-delay="300"><a href="#" class="btn btn-primary">Get Started</a></p>

        </div>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="0">
          <figure class="img-wrap-2">
            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?q=80&w=1864&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" class="img-fluid">
            <div class="dotted"></div>
          </figure>

        </div>
      </div>
    </div>
  </div>



  <div class="untree_co-section">
    <div class="container"> 
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0">
          <h2 class="line-bottom text-center mb-4">We Have Best Education</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="feature">
            <span class="uil uil-music"></span>
            <h3>Python Class</h3>
            <p>"Python, known for its simplicity and readability, empowers developers with its vast libraries and versatility, making it a favorite for scripting, web development, and data analysis."</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="feature">
            <span class="uil uil-calculator-alt"></span>
            <h3>C Class</h3>
            <p>"C, the venerable programming language, prized for its efficiency and portability, remains the cornerstone of system programming, embedded systems, and high-performance computing."</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="feature">
            <span class="uil uil-book-open"></span>
            <h3>C++ Class</h3>
            <p>"C++, an extension of C, adds powerful features like object-oriented programming and templates, making it a top choice for game development, system software, and performance-critical applications."</p>
          </div>
        </div>


        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay=100">
          <div class="feature">
            <span class="uil uil-book-alt"></span>
            <h3>Java Class</h3>
            <p>"Java, renowned for its platform independence and strong community support, serves as the backbone of many enterprise-level applications, mobile development, and large-scale systems."</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="feature">
            <span class="uil uil-history"></span>
            <h3>SQL Class</h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="feature">
            <span class="uil uil-headphones"></span>
            <h3>Web Designing</h3>
            <p>"Web designing blends creativity and technical expertise to craft visually appealing and user-friendly websites, encompassing elements like layout, typography, color theory, and user experience design."</p>
          </div>
        </div>
      </div>
    </div> <!-- /.container -->
  </div> <!-- /.untree_co-section -->


  <div class="untree_co-section bg-light">
    <div class="container"> 
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0">
          <h2 class="line-bottom text-center mb-4">The Right Course For You</h2>
          <p>Certainly:

            "Efficiently managing the complexities of college operations, a college management system streamlines administrative tasks, academic processes, and student interactions, fostering a seamless educational experience. From enrollment management to scheduling, grading, and alumni tracking, this digital solution serves as the central hub for all stakeholders, ensuring smooth operations and enhancing overall institutional effectiveness."</p>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="custom-media">
            <a href="#"><img src="https://images.unsplash.com/photo-1525921429624-479b6a26d84d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29sbGVnZXxlbnwwfHwwfHx8MA%3D%3D" alt="Image" class="img-fluid"></a>
            <div class="custom-media-body">
              <div class="d-flex justify-content-between pb-3">
                <div class="text-primary"><span class="uil uil-book-open"></span> <span>43 lesson</span></div>
                <div class="review"><span class="icon-star"></span> <span>4.8</span></div>
              </div>
              <h3>New Courses</h3>
              <p class="mb-4">New courses as the arrival of new Technologies</p>
              <div class="border-top d-flex justify-content-between pt-3 mt-3 align-items-center">
                <div><span class="price">Free</span></div>
                <div><a href="#">Learn More</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="custom-media">
            <a href="#"><img src="https://plus.unsplash.com/premium_photo-1663079426406-1b82fed16a79?q=80&w=1830&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" class="img-fluid"></a>
            <div class="custom-media-body">
              <div class="d-flex justify-content-between pb-3">
                <div class="text-primary"><span class="uil uil-book-open"></span> <span>43 lesson</span></div>
                <div class="review"><span class="icon-star"></span> <span>4.8</span></div>
              </div>
              <h3>Wide Facities</h3>
              <p class="mb-4">Provides best knowledge as well as good computer labs.</p>
              <div class="border-top d-flex justify-content-between pt-3 mt-3 align-items-center">
                <div><span class="price">Free</span></div>
                <div><a href="#">Learn More</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="custom-media">
            <a href="#"><img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1771&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" class="img-fluid"></a>
            <div class="custom-media-body">
              <div class="d-flex justify-content-between pb-3">
                <div class="text-primary"><span class="uil uil-book-open"></span> <span>43 lesson</span></div>
                <div class="review"><span class="icon-star"></span> <span>4.8</span></div>
              </div>
              <h3>Best Teachers</h3>
              <p class="mb-4">Highly qualified teachers</p>
              <div class="border-top d-flex justify-content-between pt-3 mt-3 align-items-center">
                <div><span class="price">Free</span></div>
                <div><a href="#">Learn More</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="untree_co-section pt-0 bg-img overlay" style="background-image: url('https://images.unsplash.com/photo-1607237138185-eedd9c632b0b?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-lg-7">
          <h2 class="text-white mb-3" data-aos="fade-up" data-aos-delay="0">Education for Tomorrow's Leaders</h2>
          <p class="text-white h5 mb-4" data-aos="fade-up" data-aos-delay="100">“The more that you read, the more things you will know, the more that you learn, the more places you’ll go.” —Dr. Seuss</p>
          <p><a href="#" class="btn btn-secondary" data-aos="fade-up" data-aos-delay="200">Enroll Now</a></p>
        </div>
      </div>
    </div>  
  </div> <!-- /.untree_co-section -->

  <div class="untree_co-section">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-lg-5 mb-5">
          <h2 class="line-bottom mb-4" data-aos="fade-up" data-aos-delay="0">About Us</h2>
          <p data-aos="fade-up" data-aos-delay="100"> “A simple but powerful reminder of the positive domino effect a good education can have on many aspects of a person’s life and outlook.”</p>
          <ul class="list-unstyled ul-check mb-5 primary" data-aos="fade-up" data-aos-delay="200">
            <li>Be yourself; everyone else is already taken.</li>
            <li>Perhaps one day it will be pleasing to recall even such hardships.</li>
          
          </ul>

         

          <p data-aos="fade-up" data-aos-delay="200">
            <a href="#" class="btn btn-primary mr-1">Admission</a>
            <a href="#" class="btn btn-outline-primary">Learn More</a>
          </p>
        </div>
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
          <div class="bg-1"></div>
          <a href="" data-fancybox class="video-wrap">
            
            <img src="images/img-school-4-min.jpg" alt="Image" class="img-fluid rounded">
          </a>
        </div>
      </div>
    </div>
  </div> <!-- /.untree_co-section -->

  <div class="untree_co-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0">
          <h2 class="line-bottom text-center mb-4">College News</h2>
          <p>"Vimal Tormal Poddar BCA College Embraces Digital Innovation: In an exciting development, Vimal Tormal Poddar BCA College has announced a pioneering initiative to integrate cutting-edge technology into its curriculum. With a focus on enhancing student learning experiences, the college is set to introduce virtual labs, AI-driven tutorials, and immersive online resources tailored to BCA students. This forward-thinking approach reflects the institution's commitment to staying ahead of the curve and preparing students for success in the digital age."</p>
        </div>
      </div>
      <div class="row align-items-stretch">
        <div class="col-lg-6"  data-aos="fade-up" data-aos-delay="100">
          <div class="media-h d-flex h-100">
            <figure>
              <img src="https://images.unsplash.com/photo-1567168539593-59673ababaae?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image">
            </figure>
            <div class="media-h-body">
              <h2 class="mb-3"><a href="#">Education for Tomorrow's Leaders</a></h2>
              <div class="meta mb-2"><span class="icon-calendar mr-2"></span><span>June 22, 2020</span>  <span class="icon-person mr-2"></span>Admin</div>
              <p>"At the heart of our educational philosophy lies a vision for nurturing tomorrow's leaders. Our curriculum goes beyond textbooks, instilling critical thinking, creativity, and adaptability. We empower students with practical skills, ethical values, and global perspectives, equipping them to navigate the complexities of the modern world with confidence and compassion. Through innovative pedagogy, experiential learning, and a supportive community, we shape not just graduates, but visionary leaders poised to drive positive change in society."</p>
              <p><a href="#">Learn More</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6"  data-aos="fade-up" data-aos-delay="200">
          <div class="media-h d-flex h-100">
            <figure>
              <img src="https://images.unsplash.com/photo-1504817343863-5092a923803e?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image">
            </figure>
            <div class="media-h-body">
              <h2 class="mb-3"><a href="#">Enhance Your Carrer</a></h2>
              <div class="meta mb-2"><span class="icon-calendar mr-2"></span><span>June 22, 2020</span>  <span class="icon-person mr-2"></span>Admin</div>
              <p>Education is the key to success.</p>
              <p><a href="#">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- /.untree_co-section -->





  <div class="untree_co-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">

          <h3 class="line-bottom mb-4">Testimonials</h3>
          <div class="owl-carousel wide-slider-testimonial">
            <div class="item">
              <blockquote class="block-testimonial">

                <p>
                &ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                <div class="author">
                  <img src="images/person_1.jpg" alt="Free template by TemplateUX">
                  <h3>John Doe</h3>
                  <p class="position">CEO, Founder</p>
                </div>
              </blockquote>
            </div>

            <div class="item">
              <blockquote class="block-testimonial">

                <p>
                &ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.&rdquo;</p>
                <div class="author">
                  <img src="images/person_2.jpg" alt="Free template by TemplateUX">
                  <h3>James Woodland</h3>
                  <p class="position">Designer at Facebook</p>
                </div>
              </blockquote>
            </div>

            <div class="item">
              <blockquote class="block-testimonial">

                <p>
                &ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
                <div class="author">
                  <img src="images/person_3.jpg" alt="Free template by TemplateUX">
                  <h3>Rob Smith</h3>
                  <p class="position">Product Designer at Twitter</p>
                </div>
              </blockquote>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="untree_co-section">


    <div class="container">
      <div class="row">
       
        <div class="col-lg-7 ml-auto" data-aos="fade-up" data-aos-delay="100">
          <h3 class="line-bottom mb-4">Why Choose Us</h3>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>

          <div class="custom-accordion" id="accordion_1">
            <div class="accordion-item">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Good Teachers and Staffs</button>
              </h2>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                <div class="accordion-body">
                  <div class="d-flex">
                    <div class="accordion-img mr-4">
                      <img src="https://images.unsplash.com/photo-1567168544999-b8ca00a3d9c2?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image" class="img-fluid">
                    </div>
                    <div>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                      <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- .accordion-item -->

            <div class="accordion-item">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">We Value Good Characters</button>
              </h2>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                <div class="accordion-body">
                  <div class="d-flex">
                    <div class="accordion-img mr-4">
                      <img src="images/img-school-2-min.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div>
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                      <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- .accordion-item -->
            <div class="accordion-item">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Your Children are Safe</button>
              </h2>

              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion_1">
                <div class="accordion-body">
                  <div class="d-flex">
                    <div class="accordion-img mr-4">
                      <img src="images/img-school-3-min.jpg" alt="Image" class="img-fluid">
                    </div>
                    <div>
                      <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>
                      <p>Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                    </div>
                  </div>

                </div>
              </div>

            </div> <!-- .accordion-item -->

          </div>

        </div>
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
          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
          </div>
        </div>
      </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
<?php
  }
  else{
    session_unset();
    echo "<script>window.open('login.php','_self')</script>";
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  </body>

  </html>
