<?php


require('conn.php');
$id=$_GET['id'];

$sql="delete from Material where  name='$id'";

if(mysqli_query($con,$sql)){
    echo "<script>alert('data deleted successfully')</script>";
    
    echo "<script>window.open('learn.php','_self')</script>";
}




?>