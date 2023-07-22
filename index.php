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
    <nav>
        <h1 id="title" style="font-family: 'Courier New', Courier, monospace;">Online Shop</h1>
        <div class="admininfo">
            <a href="admin/auth/login.php" style="font-family:'Courier New', Courier, monospace;">Admin Login</a>
        </div>
        <div class="info">
            <a href="view-cart.php">
                (<?php echo $cart ?>) items in your cart
            </a>
        </div>
        <div class="sidebar">
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
        </div>        
    </nav>

    <div class="main">
        <ul class="items">
            <?php while ($row = mysqli_fetch_assoc($items)) : ?>
                <li>
                    <?php !is_dir("admin/image/items/{$row['photo']}") and file_exists("admin/image/items/{$row['photo']}") ?>
                    <img src="admin/image/items/<?php echo $row['photo']?>" alt="<?php echo $row['title'] ?>'s image" height="150">
                    <b>
                        <a href="item_detail.php?id=<?php echo $row['id'] ?>">
                            <?php echo $row['title'] ?>
                        </a>
                    </b>
                    <i>$<?php echo $row['price'] ?></i>
                    <a href="add-to-cart.php?id=<?php echo $row['id'] ?>" class="add-to-cart">
                        Add to Cart
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </div>
</body>

</html>