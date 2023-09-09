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
    <link rel="stylesheet" href="../resources/style/main.css">
</head>

<body class="h-screen max-h-screen">

    <main class="h-full">
        <div class="flex flex-col overflow-x-hidden">
            <div class="flex flex-row">
                <?php include('../component/admin_sidebar.php') ?>
                <div class=" overflow-x-scroll w-full h-screen flex flex-col">
                    <?php include('../component/admin_nav_bar.php') ?>
                    <div class="px-10 pt-24">
                        <h1>Online Shop Administration</h1>
                        <img src="/resources/image/welcome.png" alt="Welcome Image" width="1100" height="500">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>