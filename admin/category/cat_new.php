<?php
    include("../../confs/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Category</title>
    <link rel="stylesheet" href="/resources/style/main.css">
</head>
<body class="h-screen max-h-screen">
    <main class="h-full">
        <div class="flex flex-col overflow-x-hidden">
            <div class="flex flex-row">
                <?php include('../../component/admin_sidebar.php') ?>
                <div class=" overflow-x-scroll w-full h-screen flex flex-col bg-gray-50 dark:bg-gray-900 ">
                    <?php include('../../component/admin_nav_bar.php') ?>
                    <div class="px-10 pt-8">
                        <div class="max-w-4xl px-4 mx-auto lg:py-16">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">New Category</h2>
                            <form action="cat_add.php" method="POST">
                                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                                    <div class="sm:col-span-2">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <textarea id="remark" name="remark" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a category description here..."></textarea>
                                    </div>
                                </div>
                                <div class="flex w-full justify-center items-center space-x-16">
                                    <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        Save
                                    </button>
                                    <a href="cat_list.php" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>