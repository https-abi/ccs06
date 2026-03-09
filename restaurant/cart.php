<?php
include "db_conn.php";

$total = 0;
$sql = "SELECT * FROM cart";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cart – Potato Corner</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        🛒 Your Cart
    </nav>

    <div class="container">
        <a href="index.php" class="btn btn-dark mb-3"><i class="fa-solid fa-arrow-left me-2"></i>Back to Menu</a>

        <?php if (isset($_GET["msg"])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $_GET["msg"] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (mysqli_num_rows($result) == 0): ?>
            <div class="alert alert-info">Your cart is empty. <a href="index.php">Go back to the menu.</a></div>
        <?php else: ?>

            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)):
                        $subtotal = $row['price'] * $row['quantity'];
                        $total += $subtotal;
                        ?>
                        <tr>
                            <td><?= htmlspecialchars(ucwords(strtolower($row['name']))) ?></td>
                            <td>₱<?= number_format($row['price'], 0) ?></td>
                            <td id="qty-display-<?= $row['id'] ?>">
                                <?= $row['quantity'] ?>
                            </td>
                            <td>₱<?= number_format($subtotal, 0) ?></td>
                            <td>
                                <a onclick="enableEdit(<?= $row['id'] ?>, <?= $row['quantity'] ?>)" class="link-dark"
                                    style="cursor:pointer; text-decoration:none;" title="Edit">
                                    <i class="fa-solid fa-pen-to-square fs-5"></i>
                                </a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="link-dark ms-3" style="text-decoration:none;"
                                    title="Remove">
                                    <i class="fa-solid fa-trash fs-5"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr class="table-dark">
                        <th colspan="3" class="text-end">Total:</th>
                        <th>₱<?= number_format($total, 0) ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>

            <div class="d-flex justify-content-between">
                <a href="clear.php" class="btn btn-outline-danger"><i class="fa-solid fa-trash me-2"></i>Clear Cart</a>
                <button class="btn btn-success"><i class="fa-solid fa-check me-2"></i>Place Order</button>
            </div>

        <?php endif; ?>
    </div>

    <script>
        function enableEdit(id, currentQty) {
            const cell = document.getElementById('qty-display-' + id);
            cell.innerHTML = `
            <form method="POST" action="update-cart.php" style="display:flex; align-items:center; justify-content:center; gap:6px;">
                <input type="hidden" name="id" value="${id}">
                <input type="number" name="quantity" value="${currentQty}" min="1" max="99"
                    style="width:60px; text-align:center;" class="form-control form-control-sm">
                <button type="submit" class="btn btn-sm btn-success">
                    <i class="fa-solid fa-check"></i>
                </button>
            </form>
        `;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>