<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];

    if (!isset($fname)) {
        header('Location: includes/signout.inc.php');
    }
}

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | Red Rooster</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="shortcut icon" href="images/logo_64.png">
    <link rel="stylesheet" href="scrollbar.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="output.css">
</head>

<body class="font-redhat bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100">
    <?php
    include_once('includes/dbh.inc.php');

    $sql = "SELECT `orders`.*, `order_items`.*, products.name 
            FROM `orders` 
            INNER JOIN `order_items` ON `orders`.oid = `order_items`.order_id
            INNER JOIN products ON `order_items`.pid = products.pid 
            WHERE `orders`.user_email = '$email'";

    $result = $conn->query($sql);

    if ($result === false) {
        die("Error in query: " . $conn->error);
    }
    ?>

    <a href="home.php" class="hover:bg-primary hover:text-white md:py-3 md:text-lg md:px-5 md:ml-12 hover:border-transparent inline-flex items-center justify-center px-2 py-1 mt-1 text-base font-medium text-gray-700 border border-gray-700 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
        </svg>
    </a>

    <section class="sm:px-6 sm:py-12 lg:px-8 max-w-screen-xl px-4 py-8 mx-auto">
        <div class="max-w-3xl mx-auto">
            <header class="text-center">
                <h1 class="sm:text-xl text-3xl font-semibold text-left text-gray-900">Hey <span class="font-bold"><?php echo $fname ?></span>! Manage your orders here🛒</h1>
            </header>

            <div class="mt-8 space-y-4">
                <button id="clearOrdersBtn" class="bg-white py-2 px-6 shadow-sm hover:text-red-600 hover:border-red-600 text-sm rounded-full border border-gray-100">Clear Orders</button>

                <?php if ($result->num_rows > 0) : ?>
    <?php while ($order = $result->fetch_assoc()) : ?>
        <div class="flex flex-row items-center gap-4 p-4 bg-orange-100 rounded shadow-sm">
            <div>
                <h3 class="font-lexend ml-2 text-gray-900"><?= $order["name"] ?></h3>
                <p class="text-gray-800 font-semibold text-center px-3 py-1 text-xs rounded-full mt-2 ml-2
                    <?= ($order['status'] === 'pending') ? 'bg-yellow-300' : '' ?>
                    <?= ($order['status'] === 'completed') ? 'bg-green-300' : '' ?>
                    <?= ($order['status'] === 'canceled') ? 'bg-red-300' : '' ?>">
                    <?= $order['status']; ?>
                </p>
            </div>
            <div class="flex items-center justify-end flex-1 gap-2">
                <?php if ($order['status'] === 'pending') : ?>
                    <a href="includes/clear_orders.php?orderId=<?= $order['order_id'] ?>&productId=<?= $order['pid'] ?>" class="bg-white text-xs border rounded-full hover:bg-red-600 hover:text-white hover:border-red-600 px-4 py-1 ml-2 border-red-300">Cancel Order</a>
                <?php endif; ?>

                <span class="px-4 text-sm font-semibold">€ <?php echo $order['total'] ?></span>
            </div>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <p class="text-gray-600">No orders! <a href="home.php" class="text-primary hover:underline">shop now</a></p>
<?php endif; ?>
            </div>
        </div>
    </section>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const alertParam = urlParams.get('alert');

        if (alertParam === 'thankyou') {
            alert("Order placed successfully!");
        }
        const newUrl = window.location.href.split('?')[0];
        history.replaceState(null, document.title, newUrl);

        function confirmCancelOrder(orderId, productId) {
        // Display a confirmation dialog
        if (confirm('Are you sure you want to cancel this order?')) {
            // If the user confirms, navigate to the cancel_orders.php URL
            window.location.href = `includes/cancel_order.php?orderId=${orderId}&productId=${productId}`;
        }
        // If the user cancels, do nothing
    }
    document.getElementById('clearOrdersBtn').addEventListener('click', function () {
    // Confirm with the user before proceeding with the delete operation
    if (confirm('Are you sure you want to clear all orders?')) {
        // Call a function to handle the delete operation
        clearOrders();
    }
});

function clearOrders() {
    // Use AJAX to send a POST request to the server to perform the delete operation
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'includes/clear_orders.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                // Handle the response, if needed
                alert('Orders cleared successfully!');
                location.reload();
            } else {
                // Handle errors here
                alert('Error: ' + xhr.status);
            }
        }
    };
    xhr.send();
}
    
    </script>
</body>
</html>
