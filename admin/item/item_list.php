<?php
include("../../confs/config.php");
$result = mysqli_query($conn, "SELECT tbl_item.*, tbl_category.name FROM tbl_item LEFT JOIN tbl_category ON tbl_item.category_id = tbl_category.id ORDER BY tbl_item.reached_date DESC");
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
                <div class=" overflow-x-scroll w-full h-screen flex flex-col">
                    <?php include('../../component/admin_nav_bar.php') ?>
                    <div class="px-10 pt-24">
                        <ul class="items mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <li>
                                    <div class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                                        <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="./customer/item_detail.php?id=<?php echo $row['id'] ?>">
                                            <img class="object-contain" src="/storage/upload/<?php echo $row['photo'] ?>" alt="<?php echo $row['title'] ?>'s image" />
                                        </a>
                                        <div class="mt-4 px-5 pb-5">
                                            <a href="./customer/item_detail.php?id=<?php echo $row['id'] ?>">
                                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php echo $row['title'] ?></h5>
                                            </a>
                                            <span class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full bg-indigo-900 text-indigo-300">
                                                <?php echo $row['name'] ?>
                                            </span>
                                            <div class="flex items-center justify-between mt-2 mb-4">
                                                <span class="text-2xl font-bold text-gray-900 dark:text-white">$<?php echo $row['price'] ?></span>
                                            </div>
                                            <div class="flex justify-around items-center">
                                                <a href="#" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                                                    Edit
                                                </a>
                                                <a href="#" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div>
                                        <img src="/storage/upload/<?php echo $row['photo'] ?>" alt="" align="right" height="140">
                                        <b><?php echo $row['title'] ?></b>
                                        <i>by <?php echo $row['brand'] ?></i>
                                        <small>(in <?php echo $row['name'] ?>)</small>
                                        <span>$<?php echo $row['price'] ?></span>
                                        <div><?php echo $row['review'] ?></div>

                                        [<a href="item_delete.php?id=<?php echo $row['id'] ?>" onClick="return confirm('Are you sure?')">Delete</a>]
                                        [<a href="item_edit.php?id=<?php echo $row['id'] ?>">Edit</a>]
                                    </div> -->
                                </li>
                            <?php endwhile; ?>
                        </ul>
                        <a href="item_new.php" class="new">New Item</a>
                        <br style="clear:both">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>