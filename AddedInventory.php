<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: index.php'); 
    exit();
}

include 'db.php';

// Handle product removal
if (isset($_GET['remove_id'])) {
    $removeId = $_GET['remove_id'];
    $sql = "DELETE FROM products WHERE id = $removeId";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product removed successfully!'); window.location.href='AddedInventory.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Added Inventory</title>
  <link rel="stylesheet" href="AddedInventory.css">
</head>
<body>
  <div class="inventory-container">
    <h1>Added Inventory</h1>
    <div class="product-grid">
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<div class='product-item'>
                      <img src='uploads/{$row['image']}' alt='{$row['name']}'>
                      <p><strong>{$row['name']}</strong></p>
                      <p>Price: RS.{$row['price']}</p>
                      <p>Quantity: {$row['quantity']}</p>
                      <a href='AddedInventory.php?remove_id={$row['id']}' class='remove-button'>Remove</a>
                    </div>";
          }
      } else {
          echo "<p>No products added yet.</p>";
      }
      ?>
    </div>
    <a href="dashboard.php"><button class="back-button">Back to Dashboard</button></a>
  </div>
</body>
</html>