<?php
//For teacher to review and updates students grades and comments

$servername = "sql1.njit.edu";
$username = "ab2473";
$password = " ";
$dbname = "ab2473";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//ASK WHAT IS THE PROFESSOR VIEWING IN THE GRADE TABLE?

$examName = $_POST['examName'];
//$uname = $_POST['ucid'];
$comments = $_POST['comments'];
$student_answers = $_POST['answers'];


/*  
foreach($comments as $value){
    $comments_answers = "UPDATE Grading_Table
                         SET Comments = '$value'
                         WHERE Uname = '$uname' and ExamName = '$examName'";
    $result1 = $conn->query($comments_answers);
}
*/
foreach($comments as $value){
  $comments_answers = "UPDATE Grading_Table
                       SET Comments = '$value'
                       WHERE ExamName = '$examName'";
  $result1 = $conn->query($comments_answers);
}

// if i am provided a uname this should be uncommented
/*
$setGraded = "UPDATE Students_Exam_Status
                  SET Reviewed = 'graded'
                  WHERE Uname = '$uname'";
$result2 = $conn->query($setGraded);
*/
$setGraded = "UPDATE Students_Exam_Status
                  SET Reviewed = 'graded'
                  WHERE ExamName = '$examName'";
$result2 = $conn->query($setGraded);



$conn->close();


?>