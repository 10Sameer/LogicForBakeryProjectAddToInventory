<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamro Bakery</title>
    <link rel="stylesheet" href="">
    <script src="https://kit.fontawesome.com/8e5a29acab.js" crossorigin="anonymous"></script>
    <style>
        /* Header Styles */
        .header {
            background-color: white; 
            color: #333; 
            padding: 10px 20px; 
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
            position: relative;
        }

        /* Logo Styles */
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-right: 20px; 
        }

        .logo .fa-bread-slice {
            font-size: 30px;
            color: #783b31; 
        }

        .logo .heading-name {
            font-size: 35px;
            font-weight: bold;
            color: #333; 
        }

        /* Navbar Styles */
        .navbar ul {
            list-style: none;
            display: flex;
            gap: 35px;
            margin: 0;
            padding: 0;
        }

        .navbar ul li a {
            color: #333; 
            text-decoration: none;
            font-size: 18px; 
            transition: color 0.3s ease;
        }

        .navbar ul li a:hover {
            color: #783b31; 
        }

        /* Icons Container Styles */
        #icons-container-nav {
            display: flex;
            align-items: center;
            gap: 25px; 
        }

        /* Hello User Message Styles */
        .user {
            margin: 0 20px; 
            font-size: 16px;
            color: #333; 
        }

        /* Cart Icon Styles */
        .cart-icon {
            position: relative;
            font-size: 24px;
            color: #333; 
        }

        .cart-count {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }

        /* Logout Icon Styles */
        #cart-btn1 {
            font-size: 24px;
            color: #333;
            cursor: pointer;
        }

        /* Toggle Button Styles */
        .toggle2 {
            display: none; 
            font-size: 24px;
            color: #333; 
            cursor: pointer;
        }

        /* Dropdown Menu Styles */
        .drop-down {
            display: none; 
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px;
            z-index: 1000;
        }

        .drop-down ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .drop-down ul li a {
            color: #333; 
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 8px 16px;
            transition: background-color 0.3s ease;
        }

        .drop-down ul li a:hover {
            background-color: #f1f1f1; 
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                display: none; 
            }

            .toggle2 {
                display: block;
            }

            .drop-down.active {
                display: block; 
            }

          .user {
                display: none;
            }

            
            .logo {
                margin-right: 10px; 
            }

            
            #icons-container-nav {
                gap: 15px; 
        }
    }
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