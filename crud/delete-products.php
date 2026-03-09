<?php
include "db_conn.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM products WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?msg=Data deleted successfully");
        exit();
    } else {
        echo "Failed: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid ID";
}
?>