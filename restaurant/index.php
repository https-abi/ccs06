<html>
    <head>
        <title>Potato Corner</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <header class="header-container">
        <div class="header-left">
            <img src="resources/Potato_Corner_Logo.png" alt="Potato Corner Logo" class="logo">
        </div>
        <div class="header-right">
            <div class="marquee">
                <div class="marquee-text">World's Best Flavoured Fries</div>
            </div>
        </div>
    </header>
<?php
$servername = "localhost";
$username = "root"; //root is the default username
$password = ""; //blank is the default password
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>


<?php
//SELeCT QUERY
$sql = "SELECT * FROM Products";

// Execute the SQL query
$result = $conn->query($sql);


?>

<div class="card-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<img src='" . $row["ImagePath"] . "' alt='" . $row["Name"] . "'>";
            echo "<h3>" . ucwords(strtolower($row["Name"])) . "</h3>";
            echo "<p>₱" . number_format($row["Price"], 0) . "</p>";
            echo "</div>";
        }
    }
    $conn->close();
    ?>
</div>
    </body>
</html>

<!-- <table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>ImagePath</th>
    </tr>
    <?php
        // if ($result->num_rows > 0) {
        //     // Output data of each row
        //     while($row = $result->fetch_assoc()) {
        //         echo "<tr>";
        //         echo "<td>" . $row["ID"] . "</td>";
        //         echo "<td>" . $row["Name"] . "</td>";
        //         echo "<td>" . $row["Price"] . "</td>";
        //         echo "<td><img src='" . $row["ImagePath"] . "' width='50'></td>";
        //         echo "</tr>";
        //     }
        // } 
        // $conn->close();
    ?>
</table> -->


</html>