<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <h1>Edit Category</h1>
    <?php
        include("confs/config.php");
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM tbl_category WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    ?>
    <form action="cat_update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>"> <br><br>
    
        <label for="remark">Remark</label><br>
        <textarea name="remark" id="remark"><?php echo $row['remark'] ?></textarea>
        <br><br>

        <input type="submit" value="Update Category">
        <a href="cat_list.php" class="back">Back>></a>
    </form>
</body>
</html>