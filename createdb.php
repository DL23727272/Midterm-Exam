<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql_create_db = "CREATE DATABASE IF NOT EXISTS dbGamoso";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db("dbGamoso");

$sql_create_table = "CREATE TABLE IF NOT EXISTS students (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(30) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    middlename VARCHAR(30) NOT NULL,
    course VARCHAR(50),
    gender ENUM('Male', 'Female'),
    civilstatus ENUM('Single', 'Married')
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table students created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>
