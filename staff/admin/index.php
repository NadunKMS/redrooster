
<!--This template is based on: https://dribbble.com/shots/6531694-Marketing-Dashboard by Gregoire Vella -->
<?php 
      include_once('../../public/includes/dbh.inc.php');      
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN Area | Redrooster</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100;200;300;400;500;600;700;800;900&family=Red+Hat+Text:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/output.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        
        .border-b-1 {
            border-bottom-width: 1px;
        }
        
        .border-l-1 {
            border-left-width: 1px;
        }
        
        hover\:border-none:hover {
            border-style: none;
        }
        
        #sidebar {
            transition: ease-in-out all .2s;
            z-index: 9999;
        }
        
        #sidebar span {
            opacity: 0;
            position: absolute;
            transition: ease-in-out all .0.5s;
        }
        
        #sidebar:hover {
            width: 150px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            /*shadow-2xl*/
        }
        
        #sidebar:hover span {
            opacity: 1;
        }
    </style>

</head>

<body class="font-redhat bg-gray-50 flex h-screen">

    <!-- Side bar-->
    <div id="sidebar" class="menu nunito fixed flex items-center w-16 h-screen px-4 text-white bg-white shadow">

        <ul class="list-reset ">
            <li class="md:my-0 my-2">
                <a href="#" class="md:py-3 hover:text-primary block py-1 pl-1 text-gray-600 no-underline align-middle">
                    <i class="fas fa-chart-area fa-fw text-primary mr-3"></i><span class="md:pb-0 inline-block w-full pb-1 text-sm">Home</span>
                </a>
            </li>
            <li class="md:my-0 my-2">
                <a href="show_products.php" class="md:py-3 hover:text-primary block py-1 pl-1 text-gray-600 no-underline align-middle">
                    <i class="fas fa-leaf fa-fw mr-3"></i><span class="md:pb-0 inline-block w-full pb-1 text-sm">Products</span>
                </a>
            </li>
            <li class="md:my-0 my-2">
                <a href="orders.php" class="md:py-3 hover:text-primary block py-1 pl-1 text-gray-600 no-underline align-middle">
                    <i class="fa fa-gift fa-fw mr-3"></i><span class="md:pb-0 inline-block w-full pb-1 text-sm">Orders</span>
                </a>
            </li>
            <li class="md:my-0 my-2">
                <a href="deliveries.php" class="md:py-3 hover:text-primary block py-1 pl-1 text-gray-600 no-underline align-middle">
                    <i class="fas fa-shopping-cart fa-fw mr-3"></i><span class="md:pb-0 inline-block w-full pb-1 text-sm">Deliveries</span>
                </a>
            </li>
        </ul>

    </div>

    <div class="flex flex-row flex-wrap content-start flex-1 flex-grow pl-16">

        <div class="lg:h-20 flex flex-wrap w-full h-40">

            <nav id="header1" class="lg:order-2 bg-gradient-to-r from-orange-200 via-amber-100 to-orange-200 flex-1 order-1 w-auto">

                <div class="flex items-center justify-center h-full">

                    <div class="relative flex pr-6">
                        <div class="flex flex-row">
                        <img src="../../public/images/removed_bg.png" alt="Logo" class="w-10 h-10 mx-4">
                        <h1 class="font-lexend text-2xl font-semibold">Admin</h1>
                        </div>
                </div>

            </nav>
        </div>

        
        <!--Dash Content -->
        <div id="dash-content" class="lg:py-0 lg:max-w-sm bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100 flex flex-wrap content-start w-full py-6">
            <?php
                // Assuming you have a valid database connection $conn
                $result = mysqli_query($conn, "SELECT SUM(total) AS total_revenue FROM order_items");
                $row = mysqli_fetch_assoc($result);
                $total_revenue_euro = $row['total_revenue'];
            ?>

            <div class="lg:w-full w-1/2">
                <div class="hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6 p-6 m-2 border-2 border-orange-400 border-dashed rounded-lg">
                    <div class="flex flex-col items-center">
                        <div class="flex-shrink pr-4">
                            <div class="bg-primary p-3 rounded-full"><i class="fa fa-wallet fa-fw fa-inverse text-white"></i></div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold"><?php echo '€ ' . number_format($total_revenue_euro, 2); ?> <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                            <h5 class="font-bold text-gray-500">Total Revenue</h5>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $result = mysqli_query($conn, "SELECT COUNT(customer_id) AS total_users FROM customers");
                $row = mysqli_fetch_assoc($result);
                $total_users = $row['total_users'];
            ?>

            <div class="lg:w-full w-1/2">
                <div class="hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6 p-6 m-2 border-2 border-orange-400 border-dashed rounded-lg">
                    <div class="flex flex-col items-center">
                        <div class="flex-shrink pr-4">
                            <div class="bg-primary p-3 rounded-full"><i class="fas fa-users fa-fw fa-inverse text-white"></i></div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold"><?php echo $total_users; ?> <span class="text-orange-500"><i class="fas fa-exchange-alt"></i></span></h3>
                            <h5 class="font-bold text-gray-500">Total Users</h5>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                // Assuming you have a valid database connection $conn
                $result = mysqli_query($conn, "SELECT COUNT(DISTINCT order_id) AS new_orders FROM order_items WHERE status='pending'");
                $row = mysqli_fetch_assoc($result);
                $new_orders = $row['new_orders'];
            ?>
            
            <div class="lg:w-full w-1/2">
                <div class="hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6 p-6 m-2 border-2 border-orange-400 border-dashed rounded-lg">
                    <div class="flex flex-col items-center">
                        <div class="flex-shrink pr-4">
                            <div class="bg-primary p-3 rounded-full"><i class="fas fa-user-plus fa-fw fa-inverse text-white"></i></div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold"><?php echo $new_orders; ?> <span class="text-green-600"><i class="fas fa-caret-up"></i></span></h3>
                            <h5 class="font-bold text-gray-500">New Orders</h5>
                        </div>
                    </div>
                </div>
            </div>


            <?php
                $result = mysqli_query($conn, "SELECT SUM(pid) AS total_products FROM products");
                $row = mysqli_fetch_assoc($result);
                $total_products = $row['total_products'];
            ?>

            <div class="lg:w-full w-1/2">
                <div class="hover:border-transparent hover:bg-white hover:shadow-xl md:mx-10 md:my-6 p-6 m-2 border-2 border-orange-400 border-dashed rounded-lg">
                    <div class="flex flex-col items-center">
                        <div class="flex-shrink pr-4">
                            <div class="bg-primary p-3 rounded-full"><i class="fas fa-mortar-pestle fa-fw fa-inverse text-white"></i></div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-3xl font-bold"><?php echo $total_products; ?> </h3>
                            <h5 class="font-bold text-gray-500">Total Products</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--Graph Content -->
                            <div id="main-content" class="bg-gradient-to-r from-orange-100 via-amber-50 to-orange-100 flex-1 w-full">
                                
                            <div class="container mx-10 my-6">
                                <a href="add_products.php">
                                    <button class="hover:border-primary hover:text-primary px-8 py-4 bg-white border-2 border-transparent rounded-full shadow-sm">Add products</button>
                                </a>

                                <a href="show_products.php">
                                    <button class="hover:border-primary hover:text-primary px-8 py-4 bg-white border-2 border-transparent rounded-full shadow-sm">Show products</button>
                                </a>

                                <a href="delivery_staff.php">
                                    <button class="hover:border-primary hover:text-primary px-8 py-4 bg-white border-2 border-transparent rounded-full shadow-sm">Delivery Staff</button>
                                </a>

                                <a href="orders.php">
                                    <button class="hover:border-primary hover:text-primary px-8 py-4 bg-white border-2 border-transparent rounded-full shadow-sm">Orders</button>
                                </a>

                                <a href="manage_deliveries.php">
                                    <button class="hover:border-primary hover:text-primary px-8 py-4 bg-white border-2 border-transparent rounded-full shadow-sm">Manage Deliveries</button>
                                </a>

                                <a href="deliveries.php">
                                    <button class="hover:border-primary hover:text-primary px-8 py-4 bg-white border-2 border-transparent rounded-full shadow-sm">Deliveries</button>
                                </a>

                                <div style="width: 80%; margin:5% auto;">
                                <p class="text-center">Best Selling Products</p>
                                <canvas id="topSellingChart"></canvas>
                                </div>
                                <?php
                                
                                // Fetch data from order_items table
                                $orderItemsQuery = "SELECT `pid`, SUM(`qty`) as total_qty FROM `order_items` WHERE `status` = 'completed' GROUP BY `pid` ORDER BY total_qty DESC LIMIT 5";
                                $orderItemsResult = mysqli_query($conn, $orderItemsQuery);
                                
                                // Fetch product details from products table
                                $productsQuery = "SELECT `pid`, `name` FROM `products`";
                                $productsResult = mysqli_query($conn, $productsQuery);
                                
                                // Store data in arrays
                                $productNames = [];
                                $productQuantities = [];
                                
                                while ($row = mysqli_fetch_assoc($orderItemsResult)) {
                                    $productQuantities[$row['pid']] = $row['total_qty'];
                                }
                                
                                while ($row = mysqli_fetch_assoc($productsResult)) {
                                    $productNames[$row['pid']] = $row['name'];
                                }
                                ?>

                            </div>

                             </div>

                        </div>
               
                    </div>

                </div>

            </div>

        </div>

    </div>


    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var userMenuDiv = document.getElementById("userMenu");
        var userMenu = document.getElementById("userButton");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //User Menu
            if (!checkParent(target, userMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, userMenu)) {
                    // click on the link
                    if (userMenuDiv.classList.contains("invisible")) {
                        userMenuDiv.classList.remove("invisible");
                    } else {
                        userMenuDiv.classList.add("invisible");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    userMenuDiv.classList.add("invisible");
                }
            }

        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }

                var ctx = document.getElementById('topSellingChart').getContext('2d');

        var productNames = <?php echo json_encode(array_values($productNames)); ?>;
        var productQuantities = <?php echo json_encode(array_values($productQuantities)); ?>;

        var topSellingChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: productNames,
                datasets: [{
                    label: 'Quantity Sold',
                    data: productQuantities,
                    backgroundColor: 'rgba(255, 115, 116, 0.2)',
                    borderColor: 'rgba(255, 88, 77, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            
            }
        });
    </script>

</body>

</html>
