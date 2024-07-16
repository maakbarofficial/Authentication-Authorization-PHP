<?php
include 'db.php'; // Include your database connection script

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['roles'];

    // Hash the password (you should use password_hash() function for real applications)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Example query to insert into a users table
    $sql = "INSERT INTO users (email, password, role) VALUES ('$email', '$hashed_password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location: index.php");
    }

    $conn->close();
}
