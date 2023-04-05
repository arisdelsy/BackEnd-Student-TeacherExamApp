<?php
//DB connection
$servername = "sql1.njit.edu";
$username = "ab2473";
$password = "AE(r!}Z4X4";
$dbname = "ab2473";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}  

$username = $_POST['username'];
//$username = "kp55";

//DISPLAY AVAILABLE EXAMS FOR STUDENT
$ungraded_exams = "SELECT ExamName FROM Students_Exam_Status WHERE Uname = '$username' and Reviewed = 'ungraded'";
//$result1 = $conn->query($ungraded_exams);
$result1 = mysqli_query($conn, $ungraded_exams);
$json = mysqli_fetch_all ($result1, MYSQLI_ASSOC);
echo json_encode($json);

?>
