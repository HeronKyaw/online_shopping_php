<?php
    session_start();
    include("../confs/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="/resources/style/main.css">
</head>

<body class="h-screen">
    <div class="nav-bar flex flex-row justify-between p-4">
        <a href="../index.php">&laquo; Continue Shopping</a>
        <h1 class=" font-bold">View Cart</h1>
        <a href="./clear_cart.php" class="del">&times; Clear Cart</a>
    </div>
    <div>
        <div class="cart flex flex-col justify-start mt-4">
            <div >
                <table class="mx-auto text-sm text-left text-gray-500 shadow-md sm:rounded-lg dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Image</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Qty
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total = 0;
                            foreach ($_SESSION['cart'] as $id => $qty) {
                                $result = mysqli_query($conn, "SELECT title, price, photo FROM tbl_item WHERE id = $id");
                                $row = mysqli_fetch_assoc($result);
                                $total += $row['price'] * $qty;
                        ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                <img style="width: 50px; height: 50px" src="/storage/upload/<?php echo $row['photo'] ?>" alt="<?php echo $row['title'] . '\'s image'; ?>">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                <?php echo $row['title']; ?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <a href="/customer/update_cart_item.php?id=<?php echo $id ?>&method=decrease" class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        <span class="sr-only">Quantity button</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </a>
                                    <p><?php echo $qty; ?></p>
                                    <a href="/customer/update_cart_item.php?id=<?php echo $id ?>&method=increase" class="inline-flex items-center justify-center h-6 w-6 p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                        <span class="sr-only">Quantity button</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                $<?php echo $row['price'] * $qty; ?>
                            </td>
                            <td class="px-6 py-4">
                                <a href="/customer/update_cart_item.php?id=<?php echo $id ?>&method=remove" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <tr>
                            <th colspan="4" class="px-6 py-3 col-span-4">
                                Total Price
                            </th>
                            <td>
                                $<?php echo $total; ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="flex justify-center mt-4">
                    <button id="checkout" type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Checkout
                    </button>
                </div>
            </div>
        </div>

        <div class="order-form hidden">
            <div class="px-10">
                    <div class="max-w-4xl px-4 mx-auto lg:py-16">
                        <h2 class="text-center mb-4 text-xl font-bold text-gray-900 dark:text-white">Your Information</h2>
                        <form class="px-auto" action="submit_order.php" method="post">
                            <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                                <div class="w-full">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your name" required="">
                                </div>
                                <div class="w-full">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your email" required="">
                                </div>
                                <div class="w-full">
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                    <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your phone number" required="">
                                </div>
                                <div class="w-full">
                                    <label for="card-no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Card No.</label>
                                    <input type="text" name="card-no" id="card-no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your card number" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <textarea id="address" name="address" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your address..."></textarea>
                                </div>
                            </div>
                            <div class="flex w-full justify-center items-center space-x-16">
                                <button id="back" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                    Back
                                </button>
                                <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    Submit Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <script>
        <?php if (empty($_SESSION['cart'])): ?>
            alert('Your cart is empty. Add items before proceeding to checkout.');
            window.location.href = '../index.php'; // Redirect to index.php
        <?php endif; ?>

        const checkout = document.getElementById('checkout');
        const backBtn = document.getElementById('back');
        const cart = document.querySelector('.cart');
        const orderForm = document.querySelector('.order-form');

        checkout.addEventListener('click', () => {
            <?php if (!empty($_SESSION['cart'])): ?>
                cart.classList.add('hidden');
                orderForm.classList.remove('hidden');
            <?php endif; ?>
        });

        backBtn.addEventListener('click', () => {
            cart.classList.remove('hidden');
            orderForm.classList.add('hidden');
        });
    </script>
</body>

</html>