<?php

//this php CREATES EXAM 


//VARIABLES WE ARE USING
$exam_name = $_POST['examName'];
$counter = intval($_POST['examSize']);
//$questions_array = unserialize($_POST['question']);
$questionID_array = array_map('intval', explode(',',$_POST['questionID']));
$points_poss = array_map('intval', explode(',',$_POST['points']));
//$testcase = $_POST['testcase'];

//Variables for testing
//$exam_name = "EXAM 5";
//$counter = 4;
//$questions_array = [ "Q1" => "Questions1", "Q2" => "Questions2", "Q3" => "Questions3", "Q4" => "Questions4"];
//$points_poss = ["P1" => "20", "P2" => "30", "P3" => "40", "P4" => "50"];
//$testcase = $_POST['testcase'];

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

// query selects all Unames from Credentials that are students
$query = "SELECT Uname FROM Credentials WHERE Role ='Student';";
$result = $conn->query($query);

//create an empty array
$students_selected = [];

// row is set to the fetched associated array
//--- array_push(array, values to push to end of array) --
while($row = $result->fetch_assoc()){
    array_push($students_selected, $row['Uname']);
}

$student_status = "ungraded";

//inserting name of exam to table Exams
$name_q = "INSERT INTO Exam_Names(ExamName) VALUES('$exam_name')";
$result1 = $conn->query($name_q);


// for every value of student in students_selected
if (is_array($students_selected) || is_object($students_selected))
{
    foreach ($students_selected as $username) 
    {
        $exam_status = "INSERT INTO Students_Exam_Status(Uname, ExamName, Reviewed)
                        VALUES('$username','$exam_name','$student_status')";
        $result2 = $conn->query($exam_status);
    }
}

$qs = [];
$pp = [];
foreach($questionID_array as $q)
{

    array_push($qs, $q);
}

foreach($points_poss as $p)
{
    array_push($pp, $p);
}

//insert into table Exam_Table_Teacher all the fields grabbed
for ($x = 0; $x < $counter; $x++) 
{
    $add_q = "INSERT INTO Exam_Table_Teacher(ExamName, QuestionID, PointsPossible) 
              VALUES ('$exam_name', '$qs[$x]', '$pp[$x]')";
    $result3 = $conn->query($add_q);
    
    if($result3 === TRUE)
    {
        echo "You added a question to an exam";
    } else
    {
        echo ("ERROR" . $conn -> error);
    }

} 

/*
if (is_array($questions_array) || is_object($questions_array))
{
    $i = 0;
    foreach ($questions_array as $question)
    {
        $add_q = "INSERT INTO Exam_Table_Teacher(ExamName, QuestionID, Question, PointsPossible) 
                VALUES ('$exam_name', '$questionID_array[$i]', '$question','$points_poss[$i]')";
        $result3 = $conn->query($add_q);
        $i = $i+1;
    }
    if($result3 === TRUE){
        echo "You added a question to an exam";
    } else{
        echo "ERROR";
    }
}   
*/


$conn->close();
?>