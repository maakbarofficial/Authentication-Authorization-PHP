<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi User Login System</title>
</head>

<body>
    <div>
        <h1>Register</h1>
        <form action="register.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="">
            <label for="password">Password:</label>
            <input type="password" name="password" id="">
            <label for="role">Role:</label>
            <select name="roles" id="">
                <option value="User">User</option>
                <option value="Admin">Admin</option>
                <option value="HR">HR</option>
            </select>
            <button>Register</button>
        </form>

    </div>
    <br><br><br>
    <div>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="">
            <label for="email">Password:</label>
            <input type="password" name="password" id="">
            <button>Login</button>
        </form>

    </div>
</body>

</html>