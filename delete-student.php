<?php

include 'connect.php';

if (isset($_POST['studentID'])) {
    $studentID = $_POST['studentID'];

    $query = "DELETE FROM students WHERE id='$studentID'";

    if (mysqli_query($con, $query)) {
        echo "Student deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Student ID not provided.";
}

$con->close();

?>
