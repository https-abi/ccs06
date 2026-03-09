<?php
include "db_conn.php";
mysqli_query($conn, "DELETE FROM cart");
header("Location: cart.php");
exit;