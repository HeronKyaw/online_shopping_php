<?php
    include("../../confs/config.php");
    $result = mysqli_query($conn, "SELECT tbl_item.*, tbl_category.name, SUM(tbl_order_items.qty) AS total_qty FROM tbl_item LEFT JOIN tbl_category ON tbl_item.category_id = tbl_category.id LEFT JOIN tbl_order_items ON tbl_item.id = tbl_order_items.item_id GROUP BY tbl_item.id, tbl_item.title, tbl_item.reached_date, tbl_category.name ORDER BY tbl_item.reached_date");
    $total_items = mysqli_num_rows($result);
    $total_orders = 0;
    $item_id = 0;
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
                <div class=" overflow-x-scroll w-full h-screen flex flex-col bg-gray-50 dark:bg-gray-900">
                    <?php include('../../component/admin_nav_bar.php') ?>
                    <div class="px-10 pt-24">
                        <section class="sm:py-5">
                            <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                                    <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                                        <div class="flex items-center flex-1 space-x-4">
                                            <h5>
                                                <span class="text-gray-500">All Products:</span>
                                                <span class="dark:text-white"><?php echo $total_items ?></span>
                                            </h5>
                                        </div>
                                        <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                                            <a href="/admin/item/item_new.php" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                                </svg>
                                                Add new product
                                            </a>
                                        </div>
                                    </div>
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-4 py-3">No.</th>
                                                <th scope="col" class="px-4 py-3">Product</th>
                                                <th scope="col" class="px-4 py-3">Category</th>
                                                <th scope="col" class="px-4 py-3">Brand</th>
                                                <th scope="col" class="px-4 py-3">Price</th>
                                                <th scope="col" class="px-4 py-3">Order (qty)</th>
                                                <th scope="col" class="px-4 py-3">Edit</th>
                                                <th scope="col" class="px-4 py-3">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                        <th class="px-4 ">
                                                            <?php
                                                                $item_id++;
                                                                echo $item_id
                                                            ?>
                                                        </th>
                                                        <th scope="row" class="px-4  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <a href="item_details.php?id=<?php echo $row['id']?>&page=item" class="flex items-center">
                                                                <img src="/storage/upload/<?php echo $row['photo'] ?>" alt="item's image" class="w-auto h-8 mr-3">
                                                                <?php echo $row['title'] ?>
                                                            </a>
                                                        </th>
                                                        <td class="px-4 ">
                                                            <span class="bg-primary-100 text-primary-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                                                                <?php echo $row['name'] ?>
                                                            </span>
                                                        </td>
                                                        <td class="px-4  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <div class="flex items-center">
                                                                <?php echo $row['brand'] ?>
                                                            </div>
                                                        </td>
                                                        <td class="px-4  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            $<?php echo $row['price'] ?>
                                                        </td>
                                                        <td class="px-4  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <?php
                                                                if (is_null($row['total_qty'])) {
                                                                    echo 0;
                                                                } else {
                                                                    $total_orders += $row['total_qty'];
                                                                    echo $row['total_qty'];
                                                                }
                                                            ?>
                                                        </td>
                                                        <td class="px-4  font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <a href="/admin/item/item_edit.php?id=<?php echo $row['id'] ?>"  class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                                Edit
                                                            </a>
                                                        </td>
                                                        <td class="px-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                            <!-- Modal toggle -->
                                                            <button type="button" id="deleteButton" data-modal-toggle="deleteModal"  class="justify-center m-5 text-white inline-flex items-center border bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                            </button>

                                                            <!-- Main modal -->
                                                            <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                                    <!-- Modal content -->
                                                                    <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                                        <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                                        <div class="flex justify-center items-center space-x-4">
                                                                            <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                                No, cancel
                                                                            </button>
                                                                            <a href="item_delete.php?id=<?php echo $row['id'] ?>" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                                Yes, I'm sure
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <nav class="flex flex-col md:flex-row justify-end items-center md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                                        <p class="text-sm">
                                            <span class="font-normal text-gray-500 dark:text-gray-400">Total orders:</span>
                                            <span class="font-semibold text-gray-900 dark:text-white">
                                                <?php echo $total_orders; ?>
                                            </span>
                                        </p>
                                    </nav>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById('deleteButton').click();
        });
    </script>
</body>

</html>