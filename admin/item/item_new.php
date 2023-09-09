<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Item</title>
</head>
<body>
    <h1>New Item</h1>
    <form action="item_add.php" method="POST" enctype="multipart/form-data">
        <label for="title">Item Name</label>
        <input type="text" name="title" id="title">
        <br><br>
        
        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand">
        <br><br>

        <label for="review">Review</label>
        <input type="text" name="review" id="review">
        <br><br>

        <label for="price">Price</label>
        <input type="text" name="price" id="price">
        <br><br>
        
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            <option value="0">-- Choose --</option>
            <?php
                include("../../confs/config.php");
                $sql = "SELECT id, name FROM tbl_category";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <option value="<?php echo $row['id']?>">
                <?php echo $row['name'] ?>
            </option>
            <?php } ?>
        </select>
        <br><br>

        <label for="photo">Image</label>
        <input type="file" name="photo" id="photo">
        <br><br>

        <input type="submit" value="Add Item">
        <a href="item_list.php">Back>></a>
    </form>
</body>
</html>