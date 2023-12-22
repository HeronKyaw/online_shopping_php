<?php
    include("../confs/auth.php");
    include("../confs/config.php");
    
    $best_seller_query = mysqli_query($conn, "SELECT i.id AS item_id, i.title AS item_title, i.brand AS item_brand, i.photo AS item_photo, c.name AS category_name, COUNT(oi.id) AS total_sales, SUM(i.price * oi.qty) AS total_price FROM tbl_item i JOIN tbl_order_items oi ON i.id = oi.item_id JOIN tbl_category c ON i.category_id = c.id GROUP BY i.id ORDER BY total_sales DESC LIMIT 1");

    $query = mysqli_query($conn, "SELECT COUNT(*) as total_count, SUM(status=0) as to_deliver_count, SUM(status=1) as delivered_count FROM tbl_orders");

    $row = mysqli_fetch_assoc($query);
    
    $best_seller_item = mysqli_fetch_assoc($best_seller_query);

    $total_count = $row['total_count'];
    $to_deliver_count = $row['to_deliver_count'];
    $delivered_count = $row['delivered_count'];
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
                <?php include('../component/admin_sidebar.php') ?>
                <div class=" overflow-x-scroll w-full h-screen flex flex-col bg-gray-50 dark:bg-gray-900 ">
                    <?php include('../component/admin_nav_bar.php') ?>
                    <div class="px-10 pt-24 flex flex-col justify-center items-center gap-5 h-full">
                        <div class="flex flex-col justify-center items-center">
                            <h1 class="text-4xl font-bold text-gray-900 dark:text-white">Welcome back, <?php echo $_SESSION['username'] ?>!</h1>
                        </div>
                        <div class="max-w-2xl w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 flex flex-col gap-4">
                            <div>
                                <div class="flex justify-between mb-3">
                                    <div class="flex items-center">
                                        <div class="flex justify-center items-center">
                                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Orders</h5>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                                    <div class="grid grid-cols-3 gap-3">
                                        <dl class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-24">
                                            <dt class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">
                                                <?php echo $to_deliver_count ?? 0 ?>
                                            </dt>
                                            <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">To Deliver</dd>
                                        </dl>
                                        <dl class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-24">
                                            <dt class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">
                                                <?php echo $delivered_count ?? 0 ?>
                                            </dt>
                                            <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">Delivered</dd>
                                        </dl>
                                        <dl class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-24">
                                            <dt class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">
                                                <?php echo $total_count ?? 0 ?>
                                            </dt>
                                            <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Total Orders</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-3">
                                    <div class="flex items-center">
                                        <div class="flex justify-center items-center">
                                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Best Seller</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                                    <div class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap flex items-center justify-between gap-4">
                                        <?php if (mysqli_num_rows($best_seller_query) > 0) : ?>
                                            <div class="flex flex-row gap-4">
                                            <img src="/storage/upload/<?php echo $best_seller_item['item_photo'] ?>" alt="item's image" class="w-auto h-16">
                                            <div class="flex flex-col">
                                                <div class="flex flex-row gap-4">
                                                    <?php echo $best_seller_item['item_title'] ?>
                                                    <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded text-center">
                                                        <?php echo $best_seller_item['category_name'] ?>
                                                    </span>
                                                </div>
                                                <div class="font-medium text-gray-500 whitespace-nowrap text-sm italic">
                                                    <?php echo $best_seller_item['item_brand'] ?>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            $<?php echo $best_seller_item['total_price'] ?>
                                        </div>
                                        <?php else : ?>
                                            <div class="flex flex-row gap-4">
                                                <div class="flex flex-col">
                                                    <div class="flex flex-row gap-4">
                                                        No bestseller yet!
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>