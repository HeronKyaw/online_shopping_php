<?php
    include("../../confs/config.php");
    include("../../confs/auth.php");
    $order_data = mysqli_query($conn, "SELECT * FROM tbl_orders");
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
                    <?php if (mysqli_num_rows($order_data) > 0) { ?>
                        <div class="px-10 pt-24">
                            <ul class="orders">
                                <?php while ($orders = mysqli_fetch_assoc($order_data)) { ?>
                                    <li class="<?php echo $orders['status'] ? 'bg-teal-100' : ''?> border mb-3 px-10 py-4 rounded-md bg-gray-200">
                                        <div class="flex flex-col">
                                            <div class="flex flex-row justify-between items-center">
                                                <div class="flex flex-col">
                                                    <b class="text-lg">
                                                        <?php echo $orders['name'] ?>
                                                        (<i><?php echo $orders['email'] ?></i>)
                                                        <span class="<?php echo $orders['status'] ? "bg-emerald-200 text-emerald-800" : "bg-red-200 text-red-800" ?> text-xs font-medium px-2 py-0.5 rounded">
                                                            <?php echo $orders['status'] ? "Delivered" : "Pending" ?>
                                                        </span>
                                                    </b>
                                                    <span class="text-lg"><?php echo $orders['phone'] ?></span>
                                                    <p><?php echo $orders['visa_card'] ?></p>
                                                    <p><?php echo $orders['address'] ?></p>
                                                    <span class="italic text-gray-500 text-sm"><?php echo $orders['received_date'] ?></span>
                                                </div>
                                                <div class="flex flex-col">
                                                    <a href="order_status.php?id=<?php echo $orders['id'] ?>&status=<?php echo $orders['status'] ? 0 : 1 ?>" class="<?php echo $orders['status'] ? "bg-gray-700 hover:bg-gray-800 focus:ring-gray-300" : "bg-green-700 hover:bg-green-800 focus:ring-blue-300"?> w-44 text-center text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-3">
                                                        <?php echo $orders['status'] ? 'Undo' : 'Mark as Delivered' ?>
                                                    </a>
                                                </div>
                                            </div>
                                                <div class="relative overflow-x-auto my-4">
                                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                    <tr>
                                                        <th scope="col" class="px-6 py-3">
                                                            Item name
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Quantity
                                                        </th>
                                                        <th scope="col" class="px-6 py-3">
                                                            Price
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $order_id = $orders['id'];
                                                        $total_price = 0;
                                                        $order_item = mysqli_query($conn, "SELECT tbl_order_items.*, tbl_item.title, tbl_item.price FROM tbl_order_items LEFT JOIN tbl_item ON tbl_order_items.item_id = tbl_item.id WHERE tbl_order_items.order_id = $order_id") or die(mysqli_error($conn));
                                                        while ($items = mysqli_fetch_assoc($order_item)) {
                                                            $total_price += $items['price'] * $items['qty'];
                                                    ?>
                                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                <?php echo $items['title'] ?>
                                                            </th>
                                                            <td class="px-6 py-4">
                                                                <?php echo $items['qty'] ?>
                                                            </td>
                                                            <td class="px-6 py-4">
                                                                $<?php echo $items['price'] * $items['qty'] ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                        <th scope="row" colspan="2" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            Total
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            $<?php echo $total_price ?>
                                                        </td>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div class="flex flex-col items-center justify-center h-full">
                            <h1 class="text-3xl font-medium text-gray-500">No Orders Yet</h1>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>