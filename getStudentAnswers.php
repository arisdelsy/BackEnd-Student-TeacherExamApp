<?php
// for autograding purposes

$servername = "sql1.njit.edu";
$username = "ab2473";
$password = " ";
$dbname = "ab2473";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

$exam_name = $_POST['examName'];
//$exam_name = 'Final Exam II';

/*
$query = "SELECT QuestionID FROM Grading_Table WHERE ExamName = '$exam_name'";
$result3 = $conn->query($query);
$question_IDs = [];

while($row = $result3->fetch_assoc())
{
    array_push($question_IDs, $row['QuestionID']);
}

$counter = count($question_IDs);
*/
//MAKES A JOINED TABLE FROM GRADING TABLE AND TEST QUESTIONS
$answers_q = "SELECT Grading_Table.QuestionID, Grading_Table.StudentAnswer, Test_Questions.FuncName, Test_Questions.Constraints, Test_Questions.TestCase1, Test_Questions.TestCase2, Test_Questions.TestCase3, Test_Questions.Answer1, Test_Questions.Answer2, Test_Questions.Answer3, Exam_Table_Teacher.PointsPossible
            FROM Grading_Table 
            JOIN Test_Questions
            ON Grading_Table.QuestionID = Test_Questions.QuestionID
            JOIN Exam_Table_Teacher
            ON Test_Questions.QuestionID = Exam_Table_Teacher.QuestionID
            WHERE Exam_Table_Teacher.ExamName = '$exam_name'";
$captured = $conn->query($answers_q);

$result=[];
if (is_array($captured) || is_object($captured))
{
  //$counter = 0;
  foreach($captured as $val)
  {
  
    //var_dump($val);
    //echo "<br>";
    array_push($result,$val);
    //$counter++;
  }
}
//$result = json_encode($result);
echo json_encode($result);


?>
