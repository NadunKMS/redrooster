<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Delivery Staff</title>
    <link rel="shortcut icon" href="../../public/images/logo_64.png">
    <link rel="stylesheet" href="../../scrollbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/output.css">
</head>
<body class="bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100 font-lexend">
        <a href="index.php" class="hover:bg-primary hover:text-white md:py-3 md:text-lg md:px-5 md:ml-12 hover:border-transparent inline-flex items-center justify-center px-4 py-2 mt-1 text-base font-medium text-gray-700 border border-gray-700 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
        </svg>
    </a>
    <h2 class="md:text-3xl font-lexend my-4 text-2xl font-bold text-center">Assign Delivery Staff to Orders</h2>
    <form action="process_deliveries.php" method="post" class="font-redhat flex flex-col items-center justify-center mt-8"> 
        <div class="mb-6">
            <label for="order_id" class="block text-gray-700 text-sm font-bold mb-2">Select Order:</label>
            <select name="order_id" id="order_id" class="focus:outline-none focus:bg-white focus:border-gray-500 block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-200 rounded appearance-none">
                <!-- Fetch and display order options from your database -->
                <?php
                    include_once('../../public/includes/dbh.inc.php');

                    // Fetch orders from the order_items table
                    $result = $conn->query("SELECT * FROM order_items");

                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['order_id']}'>Order #{$row['order_id']}</option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-6">
            <label for="ds_id" class="block text-gray-700 text-sm font-bold mb-2">Select Delivery Staff:</label>
            <select name="ds_id" id="ds_id" class="focus:outline-none focus:bg-white focus:border-gray-500 block w-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-200 rounded appearance-none">
                <!-- Fetch and display available delivery staff options from your database -->
                <?php
                    // Fetch delivery staff from the delivery_staff table with availability = 'available'
                    $result = $conn->query("SELECT * FROM delivery_staff WHERE availability = 'available'");

                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['ds_id']}'>{$row['Name']}</option>";
                    }

                    $conn->close();
                ?>
            </select>
        </div>

        <div class="mb-6">
            <input type="submit" value="Assign Delivery Staff" class="form-input hover:bg-primary hover:border-0 hover:text-white disabled:opacity-50 disabled:pointer-events-none dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 inline-flex items-center px-3 py-2 mt-4 mb-4 text-sm font-semibold text-gray-800 border border-gray-600 rounded-lg">
        </div>
    </form>
</body>
</html>
