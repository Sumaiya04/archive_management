<?php
$PID=$_GET['pid'];
$UID=$_GET['uid'];
$ConVal=$_GET['conval'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "based";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE tms_student_publication SET tms_student_publication.contribution='$ConVal' WHERE tms_student_publication.publication_id='$PID' AND tms_student_publication.student_id='$UID'";
$result = $conn->query($sql);
echo $ConVal;
$conn->close();
?>
