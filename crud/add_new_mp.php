<?php
include "db_conn.php";

$menu_sql = "SELECT ID, Name FROM menu WHERE DateDeleted IS NULL";
$menu_result = mysqli_query($conn, $menu_sql);

$product_sql = "SELECT ID, Name FROM products";
$product_result = mysqli_query($conn, $product_sql);

if (isset($_POST["submit"])) {

   $menu_id = $_POST['menuid'];
   $product_id = $_POST['productid'];

   $sql = "INSERT INTO menuproducts (MenuID, ProductID) 
           VALUES ('$menu_id', '$product_id')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
      exit();
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
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
         <h3>Add New Menu Product</h3>
         <p class="text-muted">Complete the form below to add a new menu product association</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">

   <div class="mb-3">
      <label class="form-label">Menu:</label>
      <select class="form-control" name="menuid" required>
         <option value="">Select Menu</option>
         <?php while ($menu_row = mysqli_fetch_assoc($menu_result)) { ?>
            <option value="<?php echo $menu_row['ID']; ?>"><?php echo $menu_row['Name']; ?></option>
         <?php } ?>
      </select>
   </div>

   <div class="mb-3">
      <label class="form-label">Product:</label>
      <select class="form-control" name="productid" required>
         <option value="">Select Product</option>
         <?php while ($product_row = mysqli_fetch_assoc($product_result)) { ?>
            <option value="<?php echo $product_row['ID']; ?>"><?php echo $product_row['Name']; ?></option>
         <?php } ?>
      </select>
   </div>
   <div>
      <a href="index.php"><button type="submit" class="btn btn-success" name="submit">Save</button></a>
      <a href="index.php" class="btn btn-danger">Cancel</a>
   </div>

</form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>