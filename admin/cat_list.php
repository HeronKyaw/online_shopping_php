<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
</head>
<body>
    <h1>Category List</h1>
    <?php
        include("confs/config.php");
        $result = mysqli_query($conn, "SELECT * FROM tbl_category");
    ?>
    <ul class="list">
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <li title="<?php echo $row['remark'] ?>">
                [ <a href="cat_delete.php?id=<?php echo $row['id'] ?>" class="del" onClick="return confirm('Are you sure?')">delete</a> ]
                [ <a href="cat_edit.php?id=<?php echo $row['id'] ?>" class="edit">edit</a> ]
                <?php echo $row['name'] ?>
            </li>
        <?php } ?>
    </ul>
    <a href="cat_new.php" class="new">New Category</a>
    <br style="clear:both">
</body>
</html>