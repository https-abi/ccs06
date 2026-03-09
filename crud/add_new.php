<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $name = $_POST['name'];

   $sql = "INSERT INTO `menu`(`Name`, `DateCreated`) VALUES ('$name', NOW())";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>