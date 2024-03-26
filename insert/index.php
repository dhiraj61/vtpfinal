<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'conn.php';
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">NAME</label>
        <input type="text" placeholder="Name" name="name"><br><br>
        <label for="">EMAIL</label>
        <input type="text" placeholder="Email" name="email"><br><br>
        <label for="">Phone Number</label>
        <input type="text" placeholder="Phone Number" name="num"><br><br>
        <label for="">Gender</label>
        <select name="gender" id="">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
<br><br>
<label for="">Address:</label>
        <textarea name="textarea" id="textarea" cols="30" rows="10"></textarea><br><br>
        <label for="">Upload Your Image</label>
        <input type="file"  name="up" value="up"><br><br>
        <input type="submit" name="submit">

    </form>
    <?php
     error_reporting(0);
   
       
   if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (!empty($_POST["name"]) && !empty($_POST["email"])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $num=$_POST['num'];
        $gender=$_POST['gender'];
        $textarea=$_POST['textarea'];

        $filename=$_FILES['up']['name'];
        $tmpname=$_FILES['up']['tmp_name'];
        $folder="images/".$filename;
        move_uploaded_file($tmpname,$folder);
        $sql="insert into students(name,email,phno,gender,address,img) values('$name','$email','$num','$gender','$textarea','$folder')";
        $res=mysqli_query($con,$sql);
        if($res){
           
            echo "<script>alert('data inserted');</script>";
            echo "<script>window.open('index.php','_self');</script>";

        }
       
       

       
    }
   }
    
    
    
    
    ?>
</body>
</html>