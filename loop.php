<?php

//WHILE LOOP
echo "<hr>";
echo "<b>While Loop</b>";
echo "<br>";

$counter = 1;

while(($counter <=5)){
    echo "The counter is: " . $counter;
    echo "<br>";
    $counter++;
}

//FOR LOOP
echo "<hr>";
echo "<b>For Loop</b>";
echo "<br>";

for($i = 1; $i <= 5; $i++){
    echo "The counter is: " . $i;
    echo "<br>";
}

//FOREACH LOOP
echo "<hr>";
echo "<b>Foreach Loop (Colors)</b>";
echo "<br>";

$colors = ["Red", "Orange", "Yellow", "Green", "Blue", "Indigo", "Violet"]; //array

foreach($colors as $color){
    echo "The color is: " . $color;
    echo "<br>";
}

//FOREACH LOOP - students
echo "<hr>";
echo "<b>Foreach Loop (Students)</b>";
echo "<br>";

$student1 = [
    //KETY => VALUE pair
    "id" => 1001, 
    "firstname" => "Juan", 
    "lastname" => "Dela Cruz"
    ];

$student2 = [
    //KETY => VALUE pair
    "id" => 1002, 
    "firstname" => "Brent", 
    "lastname" => "Da Mage"
    ];

$students = [$student1, $student2];

//DEBUGGING PURPOSES
// echo "<pre>";
// var_dump($students); exit;
// echo "<pre>";

//FOREACH FOR ONE STUDENT
// foreach($student1 as $key => $value){
//     echo "The student's " . $key . " is " . $value;
//     echo "<br>";
// }

foreach($students as $student){
    //key-value pair
    foreach($student1 as $key => $value){
        echo "The student's " . $key . " is " . $value;
        echo "<br>";
    }
}

?>