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
