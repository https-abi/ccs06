<?php
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['id'];
    $name       = $_POST['name'];
    $price      = $_POST['price'];
    $quantity   = (int)$_POST['quantity'];

    $check = mysqli_query($conn, "SELECT * FROM cart WHERE product_id = '$product_id'");

    if (mysqli_num_rows($check) > 0) {
        $row = mysqli_fetch_assoc($check);
        $new_qty = $row['quantity'] + $quantity;
        mysqli_query($conn, "UPDATE cart SET quantity = '$new_qty' WHERE product_id = '$product_id'");
    } else {
        mysqli_query($conn, "INSERT INTO cart (product_id, name, price, quantity) 
                             VALUES ('$product_id', '$name', '$price', '$quantity')");
    }

    header("Location: index.php");
    exit;
}
?>