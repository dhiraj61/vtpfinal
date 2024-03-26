<?php


require('conn.php');
$id=$_GET['id'];

$sql="delete from students where  student_id='$id'";

if(mysqli_query($con,$sql)){
    echo "<script>alert('data deleted successfully')</script>";
    
    echo "<script>window.open('students.php','_self')</script>";
}




?>