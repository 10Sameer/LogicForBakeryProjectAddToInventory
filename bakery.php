<?php
include 'db.php';

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bakery Page</title>
  <link rel="stylesheet" href="bakery.css">
</head>
<body>
  <div class="bakery-container">
    <h1>Our Bakery Products</h1>

    <!-- Search Bar -->
    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="Search products...">
    </div>

    <!-- Product Grid -->
    <div class="product-grid" id="productGrid">
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<div class='product-item' data-name='{$row['name']}'>
                      <img src='uploads/{$row['image']}' alt='{$row['name']}'>
                      <p><strong>{$row['name']}</strong></p>
                      <p>Price: RS.{$row['price']}</p>
                      <p>Quantity: {$row['quantity']}</p>
                      <div class='product-actions'>
                        <button class='add-to-cart'>Add to Cart</button>
                        <button class='buy-now'>Buy Now</button>
                      </div>
                    </div>";
          }
      } else {
          echo "<p>No products available.</p>";
      }
      ?>
    </div>
  </div>

  <script>
    const searchInput = document.getElementById('searchInput');
    const productGrid = document.getElementById('productGrid');
    const allProducts = Array.from(document.querySelectorAll('.product-item'));
    
    // Store the original products HTML for reset
    const originalProductsHTML = productGrid.innerHTML;
    
    searchInput.addEventListener('input', function () {
      const searchTerm = searchInput.value.toLowerCase();
      
      if (searchTerm === '') {
        // If search is empty, restore original grid
        productGrid.innerHTML = originalProductsHTML;
        return;
      }
      
      // Filter products that match the search term
      const matchingProducts = allProducts.filter(product => {
        const productName = product.getAttribute('data-name').toLowerCase();
        return productName.includes(searchTerm);
      });
      
      if (matchingProducts.length === 0) {
        // If no products match, show a message
        productGrid.innerHTML = '<p>No products found.</p>';
      } else {
        // Clear the grid
        productGrid.innerHTML = '';
        
        // Append only matching products to the grid
        // This ensures they appear side by side without gaps
        matchingProducts.forEach(product => {
          // Clone the product to avoid reference issues
          const productClone = product.cloneNode(true);
          productGrid.appendChild(productClone);
        });
      }
    });
  </script>
</body>
</html>
