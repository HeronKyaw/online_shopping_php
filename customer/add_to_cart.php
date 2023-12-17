<?php
    session_start();
    $id = $_GET['id'];

    // Initialize the cart if it doesn't exist yet
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the item is already in the cart
    if (isset($_SESSION['cart'][$id])) {
        // If it's already in the cart, increment the quantity
        $_SESSION['cart'][$id]++;
    } else {
        // If it's not in the cart, add it with a quantity of 1
        $_SESSION['cart'][$id] = 1;
    }

    header("location: ../index.php");
