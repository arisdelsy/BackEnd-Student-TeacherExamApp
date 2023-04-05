<?php

// GETS THE FINAL GRADES OF STUDENTS 
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


/*
Grab using question id 
Student Answer
Real Answer
T1
T2
T3
Points Earned 
Comments 
Feedback
*/
$exam_name = $_POST['ExamName']; 

$query = "SELECT Grading_Table.QuestionID, Grading_Table.StudentAnswer, Grading_Table.Feedback, Grading_Table.Comments, Grading_Table.PointsEarned 
                Test_Questions.TestCase1, Test_Questions.TestCase2, Test_Questions.TestCase3, Test_Questions.Answer1, Test_Questions.Answer2, Test_Questions.Answer3
        FROM Grading_Table 
        JOIN Test_Questions
        ON Grading_Table.QuestionID = Test_Questions.QuestionID
        WHERE Grading_Table.ExamName = '$exam_name'";
        
$result = mysqli_query($conn, $query);
$json = mysqli_fetch_all ($result, MYSQLI_ASSOC);
echo json_encode($json);

//$result = $conn->query($query);


?>