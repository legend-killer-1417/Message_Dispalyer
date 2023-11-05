<!-- change-message.php -->
<?php
session_start();

// Check if the admin is logged in, if not, redirect to the admin login page
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin-login.php');
    exit();
}

// Handle form submission to update the message content or redirect
if (isset($_POST['go_to_main_page'])) {
    // Redirect to the main page
    header('Location: main.php');
    exit();
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check which button was clicked
    if (isset($_POST['update_message'])) {
        // Get the new content from the form
        $newMessage = $_POST['new_message'];

        // Specify the file path
        $filePath = 'message.txt';

        // Open the file for writing
        $fileHandle = fopen($filePath, 'w');

        // Check if the file is opened successfully
        if ($fileHandle) {
            // Write the new content to the file
            fwrite($fileHandle, $newMessage);

            // Close the file handle
            fclose($fileHandle);
            echo '<script>alert("File content has been updated successfully.");</script>';
        } else {
            echo 'Unable to open the file.';
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Message</title>
</head>
<body>
    <div class="admin-container">
        <h2>Change Message</h2>

        <!-- Display the current message -->
        <?php
            $message = file_get_contents('message.txt');
            echo "<p>Current Message: $message</p>";
        ?>

        <!-- Form for changing the message and redirecting -->
        <form method="post" action="">
            <label for="new_message">New Message:</label>
            <textarea name="new_message" rows="3" cols="30"></textarea><br>

            <input type="submit" name="update_message" value="Update Message">
            <input type="submit" name="go_to_main_page" value="Go To Main Page">
        </form>
    </div>
</body>
</html>
