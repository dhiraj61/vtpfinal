<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

require('conn.php');

$course_id = $_GET['course_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $students = $_POST['students'];

    foreach ($students as $student_id => $status) {
        $status = mysqli_real_escape_string($conn, $status);
        $sql = "INSERT INTO attendance (student_id, course_id, date, status) VALUES ('$student_id', '$course_id', '$date', '$status')";
        mysqli_query($conn, $sql);
    }
    echo "Attendance marked successfully";
    exit;
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance</title>
</head>
<body>
    <h1>Mark Attendance</h1>
    <form action="" method="post">
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required><br><br>
        <h2>Students:</h2>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <input type="checkbox" name="students[<?php echo $row['student_id']; ?>]" value="present"><?php echo $row['name']; ?><br>
        <?php endwhile; ?>
        <br>
        <input type="submit" value="Submit">
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
