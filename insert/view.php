<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
<div class="student-profile py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6"> <!-- Adjust grid layout to make each card bigger -->
                <div class="card shadow-sm">
                    <div class="card-header bg-transparent text-center">
                        <img class="profile_img" src="<?php echo $row['img']?>" alt="" width="100%" height="100%">
                        <h3><?php echo $row['name']?></h3>
                        <p>Vimal Tormal Poddar BCA and BCom College</p> <!-- College name -->
                    </div>
                    <div class="card-body">
                        <p><strong>Student ID:</strong> <?php echo $row['student_id']?></p>
                        <p><strong>Phone Number:</strong> <?php echo $row['phno']?></p>
                        <p><strong>Parents Phone:</strong> <?php echo $row['pmno']?></p>
                        <p><strong>Section:</strong> <?php echo $row['sec']?></p>
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
                                <td><?php echo $row['email']?></td>
                            </tr>
                           
                           
                          
                            <tr>
                                <th width="30%">Course</th>
                                <td width="2%">:</td>
                                <td><?php echo $row['course']?></td>
                            </tr>
                            <tr>
                                <th width="30%">Year</th>
                                <td width="2%">:</td>
                                <td><?php echo $row['year']?></td>
                            </tr>
                            <tr>
                                <th width="30%">Semester</th>
                                <td width="2%">:</td>
                                <td><?php echo $row['semester']?></td>
                            </tr>
                            <tr>
                                <th width="30%">Gender</th>
                                <td width="2%">:</td>
                                <td><?php echo $row['gender']?></td>
                            </tr>
                            <tr>
                                <th width="30%">Address</th>
                                <td width="2%">:</td>
                                <td><?php echo $row['address']?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
