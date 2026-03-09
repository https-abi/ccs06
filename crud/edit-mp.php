<?php
include "db_conn.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    echo "Invalid ID";
    exit();
}

$id = intval($_GET["id"]);

$menu_sql = "SELECT ID, Name FROM menu WHERE DateDeleted IS NULL";
$menu_result = mysqli_query($conn, $menu_sql);

$product_sql = "SELECT ID, Name FROM products";
$product_result = mysqli_query($conn, $product_sql);

if (isset($_POST["submit"])) {
  $menu_id = $_POST['menuid'];
   $product_id = $_POST['productid'];

  $stmt = $conn->prepare("UPDATE `menuproducts` SET `MenuID`=?, `ProductID`=? WHERE ID = ?");
  $stmt->bind_param("sii", $menu_id, $product_id, $id);

  if ($stmt->execute()) {
    header("Location: index.php?msg=Data updated successfully");
    exit();
  } else {
    echo "Failed: " . $stmt->error;
  }

  $stmt->close();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #f5ce32;">
    PHP Complete CRUD Application
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Menu Product Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `menuproducts` WHERE ID = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="mb-3">
          <label class="form-label">Menu:</label>
          <select class="form-control" name="menuid" required>
            <option value="">Select Menu</option>
            <?php 
            mysqli_data_seek($menu_result, 0); // Reset pointer
            while ($menu_row = mysqli_fetch_assoc($menu_result)) { 
              $selected = ($menu_row['ID'] == $row['MenuID']) ? 'selected' : '';
            ?>
              <option value="<?php echo $menu_row['ID']; ?>" <?php echo $selected; ?>><?php echo $menu_row['Name']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Product:</label>
          <select class="form-control" name="productid" required>
            <option value="">Select Product</option>
            <?php 
            mysqli_data_seek($product_result, 0); // Reset pointer
            while ($product_row = mysqli_fetch_assoc($product_result)) { 
              $selected = ($product_row['ID'] == $row['ProductID']) ? 'selected' : '';
            ?>
              <option value="<?php echo $product_row['ID']; ?>" <?php echo $selected; ?>><?php echo $product_row['Name']; ?></option>
            <?php } ?>
          </select>
        </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="index.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>