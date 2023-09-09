<?php
    include("../confs/config.php");
    $cats = mysqli_query($conn, "SELECT * FROM tbl_category");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop With Me</title>
    <link rel="stylesheet" href="../resources/style/main.css">
</head>
<body>
    <aside class="sidebar w-40 px-4">
        <ul class="cats">
            <li>
                <b><a href="index.php">All Items</a></b>
            </li>
            <?php while ($row = mysqli_fetch_assoc($cats)) : ?>
                <li>
                    <a href="index.php?cat=<?php echo $row['id'] ?>">
                        <?php echo $row['name'] ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </aside>
</body>
</html>