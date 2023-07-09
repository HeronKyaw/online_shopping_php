<?php
    include("../confs/config.php");
    $result = mysqli_query($conn, "SELECT tbl_item.*, tbl_category.name FROM tbl_item LEFT JOIN tbl_category ON tbl_item.category_id = tbl_category.id ORDER BY tbl_item.reached_date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item List</title>
</head>
<body>
    <h1>Item List</h1>
    <ul class="list">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <li>
                <img src="../image/<?php echo $row['photo'] ?>" alt="" align="right" height="140">
                <b><?php echo $row['title'] ?></b>
                <i>by <?php echo $row['brand'] ?></i>
                <small>(in <?php echo $row['name'] ?>)</small>
                <span>$<?php echo $row['price'] ?></span>
                <div><?php echo $row['review'] ?></div>

                [<a href="item_delete.php?id=<?php echo $row['id'] ?>" onClick="return confirm('Are you sure?')">Delete</a>]
                [<a href="item_edit.php?id=<?php echo $row['id'] ?>">Edit</a>]
            </li>
        <?php endwhile; ?>
    </ul>
    <a href="item_new.php" class="new">New Item</a>
    <br style="clear:both">
</body>
</html>