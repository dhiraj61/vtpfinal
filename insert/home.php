<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 5vw;
            color: white;

        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            display: block;
            transition: 0.3s;
            color: grey;
        }

        .sidebar a:hover {
            color: white;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 150px;
            color: white;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
            margin-left: 10px;
            position: fixed;
            top: 10px;

        }

        .openbtn:hover {}

        #main {
            transition: margin-left .5s;
            padding: 16px;
            margin-left: 250px;
        }

        .card {
            margin: 20px;
        }

        a {
            text-decoration: none;
        }

        .dropdown-content,
        .dropdown-content1 {
            display: none;
        }

        .logout {
            position: fixed;
            top: 1vw;
            right: 10px;
        }
    </style>
</head>

<body>

    <div class="logout">
        <form action="" method="post">
            <button class="btn btn-outline-danger logout" name="logout">Logout</button>
        </form>
    </div>

    <?php
    if (isset($_POST['logout'])) {
        session_unset();
        echo "<script>window.open('../login.php','_self')</script>";
    }
    ?>

    <?php
    if ($_SESSION['email'] == true) {
    ?>

        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
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
            <a href="students.php" class="st">Students</a>
            <div class="dropdown">
                <div class="dropdown-content1">
                    <a href="#" class="addstud" data-target="#addStudentModal" data-toggle="modal">Add Student</a>
                    <a href="#check" class="checkstud">Check Students</a>
                </div>
            </div>
        </div>

        <div id="main">
            <button class="openbtn" onclick="openNav()">☰ Admin Panel</button>

            <?php
            require('conn.php');
            $sql = "SELECT COUNT(student_id) AS total_students FROM students";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $totalStudents = $row['total_students'];

            $fac = "SELECT COUNT(fac_id) AS total_fac FROM faculty";
            $result1 = mysqli_query($con, $fac);
            $row1 = mysqli_fetch_array($result1);
            $totalFac = $row1['total_fac'];

            $course = "SELECT COUNT(DISTINCT course) AS cou FROM students";
            $result2 = mysqli_query($con, $course);
            $row2 = mysqli_fetch_array($result2);
            $totalcourse = $row2['cou'];
            ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card bg-primary text-white shadow-lg">
                            <div class="card-body">
                                <h5 class="card-title">Students</h5>
                                <p class="card-text">Total number of Students: <strong><?php echo $totalStudents ?></strong></p>
                                <!-- View Details button for student details modal -->
                                <button class="btn btn-light" id="modalButton">View Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card bg-success text-white shadow-lg">
                            <div class="card-body">
                                <h5 class="card-title">Faculty</h5>
                                <p class="card-text">Total number of Faculty: <strong><?php echo $totalFac ?></strong></p>
                                <button id="facbutton" class="btn btn-light">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card bg-info text-white shadow-lg">
                            <div class="card-body text-center">
                                <h5 class="card-title">Courses</h5>
                                <p class="card-text">Total number of courses: <strong><?php echo $totalcourse ?></strong></p>
                                <a href="#" class="btn btn-light">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Student Details Modal -->

        <?php
    } else {
        header('location:../login.php');
    }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

        <script>
            var fac = document.querySelector('.fac');
            var st = document.querySelector('.st');
            var dropdown_content = document.querySelector('.dropdown-content');
            var dropdown_content1 = document.querySelector('.dropdown-content1');
            var count = 1;

            fac.addEventListener('click', function() {
                if (count == 1) {
                    dropdown_content.style.display = 'block';
                    count = 0;
                } else {
                    dropdown_content.style.display = 'none';
                    count = 1;
                }
            });

            count1 = 1;
            st.addEventListener('click', function() {
                if (count1 == 1) {
                    dropdown_content1.style.display = 'block';
                    count1 = 0;
                } else {
                    dropdown_content1.style.display = 'none';
                    count1 = 1;
                }
            });

            function openNav() {
                document.getElementById("mySidebar").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        </script>
        <div class="modal fade" id="studentDetailsModal" tabindex="-1" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentDetailsModalLabel">Student Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    $query = "SELECT COUNT(student_id) AS count FROM students";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($result);
                    $count = $row['count'];

                    $query1 = "SELECT COUNT(student_id) AS count FROM students WHERE course='BCA'";
                    $result1 = mysqli_query($con, $query1);
                    $row1 = mysqli_fetch_array($result1);
                    $count1 = $row1['count'];

                    $query2 = "SELECT COUNT(student_id) AS count FROM students WHERE course='Bcom'";
                    $result2 = mysqli_query($con, $query2);
                    $row2 = mysqli_fetch_array($result2);
                    $count2 = $row2['count'];

                    $query3 = "SELECT COUNT(student_id) AS count FROM students WHERE course='BBA'";
                    $result3 = mysqli_query($con, $query3);
                    $row3 = mysqli_fetch_array($result3);
                    $count3 = $row3['count'];
                    ?>
                    <div class="modal-body">
                        <p>BCA Students: <?php echo $count1; ?><span id="bcaStudentsCount"></span></p>
                        <p>BCom Students: <?php echo $count2; ?><span id="bcomStudentsCount"></span></p>
                        <p>BBA Students: <?php echo $count3; ?><span id="bbaStudentsCount"></span></p>
                        <p>--------------------------</p>
                        <p>Total Students: <?php echo $count; ?><span id="totalStudentsCount"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // JavaScript to fetch data and display in modal
            document.getElementById("modalButton").addEventListener("click", function() {
                var myModal = new bootstrap.Modal(document.getElementById('studentDetailsModal'), {
                    keyboard: false
                });
                myModal.show();
            });

            // JavaScript to close modal when clicking on close button or cross sign
            var myModal = document.getElementById('studentDetailsModal');
            myModal.addEventListener('hidden.bs.modal', function() {
                var myModal = bootstrap.Modal.getInstance(myModal);
                myModal.hide();
            });
        </script>
        <div class="modal fade" id="studentDetailsModal1" tabindex="-1" aria-labelledby="studentDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="studentDetailsModalLabel">Faculty Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php
                    $query = "SELECT COUNT(fac_id) AS count FROM faculty";
                    $result = mysqli_query($con, $query);
                    $row = mysqli_fetch_array($result);
                    $count = $row['count'];

                    $query1 = "SELECT COUNT(fac_id) AS count FROM faculty WHERE dep='BCA'";
                    $result1 = mysqli_query($con, $query1);
                    $row1 = mysqli_fetch_array($result1);
                    $count1 = $row1['count'];

                    $query2 = "SELECT COUNT(fac_id) AS count FROM faculty WHERE dep='Bcom'";
                    $result2 = mysqli_query($con, $query2);
                    $row2 = mysqli_fetch_array($result2);
                    $count2 = $row2['count'];

                    $query3 = "SELECT COUNT(fac_id) AS count FROM faculty WHERE dep='BBA'";
                    $result3 = mysqli_query($con, $query3);
                    $row3 = mysqli_fetch_array($result3);
                    $count3 = $row3['count'];
                    ?>
                    <div class="modal-body">
                        <p>BCA Faculty: <?php echo $count1; ?><span id="bcaStudentsCount"></span></p>
                        <p>BCom Faculty: <?php echo $count2; ?><span id="bcomStudentsCount"></span></p>
                        <p>BBA Faculty: <?php echo $count3; ?><span id="bbaStudentsCount"></span></p>
                        <p>--------------------------</p>
                        <p>Total Faculty: <?php echo $count; ?><span id="totalStudentsCount"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // JavaScript to fetch data and display in modal
            document.getElementById("facbutton").addEventListener("click", function() {
                var myModal = new bootstrap.Modal(document.getElementById('studentDetailsModal1'), {
                    keyboard: false
                });
                myModal.show();
            });

            // JavaScript to close modal when clicking on close button or cross sign
            var myModal = document.getElementById('studentDetailsModal');
            myModal.addEventListener('hidden.bs.modal', function() {
                var myModal = bootstrap.Modal.getInstance(myModal);
                myModal.hide();
            });
        </script>
</body>

</html>