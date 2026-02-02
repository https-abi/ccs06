<?php
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $gender = $_GET['gender'];
    $country = $_GET['country'];
    $colors = $_GET['color'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Text to Speech</title>
</head>
<body>

<?php
    echo 'Hello you are student, ' . $firstname . ' ' . $lastname . ', who is a ' . $gender . ' from the country ' . $country;
    echo '<br>';
    echo 'My favourite colour/s are: ';
    foreach ($colors as $color) {
        echo htmlspecialchars($color) . ", ";
    }
?>

</body>
</html>
