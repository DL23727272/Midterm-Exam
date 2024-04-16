<?php

include 'connect.php';

$studentID = isset($_POST['studentID']) ? $_POST['studentID'] : '';
$saveID = isset($_POST['saveID']) ? $_POST['saveID'] : '';

class Student
{
    public function view_students($con){
    
        $sql_vstud = "SELECT * FROM students";
        $result = mysqli_query($con, $sql_vstud);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr>';
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['lastname'] . "</td>";
                echo "<td>" . $row['firstname'] . "</td>";
                echo "<td>" . $row['middlename'] . "</td>";
                echo "<td>" . $row['civilstatus'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";

                echo '<td>';
                echo ' <button type="submit" name="load_insload" 
							class="btn btn-info edit_data" id="' . $row['id'] . '"  data-toggle="modal" data-target="#edit_data_Modal">
							Edit
						</button>';
                echo '</td>';

                echo '<td>';
                echo '  <button type="submit" name="load_insload"
							class="btn btn-info view_data" id="' . $row['id'] . '"  data-toggle="modal" data-target="#view_data_Modal">
							View
						</button>';
                echo '</td>';

                echo '<td>';
                echo '  <button type="submit" name="load_insload" class="btn btn-danger delete_data " data-studentid="' . $row['id'] . '">
							Delete
					 </button>';
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo "no result";
        }
    }

    public function fetch_student($con, $studentID) {
   
        $sql_fstud = "SELECT * FROM students WHERE id='$studentID'";
        $result = mysqli_query($con, $sql_fstud);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo json_encode($row);
        } else {
            echo "no result";
        }
    }
}



	$student = new Student();

	if ($saveID == 1) {
		$student->fetch_student($con, $studentID);
	} else {
		$student->view_students($con);
	}

	$con->close();
?>
