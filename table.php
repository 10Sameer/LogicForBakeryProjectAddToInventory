<?php
include 'db.php';

$sql = "CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT(11) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";


if ($conn->query($sql) === TRUE) {
    echo "Table 'Product' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
