<?php
    include("../confs/config.php");
    session_start();
    $id = $_GET['id'];

    // Initialize the cart if it doesn't exist yet
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the item is already in the cart
    if (isset($_SESSION['cart'][$id])) {
        $query = "SELECT stock FROM tbl_item WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $stock = mysqli_fetch_assoc($result)['stock'];

        if ($_SESSION['cart'][$id] < $stock) {
            // If it's already in the cart, increment the quantity
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['alert'] = "Stock is not enough as you have picked some in the cart!";
        }
    } else {
        // If it's not in the cart, add it with a quantity of 1
        $_SESSION['cart'][$id] = 1;
    }

    header("location: ../index.php");
