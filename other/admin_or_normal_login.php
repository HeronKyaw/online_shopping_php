<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="../resources/style/main.css">
</head>

<body class=" bg-adminOrCus-img backdrop-blur-md">
    <main class="w-full flex justify-center items-center" style="height: 90vh">
        <div class="px-52 flex flex-col gap-4 justify-center items-center">
            <div class="text-4xl font-bold text-white mb-4">
                Welcome, <?php echo $_SESSION['username'] ?>
            </div>
            <div class="go-to-btns flex flex-row justify-between gap-3">
                <a href="../admin/admin_dashboard.php" class=" admin-btn relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                    <span class="relative px-10 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Admin
                    </span>
                </a>
                <h1 class="text-4xl text-transparent bg-clip-text bg-gradient-to-br from-pink-400 via-pink-500 to-pink-600">
                    or
                </h1>
                <a href="../index.php" class="customer-btn relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                    <span class="relative px-10 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Customer
                    </span>
                </a>
            </div>
        </div>
    </main>
</body>

</html>