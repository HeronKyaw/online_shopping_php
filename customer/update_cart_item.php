<?php
    include("../confs/config.php");
    session_start();
    $id = $_GET['id'];
    $method = $_GET['method'];

    $query = "SELECT stock FROM tbl_item WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $stock = mysqli_fetch_assoc($result)['stock'];

    if (isset($_SESSION['cart'])) {
        $item =& $_SESSION['cart'][$id];
        if ($method == 'increase') {
            if ($item < $stock) {
                $item++;
            } else {
                $_SESSION['alert'] = "Stock is not enough!";;
            }
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