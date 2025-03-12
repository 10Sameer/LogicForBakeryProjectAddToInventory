<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: index.php'); // Redirect to login if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="add-product-container">
    <div class="glass-form">
      <h2>Add New Product</h2>
      <form action="addProduct.php" method="POST" enctype="multipart/form-data">
        <div class="input-group">
          <label for="productImage">Product Image</label>
          <input type="file" id="productImage" name="productImage" accept="image/*" required>
        </div>
        <div class="input-group">
          <label for="productName">Product Name</label>
          <input type="text" id="productName" name="productName" required>
        </div>
        <div class="input-group">
          <label for="productPrice">Product Price</label>
          <input type="number" id="productPrice" name="productPrice" step="0.01" required>
        </div>
        <div class="input-group">
          <label for="productQuantity">Quantity</label>
          <input type="number" id="productQuantity" name="productQuantity" required>
        </div>
        <button type="submit" name="addProduct">Add Product</button>
      </form>
    </div>
  </div>
</body>
</html>

