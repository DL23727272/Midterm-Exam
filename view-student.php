<?php
include 'connect.php';
$studentID = $_POST['studentID'];
$saveID = $_POST['saveID'];

class Student
{
    public function view_students($studID)
    {
        global $con;

        $sql_vstud = "SELECT * FROM students WHERE id='$studID'";
        $result = mysqli_query($con, $sql_vstud);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        } else {
            echo json_encode(array("error" => "Student not found"));
        }

        $con->close();
    }
}

$student = new Student();

if ($saveID == 1) {
    $student->view_students($studentID);
} else {
	echo "error";
}
?>
