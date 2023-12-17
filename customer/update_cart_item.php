<?php
    session_start();
    $id = $_GET['id'];
    $method = $_GET['method'];

    if (isset($_SESSION['cart'])) {
        $item =& $_SESSION['cart'][$id];
        if ($method == 'increase') {
            $item++;
        } else if ($method == 'decrease') {
            if ($item > 1) {
                $item--;
            } else {
                unset($_SESSION['cart'][$id]);
            }
        } else if ($method == 'remove') {
            unset($_SESSION['cart'][$id]);
        }
    }

    header("location: view_cart.php");