<?php
include("../confs/auth.php");
include("../confs/config.php");
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
                <?php include('../component/admin_sidebar.php') ?>
                <div class=" overflow-x-scroll w-full h-screen flex flex-col bg-gray-50 dark:bg-gray-900 ">
                    <?php include('../component/admin_nav_bar.php') ?>
                    <div class="px-10 pt-24">
                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                            <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                                <div class="flex flex-col space-y-1.5 p-6">
                                    <h3 class="text-2xl font-semibold leading-none tracking-tight">Item Stock</h3>
                                </div>
                                <div class="p-6">
                                    <div class="w-full aspect-[4/3]">
                                        <div style="width: 100%; height: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
                                <div class="flex flex-col space-y-1.5 p-6">
                                    <h3 class="text-2xl font-semibold leading-none tracking-tight">Orders</h3>
                                </div>
                                <div class="p-6">
                                    <div class="w-full aspect-[4/3]">
                                        <div style="width: 100%; height: 100%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>