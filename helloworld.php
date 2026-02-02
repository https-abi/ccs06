<?php
echo 'Hello World';
//URL: localhostyadaya
//1. Get inputs from URL or default to 12 and 5
$a = isset($_GET['a']) ? (float)$_GET['a'] : 12;
$b = isset($_GET['b']) ? (float)$_GET['b'] : 5;

echo "a = $a, b = $b <br>";
echo "Sum: " . ($a + $b) . "<br>";
echo "Diff: " . ($a - $b) . "<br>";
echo "Prod: " . ($a * $b) . "<br>";
echo "Quot: " . ($a != 0 ? $a / $b : 'Infinity') . "<br>";
echo "a > b: " . (($a > $b) ? 'true' : 'false') . "<br>";
echo "Both even? " . ((($a % 2 == 0) && ($b % 2 == 0)) ? 'true' : 'false') . "<br>";

phpinfo()

?> 