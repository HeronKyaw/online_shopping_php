<?php
    include("confs/auth.php");
    include("confs/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <ul class="menu">
        <li><a href="welcomeadmin.php">Home</a></li>
        <li><a href="item/item_list.php">Manage Items</a></li>
        <li><a href="category/cat_list.php">Manage Categories</a></li>
        <li><a href="order/orders.php">Manage Orders</a></li>
        <li><a href="auth/logout.php">Logout</a></li>
    </ul>

    <h1>Online Shop Administration</h1>
    <img src="image/defaults/welcome.png" alt="Welcome Image" width="1100" height="500">
    <div class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </div>
</body>
</html>