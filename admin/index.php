<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Login to Online Shop Administration</h1>
    <?php if (isset($_GET['login']) and $_GET['login'] == 'failed'): ?>
        <div class="msg error">
            <p>Login Failed! Username or password is incorrect.</p>
        </div>
    <?php endif; ?>
    <form action="auth/login.php" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name">

        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <br><br>
        <input type="submit" value="Admin Login">
    </form>
</body>
</html>