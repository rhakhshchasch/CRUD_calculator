<?php

require '../../vendor/autoload.php';

use App\Controllers\Calculator;

if(isset($_POST["submit"])){
    $num1 = $_POST["num1"]; 
    $num2 = $_POST["num2"]; 
    $operator = $_POST["operator"];
    $calculation = new Calculator($num1, $num2, $operator);
    echo $calculation->getResult();
}

