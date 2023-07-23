<?php
session_start();
include("admin/confs/config.php");

$cart = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
        $cart += $qty;
    }
}

#Browse by Category
if (isset($_GET['cat'])) {
    $cat_id = $_GET['cat'];
    $items = mysqli_query($conn, "SELECT * FROM tbl_item WHERE category_id = $cat_id");
} else {
    $items = mysqli_query($conn, "SELECT * FROM tbl_item");
}

#search result
if (isset($_GET['q'])) {
    // $items = search_perform($_GET['q'], "items", "title");
}
$cats = mysqli_query($conn, "SELECT * FROM tbl_category");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="./style/main.css">
</head>

<body>
    <nav class=" p-4 flex justify-between items-center bg-slate-200 static">
        <h1 id="title" style="font-family: 'Courier New', Courier, monospace;" class=" w-fit">Online Shop</h1>
        <div class="actionBtn flex justify-between w-[9%]">
            <button class="admininfo bg-violet-400 px-3 py-1 rounded-lg text-white hover:bg-violet-500">
                <a href="admin/auth/login.php">Login</a>
            </button>
            <a href="" class="relative inline-flex items-center text-sm font-medium text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                    <path d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                </svg>
                <span class="sr-only">Notifications</span>
                <div class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-bold text-white bg-red-500 rounded-full -top-1 -right-[0.4rem]">
                    <?php echo $cart ?>
                </div>
            </a>

        </div>
    </nav>

    <main class="main w-full bg-white shadow-xl rounded-lg flex overflow-x-auto custom-scrollbar ">
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

        <div class="flex-1 px-2">
            <ul class="items mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <?php while ($row = mysqli_fetch_assoc($items)) : ?>
                    <?php !is_dir("admin/image/items/{$row['photo']}") and file_exists("admin/image/items/{$row['photo']}") ?>
                    <div class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                        <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="item_detail.php?id=<?php echo $row['id'] ?>">
                            <img class="object-contain" src="admin/image/items/<?php echo $row['photo'] ?>" alt="<?php echo $row['title'] ?>'s image" />
                        </a>
                        <div class="mt-4 px-5 pb-5">
                            <a href="item_detail.php?id=<?php echo $row['id'] ?>">
                                <h5 class="text-lg tracking-tight text-slate-900"><?php echo $row['title'] ?></h5>
                            </a>
                            <p class="mt-1 text-sm text-slate-400"><?php echo $row['brand'] ?></p>
                            <div class="mt-2 mb-5 flex items-center justify-between">
                                <p>
                                    <span class="text-3xl font-bold text-slate-900">$<?php echo $row['price'] ?></span>
                                </p>
                            </div>
                            <a href="add_to_cart.php?id=<?php echo $row['id']?>" class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to cart</a>
                        </div>
                    </div>

                <?php endwhile; ?>
            </ul>
        </div>
    </main>
    <footer class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </footer>
</body>

</html>