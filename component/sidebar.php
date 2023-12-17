<?php
    include("./confs/config.php");
    $cats = mysqli_query($conn, "SELECT * FROM tbl_category ORDER BY name");
?>

<aside id="default-sidebar" class="sidebar z-40 pt-4 w-64 transition-transform bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800 flex flex-col justify-between">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="index.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <span class="ml-3">All Items</span>
                </a>
            </li>
            <?php while ($row = mysqli_fetch_assoc($cats)) : ?>
                <li>
                    <a href="index.php?cat=<?php echo $row['id'] ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="ml-3"><?php echo $row['name'] ?></span>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</aside>

<script>
    <?php
        if (isset($_GET['cat'])) {
            $cat_id = $_GET['cat'];
            echo "document.querySelector(`a[href='index.php?cat=$cat_id']`).classList.add('bg-gray-100', 'dark:bg-gray-700')";
        } else {
            echo "document.querySelector(`a[href='index.php']`).classList.add('bg-gray-100', 'dark:bg-gray-700')";
        }
    ?>
</script>