<?php
$GLOBALS['num1']=75;
$num2= 38;
$num3=0;

function sum(){
    $num1=22;
    $num2=44;
    $GLOBALS[ 'num3' ] = $GLOBALS['num1'] + $GLOBALS['num2'];
    $num3 = $num1 + $num2;
    echo $GLOBALS['num2'] . "<br>";
    echo $num3. "<br>";
}
echo $num3. "<br>";
sum();
echo $num3. "<br>";