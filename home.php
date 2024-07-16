<?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Function to check if user has specific role
function hasRole($role)
{
    return isset($_SESSION['user_role']) && $_SESSION['user_role'] === $role;
}

// Logout logic
if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destroy the session
    session_destroy();

    // Redirect to index page after logout
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .header a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
        }

        .header a:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Welcome, <?php echo $_SESSION['user_email']; ?>!</h1>
        <p>Your role: <?php echo $_SESSION['user_role']; ?></p>

        <!-- Navigation links based on user role -->
        <?php if (hasRole('Admin')) : ?>
            <a href="admin_dashboard.php">Admin Dashboard</a>
            <a href="manage_users.php">Manage Users</a>
            <a href="reports.php">View Reports</a>
        <?php elseif (hasRole('HR')) : ?>
            <a href="hr_dashboard.php">HR Dashboard</a>
            <a href="employee_directory.php">Employee Directory</a>
            <a href="leave_requests.php">Leave Requests</a>
        <?php elseif (hasRole('User')) : ?>
            <a href="user_dashboard.php">User Dashboard</a>
            <a href="profile.php">My Profile</a>
            <a href="settings.php">Settings</a>
        <?php endif; ?>

        <!-- Logout Button -->
        <form action="" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>

</html>