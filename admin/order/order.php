<?php
    include("../confs/config.php");
    include("../confs/auth.php");
    $order_data = mysqli_query($conn, "SELECT * FROM tbl_orders");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="./style/main.css">
</head>
<body>
    <ul class="orders">
        <?php while ($orders = mysqli_fetch_assoc($order_data)) { ?>
            <?php if ($orders['status']) { ?>
                <li class="delivered">
            <?php } else { ?>
                <li>
            <?php } ?>
            <div class="order">
                <b><?php echo $orders['name'] ?></b>
                <i><?php echo $orders['email'] ?></i>
                <span><?php echo $orders['phone'] ?></span>
                <p><?php echo $orders['visa_card'] ?></p>
                <p><?php echo $orders['address'] ?></p>
                <span><?php echo $orders['received_date'] ?></span>

                <?php if ($orders['status']) { ?>
                    * <a href="order_status.php?id=<?php echo $orders['id'] ?>&status=0" class="undo">Undo</a>
                <?php } else { ?>
                    * <a href="order_status.php?id=<?php echo $orders['id'] ?>&status=1" class="deliver">Mark as Delivered</a>
                <?php } ?>
            </div>
            <div class="items">
                <?php 
                    $order_id = $orders['id'];
                    $order_item = mysqli_query($conn, "SELECT tbl_order_items.*, tbl_item.title FROM tbl_order_items LEFT JOIN tbl_item ON tbl_order_items.item_id = tbl_item.id WHERE tbl_order_items.order_id = $order_id") or die(mysqli_error($conn)); 
                    while ($items = mysqli_fetch_assoc($order_item)) {
                ?>
                <b>
                    <a href="../item/item_detail.php?id=<?php echo $items['id'] ?>">
                        <?php echo $item['title'] ?>
                    </a>
                    (<?php echo $items['qty'] ?>)
                </b>
                <?php } ?>
            </div>
            </li>
        <?php } ?>
        </li>
    </ul>
</body>
</html>