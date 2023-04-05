<?php
$servername = "sql1.njit.edu";
$username = "ab2473";
$password = "AE(r!}Z4X4";
$dbname = "ab2473";

$con = new mysqli($servername, $username, $password, $dbname);

//GETS ALL OF THE TEST QUESTIONS
$sql = "SELECT * FROM Test_Questions";
$result = mysqli_query($con, $sql);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json);
?>
