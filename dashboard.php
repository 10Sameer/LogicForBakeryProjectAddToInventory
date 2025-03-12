<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: index.php'); 
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>
  <div class="dashboard-container">
    <div class="glass-form">
      <h1>Welcome to Admin Dashboard</h1>
      <a href="addProduct.php"><button id="addToInventory">Add to Inventory</button></a>
    </div>
  </div>
</body>
</html>