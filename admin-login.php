<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="admin-container">
        <h2>Admin Login</h2>
        <?php
        // Check if there's an error parameter in the URL
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p style="color: red;">Login failed. Please try again.</p>';
        }
        ?>

        <form method="post" action="admin-process.php">
            <label for="admin_username">Username:</label>
            <input type="text" name="admin_username" required><br>

            <label for="admin_password">Password:</label>
            <input type="password" name="admin_password" required><br>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
