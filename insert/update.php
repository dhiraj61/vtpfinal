<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Student Profile Page Design Example</title>

    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <!--Only for demo purpose - no need to add.-->
    <style>
        body {
            padding: 0;
            margin: 0;
            font-family: 'Lato', sans-serif;
            background-color: #f0f0f0; /* Light grey background */
        }

        .student-profile {
            background-color: #222; /* Darker background */
            padding: 20px 0; /* Adjust padding */
        }

        .student-profile .card {
            border-radius: 10px;
            background-color: #fff; /* White background */
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1); /* Box shadow for depth */
            transition: all 0.3s ease; /* Smooth transition effect */
        }

        .student-profile .card:hover {
            box-shadow: 0px 0px 30px 0px rgba(0,0,0,0.2); /* Increase shadow on hover */
        }

        .student-profile .card .card-header .profile_img {
            width: 250px; /* Increase image width */
            height: 250px; /* Increase image height */
            object-fit: cover;
            margin: 20px auto; /* Adjust margin */
            border: 10px solid #ccc;
            border-radius: 10px;
        }

        .student-profile .card h3 {
            font-size: 24px; /* Increase heading font size */
            font-weight: 700;
            color: #333; /* Dark text color */
            margin-bottom: 0; /* Remove default margin */
        }

        .student-profile .card p {
            font-size: 18px; /* Increase paragraph font size */
            color: #555; /* Slightly darker text color */
            margin-bottom: 0.5rem; /* Adjust spacing between paragraphs */
        }

        .student-profile .table th,
        .student-profile .table td {
            font-size: 16px; /* Increase table font size */
            padding: 10px; /* Adjust padding for better visibility */
            color: #555; /* Slightly darker text color */
        }
        img{
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
  
    </style>
</head>
<body>
		

<?php
include 'conn.php';
$id=$_GET['id'];
$sql="select  * from students where student_id='$id'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

?>
<form action="" method="post" enctype="multipart/form-data">

<div class="student-profile py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6"> <!-- Adjust grid layout to make each card bigger -->
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent text-center">
                        <input type="file" name="image" value="<?php echo $row['img']?>" alt="">
                        <h5 style="margin-top:10px">name:<input type="text" name="name" value="<?php echo $row['name']?>"></h3>
                        <p>Vimal Tormal Poddar BCA and BCom College</p> <!-- College name -->
                    </div>
                    <div class="card-body">
                        <p><strong>Student ID:</strong><?php echo $row['student_id']?></p>
                        <p><strong>Phone Number:</strong> <input type="text" name="phone" value="<?php echo $row['phno']?>"></p>
                        <p><strong>Parents Phone:</strong><input type="text" name="pphone" value="<?php echo $row['pmno']?>"></p>
                        <p><strong>Section:</strong> <input type="text" name="section" value="<?php echo $row['sec']?>"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6"> <!-- Adjust grid layout to make each card bigger -->
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                    </div>
                    <div class="card-body pt-0">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">Student ID</th>
                                <td width="2%">:</td>
                                <td><?php echo $row['student_id']?></td>
                            </tr>
                           
                            <tr>
                                <th width="30%">Email</th>
                                <td width="2%">:</td>
                                <td><input type="email" name="email"  value="<?php echo $row['email']?>"></td>
                            </tr>
                           
                           
                          
                            <tr>
                                <th width="30%">Course</th>
                                <td width="2%">:</td>
                                <td><select name="course" id="" value="<?php echo $row['course']?>">
                                  <option value="">Select Course</option>
                                  <option value="BCA">BCA</option>
                                  <option value="BCOM">BCOM</option>
                                  <option value="BBA">BBA</option>
                                </select></td>
                            </tr>
                            <tr>
                                <th width="30%">Year</th>
                                <td width="2%">:</td>
                                <td><select id="" name="year" value="<?php echo $row['year']?>" required>
                                    <?php

                                       $current_year = date("Y");
                                      for ($year = 1900; $year <= 2099; $year++) {
                                      echo "<option value=\"$year\"";
                                      if ($year == $current_year) {
                                      echo " selected"; 
                                        }
                                      echo ">$year</option>";
                                               }
                                                ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <th width="30%">Semester</th>
                                <td width="2%">:</td>
                                <td> <select  id="semester" name="semester" value="<?php echo $row['semester']?>" required>
                                        <option value="">Select Semester</option>
                                        <option value="Sem1">Sem1</option>
                                        <option value="Sem2">Sem2</option>
                                        <option value="Sem3">Sem3</option>
                                        <option value="Sem4">Sem4</option>
                                        <option value="Sem5">Sem5</option>
                                        <option value="Sem6">Sem6</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <th width="30%">Gender</th>
                                <td width="2%">:</td>
                                <td> <select class="form-control" id="gender" name="gender" value="<?php echo $row['gender']?>" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select></td>
                            </tr>
                            <tr>
                                <th width="30%">Address</th>
                                <td width="2%">:</td>
                                <td><textarea name="address" id="" cols="30" rows="10" value="<?php echo $row['address']?>"></textarea></td>
                               
                            </tr>
                            
                        </table>
                        <tr>
                            <input type="submit" class="btn btn-outline-success" name="update">
                            </tr>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<?php

if(isset($_POST['update'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $pphone = $_POST['pphone'];
  $section = $_POST['section'];
  $course = $_POST['course'];
  $year = $_POST['year'];
  $semester = $_POST['semester'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $image = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $folder = "imge/" . $image;
  move_uploaded_file($image_tmp, $folder);

$sql="update students set name='$name',email='$email',phno='$phone',pmno='$pphone',sec='$section',course='$course',year='$year',semester='$semester',gender='$gender',address='$address',img='$folder' where student_id='$id'";

$res=mysqli_query($con,$sql);

if($res){
  
    echo "<script>window.open('students.php','_self');</script>";
}
}


?>
 

	</body>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</html>