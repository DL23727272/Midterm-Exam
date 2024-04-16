<?php

include 'connect.php';

if (isset($_POST['studentID'], $_POST['lastname'], $_POST['firstname'], $_POST['middlename'], $_POST['course'], $_POST['gender'], $_POST['civilstatus'])) {

    $studentID = mysqli_real_escape_string($con, $_POST['studentID']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($con, $_POST['middlename']);
    $course = mysqli_real_escape_string($con, $_POST['course']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $civilstatus = mysqli_real_escape_string($con, $_POST['civilstatus']);

    if ($studentID > 0) {
        $query = "UPDATE students SET lastname='$lastname', firstname='$firstname', middlename='$middlename', course='$course', gender='$gender', civilstatus='$civilstatus' 
                  WHERE id='$studentID'";
    } else {
        $query = "INSERT INTO students (lastname, firstname, middlename, course, gender, civilstatus) 
                  VALUES ('$lastname', '$firstname', '$middlename', '$course', '$gender', '$civilstatus')";
    }

    if (mysqli_query($con, $query)) {
        echo "Operation successful";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Required POST variables are not set.";
}

$con->close();
?>
