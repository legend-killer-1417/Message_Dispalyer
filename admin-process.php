<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the admin credentials are correct (for simplicity, using hardcoded values)
    $admin_username = 'admin';
    $admin_password = 'password';

    $entered_username = $_POST['admin_username'];
    $entered_password = $_POST['admin_password'];

    if ($entered_username === $admin_username && $entered_password === $admin_password) {
        // If login is successful, set a session variable to mark as logged in
        $_SESSION['admin_logged_in'] = true;
        // Redirect to the admin panel (change-message.php)
        header('Location: change-message.php');
        exit();
    } else {
        // If login fails, redirect back to the admin login page with an error message
        header('Location: admin-login.php?error=1');
        exit();
    }
}
?>
