<?php

// 1. Grading Logic (If-Elseif-Else)
$score = 86;

if ($score >= 90) {
    echo "Grade: A";
} elseif ($score >= 80) {
    echo "Grade: B";
} else {
    echo "Grade: C";
}

echo "<br>";

// 2. Strict (===) vs Loose (==)
$user = "42"; // String

if ($user === 42) {
    echo "Strict: Match!"; // Skips
} elseif ($user == 42) {
    echo "Loose: Match!"; // Runs
}

echo "<br>";

// 3. Logical Operators
$isMember = true;
$total = 101;

if ($isMember && $total > 100) {
    echo "Discount Applied!";
}

?>