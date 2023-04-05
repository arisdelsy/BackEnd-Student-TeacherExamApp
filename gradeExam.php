<?php
//GLOBAL VARS
$studentAnswers = [];   $questionIDs = [];      $functionName = [];     $constrait = [];
$testCases = [];        $beforePoints = [];
$answers = [];          $afterPoints=[];


$DATA = $_POST;
$examName = $DATA["examName"];
$data = array(
    'examName' => "Final Exam II"
);

function sendAndReceive($information){
    $data = http_build_query($information);
    $url = 'https://afsaccess4.njit.edu/~ab2473/Beta/getStudentAnswers.php';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);    
    curl_setopt($curl, CURLOPT_POST, true);    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);    

    $result = curl_exec($curl);
    curl_close($curl); 
    $result = json_decode($result);
    print_r($result);
    return $result;
}

$results = sendAndReceive($data);

foreach ($results as $item) {
    array_push($studentAnswers,         $item->StudentAnswer); 
    array_push($questionIDs,            $item->QuestionID);
    array_push($functionName,           $item->FuncName);        
    array_push($constrait,              $item->Constraints);  
    array_push($beforePoints,           $item->PointsPossible);  

    array_push($testCases,             $item->TestCase1);
    array_push($testCases,             $item->TestCase2);
    array_push($testCases,             $item->TestCase3);
        
    array_push($answers,               $item->Answer1);      
    array_push($answers,               $item->Answer2);
    array_push($answers,               $item->Answer3);    
        
}

//WORTH 1/4
function testFunctionName(&$studentAnswers,&$functionName,&$beforePoints, &$afterPoints){

    $lowercaseSA = array_map('strtolower', $studentAnswers);
    $lowercaseFN = array_map('strtolower', $functionName);


    for ($i = 0; $i < count($studentAnswers); $i++) {
        if(strpos($lowercaseSA[$i], $lowercaseFN[$i]) !== false){
            array_push($afterPoints,$beforePoints[$i]); 
        }
        else{
            $subAmount = $beforePoints[$i] /4;
            array_push($afterPoints,$beforePoints[$i] - $subAmount); 

            }
    }
    return $afterPoints;
}








function testConstraints(&$studentAnswers,&$constrait,&$pointGiven,&$beforePoints){
    $afterPoints = [];    
    for ($i = 0; $i < count($studentAnswers); $i++) {
        if(strpos($studentAnswers[$i], $constrait[$i]) !== false){
            array_push($afterPoints,$pointGiven[$i]); 

            //IF ANSWER CONTAINAS FUNC NAME::GOOD DO NOTHING
            // echo $i;
            
        }
        else{
            $subAmount = $beforePoints[$i]/4;
            array_push($afterPoints,$pointGiven[$i] - $subAmount); 
            // echo $afterPoints[$i];
            }
    }
    return $afterPoints;


}





















//function testTestCases(&$studentAnswers,&$testCases,&$answers, &$beforePoints, &$afterPoints, &$constrait, &$functionName){
function testTestCases(&$studentAnswers)
{

    
    //$file = "test.py";

    $item= $studentAnswers[0];
    //echo $item;
    file_put_contents();

    $tmp = shell_exec("python test.py '.$item'");

    echo $tmp;
}
    // if ($tmp == "Hello World!"){

    //     echo "Awesome code results were correct.\n";

    // }
    // $file = "test.py";
    // for($i = 0; $i < count($testCases); $i++){
    //     $runpython = exec("python $file");
        
        
    //     
    //$myfile = fopen("test.py", "w"); -- this does not work justin
//     for($i = 0; $i < count($testCases); $i++){


//         if($constrait[$i] == "return") {
//             file_put_contents($myfile, "#!/usr/bin/env python\n" . $studentAnswers[$i] . "\n" . "$functionName[$i]");
//         if ($constrait[$i] == "print" || $constrait[$i] == "") {
    
//         }
//     }
// }



$pointsAfterFunctionTest =&testFunctionName($studentAnswers,$functionName,$beforePoints, $afterPoints);
$pointsAfterTestConstraints = &testConstraints($studentAnswers,$constrait,$pointsAfterFunctionTest,$beforePoints);
//$testTestCases = &testTestCases($studentAnswers,$testCases,$answers, $beforePoints, $afterPoints,$constrait,$functionName);
//echo(exec('whoami'));

$testTestCases=&testTestCases($studentAnswers);
echo $testTestCases;

?>