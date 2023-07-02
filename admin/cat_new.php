<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Category</title>
</head>
<body>
    <h1>New Category</h1>
    <form action="cat_add.php" method="POST">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name"> <br><br>
        
        <label for="remark">Remark</label><br>
        <textarea type="text" name="remark" id="remark"></textarea>
        <br><br>

        <input type="submit" value="Add Category">
        <a href="cat_list.php" class="back">Back>></a>
    </form>
</body>
</html>