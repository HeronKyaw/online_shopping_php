<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>
    <link rel="stylesheet" href="../resources/style/main.css">
</head>
<body>
    <h1>Item Details</h1>
    <?php
        include("../confs/config.php");
        $id = $_GET['id'];
        $item = mysqli_query($conn, "SELECT * FROM tbl_item WHERE id = $id");
        $row = mysqli_fetch_assoc($item);
    ?>
    <div class="detail">
        <a href="../index.php" class="back">Back</a>
        <img src="../storage/upload/<?php echo $row['photo']?>" alt="<?php echo $row['title']?>'s Image" width="300" height="200">
        <h2><?php echo $row['title']?></h2>
        <i>by <?php echo $row['brand']?></i>
        <b>$<?php echo $row['price']?></b>
        <p><?php echo $row['review']?></p>
        <a href="add_to_cart.php?id=<?php echo $row['id']?>" class="add-to-cart">
            Add to Cart
        </a>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </div>
</body>
</html>