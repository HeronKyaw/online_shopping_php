<?php
    $cart = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $qty) {
            $cart += $qty;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop With Me</title>
    <link rel="stylesheet" href="../resources/style/main.css">
</head>
<body>
    <nav class="nav-bar">
        <div class="logo">
            <h1 id="title" style="font-family: 'Courier New', Courier, monospace;" class="text-3xl font-bold w-fit">Shop With Us</h1>
        </div>
        <div class="nav-btn">
<!--            Condition to check whether the user is log in or not-->
            <?php ?>
            <div class="auth-btn">
                <a href="../admin/index.php" class="login-btn">
                    Login
                </a>
                <a href="" class="sign-up-btn">
                    Sign Up
                </a>

            </div>
<!--            <a href="./customer/view_cart.php" class="relative inline-flex items-center text-sm font-medium text-center">-->
<!--                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">-->
<!--                    <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />-->
<!--                </svg>-->
<!--                <span class="sr-only">Cart Items</span>-->
<!--                <div class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full -top-1 -right-[0.4rem]">-->
<!--                    --><?php //echo $cart ?>
<!--                </div>-->
<!--            </a>-->
        </div>
    </nav>
</body>
</html>