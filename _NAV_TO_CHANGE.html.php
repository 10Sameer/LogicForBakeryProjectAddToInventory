<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Bakery</title>
    <link rel="stylesheet" href="">
    <script src="https://kit.fontawesome.com/8e5a29acab.js" crossorigin="anonymous"></script>
    <style>
    
    </style>
</head>
<body>
    <header class="header">
        <!-- Logo -->
        <div class="logo">
            <i class="fas fa-bread-slice"></i>
            <span class="heading-name">Hamro Bakery</span>
        </div>

        <!-- Navbar -->
        <div class="navbar">
            <ul>
                <li class="item"><a href="bakery.php">Home</a></li>
                <li class="item"><a href="#about-us">About Us</a></li>
                <li class="item"><a href="#product">Product</a></li>
                <li class="item"><a href="#gallery">Gallery</a></li>
                <li class="item"><a href="#contact-us">Contact Us</a></li>
            </ul>
        </div>

        <!-- Hello User Message -->
        <div class="user" id="user-name">
            <?php
            if ($loggedin) {
                $sql = "SELECT * FROM userdata WHERE email = '" . $_SESSION['email'] . "'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    echo '<p>Hello! ' . $row['username'] . '</p>';
                }
            } else {
                echo '<p>Hello User</p>';
            }
            ?>
        </div>

        <!-- Icons Container -->
        <div class="icons" id="icons-container-nav">
            <!-- Cart Icon -->
            <a href="cart.php">
                <div id="cart-btn" class="fa-solid fa-cart-shopping cart-icon">
                    <span id="cart-count" class="cart-count"></span>
                </div>
            </a>

            <!-- Logout Icon -->
            <a href="user-logout.php">
                <div id="cart-btn1" class="fa-solid fa-right-from-bracket"></div>
            </a>
        </div>

        <!-- Toggle Button for Mobile -->
        <div class="toggle2" id="toggle2">
            <i class="fa-solid fa-bars"></i>
        </div>

        <!-- Dropdown Menu for Mobile -->
        <div class="drop-down" id="drop-down">
            <ul>
                <li class="item"><a href="bakery.php">Home</a></li>
                <li class="item"><a href="about.php">About Us</a></li>
                <li class="item"><a href="#product">Product</a></li>
                <li class="item"><a href="#gallery">Gallery</a></li>
                <li class="item"><a href="#contact-us">Contact Us</a></li>
            </ul>
        </div>
    </header>

    <script>
        // Toggle dropdown menu
        document.getElementById('toggle2').addEventListener('click', function () {
            const dropdown = document.getElementById('drop-down');
            dropdown.classList.toggle('active');
        });
    </script>
</body>
</html>