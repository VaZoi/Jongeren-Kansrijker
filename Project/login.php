<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'db.php';
    $db = new database();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $db->getUserByUsername($username);

    if ($user && password_verify($password, $user['userPassword'])) {
        $_SESSION['user_id'] = $user['userID'];
        header('Location: Dashboard.php');
        exit();
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="Logo.png">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <header>
    <div class="header">
        <img class="Logo" src="Logo.png" alt="">
        <h1>Instituut Jongeren Kansrijker</h1>
    </div>
    </header>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error_message)) : ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="post" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
