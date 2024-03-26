<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="idgen">id_generator</label>
        <input type="text" id="idgen" name="idgen"><br><br>
        <label for="fname">Name</label>
        <input type="text" id="fname" name="fname"><br><br>
        <input type="submit" name="submit">
    </form>
 <?php
 if(isset($_POST['submit'])){
    $name = $_POST['fname'];
    $conn = mysqli_connect('localhost', 'root', '', 'pract');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT MAX(id_gen) AS max_id FROM idgen";
    $checkresult = mysqli_query($conn, $sql);
    if ($checkresult && mysqli_num_rows($checkresult) > 0) {
        $row = mysqli_fetch_assoc($checkresult);
        $max_id = $row['max_id'];
        $id_increment = (int) substr($max_id, 2) + 1;
        $id = "ST" . str_pad($id_increment, 4, '0', STR_PAD_LEFT);
    } else {
        $id = "ST0001"; // Default ID if table is empty
    }
    $insert = "INSERT INTO idgen (id_gen,name) VALUES ('$id', '$name')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        echo "<script>alert('Data inserted')</script>";
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
 }
 ?>
</body>
</html>
