<?php
    include("../../confs/config.php");

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_item WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
</head>
<body>
    <h1>New Item</h1>
    <form action="item_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="title">Item Name</label>
        <input type="text" name="title" id="title" value="<?php echo $row['title']; ?>">
        <br><br>
        
        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" value="<?php echo $row['brand']; ?>">
        <br><br>

        <label for="review">Review</label>
        <input type="text" name="review" id="review" value="<?php echo $row['review']; ?>">
        <br><br>

        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="<?php echo $row['price']; ?>">
        <br><br>
        
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            <option value="0">-- Choose --</option>
            <?php
                include("../../confs/config.php");
                $sql = "SELECT id, name FROM tbl_category";
                $categories = mysqli_query($conn, $sql);
                while($cat = mysqli_fetch_assoc($categories)) {
            ?>
            <option value="<?php echo $cat['id']?>">
                <?php echo $cat['name'] ?>
                <?php if($cat['id'] == $row['category_id']) echo "selected" ?>
            </option>
            <?php } ?>
        </select>
        <br><br>

        <img src="../image/<?php echo $row['photo']; ?>" alt="" height="150">
        <label for="photo">Image</label>
        <input type="file" name="photo" id="photo" >
        <br><br>

        <input type="submit" value="Update Item">
        <a href="item_list.php">Back>></a>
    </form>
</body>
</html>