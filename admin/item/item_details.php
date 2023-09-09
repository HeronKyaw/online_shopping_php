<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Item Detail</h1>
    <?php
        include("../../confs/config.php");
        $id=$_GET['id'];
        $items=mysqli_query($conn,"SELECT * FROM tbl_item WHERE id=$id");
        $row=mysqli_fetch_assoc($items);
    ?>
    <div class="detail">
        <a href="../order/order.php" class="back"> &laquo; Go Back</a>
        <img src="../image/items/ <?php echo $row['photo']?>" alt="">
        <h2><?php echo $row['title']?></h2>
        <i>by <?php echo $row['brand']?></i>
        <b>$<?php echo $row ['price']?></b>
        <p><?php echo $row['review']?></p>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </div>

</body>
</html>