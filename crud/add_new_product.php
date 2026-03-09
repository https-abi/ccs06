<?php
include "db_conn.php";

if (isset($_POST["submit"])) {

   $name = $_POST['name'];
   $price = $_POST['price'];

   // Image upload
   $target_dir = "resources/";
   $imageName = basename($_FILES["image"]["name"]);
   $target_file = $target_dir . $imageName;

   move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

   $sql = "INSERT INTO products (Name, Price, ImagePath) 
           VALUES ('$name', '$price', '$target_file')";

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
         <h3>Add New Product</h3>
         <p class="text-muted">Complete the form below to add a new product</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">

   <div class="mb-3">
      <label class="form-label">Name:</label>
      <input type="text" class="form-control" name="name" placeholder="Product Name" required>
   </div>

   <div class="mb-3">
      <label class="form-label">Price:</label>
      <input type="number" step="0.01" class="form-control" name="price" placeholder="Product Price" required>
   </div>

   <div class="mb-3">
      <label class="form-label">Upload Image:</label>
      <input type="file" class="form-control" name="image" accept="image/*" required>
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