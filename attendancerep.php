<?php
session_start();
require('conn.php');

if (isset($_SESSION['email'])) {
    if (isset($_POST['search'])) {
        $course = $_POST['course'];
        $sem = $_POST['sem'];
        $section = $_POST['section'];

        // Use prepared statements to prevent SQL injection
        $sql = "SELECT DISTINCT sub FROM attendence WHERE course='$course' AND semester='$sem' AND sec='$section'";
        $result = mysqli_query($con, $sql);
?>
        <form method="post">
            <label for="">Subject</label>
            <select name="sub" id="">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $row['sub'] ?>"><?php echo $row['sub'] ?></option>
                <?php
                }
                ?>
            </select>

            <input type="text" name="stud_id" placeholder="Enter Student Id" />
            <input type="submit" value="Submit" name="submit" />
        </form>
<?php
    }
    if (isset($_POST['submit'])) {
        $sub = $_POST['sub'];
        $studid = $_POST['stud_id'];
        $sql2 = "SELECT COUNT(atten) AS count FROM attendence WHERE sub='$sub' AND stud_id='$studid' AND atten='p'";
        $result2 = mysqli_query($con, $sql2);

        if ($result2) {
            $row2 = mysqli_fetch_assoc($result2);
            $count2 = $row2['count'];
            echo "Total Present: $count2";
        } else {
            echo "Error in executing SQL: " . mysqli_error($con);
        }

        $sql3 = "SELECT COUNT(atten) AS count FROM attendence WHERE sub='$sub' AND stud_id='$studid'";
        $result3 = mysqli_query($con, $sql3);

        if ($result3) {
            $row3 = mysqli_fetch_assoc($result3);
            $count3 = $row3['count'];
            echo "Total Letcures: $count3";
        } else {
            echo "Error in executing SQL: " . mysqli_error($con);
        }

        $present = $count2 / $count3 * 100;
        echo "<br/>Present Rate is : $present %";
    }
}
?>

<form method='post'>
    <label for="">Course</label>
    <select name="course" id="">
        <option value="BCA">BCA</option>
        <option value="BCOM">BCOM</option>
        <option value="BBA">BBA</option>
    </select>
    <label for="">Semester</label>
    <select name="sem" id="">
        <option value="Sem1">Sem1</option>
        <option value="Sem2">Sem2</option>
        <option value="Sem3">Sem3</option>
        <option value="Sem4">Sem4</option>
        <option value="Sem5">Sem5</option>
        <option value="Sem6">Sem6</option>

    </select>
    <label for="">Section</label>
    <select name="section" id="">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
    </select>
    <input type="submit" name="search" value="search" class="btn btn-primary">
</form>