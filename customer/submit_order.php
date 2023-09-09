<?php 
    session_start();
    include("../confs/config.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $visa = $_POST['visa'];
    $address = $_POST['address'];
    $received = date("Y-m-d H:i:s", strtotime("+7days", strtotime('now')));

    $sql = "INSERT INTO tbl_orders (name, email, phone, visa_card, address, status, ordered_date, received_date) VALUES ('$name', '$email', '$phone', '$visa', '$address', 0, now(), '$received')";

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
<body>
    <h1>Order Submitted</h1>
    <div class="msg">
        Your order has been submitted. We'll deliver the items soon.
        <a href="../index.php" class="back">Online Shop Home</a>
    </div>
    <footer class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </footer>
</body>
</html>