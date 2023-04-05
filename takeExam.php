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

//Student enters student page
//Students clicks button with id exam to take it
$exam_name = $_POST['exam_name'];
//$username = $_POST['username'];           uncomment but needs to be provided the 
//$questionID_array = $_POST['questionID'];

//$exam_name = "Final Exam II";
//$username = "kp55";

/*
********************************************************************************
//this prints the array of what the query grabbed (test names available to take)
********************************************************************************
foreach($result1 as $value)
{
    print_r($value);
    echo "<br>";
}
*/

//MAKES A JOINED TABLE THAT GRABS THE ACTUAL QUESTION, POINTS, AND ID BASED ON EXAM NAME
$ques_q = "SELECT Exam_Table_Teacher.QuestionID, Exam_Table_Teacher.PointsPossible, Test_Questions.Question
            FROM Exam_Table_Teacher 
            JOIN Test_Questions
            ON Exam_Table_Teacher.QuestionID = Test_Questions.QuestionID
            WHERE Exam_Table_Teacher.ExamName = '$exam_name'";
$result2 = $conn->query($ques_q);

$result=[];
if (is_array($result2) || is_object($result2))
{
  $counter = 0;
  foreach($result2 as $val)
  {
  
    //var_dump($val);
    //echo "<br>";
    array_push($result,$val);
    $counter++;
  }
}
//$result = json_encode($result);
echo json_encode($result);
// do i need to return the data as json?

//DISPLAY EXAM
/*
$ques_q = "SELECT QuestionID FROM Exam_Table_Teacher WHERE ExamName = '$exam_name'";
$result2 = $conn->query($ques_q);
foreach($result2 as $val)
{
    print_r($val);
    echo "<br>";
}
*/

$conn->close();
?>