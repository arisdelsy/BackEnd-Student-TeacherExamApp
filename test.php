<?php


//$file = "test.py";
//$item='example';

//echo shell_exec('python test.py');
function hello()
{
    $item='hello';
    $tmp = shell_exec("python test.py .$item");
    echo $tmp;
}

hello();




?>