<?php 
    session_start();
    include("../confs/config.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $card = $_POST['card-no'];
    $address = $_POST['address'];
    $received = date("Y-m-d H:i:s", strtotime("+7days", strtotime('now')));

    $sql = "INSERT INTO tbl_orders (name, email, phone, visa_card, address, status, ordered_date, received_date) VALUES ('$name', '$email', '$phone', '$card', '$address', 0, now(), '$received')";

    mysqli_query($conn, $sql);

    $order_id = mysqli_insert_id($conn);

    foreach ($_SESSION['cart'] as $id => $qty) {
        mysqli_query($conn, "INSERT INTO tbl_order_items (item_id, order_id, qty) VALUES ($id, $order_id, $qty)");
    }

    unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Order</title>
    <link rel="stylesheet" href="../resources/style/main.css">
</head>
<body class="h-screen flex flex-col justify-center">
    <div>
        <h1 class="text-3xl text-center mb-4">Your order has been submitted!</h1>
        <div class="flex justify-center">
            <a href="../index.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">Continue Shopping</a>
        </div>
    </div>
</body>
</html>