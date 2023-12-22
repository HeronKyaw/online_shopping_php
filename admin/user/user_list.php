<?php
include("../../confs/auth.php");
include("../../confs/config.php");

if (isset($_GET['status_list']) && is_array($_GET['status_list'])) {
    $selectedStatus = $_GET['status_list'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_category WHERE status IN (" . implode(',', $selectedStatus) . ")");
} else {
    $result = mysqli_query($conn, "SELECT * FROM tbl_category");
}

$total_cats = mysqli_num_rows($result);
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
            <div class=" overflow-x-scroll w-full h-screen flex flex-col bg-gray-50 dark:bg-gray-900 ">
                <?php include('../../component/admin_nav_bar.php') ?>
                <div class="px-10 pt-20">
                    <section class="sm:py-5">
                        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-end lg:space-y-0 lg:space-x-4">
                                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-4 h-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                                            </svg>
                                            Filter
                                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                            </svg>
                                        </button>
                                        <a href="/admin/category/cat_new.php" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                            </svg>
                                            Add new category
                                        </a>
                                    </div>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">No.</th>
                                            <th scope="col" class="px-4 py-3">Name</th>
                                            <th scope="col" class="px-4 py-3">Status</th>
                                            <th scope="col" class="px-4 py-3 text-center">Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                    <th class="px-4 py-3">
                                                        <?php
                                                        $item_id++;
                                                        echo $item_id
                                                        ?>
                                                    </th>
                                                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <a href="cat_edit.php?id=<?php echo $row['id']?>" class="flex items-center">
                                                            <?php echo $row['name'] ?>
                                                        </a>
                                                    </th>
                                                    <td class="px-4 py-3">
                                                            <span class="<?php echo $row['status'] == 1 ? "bg-green-200 text-green-800 " : " bg-red-200 text-red-800" ?>  text-xs font-medium px-2 py-0.5 rounded">
                                                                <?php echo $row['status'] == 1 ? 'active' : 'inactive' ?>
                                                            </span>
                                                    </td>
                                                    <td class="px-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <a href="/admin/category/cat_edit.php?id=<?php echo $row['id'] ?>"  class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <th colspan="7"  class="px-4 py-3 text-center">
                                                    You have no categories.
                                                </th>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <nav class="flex flex-col md:flex-row justify-end items-center md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                                    <p class="text-sm">
                                        <span class="font-normal text-gray-500 dark:text-gray-400">Total Categories:</span>
                                        <span class="font-semibold text-gray-900 dark:text-white">
                                                <?php echo $total_cats ?>
                                            </span>
                                    </p>
                                </nav>
                            </div>
                        </div>
                        <!-- Dropdown menu -->
                        <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                Category
                            </h6>
                            <ul class="space-y-2 text-sm" aria-labelledby="dropdownDefault">
                                <li class="flex items-center">
                                    <input id="active_status" name="check_list[]" type="checkbox" value="1"
                                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                        <?php
                                        if (isset($selectedStatus) && is_array($selectedStatus) && in_array(1, $selectedStatus)) {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    />
                                    <label for="active_status" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        active
                                    </label>
                                </li>
                                <li class="flex items-center">
                                    <input id="inactive_status" name="check_list[]" type="checkbox" value="0"
                                           class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                        <?php
                                        if (isset($selectedStatus) && is_array($selectedStatus) && in_array(0, $selectedStatus)) {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    />
                                    <label for="inactive_status" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                        inactive
                                    </label>
                                </li>
                            </ul>
                            <a href="cat_list.php" id="filter_btn" class="mt-3 w-full flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                                Filter
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="/node_modules/flowbite/dist/flowbite.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let filter_btn = document.getElementById('filter_btn');

        // Add a click event listener to the "Filter" link
        filter_btn.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the link from navigating immediately

            // Get all checked checkboxes with the name "check_list[]"
            let checkedCheckboxes = document.querySelectorAll('input[name="check_list[]"]:checked');

            // Extract the values of the checked checkboxes into an array
            let checkedValues = Array.from(checkedCheckboxes).map(function(checkbox) {
                return checkbox.value;
            });

            // Construct the URL with the checked values
            // Navigate to the constructed URL
            window.location.href = 'cat_list.php?' + checkedValues.map(function (value) {
                return 'status_list[]=' + encodeURIComponent(value);
            }).join('&');
        });
    });
</script>
</body>

</html>