<?php
    session_start();    
    include("./confs/config.php");

    $cart = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $qty) {
            $cart += $qty;
        }
    }

    #Browse by Category
    if (isset($_GET['cat'])) {
        $cat_id = $_GET['cat'];
        $items = mysqli_query($conn, "SELECT tbl_item.* FROM tbl_item LEFT JOIN tbl_category tc on tbl_item.category_id = tc.id WHERE tc.status = 1 AND tbl_item.category_id = $cat_id");
    } else {
        $items = mysqli_query($conn, "SELECT tbl_item.* FROM tbl_item LEFT JOIN tbl_category tc on tbl_item.category_id = tc.id WHERE tc.status = 1");
    }

    $isLogin = isset($_SESSION['auth']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="/resources/style/main.css">
</head>

<body class=" h-screen max-h-screen bg-gray-100">
    <?php include("component/nav_bar.php"); ?>

    <main class="h-full flex-1 flex flex-row bg-white shadow-xl rounded-lg">
        <?php include ("component/sidebar.php"); ?>

        <div class="flex-1 px-2 h-full overflow-x-scroll">
            <?php if (mysqli_num_rows($items) > 0) { ?>
                <ul class="items mx-auto grid max-w-6xl grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <?php while ($row = mysqli_fetch_assoc($items)) : ?>
                    <?php !is_dir("/storage/upload/{$row['photo']}") and file_exists("/storage/upload/{$row['photo']}") ?>
                    <div class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                        <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="/customer/item_detail.php?id=<?php echo $row['id'] ?>">
                            <img class="object-contain" src="/storage/upload/<?php echo $row['photo'] ?>" alt="<?php echo $row['title'] ?>'s image" />
                        </a>
                        <div class="mt-4 px-5 pb-5">
                            <a href="/customer/item_detail.php?id=<?php echo $row['id'] ?>">
                                <h5 class="text-lg tracking-tight text-slate-900"><?php echo $row['title'] ?></h5>
                            </a>
                            <p class="mt-1 text-sm text-slate-400"><?php echo $row['brand'] ?></p>
                            <div class="mt-2 mb-5 flex items-center justify-between">
                                <p>
                                    <span class="text-3xl font-bold text-slate-900">$<?php echo $row['price'] ?></span>
                                </p>
                            </div>
                                <a href="<?php echo $isLogin ? '/customer/add_to_cart.php?id=' . $row['id'] : '/admin/index.php'; ?>" class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to cart
                            </a>
                        </div>
                    </div>

                <?php endwhile; ?>
            </ul>
            <?php } else { ?>
                <div class="flex flex-col items-center justify-center h-full">
                    <h1 class="text-3xl font-bold text-gray-500">No items found</h1>
                </div>
            <?php } ?>
        </div>
    </main>
</body>
</html>