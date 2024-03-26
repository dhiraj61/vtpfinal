<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF File Management</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <style>
    body {
    font-family: Arial, sans-serif;
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
body {
    font-family: Arial, sans-serif;
}

.file-item {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
}

.file-icon {
    font-size: 30px;
    margin-right: 10px;
}
.hello{
    display:flex;
    align-items: center;
    gap:1vw;
}
i{
    font-size:3vw;
}
h5{
    font-size:2vw;
}

</style>
</head>
<body>
   
<h2 class="text-center mb-4">PDF File Management</h2>
<button class="btn btn-primary" onClick="goback()">BACK</button>


    <?php 
    require('conn.php');
    $sql="select * from material";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
        ?>
        <div class="container">
        <div class="card mx-auto" style="width: 18rem;">
            <div class="card-body">
                <div class="hello">
            <i class="ri-file-pdf-2-line"></i>
                <h5 class="card-title"><?php echo $row['name']?></h5>
                </div>
                <a href="<?php echo $row['file']?>" class="btn btn-primary mr-2">View</a>
             <a href="del.php?id=<?php echo $row['name']?>"><input type="submit" name="delete" value="DELETE" class="btn btn-danger"></a>
            </div>
        </div>
    </div>
   
    <?php
    }

require('conn.php');
    if(isset($_POST['delete'])){
     echo "<script>window.open('del.php','_self');</script>";
    }
    
    ?>
    <script>
        function goback(){
            window.open('learn.php','_self');
        }
    </script>
</body>
</html>
