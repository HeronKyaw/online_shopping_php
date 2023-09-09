<?php
session_start();
if (!isset($_SESSION['cart'])) {
    header("location: ../index.php");
    exit();
}
include("../confs/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
</head>

<body>
    <h1>View Cart</h1>
    <div class="sidebar">
        <ul class="cats">
            <li><a href="../index.php">&laquo; Continue Shopping</a></li>
            <li><a href="./clear_cart.php" class="del">&times; Clear Cart</a></li>
        </ul>
    </div>
    <div class="cart">
        <table>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Price</th>
            </tr>
            <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $qty) {
                $result = mysqli_query($conn, "SELECT title, price FROM tbl_item WHERE id = $id");
                $row = mysqli_fetch_assoc($result);
                $total += $row['price'] * $qty;
            ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $qty; ?></td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td>$<?php echo $row['price'] * $qty; ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" align="right"><b>Total:</b></td>
                <td>$<?php echo $total; ?></td>
            </tr>
        </table>
        <div class="order-form">
            <h2>Order Now</h2>
            <form action="submit_order.php" method="post">
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" required>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>

                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" required>

                <label for="visa">Visa Card</label>
                <input type="text" name="visa" id="visa">

                <label for="address">Address</label>
                <textarea name="address" id="address"></textarea>
                <br><br>
                <input type="submit" value="Submit Order">
                <a href="../index.php">Continue Shopping</a>
            </form>
        </div>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?>. All right reserved.
    </div>
</body>

</html>