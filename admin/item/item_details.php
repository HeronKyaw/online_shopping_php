<?php
    include("../../confs/auth.php");
    include("../../confs/config.php");
    $id=$_GET['id'];
    $page=$_GET['page'];
    $url = '';
    $items=mysqli_query($conn,"SELECT * FROM tbl_item WHERE id=$id");
    $row=mysqli_fetch_assoc($items);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop With Us</title>
    <link rel="stylesheet" href="/resources/style/main.css">
</head>

<body class="h-screen max-h-screen">

<main class="h-full">
    <div class="flex flex-col overflow-x-hidden">
        <div class="flex flex-row">
            <?php include('../../component/admin_sidebar.php') ?>
            <div class=" overflow-x-scroll w-full h-screen flex flex-col bg-gray-50 dark:bg-gray-900 ">
                <?php include('../../component/admin_nav_bar.php') ?>
                <div class="px-10 pt-24">
                    <div class="detail">
                        <a href="<?php
                            if ($page == 'item') {
                                echo "/admin/item/item_list.php";
                            } else if ($page == 'order') {
                                echo "/admin/order/order.php";
                            }
                        ?>" class="back">
                            &laquo; Go Back
                        </a>
                        <img src="/storage/upload/<?php echo $row['photo']?>" alt="">
                        <h2><?php echo $row['title']?></h2>
                        <i>by <?php echo $row['brand']?></i>
                        <b>$<?php echo $row['price']?></b>
                        <p><?php echo $row['review']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>

</html>