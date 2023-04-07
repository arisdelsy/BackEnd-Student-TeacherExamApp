<?php
// insert students answers into Grading Table

//DB connection
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

$exam_name = $_POST['exam_name'];
//$exam_name = "Final Exam II";
//$answers = $_POST['answers'];
//$uname = $_POST['ucid'];          //uncomment if we are capturing username
//$questionIDs = $_POST['questionID'];      //uncomment if receiving questionIDs

$answers = array_map('intval', explode(',',$_POST['answers']));

$ans = [];
foreach($answers as $ans)
{

    array_push($answers, $ans);
}

$query = "SELECT QuestionID FROM Exam_Table_Teacher WHERE ExamName = '$exam_name'";
$result3 = $conn->query($query);
$question_IDs = [];

while($row = $result3->fetch_assoc())
{
    array_push($question_IDs, $row['QuestionID']);
}

$counter = count($question_IDs);

for($i = 0; $i < $counter; $i++)
{
 $grade_q = "INSERT INTO Grading_Table(ExamName, Uname, PointsEarned,PointsOverride, Feedback, Comments, QuestionID, StudentAnswer) 
             VALUES('$exam_name',NULL, NULL, NULL, NULL, NULL, '$question_IDs[$i]','$ans[$i]')";
 $result4 = $conn->query($grade_q);
 if($result4 === TRUE){
   echo "Answered entered";
 } else{
   echo "ERROR";
 }
   
}

//with username
/*
for($i = 0; $i < $counter; $i++)
{
  $grade_q = "INSERT INTO Grading_Table(ExamName, Uname, PointsEarned,PointsOverride, Feedback, Comments, QuestionID, StudentAnswer) 
              VALUES('$exam_name','$uname', NULL, NULL, NULL, NULL, '$question_IDs[$i]','$answers[$i]')";
  $result4 = $conn->query($grade_q);
  if($result4 === TRUE){
    echo "Answered entered";
  } else{
    echo "ERROR";
  }
    
}
*/
$conn->close();
?>