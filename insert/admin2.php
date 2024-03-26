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
}

.sidebar {
  height: 100%;
  width: 0;
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
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
  
  
}

.timetxt{
    display: none;
}
.matetxt{
    display: none;
}
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
.feetxt{
    display:none;
}
.wrapper{
    width: 100%;
    height: 100vh;

    display: none;
}
.factxt{
    width: 100%;
    height: 100%;
   
   
}
.cards{
   
    width: 100%;
    height: 100%;
    margin: 4vw 2vw;
    
 
   
}
.card{
    width: 25%;
    height: 40%;
 display: inline-block;
    margin-top: 2vw ;
    margin-left: 3vw;

  
}
.card img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.students{
  width: 83.5%;
  min-height: 80vh;
 
 
position: relative;
display:none;

}
.sem5{
  width: 100%;
  height: 20vh;

padding:1vw 2vw;

  position: relative;
 

}
.sem5 h1{
  text-align: center;
  font-size: 30px;
  color: white;
  display:flex;
align-items: center;
justify-content: center;
position: relative;
}
i{
  font-size:20px;
  }
  td{
    font-size:20px;
  }
.addition h1>i{
 font-size:40px;
 color:black;
}
.addition h1>i:hover{
  color:teal;

}
a{
  text-decoration:none;
}
.overlay{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;

  display: none;
  z-index: 99;
 
}
.form{
  width: 100%;
  height: 100vh;
 background-color:rgba(0,0,0,0.9);
  margin:6.5vw auto;
position: relative;
  display: none;
 color:white;
 padding:2vw 20vw;
top:-15%;
display:flex;
  align-items: center;
  justify-content: center;
}
.cross{
  color:black;
display:none;
  right:1%;
position:absolute;

background-color:red;
  width: 2%;
  text-align: center;
}
.cross:hover{
  cursor:pointer;
}

form{
  width:100%;
  height:80%;
  background-color:red;
  padding:2vw 3vw;
}
</style>
</head>
<body>
  <?php
  error_reporting(0);
  ?>
   
<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#" class="time">Time Table</a>
  <a href="#" class="learn">Learning Material</a>
  <a href="#" class="fees">Fees</a>
  <a href="#" class="fac">Faculty</a>
  <a href="#" class="st">Students</a>
</div>
<div id="main">
  <button class="openbtn" onclick="openNav()">☰ Admin Panel</button>  
 <div class="timetxt">
    <h1>Time table will be shown here.</h1>
 </div>
 <div class="matetxt">
    <h1>Learning Material</h1>
    <label for="">Choose your file:</label><input type="file" >
    <button>Upload</button>
 </div>
 <div class="feetxt">
    <h1>fees structure will be shown here.</h1>
 </div>
 <div class="wrapper">
    <div class="factxt">
        <div class="cards">
         <div class="card">
            <img src="https://plus.unsplash.com/premium_photo-1671070290395-d53c20ba6ff0?q=80&w=1936&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
         </div>
         <div class="card">
            <img src="https://images.unsplash.com/photo-1571260898938-0fe5057e7208?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
         </div>
         <div class="card">
            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
         </div>
         <div class="card">
            <img src="https://images.unsplash.com/photo-1580894736036-7a68513983ec?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
         </div>
         <div class="card">
            <img src="https://plus.unsplash.com/premium_photo-1671070290395-d53c20ba6ff0?q=80&w=1936&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
         </div>
         <div class="card">
            <img src="https://images.unsplash.com/photo-1571260898938-0fe5057e7208?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
         </div>
         <div class="card">
            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
         </div>
         <div class="card">
            <img src="https://images.unsplash.com/photo-1580894736036-7a68513983ec?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
         </div>
       
        </div>
      </div>
    </div>
</div>
<div class="students" >
  <div class="sem5">
    <h1 style="color:black">Sem 5</h1>


    <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th scope="col">Roll No</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      <th scope="col">Preview</th>
     
      
    </tr>
  </thead>
  <tbody>
 
    <?php
    include 'conn.php';
    $sql="select * from sem5";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){

    ?>
<tr class="table-light" >
     
      <td><?php echo $row['id']?></td>
      <td><?php echo $row['Name']?></td>
      <td><img src="<?php echo $row['Image']?>" width="100px" height="70px" class="rounded" alt=""></td>
      <td><a href=""><i class="ri-edit-box-line"></i></a></td>
      <td><a href=""><i class="ri-delete-bin-5-line"></i></a></td>
      <td><a href="view.php?id=<?php echo $row['id']?>"><i class="ri-eye-line"></i></a></td>
      <?php
    }
    ?>
    
      
    </tr>
   
    
  </tbody>
</table>
<div class="addition">
    <a href="#"><h1><i class="ri-folder-add-line"></i></h1></a>
  </div>
 </div>
 
</div>
<div class="overlay">

  
<div class="form">
<div class="cross">  <h3>x</h3>
  </div>
  <h1 style=" text-align:center;margin-bottom:2vw" >Registration Form</h1>
  

  <?php
    include 'conn.php';
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="">NAME</label>
        <input type="text" placeholder="Name" name="fname"><br><br>
        <label for="">EMAIL</label>
        <input type="text" placeholder="Email" name="email"><br><br>
        <label for="">Upload Your Image</label>
        <input type="file"  name="up" value="up"><br><br>
        <input type="submit" name="submit">

    </form>
    <?php
     error_reporting(0);
    if($_POST["name"]=="" && $_POST["email"]=="" ){
        echo "<script>document.querySelector('input').focus();</script>";
    }
    else{
       
        if(isset($_POST['submit'])) {
            $name = $_POST['fname'];
            $email = $_POST['email'];
            $filename = $_FILES['up']['name'];
            $tmpname = $_FILES['up']['tmp_name'];
            $folder = "images/".$filename;
            move_uploaded_file($tmpname, $folder);
            $sql = "INSERT INTO sem5 (name, email, image) VALUES ('$name', '$email', '$folder')";
            $res = mysqli_query($con, $sql);
            if($res) {
                // Redirect back to the same page with the same class applied
                header("Location: ".$_SERVER['PHP_SELF']."?page=st");
                exit;
            }
        }
       
       

       
    }

    
    
    
    
    ?>









</div>
</div>











<script>
 
 

    var time=document.querySelector('.time');
    var learn=document.querySelector('.learn');
    var fees=document.querySelector('.fees');
    var fac=document.querySelector('.fac');
    var timetxt=document.querySelector('.timetxt');
    var matetxt=document.querySelector('.matetxt');
    var feetxt=document.querySelector('.feetxt');
    var wrapper=document.querySelector('.wrapper');
    var students=document.querySelector('.students');
    var st=document.querySelector('.st');
    var addition=document.querySelector('.addition'); 
    var overlay=document.querySelector('.overlay');
    var form=document.querySelector('.form');
    var cross=document.querySelector('.cross');
   


    time.addEventListener('click',function(){
        timetxt.style.display='block';
        matetxt.style.display='none';
        feetxt.style.display="none";
        wrapper.style.display='none';
     students.style.display="none";


    })
    learn.addEventListener('click',function(){
        matetxt.style.display='block';
        timetxt.style.display='none';
        feetxt.style.display="none";
        wrapper.style.display='none';
     students.style.display="none";
       


    })
    fees.addEventListener('click',function(){
        matetxt.style.display='none';
        timetxt.style.display='none';
        feetxt.style.display="block";
        wrapper.style.display='none';
     students.style.display="none";
       

    })
    fac.addEventListener('click',function(){
      wrapper.style.display='block';
        timetxt.style.display='none';
        matetxt.style.display='none';
        feetxt.style.display="none";
     students.style.display="none";
      

    })
    st.addEventListener('click',function(){
      wrapper.style.display='none';
        timetxt.style.display='none';
        matetxt.style.display='none';
        feetxt.style.display="none";
     students.style.display="block";
      

    })
    addition.addEventListener('click',function(){
     overlay.style.display="block";
     form.style.display="block";
     cross.style.display="block";
      

    })
    cross.addEventListener('click',function(){
     overlay.style.display="none";
     form.style.display="none";
     cross.style.display="none";
      

    })




function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.querySelector(".students").style.marginLeft = "250px";
  document.querySelector(".students").style.transition = "all .4s ease-in-out";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.querySelector(".students").style.marginLeft = "0";
  document.querySelector(".students").style.transition = "all .4s ease-in-out";

}

</script>
   
</body>
</html> 







