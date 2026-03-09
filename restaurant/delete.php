<?php
include "db_conn.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM cart WHERE id = '$id'");
}
header("Location: cart.php");
exit;