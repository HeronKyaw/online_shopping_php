<?php
session_start();
include("../confs/config.php");

$cart = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
        $cart += $qty;
    }
}

$id = $_GET['id'];
$item = mysqli_query($conn, "SELECT * FROM tbl_item WHERE id = $id");
$row = mysqli_fetch_assoc($item);
$isLogin = isset($_SESSION['auth']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>
    <link rel="stylesheet" href="../resources/style/main.css">
</head>

<body>
    <nav class="nav-bar flex flex-row p-4 justify-between items-center">
        <a href="../index.php" class="flex items-center justify-center rounded-md bg-slate-500 px-4 py-2 text-center text-sm font-medium text-white hover:bg-slate-700">Back</a>
        <h1 class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Item Details</h1>
        <?php if (!isset($_SESSION['auth'])) : ?>
            <div class="auth-btn flex md:order-2">
                <a href="../admin/index.php" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</a>
                <a href="#" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign Up</a>
            </div>
        <?php else : ?>
            <div class="flex gap-4">
                <div class="go-to-cart">
                    <a href="../customer/view_cart.php" type="button" class="relative inline-flex items-center px-2.5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                            <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                        </svg>
                        <span class="sr-only">Cart Items</span>
                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                            <?php echo $cart ?>
                        </div>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </nav>
    <main class="container mx-auto p-6 md:p-12">
        <div class="border text-card-foreground shadow-sm md:flex bg-white rounded-lg p-6" data-v0-t="card">
            <div class="md:w-1/2"><img src="../storage/upload/<?php echo $row['photo']?>" alt="<?php echo $row['title']?>'s Image" class="w-full h-full object-cover rounded-lg" width="500" height="500" style="aspect-ratio: 500 / 500; object-fit: cover;"></div>
            <div class="mt-4 md:mt-0 md:w-1/2 px-4">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h2 class="text-xl md:text-2xl font-bold mb-2"><?php echo $row['title']?></h2>
                    <p class="mt-1 text-slate-400 mb-2"><?php echo $row['brand']?></p>
                    <div class="text-lg md:text-xl font-bold mb-2">Price: $<?php echo $row['price']?></div>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 mt-4">
                        <?php echo $row['review']?>
                    </p>
                    <div class="mt-8">
                        <a href="<?php echo $isLogin ? '/customer/add_to_cart.php?id=' . $row['id'] : '/admin/index.php'; ?>" class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Add to cart
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>