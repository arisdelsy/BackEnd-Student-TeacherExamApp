<?php

// submitted answers
// real answers from Test_Questions
// function name 
// question id
// test cases 
// points
// exam name
// username --- if we end up including
// constraints

// I will assume answers are in array

$student_answers = [];
$funcName = [];
$question_ID = [];
$test_case = [];
$pointsEarned = [];
$pointsPossible = [];
$counter = []; //how many questions are there in the test

// grab answer 
// loop through cases, run it and store answer
// 
//setting file

//Get answer from the front
//Compare from the back


//GETTING QUESTION FROM FRONT:
$data = $_POST;
$questions = $data["Questions"];
$questionIDS = $data["QIDS"];
$questions = $data["answer"];
$questions = $data["Questoins"];
$questions = $data["Questoins"];

//VARIABLES FROM THE BACK:




$file = "gradeQuestion.py";

function gradeTest()
{
    //setting initial grade and comments
    $function_pointsEarned = 0;
    $constraints_pointsEarned = 0;
    $colon_pointsEarned = 0;
    $parameters_pointsEarned = 0;
    $comments = "";
	//$pointsPerItem = floor($totalPoints*.2);
    
    for($x = 0; $x < $counter; $x++)
    {
        $funcname_points = pointsPossible[$x]/4;
        $constraint_points = pointsPossible[$x]/4;
        $
        pointsEarned[]
    }
}
 
?>

