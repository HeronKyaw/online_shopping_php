<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop With Us</title>
    <link rel="stylesheet" href="/resources/style/main.css">
</head>

<body class="h-screen max-h-screen">
    <?php
        include("../../confs/config.php");
        $result = mysqli_query($conn, "SELECT * FROM tbl_category");
    ?>
    <main class="h-full">
        <div class="flex flex-col overflow-x-hidden">
            <div class="flex flex-row">
                <?php include('../../component/admin_sidebar.php') ?>
                <div class=" overflow-x-scroll w-full h-screen flex flex-col">
                    <?php include('../../component/admin_nav_bar.php') ?>
                    <div class="px-10 pt-24">
                        <h1>Category List</h1>
                        <ul class="list">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <li title="<?php echo $row['remark'] ?>">
                                    [ <a href="cat_delete.php?id=<?php echo $row['id'] ?>" class="del" onClick="return confirm('Are you sure?')">delete</a> ]
                                    [ <a href="cat_edit.php?id=<?php echo $row['id'] ?>" class="edit">edit</a> ]
                                    <?php echo $row['name'] ?>
                                </li>
                            <?php } ?>
                        </ul>
                        <a href="cat_new.php" class="new">New Category</a>
                        <br style="clear:both">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>