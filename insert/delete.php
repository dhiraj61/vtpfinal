<?php
require('conn.php'); 
$id=$_GET["id"];
$sql="delete from students where id=".$id;

if(mysqli_query($con,$sql)){
    echo "<script>alert('data deleted successfully')</script>";

    echo "<script>window.location.href='students.php'</script>";
}

?>