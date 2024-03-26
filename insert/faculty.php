<?php
session_start();


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
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
 /*.feetxt {
      display: none;
    }

    .wrapper {
      width: 100%;
      height: 100vh;

      display: none;
    }

    .factxt {
      width: 100%;
      height: 100%;
    }

    .cards {
      width: 100%;
      height: 100%;
      margin: 4vw 2vw;
    }

    .card {
      width: 25%;
      height: 40%;
      display: inline-block;
      margin-top: 2vw;
      margin-left: 3vw;
    }

    .card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .students {
      width: 83.5%;
      min-height: 80vh;

      position: relative;
   
    }

    .sem5 {
      width: 100%;
      height: 20vh;

      padding: 1vw 2vw;

      position: relative;
    }

    .sem5 h1 {
      text-align: center;
      font-size: 30px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    i {
      font-size: 20px;
    }

    td {
      font-size: 20px;
    }

    .addition h1>i {
      font-size: 40px;
      color: black;
    }

    .addition h1>i:hover {
      color: teal;
    }

    a {
      text-decoration: none;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;

      display: none;
      z-index: 99;
    }

    .form {
      width: 100%;
      height: 100vh;
      background-color: rgba(0, 0, 0, 0.9);
      margin: 6.5vw auto;
      position: relative;
      display: none;
      color: white;
      padding: 2vw 20vw;
      top: -15%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .cross {
      color: black;
      display: none;
      right: 1%;
      position: absolute;

      width: 2%;
      text-align: center;
    }

    .cross:hover {
      cursor: pointer;
    }

    form {
      width: 100%;
      height: 80%;

      padding: 2vw 3vw;
    } */
    .st{
        color:white;
    }
    .logout{
      position:fixed;
      top:20px;
      right:10px;
    }
    .student{
        width:100%;
        height:100%;
       padding:0 15vw;
       margin-top:3vw;
      /* display:none; */
      
      

}
.display_student{
    display:none;
}
.faculty{
    width:100%;
        height:100%;
       padding:0 15vw;
       margin-top:3vw;
}
.heading{
    width:100%;
        height:100%;
       text-align:center;
       color:black;
       font-weight:900;
       text-decoration:underline;
 
      
}
.tabless{
    margin-top:5vw;
}
table{
    color:rgb(131, 131, 131);
}


i{
    font-size:30px;
}
.display_student{
 margin-top:5vw;
 display:flex;
      align-items:center;
      justify-content:center;
}
tr,td,th{
  border:2px solid black;


     
     
}
.dropdown-content,.dropdown-content1{
display: none;
 
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
  echo "<script>window.open('../login.php','_self')</script>";

}


?>
<?php
if($_SESSION['email'] ==true){
  ?>


<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="time.php" class="time">Time Table</a>
  <a href="learn.php" class="learn">Learning Material</a>
  <a href="fees.php" class="fees">Fees</a>
  <a href="#" class="fac">Faculty</a>
  <div class="dropdown">  
  <div class="dropdown-content">
    <a href="#" class="addfac" data-target="#addStudentModal" data-toggle="modal">Add Faculty</a>
    <a href="#" class="checkfac">Check Faculty</a>
  </div>
 
</div>
<a href="students.php" class="st">Students</a>
  <div class="dropdown">
     <div class="dropdown-content1">
      <a href="#" class="addstud" >Add Student</a>
      <a href="#check" class="checkstud">Check Students</a>
    </div>
  </div>
 

</div>
<div id="main">
  <button class="openbtn" onClick="openNav()">☰ Admin Panel</button>
    <div class="mo">
            <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addStudentModalLabel">Add Faculty</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addStudentForm" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">DOB</label>
                                    <input type="date" class="form-control" id="dob" name="dob"  required>
                                </div>
                                <div class="form-group">
                                    <label for="phone"> Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <textarea class="form-control" id="address" name="address" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="address">Experience:</label>
                                    <input type="number" class="form-control" id="exper" name="exper" required/>
                                </div>
                                    <div class="form-group">
                                    <label for="gender">Department</label>
                                    <select class="form-control" id="department" name="department" required>
                                    <option value="">Select Department</option>
                                        <option value="BCA">BCA</option>
                                        <option value="Bcom">Bcom</option>
                                        <option value="BBA">BBA</option>
                                    </select>
                                </div>
                                                    
                                <div class="form-group">
                                    <label for="gender">Gender:</label>
                                    <select class="form-control" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                              
                                <div class="form-group">
                                    <label for="image">Upload Image:</label>
                                    <input type="file" class="form-control-file" id="image" name="image" required accept="image/*">
                                </div>
                                <input type="submit" class="btn btn-primary" name="insertfac">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <?php

 if(isset($_POST['insertfac'])){
     // Retrieve form data
     $name = $_POST['name'];
     $email = $_POST['email'];
     $dob = $_POST['dob'];
     $phone = $_POST['phone']; 
     $address = $_POST['address'];
     $exper=$_POST['exper'];
     $department = $_POST['department'];
        $gender = $_POST['gender'];
  
     $image = $_FILES['image']['name'];
     $image_tmp = $_FILES['image']['tmp_name'];
     $folder = "imge/" . $image;
     move_uploaded_file($image_tmp, $folder);
 
     // Database connection
     $conn = mysqli_connect('localhost', 'root', '', 'vtpfinal');
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }
 
     // Generate student ID
     $sql = "SELECT MAX(fac_id) AS max_id FROM faculty";
     $checkresult = mysqli_query($conn, $sql);
     if ($checkresult && mysqli_num_rows($checkresult) > 0) {
         $row = mysqli_fetch_assoc($checkresult);
         $max_id = $row['max_id'];
         $id_increment = (int) substr($max_id, 2) + 1;
         $id = "FA" . str_pad($id_increment, 4, '0', STR_PAD_LEFT);
     } else {
         $id = "FA0001"; // Default ID if table is empty
     }
 
     // Insert data into students table
     $insert = "INSERT INTO faculty (fac_id,name, email,dob,phone,address,experience,dep, gender,img) VALUES ('$id','$name', '$email','$dob', '$phone', '$address', '$exper','$department', '$gender','$folder')";
     $result = mysqli_query($conn, $insert);
     if ($result) {
         echo "<script>alert('Data inserted')</script>";
     } else {
         echo "Error: " . $insert . "<br>" . mysqli_error($conn);
     }
 
     // Close connection
     mysqli_close($conn);
 }
 ?>
 








 <div class="faculty">
    <div class="heading">
        <div class="stu"><h1>Faculty</h1></div>

</div>

<div class="display_student">
        <div class="container mt-5">
            <input type="text" class="form-control mb-3" id="searchInput" placeholder="Search...">
            <div class="">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Faculty ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Experience</th>
                            <th>Department</th>
                            <th>Update</th>
                            <th>Delete</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody">
                        <!-- PHP code to fetch and display student records will go here -->
                        <?php
                        require('conn.php');
                        $select = "SELECT * FROM faculty";
                        $result = mysqli_query($con, $select);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['fac_id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['experience'] ?></td>
                                <td><?php echo $row['dep'] ?></td>
                                <td><a href="update2.php?id=<?php echo $row['fac_id'] ?>" class="btn btn-outline-primary">Update</a></td>
                                <td><a href="facdel.php?id=<?php echo $row['fac_id'] ?>" class="btn btn-outline-danger">Delete</a></td>
                                <td><a href="view2.php?id=<?php echo $row['fac_id'] ?>" class="btn btn-outline-success">View</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  



























<?php
}
else{
  echo "<script>window.open('../login.php','_self')</script>";
}
?>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="scr.js"></script>
   
   <script>
     document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('studentTableBody').getElementsByTagName('tr');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            for (let i = 0; i < tableBody.length; i++) {
                const row = tableBody[i];
                let found = false;
                for (let j = 0; j < row.cells.length; j++) {
                    const cellValue = row.cells[j].textContent.toLowerCase();
                    if (cellValue.includes(searchTerm)) {
                        found = true;
                        break;
                    }
                }
                row.style.display = found ? '' : 'none';
               
            }
        });
    });

    var checkfac=document.querySelector('.checkfac');
var faculty=document.querySelector('.faculty');
   
    var addfac=document.querySelector('.addfac');
    console.log(addfac);
    console.log(checkfac);
    checkfac.addEventListener('click', function(){
        faculty.style.display='block';
    });
    addfac.addEventListener('click', function(){
        faculty.style.display='none';
    });

var mo=document.querySelector('.mo');
var fac=document.querySelector('.fac');
var st=document.querySelector('.st');
var dropdown_content=document.querySelector('.dropdown-content');
var dropdown_content1=document.querySelector('.dropdown-content1');
count=1;

fac.addEventListener('click', function(){
  if(count==1){
    dropdown_content.style.display='block';
    count=0;
  }
  else{
    dropdown_content.style.display='none';
    count=1;
  }
   
})
count1=1
st.addEventListener('click', function(){
  if(count1==1){
    dropdown_content1.style.display='block';
    count1=0;
  }
  else{
    dropdown_content1.style.display='none';
    count1=1;
  }
   
})
   </script>
   
</body>
</html> 







