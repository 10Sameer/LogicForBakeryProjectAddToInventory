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

    </header>

   
</body>
</html>