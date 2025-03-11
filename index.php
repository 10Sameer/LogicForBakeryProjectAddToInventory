<?php
session_start();

// Hardcoded login credentials (replace with database validation in a real application)
$valid_userid = '2';
$valid_password = '1';

if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];

    // Validate credentials
    if ($userid === $valid_userid && $password === $valid_password) {
        $_SESSION['userid'] = $userid; // Store user ID in session
        header('Location: dashboard.php'); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid User ID or Password";
    }
}
?>
