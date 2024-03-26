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
.heading{
    width:100%;
        height:100%;
       text-align:center;
       color:black;
       font-weight:900;
       text-decoration:underline;
 
      
}
table {
            border-collapse: collapse;
            width: 40%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        td:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }
.tabless{
    margin-top:5vw;
}
table{
    color:rgb(131, 131, 131);
}

.dropdown-content,.dropdown-content1{
    display:none;
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

.logout{
      position:fixed;
      top:20px;
      right:10px;
      background-color:red;
   
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
  <a href="#" class="time">Time Table</a>
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
  <button class="openbtn" onClick="openNav()">☰ Admin Panel</button>
        
</div>

<h2 style="text-align: center;">Timetable Generator for 3 Sections</h2>
    <div style="text-align: center;">
        <label for="subjectInput">Enter Subject Names (comma separated):</label>
        <input type="text" id="subjectInput">
        <button onclick="generateTimetables()">Generate Timetable</button>
    </div>
    <div id="timetables">
       
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

function generateSectionTimetable(sectionName, subjects) {
            const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const hours = ['8:00 AM', '9:00 AM', '10:00 AM', '11:00 AM', '12:00 PM', '1:00 PM'];
            const sectionTable = document.createElement('table');
            const headerRow = document.createElement('tr');
            const headerCell = document.createElement('th');
            headerCell.textContent = sectionName;
            headerCell.colSpan = 8;
            headerRow.appendChild(headerCell);
            sectionTable.appendChild(headerRow);

            const timeHeaderRow = document.createElement('tr');
            const timeHeaderCell = document.createElement('th');
            timeHeaderCell.textContent = 'Time';
            timeHeaderRow.appendChild(timeHeaderCell);
            hours.forEach(hour => {
                const hourHeaderCell = document.createElement('th');
                hourHeaderCell.textContent = hour;
                timeHeaderRow.appendChild(hourHeaderCell);
            });
            sectionTable.appendChild(timeHeaderRow);

            days.forEach(day => {
                const dayRow = document.createElement('tr');
                const dayHeaderCell = document.createElement('th');
                dayHeaderCell.textContent = day;
                dayRow.appendChild(dayHeaderCell);

                hours.forEach(() => {
                    const cell = document.createElement('td');
                    const subjectIndex = Math.floor(Math.random() * subjects.length);
                    cell.textContent = subjects[subjectIndex];
                    cell.setAttribute('contenteditable', 'true'); // Make cell editable
                    dayRow.appendChild(cell);
                });

                sectionTable.appendChild(dayRow);
            });

            return sectionTable;
        }

        function generateTimetables() {
            const timetablesDiv = document.getElementById('timetables');
            timetablesDiv.innerHTML = ''; // Clear existing timetables

            const subjectInput = document.getElementById('subjectInput');
            const subjectNames = subjectInput.value.split(',').map(s => s.trim()); // Get subject names from input field
            const sections = ['Section A', 'Section B', 'Section C'];
            
            if (subjectNames.length < 3) {
                alert('Please provide at least 3 subject names separated by commas.');
                return;
            }

            sections.forEach(section => {
                const sectionTable = generateSectionTimetable(section, subjectNames);
                timetablesDiv.appendChild(sectionTable);
            });
        }
    


</script>
   
</body>
</html> 







