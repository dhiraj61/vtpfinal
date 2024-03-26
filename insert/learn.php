<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF File Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        body {
  font-family: "Lato", sans-serif;
  width: 100%;
  height: 100vh;
  

}

.sidebar {
  height: 100%;
  width: 0px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;

  padding-top: 5vw;
 
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 150px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
  margin-left:10px;
  position: fixed;
  top:10px;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
  
  
}


/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

        .custom-file-label::after {
            content: "Choose";
        }

        .btn-primary {
            margin-top: 10px;
        }

        /* Custom styles */
        .container {
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        .logout{
      position:fixed;
      top:20px;
      right:10px;
    }
    </style>
</head>
<body>
<div class="logout">
<form action="" method="post">
  <button class="logout" name="logout">Logout</button>
  </form>
</div>
<?php

if(isset($_POST['logout'])){
    session_unset();
    echo "<script>window.open('login.php','_self')</script>";
}
?>
    <?php
    if($_SESSION['email']==true)
    {
        ?>
        <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#" class="time">Time Table</a>
  <a href="learn.php" class="learn">Learning Material</a>
  <a href="learnsee.php" class="learn">Check Learning Material</a>
  <a href="fees.php" class="fees">Fees</a>
  <a href="faculty.php" class="fac">Faculty</a>
  <div class="dropdown">  
  <div class="dropdown-content">
    <a href="#" class="add">Add Faculty</a>
    <a href="#" class="check">Check Faculty</a>
  </div>
 
</div>
<a href="students.php" class="st">Students</a>
  <div class="dropdown">
     <div class="dropdown-content1">
      <a href="#" class="addstud" data-target="#addStudentModal" data-toggle="modal">Add Student</a>
      <a href="#check" class="checkstud">Check Students</a>
    </div>
  </div>
 

</div>
<div id="main">
  <button class="openbtn" onClick="openNav()">☰ Admin Panel</button>
        
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Learning Material</h2>
            <form action="" method="post" enctype="multipart/form-data">
            <?php
// Assuming you have established a database connection already

// Query to fetch unique subjects from the database
$query = "SELECT DISTINCT course FROM students";

$result = mysqli_query(mysqli_connect('localhost','root','','vtpfinal'), $query);

if (!$result) {
    die("Database query failed.");
}
?>

<div class="form-group">
    <label for="courseSelect">Select Course:</label>
    <select class="form-control" id="courseSelect" name="course">
        <?php
        // Loop through the query results and generate option tags
        while ($row = mysqli_fetch_assoc($result)) {
            $course = $row['course'];
            echo "<option value='$course'>$course</option>";
        }
        ?>
    </select>
</div>


                <div class="form-group">
                    <label for="semesterSelect">Select Semester:</label>
                    <select class="form-control" id="semesterSelect" name="semester">
                        <option value="">SELECT SEMESTER</option>
                        <option value="Sem1">Sem1</option>
                        <option value="Sem2">Sem2</option>
                        <option value="Sem3">Sem3</option>
                        <option value="Sem4">Sem4</option>
                        <option value="Sem5">Sem5</option>
                        <option value="Sem6">Sem6</option>
                        <!-- Add more options for semesters as needed -->
                    </select>
                </div>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" id="fileInput" name="file" class="custom-file-input">
                        <label class="custom-file-label" for="fileInput">Choose PDF file</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="fileName" name="name" placeholder="Enter File Name">
                </div>
                <input type="submit" value="Upload" name="upload" class="btn btn-primary btn-block">
            </form>
            <div id="fileList"></div>
        </div>
    </div>
</div>


    <?php
        require('conn.php');
        if(isset($_POST['upload'])){
            $file_name = $_FILES['file']['name'];
            $file_temp = $_FILES['file']['tmp_name'];
            $folder = "imge/".$file_name;
            move_uploaded_file($file_temp, $folder);

            $name = $_POST['name'];
            $course= $_POST['course'];
            $semester= $_POST['semester'];

            $sql = "INSERT INTO material (name, file,course,sem) VALUES ('$name', '$folder','$course','$semester')";
            $res = mysqli_query($con, $sql);

            if($res){
                echo "<script>alert('Data inserted.');</script>";
                echo "<script>window.open('learnsee.php', '_self');</script>";
            }
        }
    ?>
    <?php
    }else{
        session_unset();
        header('location:login.php');
    }
    ?>

    <script src="scr.js">
    </script>
</body>
</html>
