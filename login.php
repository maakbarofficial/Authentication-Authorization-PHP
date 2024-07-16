<?php
session_start(); // Start the session
include 'db.php'; // Include your database connection script

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_email = $_POST['email'];
    $login_password = $_POST['password'];

    // Example query to check login credentials
    $sql = "SELECT * FROM users WHERE email = '$login_email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify password
        if (password_verify($login_password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = 1; // Assuming your users table has an 'id' column
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_role'] = $row['role'];

            // Redirect to home.php
            header("Location: home.php");
            exit();
        } else {
            echo "Incorrect password!";
            header("Location: index.php");
        }
    } else {
        echo "User not found!";
    }

    $conn->close();
}
