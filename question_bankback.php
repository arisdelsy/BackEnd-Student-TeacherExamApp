<?php
//ADDING QUESTIONS BACKEND 


$message = $_POST;

//seperating data array elements into variables
//$questionID = $message['questionID']; 
$functionname= $message['functionname'];
$question = $message['question'];
$topic = $message['topic'];
$difficulty = $message['difficulty'];
$testcase1 = $message['testcase1'];
$testcase2 = $message['testcase2'];
$testcase3 = $message['testcase3'];
$constraints = $message['constraints'];
$answer1 = $message['answer1'];
$answer2 = $message['answer2'];
$answer3 = $message['answer3'];


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

//SQL insert statements
$sql_question = "INSERT INTO Test_Questions (FuncName, Question, Topic, Difficulty, Constraints, TestCase1, TestCase2, TestCase3, Answer1, Answer2, Answer3) 
                VALUES ('$functionname','$question', '$topic', '$difficulty', '$constraints', '$testcase1','$testcase2', '$testcase3','$answer1', '$answer2', '$answer3')";
if ( $conn->query($sql_question) === TRUE) 
{
    echo "Added successfully";
} else {
    echo "Question already exists. Try again.";
}


$conn->close();
?>
