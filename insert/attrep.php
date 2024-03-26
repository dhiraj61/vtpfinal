<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
.frm2{
  
    text-align:center;
    height:40vw;

}
.frm2>h1{
    font-size:3vw;
}
input,select{
    font-size:1.5vw;
}
label{
    font-size:1.5vw;
}
.frm{
    position:absolute;
    top: 33%;
    left:32%;

}
.maindiv{
    background-color:red;
    width: 100%;
    height: 100vh;
}
.logout{
    position:absolute;
    top: 2%;
    right:2%;
}

    </style>
</head>
<body>
<div class="logout">
<form action="" method="post">
  <button class="logout" class="btn btn-outline-danger" name="logout">Logout</button>
  </form>
</div>

<?php
if(isset($_POST['logout'])){
  session_unset();
  echo "<script>window.open('../login.php','_self')</script>";

}


?>



<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="home.php" class="">HOME</a>

  <a href="time.php" class="time">Time Table</a>
  <a href="learn.php" class="learn">Learning Material</a>
  <a href="fees.php" class="fees">Fees</a>
  <a href="faculty.php" class="fac">Faculty</a>
  <div class="dropdown">  
  <div class="dropdown-content">
    <a href="#" class="add">Add Faculty</a>
    <a href="#" class="check">Check Faculty</a>
  </div>
 
</div>
<a href="#" class="st">Students</a>
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
<?php
session_start();
require('conn.php');

if (isset($_SESSION['email'])) {
    if (isset($_POST['search'])) {
        $course = $_POST['course'];
        $sem = $_POST['sem'];
        $section = $_POST['section'];

     
        $sql = "SELECT DISTINCT sub FROM attendence WHERE course='$course' AND semester='$sem' AND sec='$section'";
        $result = mysqli_query($con, $sql);
?>
<div>
<div class="frm">
        <form method="post">
            <label for="">Subject</label>
            <select name="sub" id="" class="form-control">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row['sub'] ?>"><?php echo $row['sub'] ?></option>
                <?php
                }
                ?>
            </select>

            <input type="text" name="stud_id" placeholder="Enter Student Id" class="form-control" />
            <input type="submit" value="Submit" name="submit" class="btn btn-primary" />
        </form>
        </div>
        
<?php
    }
    if (isset($_POST['submit'])) {
        $sub = $_POST['sub'];
        $studid = $_POST['stud_id'];
        $sql2 = "SELECT COUNT(atten) AS count FROM attendence WHERE sub='$sub' AND stud_id='$studid' AND atten='p'";
        $result2 = mysqli_query($con, $sql2);

        if ($result2) {
            $row2 = mysqli_fetch_assoc($result2);
            $count2 = $row2['count'];
            ?>
            <div style="position:absolute;top:49%;left:40%;">
           <?php echo "Total Present: $count2"; ?> 
            </div>
            <?php
        } else {
            echo "Error in executing SQL: " . mysqli_error($con);
        }

        $sql3 = "SELECT COUNT(atten) AS count FROM attendence WHERE sub='$sub' AND stud_id='$studid'";
        $result3 = mysqli_query($con, $sql3);

        if ($result3) {
            $row3 = mysqli_fetch_assoc($result3);
            $count3 = $row3['count'];
            ?>
            <div style="position:absolute;top:49%;left:50%;">
           <?php echo "Total Lectures: $count3";?> 
            </div>
            <?php
        } else {
            echo "Error in executing SQL: " . mysqli_error($con);
        }

     
   ?>
      <div style="width: 200px; height: 200px;position:absolute;top:50%;left:43%;" >
      <?php
      $present = $count2 / $count3 * 100;
        echo "<br/>Present Rate is : $present %";
        ?>
    <canvas id='myPieChart' width='100' height='100'></canvas>
</div>
<?php
    }
}
?>
</div>
<div class="frm2">

<h1>STUDENTS ATTENDENCE REPORT</h1>
<form method='post'>
    <label for="">Course</label>
    <select name="course" id="" class="form-control">
        <option value="BCA">BCA</option>
        <option value="BCOM">BCOM</option>
        <option value="BBA">BBA</option>
    </select>
    <label for="">Semester</label>
    <select name="sem" id="" class="form-control">
        <option value="Sem1">Sem1</option>
        <option value="Sem2">Sem2</option>
            <option value="Sem3">Sem3</option>
        <option value="Sem4">Sem4</option>
        <option value="Sem5">Sem5</option>
        <option value="Sem6">Sem6</option>
    </select>
    <label for="">Section</label>
    <select name="section" id="" class="form-control">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
    </select>
    <input type="submit" name="search" value="Search" class="btn btn-primary">
</form>
</div>
</div>
<script>
      function openNav() {
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
              }

              // Function to close the sidebar
              function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
              }
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Present', 'Absent'],
            datasets: [{
                label: 'Attendance',
                data: [<?php echo $present; ?>, <?php echo 100 - $present; ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 99, 132, 0.5)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Attendance Percentage'
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                            return previousValue + currentValue;
                        });
                        var currentValue = dataset.data[tooltipItem.index];
                        var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                        return percentage + "%";
                    }
                }
            }
        }
    });
</script>
</body>
</html>
