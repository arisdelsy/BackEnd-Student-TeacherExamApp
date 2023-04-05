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

//GETS ALL THE NAMES OF CURRENT TESTS

$sql = "SELECT * FROM Exam_Names";
$result = mysqli_query($conn, $sql);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json);

/*
$result = $conn->query($sql);

foreach($result as $value)
{
    print_r($value);
    echo "<br>";
}
*/

$conn->close();
?>