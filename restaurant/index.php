<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Potato Corner</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <!-- Header -->
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

    <!-- Item Cards -->
    <div class="card-container">
        <?php
        $sql = "SELECT * FROM Products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<img src='" . $row["ImagePath"] . "' alt='" . $row["Name"] . "'>";
                echo "<h3>" . ucwords(strtolower($row["Name"])) . "</h3>";
                echo "<p>₱" . number_format($row["Price"], 0) . "</p>";
                echo "<form method='POST' action='add_new.php' class='cart-form'>";
                echo "<input type='hidden' name='id' value='" . $row["ID"] . "'>";
                echo "<input type='hidden' name='name' value='" . htmlspecialchars($row["Name"]) . "'>";
                echo "<input type='hidden' name='price' value='" . $row["Price"] . "'>";
                echo "<div class='cart-controls'>";
                echo "<button type='button' class='qty-btn' onclick='changeQty(this, -1)'>−</button>";
                echo "<input type='number' name='quantity' value='1' min='1' max='99' class='qty-input' readonly>";
                echo "<button type='button' class='qty-btn' onclick='changeQty(this, 1)'>+</button>";
                echo "<button type='submit' class='add-to-cart-btn' title='Add to Cart'>🛒</button>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
            }
        }
        $conn->close();
        ?>
    </div>

    <!-- Floating Cart Icon -->
    <a href="cart.php" class="floating-cart">
        🛒
        <?php
        // Show count of items currently in cart
        include "db_conn.php";
        $count_result = mysqli_query($conn, "SELECT SUM(quantity) AS total FROM cart");
        $count_row = mysqli_fetch_assoc($count_result);
        $cart_total = $count_row['total'] ?? 0;
        ?>
        <span class="cart-badge"><?= $cart_total ?></span>
    </a>

</body>

<script>
    function changeQty(btn, delta) {
        const input = btn.parentElement.querySelector('.qty-input');
        let val = parseInt(input.value) + delta;
        if (val < 1) val = 1;
        if (val > 99) val = 99;
        input.value = val;
    }
</script>

</html>