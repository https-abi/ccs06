<?php
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id  = $_POST['id'];
    $qty = (int)$_POST['quantity'];

    if ($qty < 1) $qty = 1;

    mysqli_query($conn, "UPDATE cart SET quantity = '$qty' WHERE id = '$id'");
}

header("Location: cart.php");
exit;